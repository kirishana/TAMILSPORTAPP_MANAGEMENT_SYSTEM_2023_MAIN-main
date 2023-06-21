<?php

namespace App\Http\Controllers\Admin\reports;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Gender;
use App\Models\AgeGroup;
use App\Models\AgeGroupGender;
use PDF;
use Auth;
use Session;
use Excel;

class partcipantController extends Controller
{
    public function participants(Request $request)
    {
        $id = Session::get('id');
$participants=null;
        $events = Event::where('organization_id',Auth::user()->organization_id?Auth::user()->organization_id:$id)->get();
        $genders = Gender::all();
        $ageGroups = AgeGroup::where('organization_id',Auth::user()->organization_id?Auth::user()->organization_id:$id)->get();
        // $general = generalSetting::first();
        // $header = $general->header;
        
        return view('admin.reports.participants.particpants', compact('events', 'genders', 'ageGroups','participants'));
    }
    function filter(Request $request)
    {
        $id = Session::get('id');
        $events = Event::where('organization_id',Auth::user()->organization_id?Auth::user()->organization_id:$id)->get();
        $genders = Gender::all();
        $ageGroups = AgeGroup::where('organization_id',Auth::user()->organization_id?Auth::user()->organization_id:$id)->get();

        $length = $request->input('length');
        $length2 = $request->input('length2');
        $length3 = $request->input('length3');

        Session::put('length', $length);
        Session::put('length2', $length2);
        Session::put('length3', $length3);

        $participants = AgeGroupGender::where('status',2);
        $categories = $request->input('obj');
        Session::put('categories', $categories);
        foreach ($categories as $key => $values) {
            // dd($values);
            if ($key == "event")
             {
                if ($values[$length - 1] == "duplicate2") 
                {
                    $participants = AgeGroupGender::where('status',2);
                } 
                else {                  
                    $participants = $participants->whereHas('ageGroupEvent', function ($q) use ($values,$length) {
                        $q->whereHas('Event', function ($q) use ($values,$length) {
                                $q->where('id', $values[$length - 1]);
                        });
                    }) ;
                }
               
        


                //  dd($results);
            } 
            // elseif ($key == "season") {
            //     if ($values[$length - 1] == "duplicate") {
            //         $organizations = Organization::where('status', 1);
            //     } else {

            //         $organizations = $organizations->where('season_id', $values[$length - 1]);
            //     }
            // }
        }

        $participants = $participants->get();
        // dd($organizations);
        $view = view('admin.reports.participants.filterData',  compact('events', 'genders', 'ageGroups','participants'))->render();

        return response()->json(['html' => $view]);
    }

    public function generatePDF(Request $request)
    {

        $countries = Country::all();
        $seasons = Season::all();
        $organizations = Organization::all();
        $general = generalSetting::first();
        $header = $general->header;
        $length2 = Session::get('length2');
        $length = Session::get('length');
        $organizations = Organization::where('status', 1);
        $categories = Session::get('categories');
        if ($categories) {


            foreach ($categories as $key => $values) {
                if ($key == "country") {
                    if ($values[$length2 - 1] == "duplicate2") {
                        $organizations = Organization::where('status', 1);
                    } else {

                        $organizations = $organizations->where('country_id', $values[$length2 - 1]);
                    }
                } elseif ($key == "season") {
                    if ($values[$length - 1] == "duplicate") {
                        $organizations = Organization::where('status', 1);
                    } else {

                        $organizations = $organizations->where('season_id', $values[$length - 1]);
                    }
                }
            }
        } else {
            $organizations = Organization::where('status', 1);
        }
        $organizations = $organizations->get();
        $pdf = app('dompdf.wrapper');
        $pdf->getDomPDF()->set_option("enable_php", true);
        $pdf = PDF::loadView('admin.reports.pdf', compact('organizations', 'general', 'header'))->setPaper('a4', 'portrait');
        return $pdf->stream('Organizations.pdf');
    }
    public function Excel(Request $request)
    {
        $countries = Country::all();
        $seasons = Season::all();
        $organizations = Organization::all();
        $general = generalSetting::first();
        $header = $general->header;
        $length2 = Session::get('length2');
        $length = Session::get('length');
        $organizations = Organization::where('status', 1);
        $categories = Session::get('categories');

        return Excel::download(new OrganizationsExport($categories, $length, $length2), 'Organizations.xlsx');
    }

    //clubs

