<?php

namespace App\Http\Controllers\Admin\reports;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\Controller;
use App\Models\MainEvent;
use App\Models\League;
use App\Models\Season;
use App\Models\AgeGroup;
use App\Models\AgeGroupGender;
use App\Models\OrganizationSetting;
use App\Exports\JudgesExport;
use App\User;
use PDF;
use Auth;
use Session;
use Excel;

class judgeReportController extends Controller
{
    public function judges(Request $request)
    {
        $id = Session::get('id');
        Session::forget('categories');
        Session::forget('gendersSortType');
        Session::forget('gendersSortBy');

        $seasons = Season::all();
        $judges = User::Role([6])->where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->get();
        $starters = User::Role([5])->where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->get();
        $leagues = League::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->get();
        $ageGroups = AgeGroup::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->get();
        $mainEvents = MainEvent::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->get();
        $setting = OrganizationSetting::where('organization_id', Auth::user()->organization_id !== null ? Auth::user()->organization_id : $id)->first();
        $header = $setting ? $setting->header : '';
        $genders = AgeGroupGender::with('ageGroupEvent')->get();
        Session::put('gendersSort',$genders);

        return view('reports.judges.judge', compact('header','setting','genders','starters', 'id', 'seasons', 'leagues', 'ageGroups', 'mainEvents', 'judges'));
    }
    function filter(Request $request)
    {
        $id = Session::get('id');
        $gendersSortType=Session::get('gendersSortType');
        $gendersSortBy=Session::get('gendersSortBy');
        $genders = AgeGroupGender::with('ageGroupEvent');
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
            } 
            elseif ($key == "judge") {
                if($values!=0){
                    $genders = $genders->where('judge_id', $values);
                }
            } 
            elseif ($key == "starter") {
                if($values!=0){
                    $genders = $genders->where('starter_id', $values);
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
        }
    }else{
        $genders = AgeGroupGender::with('ageGroupEvent');

    }
        $genders = $genders->get();
        Session::put('gendersSort',$genders);
        if($gendersSortBy=='event'){
            if($gendersSortType=='asc'){
    
                $genders=$genders->sortBy(function($query){
                            return $query->ageGroupEvent->Event->mainEvent->name;
                         })->all();
                        }else{
                            $genders=$genders->sortByDesc(function($query){
                                return $query->ageGroupEvent->Event->mainEvent->name;
                             })->all();
                        }
                        }
                        elseif($gendersSortBy=='gender'){
                            if($gendersSortType=='asc'){
                            $genders=$genders->sortBy(function($query){
                                        return $query->gender->id;
                                     })->all();
                                    }
                                    
                                    else{
    
                                        $genders=$genders->sortByDesc(function($query){
                                            return $query->gender->id;
                                         })->all();
                                    }
                                    }
                                    elseif($gendersSortBy=='age'){
                                        if($gendersSortType=='asc'){
                                        $genders=$genders->sortBy(function($query){
                                                    return $query->ageGroupEvent->ageGroup->id;
                                                 })->all();
                                                }else{
                                                    $genders=$genders->sortByDesc(function($query){
                                                        return $query->ageGroupEvent->ageGroup->id;
                                                     })->all();
                                                }
                                                }
                                                elseif($gendersSortBy=='league'){
                                                    if($gendersSortType=='asc'){
                                                    $genders=$genders->sortBy(function($query){
                                                                return $query->ageGroupEvent->Event->league->id;
                                                             })->all();
                                                            }else{
                                                                $genders=$genders->sortByDesc(function($query){
                                                                    return $query->ageGroupEvent->Event->league->id;
                                                                 })->all();
                                                            }
                                                            }
                                                            elseif($gendersSortBy=='starter'){
                                                                if($gendersSortType=='asc'){
                                                                $genders=$genders->sortBy(function($query){
                                                                    return $query->starter?$query->starter->first_name:'';
                                                                })->all();
                                                                        }else{
                                                                            $genders=$genders->sortByDesc(function($query){
                                                                                return $query->starter?$query->starter->first_name:'';
                                                                            })->all();
                                                                        }
                                                                        }
                                                                        elseif($gendersSortBy=='judge'){
                                                                            if($gendersSortType=='asc'){
                                                                            $genders=$genders->sortBy(function($query){
                                                                                return $query->judge?$query->judge->first_name:'';
                                                                            })->all();
                                                                                    }else{
                                                                                        $genders=$genders->sortByDesc(function($query){
                                                                                            return $query->judge?$query->judge->first_name:'';
                                                                                        })->all();
                                                                                    }
                                                                                    }
                                                                                    elseif($gendersSortBy=='date'){
                                                                                        if($gendersSortType=='asc'){
                                                                                        $genders=$genders->sortBy(function($query){
                                                                                            return $query->ageGroupEvent->Event->date;
                                                                                        })->all();
                                                                                                }else{
                                                                                                    $genders=$genders->sortByDesc(function($query){
                                                                                                        return $query->ageGroupEvent->Event->date;
                                                                                                    })->all();
                                                                                                }
                                                                                                }
                                                                                                elseif($gendersSortBy=='time'){
                                                                                                    if($gendersSortType=='asc'){
                                                                                                    $genders=$genders->sortBy(function($query){
                                                                                                        return $query->starter?$query->time:'';
                                                                                                    })->all();
                                                                                                            }else{
                                                                                                                $genders=$genders->sortByDesc(function($query){
                                                                                                                    return $query->starter?$query->time:'';
                                                                                                                })->all();
                                                                                                            }
                                                                                                            }
        $seasons = Season::all();
        $judges = User::Role(['Judge'])->where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->get();
        $leagues = League::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->get();
        $ageGroups = AgeGroup::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->get();
        $mainEvents = MainEvent::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->get();
        $setting = OrganizationSetting::where('organization_id', Auth::user()->organization_id !== null ? Auth::user()->organization_id : $id)->first();
        $header = $setting ? $setting->header : '';
        $view = view('reports.judges.search', compact('setting','header','genders', 'seasons', 'leagues', 'ageGroups', 'mainEvents', 'id'))->render();
        $view2 = view('reports.judges.export', compact('setting','header','genders', 'seasons', 'leagues', 'ageGroups', 'mainEvents', 'id'))->render();

