<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\League;
use App\Models\Season;
use App\Models\SportsCategory;
use App\Models\Venue;
use App\Models\Organization;
use App\Models\Event;
use App\Models\AgeGroup;
use App\Models\AgeGroupGender;
use App\Models\AgeGroupEvent;
use App\User;
use App\generalSetting;
use App\Models\Gender;
use Auth;
use Illuminate\Support\Carbon;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Validator;
use Session;
use PDF;
use App\Models\Club;
use App\Models\OrganizationSetting;
use App\Models\Registration;
use App\Exports\ChampionsExport;
use App\Exports\ParticipantNumberExport;
use App\Exports\LeagueExport;
use App\Exports\FutureLeagueExport;
use Excel;
use Illuminate\Validation\Rule;
use DB;
use Mail;
use Illuminate\Queue\Jobs\Job;
use App\Jobs\PostponeMailjob;
class LeagueController extends Controller
{
   
    public function index(Request $request)
    {
        $id=Session::get('id');
        $search = $request->get('query')?$request->get('query'):'';
        Session::put('search', $search);
        $seasonIds = array();
        $seasons = Season::where('status', 1)->get();
        foreach ($seasons as $season) {
            $seasonIds[] = $season->id;
        }
        $setting = OrganizationSetting::where('organization_id', Auth::user()->organization_id !== null ? Auth::user()->organization_id : $id)->first();
        $header = $setting ? $setting->header : '';
        $leagues = League::with(['season', 'sportsCategory', 'venue'])->whereIn('season_id', $seasonIds)->where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->where('to_date', '<', Carbon::now())->orderBy('id', 'Desc')->get();
        $fuleagues = League::with(['season', 'sportsCategory', 'venue'])->whereIn('season_id', $seasonIds)->where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->where('to_date', '>', Carbon::now())->orderBy('id', 'Desc')->get();
        return view('admin.leagues.index', compact('header','setting','leagues','fuleagues'));
    }
    public function data(Request $request)
    {
        $id = Session::get('id');
        $search = $request->filter_past_league?$request->filter_past_league:null;
        Session::put('search', $search);
       $seasonIds = array();
       $seasons = Season::where('status', 1)->get();
       foreach ($seasons as $season) {
           $seasonIds[] = $season->id;
       }

       if($search!=null)
     {
       $leagues = League::with(['venue','season'])->where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->whereIn('season_id', $seasonIds)->where('to_date', '<', Carbon::now()->format('Y-m-d'))
           ->where(function($query) use($search){
               return $query
               ->whereHas('venue', function ($q) use ($search) {
                   $q->where('name', 'LIKE', '%' . $search . '%');  
               })
               ->orwhereHas('season', function ($q) use ($search) {
                   $q->where('name','LIKE', '%' . $search . '%');  
               })
           ->orWhere('name','LIKE', '%' . $search . '%');               
           })->get();
         

     }
     else
     {
       $leagues = League::with(['venue','season'])->where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->whereIn('season_id', $seasonIds)->where('to_date', '<', Carbon::now()->format('Y-m-d'))->get();
   }
     return datatables()->of($leagues)
           // dd($search2);

          
           ->editColumn('created_at', function (League $league) {
               return $league->created_at->diffForHumans();
           })
           ->addColumn('duration', function (League $league) {
               $duration = $league->from_date . ':' . $league->to_date;
               return $duration;
           })
           ->addColumn('name', function (League $league) {
               $season1 = $league->season->name;
               $lname = $league->name . '-' . $season1;
               return $lname;
           })
           ->addColumn('champion', function ($league) {

               if ($league->champions == 1) {
                   return 'By Points';
               }
               if ($league->champions == 0) {
                   return 'By Place';
               }
           })
           ->addColumn('actions', function ($league) {
               $id = $league->id;
               $general=generalSetting::find(1);
               $actions = '<a href=' . route('leagues.edit', $id) . '><button style="padding: 2px 4px" class=" btn btn-primary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="material-icons" style="margin-bottom:5px">edit</i></button></a>
            <a href=' . route('league.events.view', $id) . '><button style="padding: 2px 4px" class=" btn btn-primary" data-toggle="tooltip" data-placement="top" title="View Events"><i class="material-icons text-light leftsize" style="margin-top:5px">event</i></button></a>
            <a href=' . route('league.champion', $id) . '><button  class=" btn btn-primary" style="padding: 2px 4px" data-toggle="tooltip" data-placement="top" title="Champion Lists"><img style="margin-bottom:5px" src="'.$general->website_url.'assets/images/icons/champ.png"></a>';



               return $actions;
           })
           ->rawColumns(['actions'])
           ->make(true);
    }
    public function champions($id)
    {
        $orgId = Session::get('id');
        $org = Organization::find($orgId);
        $AgeGroupGenders=AgeGroupGender::all();
        $league = League::find($id);
        $ageGroup=AgeGroup::find(12);
        $AgeGroups = Auth::user()->organization_id ? Auth::user()->organization->ageGroups : $org->ageGroups;
        $events = Event::where('organization_id',Auth::user()->organization_id ? Auth::user()->organization_id : $orgId)->where('league_id',$id)->get();
        // $totalEvents = $league->athelaticsetting->total_events;
        // $firstPlace = $league->athelaticsetting->first_place;
        // $totalPoints = $firstPlace * $totalEvents;
        
        return view('admin.leagues.champions', compact('id','AgeGroupGenders','AgeGroups', 'league',  'events'));
    }
    public function championLists(Request $request)
    {
        $league = null;
        $id = Session::get('id');
        $Organization = Organization::find($id);
        $AgeGroups = Auth::user()->organization_id ? Auth::user()->organization->ageGroups : $Organization->ageGroups;
        $events = Auth::user()->organization_id ? Auth::user()->organization->events : $Organization->events;
        // $totalEvents = Auth::user()->organization_id ? Auth::user()->organization->athelaticsetting->total_events : $Organization->athelaticsetting->total_events;
        $leagues = League::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->get();
        // $firstPlace = Auth::user()->organization_id ? Auth::user()->organization->athelaticsetting->first_place : $Organization->athelaticsetting->first_place;
        // $totalPoints = $firstPlace * $totalEvents;
        $setting = OrganizationSetting::where('organization_id', Auth::user()->organization_id !== null ? Auth::user()->organization_id : $id)->first();
        $header = $setting ? $setting->header : '';
       
        return view('reports.champions.champions', compact('setting','header','league', 'leagues', 'AgeGroups', 'events'));
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
        Session::put('league',$request->input('leagueData'));
        // dd($league);
        $id = Session::get('id');
        $Organization = Organization::find($id);
        $AgeGroups = Auth::user()->organization_id ? Auth::user()->organization->ageGroups : $Organization->ageGroups;
        $events = $league->events;
        // dd($Organization->athelaticsetting->total_events);
        // $totalEvents = Auth::user()->organization_id ? Auth::user()->organization->athelaticsetting->total_events : $Organization->athelaticsetting->total_events;
        $leagues = League::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->get();
        // $firstPlace = Auth::user()->organization_id ? Auth::user()->organization->athelaticsetting->first_place : $Organization->athelaticsetting->first_place;
        // $totalPoints = $firstPlace * $totalEvents;
        $setting = OrganizationSetting::where('organization_id', Auth::user()->organization_id !== null ? Auth::user()->organization_id : $id)->first();
        $header = $setting ? $setting->header : '';
       
        $view = view('reports.champions.filterChampionsData', compact('league', 'events', 'leagues', 'AgeGroups'))->render();
        $view3 = view('reports.champions.exportChampionsData', compact('league', 'events', 'leagues', 'AgeGroups'))->render();
        $view2 = view('reports.champions.printChampionPreview',  compact('setting','header','league', 'events', 'leagues', 'AgeGroups'))->render();

        return response()->json(['html' => $view,
        'html2' => $view2,
        'html3' => $view3

    ]);
    }
    public function generatePdf(Request $request)
    {
        $id = Session::get('id');
        $Organization = Organization::find($id);
        $league = League::find(Session::get('league'));
        $AgeGroups = Auth::user()->organization_id ? Auth::user()->organization->ageGroups : $Organization->ageGroups;
        $events = Auth::user()->organization_id ? Auth::user()->organization->events : $Organization->events;
        $totalEvents = Auth::user()->organization_id ? Auth::user()->organization->athelaticsetting->total_events : $Organization->athelaticsetting->total_events;
        $leagues = League::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->get();
        $firstPlace = Auth::user()->organization_id ? Auth::user()->organization->athelaticsetting->first_place : $Organization->athelaticsetting->first_place;
        $totalPoints = $firstPlace * $totalEvents;
        $setting = OrganizationSetting::where('organization_id', Auth::user()->organization_id !== null ? Auth::user()->organization_id : $id)->first();
        $header = $setting ? $setting->header : '';

        $pdf = PDF::loadView('reports.champions.championPdf', compact('setting','header','league', 'events', 'leagues', 'AgeGroups'))->setPaper('a4', 'portrait');
        return $pdf->stream('Champions.pdf');  
      }
      public function Excel(Request $request){
        $id = Session::get('id');
        $Organization = Organization::find($id);
        $league = League::find(Session::get('league'));
        $AgeGroups = Auth::user()->organization_id ? Auth::user()->organization->ageGroups : $Organization->ageGroups;
        $events = Auth::user()->organization_id ? Auth::user()->organization->events : $Organization->events;
        $totalEvents = Auth::user()->organization_id ? Auth::user()->organization->athelaticsetting->total_events : $Organization->athelaticsetting->total_events;
        $leagues = League::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->get();
        $firstPlace = Auth::user()->organization_id ? Auth::user()->organization->athelaticsetting->first_place : $Organization->athelaticsetting->first_place;
        $totalPoints = $firstPlace * $totalEvents;
       
        return Excel::download(new ChampionsExport($league, $id,$totalEvents,$firstPlace,$totalPoints,$AgeGroups,$leagues,$events), 'Champions.xlsx');


      }
    public function events(Request $request, $id)
    {
        $leagueid = $id;
        $id = Session::get('id');
        $seasonIds = array();
        $seasons = Season::where('status', 1)->get();
        foreach ($seasons as $season) {
            $seasonIds[] = $season->id;
        }
        $league = League::find($leagueid);
        $AgeGroups = AgeGroup::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->where('status', 1)->get();
        $genders = AgeGroupGender::groupBy('gender_id')->select('age_group_event_id')->get();
        $events = Event::with(['user', 'ageGroups'])->where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->get();
        $judges = User::role('Judge')->where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : '')->get();
        $starters = User::role('Starter')->where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : '')->get();
        $leagues = League::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : '')->get();
        session(["id" => $id]);
        session(["leagueid" => $leagueid]);
        $setting = OrganizationSetting::where('organization_id', Auth::user()->organization_id !== null ? Auth::user()->organization_id : $id)->first();
        $header = $setting ? $setting->header : '';
        return view('admin.events.showall', compact('setting','header','events', 'judges', 'starters', 'events', 'AgeGroups', 'leagues', 'league'));
    }
    public function futureData(Request $request)
    {
        $id = Session::get('id');
         $search2 = $request->filter_league?$request->filter_league:null;
     
         Session::put('search2', $search2);
        // $search2=Session::get('search2')?Session::get('search2'):'';
        $seasonIds = array();
        $seasons = Season::where('status', 1)->get();
        foreach ($seasons as $season) {
            $seasonIds[] = $season->id;
        }

        if($search2!=null)
      {
        //   dd($search2);
        $leagues = League::with(['venue','season'])->where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->whereIn('season_id', $seasonIds)->where('to_date', '>=', Carbon::now()->format('Y-m-d'))
            ->where(function($query) use($search2){
                return $query
                ->whereHas('venue', function ($q) use ($search2) {
                    $q->where('name', 'LIKE', '%' . $search2 . '%');  
                })
                ->orwhereHas('season', function ($q) use ($search2) {
                    $q->where('name','LIKE', '%' . $search2 . '%');  
                })
            ->orWhere('name','LIKE', '%' . $search2 . '%');               
            })->get();
          

      }
      else
      {
        $leagues = League::with(['venue','season'])->where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->whereIn('season_id', $seasonIds)->where('to_date', '>=', Carbon::now()->format('Y-m-d'))->get();
    }
      return datatables()->of($leagues)
            // dd($search2);

           
            ->editColumn('created_at', function (League $league) {
                return $league->created_at->diffForHumans();
            })
            ->addColumn('duration', function (League $league) {
                $duration = $league->from_date . ':' . $league->to_date;
                return $duration;
            })
            ->addColumn('name', function (League $league) {
                $season1 = $league->season->name;
                $lname = $league->name . '-' . $season1;
                return $lname;
            })
            ->addColumn('champion', function ($league) {

                if ($league->champions == 1) {
                    return 'By Points';
                }
                if ($league->champions == 0) {
                    return 'By Place';
                }
            })
            ->addColumn('actions', function ($league) {
                $id = $league->id;
                $general=generalSetting::find(1);
                $actions = '<a href=' . route('leagues.edit', $id) . '><button style="padding: 2px 4px" class=" btn btn-primary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="material-icons" style="margin-bottom:5px">edit</i></button></a>
                <a href=' . route('league.events.view', $id) . '><button style="padding: 2px 4px" class=" btn btn-primary" data-toggle="tooltip" data-placement="top" title="View Events"><i class="material-icons text-light leftsize" style="margin-top:5px">event</i></button></a>
                <a href=' . route('league.champion', $id) . '><button  class=" btn btn-primary" style="padding: 2px 4px" data-toggle="tooltip" data-placement="top" title="Champion Lists"><img style="margin-bottom:5px" src="'.$general->website_url.'assets/images/icons/champ.png"></a>
                <button  class=" btn btn-primary " id="postponed" data-id='.$league->id.' style="padding: 2px 4px" data-toggle="tooltip" data-placement="top" title="Postponed"><i class="far fa-clock"></i>
                <button  class=" btn btn-danger delete" id="cancelled" data-id='.$league->id.' style="padding: 2px 4px" data-toggle="tooltip" data-placement="top" title="Cancelled"><i class="material-icons" style="margin-bottom:5px">delete</i>';



                return $actions;
            })
            ->rawColumns(['actions'])
            ->make(true);
        
    }
    public function editParticipantReg($id){
        $league=League::find($id);
        return view('admin.leagues.editParticipantEvent',compact('league'));
        
    }
    public function findOrgClubs($id){
        $league=League::find($id);
        $regs = DB::table('registrations')
        ->leftJoin('users', 'users.id', '=', 'registrations.user_id')
        ->select(DB::raw("users.club_id"))
        ->where('users.club_id','!=',null)
        ->where('registrations.league_id','=',$league->id)
        ->groupBy(DB::raw("users.club_id"))
        ->get();
        $clubs=array();
        foreach($regs as $reg){
            $clubs[]=Club::find($reg->club_id);
        }
        return response()->json([
            'clubs' => $clubs
                ]);
    }
    public function participantByAgeGroup(Request $request)
    
      {
        Session::forget('FUleagueId');
        Session::forget('data');
        Session::forget('id');
        Session::forget('Query');
        Session::forget('dataId');
        Session::forget('orderType');
        Session::forget('columnName');

       $id = Session::get('id');
        $seasonIds = array();
        $seasons = Season::where('status', 1)->get();
        foreach ($seasons as $season) {
            $seasonIds[] = $season->id;
        }
        $fuleagues = League::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->where('to_date', '>', Carbon::now())->orderBy('id', 'Desc')->get();
        $fuleaguesid = League::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->where('to_date', '>', Carbon::now())->orderBy('id', 'Desc')->get();
        $clubs = Club::where('is_approved', 1)->get();
        Session::put('lid',$fuleaguesid);
        $org = Organization::where('id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->get();
            $registrations = Registration::where('organization_id','=', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->whereHas('league',function($query) {
                $query->where('to_date', '>', Carbon::now());
            })->wherehas('user',function($q){ 
                $q->where('is_approved',1);
            })->get();
            Session::put('regs',$registrations);

        $setting = OrganizationSetting::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->first();
         $header=$setting?$setting->header:'';
        return view('admin.leagues.playerNumber', compact('fuleagues', 'clubs', 'registrations', 'org','header','setting'));
    }
    
    
    public function dependentDrop(Request $request,$id)
    {
        $setting = OrganizationSetting::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->first();
        $header=$setting->header?$setting->header:'';
        $FUleagueId=$request->input('leagueID')?$request->input('leagueID'):'';
        $data=$request->input('data')?$request->input('data'):'';
        Session::put('FUleagueId',$FUleagueId);
        Session::put('data',$data);
        $orderType = Session::get('orderType');
        $columnName = Session::get('columnName');
        if($FUleagueId=="whole"){
            $users=User::whereHas('registrations',function($q) {
                $q->wherehas('league',function($q){
                    $q->where('to_date','>', Carbon::now());
                });               
       })->where('club_id','!=',null)->groupBy('club_id')->get();

       $organization=Organization::wherehas('registrations',function($q) {
           $q->wherehas('league',function($q){
            $q->where('to_date','>', Carbon::now());
           })->wherehas('user',function($q) {
            $q->whereNotNull('organization_id');
        });
       })->groupBy('id')->get();
       $registrations = Registration::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->wherehas('league',function($q){
        $q->where('to_date','>', Carbon::now()); })->wherehas('user',function($q){
        $q->where('is_approved',1);
    })->get();
    Session::put('regs',$registrations);
        }else{
            $users=User::whereHas('registrations',function($q) use($FUleagueId) {
                $q->where('league_id','=', $FUleagueId)
                ->where('club_id','!=',null);
       })->groupBy('club_id')->get();

       $organization=Organization::wherehas('registrations',function($q) use($FUleagueId) {
           $q->where('league_id',$FUleagueId)->whereHas('user',function($q) {
            $q->whereNotNull('organization_id');
        });
       })->groupBy('id')->get();
       $registrations = Registration::where('organization_id','=', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->where('league_id',$FUleagueId)->wherehas('user',function($q){ 
        $q->where('is_approved',1);
    })->get();
    Session::put('regs',$registrations);
        }
        if($columnName=='number'){
            if($orderType=='asc'){
                $registrations=$registrations->sortBy(function($query){
                            return $query->user->userId;
                         })->all();
                        }
                        else{
                            $registrations=$registrations->sortByDesc(function($query){
                                return $query->user->userId;
                             })->all();
                        }
                    }
       $OrganizationClub=array();
       $view = view('admin.leagues.filterPlayerNumberData', compact('registrations'))->render();
       $view3 = view('admin.leagues.playerNumberExcelData', compact('registrations'))->render();
        $view2 = view('admin.leagues.printPlayerNumber', compact('setting', 'header', 'registrations'))->render();
    //    dd($OrganizationClub);
    $clubs=array();
       foreach ($users as $user) {
        $clubs[]=Club::find($user->club_id);

    }
         return response()->json(['organization' => $organization,'clubs' => $clubs,'html' => $view,'html2' => $view2,'html3' => $view3 ]);   
    }
   
   
    function participantsSearch(Request $request)
    {
        $FUleagueId = Session::get('FUleagueId');
        $data = Session::get('data');
        $id = Session::get('id');
        $Query=$request->input('Query')?$request->input('Query'):'';
        $dataId=$request->input('dataId')?$request->input('dataId'):'';
        $orderType = Session::get('orderType');
        $columnName = Session::get('columnName');
        Session::put('Query',$Query);
        Session::put('dataId',$dataId);

        if($data||$FUleagueId){
        if($data!=" "){
        if($FUleagueId=="whole"){
                $registrations = Registration::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->wherehas('league',function($q){
                    $q->where('to_date','>', Carbon::now()); })->wherehas('user',function($q){
                    $q->where('is_approved',1);
                });
            if ($dataId == "club") {
                $registrations = $registrations->whereHas('user', function ($q) use ($Query) {
                    $q->where('club_id', $Query);
                });
            }elseif($dataId == "organization") {
            $registrations = $registrations->whereHas('user', function ($q) use ($Query) {
                $q->where([['organization_id', $Query],['club_id',null]]);
            });    
            }elseif($dataId == "without-Membership") {
                // dd($dataId);
            $registrations = $registrations->wherehas('user', function ($q) {
                $q->where([['organization_id',null],['club_id',null]]);
            });    
            }elseif($dataId == "Club/Organization") {
                $registrations = Registration::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->wherehas('league',function($q){
                    $q->where('to_date','>', Carbon::now()); })->wherehas('user',function($q){
                    $q->where('is_approved',1);
                });
        }   
             
    }else{
       
                $registrations = Registration::where([['organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id],['league_id',$FUleagueId]] )->wherehas('user',function($q){
                    $q->where('is_approved',1);
                });
            if ($dataId == "club") {
                $registrations = $registrations->whereHas('user', function ($q) use ($Query) {
                    $q->where('club_id', $Query);
                });
            }elseif($dataId == "organization") {
            $registrations = $registrations->whereHas('user', function ($q) use ($Query) {
                $q->where([['organization_id', $Query],['club_id',null]]);
            });    
            }elseif($dataId == "without-Membership") {
            $registrations = $registrations->whereHas('user', function ($q) {
                $q->where([['organization_id',null],['club_id',null]]);
            });    
            }elseif($dataId == "Club/Organization") {
            $registrations = Registration::where([['organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id],['league_id',$FUleagueId]] )->wherehas('user',function($q){
                $q->where('is_approved',1);
            });

        }
        }
    }else{
        $registrations = Registration::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->wherehas('league',function($q){
            $q->where('to_date','>', Carbon::now()); 
        })->wherehas('user',function($q){
            $q->where('is_approved',1);
        });
    }
}else{
    $registrations = Registration::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->wherehas('league',function($q){
        $q->where('to_date','>', Carbon::now()); 
    })->wherehas('user',function($q){
        $q->where('is_approved',1);
    });
}
    $registrations = $registrations->get();
Session::put('regs',$registrations);
if($request->input('columnName')=='number'){
    if($request->input('sortingType')=='desc'){
        $registrations=$registrations->sortByAsc(function($query){
                    return $query->user->userId;
                 })->all();
                }
                else{
                    $registrations=$registrations->sortByDesc(function($query){
                        return $query->user->userId;
                     })->all();
                }
            }
        $setting = OrganizationSetting::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->first();
        $header=$setting->header?$setting->header:'';
        $view = view('admin.leagues.filterPlayerNumberData', compact('registrations'))->render();
        $view3 = view('admin.leagues.playerNumberExcelData', compact('registrations'))->render();
         $view2 = view('admin.leagues.printPlayerNumber', compact('setting', 'header', 'registrations'))->render();

         return response()->json(['html' => $view,'html2' => $view2,'html3' => $view3]);
        }
   
   
    public function sortByParticipant(Request $request){
        $registrations=Session::get('regs');
       $orderType=$request->input('order_type');
        $columnName=$request->input('column_name');
        Session::put('orderType',$orderType);
        Session::put('columnName',$columnName);
        
                if($request->input('column_name')=='number'){
                if($request->input('order_type')=='asc'){
        
                    $registrations=$registrations->sortBy(function($query){
                                return $query->user->userId;
                             })->all();
                            }else{
                                $registrations=$registrations->sortByDesc(function($query){
                                    return $query->user->userId;
                                 })->all();
                            }
                            }
                        
 $setting = OrganizationSetting::where('organization_id', Auth::user()->organization_id)->first();
        $header=$setting->header?$setting->header:'';
        $view = view('admin.leagues.filterPlayerNumberData', compact('registrations'))->render();
         $view2 = view('admin.leagues.printPlayerNumber', compact('setting', 'header', 'registrations'))->render();

        return response()->json(['html' => $view,'html2' => $view2]);
    }
   
  
   
    function ParticipantGeneratePdf(Request $request)
    {
        $FUleagueId = Session::get('FUleagueId');
        $data = Session::get('data');
        $id = Session::get('id');
        $Query=Session::get('Query');
        $dataId= Session::get('dataId');
        $orderType = Session::get('orderType');
        $columnName = Session::get('columnName');
        // dd( $dataId);
        if($data||$FUleagueId){
            if($data!=" "){
            if($FUleagueId=="whole"){
                    $registrations = Registration::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->wherehas('league',function($q){
                        $q->where('to_date','>', Carbon::now()); })->wherehas('user',function($q){
                        $q->where('is_approved',1);
                    });
                if ($dataId == "club") {
                    $registrations = $registrations->whereHas('user', function ($q) use ($Query) {
                        $q->where('club_id', $Query);
                    });
                }elseif($dataId == "organization") {
                $registrations = $registrations->whereHas('user', function ($q) use ($Query) {
                    $q->where([['organization_id', $Query],['club_id',null]]);
                });    
                }elseif($dataId == "without-Membership") {
                    // dd($dataId);
                $registrations = $registrations->wherehas('user', function ($q) {
                    $q->where([['organization_id',null],['club_id',null]]);
                });    
                }elseif($dataId == "Club/Organization") {
                    $registrations = Registration::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->wherehas('league',function($q){
                        $q->where('to_date','>', Carbon::now()); })->wherehas('user',function($q){
                        $q->where('is_approved',1);
                    });
            }   
                 
        }else{
           
                    $registrations = Registration::where([['organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id],['league_id',$FUleagueId]] )->wherehas('user',function($q){
                        $q->where('is_approved',1);
                    });
                if ($dataId == "club") {
                    $registrations = $registrations->whereHas('user', function ($q) use ($Query) {
                        $q->where('club_id', $Query);
                    });
                }elseif($dataId == "organization") {
                $registrations = $registrations->whereHas('user', function ($q) use ($Query) {
                    $q->where([['organization_id', $Query],['club_id',null]]);
                });    
                }elseif($dataId == "without-Membership") {
                $registrations = $registrations->whereHas('user', function ($q) {
                    $q->where([['organization_id',null],['club_id',null]]);
                });    
                }elseif($dataId == "Club/Organization") {
                $registrations = Registration::where([['organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id],['league_id',$FUleagueId]] )->wherehas('user',function($q){
                    $q->where('is_approved',1);
                });
    
            }
            }
        }else{
            $registrations = Registration::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->wherehas('league',function($q){
                $q->where('to_date','>', Carbon::now()); })->wherehas('user',function($q){
                $q->where('is_approved',1);
            });
        }
    }else{
        $registrations = Registration::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->wherehas('league',function($q){
            $q->where('to_date','>', Carbon::now()); })->wherehas('user',function($q){
            $q->where('is_approved',1);
        });
    }
    $registrations = $registrations->get();
    if($columnName=='number'){
        if($orderType=='asc'){
            $registrations=$registrations->sortBy(function($query){
                        return $query->user->userId;
                     })->all();
                    }
                    else{
                        $registrations=$registrations->sortByDesc(function($query){
                            return $query->user->userId;
                         })->all();
                    }
                }
        $setting = OrganizationSetting::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->first();
        $header=$setting->header?$setting->header:'';
        $pdf = PDF::loadView('admin.leagues.participantNumberPdf', compact('registrations', 'header','setting'))->setPaper('a4', 'portrait');
        return $pdf->stream('PlayerNumbers.pdf');
    }
    function ParticipantGenerateExcel(Request $request)
    {
        $FUleagueId = Session::get('FUleagueId');
        $data = Session::get('data');
        $id = Session::get('id');
        $Query=Session::get('Query');
        $dataId= Session::get('dataId');
        $orderType = Session::get('orderType');
        $columnName = Session::get('columnName');
        return Excel::download(new ParticipantNumberExport($FUleagueId,$data,$id,$Query,$dataId,$orderType,$columnName), 'Participants.xlsx');

        
        
    }
    public function PDFParticipantGenerate(Request $request)
    {
          $id = Session::get('id');
        $general = OrganizationSetting::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->first();
        $header = $general->player_number_logo;
        $FUleagueId = Session::get('FUleagueId');
        $data = Session::get('data');
        $dataId = Session::get('dataId');
        $Query = Session::get('Query');
        $orderType = Session::get('orderType');
        $columnName = Session::get('columnName');
        // dd($orderType);
        if($data||$FUleagueId){
        if($data!=" "){
            if($FUleagueId=="whole"){
                    $registrations = Registration::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->wherehas('league',function($q){
                        $q->where('to_date','>', Carbon::now()); })->wherehas('user',function($q){
                        $q->where('is_approved',1);
                    });
                if ($dataId == "club") {
                    $registrations = $registrations->whereHas('user', function ($q) use ($Query) {
                        $q->where('club_id', $Query);
                    });
                }elseif($dataId == "organization") {
                $registrations = $registrations->whereHas('user', function ($q) use ($Query) {
                    $q->where([['organization_id', $Query],['club_id',null]]);
                });    
                }elseif($dataId == "without-Membership") {
                    // dd($dataId);
                $registrations = $registrations->wherehas('user', function ($q) {
                    $q->where([['organization_id',null],['club_id',null]]);
                });    
                }elseif($dataId == "Club/Organization") {
                    $registrations = Registration::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->wherehas('league',function($q){
                        $q->where('to_date','>', Carbon::now()); })->wherehas('user',function($q){
                        $q->where('is_approved',1);
                    });
            }   
                 
        }else{
           
                    $registrations = Registration::where([['organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id],['league_id',$FUleagueId]] )->wherehas('user',function($q){
                        $q->where('is_approved',1);
                    });
                if ($dataId == "club") {
                    $registrations = $registrations->whereHas('user', function ($q) use ($Query) {
                        $q->where('club_id', $Query);
                    });
                }elseif($dataId == "organization") {
                $registrations = $registrations->whereHas('user', function ($q) use ($Query) {
                    $q->where([['organization_id', $Query],['club_id',null]]);
                });    
                }elseif($dataId == "without-Membership") {
                $registrations = $registrations->whereHas('user', function ($q) {
                    $q->where([['organization_id',null],['club_id',null]]);
                });    
                }elseif($dataId == "Club/Organization") {
                $registrations = Registration::where([['organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id],['league_id',$FUleagueId]] )->wherehas('user',function($q){
                    $q->where('is_approved',1);
                });
    
            }
            }
        }else{
            $registrations = Registration::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->wherehas('league',function($q){
                $q->where('to_date','>', Carbon::now()); })->wherehas('user',function($q){
                $q->where('is_approved',1);
            });
        }
    }else{
        $registrations = Registration::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->wherehas('league',function($q){
            $q->where('to_date','>', Carbon::now()); })->wherehas('user',function($q){
            $q->where('is_approved',1);
        });
    }
    $registrations = $registrations->get();

    if($columnName=='number'){
        if($orderType=='asc'){
            $registrations=$registrations->sortBy(function($query){
                        return $query->user->userId;
                     })->all();
                    //  dd($registrations);

                    }
                    else{
                        $registrations=$registrations->sortByDesc(function($query){
                            return $query->user->userId;
                         })->all();
                    }
                }
        $pdf = PDF::loadView('admin.leagues.playerNumberPdf', compact('registrations', 'header'))->setPaper('a4', 'portrait');
        return $pdf->stream('PlayerNumbers.pdf');
    }
    public function participants(Request $request, $id)
    {
        $league = League::find($id);
        Session::put('league', $id);

        $events = $league->events;
        $registrations = $league->registrations;
        return view('admin.leagues.participants', compact('events', 'registrations', 'league'));
    }
    public function participantRegs(Request $request, $id)
    {
        $league = League::find($id);
        return view('admin.leagues.participantRegs', compact('league'));
    }
    public function editEventDate($id){
        $orgId=Session::get('id');
$event = Event::find($id);
        $genders = Gender::all();
        $eventorganizers = User::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $orgId)->get();
        $agegroups = AgeGroup::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization->id : $orgId)->get();
        $ages = $event->ageGroups;
        foreach ($ages as $age) {
            $eventAgeGroupIds = AgeGroupEvent::where('event_id', $event->id)->get();
            foreach ($eventAgeGroupIds as $eventAgeGroupId) {
                $agegenders = AgeGroupGender::where('age_group_event_id', $eventAgeGroupId->id)->get();
            }
        }
        return view("admin.leagues.event-edit-date", compact('event', 'eventorganizers', 'agegroups', 'genders', 'agegenders'));  
    }
    public function updateEventDate(Request $request,$id){
         $league = League::find($request->league);
        $event = Event::find($id);
        $event->main_event_id = $request->name;
        $event->league_id = $request->league;
        $event->user_id = $request->organizer;
        $event->organization_id = $request->org;
        $event->season_id = $league->season_id;
        $event->rules = $request->rules;
        $event->date = $request->date;
        $event->save();
    
        return redirect('/all');
        
    }
    /**
     * Show the form for creating a new Organization.
     *
     * @return Response
     */
    public function exportParticipants(Request $request)
    {
        $leagueId = Session::get('league');
        $id = Session::get('id');

        $league = League::find($leagueId);
        $setting = OrganizationSetting::where('organization_id', Auth::user()->organization_id !== null ? Auth::user()->organization_id : $id)->first();
        $header = $setting ? $setting->header : '';
        $registrations = $league->registrations;

        $pdf = PDF::loadView('admin.leagues.participantPdf', compact('registrations', 'league', 'header', 'setting'))->setPaper('a4', 'portrait');
        return $pdf->stream('participants.pdf');
    }

    public function create()
    {
        $id = Session::get('id');

        $seasons = Season::where('status',1)->get();
        // foreach ($seasons as $season) {
        //     $seasonIds[] = $season->id;
        // }
        $locations = Venue::with('venueDetails')->where('status', 1)->where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->get();
        $categories = SportsCategory::all();
        $today = Carbon::now();
        return view('admin.leagues.create', compact('seasons', 'locations', 'categories', 'today', 'id'));
    }

    /**
     * Store a newly created Organization in storage.
     *
     * @param CreateOrganizationRequest $request
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $id = Session::get('id');
        $validator = Validator::make(
            $request->all(),
            [
                'season'                  => 'required',
                'category'                       => 'required',
                'location'                       => 'required',
                'sdate'                  => 'required',
                'edate'                    => 'required',
                'regsdate'                  => 'required',
                'regedate'                    => 'required',
                'points'=>'required',

                'name' => [
                    'required',Rule::unique('leagues')->where(function($query) use($id) {
                      $query->where('organization_id', '=', Auth::user()->organization_id ? Auth::user()->organization_id : $id);
                  })
                ],
            ],
           
            [
                'season.required' => 'Select The Season',
                'category.required'           => 'Select The SportsCategory',
                'location.required'    => 'Select The Location',
                'name.unique'       => 'League Name  is Already Available. Please give another name',
                'sdate.required'  => 'Start Date is required',
                'edate.required'  => 'End Date is Required',
                'regsdate.required'  => 'Registration Start Date is required',
                'regedate.required'  => 'Registration End Date is Required',
                'points.required'=>'Please choose champion slection method',
                'name.required'=>'League Name is required'


            ]

        );

        if ($validator->fails()) {
            return redirect('/leagues/create')->withErrors($validator)->withInput();
        }

        $league = new League;
        $league->name   = $request->input('name');
        $league->sports_category_id   = $request->input('category');
        $league->venue_id  = $request->input('location');
        $league->organization_id   = $request->input('organization');
        $league->season_id   = $request->input('season');
        $league->from_date   = $request->input('sdate');
        $league->to_date   = $request->input('edate');
        $league->reg_start_date   = $request->input('regsdate');
        $league->reg_end_date   = $request->input('regedate');
        $league->champions = $request->input('points');
        $league->save();


        return redirect('/leagues');
    }

    /**
     * Display the specified Organization.
     *
     * @param  int $id
     *
     * @return Response
     */

    /**
     * Show the form for editing the specified Organization.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $orgId = Session::get('id') ? Session::get('id') : '';
        $league = League::find($id);
        $seasons = Season::all();
        $locations = Venue::where('status', 1)->where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $orgId)->get();
        $categories = SportsCategory::all();
        $today = Carbon::now();
        return view('admin.leagues.edit', compact('league', 'seasons', 'locations', 'categories', 'today', 'orgId'));
    }

    /**
     * Update the specified Organization in storage.
     *
     * @param  int              $id
     * @param UpdateOrganizationRequest $request
     *
     * @return Response
     */
    public function update($id, Request $request)
    {
        /** @var Organization $organization */
        $validator = Validator::make(
            $request->all(),
            [
                'season'                  => 'required',
                'category'                       => 'required',
                'location'                       => 'required',
                'name'              => 'required|max:255',
                'sdate'                  => 'required',
                'edate'                    => 'required'
            ],
            [
                'season.required' => 'Select The Season',
                'category.required'           => 'Select The SportsCategory',
                'location.required'    => 'Select The Location',
                'name.required'       => 'League Name  is Required',
                'sdate.required'  => 'Start Date is required',
                'edate.required'  => 'End Date is Required',


            ]

        );

        if ($validator->fails()) {
            return redirect('/leagues/create')->withErrors($validator)->withInput();
        }

        $league = League::find($id);
        $league->name   = $request->input('name');
        $league->sports_category_id   = $request->input('category');
        $league->venue_id  = $request->input('location');
        $league->organization_id   = $request->input('organization');
        $league->season_id   = $request->input('season');
        $league->from_date   = $request->input('sdate');
        $league->to_date   = $request->input('edate');
                $league->reg_start_date   = $request->input('regsdate');
        $league->reg_end_date   = $request->input('regedate');

        $league->champions = $request->input('points');

        $league->save();


        return redirect('/leagues');
    }

    /**
     * Remove the specified Organization from storage.
     *
     * @param  int $id
     *
     * @throws \Exception
     *
     * @return Response
     */

    public function editEvent($id)
    {
      
        $orgId = Session::get('id') ? Session::get('id') : '';

        $event = Event::find($id);
        $genders = Gender::all();
        $eventorganizers = User::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $orgId)->get();
        $agegroups = AgeGroup::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization->id : $orgId)->get();
        $ages = $event->ageGroups;
        foreach ($ages as $age) {
            $eventAgeGroupIds = AgeGroupEvent::where('event_id', $event->id)->get();
            foreach ($eventAgeGroupIds as $eventAgeGroupId) {
                $agegenders = AgeGroupGender::where('age_group_event_id', $eventAgeGroupId->id)->get();
            }
        }
        return view("admin.leagues.event-edit", compact('event', 'eventorganizers', 'agegroups', 'genders', 'agegenders', 'orgId'));
    }
    public function updateEvent($id, Request $request)
    {
        // dd($request->input('ages'));
        $league = League::find($request->league);
        $event = Event::find($id);
        $event->main_event_id = $request->name;
        $event->league_id = $request->league;
        $event->user_id = $request->organizer;
        $event->organization_id = $request->org;
        $event->season_id = $league->season_id;
        $event->rules = $request->rules;
        $event->date = $request->date;
        $event->save();
        $ages = $event->agegroups;

        foreach ($ages as $age) {
            $eventAgeGroupIds = AgeGroupEvent::where('event_id', $event->id)->get();
            foreach ($eventAgeGroupIds as $eventAgeGroupId) {
                $AgeGroupIds = AgeGroupGender::where('age_group_event_id', $eventAgeGroupId->id)->get();
                foreach ($AgeGroupIds as $AgeGroupId) {
                    $AgeGroupId->delete();
                }
            }
        }
        $event->ageGroups()->detach();
        foreach ($request->ages as $age) {
            $event->agegroups()->attach($age);
            $ageGroup  = AgeGroupEvent::where('age_group_id', $age)->where('event_id', $event->id)->first();
            foreach ($request->genders as $gender) {
                $AgeGroupGender = new AgeGroupGender();
                $AgeGroupGender->gender_id = $gender;
                $ageGroup->ageGroupGenders()->save($AgeGroupGender);
            }
        }
        return redirect('/all');
    }
    public function deleteEvent(Request $request,$id){
        
        // dd("hi");
        $event = Event::find($id);
        $ages = $event->agegroups;
        foreach ($ages as $age) {
            $eventAgeGroupIds = AgeGroupEvent::where('event_id', $event->id)->get();
            foreach ($eventAgeGroupIds as $eventAgeGroupId) {
                $AgeGroupIds = AgeGroupGender::where('age_group_event_id', $eventAgeGroupId->id)->get();
                foreach ($AgeGroupIds as $AgeGroupId) {
                    $AgeGroupId->delete();
                }
            }
        }
        $event->ageGroups()->detach();
        $event->delete();
        return response()->json([
            'message' => 'deleted'
        ]);
    }
    public function remove(Request $request)
    {

        $organization = Organization::find($request->input('id'));
        //  dd($organization);
        $organization->status = 0;
        $organization->save();
        return response()->json([
            'message' => 'deleted'
        ]);
    }

    public function leaguepdf(Request $request)
    {
        $id=Session::get('id');
        $search=Session::get('search');
        $setting = OrganizationSetting::where('organization_id', Auth::user()->organization_id !== null ? Auth::user()->organization_id : $id)->first();
        $header = $setting ? $setting->header : '';
        $general = generalSetting::first();
        $org=Organization::find(Auth::user()->organization_id);

        if($search != ''){
// dd($search);
                $seasonIds = array();
                $seasons = Season::where('status', 1)->get();
                foreach ($seasons as $season) {
                    $seasonIds[] = $season->id;
                }
                $leagues = League::with(['season', 'sportsCategory', 'venue'])->whereIn('season_id', $seasonIds)->where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->where('to_date', '<', Carbon::now())

                ->where(function($query) use($search){
                    return $query
                    ->whereHas('venue', function ($q) use ($search) {
                        $q->where('name', 'LIKE', '%' . $search . '%');  
                    })
                    ->orwhereHas('season', function ($q) use ($search) {
                        $q->where('name', $search);  
                    })
                ->orWhere('name','LIKE', '%' . $search . '%');               
                })->orderBy('id', 'DESC')->get();
            $pdf = app('dompdf.wrapper');
            $pdf->getDomPDF()->set_option("enable_php", true);
            $pdf = PDF::loadView('admin.leagues.leaguepdf', compact('org','leagues','id','header','setting'))->setPaper('a4', 'potrait');
            return $pdf->stream('leagues.pdf');

        }else{
            $seasonIds = array();
            $seasons = Season::where('status', 1)->get();
            foreach ($seasons as $season) {
                $seasonIds[] = $season->id;
            }
            $leagues = League::with(['season', 'sportsCategory', 'venue'])->whereIn('season_id', $seasonIds)->where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->where('to_date', '<', Carbon::now())->orderBy('id', 'Desc')->get();

            $pdf = app('dompdf.wrapper');
     $pdf->getDomPDF()->set_option("enable_php", true);
     $pdf = PDF::loadView('admin.leagues.leaguepdf', compact('org','leagues','id','header','setting'))->setPaper('a4', 'potrait');
     return $pdf->stream('Past_leagues.pdf');
    



    }



    }
    public function leagueexcel(Request $request)
    {
        $search = Session::get('search');
        
        $id = Session::get('id');
        
        
        return Excel::download(new LeagueExport($search, $id), 'Past_leagues List.xlsx');

    }
    public function print(Request $request)
    {
        $id=Session::get('id');

                $setting = OrganizationSetting::where('organization_id', Auth::user()->organization_id !== null ? Auth::user()->organization_id : $id)->first();
                $header = $setting ? $setting->header : '';
                // $general = generalSetting::first();
                $search=Session::get('search')?Session::get('search'):'';
                // dd( $search);

    
        if($search != ''){
            //   dd( $search);

            $seasonIds = array();
            $seasons = Season::where('status', 1)->get();
            foreach ($seasons as $season) {
                $seasonIds[] = $season->id;
            }
            $leagues = League::with(['season', 'sportsCategory', 'venue'])->whereIn('season_id', $seasonIds)->where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->where('to_date', '<', Carbon::now())

            ->where(function($query) use($search){
                return $query
                ->whereHas('venue', function ($q) use ($search) {
                    $q->where('name', 'LIKE', '%' . $search . '%');  
                })
                ->orwhereHas('season', function ($q) use ($search) {
                    $q->where('name', $search);  
                })
            ->orWhere('name','LIKE', '%' . $search . '%');               
            })->orderBy('id', 'DESC')->get();

        $view = view('admin.leagues.leaguePrint', compact('leagues','id','setting','header'))->render();
        return response()->json(['html' => $view
    ]);

        }else{              
            //   dd( $search);

            $seasonIds = array();
            $seasons = Season::where('status', 1)->get();
            foreach ($seasons as $season) {
                $seasonIds[] = $season->id;
            }
            $leagues = League::with(['season', 'sportsCategory', 'venue'])->whereIn('season_id', $seasonIds)->where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->where('to_date', '<', Carbon::now())->orderBy('id', 'Desc')->get();

            $view = view('admin.leagues.leaguePrint', compact('leagues','id','setting','header'))->render();
            return response()->json(['html' => $view]);


        }
        
    
}
    public function Futureprint(Request $request)
    {
        $id=Session::get('id');

                $setting = OrganizationSetting::where('organization_id', Auth::user()->organization_id !== null ? Auth::user()->organization_id : $id)->first();
                $header = $setting ? $setting->header : '';
                // $general = generalSetting::first();
                $search2=Session::get('search2')?Session::get('search2'):'';
    
        if($search2 != ''){
            //   dd( $search2);

            $seasonIds = array();
            $seasons = Season::where('status', 1)->get();
            foreach ($seasons as $season) {
                $seasonIds[] = $season->id;
            }
            $fuleagues = League::with(['season', 'sportsCategory', 'venue'])->where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->where('to_date', '>', Carbon::now())

            ->where(function($query) use($search2){
                return $query
                ->whereHas('venue', function ($q) use ($search2) {
                    $q->where('name', 'LIKE', '%' . $search2 . '%');  
                })
                ->orwhereHas('season', function ($q) use ($search2) {
                    $q->where('name',  $search2);  
                })
            ->orWhere('name','LIKE', '%' . $search2 . '%')              
            ->orWhere('name','LIKE', '%' . $search2 . '%');               
            })->orderBy('id', 'DESC')->get();
            //   dd( $fuleagues);

        $view = view('admin.leagues.futureleaguePrint', compact('fuleagues','id','setting','header'))->render();
        return response()->json(['html' => $view
    ]);

        }else{              
            //   dd( $search);

            $seasonIds = array();
            $seasons = Season::where('status', 1)->get();
            foreach ($seasons as $season) {
                $seasonIds[] = $season->id;
            }
            $fuleagues = League::with(['season', 'sportsCategory', 'venue'])->where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->where('to_date', '>', Carbon::now())->orderBy('id', 'Desc')->get();

            $view = view('admin.leagues.futureleaguePrint', compact('fuleagues','id','setting','header'))->render();
            return response()->json(['html' => $view
        ]);


        }
}
public function futureleaguepdf(Request $request)
    {
     

        $id=Session::get('id');
        $search2=Session::get('search2')?Session::get('search2'):'';
        $setting = OrganizationSetting::where('organization_id', Auth::user()->organization_id !== null ? Auth::user()->organization_id : $id)->first();
        $header = $setting ? $setting->header : '';
        $general = generalSetting::first();
        $org=Organization::find(Auth::user()->organization_id);
        if($search2 != ''){
// dd($search2);
                $seasonIds = array();
                $seasons = Season::where('status', 1)->get();
                foreach ($seasons as $season) {
                    $seasonIds[] = $season->id;
                }
                $fuleagues = League::with(['season', 'sportsCategory', 'venue'])->where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->where('to_date', '>', Carbon::now())

                ->where(function($query) use($search2){
                    return $query
                    ->whereHas('venue', function ($q) use ($search2) {
                        $q->where('name', 'LIKE', '%' . $search2 . '%');  
                    })
                    ->orwhereHas('season', function ($q) use ($search2) {
                        $q->where('name', $search2);  
                    })
                ->orWhere('name','LIKE', '%' . $search2 . '%');               
                })->orderBy('id', 'DESC')->get();
            $pdf = app('dompdf.wrapper');
            $pdf->getDomPDF()->set_option("enable_php", true);
            $pdf = PDF::loadView('admin.leagues.futureleaguepdf', compact('org','fuleagues','id','header','setting'))->setPaper('a4', 'potrait');
            return $pdf->stream('futureleagues.pdf');

        }else{
            $seasonIds = array();
            $seasons = Season::where('status', 1)->get();
            foreach ($seasons as $season) {
                $seasonIds[] = $season->id;
            }
            $fuleagues = League::with(['season', 'sportsCategory', 'venue'])->where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->where('to_date', '>', Carbon::now())->orderBy('id', 'Desc')->get();

            $pdf = app('dompdf.wrapper');
     $pdf->getDomPDF()->set_option("enable_php", true);
     $pdf = PDF::loadView('admin.leagues.futureleaguepdf', compact('org','fuleagues','id','header','setting'))->setPaper('a4', 'potrait');
     return $pdf->stream('futureleagues.pdf');
    



    }
    }
    public function futureleagueexcel(Request $request)
    {
        $search2=Session::get('search2')?Session::get('search2'):'';
        
        $id = Session::get('id');
        
        
        return Excel::download(new FutureLeagueExport($search2, $id), 'futureleagues List.xlsx');

    }
    public function Postponeddata(Request $request,$id)
    {
        $league=League::find($id);
        return response()->json([
            'league_from' => $league->from_date,
            'league_to' => $league->to_date,
            'leagueName' => $league->name,
            'league_id' => $league->id,
        ]);
    }
    public function PostponedSendMail(Request $request)
    {
        $id=Session::get('id');
        $league =League::find($request->get('id'));
        $league->from_date   = $request->get('fromDate');
        $league->to_date   = $request->get('toDate');
        $league->save();
        $message = "successfully Postponted";
        $url = '/future-leagues/data';
        $league = $league->id;
        
        return response()->json([
            'url' => $url,
            'message' => $message,
            'league'=>$league,
        ]); 
    }
    public function Mail(Request $request,$id){
        ini_set('max_execution_time', '0');

        $league =League::find($request->get('id'));

        $general = generalSetting::first();
        $organization=$league->organization;
        $userEmails=array();
        $clubAdminEmails=array();
        $starterEmails=array();
        $judgeEmails=array();
        foreach ($league->registrations as $registration) {   
            if($registration->user->email!=null){   
                $userEmails[]=$registration->user->email;
                
        }
        }

        $club_admins=User::Role(['ClubAdmin'])->wherehas('club',function($q) use($league){
            $q->wherehas('groupRegistrations',function($q) use($league){
                $q->where('league_id',$league->id);
            });
        })->get();
        foreach ($club_admins as $user) {   
            if($user!=null){    
                if($user->email!=null){    
                    $clubAdminEmails[]=$user->email;       
        
          
        }
        }
        }
      
    $userEmails=$userEmails;
    $org=$league->organization;
    
    $details = [
        'userEmails' => $userEmails,
        'clubAdminEmails'=>$clubAdminEmails,
        'org'=>$org,
        'league'=>$league,
        'general'=>$general
    ];
    
    $job = (new \App\Jobs\SendQueueEmail($details))
            ->delay(now()->addSeconds(2)); 
    dispatch($job);    
     
    }
    public function CancellLeague(Request $request,$id)
    {

        $league =League::find($id);

        $organization=$league->organization;

        $club_admins=User::Role(['ClubAdmin'])->wherehas('club',function($q) use($league){
            $q->wherehas('groupRegistrations',function($q) use($league){
                $q->where('league_id',$league->id);
            });
        })->get();
      
        Session::put('league',$league);
        Session::put('organization',$league->organization);
        Session::put('RegistrationUsers',$league->registrations);
        Session::put('club_admins',$club_admins);

        $events=$league->events;
        foreach ($events as $key => $event) {
        foreach ($event->ageGroups as $key => $ageGroup) {
            $AgeGroupEvents=AgeGroupEvent::where('event_id',$event->id)->get();
            foreach ($AgeGroupEvents as $key => $AgeGroupEvent) {
            foreach ($AgeGroupEvent->ageGroupGenders->where('age_group_event_id', $AgeGroupEvent->id) as $key => $ageGroupGender) {
            $ageGroupGender->users()->detach();
            $ageGroupGender->teams()->detach();
            foreach ($event->groupRegistrations as $key => $groupRegistration) {
            $groupRegistration->teams()->detach();
            $groupRegistration->delete();
        }
            $ageGroupGender->delete();
            }
            }
        }
        $event->ageGroups()->detach();
        $event->registrations()->detach();
        $event->delete();
        }
        foreach($league->marathonPoints as $marathonPoint){
            $marathonPoint->delete();
        } 
        foreach($league->registrations as $registration){
            $registration->events()->detach();
            $registration->delete();
        } 
       $league->delete();
       $league=Session::get('league');

       $message = "successfully Deleted";
       $url = '/future-leagues/data';
       return response()->json([
           'url' => $url,
           'message' => $message,
           'league'=>$league,
       ]);
    }
    public function MailLeagueDelete(Request $request,$id)
    {
        ini_set('max_execution_time', '0');
        $general = generalSetting::first();
        $league=Session::get('league');
        $organization=Session::get('organization');
        $RegistrationUsers=Session::get('RegistrationUsers');
        $club_admins=Session::get('club_admins');

        foreach ($RegistrationUsers as $registration) {   
            if($registration->user->email!=null){   
                $userEmails[]=$registration->user->email;
                
        }
        }

      
        foreach ($club_admins as $user) {   
            if($user!=null){    
                if($user->email!=null){    
                    $clubAdminEmails[]=$user->email;       
        
          
        }
        }
        }
        $details = [
            'userEmails' => $userEmails,
            'clubAdminEmails'=>$clubAdminEmails,
            'org'=>$organization,
            'league'=>$league,
            'general'=>$general
        ];
        $job = (new \App\Jobs\LeagueCancelMailSend($details))
        ->delay(now()->addSeconds(2)); 
        dispatch($job);  
     
    $message = "Send Mail to all Users Dependent on  $league->name";
   
    return response()->json([
        'message' => $message,
    ]); 
    }
}