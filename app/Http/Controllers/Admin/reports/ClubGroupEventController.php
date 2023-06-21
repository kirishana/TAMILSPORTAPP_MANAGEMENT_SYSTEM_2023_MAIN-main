<?php

namespace App\Http\Controllers\Admin\reports;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Registration;
use App\Models\AgeGroupGender;
use App\Models\AgeGroup;
use App\Models\League;
use App\Models\MainEvent;
use App\Models\Season;
use App\Models\Organization;
use App\generalSetting;
use Auth;
use Session;
use DB;
use PDF;
use Excel;
use App\Exports\TeamsResultClubExport;
use App\Models\Gender;
use App\Models\GroupRegistration;

class ClubGroupEventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $id=Session::get('id');
            Session::forget('cates');
            $general = generalSetting::first();
            $adminheader = $general->header;
            $seasons = Season::all();
            $gendersuser = Gender::all();
            $ageGroups = AgeGroup::where('organization_id',  Auth::user()->organization_id?Auth::user()->organization_id:$id)->get();
            $leagues = League::where('organization_id', Auth::user()->organization_id?Auth::user()->organization_id:$id)->get();
            $registrations = GroupRegistration::where('club_id',Auth::user()->club_id)->get();
            $organizations=Organization::all();
            $mainEvents=MainEvent::where('event_category_id',3)->get();
            $groupRegistrations=GroupRegistration::where('status',1)->wherehas('AgeGroupGender',function($q){
                $q->where('status',1);
            })->get();
            $genders = AgeGroupGender::with('ageGroupEvent')->get();           
            return view('admin.reports.clubteam.clubGroupEventResult', compact('gendersuser','mainEvents','groupRegistrations','adminheader','organizations','general', 'leagues', 'registrations', 'seasons', 'genders',   'ageGroups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function filter(Request $request)
    {
        $id=Session::get('id');
        $general = generalSetting::first();
        $adminheader = $general->header;
        $seasons = Season::all();
        $gendersuser = Gender::all();
        $ageGroups = AgeGroup::where('organization_id',  Auth::user()->organization_id?Auth::user()->organization_id:$id)->get();
        $leagues = League::where('organization_id', Auth::user()->organization_id?Auth::user()->organization_id:$id)->get();
        $registrations = Registration::where('user_id',Auth::user()->id)->get();
        $organizations=Organization::all();
        $mainEvents=MainEvent::all();
        $groupRegistrations=GroupRegistration::where('status',1)->wherehas('AgeGroupGender',function($q){
            $q->where('status',1);
        });
        $categories = $request->input('obj');
        Session::put('cates', $categories);
        if ($categories) {
            foreach ($categories as $key => $values) {
                if ($key == "season") {
                    if($values!=0){
                        $groupRegistrations = $groupRegistrations->where('season_id', $values);
                    }
                } elseif ($key == "league") {
                    if($values!=0){
                        $groupRegistrations = $groupRegistrations->where('league_id', $values);
                    }
                } elseif ($key == "event") {
                    if($values!=0){
                        $groupRegistrations = $groupRegistrations->whereHas('ageGroupGender', function ($q) use ($values) {
                            $q-> whereHas('ageGroupEvent', function ($q) use ($values) {
                                     $q->whereHas('Event', function ($q) use ($values) { 
                                         $q-> where('main_event_id', $values);
                         });
                         });
                         });
                    }
                }
               elseif ($key == "age") {
                if($values!=0){
                    $groupRegistrations = $groupRegistrations->wherehas('ageGroupGender', function($qu) use ($values){
                        $qu->whereHas('ageGroupEvent', function ($q) use ($values) {
                            $q->whereHas('ageGroup', function ($q) use ($values) {
                                $q->where('id', $values);
                            });
                            });
                        });
                }
                }
                elseif ($key == "gender") {
                    if($values!=0){
                        $groupRegistrations = $groupRegistrations->whereHas('ageGroupGender', function ($q) use ($values) {
                            $q->where('gender_id', $values);
                            });
                    }
                }
            }
        } else {
            $groupRegistrations=GroupRegistration::where('status',1)->wherehas('AgeGroupGender',function($q){
                            $q->where('status',1);
                        });
        }
        $groupRegistrations = $groupRegistrations->get();
        $view = view('admin.reports.clubteam.clubGroupfilter', compact('mainEvents','groupRegistrations','organizations', 'leagues', 'registrations', 'seasons','gendersuser',  'ageGroups'))->render();
        $view2 = view('admin.reports.clubteam.clubGroupPreview', compact('groupRegistrations','general','adminheader'))->render();

        return response()->json(['html' => $view,'html2' => $view2]);
    }

    public function Pdf(Request $request)
    {
        $id = Session::get('id') ? Session::get('id') : '';
        $general = generalSetting::first();
        $adminheader = $general->header;
        $groupRegistrations=GroupRegistration::where('status',1)->wherehas('AgeGroupGender',function($q){
        $q->where('status',1);
        });
        $categories = Session::get('cates');
        if ($categories) {
            foreach ($categories as $key => $values) {
                if ($key == "season") {
                    if($values!=0){
                        $groupRegistrations = $groupRegistrations->where('season_id', $values);
                    }
                } elseif ($key == "league") {
                    if($values!=0){
                        $groupRegistrations = $groupRegistrations->where('league_id', $values);
                    }
                } elseif ($key == "event") {
                    if($values!=0){
                        $groupRegistrations = $groupRegistrations->whereHas('ageGroupGender', function ($q) use ($values) {
                            $q-> whereHas('ageGroupEvent', function ($q) use ($values) {
                                     $q->whereHas('Event', function ($q) use ($values) { 
                                         $q-> where('main_event_id', $values);
                         });
                         });
                         });
                    }
                }
               elseif ($key == "age") {
                if($values!=0){
                    $groupRegistrations = $groupRegistrations->wherehas('ageGroupGender', function($qu) use ($values){
                        $qu->whereHas('ageGroupEvent', function ($q) use ($values) {
                            $q->whereHas('ageGroup', function ($q) use ($values) {
                                $q->where('id', $values);
                            });
                            });
                        });
                }
                }
                elseif ($key == "gender") {
                    if($values!=0){
                        $groupRegistrations = $groupRegistrations->whereHas('ageGroupGender', function ($q) use ($values) {
                            $q->where('gender_id', $values);
                            });
                    }
                }
            }
        } else {
            $groupRegistrations=GroupRegistration::where('status',1)->wherehas('AgeGroupGender',function($q){
                            $q->where('status',1);
                        });
        }
        $groupRegistrations = $groupRegistrations->get();
        $pdf = app('dompdf.wrapper');
        $pdf->getDomPDF()->set_option("enable_php", true);
        $pdf = PDF::loadView('admin.reports.clubteam.clubGroupPdf', compact('groupRegistrations','id','general','adminheader'))->setPaper('a4', 'landscape');
    return $pdf->stream('test_pdf.pdf');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function Excel()
    {
        $id = Session::get('id') ? Session::get('id') : '';
        $categories = Session::get('cates');
        return Excel::download(new TeamsResultClubExport($categories,$id), 'GroupEventResults.xlsx');
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