        return response()->json([
            'html' => $view,
            'html2' => $view2
        ]);
    }

public function sortBy(Request $request){
        $id=Session::get('id');
        $genders=Session::get('gendersSort');
        Session::put('gendersSortType',$request->input('order_type'));
        Session::put('gendersSortBy',$request->input('column_name'));
        $gendersSortType=Session::get('gendersSortType');
        $gendersSortBy=Session::get('gendersSortBy');


        if($gendersSortBy=='event'){
        if($gendersSortType=='asc'){

            $genders=$genders->sortBy(function($query){
                        return $query->ageGroupEvent->Event->mainEvent->name;
                     })->all();
                    }else{
                        $genders=$genders->sortByDesc(function($query){
                            return $query->ageGroupEvent->Event->mainEvent->name;
                         })->all();
                    }
                    }
                    elseif($gendersSortBy=='gender'){
                        if($gendersSortType=='asc'){
                        $genders=$genders->sortBy(function($query){
                                    return $query->gender->id;
                                 })->all();
                                }
                                
                                else{

                                    $genders=$genders->sortByDesc(function($query){
                                        return $query->gender->id;
                                     })->all();
                                }
                                }
                                elseif($gendersSortBy=='age'){
                                    if($gendersSortType=='asc'){
                                    $genders=$genders->sortBy(function($query){
                                                return $query->ageGroupEvent->ageGroup->id;
                                             })->all();
                                            }else{
                                                $genders=$genders->sortByDesc(function($query){
                                                    return $query->ageGroupEvent->ageGroup->id;
                                                 })->all();
                                            }
                                            }
                                            elseif($gendersSortBy=='league'){
                                                if($gendersSortType=='asc'){
                                                $genders=$genders->sortBy(function($query){
                                                            return $query->ageGroupEvent->Event->league->id;
                                                         })->all();
                                                        }else{
                                                            $genders=$genders->sortByDesc(function($query){
                                                                return $query->ageGroupEvent->Event->league->id;
                                                             })->all();
                                                        }
                                                        }
                                                        elseif($gendersSortBy=='starter'){
                                                            if($gendersSortType=='asc'){
                                                            $genders=$genders->sortBy(function($query){
                                                                return $query->starter?$query->starter->first_name:'';
                                                            })->all();
                                                                    }else{
                                                                        $genders=$genders->sortByDesc(function($query){
                                                                            return $query->starter?$query->starter->first_name:'';
                                                                        })->all();
                                                                    }
                                                                    }
                                                                    elseif($gendersSortBy=='judge'){
                                                                        if($gendersSortType=='asc'){
                                                                        $genders=$genders->sortBy(function($query){
                                                                            return $query->judge?$query->judge->first_name:'';
                                                                        })->all();
                                                                                }else{
                                                                                    $genders=$genders->sortByDesc(function($query){
                                                                                        return $query->judge?$query->judge->first_name:'';
                                                                                    })->all();
                                                                                }
                                                                                }
                                                                                elseif($gendersSortBy=='date'){
                                                                                    if($gendersSortType=='asc'){
                                                                                    $genders=$genders->sortBy(function($query){
                                                                                        return $query->ageGroupEvent->Event->date;
                                                                                    })->all();
                                                                                            }else{
                                                                                                $genders=$genders->sortByDesc(function($query){
                                                                                                    return $query->ageGroupEvent->Event->date;
                                                                                                })->all();
                                                                                            }
                                                                                            }
                                                                                            elseif($gendersSortBy=='time'){
                                                                                                if($gendersSortType=='asc'){
                                                                                                $genders=$genders->sortBy(function($query){
                                                                                                    return $query->starter?$query->time:'';
                                                                                                })->all();
                                                                                                        }else{
                                                                                                            $genders=$genders->sortByDesc(function($query){
                                                                                                                return $query->starter?$query->time:'';
                                                                                                            })->all();
                                                                                                        }
                                                                                                        }
                                            $seasons = Season::all();
                                            $judges = User::Role(['Judge'])->where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->get();
                                            $leagues = League::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->get();
                                            $ageGroups = AgeGroup::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->get();
                                            $mainEvents = MainEvent::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->get();
                                            $setting = OrganizationSetting::where('organization_id', Auth::user()->organization_id !== null ? Auth::user()->organization_id : $id)->first();
                                            $header = $setting ? $setting->header : '';
                                            $view = view('reports.judges.search', compact('setting','header','genders', 'seasons', 'leagues', 'ageGroups', 'mainEvents', 'id'))->render();
                                            $view2 = view('reports.judges.export', compact('setting','header','genders', 'seasons', 'leagues', 'ageGroups', 'mainEvents', 'id'))->render();
                                    
                                            return response()->json([
                                                'html' => $view,
                                                'html2' => $view2
                                            ]);
       
}
    public function generatePdf(Request $request)
    {
       
        $id = Session::get('id');
        $genders = AgeGroupGender::with('ageGroupEvent');
        $setting = OrganizationSetting::where('organization_id', Auth::user()->organization_id !== null ? Auth::user()->organization_id : $id)->first();
        $header = $setting ? $setting->header : '';
        $categories = Session::get('categories');
        $gendersSortType=Session::get('gendersSortType');
        $gendersSortBy=Session::get('gendersSortBy');

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
                    } elseif ($key == "gender") {
                        if($values!=0){
                            $genders = $genders->whereHas('gender', function ($q) use ($values) {
                                $q->where('id', $values);
                            });
                        }
                    } 
                    elseif ($key == "judge") {
                        if($values!=0){
                            $genders = $genders->where('judge_id', $values);
                        }
                    } 
                    elseif ($key == "starter") {
                        if($values!=0){
                            $genders = $genders->where('starter_id', $values);
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
                }
            }else{
                $genders = AgeGroupGender::with('ageGroupEvent');
        
            }
        $genders = $genders->get();
        Session::put('gendersSort',$genders);
        if($gendersSortBy=='event'){
            if($gendersSortType=='asc'){
    
                $genders=$genders->sortBy(function($query){
                            return $query->ageGroupEvent->Event->mainEvent->name;
                         })->all();
                        }else{
                            $genders=$genders->sortByDesc(function($query){
                                return $query->ageGroupEvent->Event->mainEvent->name;
                             })->all();
                        }
                        }
                        elseif($gendersSortBy=='gender'){
                            if($gendersSortType=='asc'){
                            $genders=$genders->sortBy(function($query){
                                        return $query->gender->id;
                                     })->all();
                                    }
                                    
                                    else{
    
                                        $genders=$genders->sortByDesc(function($query){
                                            return $query->gender->id;
                                         })->all();
                                    }
                                    }
                                    elseif($gendersSortBy=='age'){
                                        if($gendersSortType=='asc'){
                                        $genders=$genders->sortBy(function($query){
                                                    return $query->ageGroupEvent->ageGroup->id;
                                                 })->all();
                                                }else{
                                                    $genders=$genders->sortByDesc(function($query){
                                                        return $query->ageGroupEvent->ageGroup->id;
                                                     })->all();
                                                }
                                                }
                                                elseif($gendersSortBy=='league'){
                                                    if($gendersSortType=='asc'){
                                                    $genders=$genders->sortBy(function($query){
                                                                return $query->ageGroupEvent->Event->league->id;
                                                             })->all();
                                                            }else{
                                                                $genders=$genders->sortByDesc(function($query){
                                                                    return $query->ageGroupEvent->Event->league->id;
                                                                 })->all();
                                                            }
                                                            }
                                                            elseif($gendersSortBy=='starter'){
                                                                if($gendersSortType=='asc'){
                                                                $genders=$genders->sortBy(function($query){
                                                                    return $query->starter?$query->starter->first_name:'';
                                                                })->all();
                                                                        }else{
                                                                            $genders=$genders->sortByDesc(function($query){
                                                                                return $query->starter?$query->starter->first_name:'';
                                                                            })->all();
                                                                        }
                                                                        }
                                                                        elseif($gendersSortBy=='judge'){
                                                                            if($gendersSortType=='asc'){
                                                                            $genders=$genders->sortBy(function($query){
                                                                                return $query->judge?$query->judge->first_name:'';
                                                                            })->all();
                                                                                    }else{
                                                                                        $genders=$genders->sortByDesc(function($query){
                                                                                            return $query->judge?$query->judge->first_name:'';
                                                                                        })->all();
                                                                                    }
                                                                                    }
                                                                                    elseif($gendersSortBy=='date'){
                                                                                        if($gendersSortType=='asc'){
                                                                                        $genders=$genders->sortBy(function($query){
                                                                                            return $query->ageGroupEvent->Event->date;
                                                                                        })->all();
                                                                                                }else{
                                                                                                    $genders=$genders->sortByDesc(function($query){
                                                                                                        return $query->ageGroupEvent->Event->date;
                                                                                                    })->all();
                                                                                                }
                                                                                                }
                                                                                                elseif($gendersSortBy=='time'){
                                                                                                    if($gendersSortType=='asc'){
                                                                                                    $genders=$genders->sortBy(function($query){
                                                                                                        return $query->starter?$query->time:'';
                                                                                                    })->all();
                                                                                                            }else{
                                                                                                                $genders=$genders->sortByDesc(function($query){
                                                                                                                    return $query->starter?$query->time:'';
                                                                                                                })->all();
                                                                                                            }
                                                                                                            }
        $seasons = Season::all();
        $judges = User::Role(['Judge'])->where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->get();
        $leagues = League::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->get();
        $ageGroups = AgeGroup::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->get();
        $mainEvents = MainEvent::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->get();
        $pdf = app('dompdf.wrapper');
        $pdf->getDomPDF()->set_option("enable_php", true);
        $pdf = PDF::loadView('reports.judges.pdf', compact('id','genders', 'header', 'setting'))->setPaper('a4', 'landscape');
        return $pdf->stream('Judges.pdf');
    }
    public function Excel(Request $request)
    {
        $id = Session::get('id');
        $categories = Session::get('categories');
        $gendersSortType=Session::get('gendersSortType');
        $gendersSortBy=Session::get('gendersSortBy');

        return Excel::download(new JudgesExport($categories, $id,$gendersSortType,$gendersSortBy), 'Judges.xlsx');
    }
}
