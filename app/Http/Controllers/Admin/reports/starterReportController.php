<?php

namespace App\Http\Controllers\Admin\reports;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\League;
use App\Models\Season;
use App\Models\AgeGroup;
use App\Models\AgeGroupGender;
use App\Models\MainEvent;
use App\Models\OrganizationSetting;
use App\Exports\StartersExport;
use App\User;
use PDF;
use Auth;
use Session;
use Excel;
use Carbon\Carbon;
use PhpOffice\PhpSpreadsheet\Calculation\TextData\Concatenate;

class starterReportController extends Controller
{
    public function calender(Request $request)
    {
        $eves = array();
       
        $events = Event::where('organization_id', Auth::user()->organization_id)->get();
        if(Auth::user()->hasRole(5)){
            foreach ($events as $event) {
                foreach ($event->ageGroups as $pivot) {
                    $genders = AgeGroupGender::where('age_group_event_id', $pivot->pivot->id)->get();
                    foreach ($genders as $gender) {
                        if ($gender->starter_id == Auth::user()->id) {
                            $eventName = $event->mainEvent->name;
                            $ageGroup = $pivot->pivot->ageGroup->name;
                            $gen = $gender->gender_id == 1 ? "M" : "F";
                            $join = $eventName . " " . $ageGroup . " " . $gen;
                            $eves[] = [
                                'title' => $join,
                                // false,
                                'start' =>$event->date." ".$gender->time
    
    
                            ];
                        }
                    }
                }
            }
            return view('calender.starterCalender', ['events' => $eves]);

        }
        else{
            foreach ($events as $event) {
                foreach ($event->ageGroups as $pivot) {
                    $genders = AgeGroupGender::where('age_group_event_id', $pivot->pivot->id)->get();
                    foreach ($genders as $gender) {
                        if ($gender->judge_id == Auth::user()->id) {
                            $eventName = $event->mainEvent->name;
                            $ageGroup = $pivot->pivot->ageGroup->name;
                            $gen = $gender->gender_id == 1 ? "M" : "F";
                            $join = $eventName . " " . $ageGroup . " " . $gen;
                            $eves[] = [
                                'title' => $join,
                                // false,
                                'start' =>$event->date." ".$gender->time
    
    
                            ];
                        }
                    }
                }
            }
            return view('calender.judgeCalender', ['events' => $eves]);

        }
        
       
    }
    public function starters(Request $request)
    {
        $id = Session::get('id');
        $seasons = Season::all();
        $judges = User::Role(['Starter'])->where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->get();
        $leagues = League::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->get();
        $ageGroups = AgeGroup::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->get();
        $mainEvents = MainEvent::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->get();
        $setting = OrganizationSetting::where('organization_id', Auth::user()->organization_id !== null ? Auth::user()->organization_id : $id)->first();
        $header = $setting ? $setting->header : '';
        $genders = AgeGroupGender::with('ageGroupEvent')->get();
        return view('reports.starters.starter', compact('header', 'setting', 'genders', 'id', 'seasons', 'leagues', 'ageGroups', 'mainEvents', 'judges'));
    }
    function filter(Request $request)
    {
        $id = Session::get('id');
        $length2 = $request->input('length2');
        $length = $request->input('length');
        $length3 = $request->input('length3');
        $length4 = $request->input('length4');
        $length5 = $request->input('length5');
        $length6 = $request->input('length6');
        Session::put('length', $length);
        Session::put('length3', $length3);
        Session::put('length2', $length2);
        Session::put('length4', $length4);
        Session::put('length5', $length5);
        Session::put('length6', $length6);

        $genders = AgeGroupGender::with('ageGroupEvent');

        $cats = $request->input('obj');
        Session::put('categories', $cats);


        foreach ($cats as $key => $values) {
            if ($key == "season") {
                if ($values[$length - 1] == "duplicate") {
                    $genders = AgeGroupGender::with('ageGroupEvent');
                } else {
                    $genders = $genders->whereHas('ageGroupEvent', function ($q) use ($values, $length) {
                        $q->whereHas('Event', function ($q) use ($values, $length) {



                            $q->where('season_id', $values[$length - 1]);
                        });
                    });
                }
            } elseif ($key == "league") {
                if ($values[$length2 - 1] == "duplicate2") {
                    $genders = AgeGroupGender::with('ageGroupEvent');
                } else {
                    $genders = $genders->whereHas('ageGroupEvent', function ($q) use ($values, $length2) {
                        $q->whereHas('Event', function ($q) use ($values, $length2) {



                            $q->where('league_id', $values[$length2 - 1]);
                        });
                    });
                }
            } elseif ($key == "gender") {


                if ($values[$length3 - 1] == "duplicate5") {
                    $genders = AgeGroupGender::with('ageGroupEvent');
                } else {
                    $genders = $genders->whereHas('gender', function ($q) use ($values, $length3) {



                        $q->where('id', $values[$length3 - 1]);
                    });
                }
            } elseif ($key == "judge") {


                if ($values[$length6 - 1] == "duplicateJudge") {
                    $genders = AgeGroupGender::with('ageGroupEvent');
                } else {
                    $genders = $genders->where('starter_id', $values[$length6 - 1]);
                }
            } elseif ($key == "age") {
                if ($values[$length4 - 1] == "duplicate4") {
                    $genders = AgeGroupGender::with('ageGroupEvent');
                } else {
                    $genders = $genders->whereHas('ageGroupEvent', function ($q) use ($values, $length4) {
                        $q->whereHas('ageGroup', function ($q) use ($values, $length4) {



                            $q->where('id', $values[$length4 - 1]);
                        });
                    });
                }
            } elseif ($key == "event") {
                if ($values[$length5 - 1] == "duplicate3") {
                    $genders = AgeGroupGender::with('ageGroupEvent');
                } else {
                    $genders = $genders->whereHas('ageGroupEvent', function ($q) use ($values, $length5) {
                        $q->whereHas('Event', function ($q) use ($values, $length5) {

                            $q->whereHas('mainEvent', function ($q) use ($values, $length5) {


                                $q->where('id', $values[$length5 - 1]);
                            });
                        });
                    });
                }
            }
        }

        $genders = $genders->get();
        $seasons = Season::all();
        $judges = User::Role(['Starter'])->where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->get();
        $leagues = League::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->get();
        $ageGroups = AgeGroup::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->get();
        $mainEvents = MainEvent::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->get();
        $setting = OrganizationSetting::where('organization_id', Auth::user()->organization_id !== null ? Auth::user()->organization_id : $id)->first();
        $header = $setting ? $setting->header : '';
        $view = view('reports.starters.search', compact('setting', 'header', 'genders', 'seasons', 'leagues', 'ageGroups', 'mainEvents', 'id'))->render();
        $view2 = view('reports.starters.export', compact('setting', 'header', 'genders', 'seasons', 'leagues', 'ageGroups', 'mainEvents', 'id'))->render();

        return response()->json([
            'html' => $view,

            'html2' => $view2
        ]);
    }


