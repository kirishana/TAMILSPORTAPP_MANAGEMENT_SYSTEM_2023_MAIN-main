<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AgeGroup;
use App\Models\Gender;
use App\Models\Team;
use App\Models\Club;
use App\Models\League;
use App\generalSetting;
use Auth;
use App\User;
use Carbon\Carbon;
use Session;
use DB;
use Illuminate\Support\Facades\Validator;

class TeamsController extends Controller
{
    /**pweb
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function clubTeams(){
        Session::forget('ageGroup');
        Session::forget('gender');
        $clubs=Club::where('is_approved',1)->get();
        $club1=null;
        $cl=Session::put('cl',$club1);
        $teams=0;
        $team=null;
        $clubId=null;
        $leagues=League::where('to_date','>=',Carbon::now()->format('Y-m-d'))->get();
        $futureEvents=null;
        $leagueEvents = League::where('to_date', '>', Carbon::now())->where('from_date', '<', Carbon::now())->orwhere('from_date', '>', Carbon::now())->get();
$users=null;
        return view('admin.clubTeams.index',compact('users','leagueEvents','clubs','club1','teams','team','clubId','leagues','futureEvents'));
    }
    public function filter($id){
        $club=Club::find($id);
        $team=null;
        $general = generalSetting::first();
        $adminheader = $general->header;
        Session::put('clubId', $id);
        $teams = Team::with('users')->where('club_id', $club->id)->where('status',1)->get();
        $users = User::where('club_id', $club->id)->where('is_approved',1)->get();
        // dd($users);
        $genders=Gender::all();
        $ages=AgeGroup::orderBy('name','asc')->groupBy('name')->get();
        $ageGroup=array();
        foreach($ages as $age){
            foreach($age->events as $event){
                if($event->mainEvent->event_category_id==3){
                    $ageGroup[]=$age;
                }
            }
        }
        $ageGroups=array_unique($ageGroup);
        $club1="hi";
        $cl=Session::put('cl',$club1);
        $leagues=League::where('to_date','>=',Carbon::now()->format('Y-m-d'))->where('organization_id',Auth::user()->organization_id)->get();

        $futureEvents=null;
        $leagueEvents = League::where('to_date', '>', Carbon::now())->where('from_date', '<', Carbon::now())->orwhere('from_date', '>', Carbon::now())->get();
        return response()->json([
        'html'=>view('admin.clubTeams.teams', compact('teams', 'users','team','genders','ageGroups','club','club1','futureEvents'))->render(),
        'html2'=>view('admin.clubTeams.registeredEvents', compact('leagueEvents', 'id','club1'))->render(),
        'html3'=>view('admin.clubTeams.reg', compact('futureEvents', 'id','club1','leagues'))->render()

        ]);
    }
    public function pagination(Request $request)
    {
            $teams = Team::with('users')->where('club_id', Auth::user()->club_id)->where('status',1)->paginate(10);
			$view= view('teams.teamsTable', compact('teams'))->render();
			return response()->json([
				'html' => $view,
			]);
    }
    public function index(Request $request)
    {
        Session::forget('ageGroup');
        Session::forget('gender');
        $users = User::where('club_id',Auth::user()->club_id)->where('is_approved',1)->get();
        $team=null;
        $teams = Team::with('users')->where('club_id', Auth::user()->club_id)->where('status',1)->paginate(10);
       
        $genders=Gender::all();
        $ages=AgeGroup::orderBy('name','asc')->groupBy('name')->get();
        $ageGroup=array();
        foreach($ages as $age){
            foreach($age->events as $event){
                if($event->mainEvent->event_category_id==3){
                    $ageGroup[]=$age;
                }
            }
        }
        $ageGroups=array_unique($ageGroup);
        return view('teams.create', compact('teams', 'users','team','genders','ageGroups'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::where('club_id', Auth::user()->club_id)->where('is_approved',1)->get();
        $team=null;
        $genders=Gender::all();
        $ageGroups=AgeGroup::distinct('name')->get();
        $teams = Team::with('users')->where('club_id', Auth::user()->club_id)->where('status',1)->get();
        return view('teams.create', compact('users', 'teams','team','genders','ageGroups'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->input('club')){
        $team = new Team();
        $team->club_id = $request->input('club');
        $team->name = $request->input('name');
        $team->age_group_id=$request->input('ageGroup');
        $team->gender_id=$request->input('genders');
        $team->status=1;
        $team->save();
        $team->users()->attach($request->input('members'));
        
        $clubId=$request->input('club');
        $clubs=Club::where('is_approved',1)->get();
        $club1=null;
        $teams=0;
        $team=null;
        $leagues=League::where('to_date','>=',Carbon::now()->format('Y-m-d'))->get();
$futureEvents=null;
$leagueEvents = League::where('to_date', '>', Carbon::now())->where('from_date', '<', Carbon::now())->orwhere('from_date', '>', Carbon::now())->get();

        return view('admin.clubTeams.index',compact('leagueEvents','futureEvents','clubs','club1','teams','team','clubId','leagues'));
              }else{
            $validator = Validator::make(
                $request->all(),
                [
                    'name'                      =>'required',
                    'ageGroup'                  => 'required',
                    'genders'                  => 'required',
                
                ],
                

               
                [
                    'name.required' => 'Team name is required',
                    'ageGroup.required' => 'Select the AgeGroup',
                    'genders.required' => 'Select the Gender',
                 
    
    
                ]
    
            );
            // dd($validator);

            if ($validator->fails()) {
               
                    return redirect('/teams')->withErrors($validator)->withInput();
                
            }
        $team = new Team();
        $team->club_id = Auth::user()->club_id;
        $team->name = $request->input('name');
        $team->age_group_id=$request->input('ageGroup');
        $team->gender_id=$request->input('genders');
        $team->status=1;
        $team->save();
        $team->users()->attach($request->input('members'));
        return redirect("/teams");
    }
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
        $team = Team::with('users')->find($id);
        $clubUsers = User::where('club_id', $team->club_id)->where('is_approved',1)->get();
        $teams = Team::with('users')->where('club_id', $team->club_id)->where('status',1)->paginate(10);
        $users=array();
        foreach($clubUsers as $clubUser){
            $gener=$clubUser->gender == 'male' ? 1 : 2;
            $today=Carbon::now()->format('Y');
            $year= Carbon::createFromFormat('Y-m-d', $clubUser->dob)->format('Y');
            $age=$today-$year;
            $exp = preg_split("/-/", $team->ageGroup->name);

            if (isset($exp[1])) {
                if (($exp[0] < $age) && ($exp[1] == $age || $exp[1] > $age)) {
                    if($team->gender->id==$gener){
                $users[]=$clubUser;
            }
        }
        }
        if ($exp[0] == $age) {
            if($team->gender->id==$gener){
    
            $users[]=$clubUser;
            }
        }
    }
  $count=count($team->groupRegistrations);
    
        $genders=Gender::all();
        $ages=AgeGroup::orderBy('name','asc')->groupBy('name')->get();
        $ageGroup=array();
        foreach($ages as $age){
            foreach($age->events as $event){
                if($event->mainEvent->event_category_id==3){
                    $ageGroup[]=$age;
                }
            }
        }
        $ageGroups=array_unique($ageGroup); 
       if(Auth::user()->hasRole(2)){
        $club1="hi";
        $clubs=Club::where('is_approved',1)->get();
$leagues=League::all();
$clubId=$team->club_id;
$futureEvents=null;
$users=$team->users;
$leagueEvents = League::where('to_date', '>', Carbon::now())->where('from_date', '<', Carbon::now())->orwhere('from_date', '>', Carbon::now())->get();
return response()->json([
    'team' => $team,
    'users' => $users,
    'id'=>$id,
    'count'=>$count
]);
       }else{
       
        return view('teams.create', compact('users', 'teams','team','genders','ageGroups'));
       }

        
    }
    public function updateTeam(Request $request, $id)
    {

        $team=Team::find($id);
        $team->name = $request->input('name');
        $team->age_group_id = $request->input('ageGroup');
        $team->gender_id = $request->input('gender');

        $team->save();
        if($request->input('members')){
        $team->users()->detach();
        $team->users()->attach($request->input('members'));
        }
        $club=Club::find($team->club_id);
        $teams = Team::with('users')->where('club_id', $club->id)->where('status',1)->get();
        $users = User::where('club_id', $club->id)->where('is_approved',1)->get();
        $genders=Gender::all();
        $ages=AgeGroup::orderBy('name','asc')->groupBy('name')->get();
        $ageGroup=array();
        foreach($ages as $age){
            foreach($age->events as $event){
                if($event->mainEvent->event_category_id==3){
                    $ageGroup[]=$age;
                }
            }
        }
        $ageGroups=array_unique($ageGroup);
        $club1="hi";
        $clubId=$club->id;
        $futureEvents="hello";
        $leagueEvents = League::where('to_date', '>', Carbon::now())->where('from_date', '<', Carbon::now())->orwhere('from_date', '>', Carbon::now())->get();
        $clubs=Club::where('is_approved',1)->get();
        $leagues=League::where('to_date','>=',Carbon::now()->format('Y-m-d'))->get();
        return response()->json([
'html'=>view('admin.clubTeams.teams', compact('leagueEvents','leagues','clubs','clubId','teams', 'users','team','genders','ageGroups','club','club1','futureEvents'))->render()
 ]);
    }
    public function update(Request $request, $id)
    {
        $team=Team::find($id);
        $team->club_id = Auth::user()->club_id;
        $team->name = $request->input('name');
        $team->save();
        $team->users()->detach();
        $team->users()->attach($request->input('members'));
        return redirect("/teams");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function ageGroup(Request $request ,$id)
    {
        $ageGroup=AgeGroup::find($request->input('age'));
        Session::put('ageGroup',$ageGroup);
        $gender=Session::get('gender');
        if($request->get('club')){
            $teams = Team::with('users')->where('club_id', $request->get('club'))->get();
    
            $clubUsers=User::where('club_id',$request->get('club'))->get();
        }else{
            $teams = Team::with('users')->where('club_id', Auth::user()->club_id)->get();
    
            $clubUsers=User::where('club_id',Auth::user()->club_id)->get();
        }
        $userLists=array();
                foreach($clubUsers as $clubUser){
                    $gener=$clubUser->gender == 'male' ? 1 : 2;

            $today=Carbon::now()->format('Y');
            $year= Carbon::createFromFormat('Y-m-d', $clubUser->dob)->format('Y');
            $age=$today-$year;
            $exp = preg_split("/-/", $ageGroup->name);
            if (isset($exp[1])) {
                if (($exp[0] < $age) && ($exp[1] == $age || $exp[1] > $age)) {
                    if($gender){
                        if($gender==$gener){
                            $userLists[]=$clubUser;
                        }
                        }else{
                            $userLists[]=$clubUser;

                        }
            }
        }
        if ($exp[0] == $age) {
            if($gender){
                if($gender==$gener){
                    $userLists[]=$clubUser;
                }
                }else{
                    $userLists[]=$clubUser;

                }        
            }
    }
//     $teams=DB::table('team_users')->get();
// $teamsUsers=array();
// foreach($teams as $team){
//     $teamsUsers[]=$team->user_id;
// }
// $users2=array();
// foreach($userLists as $user){
//     if(!in_array($user->id,$teamsUsers)){
//         $users2[]=$user->id;
//     }
// }
// $users=array();
// foreach($users2 as $user){
//     $users[]=User::find($user);
// }
        return response()->json([
            'users' => $userLists
        ]);
        
    
    // dd($users)
}

//gender
public function gender(Request $request ,$id)
{
    Session::put('gender',$request->input('gender'));
    $ageGroup=Session::get('ageGroup');
    
    if($request->input('club')){
        $teams = Team::with('users')->where('club_id', $request->input('club'))->get();

        $clubUsers=User::where('club_id',$request->input('club'))->get();
    }else{
        $teams = Team::with('users')->where('club_id', Auth::user()->club_id)->get();

        $clubUsers=User::where('club_id',Auth::user()->club_id)->get();
    }
   
    
    $userLists=array();
    
    foreach($clubUsers as $clubUser){
        $gener=$clubUser->gender == 'male' ? 1 : 2;

        $today=Carbon::now()->format('Y');
        $year= Carbon::createFromFormat('Y-m-d', $clubUser->dob)->format('Y');
        $age=$today-$year;
        $exp = preg_split("/-/", $ageGroup->name);
        if (isset($exp[1])) {
            if (($exp[0] < $age) && ($exp[1] == $age || $exp[1] > $age)) {
                if($request->input('gender')==$gener){                   
            $userLists[]=$clubUser;
        }
    }
    }
    if ($exp[0] == $age) {
        if($request->input('gender')==$gener){
        $userLists[]=$clubUser;
        }
    }
}
    return response()->json([
        'users' => $userLists
    ]);
}
 public function delete($id)
{
        if(Auth::user()->hasRole(2)){
           
            $genders=Gender::all();
            $ages=AgeGroup::orderBy('name','asc')->groupBy('name')->get();
            $ageGroup=array();
            foreach($ages as $age){
                foreach($age->events as $event){
                    if($event->mainEvent->event_category_id==3){
                        $ageGroup[]=$age;
                    }
                }
            }
            $ageGroups=array_unique($ageGroup);
            $club1="hi";
            $futureEvents="hello";
            $leagueEvents = League::where('to_date', '>', Carbon::now())->where('from_date', '<', Carbon::now())->orwhere('from_date', '>', Carbon::now())->get();
            $clubs=Club::where('is_approved',1)->get();
            $leagues=League::where('to_date','>=',Carbon::now()->format('Y-m-d'))->get();
            $team=Team::find($id);
            $club=Club::find($team->club_id);
            $clubId=$club->id;
            $teams = Team::with('users')->where('club_id', $club->id)->where('status',1)->get();
            $users = User::where('club_id', $club->id)->where('is_approved',1)->get();

            if($team->groupRegistrations->count()>0){
                $team->save();
                return response()->json([
                    'deleted' => "nodelete",
                    'html'=>view('admin.clubTeams.teams', compact('leagueEvents','leagues','clubs','clubId','teams', 'users','team','genders','ageGroups','club','club1','futureEvents'))->render()

                ]);
            }
            else{
                $team->status=2;
                $team->name="Deleted team";
                $team->save();
             $team->users()->detach();
             return response()->json([
                'deleted' => "deleted",
                'html'=>view('admin.clubTeams.teams', compact('leagueEvents','leagues','clubs','clubId','teams', 'users','team','genders','ageGroups','club','club1','futureEvents'))->render()

            ]);
            }
           
        }else{

            $team=Team::find($id);
            $club=Club::find($team->club_id);
            $clubId=$club->id;
            $teams = Team::with('users')->where('club_id', $club->id)->where('status',1)->paginate(10);
            if($team->groupRegistrations->count()>0){
                $team->save();
                return response()->json([
                    'deleted' => "nodelete"
                ]);
            }
            else{
                $team->status=2;
                $team->name="Deleted team";
                $team->save();
             $team->users()->detach();
             $view= view('teams.teamsTable', compact('teams'))->render();

             return response()->json([
                'deleted' => "deleted",
                // 'html'=>$view
            ]);
            }
        }       
    }
}
