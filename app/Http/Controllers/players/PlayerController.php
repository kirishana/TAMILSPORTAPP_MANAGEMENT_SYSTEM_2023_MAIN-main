<?php

namespace App\Http\Controllers\players;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AgeGroupEvent;
use App\Models\AgeGroupGender;
use App\Models\VenueDetail;
use App\Models\Team;
use App\Models\League;
use App\Models\Season;
use App\generalSetting;
use App\Models\Event;
use App\Models\Gender;
use App\Models\MainEvent;
use App\Models\Organization;
use App\Models\AgeGroup;
use Auth;
use App\User;
use Session;
use DB;
use App\Models\OrganizationSetting;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use PDF;
use Excel;
use App\Exports\EventResultsExport;
use App\Exports\EventsResultPlayerExport;
use App\Models\Registration;
use Pusher\Pusher;
class PlayerController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $event = Event::find($request->input('event'));
        if ($event->mainEvent->event_category_id == 1) {
            $validator = Validator::make(
                $request->all(),
                [
                    'attendances'                  => 'required',
                    'ground' => 'required'
                ],
                [
                    'attendances.required' => 'Please Select Participants',
                    'ground.required' => 'Please Select The Ground'



                ]

            );
            if ($validator->fails()) {
                return redirect('/participants/' . $request->input("ageGroupGender") . '')->withErrors($validator)->withInput();
            }
        } else {
            $validator = Validator::make(
                $request->all(),
                [
                    'attendances'                  => 'required',
                ],
                [
                    'attendances.required' => 'Please Select Participants',



                ]

            );
            if ($validator->fails()) {
                return redirect('/participants/' . $request->input("ageGroupGender") . '')->withErrors($validator)->withInput();
            }
        }
        $ageGroupGender = AgeGroupGender::find($request->input('ageGroupGender'));
        $ageGroupGender->field_events=$ageGroupGender->ageGroupEvent->Event->league->organization->athelaticSetting->field_events;
        $ageGroupGender->track_events=$ageGroupGender->ageGroupEvent->Event->organization->athelaticSetting->track_events;
        $ageGroupGender->total_events=$ageGroupGender->ageGroupEvent->Event->organization->athelaticSetting->total_events;
        $ageGroupGender->first_place=$ageGroupGender->ageGroupEvent->Event->organization->athelaticSetting->first_place;
        $ageGroupGender->second_place=$ageGroupGender->ageGroupEvent->Event->organization->athelaticSetting->second_place;
        $ageGroupGender->third_place=$ageGroupGender->ageGroupEvent->Event->organization->athelaticSetting->third_place;
        $ageGroupGender->group_first_place=$ageGroupGender->ageGroupEvent->Event->organization->athelaticSetting->group_first_place;
        $ageGroupGender->group_second_place=$ageGroupGender->ageGroupEvent->Event->organization->athelaticSetting->group_second_place;
        $ageGroupGender->group_third_place=$ageGroupGender->ageGroupEvent->Event->organization->athelaticSetting->group_third_place;
        $ageGroupGender->save();

        $event = Event::find($request->input('event'));
        $ground = $request->input('ground');
        DB::table('age_group_genders')->where('id', $request->input('ageGroupGender'))->update(['venue_detail_id' => $ground]);

        // $ageGroupGender->update(['venue_detail_id' =>  $ground]);
        if ($event->mainEvent->event_category_id == 1 || $event->mainEvent->event_category_id == 3) {
            $venues = $event->league->venue->venueDetails;
            foreach ($venues as $venue) {
                $count = $venue->where('id', $ground)->first();
                $trackCount = $count->track_event_count;
            }
        }
        foreach ($request->attendances as $attendance) {
            $ageGroupGender->users()->attach($attendance, ['league_id' => $event->league_id]);
        }
        $count = count($request->attendances);
        Session::put('ageGroupGender', $ageGroupGender->id);
        Session::put('count', $count);
        if ($event->mainEvent->event_category_id == 1 || $event->mainEvent->event_category_id == 3) {
            Session::put('trackCount', $trackCount);
        }
        Session::put('event', $event);
        DB::table('age_group_genders')->where('id', $ageGroupGender->id)->update(['status' => 0]);
        $options = array(
            'cluster' => 'ap2',
            'useTLS' => false

        );
        $pusher = new Pusher(
            env('PUSHER_APP_KEY'),
            env('PUSHER_APP_SECRET'),
            env('PUSHER_APP_ID'),
            $options

        );
       $event=$ageGroupGender->ageGroupEvent->event->mainEvent->name;
       $eventId=$ageGroupGender->ageGroupEvent->event->id;
       $league=$ageGroupGender->ageGroupEvent->event->league->name;
       $organizer=$ageGroupGender->ageGroupEvent->event->user->first_name;
$gender=$ageGroupGender->gender->name;
$ageGroup=$ageGroupGender->ageGroupEvent->ageGroup->name;
$time=$ageGroupGender->time;
$cat=$ageGroupGender->ageGroupEvent->event->mainEvent->event_category_id;
$date=$ageGroupGender->ageGroupEvent->event->date;
        $data = ['status' =>$ageGroupGender->status,"id"=>$ageGroupGender->id,"eventId"=>$eventId,"ageGender"=>$ageGroupGender,'event'=>$event,'league'=>$league,'date'=>$date,'organizer'=>$organizer,'ageGroup'=>$ageGroup,'gender'=>$gender,'time'=>$time,'cat'=>$cat];
        $pusher->trigger('my-channel', 'my-event', $data);
        $url='/track/divide';
        
        return response()->json(['url'=>$url]);
    }
    public function playerReg(Request $request,$id){

        $gender=AgeGroupGender::find($id);
               $event=$gender->ageGroupEvent->event;

        foreach ($request->users as $user) {
            $gender->users()->attach($user, ['league_id' => $event->league_id]);
        }
                return response()->json(['url'=>"hi"]);

    }
    public function groupEventStore(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'attendances'                  => 'required',
                'ground' => 'required'
            ],
            [
                'attendances.required' => 'Please Select Participants',
                'ground.required' => 'Please Select The Ground'



            ]

        );
        if ($validator->fails()) {
            return redirect('/participants/' . $request->input("ageGroupGender") . '')->withErrors($validator)->withInput();
        }
        else{

        $ageGroupGender = AgeGroupGender::find($request->input('ageGroupGender'));
        $ageGroupGender->field_events=$ageGroupGender->ageGroupEvent->Event->league->organization->athelaticSetting->field_events;
        $ageGroupGender->track_events=$ageGroupGender->ageGroupEvent->Event->organization->athelaticSetting->track_events;
        $ageGroupGender->total_events=$ageGroupGender->ageGroupEvent->Event->organization->athelaticSetting->total_events;
        $ageGroupGender->first_place=$ageGroupGender->ageGroupEvent->Event->organization->athelaticSetting->first_place;
        $ageGroupGender->second_place=$ageGroupGender->ageGroupEvent->Event->organization->athelaticSetting->second_place;
        $ageGroupGender->third_place=$ageGroupGender->ageGroupEvent->Event->organization->athelaticSetting->third_place;
        $ageGroupGender->group_first_place=$ageGroupGender->ageGroupEvent->Event->organization->athelaticSetting->group_first_place;
        $ageGroupGender->group_second_place=$ageGroupGender->ageGroupEvent->Event->organization->athelaticSetting->group_second_place;
        $ageGroupGender->group_third_place=$ageGroupGender->ageGroupEvent->Event->organization->athelaticSetting->group_third_place;
        $ageGroupGender->save();
        $ageGroupEvent = AgeGroupEvent::find($ageGroupGender->age_group_event_id);
        $event = Event::find($ageGroupEvent->event_id);
        $ground = $request->input('ground');
        DB::table('age_group_genders')->where('id', $request->input('ageGroupGender'))->update(['venue_detail_id' => $ground]);

        $venues = $event->league->venue->venueDetails;
        foreach ($venues as $venue) {
            $count = $venue->where('id', $ground)->first();
            $trackCount = $count->track_event_count;
        }
        foreach ($request->attendances as $attendance) {
            $ageGroupGender->teams()->attach($attendance, ['league_id' => $event->league_id]);
        }

        $count = count($request->attendances);
        Session::put('ageGroupGender', $ageGroupGender->id);
        Session::put('count', $trackCount);

    }

    DB::table('age_group_genders')->where('id', $ageGroupGender->id)->update(['status' => 0]);
    $options = array(
        'cluster' => 'ap2',
        'useTLS' => false

    );

    $pusher = new Pusher(
        env('PUSHER_APP_KEY'),
        env('PUSHER_APP_SECRET'),
        env('PUSHER_APP_ID'),
        $options

    );

    $event=$ageGroupGender->ageGroupEvent->event->mainEvent->name;
    $eventId=$ageGroupGender->ageGroupEvent->event->id;
    $league=$ageGroupGender->ageGroupEvent->event->league->name;
    $organizer=$ageGroupGender->ageGroupEvent->event->user->first_name;
$gender=$ageGroupGender->gender->name;
$ageGroup=$ageGroupGender->ageGroupEvent->ageGroup->name;
$time=$ageGroupGender->time;
$cat=$ageGroupGender->ageGroupEvent->event->mainEvent->event_category_id;
$date=$ageGroupGender->ageGroupEvent->event->date;

     $data = ['status' =>$ageGroupGender->status,"id"=>$ageGroupGender->id,"eventId"=>$eventId,"ageGender"=>$ageGroupGender,'event'=>$event,'league'=>$league,'organizer'=>$organizer,'ageGroup'=>$ageGroup,'gender'=>$gender,'time'=>$time,'cat'=>$cat,'date'=>$date];
         $pusher->trigger('my-channel', 'my-event', $data);
    $url='/track/divide';

    return response()->json(['url'=>$url]);
       
    }


    public function finishHeatEvent($id, Request $request)
    {
        $event = Event::find($request->input('event'));
        if ($event->mainEvent->event_category_id == 1) {
            $gender = AgeGroupGender::find($id);
            if($request->input('len')==1){
              $date2=$request->input('time');
          }else{
              $dateOfIssue = $request->input('time');
            $s = $request->input('time');
            if($s==null){
                $date="";
                 $date2 ="";
            }
            else{
                 $date = strtotime($s);
                 $date2 = date('H:i:s', $date);
            }
           
          }
            
            $ageGroupGenderUser = DB::table('age_group_gender_user')->where('age_group_gender_id', $gender->id)->where('user_id', $request->input('player'))->update(['time' => $date2]);
            $ageGroupGender = DB::table('age_group_genders')->where('id', $gender->id)->update(['status' => 0]);
            $id = $gender->id;
            $event = $request->input('event');
            $view2 = view('admin.events.index3', compact('events', 'judges', 'starters', 'events', 'agegroups', 'leagues'))->render();
            return response()->json(['html' => $view2]);
        }
        if ($event->mainEvent->event_category_id == 3) {

            $gender = AgeGroupGender::find($id);
             if($request->input('len')==1){
              $date2=$request->input('time');
          }else{
              $dateOfIssue = $request->input('time');
            $s = $request->input('time');
            if($s==null){
                $date="";
                 $date2 ="";
            }
            else{
                 $date = strtotime($s);
                 $date2 = date('H:i:s', $date);
            }
           
          }
            $ageGroupGenderUser = DB::table('age_group_gender_team')->where('age_group_gender_id', $gender->id)->where('team_id', $request->input('player'))->update(['time' => $date2]);
            $ageGroupGender = DB::table('age_group_genders')->where('id', $gender->id)->update(['status' => 0]);
            $id = $gender->id;
        }
    }