    public function generatePdf(Request $request)
    {
        $id = Session::get('id');
        $length = Session::get('length');
        $length3 = Session::get('length3');
        $length2 = Session::get('length2');
        $length4 = Session::get('length4');
        $length5 = Session::get('length5');
        $length6 = Session::get('length6');
        $id = Session::get('id');
        $genders = AgeGroupGender::with('ageGroupEvent');
        $setting = OrganizationSetting::where('organization_id', Auth::user()->organization_id !== null ? Auth::user()->organization_id : $id)->first();
        $header = $setting ? $setting->header : '';
        $categories = Session::get('categories');

        if ($categories) {
            foreach ($categories as $key => $values) {
                if ($key == "season") {
                    if ($values[$length - 1] == "duplicate") {
                        $genders = AgeGroupGender::with('ageGroupEvent');
                    } else {
                        $genders = $genders->whereHas('ageGroupEvent', function ($q) use ($values, $length) {
                            $q->whereHas('Event', function ($q) use ($values, $length) {



                                $q->where('season_id', $values[$length - 1]);
                            });
                        });
                    }
                } elseif ($key == "league") {
                    if ($values[$length2 - 1] == "duplicate2") {
                        $genders = AgeGroupGender::with('ageGroupEvent');
                    } else {
                        $genders = $genders->whereHas('ageGroupEvent', function ($q) use ($values, $length2) {
                            $q->whereHas('Event', function ($q) use ($values, $length2) {



                                $q->where('league_id', $values[$length2 - 1]);
                            });
                        });
                    }
                } elseif ($key == "gender") {


                    if ($values[$length3 - 1] == "duplicate5") {
                        $genders = AgeGroupGender::with('ageGroupEvent');
                    } else {
                        $genders = $genders->whereHas('gender', function ($q) use ($values, $length3) {



                            $q->where('id', $values[$length3 - 1]);
                        });
                    }
                } elseif ($key == "judge") {


                    if ($values[$length6 - 1] == "duplicateJudge") {
                        $genders = AgeGroupGender::with('ageGroupEvent');
                    } else {
                        $genders = $genders->where('starter_id', $values[$length6 - 1]);
                    }
                } elseif ($key == "age") {
                    if ($values[$length4 - 1] == "duplicate4") {
                        $genders = AgeGroupGender::with('ageGroupEvent');
                    } else {
                        $genders = $genders->whereHas('ageGroupEvent', function ($q) use ($values, $length4) {
                            $q->whereHas('ageGroup', function ($q) use ($values, $length4) {



                                $q->where('id', $values[$length4 - 1]);
                            });
                        });
                    }
                } elseif ($key == "event") {
                    if ($values[$length5 - 1] == "duplicate3") {
                        $genders = AgeGroupGender::with('ageGroupEvent');
                    } else {
                        $genders = $genders->whereHas('ageGroupEvent', function ($q) use ($values, $length5) {
                            $q->whereHas('Event', function ($q) use ($values, $length5) {

                                $q->whereHas('mainEvent', function ($q) use ($values, $length5) {


                                    $q->where('id', $values[$length5 - 1]);
                                });
                            });
                        });
                    }
                }
            }
        } else {
            $genders = AgeGroupGender::with('ageGroupEvent');
        }
        $genders = $genders->get();
        $seasons = Season::all();
        $judges = User::Role(['Starter'])->where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->get();
        $leagues = League::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->get();
        $ageGroups = AgeGroup::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->get();
        $mainEvents = MainEvent::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->get();
        $pdf = app('dompdf.wrapper');
        $pdf->getDomPDF()->set_option("enable_php", true);
        $pdf = PDF::loadView('reports.starters.pdf', compact('id','genders', 'header', 'setting'))->setPaper('a4', 'landscape');
        return $pdf->stream('Starters.pdf');
    }
    public function excel(Request $request)
    {
        $id = Session::get('id');
        $length = Session::get('length');
        $length2 = Session::get('length2');
        $length3 = Session::get('length3');
        $length4 = Session::get('length4');
        $length5 = Session::get('length5');
        $length6 = Session::get('length6');

        $categories = Session::get('categories');

        return Excel::download(new StartersExport($categories, $length, $length2, $length3, $length4, $length5, $length6, $id), 'Starter.xlsx');
    }
}
