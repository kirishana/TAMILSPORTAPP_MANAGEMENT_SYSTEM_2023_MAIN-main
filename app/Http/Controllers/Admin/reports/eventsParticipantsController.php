<?php

namespace App\Http\Controllers\Admin\reports;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;
use Auth;
use Session;
use Excel;
use App\Models\League;
use App\Models\Gender;
use App\User;
use App\Models\Registration;
use App\Models\Club;
use App\generalSetting;
use App\Models\MainEvent;
use App\Models\AgeGroup;
use App\Models\AgeGroupGenderUser;
use App\Models\AgeGroupGender;
use App\Models\OrganizationSetting;
use App\Exports\EventParticipantsExport;



class eventsParticipantsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Session::forget('ePartCategories');
        $id = Session::get('id');

        $setting = OrganizationSetting::where('organization_id', Auth::user()->organization_id !== null ? Auth::user()->organization_id : $id)->first();
        $header = $setting ? $setting->header : '';
        $general = generalSetting::first();
        $adminheader =$general?$general->header:'';
        $genders=Gender::all();
        if(Auth::user()->hasRole(7)){
            $leagues=League::all();
            $mainEvents=MainEvent::all();
            $ageGroups=AgeGroup::all();
        }else{
            $leagues=League::where('organization_id', Auth::user()->organization_id !== null ? Auth::user()->organization_id : $id)->get();
            $mainEvents=MainEvent::where('organization_id', Auth::user()->organization_id !== null ? Auth::user()->organization_id : $id)->get();
            $ageGroups=AgeGroup::where('organization_id', Auth::user()->organization_id !== null ? Auth::user()->organization_id : $id)->get();
        }
        $clubs=Club::all();
        $reg=Registration::where('user_id',Auth::user()->id)->get();
        $agegroupgenders = null;
        $headerusers = AgeGroupGender::where('status',1)->first();
        return view ('admin.reports.eventsParticipants',compact('genders','clubs','headerusers','adminheader','leagues','mainEvents','reg','ageGroups','agegroupgenders','setting','general','header','id'));
         

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function filter(Request $request)
    {
        $agegroupgenders = null;
        $id = Session::get('id');
        $setting = OrganizationSetting::where('organization_id', Auth::user()->organization_id !== null ? Auth::user()->organization_id : $id)->first();
        $header = $setting ? $setting->header : '';
        $general=generalSetting::first();
        $adminheader =$general?$general->header:'';
        $gender=Gender::all();
        $agegroupgenders = AgeGroupGender::where('status',1);
        $categories = $request->input('obj');

        Session::put('ePartCategories', $categories);

            if ($categories) {
            foreach ($categories as $key => $values) {
                if ($key == "gender") {
                    if ($values!=0) {
                        $agegroupgenders=$agegroupgenders->where('gender_id',$values);
                    }  
                }elseif ($key == "league") {
                    if ($values!=0) {
                        $agegroupgenders=$agegroupgenders->whereHas('ageGroupEvent',function($q) use($values){
                            $q->wherehas('Event',function($q) use($values){
                                $q->wherehas('league',function($q) use($values){
                                    $q->where('id',$values);
                                });
                            });
                        });
                    } 
                }elseif ($key == "age") {
                    if ($values!=0) {
                        $agegroupgenders=$agegroupgenders->whereHas('ageGroupEvent',function($q) use($values){
                            $q->whereHas('ageGroup',function($qu) use($values){
                                     $qu->where('id','=',$values);
                             });
                         });
                        }
                } elseif ($key == "club") {
                    if ($values!=0)  {
                        $agegroupgenders=$agegroupgenders->whereHas('users',function($q) use($values){
                            $q->whereHas('club',function($qu) use($values){
                                     $qu->where('id','=',$values);
                             });
                         });
                    }     
                }elseif ($key == "event") {
                    if ($values!=0)
                        $agegroupgenders=$agegroupgenders->whereHas('ageGroupEvent',function($q) use($values){
                            $q->whereHas('Event',function($qu) use($values){
                                 $qu->whereHas('mainEvent',function($qur) use($values) {
                                     $qur->where('id','=',$values);
                                 });
                             });
                         });

            }
        }
    
    }else{
        $agegroupgenders = AgeGroupGender::where('status',1);

                }
            //    
                $agegroupgenders=$agegroupgenders->get();

            $view = view('admin.reports.eventsParticipantsfilter', compact('agegroupgenders','general','id','adminheader'))->render();
            $view2 = view('admin.reports.eventsPartPreview', compact('agegroupgenders','general','header','setting','id','adminheader'))->render();
    
            return response()->json(['html' => $view]);
    }
    
    
    public function generateEventPartPDF(Request $request)
    {

        $headerusers = AgeGroupGender::where('status',1)->first();
        $agegroupgenders = null;

        $id = Session::get('id');
        $setting = OrganizationSetting::where('organization_id', Auth::user()->organization_id !== null ? Auth::user()->organization_id : $id)->first();
        $header = $setting ? $setting->header : '';
        $general=generalSetting::first();
        $adminheader =$general?$general->header:'';
        $categories = Session::get('ePartCategories');
        $agegroupgenders = AgeGroupGender::where('status',1);
        $leaguetitle=null;
        $eventTitle=null;
        $AgeTitle=null;
        $GenTitle=null;


        if ($categories) {
            foreach ($categories as $key => $values) {
                if ($key == "gender") {
                    if ($values!=0) {
                        $agegroupgenders=$agegroupgenders->where('gender_id',$values);
                        $GenTitle=Gender::where( 'id',$values)->first();
                    }  
                }elseif ($key == "league") {
                    if ($values!=0) {
                        $agegroupgenders=$agegroupgenders->whereHas('ageGroupEvent',function($q) use($values){
                            $q->wherehas('Event',function($q) use($values){
                                $q->wherehas('league',function($q) use($values){
                                    $q->where('id',$values);
                                });
                            });
                        });
                    } 
                }elseif ($key == "age") {
                    if ($values!=0) {
                        $agegroupgenders=$agegroupgenders->whereHas('ageGroupEvent',function($q) use($values){
                            $q->whereHas('ageGroup',function($qu) use($values){
                                     $qu->where('id','=',$values);
                             });
                         });
                         $AgeTitle=AgeGroup::where( 'id',$values)->first();
                        }
                } elseif ($key == "club") {
                    if ($values!=0)  {
                        $agegroupgenders=$agegroupgenders->whereHas('users',function($q) use($values){
                            $q->whereHas('club',function($qu) use($values){
                                     $qu->where('id','=',$values);
                             });
                         });
                    }     
                }elseif ($key == "event") {
                    if ($values!=0)
                        $agegroupgenders=$agegroupgenders->whereHas('ageGroupEvent',function($q) use($values){
                            $q->whereHas('Event',function($qu) use($values){
                                 $qu->whereHas('mainEvent',function($qur) use($values) {
                                     $qur->where('id','=',$values);
                                 });
                             });
                         });
                         $eventTitle=MainEvent::where( 'id',$values)->first();
            }
        }
    
    }else{
        $agegroupgenders = AgeGroupGender::where('status',1);

    }
                $agegroupgenders=$agegroupgenders->get();

        $pdf = app('dompdf.wrapper');
        $pdf->getDomPDF()->set_option("enable_php", true);
        $pdf = PDF::loadView('admin.reports.eventsParticipantsPDF', compact('agegroupgenders','adminheader','headerusers','general','header','setting','leaguetitle','AgeTitle','GenTitle','eventTitle','id'))->setPaper('a4', 'landscape');
        return $pdf->stream('EventsParticipants.pdf');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function EventParticipantsExcel(Request $request)
    {      
        $id = Session::get('id');      
        $categories = Session::get('ePartCategories');
        return Excel::download(new EventParticipantsExport($categories,$id), 'EventsParticipants.xlsx');
    }

    public function results(Request $request)
    {
   
        $id = Session::get('id') ? Session::get('id') : '';
        $setting = OrganizationSetting::where('organization_id', Auth::user()->organization_id !== null ? Auth::user()->organization_id : $id)->first();
        $header = $setting ? $setting->header : '';
        $general=generalSetting::all();
        $genders=Gender::all();
            $leagues=League::where('organization_id', Auth::user()->organization_id !== null ? Auth::user()->organization_id : $id)->get();
            $mainEvents=MainEvent::where('organization_id', Auth::user()->organization_id !== null ? Auth::user()->organization_id : $id)->get();
            $ageGroups=AgeGroup::where('organization_id', Auth::user()->organization_id !== null ? Auth::user()->organization_id : $id)->get();
          
        
          $clubs=Club::all();
        $reg=Registration::where('user_id',Auth::user()->id)->get();
        $agegroupgenders = null;
        $headerusers = AgeGroupGender::where('status',1)->first();
        return view ('admin.eventParticipantResults.index',compact('genders','clubs','headerusers','leagues','mainEvents','reg','ageGroups','agegroupgenders','setting','general','header','id'));   
    }
public function changeResults(Request $request,$id){
    $ageGroupGender=AgeGroupGender::find($request->input('gender'));
    if($ageGroupGender->ageGroupEvent->Event->mainEvent->event_category_id == 1){
        DB::table('age_group_gender_user')->where('id', $id)->update(['time' => $request->input('value')]);

    }
elseif($ageGroupGender->ageGroupEvent->Event->mainEvent->event_category_id == 2){
    if($request->input('field')=="one"){
        DB::table('age_group_gender_user')->where('id', $id)->update(['one' => $request->input('value')]);
    }
    elseif($request->input('field')=="two"){
        DB::table('age_group_gender_user')->where('id', $id)->update(['two' => $request->input('value')]);
    }
    elseif($request->input('field')=="third"){
        DB::table('age_group_gender_user')->where('id', $id)->update(['third' => $request->input('value')]);
    }
}
elseif($ageGroupGender->ageGroupEvent->Event->mainEvent->event_category_id==3){
    DB::table('age_group_gender_team')->where('id', $id)->update(['time' => $request->input('value')]);
}

if($ageGroupGender->ageGroupEvent->Event->mainEvent->event_category_id == 1){
     DB::table('age_group_gender_user')
    ->where('age_group_gender_id', $ageGroupGender->id)
    ->update(['marks'=>null]);
        $times = DB::table('age_group_gender_user')
        ->where('age_group_gender_id', $ageGroupGender->id)
        ->where('time','!=',"")
        ->orderBy('time', 'ASC')
        ->limit(3)
        ->get();
                if(count($times)==1){
                             DB::table('age_group_gender_user')->where('id', $times[0]->id)->update(['marks' => $ageGroupGender->ageGroupEvent->Event->organization->athelaticsetting->first_place]);

                }

        else if(count($times)==3){
            if($times[0]->time==$times[1]->time&& $times[1]->time==$times[2]->time){
             foreach($times as $time){
         DB::table('age_group_gender_user')->where('id', $time->id)->update(['marks' => $ageGroupGender->ageGroupEvent->Event->organization->athelaticsetting->first_place]);
             }
            }
      elseif($times[0]->time==$times[1]->time){

            
     DB::table('age_group_gender_user')->where('id', $times[0]->id)->update(['marks' => $ageGroupGender->ageGroupEvent->Event->organization->athelaticsetting->first_place]);
                     DB::table('age_group_gender_user')->where('id', $times[1]->id)->update(['marks' => $ageGroupGender->ageGroupEvent->Event->organization->athelaticsetting->first_place]);
                                             DB::table('age_group_gender_user')->where('id', $times[2]->id)->update(['marks' => $ageGroupGender->ageGroupEvent->Event->organization->athelaticsetting->third_place]);


      }
       
        elseif($times[1]->time==$times[2]->time){

         DB::table('age_group_gender_user')->where('id', $times[0]->id)->update(['marks' =>$ageGroupGender->ageGroupEvent->Event->organization->athelaticsetting->first_place]);
                     DB::table('age_group_gender_user')->where('id', $times[1]->id)->update(['marks' => $ageGroupGender->ageGroupEvent->Event->organization->athelaticsetting->second_place]);
                                             DB::table('age_group_gender_user')->where('id', $times[2]->id)->update(['marks' => $ageGroupGender->ageGroupEvent->Event->organization->athelaticsetting->second_place]);


       
        }
        else{

         DB::table('age_group_gender_user')->where('time', $times[0]->time)->update(['marks' => $ageGroupGender->ageGroupEvent->Event->organization->athelaticsetting->first_place]);
                     DB::table('age_group_gender_user')->where('time', $times[1]->time)->update(['marks' => $ageGroupGender->ageGroupEvent->Event->organization->athelaticsetting->second_place]);
                                             DB::table('age_group_gender_user')->where('time', $times[2]->time)->update(['marks' => $ageGroupGender->ageGroupEvent->Event->organization->athelaticsetting->third_place]);
        }
        }
        elseif(count($times)!=3){
                   if($times[0]->time==$times[1]->time){
             foreach($times as $time){
         DB::table('age_group_gender_user')->where('id', $time->id)->update(['marks' => $ageGroupGender->ageGroupEvent->Event->organization->athelaticsetting->first_place]);
             }
            }
      elseif($times[0]->time==$times[1]->time){       
     DB::table('age_group_gender_user')->where('id', $times[0]->id)->update(['marks' => $ageGroupGender->ageGroupEvent->Event->organization->athelaticsetting->first_place]);
                     DB::table('age_group_gender_user')->where('id', $times[1]->id)->update(['marks' => $ageGroupGender->ageGroupEvent->Event->organization->athelaticsetting->first_place]);
                                             DB::table('age_group_gender_user')->where('id', $times[2]->id)->update(['marks' =>$ageGroupGender->ageGroupEvent->Event->organization->athelaticsetting->third_place]);
      }
       
     
        else{
        DB::table('age_group_gender_user')->where('time', $times[0]->id)->update(['marks' =>$ageGroupGender->ageGroupEvent->Event->organization->athelaticsetting->first_place]);
        DB::table('age_group_gender_user')->where('time', $times[1]->id)->update(['marks' => $ageGroupGender->ageGroupEvent->Event->organization->athelaticsetting->second_place]);
        }
        }
        }
        elseif($ageGroupGender->ageGroupEvent->Event->mainEvent->event_category_id == 3){
            DB::table('age_group_gender_team')
            ->where('age_group_gender_id', $ageGroupGender->id)
            ->update(['marks'=>null]);
        $times = DB::table('age_group_gender_team')
        ->where('age_group_gender_id', $ageGroupGender->id)
        ->where('time','!=',null)
        ->orderBy('time', 'ASC')
        ->limit(3)
        ->get();
        if(count($times)==1){
            DB::table('age_group_gender_team')->where('id', $times[0]->id)->update(['marks' => $ageGroupGender->ageGroupEvent->Event->organization->athelaticsetting->group_first_place]);

}
        else if(count($times)==3){
            if($times[0]->time==$times[1]->time&& $times[1]->time==$times[2]->time){
             foreach($times as $time){
         DB::table('age_group_gender_team')->where('id', $time->id)->update(['marks' => $ageGroupGender->ageGroupEvent->Event->organization->athelaticsetting->group_first_place]);
             }
            }
      elseif($times[0]->time==$times[1]->time){

            
     DB::table('age_group_gender_team')->where('id', $times[0]->id)->update(['marks' => $ageGroupGender->ageGroupEvent->Event->organization->athelaticsetting->group_first_place]);
                     DB::table('age_group_gender_team')->where('id', $times[1]->id)->update(['marks' => $ageGroupGender->ageGroupEvent->Event->organization->athelaticsetting->group_first_place]);
                                             DB::table('age_group_gender_team')->where('id', $times[2]->id)->update(['marks' => $ageGroupGender->ageGroupEvent->Event->organization->athelaticsetting->group_third_place]);


      }
       
        elseif($times[1]->time==$times[2]->time){

         DB::table('age_group_gender_team')->where('id', $times[0]->id)->update(['marks' => $ageGroupGender->ageGroupEvent->Event->organization->athelaticsetting->group_first_place]);
                     DB::table('age_group_gender_team')->where('id', $times[1]->id)->update(['marks' => $ageGroupGender->ageGroupEvent->Event->organization->athelaticsetting->group_second_place]);
                                             DB::table('age_group_gender_team')->where('id', $times[2]->id)->update(['marks' => $ageGroupGender->ageGroupEvent->Event->organization->athelaticsetting->group_second_place]);


       
        }
        else{

         DB::table('age_group_gender_team')->where('id', $times[0]->id)->update(['marks' => $ageGroupGender->ageGroupEvent->Event->organization->athelaticsetting->group_first_place]);
                     DB::table('age_group_gender_team')->where('id', $times[1]->id)->update(['marks' => $ageGroupGender->ageGroupEvent->Event->organization->athelaticsetting->group_second_place]);
                                             DB::table('age_group_gender_team')->where('id', $times[2]->id)->update(['marks' => $ageGroupGender->ageGroupEvent->Event->organization->athelaticsetting->group_third_place]);
        }
        }
        elseif(count($times)!=3){
                   if($times[0]->time==$times[1]->time){
             foreach($times as $time){
         DB::table('age_group_gender_team')->where('id', $time->id)->update(['marks' => $ageGroupGender->ageGroupEvent->Event->organization->athelaticsetting->group_first_place]);
             }
            }
      elseif($times[0]->time==$times[1]->time){
             
            
     DB::table('age_group_gender_team')->where('id', $times[0]->id)->update(['marks' => $ageGroupGender->ageGroupEvent->Event->organization->athelaticsetting->group_first_place]);
                     DB::table('age_group_gender_team')->where('id', $times[1]->id)->update(['marks' => $ageGroupGender->ageGroupEvent->Event->organization->athelaticsetting->group_first_place]);
                                             DB::table('age_group_gender_team')->where('id', $times[2]->id)->update(['marks' => $ageGroupGender->ageGroupEvent->Event->organization->athelaticsetting->group_third_place]);


      }
       
     
        else{

         DB::table('age_group_gender_team')->where('id', $times[0]->id)->update(['marks' => $ageGroupGender->ageGroupEvent->Event->organization->athelaticsetting->group_first_place]);
                     DB::table('age_group_gender_team')->where('id', $times[1]->id)->update(['marks' => $ageGroupGender->ageGroupEvent->Event->organization->athelaticsetting->group_second_place]);
        }
        }
        } 
           
           
           
           
           
           
                else if($ageGroupGender->ageGroupEvent->Event->mainEvent->event_category_id == 2){
                     $gender = AgeGroupGender::find($ageGroupGender->id);
        $id = $gender->id;
        $players = $gender->users;
        DB::table('age_group_gender_user')
        ->where('age_group_gender_id', $ageGroupGender->id)
        ->update(['marks'=>null]);
        if($players->count()==1){
        
            $users=DB::table('age_group_gender_user')
                    ->where('age_group_gender_id', $gender->id)->get();
                foreach ($users as $userId) {
                    $users1[] = User::find($userId->user_id);
                    DB::table('age_group_gender_user')
                    ->where('age_group_gender_id', $gender->id)
                    ->Where('user_id',$userId->user_id)
                   ->update(['marks'=>Auth::user()->organization->athelaticsetting->first_place]);
                }
        
        }else{
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
        // dd($maximum);
        $maxes=array_unique($max);

        $userLists = array();
        $users1 = array();
        $users2 = array();
         $users3 = array();
      $users4=array();
        $results = $maximum;
        if(count($results)==1){
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
               ->update(['marks'=>Auth::user()->organization->athelaticsetting->first_place]);
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
                   ->update(['marks'=>Auth::user()->organization->athelaticsetting->first_place]);
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
                   ->update(['marks'=>Auth::user()->organization->athelaticsetting->third_place]);
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
               ->update(['marks'=>Auth::user()->organization->athelaticsetting->first_place]);
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
               ->update(['marks'=>Auth::user()->organization->athelaticsetting->second_place]);
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
                   ->update(['marks'=>Auth::user()->organization->athelaticsetting->first_place]);
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
                   ->update(['marks'=>Auth::user()->organization->athelaticsetting->first_place]);
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
                   ->update(['marks'=>Auth::user()->organization->athelaticsetting->third_place]);
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
                   ->update(['marks'=>Auth::user()->organization->athelaticsetting->first_place]);
                }
                $diff=array_diff($users2Test->toArray(),$users1Test->toArray());
               
                $users2= User::find($diff);
                foreach($diff as $differ){
                    DB::table('age_group_gender_user')
                    ->where('age_group_gender_id', $gender->id)
                    ->Where('user_id',$differ)
                   ->update(['marks'=>Auth::user()->organization->athelaticsetting->second_place]);
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
               ->update(['marks'=>Auth::user()->organization->athelaticsetting->first_place]);
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
               ->update(['marks'=>Auth::user()->organization->athelaticsetting->second_place]);
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
       ->update(['marks'=>Auth::user()->organization->athelaticsetting->third_place]);
        }
                }
}
}
}
}
}
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $agegroupgenders = null;
        $id = Session::get('id');
        $setting = OrganizationSetting::where('organization_id', Auth::user()->organization_id !== null ? Auth::user()->organization_id : $id)->first();
        $header = $setting ? $setting->header : '';
        $general=generalSetting::first();
        $gender=Gender::all();
        $agegroupgenders = AgeGroupGender::where('status',1);
        $categories = $request->input('obj');

            if ($categories) {
            foreach ($categories as $key => $values) {
                if ($key == "gender") {
                    if ($values!=0) {

                        $agegroupgenders=$agegroupgenders->where('gender_id',$values);
                  


                    }
                } elseif ($key == "league") {
                    if ($values!=0) {


                    $agegroupgenders=$agegroupgenders->whereHas('ageGroupEvent', function ($q) use ($values) {
                        $q->whereHas('Event', function ($q) use ($values) {
                            $q->where('league_id', $values);
                        });
                    });
                }
            }
                elseif ($key == "age") {
                    if ($values!=0) {

                        $agegroupgenders=$agegroupgenders->whereHas('ageGroupEvent',function($q) use($values){
                            $q->whereHas('ageGroup',function($qu) use($values){
                                     $qu->where('id','=',$values);
                               
                             });
                         });
                     

                    }     
                }
                elseif ($key == "club") {
                    if ($values!=0) {

                        $agegroupgenders=$agegroupgenders->whereHas('users',function($q) use($values){
                            $q->whereHas('club',function($qu) use($values){
                                     $qu->where('id','=',$values);
                               
                             });
                         });
                     

                    }     
                } elseif ($key == "event") {
                    if ($values!=0) {

                        $agegroupgenders=$agegroupgenders->whereHas('ageGroupEvent',function($q) use($values){
                            $q->whereHas('Event',function($qu) use($values){
                                 $qu->whereHas('mainEvent',function($qur) use($values) {
                                     $qur->where('id','=',$values);
                                 });
                             });
                         });
                     
                }
            }
        }
    
    }else{
        $agegroupgenders = AgeGroupGender::where('status',1);

                }
            //    
                $agegroupgenders=$agegroupgenders->get();
            $view = view('admin.eventParticipantResults.search', compact('agegroupgenders','general','id'))->render();
    
            return response()->json(['html' => $view]);
    }
    
    
   

}