public function genderRankEmpty($id){
    $genderUsers=DB::table('age_group_gender_user')->where('age_group_gender_id',$id)->where('time',"")->get();
//   DB::table('age_group_gender_user')->where('age_group_gender_id', $id)->where('time', "")->update(['time' =>'-']);
}
    public function finishHeatEventTime($id, Request $request)
    {


        $gender = AgeGroupGender::find($id);
        $id = $gender->id;
        $event = $request->input('event');
        $event = Event::find($request->input('event'));
        if ($event->mainEvent->event_category_id == 1) {

              $s = $request->input('time');
              if($s==null){
                  $date="";
                   $date2 ="";
              }
              else{
                   $date = strtotime($s);
                   $date2 = date('H:i:s', $date);
              }
            
            $ageGroupGenderUser = DB::table('age_group_gender_user')->where('age_group_gender_id', $gender->id)->where('user_id', $request->input('player'))->update(['time' => $date2]);
            $ageGroupGender = DB::table('age_group_genders')->where('id', $gender->id)->update(['status' => 0]);
            
        
    }
        if ($event->mainEvent->event_category_id == 3) {

            $rank = $request->input('rank');
            $ageGroupGenderUser = DB::table('age_group_gender_team')->where('age_group_gender_id', $gender->id)->where('team_id', $request->input('player'))->update(['time' => $rank]);
            $ageGroupGender = DB::table('age_group_genders')->where('id', $gender->id)->update(['status' => 0]);
        }
    }
    public function finishHeatEventRank($id, Request $request)
    {

        $gender = AgeGroupGender::find($id);
        $id = $gender->id;
        $event = $request->input('event');
        $event = Event::find($request->input('event'));
        if ($event->mainEvent->event_category_id == 1) {
              $rank = $request->input('rank');
             
            
            $ageGroupGenderUser = DB::table('age_group_gender_user')->where('age_group_gender_id', $gender->id)->where('user_id', $request->input('player'))->update(['time' => $rank]);
            $ageGroupGender = DB::table('age_group_genders')->where('id', $gender->id)->update(['status' => 0]);
            
        
    }
        if ($event->mainEvent->event_category_id == 3) {

            $rank = $request->input('rank');
            $ageGroupGenderUser = DB::table('age_group_gender_team')->where('age_group_gender_id', $gender->id)->where('team_id', $request->input('player'))->update(['time' => $rank]);
            $ageGroupGender = DB::table('age_group_genders')->where('id', $gender->id)->update(['status' => 0]);
        }
    }
    public function finishEventTime($id, Request $request)
    {
        
        $event = Event::find($request->input('event'));
        if ($event->mainEvent->event_category_id == 1) {
            $gender = AgeGroupGender::find($id);
             $s = $request->input('time');
             if($s==null){
                $date="";
                 $date2 ="";
            }
            else{
                 $date = strtotime($s);
                 $date2 = date('H:i:s', $date);
            }
            $ageGroupGenderUser = DB::table('age_group_gender_user')->where('age_group_gender_id', $gender->id)->where('user_id', $request->input('player'))->update(['time' => $date2]);
            $ageGroupGender = DB::table('age_group_genders')->where('id', $gender->id)->update(['status' => 0]);

        }
        if ($event->mainEvent->event_category_id == 3) {
            $gender = AgeGroupGender::find($id);
             $s = $request->input('time');
            if($s==null){
                $date="";
                 $date2 ="";
            }
            else{
                 $date = strtotime($s);
                 $date2 = date('H:i:s', $date);
            
           
          }
            $ageGroupGenderUser = DB::table('age_group_gender_team')->where('age_group_gender_id', $gender->id)->where('team_id', $request->input('player'))->update(['time' => $date2]);

            $ageGroupGender = DB::table('age_group_genders')->where('id', $gender->id)->update(['status' => 0]);
        }
    }
    public function finishEventRank($id, Request $request)
    {
        $event = Event::find($request->input('event'));
        if ($event->mainEvent->event_category_id == 1) {
            $gender = AgeGroupGender::find($id);
         
            
           
          
            
            $ageGroupGenderUser = DB::table('age_group_gender_user')->where('age_group_gender_id', $gender->id)->where('user_id', $request->input('player'))->update(['time' => $request->input('rank')]);
            $ageGroupGender = DB::table('age_group_genders')->where('id', $gender->id)->update(['status' => 0]);

            // $url = '/players/' . $id . '/' . $event->id . '';
            // return response()->json([
            //     'url' => $url,

            // ]);
        }
        if ($event->mainEvent->event_category_id == 3) {
            $gender = AgeGroupGender::find($id);
             if($request->input('len')==1){
              $date2=$request->input('time');
          }else{
              $dateOfIssue = $request->input('time');
            $s = $request->input('time');
            if($s==null){
                $date="";
                 $date2 ="";
            }
            else{
                 $date = strtotime($s);
                 $date2 = date('H:i:s', $date);
            }
           
          }
            $ageGroupGenderUser = DB::table('age_group_gender_team')->where('age_group_gender_id', $gender->id)->where('team_id', $request->input('player'))->update(['time' => $date2]);

            $ageGroupGender = DB::table('age_group_genders')->where('id', $gender->id)->update(['status' => 0]);
        }
    }
    public function eventResults(Request $request, $id)
    {
        // dd($request->inpu    t('playerResults'));
       DB::table('age_group_genders')->where('id', $id)->update(['status' => 1]);
        
          $ageGroupGender =AgeGroupGender::find($id);
          $gender = AgeGroupGender::find($id);
        $org = $ageGroupGender->ageGroupEvent->Event->organization;
        if($ageGroupGender->ageGroupEvent->Event->mainEvent->event_category_id == 1){
            if($request->input('method')==1){
                $gender = AgeGroupGender::find($id);
                foreach($request->input('playerResults') as $key=>$result){
                    $user=User::where('userId',$key)->first();
                    $s=$result;
                    if($s==null){
                        $date="";
                         $date2 ="";
                    }
                    else{
                         $date = strtotime($s);
                         $date2 = date('H:i:s', $date);
                    }
                    $ageGroupGenderUser = DB::table('age_group_gender_user')->where('age_group_gender_id', $gender->id)->where('user_id', $user->id)->update(['time' => $date2]);

                }
             
            //    $ageGroupGender = DB::table('age_group_genders')->where('id', $gender->id)->update(['status' => 0]);
            }else{      
                $gender = AgeGroupGender::find($id);

                foreach($request->input('playerResults') as $key=>$result){                                                               
                $user=User::where('userId',$key)->first();
                
                $ageGroupGenderUser = DB::table('age_group_gender_user')->where('age_group_gender_id', $gender->id)->where('user_id', $user->id)->update(['time' => $result]);

            }
            }

        $times = DB::table('age_group_gender_user')
        ->where('age_group_gender_id', $ageGroupGender->id)
        ->where('time','!=',"")
        ->orderBy('time', 'ASC')
        ->limit(3)
        ->get();
         $max=array();
        foreach ($times as $key => $time) {
        
        $max[]=$time->time;
        }
           sort($max);
        $results=array_slice($max, 0, 3);
                if(count($results)==1){
                             DB::table('age_group_gender_user')->where('age_group_gender_id', $gender->id)->where('time', $results[0])->update(['marks' => $ageGroupGender->first_place]);

                }

        else if(count($results)==3){

        if($results[0]==$results[1]&& $results[1]==$results[2]){
                     DB::table('age_group_gender_user')->where('age_group_gender_id', $gender->id)->where('time', $results[0])->update(['marks' => $ageGroupGender->first_place]);

        }
        
         else if($results[0]==$results[1]){
                     DB::table('age_group_gender_user')->where('age_group_gender_id', $gender->id)->where('time', $results[0])->update(['marks' => $ageGroupGender->first_place]);
                     DB::table('age_group_gender_user')->where('age_group_gender_id', $gender->id)->where('time', $results[2])->update(['marks' => $ageGroupGender->third_place]);

        }
         else if($results[1]==$results[2]){
                     DB::table('age_group_gender_user')->where('age_group_gender_id', $gender->id)->where('time', $results[0])->update(['marks' => $ageGroupGender->first_place]);
                     DB::table('age_group_gender_user')->where('age_group_gender_id', $gender->id)->where('time', $results[2])->update(['marks' => $ageGroupGender->second_place]);

        }
        else{
            DB::table('age_group_gender_user')->where('age_group_gender_id', $gender->id)->where('time', $results[0])->update(['marks' => $ageGroupGender->first_place]);
         DB::table('age_group_gender_user')->where('age_group_gender_id', $gender->id)->where('time', $results[1])->update(['marks' =>$ageGroupGender->second_place]);
          DB::table('age_group_gender_user')->where('age_group_gender_id', $gender->id)->where('time', $results[2])->update(['marks' => $ageGroupGender->third_place]); 
        }
        }
       
        elseif(count($results)==2){
                  if($results[0]==$results[1]){
                     DB::table('age_group_gender_user')->where('age_group_gender_id', $gender->id)->where('time', $results[0])->update(['marks' => $ageGroupGender->first_place]);

        }
        else{
         DB::table('age_group_gender_user')->where('age_group_gender_id', $gender->id)->where('time', $results[0])->update(['marks' =>$ageGroupGender->first_place]);
                  DB::table('age_group_gender_user')->where('age_group_gender_id', $gender->id)->where('time', $results[1])->update(['marks' =>$ageGroupGender->second_place]);

        }
            

        }
        }


            elseif($ageGroupGender->ageGroupEvent->Event->mainEvent->event_category_id == 3){
                foreach($request->input('playerResults') as $key=>$result){                                                               
                    $team=Team::find($key);
                    $gender = AgeGroupGender::find($id);

                    $ageGroupGenderTeam = DB::table('age_group_gender_team')->where('age_group_gender_id', $gender->id)->where('team_id', $team->id)->update(['time' => $result]);
    
                }
        $times = DB::table('age_group_gender_team')
        ->where('age_group_gender_id', $ageGroupGender->id)
        ->where('time','!=','')
        ->orderBy('time', 'ASC')
        ->limit(3)
        ->get();
        if(count($times)==1){
            DB::table('age_group_gender_team')->where('id', $times[0]->id)->update(['marks' => $ageGroupGender->group_first_place]);

}
        else if(count($times)==3){
            if($times[0]->time==$times[1]->time&& $times[1]->time==$times[2]->time){
             foreach($times as $time){
         DB::table('age_group_gender_team')->where('id', $time->id)->update(['marks' => $ageGroupGender->group_first_place]);
             }
            }
      elseif($times[0]->time==$times[1]->time){

            
     DB::table('age_group_gender_team')->where('id', $times[0]->id)->update(['marks' => $ageGroupGender->group_first_place]);
                     DB::table('age_group_gender_team')->where('id', $times[1]->id)->update(['marks' => $ageGroupGender->group_first_place]);
                                             DB::table('age_group_gender_team')->where('id', $times[2]->id)->update(['marks' => $ageGroupGender->group_third_place]);


      }
       
        elseif($times[1]->time==$times[2]->time){

         DB::table('age_group_gender_team')->where('id', $times[0]->id)->update(['marks' => $ageGroupGender->group_first_place]);
                     DB::table('age_group_gender_team')->where('id', $times[1]->id)->update(['marks' => $ageGroupGender->group_second_place]);
                                             DB::table('age_group_gender_team')->where('id', $times[2]->id)->update(['marks' => $ageGroupGender->group_second_place]);


       
        }
        else{

         DB::table('age_group_gender_team')->where('id', $times[0]->id)->update(['marks' => $ageGroupGender->group_first_place]);
                     DB::table('age_group_gender_team')->where('id', $times[1]->id)->update(['marks' => $ageGroupGender->group_second_place]);
                                             DB::table('age_group_gender_team')->where('id', $times[2]->id)->update(['marks' => $ageGroupGender->group_third_place]);
        }
        }
        elseif(count($times)!=3){
                   if($times[0]->time==$times[1]->time){
             foreach($times as $time){
         DB::table('age_group_gender_team')->where('id', $time->id)->update(['marks' => $ageGroupGender->group_first_place]);
             }
            }
      elseif($times[0]->time==$times[1]->time){
             
            
     DB::table('age_group_gender_team')->where('id', $times[0]->id)->update(['marks' => $ageGroupGender->group_first_place]);
                     DB::table('age_group_gender_team')->where('id', $times[1]->id)->update(['marks' => $ageGroupGender->group_first_place]);
                                             DB::table('age_group_gender_team')->where('id', $times[2]->id)->update(['marks' => $ageGroupGender->group_third_place]);


      }
       
     
        else{

         DB::table('age_group_gender_team')->where('id', $times[0]->id)->update(['marks' => $ageGroupGender->group_first_place]);
                     DB::table('age_group_gender_team')->where('id', $times[1]->id)->update(['marks' => $ageGroupGender->group_second_place]);
        }
        }
        } 
           
           
           
           
           
           
                else if($ageGroupGender->ageGroupEvent->Event->mainEvent->event_category_id == 2){
                     $gender = AgeGroupGender::find($id);
        $id = $gender->id;
        $players = $gender->users;

        $max = array();
        $userIds = array();
        $times = DB::table('age_group_gender_user')
            ->where('age_group_gender_id', $gender->id)
            
            ->get();
        foreach ($times as $key => $time) {
            if ($time->one >= $time->two) {
                if ($time->one >= $time->third) {
                    $max[] = $time->one;
                } else {
                    $max[] = $time->third;
                }
            } elseif ($time->one <= $time->two) {
                if ($time->third <= $time->two) {
                    $max[] = $time->two;
                } else {
                    $max[] = $time->third;
                }
            }
        }
        rsort($max);
        $maximum=array_slice($max, 0, 3);
        $maxes=array_unique($max);
        $userLists = array();
        $users1 = array();
        $users2 = array();
         $users3 = array();
      $users4=array();
      $results = array_filter($maximum); 
      if(count($results)==0){
      }
        elseif(count($results)==1){
            $users = DB::table('age_group_gender_user')
            ->where('age_group_gender_id', $gender->id)
            ->where(function ($query) use ($results) {
                $query->orwhereIn('one', [$results[0]])
                    ->orWhereIn('two',[$results[0]])
                    ->orWhereIn('third', [$results[0]]);
            })->get();
            foreach ($users as $userId) {
                $users1[] = User::find($userId->user_id);
                DB::table('age_group_gender_user')
                ->where('age_group_gender_id', $gender->id)
                ->Where('user_id',$userId->user_id)
               ->update(['marks'=>$gender->first_place]);
            }
        }
        elseif(count($results)==2){
if($results[0]==$results[1]){
                $users = DB::table('age_group_gender_user')
                    ->where('age_group_gender_id', $gender->id)
                    ->where(function ($query) use ($results) {
                        $query->orwhereIn('one', [$results[0],$results[1]])
                            ->orWhereIn('two',[$results[0],$results[1]])
                            ->orWhereIn('third', [$results[0],$results[1]]);
                    })->get();
                    $users1Test = DB::table('age_group_gender_user')
                    ->where('age_group_gender_id', $gender->id)
                    ->where(function ($query) use ($results) {
                        $query->orwhereIn('one', [$results[0],$results[1]])
                            ->orWhereIn('two',[$results[0],$results[1]])
                            ->orWhereIn('third', [$results[0],$results[1]]);
                    })->pluck('user_id');
                    // dd($usersTest);
    
                foreach ($users as $userId) {
                    $users1[] = User::find($userId->user_id);
                    DB::table('age_group_gender_user')
                    ->where('age_group_gender_id', $gender->id)
                    ->Where('user_id',$userId->user_id)
                   ->update(['marks'=>$gender->first_place]);
                }
         
                if ($results[0]!=$results[1]) {
                    foreach ($users2 as $userId) {
                        $users2[] = User::find($userId->user_id);
                    }
                }
                // dd($users2Test);
            
        }
        else{
    if($results[0]){
            $usersFirst= DB::table('age_group_gender_user')
                ->where('age_group_gender_id', $gender->id)
                ->where(function ($query) use ($results) {
                    $query->orwhere('one', $results[0])
                        ->orWhere('two',$results[0])
                        ->orWhere('third', $results[0]);
                })->get();
                $users1Test= DB::table('age_group_gender_user')
                ->where('age_group_gender_id', $gender->id)
                ->where(function ($query) use ($results) {
                    $query->orwhere('one', $results[0])
                        ->orWhere('two',$results[0])
                        ->orWhere('third', $results[0]);
                })->pluck('user_id');

            foreach ($usersFirst as $userId) {
                $users1[] = User::find($userId->user_id);
                DB::table('age_group_gender_user')
                ->where('age_group_gender_id', $gender->id)
                ->Where('user_id',$userId->user_id)
               ->update(['marks'=>$gender->first_place]);
            }
        
    }
    if ($results[1]) {
        $usersSecond= DB::table('age_group_gender_user')
        ->where('age_group_gender_id', $gender->id)
        ->where(function ($query) use ($results) {
            $query->orwhere('one', $results[1])
                ->orWhere('two',$results[1])
                ->orWhere('third', $results[1]);
        })->get();
        $users2Test= DB::table('age_group_gender_user')
        ->where('age_group_gender_id', $gender->id)
        ->where(function ($query) use ($results) {
            $query->orwhere('one', $results[1])
                ->orWhere('two',$results[1])
                ->orWhere('third', $results[1]);
        })->pluck('user_id');

  $diff=array_diff($users2Test->toArray(),$users1Test->toArray());
                $users2= User::find($diff);
                foreach ($diff as $differ) {

                DB::table('age_group_gender_user')
                ->where('age_group_gender_id', $gender->id)
                ->Where('user_id',$differ)
               ->update(['marks'=>$gender->second_place]);
                }
    // foreach ($usersSecond as $userId) {
    //     $users2[] = User::find($userId->user_id);
    // }

    }
  
    }

        }
        else{
    if($results[0]==$results[1]&& $results[1]==$results[2]){
                $users = DB::table('age_group_gender_user')
                    ->where('age_group_gender_id', $gender->id)
                    ->where(function ($query) use ($results) {
                        $query->orwhereIn('one', [$results[1],$results[2],$results[0]])
                            ->orWhereIn('two',[$results[1],$results[2],$results[0]])
                            ->orWhereIn('third', [$results[1],$results[2],$results[0]]);
                    })->get();
                foreach ($users as $userId) {
                    $users1[] = User::find($userId->user_id);
                    DB::table('age_group_gender_user')
                    ->where('age_group_gender_id', $gender->id)
                    ->Where('user_id',$userId->user_id)
                   ->update(['marks'=>$gender->first_place]);
                }
                if ($results[1]!=$results[2]) {
                    foreach ($users2 as $userId) {
                        $users2[] = User::find($userId->user_id);
                    }
                }
                if ($results[1]!=$results[2]) {
                    foreach ($users2 as $userId) {
                        $users3[] = User::find($userId->user_id);
                    }
                }
            
        }
        elseif($results[0]==$results[1]){
                $users = DB::table('age_group_gender_user')
                    ->where('age_group_gender_id', $gender->id)
                    ->where(function ($query) use ($results) {
                        $query->orwhereIn('one', [$results[0],$results[1]])
                            ->orWhereIn('two',[$results[0],$results[1]])
                            ->orWhereIn('third', [$results[0],$results[1]]);
                    })->get();
                    $users1Test = DB::table('age_group_gender_user')
                    ->where('age_group_gender_id', $gender->id)
                    ->where(function ($query) use ($results) {
                        $query->orwhereIn('one', [$results[0],$results[1]])
                            ->orWhereIn('two',[$results[0],$results[1]])
                            ->orWhereIn('third', [$results[0],$results[1]]);
                    })->pluck('user_id');
                    // dd($usersTest);
                foreach ($users as $userId) {
                    $users1[] = User::find($userId->user_id);
                    DB::table('age_group_gender_user')
                    ->where('age_group_gender_id', $gender->id)
                    ->Where('user_id',$userId->user_id)
                   ->update(['marks'=>$gender->first_place]);
                }
                if($results[2]){
                        $usersSecond = DB::table('age_group_gender_user')
                            ->where('age_group_gender_id', $gender->id)
                            ->where(function ($query) use ($results) {
                                $query->orwhere('one', $results[2])
                                    ->orWhere('two',$results[2])
                                    ->orWhere('third', $results[2]);
                            })->get();
                            $users2Test = DB::table('age_group_gender_user')
                            ->where('age_group_gender_id', $gender->id)
                            ->where(function ($query) use ($results) {
                                $query->orwhere('one', $results[2])
                                    ->orWhere('two',$results[2])
                                    ->orWhere('third', $results[2]);
                            })->pluck('user_id');
                            $diff=array_diff($users2Test->toArray(),$users1Test->toArray());
                            //  dd($diff);
                            $users3 = User::find($diff);
                            foreach ($diff as $differ) {

                            DB::table('age_group_gender_user')
                    ->where('age_group_gender_id', $gender->id)
                    ->Where('user_id',$differ)
                   ->update(['marks'=>$gender->third_place]);
                         }
                        // dd($users3);
                    
                }
                if ($results[0]!=$results[1]) {
                    foreach ($users2 as $userId) {
                        $users2[] = User::find($userId->user_id);
                    }
                }
                // dd($users2Test);
            
        }
elseif($results[1]==$results[2]){
        $users = DB::table('age_group_gender_user')
            ->where('age_group_gender_id', $gender->id)
            ->where(function ($query) use ($results) {
                $query->orwhereIn('one', [$results[1],$results[2]])
                    ->orWhereIn('two',[$results[1],$results[2]])
                    ->orWhereIn('third', [$results[1],$results[2]]);
            })->get();
            $users2Test = DB::table('age_group_gender_user')
            ->where('age_group_gender_id', $gender->id)
            ->where(function ($query) use ($results) {
                $query->orwhereIn('one', [$results[1],$results[2]])
                    ->orWhereIn('two',[$results[1],$results[2]])
                    ->orWhereIn('third', [$results[1],$results[2]]);
            })->pluck('user_id');

        // foreach ($users as $userId) {
        //     $users2[] = User::find($userId->user_id);
        // }
        if($results[0]){
                $usersFirst= DB::table('age_group_gender_user')
                    ->where('age_group_gender_id', $gender->id)
                    ->where(function ($query) use ($results) {
                        $query->orwhere('one', $results[0])
                            ->orWhere('two',$results[0])
                            ->orWhere('third', $results[0]);
                    })->get();
                    $users1Test= DB::table('age_group_gender_user')
                    ->where('age_group_gender_id', $gender->id)
                    ->where(function ($query) use ($results) {
                        $query->orwhere('one', $results[0])
                            ->orWhere('two',$results[0])
                            ->orWhere('third', $results[0]);
                    })->pluck('user_id');
    // dd($users2Test);
                foreach ($usersFirst as $userId) {
                    $users1[] = User::find($userId->user_id);
                    DB::table('age_group_gender_user')
                    ->where('age_group_gender_id', $gender->id)
                    ->Where('user_id',$userId->user_id)
                   ->update(['marks'=>$gender->first_place]);
                }
                $diff=array_diff($users2Test->toArray(),$users1Test->toArray());
               
                $users2= User::find($diff);
                foreach($diff as $differ){
                    DB::table('age_group_gender_user')
                    ->where('age_group_gender_id', $gender->id)
                    ->Where('user_id',$differ)
                   ->update(['marks'=>$gender->second_place]);
                }
              
                // foreach ($diff as $userId) {
                // $users3 = User::find($diff);
        }
        if ($results[1]!=$results[2]) {
            foreach ($users2 as $userId) {
                $users3[] = User::find($userId->user_id);
            }
        }
    
}
else{
    if($results[0]){
            $usersFirst= DB::table('age_group_gender_user')
                ->where('age_group_gender_id', $gender->id)
                ->where(function ($query) use ($results) {
                    $query->orwhere('one', $results[0])
                        ->orWhere('two',$results[0])
                        ->orWhere('third', $results[0]);
                })->get();
                $users1Test= DB::table('age_group_gender_user')
                ->where('age_group_gender_id', $gender->id)
                ->where(function ($query) use ($results) {
                    $query->orwhere('one', $results[0])
                        ->orWhere('two',$results[0])
                        ->orWhere('third', $results[0]);
                })->pluck('user_id');

            foreach ($usersFirst as $userId) {
                $users1[] = User::find($userId->user_id);
                DB::table('age_group_gender_user')
                ->where('age_group_gender_id', $gender->id)
                ->Where('user_id',$userId->user_id)
               ->update(['marks'=>$gender->first_place]);
            }
        
    }
    if ($results[1]) {
        $usersSecond= DB::table('age_group_gender_user')
        ->where('age_group_gender_id', $gender->id)
        ->where(function ($query) use ($results) {
            $query->orwhere('one', $results[1])
                ->orWhere('two',$results[1])
                ->orWhere('third', $results[1]);
        })->get();
        $users2Test= DB::table('age_group_gender_user')
        ->where('age_group_gender_id', $gender->id)
        ->where(function ($query) use ($results) {
            $query->orwhere('one', $results[1])
                ->orWhere('two',$results[1])
                ->orWhere('third', $results[1]);
        })->pluck('user_id');

  $diff=array_diff($users2Test->toArray(),$users1Test->toArray());
                $users2= User::find($diff);
                foreach ($diff as $differ) {

                DB::table('age_group_gender_user')
                ->where('age_group_gender_id', $gender->id)
                ->Where('user_id',$differ)
               ->update(['marks'=>$gender->second_place]);
                }
    // foreach ($usersSecond as $userId) {
    //     $users2[] = User::find($userId->user_id);
    // }

    }
    if ($results[2]) {
        $usersThird= DB::table('age_group_gender_user')
        ->where('age_group_gender_id', $gender->id)
        ->where(function ($query) use ($results) {
            $query->orwhere('one', $results[2])
                ->orWhere('two',$results[2])
                ->orWhere('third', $results[2]);
        })->get();
        $users3Test= DB::table('age_group_gender_user')
        ->where('age_group_gender_id', $gender->id)
        ->where(function ($query) use ($results) {
            $query->orwhere('one', $results[2])
                ->orWhere('two',$results[2])
                ->orWhere('third', $results[2]);
        })->pluck('user_id');
        $diff=array_diff($users3Test->toArray(),$users2Test->toArray());
        $diff1=array_diff($users3Test->toArray(),$users1Test->toArray());
        $diff3=array_intersect($diff, $diff1);
        $users3= User::find($diff3);
        // $users4= User::find($diff1);

                // dd($users3);

        foreach ($diff3 as $differ) {

        DB::table('age_group_gender_user')
        ->where('age_group_gender_id', $gender->id)
        ->Where('user_id',$differ)
       ->update(['marks'=>$gender->third_place]);
        }
                }
}
}
} 
$url="/event/final-results";
        return response()->json([
            'url'=>$url
        ]);
    }
    public function FinalResults(Request $request)
    {
        if(Auth::user()->hasRole(7)){
            $id = Session::get('id');
            $seasons = Season::all();
            $genders = AgeGroupGender::with('ageGroupEvent')->get();
            $ageGroups = AgeGroup::where('organization_id',  Auth::user()->organization_id?Auth::user()->organization_id:$id)->get();
            $leagues = League::where('organization_id', Auth::user()->organization_id?Auth::user()->organization_id:$id)->get();
            $child_id=array();
            if(Auth::user()->children){
                $user_ids=Auth::user()->children;
                foreach($user_ids as $user_id){
                    $child_id[]=$user_id->id;
                }                 
            }else{
                    $child_id[]=null;
            }
            array_push($child_id,Auth::user()->id);
            $registrations = Registration::whereIn('user_id',$child_id)->get();
            $organizations=Organization::all();
            $header=null;
            $setting=null;
            return view('admin.events.results', compact('header','organizations','setting', 'leagues', 'registrations', 'seasons', 'genders',   'ageGroups','id'));
        }
        else{       
        $id = Session::get('id') ? Session::get('id') : '';
        $seasons = Season::all();
        $genders = AgeGroupGender::with('ageGroupEvent')->get();
        $gender = Gender::all();
        $ageGroups = AgeGroup::where('organization_id',  Auth::user()->organization_id?Auth::user()->organization_id:$id)->get();
        $leagues = League::where('organization_id', Auth::user()->organization_id?Auth::user()->organization_id:$id)->get();
        $mainEvents = MainEvent::where('organization_id',  Auth::user()->organization_id?Auth::user()->organization_id:$id)->get();
        $events = Event::where('organization_id', Auth::user()->organization_id?Auth::user()->organization_id:$id)->get();
        $agegroups = AgeGroup::where('organization_id', Auth::user()->organization_id?Auth::user()->organization_id:$id)->get();
        $setting = OrganizationSetting::where('organization_id', Auth::user()->organization_id !== null ? Auth::user()->organization_id : $id)->first();
        $header = $setting ? $setting->header : '';
        return view('admin.events.results', compact('header','setting','gender', 'leagues', 'mainEvents', 'seasons', 'genders',   'ageGroups', 'events','id'));
        }
    }
    public function Results(Request $request)
    {
        $id = Session::get('id') ? Session::get('id') : '';
        $ageGroupGenderId = Session::get('ageGroupId') ? Session::get('ageGroupId') : '';
        $gen=$request->input('gender');
        $genUser=AgeGroupGender::find($gen);
        $seasons = Season::all();
        $genders = AgeGroupGender::with('ageGroupEvent')->get();
        $gender = Gender::all();
        $header=null;
        $setting=null;
        if($genUser->ageGroupEvent->Event->mainEvent->event_category_id==3){
                    $ageGroupGender = DB::table('age_group_genders')->where('id', $gen)->update(['status' => 1]);

        }
        else{
                    $ageGroupGender = DB::table('age_group_genders')->where('id', $ageGroupGenderId)->update(['status' => 1]);

        }
        
        $ageGroups = AgeGroup::where('organization_id', Auth::user()->organization_id !== null ? Auth::user()->organization_id : $id)->get();
        $leagues = League::where('organization_id', Auth::user()->organization_id !== null ? Auth::user()->organization_id : $id)->get();
        $mainEvents = MainEvent::where('organization_id', Auth::user()->organization_id !== null ? Auth::user()->organization_id : $id)->get();
        $events = Event::where('organization_id', Auth::user()->organization_id)->get();
        $agegroups = AgeGroup::where('organization_id', Auth::user()->organization_id)->get();
        return redirect('/event/final-results');
    }
    public function players($id, $eventId)
    {

        $event = Event::find($eventId);
        $gender = AgeGroupGender::find($id);
        Session::put('gen',$id);
        if ($event->mainEvent->event_category_id == 1) {
            $count = $gender->venue_detail_id;
            $venueDetail = VenueDetail::where('id', $count)->first();
            $trackCount = $venueDetail->track_event_count;
            $eventAgeGroup = AgeGroupEvent::where("id", $gender->age_group_event_id)->first();
            $ageGroup = AgeGroup::where("id", $eventAgeGroup->age_group_id)->first()->name;
            $genders = $gender->users()->orderBy('club_id','ASC')->orderBy('id','ASC')->get();
 
            $clubUsers=$genders->toArray();
      
           
            $rounds = ceil(count($clubUsers) / $trackCount);
            $remainder = count($clubUsers) % $trackCount;
    
            $count = 1;
            while ($count <= $trackCount) {
                $roundCount = 1;
                while ($roundCount <= $rounds) {
    
                 
                    $user = array_shift($clubUsers);
                    $trackUsers[$roundCount][] = $user;
    
                    $roundCount++;
                }
                $count++;
            }
            if (count($genders) <= 3) {
                $players =$gender->users;
                return view('players.single-event-3players', compact('event', 'players', 'trackCount',  'gender','ageGroup'));
            } 
            else {
                $players = $trackUsers;
                return view('players.single-event-players', compact('players', 'trackCount',  'gender', 'event', 'ageGroup'));
            }
        }
        if ($event->mainEvent->event_category_id == 2) {
            $first_names = null;
            $threes = null;
            $players = $gender->users;
            // dd("hi");
            return view('players.field-events', compact('event',  'players', 'gender', 'first_names', 'threes'));
        }
        if ($event->mainEvent->event_category_id == 3) {
            $count = $gender->venue_detail_id;

            $venueDetail = VenueDetail::where('id', $count)->first();
            $trackCount = $venueDetail->track_event_count;
          $genders = $gender->teams()->orderBy('club_id','ASC')->orderBy('id','ASC')->get();
 
            $clubUsers=$genders->toArray();
            $users=count($gender->teams);
           
            $rounds = ceil(count($clubUsers) / $trackCount);
            $remainder = count($clubUsers) % $trackCount;
    
            $count = 1;
            while ($count <= $trackCount) {
                $roundCount = 1;
                while ($roundCount <= $rounds) {
    
                                                                                                                                                                    
                    $user = array_shift($clubUsers);
                    $trackUsers[$roundCount][] = $user;
   
                    $roundCount++;
                }
                $count++;
            }
            if (count($genders) <= 3) {
                $players =$gender->teams;
            return view('players.event-players', compact('players', 'trackCount',  'gender', 'event', 'users'));
            } 
            else {
                $players = $trackUsers;
            return view('players.event-players', compact('players', 'trackCount',  'gender', 'event','users'));
            }
        

        }
    }
    public function eventStatus(Request $request, $id)
    {
        $gender = AgeGroupGender::find($id);
        return response()->json([
            'gender' => $gender,

        ]);
    }
    public function fieldEventFirstRound($id, Request $request)
    {
        
        $gender = AgeGroupGender::find($id);
        $first = str_replace (",", ".",$request->input('first'));
        $ageGroupGenderUser = DB::table('age_group_gender_user')->where('age_group_gender_id', $gender->id)->where('user_id', $request->input('player'))->update(['one' => $first]);
        $ageGroupGender = DB::table('age_group_genders')->where('id', $id)->update(['status' => 0]);
        $id = $gender->id;
        $event = $request->input('event');
        $url = '/players/' . $id . '/' . $event . '';
        return response()->json([
            'url' => $url,

        ]);
    }
    public function fieldEventSecondRound(Request $request, $id)
    {
        $gender = AgeGroupGender::find($id);
        $second =str_replace (",", ".",$request->input('second'));
        $ageGroupGenderUser = DB::table('age_group_gender_user')->where('age_group_gender_id', $gender->id)->where('user_id', $request->input('player'))->update(['two' => $second]);
        $id = $gender->id;
        $event = $request->input('event');
        $url = '/players/' . $id . '/' . $event . '';
        return response()->json([
            'url' => $url,

        ]);
    }


    public function fieldEventThirdRound(Request $request, $id)
    {
        $gender = AgeGroupGender::find($id);
        $third = str_replace (",", ".",$request->input('third'));
        $ageGroupGenderUser = DB::table('age_group_gender_user')->where('age_group_gender_id', $gender->id)->where('user_id', $request->input('player'))->update(['third' => $third]);
        $id = $gender->id;
        $event = $request->input('event');
        $url = '/players/' . $id . '/' . $event . '';
        return response()->json([
            'url' => $url,

        ]);
    }

    public function fieldEventResults(Request $request)
    {
        $gender = AgeGroupGender::find($request->input('gender'));
        $ageGroupGender = DB::table('age_group_genders')->where('id', $request->input('gender'))->update(['status' => 1]);
        $id = $gender->id;
        $players = $gender->users;

        $max = array();
        $userIds = array();
        $times = DB::table('age_group_gender_user')
            ->where('age_group_gender_id', $gender->id)
            ->get();
        foreach ($times as $key => $time) {
            if ($time->one >= $time->two) {
                if ($time->one >= $time->third) {
                    $max[] = $time->one;
                } else {
                    $max[] = $time->third;
                }
            } elseif ($time->one <= $time->two) {
                if ($time->third <= $time->two) {
                    $max[] = $time->two;
                } else {
                    $max[] = $time->third;
                }
            }
        }

        rsort($max);
        $maximum=array_slice($max, 0, 3);
        $numeric=array();
        foreach($maximum as $one){
            if(is_numeric($one)){
                $numeric[]=$one;
            }
        }
        $maxes=array_unique($max);
        $userLists = array();
        $users1 = array();
        $users2 = array();
         $users3 = array();
      $users4=array();
        $results = array_filter($numeric); 

        if(count($results)==0){
            $users[]=null;
            $users2[]=null;
            $users3[]=null;

        }
        else if(count($results)==1){
            $users = DB::table('age_group_gender_user')
                    ->where('age_group_gender_id', $gender->id)
                    ->where(function ($query) use ($results) {
                        $query->orwhereIn('one', [$results[0]])
                            ->orWhereIn('two',[$results[0]])
                            ->orWhereIn('third', [$results[0]]);
                    })->get();
                    $users1Test = DB::table('age_group_gender_user')
                    ->where('age_group_gender_id', $gender->id)
                    ->where(function ($query) use ($results) {
                        $query->orwhereIn('one', [$results[0]])
                            ->orWhereIn('two',[$results[0]])
                            ->orWhereIn('third', [$results[0]]);
                    })->pluck('user_id');
                    // dd($usersTest);
    
                foreach ($users as $userId) {
                    $users1[] = User::find($userId->user_id);
                 
                }
        }
        else if(count($results)==2){
if($results[0]==$results[1]){
                $users = DB::table('age_group_gender_user')
                    ->where('age_group_gender_id', $gender->id)
                    ->where(function ($query) use ($results) {
                        $query->orwhereIn('one', [$results[0],$results[1]])
                            ->orWhereIn('two',[$results[0],$results[1]])
                            ->orWhereIn('third', [$results[0],$results[1]]);
                    })->get();
                    $users1Test = DB::table('age_group_gender_user')
                    ->where('age_group_gender_id', $gender->id)
                    ->where(function ($query) use ($results) {
                        $query->orwhereIn('one', [$results[0],$results[1]])
                            ->orWhereIn('two',[$results[0],$results[1]])
                            ->orWhereIn('third', [$results[0],$results[1]]);
                    })->pluck('user_id');
                    // dd($usersTest);
    
                foreach ($users as $userId) {
                    $users1[] = User::find($userId->user_id);
                 
                }
        
                if ($results[0]!=$results[1]) {
                    foreach ($users2 as $userId) {
                        $users2[] = User::find($userId->user_id);
                    }
                }            
        }
        else{
    if($results[0]){
            $usersFirst= DB::table('age_group_gender_user')
                ->where('age_group_gender_id', $gender->id)
                ->where(function ($query) use ($results) {
                    $query->orwhere('one', $results[0])
                        ->orWhere('two',$results[0])
                        ->orWhere('third', $results[0]);
                })->get();
                $users1Test= DB::table('age_group_gender_user')
                ->where('age_group_gender_id', $gender->id)
                ->where(function ($query) use ($results) {
                    $query->orwhere('one', $results[0])
                        ->orWhere('two',$results[0])
                        ->orWhere('third', $results[0]);
                })->pluck('user_id');

            foreach ($usersFirst as $userId) {
                $users1[] = User::find($userId->user_id);
              
            }
        
    }
    if ($results[1]) {
        $usersSecond= DB::table('age_group_gender_user')
        ->where('age_group_gender_id', $gender->id)
        ->where(function ($query) use ($results) {
            $query->orwhere('one', $results[1])
                ->orWhere('two',$results[1])
                ->orWhere('third', $results[1]);
        })->get();
        $users2Test= DB::table('age_group_gender_user')
        ->where('age_group_gender_id', $gender->id)
        ->where(function ($query) use ($results) {
            $query->orwhere('one', $results[1])
                ->orWhere('two',$results[1])
                ->orWhere('third', $results[1]);
        })->pluck('user_id');

  $diff=array_diff($users2Test->toArray(),$users1Test->toArray());
                $users2= User::find($diff);
                foreach ($diff as $differ) {

              
                }
    // foreach ($usersSecond as $userId) {
    //     $users2[] = User::find($userId->user_id);
    // }

    }
  
    }

        }
        else{
    if($results[0]==$results[1]&& $results[1]==$results[2]){
                $users = DB::table('age_group_gender_user')
                    ->where('age_group_gender_id', $gender->id)
                    ->where(function ($query) use ($results) {
                        $query->orwhereIn('one', [$results[1],$results[2],$results[0]])
                            ->orWhereIn('two',[$results[1],$results[2],$results[0]])
                            ->orWhereIn('third', [$results[1],$results[2],$results[0]]);
                    })->get();
                foreach ($users as $userId) {
                    $users1[] = User::find($userId->user_id);
                  
                }
                if ($results[1]!=$results[2]) {
                    foreach ($users2 as $userId) {
                        $users2[] = User::find($userId->user_id);
                    }
                }
                if ($results[1]!=$results[2]) {
                    foreach ($users2 as $userId) {
                        $users3[] = User::find($userId->user_id);
                    }
                }
            
        }
        elseif($results[0]==$results[1]){
                $users = DB::table('age_group_gender_user')
                    ->where('age_group_gender_id', $gender->id)
                    ->where(function ($query) use ($results) {
                        $query->orwhereIn('one', [$results[0],$results[1]])
                            ->orWhereIn('two',[$results[0],$results[1]])
                            ->orWhereIn('third', [$results[0],$results[1]]);
                    })->get();
                    $users1Test = DB::table('age_group_gender_user')
                    ->where('age_group_gender_id', $gender->id)
                    ->where(function ($query) use ($results) {
                        $query->orwhereIn('one', [$results[0],$results[1]])
                            ->orWhereIn('two',[$results[0],$results[1]])
                            ->orWhereIn('third', [$results[0],$results[1]]);
                    })->pluck('user_id');
                    // dd($usersTest);
                foreach ($users as $userId) {
                    $users1[] = User::find($userId->user_id);
                   
                }
                if($results[2]){
                        $usersSecond = DB::table('age_group_gender_user')
                            ->where('age_group_gender_id', $gender->id)
                            ->where(function ($query) use ($results) {
                                $query->orwhere('one', $results[2])
                                    ->orWhere('two',$results[2])
                                    ->orWhere('third', $results[2]);
                            })->get();
                            $users2Test = DB::table('age_group_gender_user')
                            ->where('age_group_gender_id', $gender->id)
                            ->where(function ($query) use ($results) {
                                $query->orwhere('one', $results[2])
                                    ->orWhere('two',$results[2])
                                    ->orWhere('third', $results[2]);
                            })->pluck('user_id');
                            $diff=array_diff($users2Test->toArray(),$users1Test->toArray());
                            //  dd($diff);
                            $users3 = User::find($diff);
                            foreach ($diff as $differ) {

                           
                         }
                        // dd($users3);
                    
                }
                if ($results[0]!=$results[1]) {
                    foreach ($users2 as $userId) {
                        $users2[] = User::find($userId->user_id);
                    }
                }
                // dd($users2Test);
            
        }
elseif($results[1]==$results[2]){
        $users = DB::table('age_group_gender_user')
            ->where('age_group_gender_id', $gender->id)
            ->where(function ($query) use ($results) {
                $query->orwhereIn('one', [$results[1],$results[2]])
                    ->orWhereIn('two',[$results[1],$results[2]])
                    ->orWhereIn('third', [$results[1],$results[2]]);
            })->get();
            $users2Test = DB::table('age_group_gender_user')
            ->where('age_group_gender_id', $gender->id)
            ->where(function ($query) use ($results) {
                $query->orwhereIn('one', [$results[1],$results[2]])
                    ->orWhereIn('two',[$results[1],$results[2]])
                    ->orWhereIn('third', [$results[1],$results[2]]);
            })->pluck('user_id');

        // foreach ($users as $userId) {
        //     $users2[] = User::find($userId->user_id);
        // }
        if($results[0]){
                $usersFirst= DB::table('age_group_gender_user')
                    ->where('age_group_gender_id', $gender->id)
                    ->where(function ($query) use ($results) {
                        $query->orwhere('one', $results[0])
                            ->orWhere('two',$results[0])
                            ->orWhere('third', $results[0]);
                    })->get();
                    $users1Test= DB::table('age_group_gender_user')
                    ->where('age_group_gender_id', $gender->id)
                    ->where(function ($query) use ($results) {
                        $query->orwhere('one', $results[0])
                            ->orWhere('two',$results[0])
                            ->orWhere('third', $results[0]);
                    })->pluck('user_id');
    // dd($users2Test);
                foreach ($usersFirst as $userId) {
                    $users1[] = User::find($userId->user_id);
                   
                }
                $diff=array_diff($users2Test->toArray(),$users1Test->toArray());
               
                $users2= User::find($diff);
                foreach($diff as $differ){
                    
                }
              
                // foreach ($diff as $userId) {
                // $users3 = User::find($diff);
        }
        if ($results[1]!=$results[2]) {
            foreach ($users2 as $userId) {
                $users3[] = User::find($userId->user_id);
            }
        }
    
}
else{
    if($results[0]){
            $usersFirst= DB::table('age_group_gender_user')
                ->where('age_group_gender_id', $gender->id)
                ->where(function ($query) use ($results) {
                    $query->orwhere('one', $results[0])
                        ->orWhere('two',$results[0])
                        ->orWhere('third', $results[0]);
                })->get();
                $users1Test= DB::table('age_group_gender_user')
                ->where('age_group_gender_id', $gender->id)
                ->where(function ($query) use ($results) {
                    $query->orwhere('one', $results[0])
                        ->orWhere('two',$results[0])
                        ->orWhere('third', $results[0]);
                })->pluck('user_id');

            foreach ($usersFirst as $userId) {
                $users1[] = User::find($userId->user_id);
                
            }
        
    }
    if ($results[1]) {
        $usersSecond= DB::table('age_group_gender_user')
        ->where('age_group_gender_id', $gender->id)
        ->where(function ($query) use ($results) {
            $query->orwhere('one', $results[1])
                ->orWhere('two',$results[1])
                ->orWhere('third', $results[1]);
        })->get();
        $users2Test= DB::table('age_group_gender_user')
        ->where('age_group_gender_id', $gender->id)
        ->where(function ($query) use ($results) {
            $query->orwhere('one', $results[1])
                ->orWhere('two',$results[1])
                ->orWhere('third', $results[1]);
        })->pluck('user_id');

  $diff=array_diff($users2Test->toArray(),$users1Test->toArray());
                $users2= User::find($diff);
                foreach ($diff as $differ) {

                
                }
    // foreach ($usersSecond as $userId) {
    //     $users2[] = User::find($userId->user_id);
    // }

    }
    if ($results[2]) {
        $usersThird= DB::table('age_group_gender_user')
        ->where('age_group_gender_id', $gender->id)
        ->where(function ($query) use ($results) {
            $query->orwhere('one', $results[2])
                ->orWhere('two',$results[2])
                ->orWhere('third', $results[2]);
        })->get();
        $users3Test= DB::table('age_group_gender_user')
        ->where('age_group_gender_id', $gender->id)
        ->where(function ($query) use ($results) {
            $query->orwhere('one', $results[2])
                ->orWhere('two',$results[2])
                ->orWhere('third', $results[2]);
        })->pluck('user_id');
        $diff=array_diff($users3Test->toArray(),$users2Test->toArray());
        $diff1=array_diff($users3Test->toArray(),$users1Test->toArray());
        $diff3=array_intersect($diff, $diff1);
        $users3= User::find($diff3);
        // $users4= User::find($diff1);

                // dd($users3);

        foreach ($diff3 as $differ) {

      
        }
    //     foreach ($diff1 as $differ) {

    //    DB::table('age_group_gender_user')
    //    ->where('age_group_gender_id', $gender->id)
    //    ->Where('user_id',$differ)
    //   ->update(['marks'=>Auth::user()->organization->athelaticsetting->third_place]);
    //     }
    
}
    }
}
        return response()->json([
            'players' => $players,
            'users' => $users1,
            'users2' => $users2,
            'users3' => $users3,
            // 'users4'=>$users4



        ]);
    }
    public function ongoingParticipants(Request $request,$id){
        $ageGroupGender=AgeGroupGender::find($id);
        $ageGroupEvent = AgeGroupEvent::find($ageGroupGender->age_group_event_id);
        $event = Event::find($ageGroupEvent->event_id);

        if ($event->mainEvent->event_category_id == 1) {
             $venues = $event->league->venue->venueDetails;
            foreach ($venues as $venue) {
                $count = $venue->where('id', $ageGroupGender->venue_detail_id)->first();
                $trackCount = $count->track_event_count;
            }
        
            $gender = AgeGroupGender::find($id);
            $genders = $gender->users()->orderBy('club_id','ASC')->orderBy('id','ASC')->get();
            $clubUsers=$genders->toArray();
            //  $clubUsers = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13];
            //   $trackCount = 5;
            $rounds = ceil(count($clubUsers) / $trackCount);
            $remainder = count($clubUsers) % $trackCount;
    
            $count = 1;
            while ($count <= $trackCount) {
                $roundCount = 1;
                while ($roundCount <= $rounds) {
    
                    // if (
                    //     !count($clubUsers) ||
                    //     $remainder == 1 && ($rounds < 3 && ($roundCount == $rounds && $count > 3 || $roundCount == $rounds - 1 && $count > $trackCount - 2) || $rounds >= 3 && ($roundCount == $rounds && $count > 3 || ($roundCount >= $rounds - 2 && $count > $trackCount - 1))) ||
                    //     $remainder == 2 && ($roundCount == $rounds && $count > 3 || ($roundCount == $rounds - 1 && $count > $trackCount - 1)) ||
                    //     $remainder > 2 && ($roundCount == $rounds && $count > $remainder)
                    // ) {
                    //     break;
                    // }
                    $user = array_shift($clubUsers);
                    $trackUsers[$roundCount][] = $user;
    
                    $roundCount++;
                }
                $count++;
            }

            if (count($genders) <= 3) {
               
                $players =$gender->users;
                 return view('players.track-round-selection', compact('event', 'players', 'trackCount',  'gender'));
            } 
            else {
               
                $players = $trackUsers;
              
                return view('players.round-selection', compact('event', 'trackCount', 'players', 'gender'));
            }
        }
        if ($event->mainEvent->event_category_id == 2) {

            $gender = AgeGroupGender::find($ageGroupGender);
            $players = $gender->users;
            $first_names = null;

            return view('players.field-events', compact('first_names', 'event',  'players', 'gender'));
        }
        if ($event->mainEvent->event_category_id == 3) {

            $venues = $event->league->venue->venueDetails;
            foreach ($venues as $venue) {
                $count = $venue->where('id', $ageGroupGender->venue_detail_id)->first();
                $trackCount = $count->track_event_count;
            }            $gender = AgeGroupGender::find($id);
            $users = count($gender->teams);
            if ($users <= 3) {
            $players = $gender->teams;
            return view('players.group-round-selection', compact('event', 'trackCount', 'players', 'gender','users'));
            } 
            else {
            $reminder = $users % $trackCount;
            $division = $users / $trackCount;
            $players = $gender->teams;
            $subs = 0;
            if ($reminder > 0 && $reminder < 3) {
                $subs = (3 - $reminder);
            }
            $players = $gender->teams->chunk($trackCount);
            if ($subs == 1 || $subs == 2) {
                $user = $players[(int)$division - 1]->pop();
                $players[(int)$division]->push($user);
            }

            if ($subs == 2) {
                if ($division - 2 > 0) {
                    $user = $players[(int)$division - 2]->pop();
                    $players[(int)$division]->push($user);
                } else {
                    $user = $players[(int)$division - 1]->pop();
                    $players[(int)$division]->push($user);
                }
            }

            return view('players.group-round-selection', compact('event', 'trackCount', 'players', 'gender','users'));
            }
        }
    }
    public function lateComers($id){
        $gender=AgeGroupGender::find($id);
        $users=array();
        $AgegroupEvent = AgeGroupEvent::where('id', $gender->age_group_event_id)->first();
        $Agegroup = AgeGroup::where('id', $AgegroupEvent->age_group_id)->first();
        $event = Event::where('id', $AgegroupEvent->event_id)->first();
        foreach($event->registrations as $registration){
            if($registration->is_approved==1){
                if($registration->user->is_approved==1){
                    $gen=$registration->user->gender=='male'?1:2;
                    if($gender->gender_id == $gen){
                         $mine = Carbon::createFromFormat('Y-m-d', $registration->user->dob)->format('Y');
                                        $league1 = Carbon::createFromFormat('Y-m-d', $event->league->to_date)->format('Y');
                                        $age = $league1 - $mine;
                                    $exp = preg_split("/-/", $Agegroup->name);
                                    if (isset($exp[1])){
                                        
                                    
                                  
                                        if (($exp[0] == $age || $exp[0] < $age) && ($exp[1] == $age || $exp[1] > $age)) {
                                            $users[]=$registration->user->id;
                                        }
                    }
                     elseif ($exp[0] == $age) {
                                        $users[]=$registration->user->id;

                                       
                                           
                                           }
                }

            }
            }
        }
        $participatedUsers=DB::table('age_group_gender_user')->where('age_group_gender_id',$id)->get();
        $players=array();
        foreach($participatedUsers as $userrr){
            $players[]=$userrr->user_id;
        }

$missedPlayers=array_diff($users,$players);
$newPlayers=array();
foreach($missedPlayers as $missedplayer){
    $newPlayers[]=User::find($missedplayer);
}
                                       
    return response()->json([
                'users' => $newPlayers,
                'gender'=>$id
                
            ]);      
                                        


    }
    public function trackDivide(Request $request)
    {
        $ageGroupGender = Session::get('ageGroupGender');
        $ageGroupgender = AgeGroupGender::find($ageGroupGender);
        $ageGroupEvent = AgeGroupEvent::find($ageGroupgender->age_group_event_id);
        $ev = Event::find($ageGroupEvent->event_id);
        $event = Session::get('event');

        if ($ageGroupgender->ageGroupEvent->Event->mainEvent->event_category_id == 1) {
            $trackCount = Session::get('trackCount') ? Session::get('trackCount') : '';
            $gender = AgeGroupGender::find($ageGroupGender);
            $genders = $gender->users()->orderBy('club_id','ASC')->orderBy('id','ASC')->get();
            $clubUsers=$genders->toArray();
            $rounds = ceil(count($clubUsers) / $trackCount);
            $remainder = count($clubUsers) % $trackCount;
            $count = 1;
            while ($count <= $trackCount) {
                $roundCount = 1;
                while ($roundCount <= $rounds) {
    
                    // if (
                    //     !count($clubUsers) ||
                    //     $remainder == 1 && ($rounds < 3 && ($roundCount == $rounds && $count > 3 || $roundCount == $rounds - 1 && $count > $trackCount - 2) || $rounds >= 3 && ($roundCount == $rounds && $count > 3 || ($roundCount >= $rounds - 2 && $count > $trackCount - 1))) ||
                    //     $remainder == 2 && ($roundCount == $rounds && $count > 3 || ($roundCount == $rounds - 1 && $count > $trackCount - 1)) ||      
                    //     $remainder > 2 && ($roundCount == $rounds && $count > $remainder)
                    // ) 
                    // {
                    //     break;
                    // }
                    $user = array_shift($clubUsers);
                    $trackUsers[$roundCount][] = $user;
                    $roundCount++;
                }
                $count++;
            }

            if (count($genders) <= $trackCount) {
               
                $players =$gender->users;
                // return response()->json(['event'=>$event,'players'=>$players,'trackCount'=>$trackCount,'gender'=>$gender]);
                 return view('players.track-round-selection', compact('event', 'players', 'trackCount',  'gender'));
            } 
            else {
               
                $players = $trackUsers;
               
                // $subs = 0;  
                // if ($reminder > 0 && $reminder < 3) {
                //     $subs = (3 - $reminder);
                // }
                
                // if ($subs == 1 || $subs == 2) {
                //     $user = $players[(int)$division - 1]->pop();
                //     $players[(int)$division]->push($user);
                // }

                // if ($subs == 2) {
                //     if ($division - 2 > 0) {
                //         $user = $players[(int)$division - 2]->pop();
                //         $players[(int)$division]->push($user);
                //     } else {
                //         $user = $players[(int)$division - 1]->pop();
                //         $players[(int)$division]->push($user);
                //     }
                // }
                return view('players.round-selection', compact('event', 'trackCount', 'players', 'gender'));
            }
        }
        if ($ageGroupgender->ageGroupEvent->Event->mainEvent->event_category_id == 2) {

            $gender = AgeGroupGender::find($ageGroupGender);
            $players = $gender->users;
            $first_names = null;

            return view('players.field-events', compact('first_names', 'event',  'players', 'gender'));
        }

        if ($ageGroupgender->ageGroupEvent->Event->mainEvent->event_category_id == 3) {
            $trackCount = Session::get('count') ? Session::get('count') : '';
            $gender = AgeGroupGender::find($ageGroupGender);
            $users = count($gender->teams);
                        $users = $gender->teams()->orderBy('club_id','ASC')->orderBy('id','ASC')->get();
   $clubUsers=$users->toArray();
            $rounds = ceil(count($clubUsers) / $trackCount);
            $remainder = count($clubUsers) % $trackCount;
            $count = 1;
            while ($count <= $trackCount) {
                $roundCount = 1;
                while ($roundCount <= $rounds) {
    
                  
                    $user = array_shift($clubUsers);
                    $trackUsers[$roundCount][] = $user;
                    $roundCount++;
                }
                $count++;
            }

            if (count($users) <= $trackCount) {
               
                $players =$gender->teams;
                // return response()->json(['event'=>$event,'players'=>$players,'trackCount'=>$trackCount,'gender'=>$gender]);
            return view('players.group-round-selection', compact('event', 'trackCount', 'players', 'gender','users'));
            } 
            else {
               
                $players = $trackUsers;
               
               
            return view('players.group-round-selection', compact('event', 'trackCount', 'players', 'gender','users'));
            }
            // if ($users<=$trackCount) {
            // $players = $gender->teams;
            // return view('players.group-round-selection', compact('event', 'trackCount', 'players', 'gender','users'));
            // } 
            // else {
            // $reminder = $users % $trackCount;
            // $division = $users / $trackCount;
            // $players = $gender->teams;
            // $subs = 0;
            // if ($reminder > 0 && $reminder < 3) {
            //     $subs = (3 - $reminder);
            // }
            // $players = $gender->teams->chunk($trackCount);
            // if ($subs == 1 || $subs == 2) {
            //     $user = $players[(int)$division - 1]->pop();
            //     $players[(int)$division]->push($user);
            // }

            // if ($subs == 2) {
            //     if ($division - 2 > 0) {
            //         $user = $players[(int)$division - 2]->pop();
            //         $players[(int)$division]->push($user);
            //     } else {
            //         $user = $players[(int)$division - 1]->pop();
            //         $players[(int)$division]->push($user);
            //     }
            // }
        
            
        }
    }

    public function heatstrackDivide(Request $request)
    {
        $gender = AgeGroupGender::find($request->input('gender'));
        $eventAgeGroup = AgeGroupEvent::where("id", $gender->age_group_event_id)->first();
        $ageGroup = AgeGroup::where("id", $eventAgeGroup->age_group_id)->first()->name;
        $event = Event::find($request->input('event'));
        $parties = Session::put('gender', $gender);


        if ($event->mainEvent->event_category_id == 1) {
            $count = $gender->venue_detail_id;
            $venueDetail = VenueDetail::where('id', $count)->first();
            $trackCount = $venueDetail->track_event_count;
            $allplayers = $request->players;

            $users = array();

            foreach ($allplayers as $allplayer) {
                $user = User::find($allplayer);
                $users[] = $user;
            }
            if (count($allplayers) == $trackCount || count($allplayers) < $trackCount) {
                $players = collect($users)->chunk($trackCount);
                $playerCpunt = $trackCount - 1;
                $lastPlayers = collect($users)->chunk($trackCount)->last();
                $lastPlayerCount = count($lastPlayers);
                $gender->users()->detach();
                $gender->users()->attach($allplayers, ['league_id' => $event->league_id]);
                DB::table('age_group_genders')->where('id', $gender->id)->update(['status' => 3]);
                return redirect('/final/participants');
            } else {

                $gender->users()->detach();
                $gender->users()->attach($allplayers, ['league_id' => $event->league_id]);
                $genders = $gender->users()->orderBy('club_id','ASC')->orderBy('id','ASC')->get();
                 $clubUsers=$genders->toArray();
                    $rounds = ceil(count($clubUsers) / $trackCount);
                    $remainder = count($clubUsers) % $trackCount;
                    $count = 1;
            while ($count <= $trackCount) {
                $roundCount = 1;
                while ($roundCount <= $rounds) {
    
                 
                    $user = array_shift($clubUsers);
                    $players[$roundCount][] = $user;
                    $roundCount++;
                }
                $count++;
            }
               
                return view('players.heats-round-selection', compact('event', 'players', 'gender',  'ageGroup'));
            }
        }
        if ($event->mainEvent->event_category_id == 3) {
            $allplayers = $request->players;
            $teams = array();

            foreach ($allplayers as $allplayer) {
                $team = Team::find($allplayer);
                $teams[] = $team;
            }
            $count = $gender->venue_detail_id;
            $venueDetail = VenueDetail::where('id', $count)->first();
            $trackCount = $venueDetail->track_event_count;
              $gender->teams()->detach();
                $gender->teams()->attach($allplayers, ['league_id' => $event->league_id]);
            if (count($allplayers) == $trackCount || count($allplayers) < $trackCount) {
                // $players = collect($teams)->chunk($trackCount
                
                $players=$gender->teams;
                $playerCpunt = $trackCount - 1;
                $lastPlayers = collect($teams)->chunk($trackCount)->last();
                $lastPlayerCount = count($lastPlayers);
                // dd("hi");
                DB::table('age_group_genders')->where('id', $gender->id)->update(['status' => 3]);
                return redirect('/final/participants');
                // return view('players.heats-final', compact('allplayers', 'players', 'trackCount', 'lastPlayerCount', 'gender', 'lastPlayers', 'playerCpunt', 'event', 'ageGroup'));
            } else {

                $users = count($gender->teams);
                $reminder = $users % $trackCount;
                $division = $users / $trackCount;
                $players = $gender->teams;
                $subs = 0;
                if ($reminder > 0 && $reminder < 3) {
                    $subs = (3 - $reminder);
                }
                $players = $gender->teams->chunk($trackCount);

                if ($subs == 1 || $subs == 2) {
                    $user = $players[(int)$division - 1]->pop();
                    $players[(int)$division]->push($user);
                }

                if ($subs == 2) {
                    if ($division - 2 > 0) {
                        $user = $players[(int)$division - 2]->pop();
                        $players[(int)$division]->push($user);
                    } else {
                        $user = $players[(int)$division - 1]->pop();
                        $players[(int)$division]->push($user);
                    }
                }
                // $gender->teams()->detach();
                // $gender->teams()->attach($allplayers, ['league_id' => $event->league_id]);
                return view('players.heats-round-selection', compact('event', 'players', 'trackCount',  'gender', 'ageGroup'));
            }
        }
    }
    public function heatstrackDivideFinal(Request $request, $id)
    {
        $gender = AgeGroupGender::find($id);
        $count = $gender->venue_detail_id;
        $venueDetail = VenueDetail::where('id', $count)->first();
        $trackCount = $venueDetail->track_event_count;
        if($gender->ageGroupEvent->Event->mainEvent->event_category_id==3){
            $allplayers = $gender->teams;
            $players =$allplayers;
        }
        else{
            $allplayers = $gender->users;
            $players =$allplayers;
        }
    
        $eventAgeGroup = AgeGroupEvent::where("id", $gender->age_group_event_id)->first();
        $event = Event::find($eventAgeGroup->event_id);
        $ageGroup = AgeGroup::find($eventAgeGroup->age_group_id)->name;
        return view('players.heats-final', compact('players', 'trackCount', 'gender',  'event', 'ageGroup'));
    }
    public function confirmation($id){
        $gender=AgeGroupGender::find($id);
        if($gender->ageGroupEvent->event->mainEvent->event_category_id==3){
              $genderUsers=DB::table('age_group_gender_team')->where('age_group_gender_id',$gender->id)->get();
        $users=array();
        foreach($genderUsers as $genderUser){
            $users[]=Team::find($genderUser->team_id)->name.'|'.$genderUser->time;
        }
        }else{
           $genderUsers=DB::table('age_group_gender_user')->where('age_group_gender_id',$gender->id)->get();
        $users=array();
        foreach($genderUsers as $genderUser){
            $users[]=User::find($genderUser->user_id)->userId.'|'.$genderUser->time;
        } 
        }
        
return response()->json([
                'genderUsers' => $users,'id'=>$id
              
            ]);    }
    public function lastParticipants(Request $request)
    {
        $gender = Session::get('gender');
        $eventAgeGroup = AgeGroupEvent::where("id", $gender->age_group_event_id)->first();
        $ageGroup = AgeGroup::where("id", $eventAgeGroup->age_group_id)->first()->name;
        $event = Event::find($eventAgeGroup->event_id);
        $players = $gender->users;
        $today=Carbon::now()->format('Y-m-d');
        if($event->mainEvent->event_category_id==3){
            $players=$gender->teams;
            return view('players.heats-finalGroupTeams', compact('players', 'gender', 'event', 'ageGroup','today'));

        }else{
        return view('players.heats-finalPlayers', compact('players', 'gender', 'event', 'ageGroup','today'));
        }
    }
    public function finalParticipants(Request $request){
        $allplayers=$request->input('users');
        
       $ageGroupGender=AgeGroupGender::find($request->input('ageGroupGender'));
       if($ageGroupGender->ageGroupEvent->Event->mainEvent->event_category_id==3){
        $ageGroupGender->teams()->detach();
        $ageGroupGender->teams()->attach($allplayers, ['league_id' => $ageGroupGender->ageGroupEvent->Event->league_id]);
       }else{
        $ageGroupGender->users()->detach();
        $ageGroupGender->users()->attach($allplayers, ['league_id' => $ageGroupGender->ageGroupEvent->Event->league_id]);
       }
       $gen=Session::put('gen',$ageGroupGender->id);
       $options = array(
        'cluster' => 'ap2',
        'useTLS' => false

    );
    $pusher = new Pusher(
        env('PUSHER_APP_KEY'),
        env('PUSHER_APP_SECRET'),
        env('PUSHER_APP_ID'),
        $options

    );
    $event=$ageGroupGender->ageGroupEvent->event->mainEvent->name;
    $eventId=$ageGroupGender->ageGroupEvent->event->id;
    $league=$ageGroupGender->ageGroupEvent->event->league->name;
    $organizer=$ageGroupGender->ageGroupEvent->event->user->first_name;
$gender=$ageGroupGender->gender->name;
$ageGroup=$ageGroupGender->ageGroupEvent->ageGroup->name;
$time=$ageGroupGender->time;
$cat=$ageGroupGender->ageGroupEvent->event->mainEvent->event_category_id;
$date=$ageGroupGender->ageGroupEvent->event->date;

     $data = ['date'=>$date,'status' =>$ageGroupGender->status,"id"=>$ageGroupGender->id,"eventId"=>$eventId,"ageGender"=>$ageGroupGender,'event'=>$event,'league'=>$league,'organizer'=>$organizer,'ageGroup'=>$ageGroup,'gender'=>$gender,'time'=>$time,'cat'=>$cat];
     
    $pusher->trigger('my-channel', 'my-event', $data);
        $url='/final/players';
        return response()->json(['url'=>$url]);
    }
    public function finalLists(Request $request){
        $gender=AgeGroupGender::find(Session::get('gen'));
        if($gender->ageGroupEvent->Event->mainEvent->event_category_id==3){
            $genderUsers=$gender->teams;
            return view('players.finalListTeams',compact('genderUsers','gender'));
        }else{
            $genderUsers=$gender->users;
            return view('players.finalListPlayers',compact('genderUsers','gender'));
        }
       
    }
    public function eventFinalResults(Request $request, $id)
    {
        $gender = AgeGroupGender::find($id);
        $cat = $gender->ageGroupEvent->Event->mainEvent->event_category_id;
        if ($gender->ageGroupEvent->Event->mainEvent->event_category_id == 1) {
            $userLists = array();
            $times = DB::table('age_group_gender_user')
                ->where('age_group_gender_id', $gender->id)
                ->orderBy('time', 'ASC')
                ->limit(3)
                ->get();

            foreach ($times as $time) {
                $user = DB::table('users')->where('id', $time->user_id)->first();
                $userLists[] = $user;
            }
            return response()->json([
                'userLists' => $userLists,
                'gender' => $gender,
                'times' => $times,
                'cat' => $cat
            ]);
        }
        if ($gender->ageGroupEvent->Event->mainEvent->event_category_id == 2) {

            $players = $gender->users;
            $max = array();
            $userIds = array();
            foreach ($players as $user) {
                $times = DB::table('age_group_gender_user')
                    ->where('age_group_gender_id', $gender->id)
                    ->where('user_id', $user->id)
                    ->first();

                if ($times->one >= $times->two) {
                    if ($times->one >= $times->third) {
                        $max[] = $times->one;
                    } else {
                        $max[] = $times->third;
                    }
                } elseif ($times->one <= $times->two) {
                    if ($times->third <= $times->two) {
                        $max[] = $times->two;
                    } else {
                        $max[] = $times->third;
                    }
                }
                $userIds[] = $user->id;
            }

            arsort($max);

            $users = array();
            $results = array_slice($max, 0, 3);
            foreach ($results as $result) {
                $user = DB::table('age_group_gender_user')
                    ->where('age_group_gender_id', $gender->id)
                    ->where(function ($query) use ($result) {
                        $query->orwhere('one', $result)
                            ->orWhere('two', $result)
                            ->orWhere('third', $result);
                    })->get();
                $users[] = $user;
            }
            $userUnique = array_unique($users);
            $fieldUsers = array();
            foreach ($userUnique as $user) {
                foreach ($user as $userId) {

                    $user = User::find($userId->user_id);
                    $fieldUsers[] = $user;
                }
            }
            return response()->json([
                'fieldUsers' => $fieldUsers,
                'gender' => $gender,
                'times' => $times,
                'cat' => $cat

            ]);
        }
    }
    public function heatstrackDivideStarter(Request $request)
    {
        // dd($request->all());
        $gender = AgeGroupGender::find($request->input('gender'));
        $eventAgeGroup = AgeGroupEvent::where("id", $gender->age_group_event_id)->first();
        $ageGroup = AgeGroup::where("id", $eventAgeGroup->age_group_id)->first()->name;
        $event = Event::find($request->input('event'));
        if ($event->mainEvent->event_category_id == 1) {
            $count = $gender->venue_detail_id;
            $venueDetail = VenueDetail::where('id', $count)->first();
            $trackCount = $venueDetail->track_event_count;
            $allplayers = $gender->users;
            if (count($allplayers) == $trackCount || count($allplayers) < $trackCount) {
                 $players =$gender->users;

                $playerCpunt = $trackCount - 1;
                $lastPlayers = collect($allplayers)->chunk($trackCount)->last();
                $lastPlayerCount = count($lastPlayers);
                return view('players.heats-final', compact('allplayers', 'players', 'trackCount', 'lastPlayerCount', 'gender', 'lastPlayers', 'playerCpunt', 'event', 'ageGroup'));
            } else {
                // $users = count($gender->users);
                // $reminder = $users % $trackCount;
                // $division = $users / $trackCount;
                // $players = $gender->teams;
                // $subs = 0;
                // if ($reminder > 0 && $reminder < 3) {
                //     $subs = (3 - $reminder);
                // }
                // $players = $gender->users->chunk($trackCount);

                // if ($subs == 1 || $subs == 2) {
                //     $user = $players[(int)$division - 1]->pop();
                //     $players[(int)$division]->push($user);
                // }

                // if ($subs == 2) {
                //     if ($division - 2 > 0) {
                //         $user = $players[(int)$division - 2]->pop();
                //         $players[(int)$division]->push($user);
                //     } else {
                //         $user = $players[(int)$division - 1]->pop();
                //         $players[(int)$division]->push($user);
                //     }
                // }
                $genders = $gender->users()->orderBy('club_id','ASC')->orderBy('id','ASC')->get();
                $clubUsers=$genders->toArray();
                   $rounds = ceil(count($clubUsers) / $trackCount);
                   $remainder = count($clubUsers) % $trackCount;
                   $count = 1;
           while ($count <= $trackCount) {
               $roundCount = 1;
               while ($roundCount <= $rounds) {
   
                  
                   $user = array_shift($clubUsers);
                   $players[$roundCount][] = $user;
                   $roundCount++;
               }
               $count++;
           }
                return view('players.heats-round-selection', compact('event', 'players', 'trackCount', 'gender',    'ageGroup'));
            }
        }
        if ($event->mainEvent->event_category_id == 3) {
            $allplayers = $gender->teams;
            $count = $gender->venue_detail_id;
            $venueDetail = VenueDetail::where('id', $count)->first();
            $trackCount = $venueDetail->track_event_count;
            if (count($allplayers) == $trackCount || count($allplayers) < $trackCount) {
                $players = $allplayers;

                return view('players.heats-final', compact('players', 'trackCount', 'gender', 'event', 'ageGroup'));
            } else {
                $users = count($gender->teams);
                $reminder = $users % $trackCount;
                $division = $users / $trackCount;
                $players = $gender->teams;
                $subs = 0;
                if ($reminder > 0 && $reminder < 3) {
                    $subs = (3 - $reminder);
                }
                $players = $gender->teams->chunk($trackCount);

                if ($subs == 1 || $subs == 2) {
                    $user = $players[(int)$division - 1]->pop();
                    $players[(int)$division]->push($user);
                }

                if ($subs == 2) {
                    if ($division - 2 > 0) {
                        $user = $players[(int)$division - 2]->pop();
                        $players[(int)$division]->push($user);
                    } else {
                        $user = $players[(int)$division - 1]->pop();
                        $players[(int)$division]->push($user);
                    }
                }
                return view('players.heats-round-selection', compact('event', 'players', 'trackCount',  'gender', 'ageGroup'));
            }
        }
    }

    public function search(Request $request)
    {

        $id = Session::get('id');
        $seasons = Season::all();
        $gender = Gender::all();
        $ageGroups = AgeGroup::where('organization_id', Auth::user()->organization_id !== null ? Auth::user()->organization_id : $id)->get();
        $leagues = League::where('organization_id', Auth::user()->organization_id !== null ? Auth::user()->organization_id : $id)->get();
        $mainEvents = MainEvent::where('organization_id', Auth::user()->organization_id !== null ? Auth::user()->organization_id : $id)->get();
        $genders = AgeGroupGender::with('ageGroupEvent');
        $categories = $request->input('obj');
        Session::put('cates', $categories);
        if ($categories) {
            foreach ($categories as $key => $values) {
                if ($key == "season") {
                    if($values!=0){
                        $genders = $genders->whereHas('ageGroupEvent', function ($q) use ($values) {
                            $q->whereHas('Event', function ($q) use ($values) {
                                $q->where('season_id', $values);
                            });
                        });
                    }
                } elseif ($key == "league") {
                    if($values!=0){
                        $genders = $genders->whereHas('ageGroupEvent', function ($q) use ($values) {
                            $q->whereHas('Event', function ($q) use ($values) {
                                $q->where('league_id', $values);
                            });
                        });
                    }
                } elseif ($key == "event") {
                    if($values!=0){
                        $genders = $genders->whereHas('ageGroupEvent', function ($q) use ($values) {
                            $q->whereHas('Event', function ($q) use ($values) {
                                $q->whereHas('mainEvent', function ($q) use ($values) {
                                    $q->where('id', $values);
                                });
                            });
                        });
                    }
                }
                elseif ($key == "age") {
                    if($values!=0){
                        $genders = $genders->whereHas('ageGroupEvent', function ($q) use ($values) {
                            $q->whereHas('ageGroup', function ($q) use ($values) {
                                $q->where('id', $values);
                            });
                        });
                    }
                }
                elseif ($key == "organization") {
                    if($values!=0){
                        $genders = $genders->whereHas('users', function ($q) use ($values) {
                            $q->whereHas('organization', function ($q) use ($values) {
                                $q->where('id', $values);
                            });
                        });
                    }
                }
                elseif ($key == "status") {
                    if($values!=5){
                        $genders = $genders->where('status', $values);
                    }
                }
                elseif ($key == "gender") {
                    if($values!=0){
                        $genders = $genders->where('gender_id', $values);
                    }
                }
            }
        } else {
            $genders = AgeGroupGender::with('ageGroupEvent');
        }
        $genders = $genders->get();
        $setting = OrganizationSetting::where('organization_id', Auth::user()->organization_id !== null ? Auth::user()->organization_id : $id)->first();
        $header = $setting ? $setting->header : '';
        $view = view('players.search', compact('gender','leagues', 'mainEvents', 'seasons', 'genders', 'id',  'ageGroups'))->render();
        $view2 = view('players.printEventResultPreview', compact('genders',  'seasons', 'setting', 'header', 'id'))->render();

        return response()->json(['html' => $view,
        'html2' => $view2
    ]);
    }
    public function generatePDF(Request $request)
    {
        $id = Session::get('id') ? Session::get('id') : '';

        $setting = OrganizationSetting::where('organization_id', Auth::user()->organization_id !== null ? Auth::user()->organization_id : $id)->first();
        $header = $setting ? $setting->header : '';
        $general = generalSetting::first();
        $adminheader = $general->header;
        $genders = AgeGroupGender::with('ageGroupEvent');
        $categories = Session::get('cates');
        $eventTitle=null;
        $GenTitle=null;
        $AgeTitle=null;
        $leagueTitle=null;
        if ($categories) {
            foreach ($categories as $key => $values) {
                if ($key == "season") {
                    if($values!=0){
                        $genders = $genders->whereHas('ageGroupEvent', function ($q) use ($values) {
                            $q->whereHas('Event', function ($q) use ($values) {
                                $q->where('season_id', $values);
                            });
                        });
                    }
                } elseif ($key == "league") {
                    if($values!=0){
                        $genders = $genders->whereHas('ageGroupEvent', function ($q) use ($values) {
                            $q->whereHas('Event', function ($q) use ($values) {
                                $q->where('league_id', $values);
                            });
                        });
                        $leagueTitle=League::where( 'id',$values)->first();
                    }
                } elseif ($key == "event") {
                    if($values!=0){
                        $genders = $genders->whereHas('ageGroupEvent', function ($q) use ($values) {
                            $q->whereHas('Event', function ($q) use ($values) {
                                $q->whereHas('mainEvent', function ($q) use ($values) {
                                    $q->where('id', $values);
                                });
                            });
                        });
                        $eventTitle=MainEvent::where( 'id',$values)->first();
                    }
                }
                elseif ($key == "age") {
                    if($values!=0){
                        $genders = $genders->whereHas('ageGroupEvent', function ($q) use ($values) {
                            $q->whereHas('ageGroup', function ($q) use ($values) {
                                $q->where('id', $values);
                            });
                        });
                    }
                    $AgeTitle=AgeGroup::where( 'id',$values)->first();
                }
                elseif ($key == "organization") {
                    if($values!=0){
                        $genders = $genders->whereHas('users', function ($q) use ($values) {
                            $q->whereHas('organization', function ($q) use ($values) {
                                $q->where('id', $values);
                            });
                        });
                    }
                }
                elseif ($key == "status") {
                    if($values!=5){
                        $genders = $genders->where('status', $values);
                    }
                }
                elseif ($key == "gender") {
                    if($values!=0){
                        $genders = $genders->where('gender_id', $values);
                        $GenTitle=Gender::where( 'id',$values)->first();
           }
                }
            }
        } else {
            $genders = AgeGroupGender::with('ageGroupEvent');
        }
        $genders = $genders->get();
        
        
      
        $pdf = app('dompdf.wrapper');
        $pdf->getDomPDF()->set_option("enable_php", true);
        $pdf = PDF::loadView('players.resultspdf', compact('genders', 'setting','adminheader','general','header','eventTitle','GenTitle','leagueTitle','AgeTitle' ,'id'))->setPaper('a4', 'landscape');
    return $pdf->stream('event_result.pdf');
    }
    public function Excel(Request $request)
    {
        if(Auth::user()->hasRole(7)){
            $id = Session::get('id') ? Session::get('id') : '';
            $categories = Session::get('cates');
            return Excel::download(new EventsResultPlayerExport($categories,$id), 'EventResults.xlsx');
        }
        $id = Session::get('id') ? Session::get('id') : '';


       
        $categories = Session::get('cates');
        // dd($length5);


        return Excel::download(new EventResultsExport($categories, $id), 'EventResults.xlsx');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function participants(Request $request)
    {
        $league = null;
        $events = null;
        $ageGroups = null;
        $leagues = League::where('organization_id', Auth::user()->organization_id)->get();
        return view('reports.particpants.participants', compact('leagues', 'league', 'events', 'ageGroups'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function filter(Request $request)
    {
        $league = League::find($request->input('leagueData'));
        $events = $league->events;
        $leagues = League::where('organization_id', Auth::user()->organization_id)->get();
        $ageGroups = AgeGroup::where('organization_id', Auth::user()->organization_id)->get();
        $view = view('reports.particpants.filterParticipantsData', compact('league', 'events', 'leagues', 'ageGroups'))->render();

        return response()->json(['html' => $view]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function userId(Request $request)
    {
        $userIds=User::whereIn('id',$request->get('userId'))->get();
        return response()->json(['userIds' => $userIds]);
    }
}
