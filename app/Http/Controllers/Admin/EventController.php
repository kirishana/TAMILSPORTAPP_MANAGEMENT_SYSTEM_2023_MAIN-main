<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\League;
use App\Models\Season;
use App\Models\Event;
use App\Models\Gender;
use App\Models\MainEvent;
use App\Models\AgeGroup;
use App\Models\AgeGroupEvent;
use App\Models\AgeGroupGender;
use App\Models\Organization;
use App\Models\EventCategory;
use App\Models\Registration;
use App\Models\Club;
use Spatie\Permission\Models\Role;
use App\Models\OrganizationSetting;
use App\Models\GroupRegistration;
use Auth;
use Yajra\DataTables\DataTables;
use App\User;
use Carbon\Carbon;
use PDF;
use App\Models\Team;
use App\Models\VenueDetail;
use Illuminate\Support\Str;
use Session;
use Excel;
use App\Exports\AllEventsExport;
use App\Exports\EventListsExport;
use App\Exports\EventsExport;
use App\Exports\EventsPlayerExport;
use App\Exports\EventOrgAllEventsExport;
use App\Exports\CancelledEventsExport;
use Database\Seeders\AgeGroupSeeder;
use Illuminate\Support\Facades\Validator;
use DB;
use Illuminate\Support\Facades\Notification;
use App\Notifications\PostponedEventNotification;
use App\Notifications\CancelledEventNotification;
use Illuminate\Support\Facades\Crypt;

use App\generalSetting;
use URL;
use Pusher\Pusher;

class EventController extends Controller
{
  public function marathon(Request $request){
        $clubs=null;
        $leagues=League::where('organization_id',Auth::user()->organization_id)->get();
        return view('marathon',compact('clubs','leagues'));
    }
public function leagueClubs($id){
    $league=League::find($id);
    $users=Registration::where('league_id',$id)->where('is_approved',1)->get();
    $clubs=array();
    foreach($users as $user){
        $clubs[]=$user->user->club_id;
    }
    $groups=GroupRegistration::where('league_id',$id)->groupBy('club_id')->get();
    // dd($clubs);
    array_unique($clubs);
    $clubs=array_diff_assoc(array_unique($clubs),array($groups));
    $view = view('marathon-include', compact('clubs','league'))->render();

        return response()->json(['html' => $view]);
}
    public function eventCreate()
    {
        $organizations = Organization::all();
        $id = Session::get('id');
        $events = Event::all();
        return view('events.create', compact('organizations', 'events', 'id'));
    }
    public function showall(Request $request)
    {
        $id = Session::get('id') ? Session::get('id') : '';
        $leagues = League::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->get();
        $events = Event::with(['user', 'ageGroups'])->where('organization_id', Auth::user()->organization_id ? Auth::user()->organization->id : $id)->get();
        return view('admin.leagues.events', compact('events', 'leagues', 'id'));
    }

    public function showEvent(Request $request)
    {
        $ids = $request->input('ids');
        $events = array();
        foreach ($ids as $id) {
            $events[] = Event::with('mainEvent')->find($id);
        }
        return response()->json(['events' => $events]);
    }
    public function showGroupEvent(Request $request)
    {
        $id = $request->input('id');
        $selected=array();
        foreach($request->input('selected') as $select){
            $selected[]=$select;
        }
        $teams=array();
        foreach($request->input('selected') as $select){
            $teams[]=Team::find($select)->name;
        }
        $age = AgeGroupGender::find($id);
        $groupevent = AgeGroupEvent::where('id', $age->age_group_event_id)->first();

        $event = Event::with('mainEvent')->find($groupevent->event_id);
        return response()->json([
            'event' => $event,
            'id' => $id,
            'members'=>$selected,
            'teams'=>$teams
        ]);
    }
    public function allEvents(Request $request)
    {
        Session::forget('ordertype');
        Session::forget('columnname');
        Session::forget('search');
        $id = Session::get('id');
        $seasonIds = array();
        $seasons = Season::where('status', 1)->get();
        foreach ($seasons as $season) {
            $seasonIds[] = $season->id;
        }
        $leagues = League::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->whereIn('season_id', $seasonIds)->get();
        $events = Event::with(['user', 'ageGroups'])->where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->whereIn('season_id',$seasonIds)->get();
        $setting = OrganizationSetting::where('organization_id', Auth::user()->organization_id !== null ? Auth::user()->organization_id : $id)->first();
        $header = $setting ? $setting->header : '';
        return view('admin.leagues.events', compact('header', 'setting', 'events', 'leagues', 'id'));
    }
   
    public function EventListSearch(Request $request)
    {
        $id = Session::get('id');
        $seasonIds = array();
        $seasons = Season::where('status', 1)->get();
        foreach ($seasons as $season) {
            $seasonIds[] = $season->id;
        }
        $search = $request->get('query');
        $ordertype = $request->get('ordertype');
        $columnname = $request->get('columnname');
        Session::put('ordertype', $ordertype);
        Session::put('columnname', $columnname);
        Session::put('search', $search);

        if ($search != '') {
            if($columnname){
            if($columnname=='name'){
            if($ordertype=='asc'){
                $events = Event::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->whereIn('season_id',$seasonIds)
            ->where(function($query) use($search){
                return $query
            ->whereHas('mainEvent', function ($q) use ($search) {


                $q->where('name', 'LIKE', '%' . $search . '%');
            })


                ->orwhereHas('league', function ($q) use ($search) {

                    $q->where('name', 'LIKE', '%' . $search . '%');
                })
                ->orwhereHas('ageGroups', function ($q) use ($search) {


                    $q->where('name', 'LIKE', '%' . $search . '%');
                });
             })->get()->sortBy('mainEvent.name');
            }else{
                $events = Event::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->whereIn('season_id',$seasonIds)
                ->where(function($query) use($search){
                    return $query
                ->whereHas('mainEvent', function ($q) use ($search) {
    
    
                    $q->where('name', 'LIKE', '%' . $search . '%');
                })
    
    
                    ->orwhereHas('league', function ($q) use ($search) {
    
                        $q->where('name', 'LIKE', '%' . $search . '%');
                    })
                    ->orwhereHas('ageGroups', function ($q) use ($search) {
    
    
                        $q->where('name', 'LIKE', '%' . $search . '%');
                    });
                 })->get()->sortByDesc('mainEvent.name');
            }
            }
            if($columnname=='league_id'){
                if($ordertype=='asc'){
                    $events = Event::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->whereIn('season_id',$seasonIds)
                ->where(function($query) use($search){
                    return $query
                ->whereHas('mainEvent', function ($q) use ($search) {
    
    
                    $q->where('name', 'LIKE', '%' . $search . '%');
                })
    
    
                    ->orwhereHas('league', function ($q) use ($search) {
    
                        $q->where('name', 'LIKE', '%' . $search . '%');
                    })
                    ->orwhereHas('ageGroups', function ($q) use ($search) {
    
    
                        $q->where('name', 'LIKE', '%' . $search . '%');
                    });
                 })->orderBy(League::select('name')->whereColumn('leagues.id','events.league_id'),'asc')->get();
                }else{
                    $events = Event::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->whereIn('season_id',$seasonIds)
                    ->where(function($query) use($search){
                        return $query
                    ->whereHas('mainEvent', function ($q) use ($search) {
        
        
                        $q->where('name', 'LIKE', '%' . $search . '%');
                    })
        
        
                        ->orwhereHas('league', function ($q) use ($search) {
        
                            $q->where('name', 'LIKE', '%' . $search . '%');
                        })
                        ->orwhereHas('ageGroups', function ($q) use ($search) {
        
        
                            $q->where('name', 'LIKE', '%' . $search . '%');
                        });
                     })->orderBy(League::select('name')->whereColumn('leagues.id','events.league_id'),'desc')->get();
                }
                }

            }else{

                $events = Event::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->whereIn('season_id',$seasonIds)
            ->where(function($query) use($search){
                return $query
            ->whereHas('mainEvent', function ($q) use ($search) {


                $q->where('name', 'LIKE', '%' . $search . '%');
            })


                ->orwhereHas('league', function ($q) use ($search) {

                    $q->where('name', 'LIKE', '%' . $search . '%');
                })
                ->orwhereHas('ageGroups', function ($q) use ($search) {


                    $q->where('name', 'LIKE', '%' . $search . '%');
                });
             })->get();

            }
            
        } 
        else {
            if($columnname){
                if($columnname=='name'){
                    if($ordertype=='asc'){
                        $events = Event::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->whereIn('season_id',$seasonIds)->orderBy(MainEvent::select('name')->whereColumn('main_events.id','events.main_event_id'),'asc')->get();
                    }else{

                    $events = Event::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->whereIn('season_id',$seasonIds)->orderBy(MainEvent::select('name')->whereColumn('main_events.id','events.main_event_id'),'desc')->get();

                    }

                }
                else if($columnname=='league_id'){
                    if($ordertype=='asc'){
                        $events = Event::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->whereIn('season_id',$seasonIds)->orderBy(League::select('name')->whereColumn('leagues.id','events.league_id'),$ordertype)->get();
                    }else{
                    $events = Event::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->whereIn('season_id',$seasonIds)->orderBy(League::select('name')->whereColumn('leagues.id','events.league_id'),'desc')->get();

                    }

                }else{
                    $events = Event::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->whereIn('season_id',$seasonIds)->orderBy($columnname,$ordertype)->get();
                }
            }else{
            $events = Event::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->whereIn('season_id',$seasonIds)->get();
            }
        }



        $AgeGroups = AgeGroup::all();
        $judges = User::role('Judge')->where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->where('is_approved', 1)->get();
        $starters = User::role('Starter')->where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->where('is_approved', 1)->get();
        $agegroups = AgeGroup::all();
        $leagues = League::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->get();

        $setting = OrganizationSetting::where('organization_id', Auth::user()->organization_id !== null ? Auth::user()->organization_id : $id)->first();
        $header = $setting ? $setting->header : '';
        $view = view('admin.events.EventLists', compact('header', 'setting', 'events', 'judges', 'starters', 'agegroups', 'leagues', 'id'))->render();
        $view2 = view('admin.events.printEventLists', compact('header', 'setting', 'events', 'judges', 'starters', 'agegroups', 'leagues', 'id'))->render();

        return response()->json([
            'html' => $view,
            'html2' => $view2
        ]);
    }
    public function PDFEventGenerate(Request $request)
    {
        $search = Session::get('search');
        $columnname = Session::get('columnname');
        $ordertype = Session::get('ordertype');
        $id = Session::get('id');
        $seasonIds = array();
        $seasons = Season::where('status', 1)->get();
        foreach ($seasons as $season) {
            $seasonIds[] = $season->id;
        }
        $setting = OrganizationSetting::where('organization_id', Auth::user()->organization_id !== null ? Auth::user()->organization_id : $id)->first();
        $header = $setting ? $setting->header : '';
        if ($search != '') {
            if($columnname){
            if($columnname=='name'){
            if($ordertype=='asc'){
                $events = Event::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->whereIn('season_id',$seasonIds)
            ->where(function($query) use($search){
                return $query
            ->whereHas('mainEvent', function ($q) use ($search) {


                $q->where('name', 'LIKE', '%' . $search . '%');
            })


                ->orwhereHas('league', function ($q) use ($search) {

                    $q->where('name', 'LIKE', '%' . $search . '%');
                })
                ->orwhereHas('ageGroups', function ($q) use ($search) {


                    $q->where('name', 'LIKE', '%' . $search . '%');
                });
             })->get()->sortBy('mainEvent.name');
            }else{
                $events = Event::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->whereIn('season_id',$seasonIds)
                ->where(function($query) use($search){
                    return $query
                ->whereHas('mainEvent', function ($q) use ($search) {
    
    
                    $q->where('name', 'LIKE', '%' . $search . '%');
                })
    
    
                    ->orwhereHas('league', function ($q) use ($search) {
    
                        $q->where('name', 'LIKE', '%' . $search . '%');
                    })
                    ->orwhereHas('ageGroups', function ($q) use ($search) {
    
    
                        $q->where('name', 'LIKE', '%' . $search . '%');
                    });
                 })->get()->sortByDesc('mainEvent.name');
            }
            }
            if($columnname=='league_id'){
                if($ordertype=='asc'){
                    $events = Event::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->whereIn('season_id',$seasonIds)
                ->where(function($query) use($search){
                    return $query
                ->whereHas('mainEvent', function ($q) use ($search) {
    
    
                    $q->where('name', 'LIKE', '%' . $search . '%');
                })
    
    
                    ->orwhereHas('league', function ($q) use ($search) {
    
                        $q->where('name', 'LIKE', '%' . $search . '%');
                    })
                    ->orwhereHas('ageGroups', function ($q) use ($search) {
    
    
                        $q->where('name', 'LIKE', '%' . $search . '%');
                    });
                 })->orderBy(League::select('name')->whereColumn('leagues.id','events.league_id'),'asc')->get();
                }else{
                    $events = Event::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->whereIn('season_id',$seasonIds)
                    ->where(function($query) use($search){
                        return $query
                    ->whereHas('mainEvent', function ($q) use ($search) {
        
        
                        $q->where('name', 'LIKE', '%' . $search . '%');
                    })
        
        
                        ->orwhereHas('league', function ($q) use ($search) {
        
                            $q->where('name', 'LIKE', '%' . $search . '%');
                        })
                        ->orwhereHas('ageGroups', function ($q) use ($search) {
        
        
                            $q->where('name', 'LIKE', '%' . $search . '%');
                        });
                     })->orderBy(League::select('name')->whereColumn('leagues.id','events.league_id'),'desc')->get();
                }
                }
            }else{

                $events = Event::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->whereIn('season_id',$seasonIds)
            ->where(function($query) use($search){
                return $query
            ->whereHas('mainEvent', function ($q) use ($search) {


                $q->where('name', 'LIKE', '%' . $search . '%');
            })


                ->orwhereHas('league', function ($q) use ($search) {

                    $q->where('name', 'LIKE', '%' . $search . '%');
                })
                ->orwhereHas('ageGroups', function ($q) use ($search) {


                    $q->where('name', 'LIKE', '%' . $search . '%');
                });
             })->get();

            }
            
        } 
        else {
            if($columnname){
                if($columnname=='name'){
                    if($ordertype=='asc'){
                        $events = Event::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->whereIn('season_id',$seasonIds)->orderBy(MainEvent::select('name')->whereColumn('main_events.id','events.main_event_id'),$ordertype)->get();
                    }else{
                    $events = Event::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->whereIn('season_id',$seasonIds)->orderBy(MainEvent::select('name')->whereColumn('main_events.id','events.main_event_id'),$ordertype)->get();

                    }

                }
                else if($columnname=='league_id'){
                    if($ordertype=='asc'){
                        $events = Event::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->whereIn('season_id',$seasonIds)->orderBy(League::select('name')->whereColumn('leagues.id','events.league_id'),$ordertype)->get();
                    }else{
                    $events = Event::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->whereIn('season_id',$seasonIds)->orderBy(League::select('name')->whereColumn('leagues.id','events.league_id'),'desc')->get();

                    }

                }else{
                    $events = Event::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->whereIn('season_id',$seasonIds)->orderBy($columnname,$ordertype)->get();
                }
            }else{
            $events = Event::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->whereIn('season_id',$seasonIds)->get();
            }
        }


        $AgeGroups = AgeGroup::all();
        $judges = User::role('Judge')->where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->where('is_approved', 1)->get();
        $starters = User::role('Starter')->where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->where('is_approved', 1)->get();
        $agegroups = AgeGroup::all();
        $leagues = League::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->get();
        $pdf = app('dompdf.wrapper');
        $pdf->getDomPDF()->set_option("enable_php", true);
        $org=Organization::find(Auth::user()->organization_id);
        $pdf = PDF::loadView('admin.events.eventListPdf', compact('org','events', 'judges', 'starters', 'agegroups', 'leagues', 'id', 'setting', 'header'))->setPaper('a4', 'landscape');
        return $pdf->stream('Events.pdf');
    }
    public function AllEventListExcel(Request $request)
    {

        $search = Session::get('search');
        $columnname = Session::get('columnname');
        $ordertype = Session::get('ordertype');
        $id = Session::get('id');
        return Excel::download(new EventListsExport($search, $id,$columnname,$ordertype), 'Event Lists.xlsx');
    }

