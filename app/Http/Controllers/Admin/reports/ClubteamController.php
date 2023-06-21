<?php


namespace App\Http\Controllers\Admin\reports;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Gender;
use App\Models\AgeGroup;
use App\Models\MainEvent;
use App\Models\Team;
use Auth;
use App\User;
use App\Models\GroupRegistration;
use App\Models\Registration;
use App\generalSetting;
use Carbon\Carbon as Carbon;
use App\Models\League;
use App\Models\Club;
use App\Models\Organization;
use Session;
use PDF;
use Excel;
use App\Exports\ClubTeamExport;
use App\Exports\ClubEveantExport;
use App\Exports\IndividualRegistrationClubExport;
use App\Exports\IndividualclubRegExport;



class ClubteamController extends Controller
{
    
    public function index()
    {
        Session::forget('c-teamsCategories');
        $general = generalSetting::first();
        $adminheader = $general->header;
        $users = User::where('club_id', Auth::user()->club_id)->get();
        $teams =Team::with('users')->where('club_id', Auth::user()->club_id)->where('status',1)->get();
        $genders=Gender::all();
        $ageGroups=AgeGroup::all();
        return view('admin.reports.clubteam.index', compact('genders','general','ageGroups','teams','users','adminheader'));
    }
    public function filter(Request $request)
    {
        $id = Session::get('id');
        $users = User::where('club_id', Auth::user()->club_id)->get();
        $genders=Gender::all();
        $ageGroups=AgeGroup::all();
        $general = generalSetting::first();
        $adminheader = $general->header;
        $teams = Team::with('users')->where('club_id', Auth::user()->club_id)->where('status',1);
        $categories = $request->input('obj');
        Session::put('c-teamsCategories', $categories);
        if ($categories) {
        foreach ($categories as $key => $values) {
            if ($key == "t_name") {
                if($values!=null){
                    $teams=$teams->where('name', 'like', '%' . $values. '%');
                }
            }elseif ($key == "p_name") {
                if($values!=null){
                    $teams=$teams->wherehas('users',function($query) use($values) {
                        $query->where('first_name','like', '%' . $values. '%');
                    });
                }
            }elseif ($key == "gender") {
                if($values!=0){
                    $teams->wherehas('gender',function($query) use($values) {
                        $query->where('id',$values);
                    });
                }
            }elseif ($key == "age") {
                if($values!=0){
                    $teams->wherehas('ageGroup',function($query) use($values) {
                        $query->where('id',$values);
                    });
                }
            } 
        }
    }else{
        $teams = Team::with('users')->where('club_id', Auth::user()->club_id)->where('status',1);

    }
    $teams=$teams->get();

        $view = view('admin.reports.clubteam.clubteam_table', compact( 'teams','users','genders','ageGroups'))->render();
        $view1 = view('admin.reports.clubteam.clubteam_excel_table', compact( 'teams','users','genders','ageGroups'))->render();
        $view2 = view('admin.reports.clubteam.clubteam_table_filter', compact( 'teams','users','genders','ageGroups','general','adminheader'))->render();
        return response()->json(['html' => $view,'html2' => $view2,'html1' => $view1]);
}
public function generatePdf(Request $request)
{
    $id = Session::get('id');
    $general = generalSetting::first();
    $adminheader = $general->header;
    $teams = Team::with('users')->where('club_id', Auth::user()->club_id)->where('status',1);
    $users=User::where('club_id', Auth::user()->club_id);
    $categories=Session::get('c-teamsCategories');

    if ($categories) {
        foreach ($categories as $key => $values) {
            if ($key == "t_name") {
                if($values!=null){
                    $teams=$teams->where('name', 'like', '%' . $values. '%');
                }
            }elseif ($key == "p_name") {
                if($values!=null){
                    $teams=$teams->wherehas('users',function($query) use($values) {
                        $query->where('first_name','like', '%' . $values. '%');
                    });
                }
            }elseif ($key == "gender") {
                if($values!=0){
                    $teams->wherehas('gender',function($query) use($values) {
                        $query->where('id',$values);
                    });
                }
            }elseif ($key == "age") {
                if($values!=0){
                    $teams->wherehas('ageGroup',function($query) use($values) {
                        $query->where('id',$values);
                    });
                }
            } 
        }
    }else{
        $teams = Team::with('users')->where('club_id', Auth::user()->club_id)->where('status',1);

    }
            $teams=$teams->get();

    $pdf = app('dompdf.wrapper');
    $pdf->getDomPDF()->set_option("enable_php", true);
    $pdf = PDF::loadView('admin.reports.clubteam.clubteam_table_pdf', compact('general','users','teams','adminheader'))->setPaper('a4', 'portrait');
    return $pdf->stream('Club Team.pdf');
}


public function Excel()
    {
        $id = Session::get('id');
        $categories = Session::get('c-teamsCategories');
        return Excel::download(new ClubTeamExport($categories,$id), 'clubTeams.xlsx');
    }
    