    public function clubs(Request $request)
    {
        // dd('hi');

        $countries = Country::all();
        $organizations = Organization::all();
        $seasons = Season::all();
        $clubs = Club::all();
        $general = generalSetting::first();
        $header = $general->header;

        return view('admin.reports.clubs', compact('clubs', 'countries', 'seasons', 'general', 'header', 'organizations'));
    }
    function filterClubs(Request $request)
    {
        $countries = Country::all();
        $seasons = Season::all();
        $organizations = Organization::all();
        $general = generalSetting::first();
        $header = $general->header;

        $length2 = $request->input('length2');
        $length = $request->input('length');
        $length3 = $request->input('length3');
        // dd($length2);
        Session::put('length2', $length2);
        Session::put('length', $length);
        Session::put('length3', $length3);


        $clubs = Club::where('is_approved', 1);
        $categories = $request->input('obj');
        Session::put('categories', $categories);
        // dd($categories);
        foreach ($categories as $key => $values) {
            if ($key == "country") {
                if ($values[$length2 - 1] == "duplicate2") {
                    $clubs = Club::where('is_approved', 1);
                } else {

                    $clubs = $clubs->where('country_id', $values[$length2 - 1]);
                    // dd($clubs->get());
                }


                //  dd($results);
            } elseif ($key == "name") {
                if ($values[$length3 - 1] == "empty") {
                    $clubs = Club::where('is_approved', 1);
                } else {

                    $clubs = $clubs->where('club_name', 'like', '%' . $values[$length3 - 1] . '%');
                    // dd($clubs->get());
                }
            } elseif ($key == "season") {

                if ($values[$length - 1] == "duplicate") {
                    $clubs = Club::where('is_approved', 1);
                } else {

                    $clubs = $clubs->where('season_id', $values[$length - 1]);
                }
                // dd($clubs->get());
            }
        }

        $clubs = $clubs->get();
        // dd($clubs);

        $view = view('admin.reports.filterClubData', compact('clubs', 'countries', 'seasons', 'general'))->render();
        $view2 = view('admin.reports.printClubPreview', compact('clubs', 'countries', 'seasons', 'general', 'header'))->render();

        return response()->json(['html' => $view]);
    }

    public function generateClubPdf(Request $request)
    {

        $countries = Country::all();
        $seasons = Season::all();
        $clubs = Club::all();
        $general = generalSetting::first();
        $header = $general->header;
        $length2 = Session::get('length2');
        $length = Session::get('length');
        $length3 = Session::get('length3');
        $clubs = Club::where('is_approved', 1);
        $categories = Session::get('categories');
        // dd($general);

        $categories = Session::get('categories');
        Session::get('length3');
        $clubs = Club::where('is_approved', 1);
        if ($categories) {
            foreach ($categories as $key => $values) {
                if ($key == "country") {
                    if ($values[$length2 - 1] == "duplicate2") {
                        $clubs = Club::where('is_approved', 1);
                    } else {

                        $clubs = $clubs->where('country_id', $values[$length2 - 1]);
                        // dd($clubs->get());
                    }


                    //  dd($results);
                } elseif ($key == "name") {
                    if ($values[$length3 - 1] == "empty") {
                        $clubs = Club::where('is_approved', 1);
                    } else {

                        $clubs = $clubs->where('club_name', 'like', '%' . $values[$length3 - 1] . '%');
                        // dd($clubs->get());
                    }
                } elseif ($key == "season") {

                    if ($values[$length - 1] == "duplicate") {
                        $clubs = Club::where('is_approved', 1);
                    } else {

                        $clubs = $clubs->where('season_id', $values[$length - 1]);
                    }
                    // dd($clubs->get());
                }
            }
        } else {
            $clubs = Club::where('is_approved', 1);
        }

        $clubs = $clubs->get();
        $pdf = app('dompdf.wrapper');
        $pdf->getDomPDF()->set_option("enable_php", true);
        $pdf = PDF::loadView('admin.reports.clubPdf', compact('clubs', 'general', 'header'))->setPaper('a4', 'portrait');
        return $pdf->stream('Clubs.pdf');
    }
    public function ClubExcel(Request $request)
    {
        $countries = Country::all();
        $seasons = Season::all();
        $organizations = Organization::all();
        $general = generalSetting::first();
        $header = $general->header;
        $length2 = Session::get('length2');
        $length = Session::get('length');
        $length3 = Session::get('length3');

        $clubs = Club::where('status', 1);
        $categories = Session::get('categories');

        return Excel::download(new ClubsExport($categories, $length, $length2, $length3), 'Clubs.xlsx');
    }
}