    public function index(Request $request)
    {
        $id = Session::get('id');
        Session::forget('gendersSortBy');
        Session::forget('sortType');
        Session::forget('sortBy');
        Session::forget('futureEvents');
        $seasonIds = array();
        $seasons = Season::where('status', 1)->get();
        $today = Carbon::now()->format('Y-m-d');
        // dd($today);

        foreach ($seasons as $season) {
            $seasonIds[] = $season->id;
        }
        if (Auth::user()->hasRole(3)) {
            $futureEvents=null;
            $leagueEvents = League::where('to_date', '>=', Carbon::now()->format('Y-m-d'))->where('from_date', '<', Carbon::now())->orwhere('from_date', '>=', Carbon::now()->format('Y-m-d'))->get();
            $leaguePastEvents = League::where('to_date', '<', Carbon::now())->get();
            $club = Club::find(Auth::user()->club_id);
            $organizations = Organization::all();
            $events = Event::where('organization_id', Auth::user()->organization_id)->whereIn('season_id', $seasonIds)->get();
            $judges = User::role('Judge')->where('organization_id', Auth::user()->organization_id)->where('is_approved', 1)->get();
            $starters = User::role('Starter')->where('organization_id', Auth::user()->organization_id)->where('is_approved', 1)->get();
            $agegroups = AgeGroup::where('organization_id', Auth::user()->organization_id)->get();
            $leagues =League::where('reg_start_date','<=',Carbon::now()->format('Y-m-d'))->where('reg_end_date','>=',Carbon::now()->format('Y-m-d'))->get();
            $teams = Team::where('club_id', Auth::user()->club_id)->get();
            $ongngLeague=League::where('organization_id',Auth::user()->organization_id?Auth::user()->organization_id:$id)->where('reg_start_date','<=',Carbon::now()->format('Y-m-d'))->where('reg_end_date','>=',Carbon::now()->format('Y-m-d'))->orderBy('id','desc')->latest()->first();
            $selectedLeague=$ongngLeague?$ongngLeague:null;
            return view('clubs.index', compact('selectedLeague','futureEvents','teams', 'leaguePastEvents', 'leagueEvents', 'events', 'judges', 'starters', 'agegroups', 'leagues', 'organizations', 'season'));
        } 
        else {

            $upcomingEvents = Auth::user()->registrations;
                        $upcomingEventsOld = Auth::user()->registrations;
            $seasons = Season::where('status', 1)->get();
            $organizations = Organization::all();
            $allTimes =array();
            $allTimes2 =array();
            $times=array();
            $genderss=array();

if(Auth::user()->hasRole(4)||Auth::user()->hasRole(2)){
    $genders = AgeGroupGender::with('ageGroupEvent')->get();

}
else{
  
    $genders = AgeGroupGender::whereNotIn('status',[1])->get();

}
Session::put('gendersSortBy', $genders);
            $judges = User::role('Judge')->where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->where('is_approved', 1)->get();
            $starters = User::role('Starter')->where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->where('is_approved', 1)->get();
            $events = Event::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->orderBy('created_at', 'ASC')->get();
            $agegroups = AgeGroup::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->get();
            $seasons = Season::where('status',1)->get();
            $gender = Gender::all();
            $ageGroups = AgeGroup::where('organization_id', Auth::user()->organization_id !== null ? Auth::user()->organization_id : $id)->get();
            $mainEvents = MainEvent::where('organization_id', Auth::user()->organization_id !== null ? Auth::user()->organization_id : $id)->get();
            $leagues = League::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->whereIn('season_id', $seasonIds)->where('to_date', '>=', Carbon::now()->format('Y-m-d'))->get();
            $teams = Team::where('club_id', Auth::user()->club_id)->get();
            $setting = OrganizationSetting::where('organization_id', Auth::user()->organization_id !== null ? Auth::user()->organization_id : $id)->first();
            $header = $setting ? $setting->header : '';

            if (Auth::user()->hasRole(2) || Auth::user()->hasRole(8)) {
                return view('admin.events.orgEvents', compact( 'allTimes','setting', 'header', 'today', 'seasons', 'gender', 'ageGroups', 'mainEvents', 'teams', 'genders', 'events', 'judges', 'starters', 'agegroups', 'leagues', 'organizations', 'upcomingEvents', 'id'));
            } elseif (Auth::user()->hasRole(5) || Auth::user()->hasRole(6)) {
                $general = generalSetting::first();
                if (URL::previous() == $general->website_url."final/participants") {
                    $ageGroupGender=AgeGroupGender::find($request->input('participants'));
                    $ageGroupGender->heats_final_date=$request->input('finalDate');
                    $ageGroupGender->save();
                    $genderUsers=DB::table('age_group_gender_user')->where('age_group_gender_id',$request->input('participants'))->get();
                    $notifiedData = [
                        'name' => $ageGroupGender->ageGroupEvent->event->mainEvent->name,
                        'league' => $ageGroupGender->ageGroupEvent->event->league->name,
                        'org' => $ageGroupGender->ageGroupEvent->event->organization->name,
                        'ageGroup' => $ageGroupGender->ageGroupEvent->ageGroup->name,
                        'gender' => $ageGroupGender->gender->id == 1 ? 'Male' : 'Female',
                        'date'=>$ageGroupGender->heats_final_date,
                        'body' => 'The above event will happen on'.$ageGroupGender->heats_final_date.'this date',
                        'thanks' => 'Thank you',
                    ];
                    foreach ($genderUsers as $user) {
                        Notification::send(User::find($user->user_id), new PostponedEventNotification($notifiedData));
                    }
                    return view('admin.events.starter-events', compact('seasons', 'gender', 'ageGroups', 'mainEvents', 'events', 'judges', 'starters', 'agegroups', 'leagues', 'organizations', 'upcomingEvents', 'id', 'genders'));

                }
                else{

                   if($request->ajax()){
                    return view('admin.events.starterincludeEvents', compact('seasons', 'gender', 'ageGroups', 'mainEvents', 'events', 'judges', 'starters', 'agegroups', 'leagues', 'organizations', 'upcomingEvents', 'id', 'genders'));

                   }
                return view('admin.events.starter-events', compact('seasons', 'gender', 'ageGroups', 'mainEvents', 'events', 'judges', 'starters', 'agegroups', 'leagues', 'organizations', 'upcomingEvents', 'id', 'genders'));
                    
            }
        } else {
                return view('admin.events.index', compact('upcomingEventsOld','setting', 'header', 'today', 'seasons', 'gender', 'ageGroups', 'mainEvents', 'teams', 'genders', 'events', 'judges', 'starters', 'agegroups', 'leagues', 'organizations', 'upcomingEvents', 'id'));
            }
        }
    }
    public function editEvent($id)
    {
        $reg = Registration::find($id);
        $user = null;
          $organization_id = $reg->organization_id;
        $organization = Organization::find($organization_id);
        $league_id = $reg->league_id;
        // $trackEvents = $request->events ? $request->events : '';
        // $fieldEvents = $request->events2 ? $request->events2 : '';
        return view('admin.events.editUserEvent', compact('reg', 'user','organization_id','league_id'));
    }
     public function editParticipantEvent($id)
    {
        $reg = Registration::find(Crypt::decrypt($id));
        $organization_id = $reg->organization_id;
        $organization = Organization::find($organization_id);
        $league_id = $reg->league_id;
        $user=$reg->user;
        return view('admin.events.editParticipantEvent', compact('reg', 'user','organization_id','league_id'));
    } 
    public function editChildrenEvent($id, $userId)
    {
        $reg = Registration::find($id);
        $user = User::find($userId);
        $organization_id = $reg->organization_id;
        $organization = Organization::find($organization_id);
        $league_id = $reg->league_id;

        return view('admin.events.edit-child-event', compact('reg', 'user','organization_id','league_id','organization'));
    }
       public function editMemberEvent($id, $userId)
    {
        $reg = Registration::find($id);
        $user = User::find($userId);
        $organization_id = $reg->organization_id;
        $organization = Organization::find($organization_id);
        $league_id = $reg->league_id;

        return view('admin.events.edit-member-event', compact('reg', 'user','organization_id','league_id','organization'));
    }
    public function childrenEvents($id)
    {
        
        
          $parent_id = Auth::user()->id;
        $user = User::find(Crypt::decrypt($id));
        if($user->parent_id==$parent_id){
        $upcomingEvents = User::find(Crypt::decrypt($id)) ? User::find(Crypt::decrypt($id))->registrations : "";
        $organizations = Organization::all();
        $events = User::find(Crypt::decrypt($id)) ? Event::where('organization_id', User::find(Crypt::decrypt($id))->organization_id)->get() : "";
        // ->orWhere('organization_id', Auth::user()->organization_id)->get();
        $judges = User::find(Crypt::decrypt($id)) ? User::role('Judge')->where('organization_id', User::find(Crypt::decrypt($id))->organization_id)->get() : "";
        $starters = User::find(Crypt::decrypt($id)) ? User::role('Starter')->where('organization_id', User::find(Crypt::decrypt($id))->organization_id)->get() : "";
        $agegroups = User::find(Crypt::decrypt($id)) ? AgeGroup::where('organization_id', User::find(Crypt::decrypt($id))->organization_id)->get() : "";
        $leagues = User::find(Crypt::decrypt($id)) ? League::where('organization_id', User::find(Crypt::decrypt($id))->organization_id)->get() : "";

        return view('admin.events.children-index', compact('events', 'judges', 'starters', 'agegroups', 'leagues', 'organizations', 'upcomingEvents', 'user'));
    }else{
        return redirect('/members');
    }
        // $user = User::find($id);
        // // dd($user);
        // $upcomingEvents = User::find($id) ? User::find($id)->registrations : "";

        // $organizations = Organization::all();
        // $events = User::find($id) ? Event::where('organization_id', User::find($id)->organization_id)->get() : "";
        // // ->orWhere('organization_id', Auth::user()->organization_id)->get();
        // $judges = User::find($id) ? User::role('Judge')->where('organization_id', User::find($id)->organization_id)->get() : "";
        // $starters = User::find($id) ? User::role('Starter')->where('organization_id', User::find($id)->organization_id)->get() : "";
        // $agegroups = User::find($id) ? AgeGroup::where('organization_id', User::find($id)->organization_id)->get() : "";
        // $leagues = User::find($id) ? League::where('organization_id', User::find($id)->organization_id)->get() : "";

        // return view('admin.events.children-index', compact('events', 'judges', 'starters', 'agegroups', 'leagues', 'organizations', 'upcomingEvents', 'user'));
    }
        public function clubMemberEvents($id)
    {
        $userDet = User::find(Crypt::decrypt($id));
        $upcomingEvents = User::find(Crypt::decrypt($id)) ? User::find(Crypt::decrypt($id))->registrations : "";

        $organizations = Organization::all();
        $events = User::find($id) ? Event::where('organization_id', User::find(Crypt::decrypt($id))->organization_id)->get() : "";
        // ->orWhere('organization_id', Auth::user()->organization_id)->get();
        $judges = User::find($id) ? User::role('Judge')->where('organization_id', User::find(Crypt::decrypt($id))->organization_id)->get() : "";
        $starters = User::find($id) ? User::role('Starter')->where('organization_id', User::find(Crypt::decrypt($id))->organization_id)->get() : "";
        $agegroups = User::find($id) ? AgeGroup::where('organization_id', User::find(Crypt::decrypt($id))->organization_id)->get() : "";
        $leagues = User::find($id) ? League::where('organization_id', User::find(Crypt::decrypt($id))->organization_id)->get() : "";
    return view('admin.events.member-index', compact('events', 'judges', 'starters', 'agegroups', 'leagues', 'organizations', 'upcomingEvents', 'userDet'));


    }
    public function orgMemberEvents($id)
    {
        $member = User::find(Crypt::decrypt($id));
        $upcomingEvents = User::find(Crypt::decrypt($id)) ? User::find(Crypt::decrypt($id))->registrations : "";

        $organizations = Organization::all();
        $events = User::find($id) ? Event::where('organization_id', User::find(Crypt::decrypt($id))->organization_id)->get() : "";
        // ->orWhere('organization_id', Auth::user()->organization_id)->get();
        $judges = User::find($id) ? User::role('Judge')->where('organization_id', User::find(Crypt::decrypt($id))->organization_id)->get() : "";
        $starters = User::find($id) ? User::role('Starter')->where('organization_id', User::find(Crypt::decrypt($id))->organization_id)->get() : "";
        $agegroups = User::find($id) ? AgeGroup::where('organization_id', User::find(Crypt::decrypt($id))->organization_id)->get() : "";
        $leagues = User::find($id) ? League::where('organization_id', User::find(Crypt::decrypt($id))->organization_id)->get() : "";

    return view('admin.events.user-index', compact('events', 'judges', 'starters', 'agegroups', 'leagues', 'organizations', 'upcomingEvents', 'member'));

}
    
