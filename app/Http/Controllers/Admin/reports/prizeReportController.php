<?php

namespace App\Http\Controllers\Admin\reports;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\Controller;
use App\Models\MainEvent;
use App\Models\League;
use App\Models\Season;
use App\Models\AgeGroup;
use App\Models\Gender;
use App\Models\AgeGroupGender;
use App\Models\OrganizationSetting;
use App\Exports\PrizeListsExport;
use App\User;
use PDF;
use Auth;
use Session;
use Excel;
use DB;
class prizeReportController extends Controller
{
    public function prizeLists(Request $request)
    {
        if(Auth::user()->hasRole(2)||Auth::user()->hasRole(4)){
        $id = Session::get('id');
        $seasons = Season::all();
        $judges = User::Role(['Judge'])->where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->get();
        $leagues = League::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->get();
        $ageGroups = AgeGroup::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->get();
        $mainEvents = MainEvent::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->get();
        $setting = OrganizationSetting::where('organization_id', Auth::user()->organization_id !== null ? Auth::user()->organization_id : $id)->first();
        $header = $setting ? $setting->header : '';
        $genders = AgeGroupGender::with('ageGroupEvent')->where('status',1)->get();
        return view('reports.prizes.prize', compact('header','setting','genders', 'id', 'seasons', 'leagues', 'ageGroups', 'mainEvents', 'judges'));
        }else{
            return abort('403');

        }
    }
    public function prizeGiven(Request $request){
       $genderUser=DB::table('age_group_gender_user')->where('age_group_gender_id',$request->input('gender'))->where('user_id',$request->input('user'))->update(['prize_given' => '1']);
    }
    public function prizeGroupGiven(Request $request){
              $genderUser=DB::table('age_group_gender_team')->where('age_group_gender_id',$request->input('gender'))->where('team_id',$request->input('team'))->update(['prize_given' => '1']);
    }
    
    function filter(Request $request)
    {
        $id = Session::get('id');
        $genders = AgeGroupGender::with('ageGroupEvent')->where('status',1);
        $cats = $request->input('obj');
        Session::put('categories', $cats);
        if($cats){
        foreach ($cats as $key => $values) {
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
            } elseif ($key == "gender") {
                if($values!=0){
                    $genders = $genders->whereHas('gender', function ($q) use ($values) {
                        $q->where('id', $values);
                    });
                }
            } elseif ($key == "judge") {
                if($values!=0){
                    $genders = $genders->where('judge_id', $values);
                }
            } elseif ($key == "age") {
                if($values!=0){
                    $genders = $genders->whereHas('ageGroupEvent', function ($q) use ($values) {
                        $q->whereHas('ageGroup', function ($q) use ($values) {
                            $q->where('id', $values);
                        });
                    });
                }
            } 
            elseif ($key == "prizeGiven") {
                if($values!=5){
                    $genders = $genders->where('status', $values);
                }
            } 
            
            elseif ($key == "event") {
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
        }
    }else{
        $genders = AgeGroupGender::with('ageGroupEvent')->where('status',1);
    }

        $genders = $genders->get();
        $seasons = Season::all();
        $judges = User::Role(['Judge'])->where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->get();
        $leagues = League::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->get();
        $ageGroups = AgeGroup::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->get();
        $mainEvents = MainEvent::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->get();
        $setting = OrganizationSetting::where('organization_id', Auth::user()->organization_id !== null ? Auth::user()->organization_id : $id)->first();
        $header = $setting ? $setting->header : '';
        $view = view('reports.prizes.search', compact('setting','header','genders', 'seasons', 'leagues', 'ageGroups', 'mainEvents', 'id'))->render();
        $view2 = view('reports.prizes.export', compact('setting','header','genders', 'seasons', 'leagues', 'ageGroups', 'mainEvents', 'id'))->render();

        return response()->json([
            'html' => $view,

            'html2' => $view2
        ]);
    }


    public function generatePdf(Request $request)
    {
        if(Auth::user()->hasRole(2)||Auth::user()->hasRole(4)){
$id=Session::get('id');
        $genders = AgeGroupGender::with('ageGroupEvent')->where('status',1);
        $setting = OrganizationSetting::where('organization_id', Auth::user()->organization_id !== null ? Auth::user()->organization_id : $id)->first();
        $header = $setting ? $setting->header : '';
        $categories = Session::get('categories');
        $eventTitle=null;
        $AgeTitle=null;
        $GenTitle=null;
        $leagueTitle=null;
        if($categories){
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
                } elseif ($key == "gender") {
                    if($values!=0){
                        $genders = $genders->whereHas('gender', function ($q) use ($values) {
                            $q->where('id', $values);
                        });
                    }
                } elseif ($key == "judge") {
                    if($values!=0){
                        $genders = $genders->where('judge_id', $values);
                    }
                } elseif ($key == "age") {
                    if($values!=0){
                        $genders = $genders->whereHas('ageGroupEvent', function ($q) use ($values) {
                            $q->whereHas('ageGroup', function ($q) use ($values) {
                                $q->where('id', $values);
                            });
                        });
                    }
                } 
                elseif ($key == "prizeGiven") {
                    if($values!=5){
                        $genders = $genders->where('status', $values);
                    }
                } 
                
                elseif ($key == "event") {
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
            }
        }else{
            $genders = AgeGroupGender::with('ageGroupEvent')->where('status',1);
        }
        $genders = $genders->get();
  
        $seasons = Season::all();
        $judges = User::Role(['Judge'])->where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->get();
        $leagues = League::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->get();
        $ageGroups = AgeGroup::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->get();
        $mainEvents = MainEvent::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->get();
        $pdf = app('dompdf.wrapper');
        $pdf->getDomPDF()->set_option("enable_php", true);
        $pdf = PDF::loadView('reports.prizes.pdf', compact('id','genders', 'header','leagueTitle', 'eventTitle','AgeTitle','GenTitle','setting'))->setPaper('a4', 'landscape');
        return $pdf->stream('PrizeLists.pdf');
    }else{
        return abort('403');
    }
    }
    public function Excel(Request $request)
    {
        if(Auth::user()->hasRole(2)||Auth::user()->hasRole(4)){
        $id=Session::get('id');
        $categories = Session::get('categories');

        return Excel::download(new PrizeListsExport($categories,$id), 'Prize Lists.xlsx');
        }else{
            return abort('403');
        }
    }
}