    // -------------------------------------



    public function clubevents()
    {
        Session::forget('categories');
        Session::forget('categoriesclub');
        $users = User::where('club_id', Auth::user()->club_id)->get();
        $general = generalSetting::first();
        $adminheader = $general->header;
        $teams = Team::with('users')->where('club_id', Auth::user()->club_id)->get();
        $genders=Gender::all();
        $ageGroups=AgeGroup::all();
        $group_registations=GroupRegistration::all();
        $leagues=League::all();
        $organizations=Organization::all();
        $events=MainEvent::all();
        $filter=null;
        $registations=Registration::where([['is_approved','=',1],['self_reg','=',1]])->distinct('user_id')->wherehas('user',function($q){
        $q->where('is_approved',1)->Where('club_id',Auth::user()->club_id);
    })->get();
    $clubregistations=Registration::where([['is_approved','=',1],['self_reg','=',0]])->distinct('user_id')->wherehas('user',function($q){
        $q->where('is_approved',1)->Where('club_id',Auth::user()->club_id);
    })->get();
        return view('admin.reports.clubteam.clubevents', compact('genders','general','adminheader','ageGroups','teams','users','group_registations','leagues','organizations','events','filter','registations','clubregistations'));
    }

    public function eventfilter(Request $request)
    
    {
        $id = Session::get('id');
        $genders=Gender::all();
        $ageGroups=AgeGroup::all();
        $organizations=Organization::all();
        $general = generalSetting::first();
        $adminheader = $general->header;
        $leagues=League::all();
        $group_registations=GroupRegistration::where('id','!=','null');
        $teams = Team::with('users')->where('club_id', Auth::user()->club_id);
        $categories = $request->input('obj');
        Session::put('c-teamsCategories', $categories);
        if ($categories) {
        foreach ($categories as $key => $values) {
            if ($key == "organization") {
                if($values!=0){
                    $group_registations->wherehas('organization',function($query) use($values) {
                        $query->where('id',$values);
                    });
                }
            }elseif ($key == "league") {
                if($values!=0){
                    $group_registations->wherehas('league',function($query) use($values) {
                        $query->where('id',$values);
                    });
                }
            }elseif ($key == "status") {
                if($values!=5){
                    $group_registations->wherehas('ageGroupGender',function($query) use($values) {
                        $query->where('status',$values);
                    });
                }
            } 
        }
    }else{
        $group_registations=GroupRegistration::with('club')->where('club_id',Auth::user()->club_id);

    }
    $group_registations=$group_registations->get();
        $view = view('admin.reports.clubteam.clubevents_filter', compact('group_registations'))->render();

        $view2 = view('admin.reports.clubteam.clubevents_print', compact(  'general','group_registations','adminheader'))->render();

        return response()->json(['html' => $view,'html2'=>$view2]);
}

public function eventgeneratePdf(Request $request)

{
    $id = Session::get('id');
    $general = generalSetting::first();
    $adminheader = $general->header;
    $users=User::where('club_id', Auth::user()->club_id);
    $genders=Gender::all();
    $ageGroups=AgeGroup::all();
    $organizations=Organization::all();
    $leagues=League::all();
    $group_registations=GroupRegistration::where('id','!=','null');
    $teams = Team::with('users')->where('club_id', Auth::user()->club_id);
    $categories=Session::get('c-teamsCategories');
    if ($categories) {
        foreach ($categories as $key => $values) {
            if ($key == "organization") {
                if($values!=0){
                    $group_registations->wherehas('organization',function($query) use($values) {
                        $query->where('id',$values);
                    });
                }
            }elseif ($key == "league") {
                if($values!=0){
                    $group_registations->wherehas('league',function($query) use($values) {
                        $query->where('id',$values);
                    });
                }
            }elseif ($key == "status") {
                if($values!=5){
                    $group_registations->wherehas('ageGroupGender',function($query) use($values) {
                        $query->where('status',$values);
                    });
                }
            } 
        }
    }else{
        $group_registations=GroupRegistration::with('club')->where('club_id',Auth::user()->club_id);

    }
    $group_registations=$group_registations->get();

    $pdf = PDF::loadView('admin.reports.clubteam.clubevents_table_pdf', compact('general','users','adminheader','group_registations'))->setPaper('a4', 'portrait');
    return $pdf->stream('Club Events.pdf');
}

public function eventExcel()
{

    $id = Session::get('id');    
    $categories = Session::get('c-teamsCategories');
    return Excel::download(new ClubEveantExport($categories,$id), 'clubEvents.xlsx');
}
public function individualevents()
{
    $general = generalSetting::first();
    $adminheader = $general->header;
    $users = User::where('club_id', Auth::user()->club_id)->get();
    $filter=null;
    $genders=Gender::all();
    $ageGroups=AgeGroup::all();
    $registations=Registration::where([['is_approved','=',1],['self_reg','=',1]])->distinct('user_id')->wherehas('user',function($q){
        $q->where('is_approved',1)->Where('club_id',Auth::user()->club_id);
    })->get();
    $clubregistations=Registration::where([['is_approved','=',1],['self_reg','=',0]])->distinct('user_id')->wherehas('user',function($q){
        $q->where('is_approved',1)->Where('club_id',Auth::user()->club_id);
    })->get();
    $leagues=League::all();
    $events=MainEvent::all();
    return view('admin.reports.clubteam.individualEvents', compact('general','genders','adminheader','clubregistations','ageGroups','users','registations','leagues','filter','events'));
}
public function individualeventfilter(Request $request)
{
    $general = generalSetting::first();
    $adminheader = $general->header;
    $categories = $request->input('obj');
    Session::put('categories', $categories);
    $filter=null;
        $registations=Registration::where([['is_approved','=',1],['self_reg','=',1]])->distinct('user_id')->wherehas('user',function($q){
            $q->where('is_approved',1)->Where('club_id',Auth::user()->club_id);
        });
    if ($categories) {
        foreach ($categories as $key => $values) {
            if ($key == "Gender") {
                if($values!=0){
                    $registations=$registations->where('gender',$values);
                }
            }
            elseif ($key == "League") {
                if($values!=0){
                    $registations=$registations->where('league_id',$values);
                }
            }
            elseif ($key == "Event") {
                if($values!=0){
                    $registations=$registations->whereHas('events',function($qu) use($values){
                        $qu->whereHas('mainEvent',function($qur) use($values) {
                            $qur->where('id','=',$values);
                        });
                    });
                    $filter=$values;
                }
            }
            elseif ($key == "name") {
                if($values!=null){
                    $registations=$registations->wherehas('user',function($q) use($values) {
                        $q->where('first_name', 'like', '%' . $values. '%')->orwhere('last_name', 'like', '%' . $values . '%');
                    });
                }
            }elseif ($key == "AgeGroup") {
                if($values!=0){
                    $exp = preg_split("/-/", $values);
                    $regist=Registration::where([['is_approved','=',1],['self_reg','=',1]])->distinct('user_id')->wherehas('user',function($q){
                        $q->where('is_approved',1)->where('club_id',Auth::user()->club_id);
                    })->get();
                    $userDobYear=array();

                    foreach($regist as $user){
                        $dob=$user->user->dob;
                        $mine = Carbon::createFromFormat('Y-m-d', $dob)->format('Y');
                        $today = Carbon::now()->format('Y');
                        $age = $today - $mine;
                            if(isset($exp[1])) {
                                if (($exp[0] < $age||$exp[0]==$age) && ($exp[1] == $age || $exp[1] > $age ) ) {
                                    // $userDobYear[]=$today-$age;
                                    $userDobYear[]=$user->user->dob;
                                }
                            }if($exp[0]==$age){
                                $userDobYear[]=$user->user->dob;
                            }
                           
                            
                }
                $registations=$registations->wherehas('user',function($q) use($userDobYear) {
                    $q->whereIn('dob',array_values($userDobYear));
                }); 
                }
                }
        }
    }
    else {

        $registations=Registration::where([['is_approved','=',1],['self_reg','=',1]])->distinct('user_id')->wherehas('user',function($q){
            $q->where('is_approved',1)->Where('club_id',Auth::user()->club_id);
        });
    }            
            
    $registations=$registations->orderBy('created_at','DESC')->get();  

        

    $view = view('admin.reports.clubteam.individualEventsFilter', compact('registations','filter'))->render();
    $view2 = view('admin.reports.clubteam.individualEvSelfRegisterPreview', compact('general','registations','adminheader','filter'))->render();

    return response()->json(['html' => $view,'html2' => $view2]);

  
}
public function individualeventPDF(Request $request)
{
    $general = generalSetting::first();
    $adminheader = $general->header;      
    $categories = Session::get('categories');
    $filter=null;
        $registations=Registration::where([['is_approved','=',1],['self_reg','=',1]])->distinct('user_id')->wherehas('user',function($q){
            $q->where('is_approved',1)->Where('club_id',Auth::user()->club_id);
        });
        if ($categories) {
            foreach ($categories as $key => $values) {
                if ($key == "Gender") {
                    if($values!=0){
                        $registations=$registations->where('gender',$values);
                    }
                }
                elseif ($key == "League") {
                    if($values!=0){
                        $registations=$registations->where('league_id',$values);
                    }
                }
                elseif ($key == "Event") {
                    if($values!=0){
                        $registations=$registations->whereHas('events',function($qu) use($values){
                            $qu->whereHas('mainEvent',function($qur) use($values) {
                                $qur->where('id','=',$values);
                            });
                        });
                        $filter=$values;
                    }
                }
                elseif ($key == "name") {
                    if($values!=null){
                        $registations=$registations->wherehas('user',function($q) use($values) {
                            $q->where('first_name', 'like', '%' . $values. '%')->orwhere('last_name', 'like', '%' . $values . '%');
                        });
                    }
                }elseif ($key == "AgeGroup") {
                    if($values!=0){
                        $exp = preg_split("/-/", $values);
                        $regist=Registration::where([['is_approved','=',1],['self_reg','=',1]])->distinct('user_id')->wherehas('user',function($q){
                            $q->where('is_approved',1)->where('club_id',Auth::user()->club_id);
                        })->get();
                        $userDobYear=array();
    
                        foreach($regist as $user){
                            $dob=$user->user->dob;
                            $mine = Carbon::createFromFormat('Y-m-d', $dob)->format('Y');
                            $today = Carbon::now()->format('Y');
                            $age = $today - $mine;
                                if(isset($exp[1])) {
                                    if (($exp[0] < $age||$exp[0]==$age) && ($exp[1] == $age || $exp[1] > $age ) ) {
                                        // $userDobYear[]=$today-$age;
                                        $userDobYear[]=$user->user->dob;
                                    }
                                }if($exp[0]==$age){
                                    $userDobYear[]=$user->user->dob;
                                }
                               
                                
                    }
                    $registations=$registations->wherehas('user',function($q) use($userDobYear) {
                        $q->whereIn('dob',array_values($userDobYear));
                    }); 
                    }
                    }
            }
        }
        else {
    
            $registations=Registration::where([['is_approved','=',1],['self_reg','=',1]])->distinct('user_id')->wherehas('user',function($q){
                $q->where('is_approved',1)->Where('club_id',Auth::user()->club_id);
            });
        }     
    $registations=$registations->orderBy('created_at','DESC')->get();  
    $pdf = PDF::loadView('admin.reports.clubteam.indEvSelfRegPdf', compact('general','registations','filter','adminheader'))->setPaper('a4', 'landscape');
    return $pdf->stream('IndividualEventsRegClubMembers.pdf');

  
}
public function individualeventexcel(Request $request)
    {
        $categories = Session::get('categories');
        $filter=null;
        return Excel::download(new IndividualRegistrationClubExport($categories,$filter), 'IndividualClubEvents.xlsx');
    }
public function individualeventclubRegfilter(Request $request)
{
    $general = generalSetting::first();
    $adminheader = $general->header;
    $categoriesclub = $request->input('obj');
    $filter=null;
    Session::put('categoriesclub', $categoriesclub);
        $clubregistations=Registration::where([['is_approved','=',1],['self_reg','=',0]])->distinct('user_id')->wherehas('user',function($q){
            $q->where('is_approved',1)->Where('club_id',Auth::user()->club_id);
        });
    if ($categoriesclub) {
        foreach ($categoriesclub as $key => $values) {
            if ($key == "Gender1") {
                if($values!=0){
                    $clubregistations=$clubregistations->where('gender',$values);
                }
            }
            elseif ($key == "League1") {
                if($values!=0){
                    $clubregistations=$clubregistations->where('league_id',$values);
                }
            }
            elseif ($key == "Event1") {
                if($values!=0){
                    $clubregistations=$clubregistations->whereHas('events',function($qu) use($values){
                        $qu->whereHas('mainEvent',function($qur) use($values) {
                            $qur->where('id','=',$values);
                        });
                    });
                    $filter=$values;
                }
            }
            elseif ($key == "userName") {
                if($values!=null){
                    $clubregistations=$clubregistations->wherehas('user',function($q) use($values) {
                        $q->where('first_name', 'like', '%' . $values. '%')->orwhere('last_name', 'like', '%' . $values. '%');
                    });
                }
            }elseif ($key == "AgeGroup1") {
                if($values!=0){
                    $exp = preg_split("/-/", $values);
                    $registration=Registration::where([['is_approved','=',1],['self_reg','=',0]])->distinct('user_id')->wherehas('user',function($q){
                        $q->where('is_approved',1)->where('club_id',Auth::user()->club_id);
                    })->get();
                    $userDobYear=array();
                    foreach($registration as $user){
                        $dob=$user->user->dob;
                        $mine = Carbon::createFromFormat('Y-m-d', $dob)->format('Y');
                        $today = Carbon::now()->format('Y');
                        $age = $today - $mine;
                            if(isset($exp[1])) {
                                if (($exp[0] < $age||$exp[0]==$age) && ($exp[1] == $age || $exp[1] > $age ) ) {
                                    $userDobYear[]=$user->user->dob;
                                   
                                }
                            }if($exp[0]==$age){
                                $userDobYear[]=$user->user->dob;

                            }
                            
                            
                }
                $clubregistations=$clubregistations->wherehas('user',function($q) use($userDobYear) {
                    $q->whereIn('dob',array_values($userDobYear));
                });
                }
            }
        }
    }
    else {

        $clubregistations=Registration::where([['is_approved','=',1],['self_reg','=',0]])->distinct('user_id')->wherehas('user',function($q){
            $q->where('is_approved',1)->Where('club_id',Auth::user()->club_id);
        });
    }            
            
    $clubregistations=$clubregistations->orderBy('created_at','DESC')->get();  

        

    $view = view('admin.reports.clubteam.individualClubRegFilter', compact('clubregistations','filter'))->render();
    $view2 = view('admin.reports.clubteam.individualClubRegPreview', compact('general','clubregistations','adminheader','filter'))->render();

    return response()->json(['html' => $view
    ,'html2' => $view2
]);

  
}
public function individualeventclubRegPDF(Request $request)
{
    $general = generalSetting::first();
    $adminheader = $general->header;
    $categoriesclub = Session::get('categoriesclub');
    $filter=null;
        $clubregistations=Registration::where([['is_approved','=',1],['self_reg','=',0]])->distinct('user_id')->wherehas('user',function($q){
            $q->where('is_approved',1)->Where('club_id',Auth::user()->club_id);
        });
        if ($categoriesclub) {
            foreach ($categoriesclub as $key => $values) {
                if ($key == "Gender1") {
                    if($values!=0){
                        $clubregistations=$clubregistations->where('gender',$values);
                    }
                }
                elseif ($key == "League1") {
                    if($values!=0){
                        $clubregistations=$clubregistations->where('league_id',$values);
                    }
                }
                elseif ($key == "Event1") {
                    if($values!=0){
                        $clubregistations=$clubregistations->whereHas('events',function($qu) use($values){
                            $qu->whereHas('mainEvent',function($qur) use($values) {
                                $qur->where('id','=',$values);
                            });
                        });
                        $filter=$values;
                    }
                }
                elseif ($key == "userName") {
                    if($values!=null){
                        $clubregistations=$clubregistations->wherehas('user',function($q) use($values) {
                            $q->where('first_name', 'like', '%' . $values. '%')->orwhere('last_name', 'like', '%' . $values. '%');
                        });
                    }
                }elseif ($key == "AgeGroup1") {
                    if($values!=0){
                        $exp = preg_split("/-/", $values);
                        $registration=Registration::where([['is_approved','=',1],['self_reg','=',0]])->distinct('user_id')->wherehas('user',function($q){
                            $q->where('is_approved',1)->where('club_id',Auth::user()->club_id);
                        })->get();
                        $userDobYear=array();
                        foreach($registration as $user){
                            $dob=$user->user->dob;
                            $mine = Carbon::createFromFormat('Y-m-d', $dob)->format('Y');
                            $today = Carbon::now()->format('Y');
                            $age = $today - $mine;
                                if(isset($exp[1])) {
                                    if (($exp[0] < $age||$exp[0]==$age) && ($exp[1] == $age || $exp[1] > $age ) ) {
                                        $userDobYear[]=$user->user->dob;
                                       
                                    }
                                }if($exp[0]==$age){
                                    $userDobYear[]=$user->user->dob;
    
                                }
                                
                                
                    }
                    $clubregistations=$clubregistations->wherehas('user',function($q) use($userDobYear) {
                        $q->whereIn('dob',array_values($userDobYear));
                    });
                    }
                }
            }
        }
        else {
    
            $clubregistations=Registration::where([['is_approved','=',1],['self_reg','=',0]])->distinct('user_id')->wherehas('user',function($q){
                $q->where('is_approved',1)->Where('club_id',Auth::user()->club_id);
            });
        }                          
    $clubregistations=$clubregistations->orderBy('created_at','DESC')->get();  
    $pdf = PDF::loadView('admin.reports.clubteam.indEvClubRegPdf', compact('general','clubregistations','adminheader','filter'))->setPaper('a4', 'landscape');
    return $pdf->stream('IndividualregBy_club.pdf');
}
public function individualeventclubRegexcel(Request $request)
    {        
        $categoriesclub = Session::get('categoriesclub');
        $filter=null;
        return Excel::download(new IndividualclubRegExport($categoriesclub,$filter), 'IndividualEventsRegByClub.xlsx');
    }
    
}