    public function participants($id, Request $request)
    {
        Session::put('ageGroupGenderId', $id);
        $AgeGroupGender = AgeGroupGender::where('id', $id)->first();
        $AgegroupEvent = AgeGroupEvent::where('id', $AgeGroupGender->age_group_event_id)->first();
        $Agegroup = AgeGroup::where('id', $AgegroupEvent->age_group_id)->first();
        $event = Event::where('id', $AgegroupEvent->event_id)->first();
        $venueDetails = $event->league->venue->venueDetails;
        if ($event->mainEvent->event_category_id == 3) {
            $registrations = GroupRegistration::where('age_group_gender_id', $AgeGroupGender->id)->get();
            return view('players.teamParticipants', compact('registrations', 'AgeGroupGender', 'venueDetails'));
        } else {
            $registrations = $event->registrations;
            if (Auth::user()->hasRole(2) || Auth::user()->hasRole(8)) {

                return view('players.orgParticipants', compact('registrations', 'AgeGroupGender', 'Agegroup', 'event', 'venueDetails'));
            } else {
                $seasons = Season::where('status', 1)->get();
                $seasonIds = array();
                $seasons = Season::where('status', 1)->get();
                $today = Carbon::now()->format('Y-m-d');
                foreach ($seasons as $season) {
                    $seasonIds[] = $season->id;
                }
                $genders = AgeGroupGender::with('ageGroupEvent')->get();
                $gender=null;
            $organizations = Organization::all();
            $ageGroups = AgeGroup::where('organization_id', Auth::user()->organization_id !== null ? Auth::user()->organization_id : $id)->get();
            $mainEvents = MainEvent::where('organization_id', Auth::user()->organization_id !== null ? Auth::user()->organization_id : $id)->get();
            $leagues = League::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->whereIn('season_id', $seasonIds)->where('to_date', '>=', Carbon::now()->format('Y-m-d'))->get();
            $teams = Team::where('club_id', Auth::user()->club_id)->get();
           
                return view('players.participants', compact('gender','genders','ageGroups','leagues','mainEvents','seasons','organizations','registrations', 'AgeGroupGender', 'Agegroup', 'event', 'venueDetails'));
            }
        }
    }
    public function genderRegistration(Request $request,$id){
        $AgeGroupGender = AgeGroupGender::find($id);
        $AgegroupEvent = AgeGroupEvent::where('id', $AgeGroupGender->age_group_event_id)->first();
          $Agegroup =AgeGroup::where('id', $AgegroupEvent->age_group_id)->first();
          $event = Event::where('id', $AgegroupEvent->event_id)->first();
         $count=0;
        $count1=0;
        $count2=0;
        $group='empty';
        $individual='empty';
                $individual1='empty';

                   if ($event->mainEvent->event_category_id == 3) {
                   
                   $grpregistrations = GroupRegistration::where('age_group_gender_id', $id)->get();
                  foreach($grpregistrations as $registartion){
                      foreach($registartion->teams->where('status',1) as $team){
                                               $count++;
                   }
                      $group='yes';
                      
                      
                      
                  }
               } 
               else{
                       $registrations = $event->registrations;
                       foreach ($registrations as $registration) {
                           if($registration->is_approved==1){
                           $mine = Carbon::createFromFormat('Y-m-d', $registration->user->dob)->format('Y');
                           $league1 = Carbon::createFromFormat('Y-m-d', $event->league->to_date)->format('Y');
                           $age = $league1 - $mine;
                           $exp = preg_split("/-/", $Agegroup->name);
                           $users = array();
                           if (isset($exp[1])) {
                               if (($exp[0] == $age || $exp[0] < $age) && ($exp[1] == $age || $exp[1] > $age)) {
                                   if ($AgeGroupGender->gender_id == $registration->gender) {
                                       $ageUsers = $registration->user;
                                       $count1++;
                 
   
                                   }
                               }
                           }
                           elseif ($exp[0] == $age) {
                               if ($AgeGroupGender->gender_id == $registration->gender) {
                                   $ageUsers = $registration->user;
                                   $count2++;

   
                  }
                           }
                       }
                       }

                   }
                   if(isset($exp[1])){
                       $ageDivide='yes';
                   }
                   else{
                      $ageDivide='no'; 
                   }
                //    dd($ageDivide);

                     $url="participants/$id";
                   return response()->json(['url'=>$url,'id'=>$id,'count'=>$count,'count1'=>$count1,'count2'=>$count2,'group'=>$group,'ind'=>$individual,'ind1'=>$individual1,'category'=>$event->mainEvent->event_category_id,'age'=>$ageDivide]); 
                   
                }
   
 
               
    
    public function finalParticipants($id, Request $request)
    {
        $ageGroupGender = AgeGroupGender::where('id', $id)->first();
        $AgegroupEvent = AgeGroupEvent::where('id', $ageGroupGender->age_group_event_id)->first();
        $Agegroup = AgeGroup::where('id', $AgegroupEvent->age_group_id)->first();
        $event = Event::where('id', $AgegroupEvent->event_id)->first();
        $venueDetails = $event->league->venue->venueDetails;
        $users = $ageGroupGender->users;
        Session::put('users',$users);
        Session::put('event',$event);
        Session::put('Agegroup',$Agegroup);
        Session::put('AgeGroupGender',$ageGroupGender);

        DB::table('age_group_genders')->where('id', $id)->update(['status' => 4]);
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
 $date=$ageGroupGender->ageGroupEvent->event->date;
         $data = ['status' =>$ageGroupGender->status,"id"=>$ageGroupGender->id,"eventId"=>$eventId,"ageGender"=>$ageGroupGender,'event'=>$event,'league'=>$league,'organizer'=>$organizer,'ageGroup'=>$ageGroup,'gender'=>$gender,'time'=>$time,'date'=>$date];
         
        $pusher->trigger('my-channel', 'my-event', $data);
        $url='/final-participants-heats';
        
        return response()->json(['url'=>$url]);


    }
    public function finalParticipantHeats(Request $request){
        $users=Session::get('users');
        $event=Session::get('event');
        $Agegroup=Session::get('Agegroup');
        $AgeGroupGender=Session::get('AgeGroupGender');
        if($AgeGroupGender->ageGroupEvent->Event->mainEvent->event_category_id==3){
            $teams=$AgeGroupGender->teams;
            return view('admin.events.finalTeamParticipants', compact('teams', 'Agegroup','event','AgeGroupGender'));

        }else{
            return view('admin.events.finalParticipants', compact('users', 'Agegroup','event','AgeGroupGender'));

        }

    }
    public function participantsExport($id, Request $request)
    {
        $orgId = Session::get('id');
        $AgeGroupGender = AgeGroupGender::where('id', $id)->first();
        $genderUsers=DB::table('age_group_gender_user')->where('age_group_gender_id',$AgeGroupGender->id)->get();
        $AgegroupEvent = AgeGroupEvent::where('id', $AgeGroupGender->age_group_event_id)->first();
        $Agegroup = AgeGroup::where('id', $AgegroupEvent->age_group_id)->first();
        $event = Event::where('id', $AgegroupEvent->event_id)->first();
        $setting = OrganizationSetting::where('organization_id', Auth::user()->organization_id !== null ? Auth::user()->organization_id : $orgId)->first();
        $header = $setting ? $setting->header : '';
        $registrations = $event->registrations;
        $pdf = app('dompdf.wrapper');
        $pdf->getDomPDF()->set_option("enable_php", true);
        $pdf = PDF::loadView('myPDF', compact('genderUsers','registrations', 'AgeGroupGender', 'Agegroup', 'event', 'header'));
        return $pdf->stream('participants.pdf');
    }
    //export all partciicpants
    public function participantAll(Request $request)
    {
        $id = Session::get('id');
        $setting = OrganizationSetting::where('organization_id', Auth::user()->organization_id !== null ? Auth::user()->organization_id : $id)->first();
        $header = $setting ? $setting->header : '';
        $cats = Session::get('futureEvents');
        $sortType=Session::get('sortType');
        $sortBy=Session::get('sortBy');
        $genders = AgeGroupGender::with('ageGroupEvent');
        if ($cats) {
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
    
    
                    if($values!=-1){
                        $genders = $genders->whereHas('gender', function ($q) use ($values) {
    
    
    
                            $q->where('id', $values);
                        });
                    }
                    
                } elseif ($key == "prize") {
    
    
                    if($values!=-1){
    
                        $genders = $genders->where('prize_given', $values);
                    }
                    
                } elseif ($key == "status") {
                    if($values!=0){
    
                    
                        $genders = $genders->where('status', $values);
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
                elseif ($key == "event") {
                    if($values!=0){
                        $genders = $genders->whereHas('ageGroupEvent', function ($q) use ($values) {
                            $q->whereHas('Event', function ($q) use ($values) {
    
                                $q->whereHas('mainEvent', function ($q) use ($values) {
    
    
                                    $q->where('id', $values);
                                });
                            });
                        });
    }            }
            }
        } else {
            $genders = AgeGroupGender::with('ageGroupEvent');
        }
        $genders = $genders->get();
        Session::put('genders', $genders);

        if($sortBy=='name'){
            if($sortType=='asc'){
    
                $genders=$genders->sortBy(function($query){
                            return $query->ageGroupEvent->Event->mainEvent->name;
                         })->all();
    
                        }else{
                            $genders=$genders->sortByDesc(function($query){
                                return $query->ageGroupEvent->Event->mainEvent->name;
                             })->all();
                        }
                        }
                        if($sortBy=='gender'){
                            if($sortType=='asc'){
                            $genders=$genders->sortBy(function($query){
                                        return $query->gender->id;
                                     })->all();
                                    }else{
                                        $genders=$genders->sortByDesc(function($query){
                                            return $query->gender->id;
                                         })->all();  
                                    }
                              
                                    }
                                    if($sortBy=='age_group'){
                                        if($sortType=='asc'){
                                        $genders=$genders->sortBy(function($query){
                                                    return $query->ageGroupEvent->ageGroup->id;
                                                 })->all();
                                                }else{
                                                    $genders=$genders->sortByDesc(function($query){
                                                        return $query->ageGroupEvent->ageGroup->id;
                                                     })->all(); 
                                                }                                         
                                    }
                                    if($sortBy=='time'){
                                        if($sortType=='asc'){
                                        $genders=$genders->sortBy(function($query){
                                                    return $query->time;
                                                 })->all();
                                                }else{
                                                    $genders=$genders->sortByDesc(function($query){
                                                        return $query->time;
                                                     })->all(); 
                                                }                                         
                                    }
        $html = '';
        foreach ($genders as $hours) {
            if ($hours->ageGroupEvent->Event->organization_id == Auth::user()->organization_id || $hours->ageGroupEvent->Event->organization_id == $id) {
                if($hours->status!=1){
                if($hours->ageGroupEvent->Event->league->to_date >=Carbon::now()->format('Y-m-d')){
                $AgeGroupGender = AgeGroupGender::where('id', $hours->id)->first();
                $AgegroupEvent = AgeGroupEvent::where('id', $AgeGroupGender->age_group_event_id)->first();
                $Agegroup = AgeGroup::where('id', $AgegroupEvent->age_group_id)->first();
                $event = Event::where('id', $AgegroupEvent->event_id)->first();
                $setting = OrganizationSetting::where('organization_id', Auth::user()->organization_id !== null ? Auth::user()->organization_id : $id)->first();
                $header = $setting ? $setting->header : '';
                $registrations = $event->registrations;
                $view = view('admin.events.export.export', compact('registrations', 'AgeGroupGender', 'Agegroup', 'event', 'header'));
                $html .= $view->render();
                }
            }
        }
        }
        $pdf = PDF::loadHTML($html);
        $sheet = $pdf->setPaper('a4', 'portrait');
        return $sheet->download('Event Participants.pdf');
    }
    //end
    public function sortListedParticipants($id)
    {
        $AgeGroupGender = AgeGroupGender::where('id', $id)->first();
        $sorlistedParticipants = $AgeGroupGender->users;
        return view('players.sorlistedParticipants', compact('sorlistedParticipants'));
    }
    public function leagueEvents(Request $request, $id)
    {
        $id = Session::get('id');

        $league = $request->input('league');
        if ($request->input('league') == "all") {
            $genders = AgeGroupGender::with('ageGroupEvent')->get();
        } else {


            $genders = AgeGroupGender::whereHas('ageGroupEvent', function ($q) use ($league) {
                $q->whereHas('Event', function ($q) use ($league) {

                    $q->whereHas('league', function ($q) use ($league) {

                        $q->where('id', 'LIKE', '%' . $league . '%');
                    });
                });
            })->get();
        }
        $judges = User::role('Judge')->where('organization_id', Auth::user()->organization_id)->get();
        $starters = User::role('Starter')->where('organization_id', Auth::user()->organization_id)->get();
        $agegroups = AgeGroup::where('organization_id', Auth::user()->organization_id)->get();
        $leagues = League::where('organization_id', Auth::user()->organization_id)->get();


        $view = view('admin.events.index3', compact('genders', 'judges', 'starters',  'agegroups', 'leagues', 'id'))->render();
        return response()->json(['html' => $view]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id = Session::get('id') ? Session::get('id') : '';
        $seasonIds = array();
        $seasons = Season::where('status', 1)->get();
        foreach ($seasons as $season) {
            $seasonIds[] = $season->id;
        }

        $genders = Gender::all();
        $eventCategories = EventCategory::all();
        $agegroups = AgeGroup::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->where('status', 1)->get();
        $eventorganizers = User::Role('4')->where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->where('is_approved', 1)->get();
        $season = Season::where('status', 1)->get();
        $leagues = League::whereIn('season_id', $seasonIds)->where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->where('to_date', '>=', Carbon::now()->format('Y-m-d'))->get();
        $today = Carbon::now();
        $events=Auth::user()->organization->mainEvents;
        return view('admin.events.create', compact('eventCategories', 'agegroups', 'eventorganizers', 'leagues', 'genders', 'id', 'today','events'));
    }
    public function getEvents(Request $request)
    {
        $id = Session::get('id') ? Session::get('id') : '';
        $league = League::find($request->input('league'));
        Session::put('leagues', $request->input('league'));
        $leagueName = $league->to_date;
        $leagueNameEnd = $league->from_date;
        $date = "(" . $leagueNameEnd . "-" . "   " . $leagueName . ")";
        if ($league->sports_category_id == 1) {
            $mainEvents = MainEvent::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->get();
        }
        return response()->json([
            'mainEvents' => $mainEvents,
            'leagueName' => $leagueName,
            'leagueNameEnd' => $leagueNameEnd,
            'date' => $date
        ]);
    }
    public function getEvent(Request $request)
    {
        $id = Session::get('leagues');
        $league = League::find($id);
        $venues = $league->venue->venueDetails;
        $event = MainEvent::find($request->input('event'));

        return response()->json([
            'event' => $event,
            'venues' => $venues
        ]);
    }
    public function getRule(Request $request, $id)
    {

        $event = Event::find($id);
        // dd($event);

        return response()->json([
            'event' => $event
        ]);
    }
    public function showleagueEvents(Request $request)
    {

        if ($request->input('league') == "all") {
            $events = Event::with(['user', 'ageGroups'])->where('organization_id', Auth::user()->organization->id)->get();
        } else {


            $league = League::where('organization_id', Auth::user()->organization->id)->find($request->input('league'));
            $events = Event::with(['user', 'ageGroups'])->where('organization_id', Auth::user()->organization->id)->where('league_id', $league->id)->get();
        }


        $view2 = view('admin.events.EventLists', compact('events'))->render();
        return response()->json(['html' => $view2]);
    }

    public function generatePDF()
    {
        $orgId = Session::get('id');
        $id = session("leagueid");
        $league = League::find($id);
        $AgeGroups = AgeGroup::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $orgId)->where('status', 1)->get();
        $genders = AgeGroupGender::groupBy('gender_id')->select('age_group_event_id')->get();
        $events = Event::with(['user', 'ageGroups'])->where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $orgId)->get();
        $judges = User::role('Judge')->where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $orgId)->get();
        $starters = User::role('Starter')->where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $orgId)->get();
        $leagues = League::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $orgId)->get();
        $pdf = app('dompdf.wrapper');
        $pdf->getDomPDF()->set_option("enable_php", true);
        $setting = OrganizationSetting::where('organization_id', Auth::user()->organization_id !== null ? Auth::user()->organization_id : $orgId)->first();
        $header = $setting ? $setting->header : '';
        $pdf = PDF::loadView('admin.events.pdf', compact('setting', 'header', 'events', 'judges', 'starters', 'events', 'AgeGroups', 'leagues', 'league'));
        return $pdf->stream('eventLists.pdf');
    }

    public function assign(Request $request)
    {
        // dd($request->all());
        $gender = $request->input('id');
        $genderDet = AgeGroupGender::find($gender);
        // $genderDet->time = $reque?st->input('time');
        $genderDet->judge_id = $request->input('judge');
        // $genderDet->starter_id = $request->input('starter');
        $genderDet->save();
        $url = '/events';
        return response()->json([
            'url' => $url
        ]);
    }

    public function assignStarter(Request $request)
    {
        // dd($request->input('starter'));
        // dd($request->all());
        $gender = $request->input('id');
        $genderDet = AgeGroupGender::find($gender);
        // dd($genderDet);
        $genderDet->starter_id = $request->input('starter');
        $genderDet->save();
        // dd($genderDet);
        $url = '/events';
        return response()->json([
            'url' => $url

        ]);
    }

    public function prizeGiven(Request $request)
    {
        $gender = $request->input('id');

        $genderDet = AgeGroupGender::find($gender);
        $genderDet->prize_given = $request->input('prize');
        $genderDet->save();
        $url = '/events';
        return response()->json([
            'url' => $url

        ]);
    }
    public function eventCancellation(Request $request)
    {
        Session::forget('futureCancelledEvents');
        Session::forget('sortTypeCancelEvent');
        Session::forget('sortByCancelEvent');
        Session::forget('length3');
        Session::forget('length2');
        Session::forget('length4');
        Session::forget('length5');
        

        $today = Carbon::now()->format('Y-m-d');

        $id = Session::get('id');
        $seasonIds = array();
        $seasons = Season::where('status', 1)->get();

        foreach ($seasons as $season) {
            $seasonIds[] = $season->id;
        }
        $genders = AgeGroupGender::with('ageGroupEvent')->get();
        Session::put('EventCancellation',$genders);
        $gender = Gender::all();
        $ageGroups = AgeGroup::where('organization_id', Auth::user()->organization_id !== null ? Auth::user()->organization_id : $id)->get();
        $mainEvents = MainEvent::where('organization_id', Auth::user()->organization_id !== null ? Auth::user()->organization_id : $id)->get();
        $leagues = League::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->whereIn('season_id', $seasonIds)->where('to_date', '>=', Carbon::now()->format('Y-m-d'))->get();
        $setting = OrganizationSetting::where('organization_id', Auth::user()->organization_id !== null ? Auth::user()->organization_id : $id)->first();
        $header = $setting ? $setting->header : '';
        return view('admin.events.eventCancel.eventCancellation', compact('header', 'setting', 'today', 'id', 'genders', 'gender', 'ageGroups', 'mainEvents', 'leagues'));
    }
    
    public function eventCancelSortBy(Request $request)
    {
        $id = Session::get('id');
       
        $genders=Session::get('EventCancellation');
        Session::put('sortTypeCancelEvent',$request->input('order_type'));
        Session::put('sortByCancelEvent',$request->input('column_name'));
        $today = Carbon::now()->format('Y-m-d');
        // dd($genders);
        if($request->input('column_name')=='name'){
        if($request->input('order_type')=='asc'){

            $genders=$genders->sortBy(function($query){
                        return $query->ageGroupEvent->Event->mainEvent->name;
                     })->all();
                    }else{
                        $genders=$genders->sortByDesc(function($query){
                            return $query->ageGroupEvent->Event->mainEvent->name;
                         })->all();
                    }
                    }
                    elseif($request->input('column_name')=='gender_id'){
                        if($request->input('order_type')=='asc'){
                            $genders=$genders->sortBy($request->input('column_name'));
                        }else{
                            $genders=$genders->sortByDesc($request->input('column_name'));
                        }
                      } 
                 
                      elseif($request->input('column_name')=='age_group_id'){
                        if($request->input('order_type')=='asc'){
                            $genders=$genders->sortBy(function($query){
                                return $query->ageGroupEvent->ageGroup->name;
                             })->all();
                        }else{
                            $genders=$genders->sortByDesc(function($query){
                                return $query->ageGroupEvent->ageGroup->name;
                             })->all();                        
                        }

                       } elseif($request->input('column_name')=='date'){
                        if($request->input('order_type')=='asc'){
                            $genders=$genders->sortBy(function($query){
                                return $query->ageGroupEvent->Event->date;
                             })->all();
                        }else{
                            $genders=$genders->sortByDesc(function($query){
                                return $query->ageGroupEvent->Event->date;
                             })->all();                       
                        }

                      }
                      elseif($request->input('column_name')=='league_id'){
                            if($request->input('order_type')=='asc'){
                                $genders=$genders->sortBy(function($query){
                                    return $query->ageGroupEvent->Event->league_id;
                                 })->all();
                            }else{
                                $genders=$genders->sortByDesc(function($query){
                                    return $query->ageGroupEvent->Event->league_id;
                                 })->all();                       
                            }
                      }              
                           
                                
                                $AgeGroups = AgeGroup::all();
        $judges = User::role('Judge')->where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->where('is_approved', 1)->get();
        $starters = User::role('Starter')->where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->where('is_approved', 1)->get();
        $agegroups = AgeGroup::all();
        $today = Carbon::now()->format('Y-m-d');
        $setting = OrganizationSetting::where('organization_id', Auth::user()->organization_id !== null ? Auth::user()->organization_id : $id)->first();
        $header = $setting ? $setting->header : '';
        $leagues = League::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->get();
                               
                                            
        $view = view('admin.events.eventCancel.filter', compact('genders', 'id', 'today'))->render();
        $view2 = view('admin.events.eventCancel.print', compact('header', 'setting', 'genders', 'judges', 'starters', 'agegroups', 'leagues', 'id', 'today'))->render();

        return response()->json([
            'html' => $view,

            'html2' => $view2
        ]);


    }
    public function eventCancelSearch(Request $request)
    {
        $id = Session::get('id');
        $sortTypeCancelEvent = Session::get('sortTypeCancelEvent');
        $sortByCancelEvent = Session::get('sortByCancelEvent');
        $seasons = Season::all();
        $genders = Gender::all();
        $setting = OrganizationSetting::where('organization_id', Auth::user()->organization_id !== null ? Auth::user()->organization_id : $id)->first();
        $header = $setting ? $setting->header : '';
       
        $genders = AgeGroupGender::with('ageGroupEvent');

        $cats = $request->input('obj');
        Session::put('futureCancelledEvents', $cats);
        if ($cats) {
        foreach ($cats as $key => $values) {
            // dd($cats);
            if ($key == "league") {
                if ($values!=0) {
                  
                    $genders = $genders->whereHas('ageGroupEvent', function ($q) use ($values) {
                        $q->whereHas('Event', function ($q) use ($values) {



                            $q->where('league_id', $values);
                        });
                    });
                }
            } elseif ($key == "gender") {


                if ($values!=0) {
                    
                    $genders = $genders->whereHas('gender', function ($q) use ($values) {



                        $q->where('id', $values);
                    });
                }
            } 
         elseif ($key == "age") {
            if ($values!=0) {
                    $genders = $genders->whereHas('ageGroupEvent', function ($q) use ($values) {
                        $q->whereHas('ageGroup', function ($q) use ($values) {



                            $q->where('id', $values);
                        });
                    });
                }
            } elseif ($key == "event") {
                if ($values!=0) {
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
        Session::put('EventCancellation',$genders);

        if($sortByCancelEvent=='name'){
            if($sortTypeCancelEvent=='asc'){
                $genders=$genders->sortBy(function($query){
                            return $query->ageGroupEvent->Event->mainEvent->name;
                         })->all();

                        }else{
                            $genders=$genders->sortByDesc(function($query){
                                return $query->ageGroupEvent->Event->mainEvent->name;
                             })->all();
                        }
                        }
                        elseif($sortByCancelEvent=='gender_id'){
                            if($sortTypeCancelEvent=='asc'){
                                $genders=$genders->sortBy($sortByCancelEvent);
                            }else{
                                $genders=$genders->sortByDesc($sortByCancelEvent);


                            }
                          } elseif($sortByCancelEvent=='age_group_id'){
                            if($sortTypeCancelEvent=='asc'){
                                $genders=$genders->sortBy(function($query){
                                    return $query->ageGroupEvent->ageGroup->name;
                                 })->all();
                            }else{
                                $genders=$genders->sortByDesc(function($query){
                                    return $query->ageGroupEvent->ageGroup->name;
                                 })->all();                        
                            }
    
                           } elseif($sortByCancelEvent=='date'){
                            if($sortTypeCancelEvent=='asc'){
                                $genders=$genders->sortBy(function($query){
                                    return $query->ageGroupEvent->Event->date;
                                 })->all();
                            }else{
                                $genders=$genders->sortByDesc(function($query){
                                    return $query->ageGroupEvent->Event->date;
                                 })->all();                       
                            }
    
                          }
                            elseif($sortByCancelEvent=='league_id'){
                                if($sortTypeCancelEvent=='asc'){
                                    $genders=$genders->sortBy(function($query){
                                        return $query->ageGroupEvent->Event->league_id;
                                     })->all();
                                }else{
                                    $genders=$genders->sortByDesc(function($query){
                                        return $query->ageGroupEvent->Event->league_id;
                                     })->all();                       
                                }
    
                          }
        $AgeGroups = AgeGroup::all();
        $judges = User::role('Judge')->where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->where('is_approved', 1)->get();
        $starters = User::role('Starter')->where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->where('is_approved', 1)->get();
        $agegroups = AgeGroup::all();
        $today = Carbon::now()->format('Y-m-d');
        $setting = OrganizationSetting::where('organization_id', Auth::user()->organization_id !== null ? Auth::user()->organization_id : $id)->first();
        $header = $setting ? $setting->header : '';
        $leagues = League::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->get();

        $view = view('admin.events.eventCancel.filter', compact('genders', 'id', 'today'))->render();
        $view2 = view('admin.events.eventCancel.print', compact('header', 'setting', 'genders', 'judges', 'starters', 'agegroups', 'leagues', 'id', 'today'))->render();

        return response()->json([
            'html' => $view,

            'html2' => $view2
        ]);
    }
    
    public function eventCancelPdfGenerate(Request $request)
    {
        $id = Session::get('id');
        $setting = OrganizationSetting::where('organization_id', Auth::user()->organization_id !== null ? Auth::user()->organization_id : $id)->first();
        $header = $setting ? $setting->header : '';
        $cats = Session::get('futureCancelledEvents');
        $sortByCancelEvent = Session::get('sortByCancelEvent');
        $sortTypeCancelEvent = Session::get('sortTypeCancelEvent');
      
        $genders = AgeGroupGender::with('ageGroupEvent');


        if ($cats) {
            foreach ($cats as $key => $values) {
                // dd($cats);
                if ($key == "league") {
                    if ($values!=0) {
                      
                        $genders = $genders->whereHas('ageGroupEvent', function ($q) use ($values) {
                            $q->whereHas('Event', function ($q) use ($values) {
    
    
    
                                $q->where('league_id', $values);
                            });
                        });
                    }
                } elseif ($key == "gender") {
    
    
                    if ($values!=0) {
                        
                        $genders = $genders->whereHas('gender', function ($q) use ($values) {
    
    
    
                            $q->where('id', $values);
                        });
                    }
                } 
             elseif ($key == "age") {
                if ($values!=0) {
                        $genders = $genders->whereHas('ageGroupEvent', function ($q) use ($values) {
                            $q->whereHas('ageGroup', function ($q) use ($values) {
    
    
    
                                $q->where('id', $values);
                            });
                        });
                    }
                } elseif ($key == "event") {
                    if ($values!=0) {
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
           
        } else {
            $genders = AgeGroupGender::with('ageGroupEvent');
        }

        $genders = $genders->get();
        Session::put('EventCancellation',$genders);

        if($sortByCancelEvent=='name'){
            if($sortTypeCancelEvent=='asc'){
                $genders=$genders->sortBy(function($query){
                            return $query->ageGroupEvent->Event->mainEvent->name;
                         })->all();
                        }else{
                            $genders=$genders->sortByDesc(function($query){
                                return $query->ageGroupEvent->Event->mainEvent->name;
                             })->all();
                        }
                        }
                        elseif($sortByCancelEvent=='gender_id'){
                            if($sortTypeCancelEvent=='asc'){
                                $genders=$genders->sortBy($sortByCancelEvent);
                            }else{
                                $genders=$genders->sortByDesc($sortByCancelEvent);
                            }
                          } elseif($sortByCancelEvent=='age_group_id'){
                            if($sortTypeCancelEvent=='asc'){
                                $genders=$genders->sortBy(function($query){
                                    return $query->ageGroupEvent->ageGroup->name;
                                 })->all();
                            }else{
                                $genders=$genders->sortByDesc(function($query){
                                    return $query->ageGroupEvent->ageGroup->name;
                                 })->all();                        
                            }
    
                           } elseif($sortByCancelEvent=='date'){
                            if($sortTypeCancelEvent=='asc'){
                                $genders=$genders->sortBy(function($query){
                                    return $query->ageGroupEvent->Event->date;
                                 })->all();
                            }else{
                                $genders=$genders->sortByDesc(function($query){
                                    return $query->ageGroupEvent->Event->date;
                                 })->all();                       
                            }
    
                          }
                            elseif($sortByCancelEvent=='league_id'){
                                if($sortTypeCancelEvent=='asc'){
                                    $genders=$genders->sortBy(function($query){
                                        return $query->ageGroupEvent->Event->league_id;
                                     })->all();
                                }else{
                                    $genders=$genders->sortByDesc(function($query){
                                        return $query->ageGroupEvent->Event->league_id;
                                     })->all();                       
                                }
    
                          }

        $today = Carbon::now()->format('Y-m-d');

        $AgeGroups = AgeGroup::all();
        $judges = User::role('Judge')->where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->where('is_approved', 1)->get();
        $starters = User::role('Starter')->where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->where('is_approved', 1)->get();
        $agegroups = AgeGroup::all();
        $agegroups = AgeGroup::all();
        $leagues = League::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->get();
        $pdf = app('dompdf.wrapper');
        $pdf->getDomPDF()->set_option("enable_php", true);
        $pdf = PDF::loadView('admin.events.eventCancel.pdf', compact('today', 'genders', 'judges', 'starters', 'agegroups', 'leagues', 'id', 'header', 'setting'))->setPaper('a4', 'landscape');
        return $pdf->stream('Events.pdf');
    }
    public function eventCancelExcel(Request $request)
    {

        $sortByCancelEvent = Session::get('sortByCancelEvent');
        $sortTypeCancelEvent = Session::get('sortTypeCancelEvent');
        $cats = Session::get('futureCancelledEvents');
       

        $id = Session::get('id');

        return Excel::download(new CancelledEventsExport($cats, $id,$sortByCancelEvent,$sortTypeCancelEvent), 'Events_status.xlsx');
    }
    public function eventCancel(Request $request)
    {
        $ids=$request->input('id');
            AgeGroupGender::whereIn('id',explode(",",$ids))->update(['status'=>10]);
           $genderDetails=AgeGroupGender::whereIn('id',explode(",",$ids))->get();

        foreach($genderDetails as $genderDet){
        $AgegroupEvent = AgeGroupEvent::where('id', $genderDet->age_group_event_id)->first();
        $Agegroup = AgeGroup::where('id', $AgegroupEvent->age_group_id)->first();
        $event = Event::where('id', $AgegroupEvent->event_id)->first();
        $users = array();
        $clubs=array();
        if($event->mainEvent->event_category_id==3){
            foreach ($event->groupRegistrations as $registration) {
                if ($genderDet->id == $registration->age_group_gender_id) {
                    $clubs[]=$registration->club_id;
                }

            }
            $notifiedData = [
                'name' => $event->mainEvent->name,
                'league' => $event->league->name,
                'org' => $event->organization->name,
                'ageGroup' => $genderDet->ageGroupEvent->ageGroup->name,
                'gender' => $genderDet->gender->id == 1 ? 'Male' : 'Female',
                'body' => 'The above event has been cancelled',
                'thanks' => 'Thank you',
            ];
            foreach ($clubs as $club) {
                $user=User::Role('ClubAdmin')->where('club_id',$club)->first();
                
                Notification::send(User::find($user->id), new CancelledEventNotification($notifiedData));
            }
            // Notification::send(User::find($genderDet->starter->id), new CancelledEventNotification($notifiedData));
            // Notification::send(User::find($genderDet->judge->id), new CancelledEventNotification($notifiedData));

        }else{
        foreach ($event->registrations as $registration) {
            if ($genderDet->gender_id == $registration->gender) {
                $mine = Carbon::createFromFormat('Y-m-d', $registration->user->dob)->format('Y');
                $league1 = Carbon::createFromFormat('Y-m-d', $event->league->to_date)->format('Y');
                $age = $league1 - $mine;

                $exp = preg_split("/-/", $Agegroup->name);
                if (isset($exp[1])) {

                    if (($exp[0] == $age || $exp[0] < $age) && ($exp[1] == $age || $exp[1] > $age)) {
                        $users[] = $registration->user;
                    }
                } elseif ($exp[0] == $age) {
                    $users[] = $registration->user;
                }
            }
        }

        $notifiedData = [
            'name' => $event->mainEvent->name,
            'league' => $event->league->name,
            'org' => $event->organization->name,
            'ageGroup' => $genderDet->ageGroupEvent->ageGroup->name,
            'gender' => $genderDet->gender->id == 1 ? 'Male' : 'Female',
            'body' => 'The above event has been cancelled',
            'thanks' => 'Thank you',
        ];

        foreach ($users as $user) {
            if($user->email==null){
                Notification::send(User::find($user->parent_id), new CancelledEventNotification($notifiedData));
            }else{
                Notification::send(User::find($user->id), new CancelledEventNotification($notifiedData));
            }
        }
        $genderDet->starter?Notification::send(User::find($genderDet->starter->id), new CancelledEventNotification($notifiedData)):'';
        $genderDet->judge? Notification::send(User::find($genderDet->judge->id), new CancelledEventNotification($notifiedData)):'';
    }
}

        $message = "success";
        $url = '/events';
        return response()->json([
            'url' => $url,
            'message' => $message,

        ]);
    }

    public function eventCancelStarter(Request $request, $id)
    {
        $genderDet = AgeGroupGender::find($id);
        $genderDet->status = 10;
        $genderDet->save();
        $AgegroupEvent = AgeGroupEvent::where('id', $genderDet->age_group_event_id)->first();
        $Agegroup = AgeGroup::where('id', $AgegroupEvent->age_group_id)->first();
        $event = Event::where('id', $AgegroupEvent->event_id)->first();
        $clubs=array();
        if($event->mainEvent->event_category_id==3){
            foreach ($event->groupRegistrations as $registration) {
                if ($genderDet->id == $registration->age_group_gender_id) {
                    $clubs[]=$registration->club_id;
                }

            }
            $notifiedData = [
                'name' => $event->mainEvent->name,
                'league' => $event->league->name,
                'org' => $event->organization->name,
                'ageGroup' => $genderDet->ageGroupEvent->ageGroup->name,
                'gender' => $genderDet->gender->id == 1 ? 'Male' : 'Female',
                'body' => 'The above event has been cancelled',
                'thanks' => 'Thank you',
            ];
            foreach ($clubs as $club) {
                $user=User::Role('ClubAdmin')->where('club_id',$club)->first();
                
                Notification::send(User::find($user->id), new CancelledEventNotification($notifiedData));
            }
            Notification::send(User::find($genderDet->judge->id), new CancelledEventNotification($notifiedData));

        }
        else{
        $notifiedData = [
            'name' => $event->mainEvent->name,
            'league' => $event->league->name,
            'org' => $event->organization->name,
            'ageGroup' => $genderDet->ageGroupEvent->ageGroup->name,
            'gender' => $genderDet->gender->id == 1 ? 'Male' : 'Female',
            'body' => 'The above event has been cancelled',
            'thanks' => 'Thank you',
        ];

        Notification::send(User::find($genderDet->judge->id), new CancelledEventNotification($notifiedData));
    }
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
        $event=$genderDet->ageGroupEvent->event->mainEvent->name;
       $eventId=$genderDet->ageGroupEvent->event->id;
       $league=$genderDet->ageGroupEvent->event->league->name;
       $organizer=$genderDet->ageGroupEvent->event->user->first_name;
$gender=$genderDet->gender->name;
$ageGroup=$genderDet->ageGroupEvent->ageGroup->name;
$time=$genderDet->time;
$date=$genderDet->ageGroupEvent->event->date;
        $data = ['status' =>$genderDet->status,"id"=>$genderDet->id,"eventId"=>$eventId,"ageGender"=>$genderDet,'event'=>$event,'league'=>$league,'organizer'=>$organizer,'ageGroup'=>$ageGroup,'gender'=>$gender,'time'=>$time,'date'=>$date];
        $pusher->trigger('my-channel', 'my-event', $data);
        $url = '/events';
        return response()->json([
            'url' => $url

        ]);
    }

    public function viewEventNotification(Request $request, $id)
    {
        $notification = auth()->user()->notifications()->findorfail($id);
        $notification->markAsRead();
        return view('admin.message.eventCancelleation', compact('notification'));
    }

    public function assignTime(Request $request)
    {
        $gender = $request->input('id');
        $genderDet = AgeGroupGender::find($gender);
        $genderDet->time = $request->input('time');
        $genderDet->save();
        $url = '/events';
        return response()->json([
            'url' => $url

        ]);
    }
    public function store(Request $request)
    {

        $validator = Validator::make(
            $request->all(),
            [
                'event'                       => 'required',
                'organizer'                       => 'required',
                'date'              => 'required|date',
                'ages' => 'required',
                'genders'                  => 'required',
                'league'=>'required'
            ],
            [
                'event.required'           => 'Selet The Event',
                'organizer.required'    => 'Event Organizer is Required',
                'date.required'       => 'Event Date is Required',
                'ages.required'  => 'Select the AgeGroup',
                'genders.required'  => 'Select the Gender',
                'legaue.required'=>'Select the League'




            ]

        );
        if ($validator->fails()) {
            return redirect('/event/create')->withErrors($validator)->withInput();
        }
        $id = Session::get('id');
        $mainEvent=MainEvent::find($request->event);
        $league = League::find($request->league);
        $track = $request->input('track') ? VenueDetail::where('id', $request->input('track'))->first()->track_event_count : '';
        $event = new Event;
        $event->main_event_id = $request->event;
        $event->league_id = $request->league;
        $event->user_id = $request->organizer;
        $event->organization_id = Auth::user()->organization_id ? Auth::user()->organization_id : $id;
        $event->season_id = $league->season_id;
        $event->rules = $request->rules;
        $event->date = $request->date;
        $event->participants_count = $request->particpants ? $request->particpants : '';
        $event->tracks = $track ? $track : '';
        $event->discount=$mainEvent->discount;
        $event->save();
        foreach ($request->ages as $age) {
            $event->ageGroups()->attach($age);
            $ageGroup  = AgeGroupEvent::where('age_group_id', $age)->where('event_id', $event->id)->first();
            foreach ($request->genders as $gender) {
                $AgeGroupGender = new AgeGroupGender();
                $AgeGroupGender->gender_id = $gender;
                $ageGroup->ageGroupGenders()->save($AgeGroupGender);
            }
        }

        return redirect('/event/create')->with('success','Event Created Successfully');
    }

    public function data()
    {
        $seasonIds = array();
        $seasons = Season::where('status', 1)->get();
        foreach ($seasons as $season) {
            $seasonIds[] = $season->id;
        }
        $season = Season::where('status', 1)->first();
        $events = Event::with(['user', 'genders', 'ageGroups', 'users'])->whereIn('season_id', $seasonIds)->get();
        return DataTables::of($events)
            ->editColumn('created_at', function (Event $event) {
                return $event->created_at->diffForHumans();
            })
            ->addColumn('jusges', function ($event) {
                foreach ($event->users as $user) {
                    return $user->id;
                }
            })
            ->rawColumns(['jusges'])
            ->addColumn('EventOrganizer', function ($event) {
                return implode(', ', $event->genders->pluck('name')->toArray());
            })
            ->rawColumns(['EventOrganizer'])

            ->addColumn('actions', function ($event) {
                $id = $event->id;
                $actions = '<a href="#" data-id="' . $id . '" class="btn btn-danger delete" data-toggle="modal"  data-target="#deleteModal"><i class="material-icons" style="margin-bottom:5px">delete</i></a>
                <a href="#" data-id="' . $id . '" class="btn btn-info add" data-toggle="modal"  data-target="#addModal"><i class="material-icons" style="margin-bottom:5px">edit</i></a>';
                return $actions;
            })
            ->rawColumns(['actions'])
            ->make(true);
    }
    public function search(Request $request)
    {
        $sortType=Session::get('sortType');
        $sortBy=Session::get('sortBy');
        $id = Session::get('id');
        $seasons = Season::all();
        $genders = Gender::all();
        $setting = OrganizationSetting::where('organization_id', Auth::user()->organization_id !== null ? Auth::user()->organization_id : $id)->first();
        $header = $setting ? $setting->header : '';
        $genders = AgeGroupGender::with('ageGroupEvent');
        $cats = $request->input('obj');
        Session::put('futureEvents', $cats);
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


                if($values!=-1){
                    $genders = $genders->whereHas('gender', function ($q) use ($values) {



                        $q->where('id', $values);
                    });
                }
                
            } elseif ($key == "prize") {


                if($values!=-1){

                    $genders = $genders->where('prize_given', $values);
                }
                
            } elseif ($key == "status") {
                if($values!=0){

                
                    $genders = $genders->where('status', $values);
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
            elseif ($key == "event") {
                if($values!=0){
                    $genders = $genders->whereHas('ageGroupEvent', function ($q) use ($values) {
                        $q->whereHas('Event', function ($q) use ($values) {

                            $q->whereHas('mainEvent', function ($q) use ($values) {


                                $q->where('id', $values);
                            });
                        });
                    });
}            }
        }

        $genders = $genders->get();
     Session::put('gendersSortBy',$genders);
     if($sortBy=='name'){
        if($sortType=='asc'){

            $genders=$genders->sortBy(function($query){
                        return $query->ageGroupEvent->Event->mainEvent->name;
                     })->all();

                    }else{
                        $genders=$genders->sortByDesc(function($query){
                            return $query->ageGroupEvent->Event->mainEvent->name;
                         })->all();
                    }
                    }
                    if($sortBy=='gender'){
                        if($sortType=='asc'){
                        $genders=$genders->sortBy(function($query){
                                    return $query->gender->name;
                                 })->all();
                                }else{
                                    $genders=$genders->sortByDesc(function($query){
                                        return $query->gender->name;
                                     })->all();  
                                }
                          
                                }
                                if($sortBy=='age_group'){
                                    if($sortType=='asc'){
                                    $genders=$genders->sortBy(function($query){
                                                return $query->ageGroupEvent->ageGroup->id;
                                             })->all();
                                            }else{
                                                $genders=$genders->sortByDesc(function($query){
                                                    return $query->ageGroupEvent->ageGroup->id;
                                                 })->all(); 
                                            }
                                      
                                            }
                                            if($sortBy=='time'){
                                                if($sortType=='asc'){
                                                $genders=$genders->sortBy(function($query){
                                                            return $query->time;
                                                         })->all();
                                                        }else{
                                                            $genders=$genders->sortByDesc(function($query){
                                                                return $query->time;
                                                             })->all(); 
                                                        }
                                                  
                                                        }
       
        
        $AgeGroups = AgeGroup::all();
        $judges = User::role('Judge')->where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->where('is_approved', 1)->get();
        $starters = User::role('Starter')->where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->where('is_approved', 1)->get();
        $agegroups = AgeGroup::all();
        $today = Carbon::now()->format('Y-m-d');
        $setting = OrganizationSetting::where('organization_id', Auth::user()->organization_id !== null ? Auth::user()->organization_id : $id)->first();
        $header = $setting ? $setting->header : '';
        $leagues = League::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->get();
        if (Auth::user()->hasRole(4)) {
            $view = view('admin.events.eventOrganizer', compact('genders', 'judges', 'starters', 'agegroups', 'leagues', 'id', 'today'))->render();
            $view2 = view('admin.events.eventOrganizerPrint', compact('header', 'setting', 'genders', 'judges', 'starters', 'agegroups', 'leagues', 'id', 'today'))->render();

            return response()->json([
                'html' => $view,
                'html2' => $view2
            ]);
        } else {
            $view = view('admin.events.index3', compact('genders', 'judges', 'starters', 'agegroups', 'leagues', 'id', 'today'))->render();
            $view2 = view('admin.events.printAllEvents', compact('header', 'setting', 'genders', 'judges', 'starters', 'agegroups', 'leagues', 'id', 'today'))->render();
            $view3 = view('admin.events.eventOrgEventExcel', compact('header', 'setting', 'genders', 'judges', 'starters', 'agegroups', 'leagues', 'id', 'today'))->render();

            return response()->json([
                'html' => $view,

                'html2' => $view2,
                'html3' => $view3
            ]);
        }
    }
    public function sortByEvent(Request $request){
$genders=Session::get('gendersSortBy');
$id=Session::get('id');
Session::put('sortType',$request->input('order_type'));
Session::put('sortBy',$request->input('column_name'));

        if($request->input('column_name')=='name'){
        if($request->input('order_type')=='asc'){

            $genders=$genders->sortBy(function($query){
                        return $query->ageGroupEvent->Event->mainEvent->name;
                     })->all();
                    }else{
                        $genders=$genders->sortByDesc(function($query){
                            return $query->ageGroupEvent->Event->mainEvent->name;
                         })->all();
                    }
                    }
                    elseif($request->input('column_name')=='gender'){
                        if($request->input('order_type')=='asc'){
                        $genders=$genders->sortBy(function($query){
                                    return $query->gender->name;
                                 })->all();
                                }else{
                                    $genders=$genders->sortByDesc(function($query){
                                        return $query->gender->name;
                                     })->all();
                                }
                                }
                                elseif($request->input('column_name')=='age_group'){
                                    if($request->input('order_type')=='asc'){
                                    $genders=$genders->sortBy(function($query){
                                                return $query->ageGroupEvent->ageGroup->id;
                                             })->all();
                                            }else{
                                                $genders=$genders->sortByDesc(function($query){
                                                    return $query->ageGroupEvent->ageGroup->id;
                                                 })->all();
                                            }
                                            }
                                            elseif($request->input('column_name')=='time'){
                                                if($request->input('order_type')=='asc'){
                                                $genders=$genders->sortBy(function($query){
                                                            return $query->time;
                                                         })->all();
                                                        }else{
                                                            $genders=$genders->sortByDesc(function($query){
                                                                return $query->time;
                                                             })->all();
                                                        }
                                                        }
        $AgeGroups = AgeGroup::all();
        $judges = User::role('Judge')->where('organization_id',Auth::user()->organization_id )->where('is_approved', 1)->get();
        $starters = User::role('Starter')->where('organization_id', Auth::user()->organization_id )->where('is_approved', 1)->get();
        $agegroups = AgeGroup::all();
        $today = Carbon::now()->format('Y-m-d');
        $setting = OrganizationSetting::where('organization_id', Auth::user()->organization_id)->first();
        $header = $setting ? $setting->header : '';
        $leagues = League::where('organization_id', Auth::user()->organization_id )->get();
        if (Auth::user()->hasRole(4)) {
            $view = view('admin.events.eventOrganizer', compact('genders', 'judges', 'starters', 'agegroups', 'leagues', 'id', 'today'))->render();
            $view2 = view('admin.events.eventOrganizerPrint', compact('header', 'setting', 'genders', 'judges', 'starters', 'agegroups', 'leagues', 'id', 'today'))->render();

            return response()->json([
                'html' => $view,
                'html2' => $view2
            ]);
        } else {
        $view = view('admin.events.index3', compact('genders', 'judges', 'starters', 'agegroups', 'leagues', 'today'))->render();
            $view2 = view('admin.events.printAllEvents', compact('header', 'setting', 'genders', 'judges', 'starters', 'agegroups', 'leagues',  'today'))->render();
            $view3 = view('admin.events.eventOrgEventExcel', compact('header', 'setting', 'genders', 'judges', 'starters', 'agegroups', 'leagues',  'today'))->render();

            return response()->json([
                'html' => $view,

                'html2' => $view2,
                'html3' => $view3
            ]);
        }
     }

    
    public function PDFGenerate(Request $request)
    {
        $id = Session::get('id');
        $setting = OrganizationSetting::where('organization_id', Auth::user()->organization_id !== null ? Auth::user()->organization_id : $id)->first();
        $header = $setting ? $setting->header : '';
        $cats = Session::get('futureEvents');
       
        $sortType=Session::get('sortType');
        $sortBy=Session::get('sortBy');
        // dd($sortBy);
        $LeagueTitle = null;
        $eventTitle = null;
        $AgeTitle = null;
        $GenTitle = null;
        if ($cats) {

            foreach ($cats as $key => $values) {
                if ($key == "league") {
                    if ($values == "0") {
                        $LeagueTitle = null;
                     } else {
                   
                        $LeagueTitle=League::where('id',$values->pluck('name'));
                    }
                } elseif ($key == "gender") {


                    if ($values== "-1") {
                      
                        $GenTitle = null;
                    } else {
                       
                        $GenTitle = Gender::where('id', $values)->pluck('name');
                    }
                }elseif ($key == "age") {
                    if ($values== "0") {
                     
                        $AgeTitle = null;
                    } else {
                     
                        $AgeTitle = AgeGroup::where('id', $values)->pluck('name');
                    }
                } elseif ($key == "event") {
                    if ($values== "0") {
                        $eventTitle = null;
                     } else {
                       
                        $eventTitle = MainEvent::where('id', $values)->pluck('name');
                    }
                }
            }
        } else {
            $LeagueTitle = null;
            $eventTitle = null;
            $AgeTitle = null;
            $GenTitle = null;
        }

        $genders=Session::get('gendersSortBy');
        if($sortBy=='name'){
        if($sortType=='asc'){

            $genders=$genders->sortBy(function($query){
                        return $query->ageGroupEvent->Event->mainEvent->name;
                     })->all();

                    }else{
                        $genders=$genders->sortByDesc(function($query){
                            return $query->ageGroupEvent->Event->mainEvent->name;
                         })->all();
                    }
                    }
                    if($sortBy=='gender'){
                        if($sortType=='asc'){
                        $genders=$genders->sortBy(function($query){
                                    return $query->gender->id;
                                 })->all();
                                }else{
                                    $genders=$genders->sortByDesc(function($query){
                                        return $query->gender->id;
                                     })->all();  
                                }
                          
                                }
                                if($sortBy=='age_group'){
                                    if($sortType=='asc'){
                                    $genders=$genders->sortBy(function($query){
                                                return $query->ageGroupEvent->ageGroup->id;
                                             })->all();
                                            }else{
                                                $genders=$genders->sortByDesc(function($query){
                                                    return $query->ageGroupEvent->ageGroup->id;
                                                 })->all(); 
                                            }
                                      
                                            }
                                            if($sortBy=='time'){
                                                if($sortType=='asc'){
                                                $genders=$genders->sortBy(function($query){
                                                            return $query->time;
                                                         })->all();
                                                        }else{
                                                            $genders=$genders->sortByDesc(function($query){
                                                                return $query->time;
                                                             })->all(); 
                                                        }
                                                  
                                                        }
        $AgeGroups = AgeGroup::all();
        $judges = User::role('Judge')->where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->where('is_approved', 1)->get();
        $starters = User::role('Starter')->where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->where('is_approved', 1)->get();
        $agegroups = AgeGroup::all();
        $agegroups = AgeGroup::all();
        $leagues = League::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->get();
        if (Auth::user()->hasRole(4)) {
            $pdf = app('dompdf.wrapper');
            $pdf->getDomPDF()->set_option("enable_php", true);
            $pdf = PDF::loadView('admin.events.eventOrganizerPdf', compact('genders', 'eventTitle', 'AgeTitle','LeagueTitle', 'GenTitle', 'judges', 'starters', 'agegroups', 'leagues', 'id', 'header', 'setting'))->setPaper('a4', 'landscape');
            return $pdf->stream('Events.pdf');
        } else {
            // dd($genders);
            $pdf = app('dompdf.wrapper');
            $pdf->getDomPDF()->set_option("enable_php", true);
            $pdf = PDF::loadView('admin.events.AllEventsPdf', compact('genders', 'eventTitle', 'AgeTitle','LeagueTitle', 'GenTitle', 'judges', 'judges', 'starters', 'agegroups', 'leagues', 'id', 'header', 'setting'))->setPaper('a4', 'landscape');
            return $pdf->stream('Events.pdf');
        }
    }
    public function AllEventExcel(Request $request)
    {

        if (Auth::user()->hasRole(4)) {
            $sortType=Session::get('sortType');
            $sortBy=Session::get('sortBy');
            $id = Session::get('id');
            $genders=Session::get('gendersSortBy');


            return Excel::download(new EventOrgAllEventsExport($sortType,$sortBy,$id,$genders), 'All Events.xlsx');
        } else {
            $sortType=Session::get('sortType');
            $sortBy=Session::get('sortBy');
            $genders=Session::get('gendersSortBy');
            $id = Session::get('id');

            return Excel::download(new AllEventsExport($sortType,$sortBy,$id,$genders), 'All Events.xlsx');
        }
    }

    public function changeOwnership(Request $request, $id)
    {
        $event = Event::find($id);
        $event->users()->attach($request->input('arr'));
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
    public function ageGenders($id)
    {
        $AgeGroup = AgeGroupGender::with(['starter', 'judge'])->find($id);
        return response()->json([
            'status' => 200,
            'AgeGroup' => $AgeGroup
        ]);
    }

    public function events(Request $request)
    {
        
       
        if (Auth::user()->hasRole(7)) {
        Session::forget('cats');
            $id = Session::get('id');
            $seasons = Season::all();
            $genders = Gender::all();
            $ageGroups = AgeGroup::where('organization_id', Auth::user()->organization_id !== null ? Auth::user()->organization_id : $id)->get();
            $leagues = League::where('organization_id', Auth::user()->organization_id !== null ? Auth::user()->organization_id : $id)->get();
            $mainEvents = MainEvent::where('organization_id', Auth::user()->organization_id !== null ? Auth::user()->organization_id : $id)->get();
            $setting = OrganizationSetting::where('organization_id', Auth::user()->organization_id !== null ? Auth::user()->organization_id : $id)->first();
            $header = $setting ? $setting->header : '';
            $general = generalSetting::first();
            $adminheader = $general ? $general->header : '';
            $child_id=array();
            if(Auth::user()->children){
                $user_ids=Auth::user()->children;
                foreach($user_ids as $user_id){
                    $child_id[]=$user_id->id;
                } 
                    //   array_push($child_id,Auth::user()->id);
        
            }else{
                    $child_id[]=null;
            }
         
        
              array_push($child_id,Auth::user()->id);
            $mainEvents = MainEvent::where('organization_id', Auth::user()->organization_id !== null ? Auth::user()->organization_id : $id)->get();
            // $events = Event::with(['user', 'ageGroups'])->get();
            $Leagues = League::where('organization_id', Auth::user()->organization_id !== null ? Auth::user()->organization_id : $id)->wherehas('registrations',function($q) use($child_id){
                $q->whereIn('user_id',$child_id);
            })->get();
            $registrations = AgeGroupGender::where('status', 1)->get();
            $filter = null;


            return view('admin.events.eventsPlayer', compact('registrations', 'Leagues', 'mainEvents','adminheader','general','filter', 'genders', 'ageGroups', 'seasons', 'setting', 'header', 'leagues', 'ageGroups', 'mainEvents'));
        }

        Session::forget('cats');
        $id = Session::get('id');
        $seasons = Season::all();
        $genders = Gender::all();
        $ageGroups = AgeGroup::where('organization_id', Auth::user()->organization_id !== null ? Auth::user()->organization_id : $id)->get();
        $leagues = League::where('organization_id', Auth::user()->organization_id !== null ? Auth::user()->organization_id : $id)->get();
        $mainEvents = MainEvent::where('organization_id', Auth::user()->organization_id !== null ? Auth::user()->organization_id : $id)->get();
        $setting = OrganizationSetting::where('organization_id', Auth::user()->organization_id !== null ? Auth::user()->organization_id : $id)->first();
        $header = $setting ? $setting->header : '';
        $reg = Registration::where('user_id', Auth::user()->id)->get();
        $events = Event::where('organization_id', Auth::user()->organization_id !== null ? Auth::user()->organization_id : $id)->with(['user', 'ageGroups'])->get();
        $registrations = AgeGroupGender::where('status', 1)->get();
        $filter = null;


        return view('admin.events.events', compact('registrations', 'events', 'reg', 'filter', 'genders', 'ageGroups', 'seasons', 'setting', 'header', 'leagues', 'ageGroups', 'mainEvents'));
    }
    function filter(Request $request)
    {
        if (Auth::user()->hasRole(7)) {
            $filter=null;
            $id = Session::get('id');
            $general = generalSetting::first();
            $adminheader = $general ? $general->header : '';
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
            $Leagues = League::where('organization_id', Auth::user()->organization_id !== null ? Auth::user()->organization_id : $id)->wherehas('registrations',function($q) use($child_id){
                $q->whereIn('user_id',$child_id);
            });
            $categories = $request->input('obj');
            Session::put('cats', $categories);

            if ($categories) {

                foreach ($categories as $key => $values) {
                    if ($key == "season") {
                        if($values!=0){
                            $Leagues = $Leagues->where('season_id', $values);
                        }
                    } elseif ($key == "league") {
                        if($values!=0){
                            $Leagues =  $Leagues->where('id', $values);
                        }
                    }
                   
                    elseif ($key == "event") {
                        if($values!=0){
                            $mainEvent= MainEvent::find($values);
                            $filter=$mainEvent->id;
                        }else{
                            $filter=null;
                        }
                    }
                }
            } else {
                $Leagues = League::where('organization_id', Auth::user()->organization_id !== null ? Auth::user()->organization_id : $id)->wherehas('registrations',function($q) use($child_id){
                    $q->whereIn('user_id',$child_id);
                });
            }
      
            $Leagues = $Leagues->get();
            $regs2=array();
            foreach($Leagues as $league){
                foreach($league->registrations as $reg){
                   foreach($reg->events as $evnt){
                    if($evnt->main_event_id==$filter){
                        $regs2[]=$reg->user_id;
                    }
                   }
                }
                
            }
            $children=array();
foreach($regs2 as $reg1){
    if(in_array($reg1,$child_id)){
        $children[]=$reg1;

    }

}
            $setting = OrganizationSetting::where('organization_id', Auth::user()->organization_id !== null ? Auth::user()->organization_id : $id)->first();
            $header = $setting ? $setting->header : '';
            $view = view('admin.events.eventsPlayerfilter', compact('children','Leagues','filter'))->render();
            $view2 = view('admin.events.eventsPlayerPreview', compact('children','Leagues','filter', 'setting','general','adminheader'))->render();

            return response()->json([
                'html' => $view,
            ]);
        }
        $id = Session::get('id');

        $seasons = Season::all();
        $genders = Gender::all();
        $setting = OrganizationSetting::where('organization_id', Auth::user()->organization_id !== null ? Auth::user()->organization_id : $id)->first();
        $header = $setting ? $setting->header : '';
        $events = Event::with(['user', 'ageGroups'])->where('organization_id', Auth::user()->organization_id ? Auth::user()->organization->id : $id);
        $categories = $request->input('obj');
        Session::put('cats', $categories);
        if ($categories) {
            foreach ($categories as $key => $values) {
                if ($key == "season") {
                    if($values!=0){
                        $events = $events->where('season_id', $values);
                    }
                } elseif ($key == "league") {
                        if($values!=0){
                            $events =  $events->where('league_id', $values);
                        }
                } elseif ($key == "age") {
                    if($values!=0){
                        $events = $events->whereHas('ageGroups', function ($q) use ($values) {
                            $q->where('age_groups.id', $values);
                        });                    
                    }
                } elseif ($key == "event") {
                    if($values!=0){
                        $events = $events->whereHas('mainEvent', function ($q) use ($values) {
                            $q->where('id', $values);
                        });                    
                    }
                }
            }
        } else {
            $events = Event::with(['user', 'ageGroups'])->where('organization_id', Auth::user()->organization_id ? Auth::user()->organization->id : $id);
        }
        $events = $events->get(); 
        $view = view('admin.events.filterEventData', compact('events', 'genders',  'seasons', 'setting'))->render();
        $view2 = view('admin.events.printEventPreview', compact('events', 'genders',  'seasons', 'setting', 'header'))->render();
        return response()->json([
            'html' => $view,
            'html2' => $view2
        ]);
    }
    public function generateEventPDF(Request $request)
    {
        if (Auth::user()->hasRole(7)) {
            $id = Session::get('id');
            $general = generalSetting::first();
            $adminheader = $general ? $general->header : '';
            $setting = OrganizationSetting::where('organization_id', Auth::user()->organization_id !== null ? Auth::user()->organization_id : $id)->first();
            $header = $setting ? $setting->header : '';
            $categories = Session::get('cats');
            $filter=null;
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
                $Leagues = League::where('organization_id', Auth::user()->organization_id !== null ? Auth::user()->organization_id : $id)->wherehas('registrations',function($q) use($child_id){
                    $q->whereIn('user_id',$child_id);
                });
                if ($categories) {

                    foreach ($categories as $key => $values) {
                        if ($key == "season") {
                            if($values!=0){
                                $Leagues = $Leagues->where('season_id', $values);
                            }
                        } elseif ($key == "league") {
                            if($values!=0){
                                $Leagues =  $Leagues->where('id', $values);
                            }
                        }
                       
                        elseif ($key == "event") {
                            if($values!=0){
                                $mainEvent= MainEvent::find($values);
                                $filter=$mainEvent->id;
                            }else{
                                $filter=null;
                            }
                        }
                    }
                } else {
                    $Leagues = League::where('organization_id', Auth::user()->organization_id !== null ? Auth::user()->organization_id : $id)->wherehas('registrations',function($q) use($child_id){
                        $q->whereIn('user_id',$child_id);
                    });
                }
                $Leagues = $Leagues->get();

                $regs2=array();
                foreach($Leagues as $league){
                    foreach($league->registrations as $reg){
                       foreach($reg->events as $evnt){
                        if($evnt->main_event_id==$filter){
                            $regs2[]=$reg->user_id;
                        }
                       }
                    }
                    
                }
                $children=array();
    foreach($regs2 as $reg1){
        if(in_array($reg1,$child_id)){
            $children[]=$reg1;
    
        }
    
    }
            $pdf = app('dompdf.wrapper');
            $pdf->getDomPDF()->set_option("enable_php", true);
            $pdf = PDF::loadView('admin.events.eventsPlayerPdf', compact('children','Leagues','filter', 'setting','general','adminheader'))->setPaper('a4', 'landscape');
            return $pdf->stream('Events.pdf');
        }
        $id = Session::get('id');

        $setting = OrganizationSetting::where('organization_id', Auth::user()->organization_id !== null ? Auth::user()->organization_id : $id)->first();
        $header = $setting ? $setting->header : '';
        $events = Event::with(['user', 'ageGroups'])->where('organization_id', Auth::user()->organization_id ? Auth::user()->organization->id : $id);
        $categories = Session::get('cats');
        if ($categories) {
            foreach ($categories as $key => $values) {
                if ($key == "season") {
                    if($values!=0){
                        $events = $events->where('season_id', $values);
                    }
                } elseif ($key == "league") {
                        if($values!=0){
                            $events =  $events->where('league_id', $values);
                        }
                } elseif ($key == "age") {
                    if($values!=0){
                        $events = $events->whereHas('ageGroups', function ($q) use ($values) {
                            $q->where('age_groups.id', $values);
                        });                    
                    }
                } elseif ($key == "event") {
                    if($values!=0){
                        $events = $events->whereHas('mainEvent', function ($q) use ($values) {
                            $q->where('id', $values);
                        });                    
                    }
                }
            }
        } else {
            $events = Event::with(['user', 'ageGroups'])->where('organization_id', Auth::user()->organization_id ? Auth::user()->organization->id : $id);
        }
        $events = $events->get();
        $pdf = app('dompdf.wrapper');
        $pdf->getDomPDF()->set_option("enable_php", true);
        $pdf = PDF::loadView('admin.events.eventPdf', compact('events', 'setting', 'header'))->setPaper('a4', 'landscape');
        return $pdf->stream('Events.pdf');
    }
    public function excel()
    {
        if (Auth::user()->hasRole(7)) {
            $id = Session::get('id');
            $categories = Session::get('cats');
            $filter=null;        
            return Excel::download(new EventsPlayerExport($categories, $id,$filter), 'Events.xlsx');
        }
        $id = Session::get('id');
        $categories = Session::get('cats');
        return Excel::download(new EventsExport($categories, $id), 'Events.xlsx');
    }
    public function participantLists(Request $request)
    {
        $id = Session::get('id');
        $ageGroupGenderId = Session::get('ageGroupGenderId');
        $AgeGroupGender = AgeGroupGender::where('id', $ageGroupGenderId)->first();
        $AgegroupEvent = AgeGroupEvent::where('id', $AgeGroupGender->age_group_event_id)->first();
        $Agegroup = AgeGroup::where('id', $AgegroupEvent->age_group_id)->first();
        $event = Event::where('id', $AgegroupEvent->event_id)->first();
        $registrations = $event->registrations;
        $setting = OrganizationSetting::where('organization_id', Auth::user()->organization_id !== null ? Auth::user()->organization_id : $id)->first();
        $header = $setting ? $setting->player_number_logo : '';
        $pdf = PDF::loadView('players.participantPdf', compact('registrations', 'AgeGroupGender', 'Agegroup', 'event', 'setting', 'header'))->setPaper('a4', 'portrait');
        return $pdf->stream('participants.pdf');
    }
    public function starterEventFilter(Request $request)
    {
        $id = Session::get('id');
        $seasons = Season::all();
        $setting = OrganizationSetting::where('organization_id', Auth::user()->organization_id !== null ? Auth::user()->organization_id : '')->first();
        $header = $setting ? $setting->header : '';

        if (Auth::user()->hasRole(5)) {

            $genders = AgeGroupGender::where('starter_id', Auth::user()->id)->whereNotIn('status',[1])->with('ageGroupEvent');
        } else {
            $genders = AgeGroupGender::where('judge_id', Auth::user()->id)->whereNotIn('status',[1])                                                                                                                                                    ->with('ageGroupEvent');
        }
        $cates = $request->input('obj');
        if($cates){
        foreach ($cates as $key => $values) {
            if ($key == "season") {
                if ($values!=0) {
                    $genders = $genders->whereHas('ageGroupEvent', function ($q) use ($values) {
                        $q->whereHas('Event', function ($q) use ($values) {
                            $q->where('season_id', $values);
                        });
                    });
                }
            } elseif ($key == "league") {
                if ($values!=0) {
                    $genders = $genders->whereHas('ageGroupEvent', function ($q) use ($values) {
                        $q->whereHas('Event', function ($q) use ($values) {
                            $q->where('league_id', $values);
                        });
                    });
                }
            } elseif ($key == "gender") {
                if ($values!=0) {
                    $genders = $genders->whereHas('gender', function ($q) use ($values) {
                        $q->where('id', $values);
                    });
                }
            } elseif ($key == "age") {
                if ($values!=0) {
                    $genders = $genders->whereHas('ageGroupEvent', function ($q) use ($values) {
                        $q->whereHas('ageGroup', function ($q) use ($values) {
                            $q->where('id', $values);
                        });
                    });
                }
            } elseif ($key == "event") {
                if ($values!=0) {
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
        if (Auth::user()->hasRole(5)) {

            $genders = AgeGroupGender::where('starter_id', Auth::user()->id)->whereNotIn('status',[1])->with('ageGroupEvent');
        } else {
            $genders = AgeGroupGender::where('judge_id', Auth::user()->id)->whereNotIn('status',[1])                                                                                                                                                    ->with('ageGroupEvent');
        }
    }
        // $genders = AgeGroupGender::where('starter_id', Auth::user()->id)->whereIn('status',[2,0])->with('ageGroupEvent')->get();

        $genders = $genders->get();
        $AgeGroups = AgeGroup::all();
        $judges = User::role('Judge')->where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->where('is_approved', 1)->get();
        $starters = User::role('Starter')->where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->where('is_approved', 1)->get();
        $agegroups = AgeGroup::all();
        $leagues = League::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->get();
        $view = view('admin.events.starterIncludeEvents', compact('genders', 'judges', 'starters', 'agegroups', 'leagues', 'id'))->render();

        return response()->json([
            'html' => $view,
        ]);
    }
}
