<?php

namespace App\Http\Controllers\Admin\reports;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\User;
use Auth;
use Excel;
use App\Models\Organization;
use App\Models\OrganizationSetting;
use App\generalSetting;
use App\Models\MainEvent;
use App\Models\AgeGroup;
use App\Models\AgeGroupGender;
use App\Models\AgeGroupEvent;
use App\Models\League;
use App\Models\Club;
use App\Models\Event;
use App\Models\Registration;
use Illuminate\Support\Carbon;
use App\Exports\ParticipantRegOverviewExport;
use DB;

class ParticipantsOverviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ParticipantsRegOverview()
    {
        $id = Session::get('id');
        Session::forget('league');

        $organizations=Organization::where('id',Auth::user()->organization_id?Auth::user()->organization_id:$id)->get();
        $users=User::all();
            $list_main_events=MainEvent::where('organization_id', Auth::user()->organization_id !== null ? Auth::user()->organization_id : $id)->get();
            $ageGroups=AgeGroup::where('organization_id', Auth::user()->organization_id !== null ? Auth::user()->organization_id : $id)->get();
            $ongngLeaguesCount=League::where('to_date','>',Carbon::now())->where('from_date','<',Carbon::now())->where('organization_id',Auth::user()->organization_id?Auth::user()->organization_id:$id)->get();
         if(count($ongngLeaguesCount)>0){
             $ongngLeagues=League::where('to_date','>',Carbon::now())->where('from_date','<',Carbon::now())->where('organization_id',Auth::user()->organization_id?Auth::user()->organization_id:$id)->first();
         }else{
             $ongngLeagues=League::where('organization_id',Auth::user()->organization_id?Auth::user()->organization_id:$id)->orderBy('id','desc')->latest()->first();
         }
        $leagues1=League::where('organization_id', Auth::user()->organization_id !== null ? Auth::user()->organization_id : $id)->get();
        $userevents=Registration::where('user_id',Auth::user()->id)->get();
        $setting = OrganizationSetting::where('organization_id', Auth::user()->organization_id !== null ? Auth::user()->organization_id : $id)->first();
        $header = $setting ? $setting->header : '';

        $ageGroupnames=AgeGroup::has('events','>',0)->where('status',1)->wherehas('organization',function($q) use($id){
            $q->where('organization_id',Auth::user()->organization_id !== null ? Auth::user()->organization_id :$id);
        })->wherehas('events',function($q) use($ongngLeagues) {
            $q->where('league_id',$ongngLeagues?$ongngLeagues->id:'')->wherehas('mainEvent',function($q){
                $q->where('event_category_id','!=',3);
            });
        })->get()->sortBy('name');
        return view('admin.PDF.ParticipantRegOverView',compact('list_main_events','ageGroupnames','leagues1','userevents','ageGroups','ongngLeagues','setting','header','organizations'));
 
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ParticipantsRegOverviewSearch(Request $request)
    {
        $id=Session::get('id');
        $ongngLeaguesCount=League::where('to_date','>',Carbon::now())->where('from_date','<',Carbon::now())->where('organization_id',Auth::user()->organization_id?Auth::user()->organization_id:$id)->get();
        if(count($ongngLeaguesCount)>0){
            $ongngLeagues=League::where('to_date','>',Carbon::now())->where('from_date','<',Carbon::now())->where('organization_id',Auth::user()->organization_id?Auth::user()->organization_id:$id)->first();
        }else{
            $ongngLeagues=League::where('organization_id',Auth::user()->organization_id?Auth::user()->organization_id:$id)->orderBy('id','desc')->latest()->first();
        }
        $list_main_events=MainEvent::where('organization_id', Auth::user()->organization_id !== null ? Auth::user()->organization_id : $id)->get();

         if($request->input('leagueData')){
            $ongngLeagues=League::find($request->input('leagueData'));
            $ageGroupnames=AgeGroup::where('status',1)->wherehas('organization',function($q) use($id){
                $q->where('organization_id',Auth::user()->organization_id !== null ? Auth::user()->organization_id :$id);
            })->wherehas('events',function($q) use($request) {
                $q->where('league_id',$request->input('leagueData'))->wherehas('mainEvent',function($q){
                    $q->where('event_category_id','!=',3);
                });
            })->get()->sortBy('name');
         }else{
            $ageGroupnames=AgeGroup::where('status',1)->wherehas('organization',function($q) use($id){
                $q->where('organization_id',Auth::user()->organization_id !== null ? Auth::user()->organization_id :$id);
            })->wherehas('events',function($q) use($ongngLeagues) {
                $q->where('league_id',$ongngLeagues->id)->wherehas('mainEvent',function($q){
                    $q->where('event_category_id','!=',3);
                });
            })->get()->sortBy('name');
         }
        Session::put('league',$request->input('leagueData'));
        $view1 = view('admin.PDF.PartRegOverviewExcel', compact('ageGroupnames','ongngLeagues'))->render();
        $view = view('admin.PDF.PartRegOverviewfilter', compact('ageGroupnames','list_main_events','ongngLeagues'))->render();
        return response()->json(['html' => $view]);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function ParticipantsRegOverviewexcel(Request $request)
    {
    $id = Session::get('id');
    $leaguesid =Session::get('league');
   
           return Excel::download(new ParticipantRegOverviewExport($leaguesid,$id), 'Participant_Registration_overview.xlsx');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
}
