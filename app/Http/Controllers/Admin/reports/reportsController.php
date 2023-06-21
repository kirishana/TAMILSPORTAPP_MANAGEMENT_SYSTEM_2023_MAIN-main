<?php

namespace App\Http\Controllers\Admin\reports;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\Controller;
use App\Models\Organization;
use App\Models\Club;
use App\Models\Country;
use App\Models\EventCategory;
use App\Models\MainEvent;
use App\Models\Event;
use App\User;
use App\Models\Team;
use App\Models\League;
use App\Models\AgeGroup;
use App\Models\AgeGroupGender;
use App\Models\AgeGroupEvent;
use App\Models\Gender;
use App\Models\Season;
use App\Models\Registration;
use App\Models\GroupRegistration;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\generalSetting;
use PDF;
use Auth;
use Session;
use Excel;
use App\Exports\ClubPoints;
use App\Exports\OrganizationsExport;
use App\Exports\ParticipantsExport;
use App\Exports\ParticipantPlayerExport;
use App\Exports\PaymentsExport;
use App\Exports\TeamExport;
use App\Exports\ClubsExport;
use App\Exports\GroupPaymentExport;
use App\Exports\ParticipantOverview;
use App\Exports\ClupTransactionExport;
use App\Exports\BriefInvoiceExport;
use App\Exports\InvoiceGroupExport;
use Illuminate\Support\Facades\Crypt;
use App\Models\OrganizationSetting;


class reportsController extends Controller
{
    public function organizations(Request $request)
    {
        $id = Session::get('id');
        $general = generalSetting::first();
        $adminheader =$general->header;
        $countries = Country::all();
        $seasons = Season::all();
        Session::forget('categories');

        if(Auth::user()->hasRole(1)){
            $organizations = Organization::where('country_id',Auth::user()->country_id)->get();

        }
        else{
            $organizations = Organization::all();

        }
        $general = generalSetting::first();
        $header = $general->header;
        if (request()->ajax()) {
            if (!empty($request->country)) {
                // dd($request->all());

                $data = Organization::with('country')->where('season_id', $request->season)
                    ->orwhere('country_id', $request->country)
                    ->get();
            } else {
                $data = Organization::with('country')->get();
            }
            return datatables()->of($data)->make(true);
        }
        return view('admin.reports.organizations', compact('organizations', 'countries', 'seasons', 'general','adminheader'));
    }
    function filter(Request $request)
    {
       
        $general = generalSetting::first();
        $adminheader =$general->header;
        $categories = $request->input('obj');
        Session::put('categories', $categories);
        if(Auth::user()->hasRole(1)){
            $organizations = Organization::where('country_id',Auth::user()->country_id);
            if($categories){
            foreach ($categories as $key => $values) {
                if ($key == "season") {
                    if($values!=0){
                     $organizations = $organizations->where('season_id', $values);

                    }
                }
                
            }
        }else{
            $organizations = Organization::where('country_id',Auth::user()->country_id);

        }
        }

        
        else{
            $organizations = Organization::whereNotNull('status');

            if($categories){
            foreach ($categories as $key => $values) {
                if ($key == "country") {
                    if($values!=0){
                        $organizations = $organizations->where('country_id', $values);
                    }
                } 
                elseif ($key == "season") {
                    if($values!=0){
                        $organizations = $organizations->where('season_id', $values);
                    }
                }
                elseif ($key == "name") {
                    if($values!=null){
                        $organizations = $organizations->where('name', 'like', '%' . $values. '%');
                    }
                } 
            }
        }else{
            $organizations = Organization::whereNotNull('status');

        }
        }
        $organizations = $organizations->get();


      
        $view = view('admin.reports.filterData', compact('organizations', 'general'))->render();
        $view2 = view('admin.reports.printPreview', compact('organizations', 'general', 'adminheader'))->render();

        return response()->json(['html' => $view]);
    }

    public function generatePDF(Request $request)
    {

        $countries = Country::all();
        $seasons = Season::all();
        $organizations = Organization::all();
        $general = generalSetting::first();
        $adminheader =$general->header;
        $categories = Session::get('categories');
        if(Auth::user()->hasRole(1)){
            $organizations = Organization::where('country_id',Auth::user()->country_id);
            if($categories){
            foreach ($categories as $key => $values) {
                if ($key == "season") {
                    if($values!=0){
                     $organizations = $organizations->where('season_id', $values);

                    }
                }
                
            }
        }else{
            $organizations = Organization::where('country_id',Auth::user()->country_id);

        }
        }

        
        else{
            $organizations = Organization::whereNotNull('status');

            if($categories){
            foreach ($categories as $key => $values) {
                if ($key == "country") {
                    if($values!=0){
                        $organizations = $organizations->where('country_id', $values);
                    }
                } 
                elseif ($key == "season") {
                    if($values!=0){
                        $organizations = $organizations->where('season_id', $values);
                    }
                }
                elseif ($key == "name") {
                    if($values!=null){
                        $organizations = $organizations->where('name', 'like', '%' . $values. '%');
                    }
                } 
            }
        }else{
            $organizations = Organization::whereNotNull('status');

        }
        }
        $organizations = $organizations->get();
        $pdf = app('dompdf.wrapper');
        $pdf->getDomPDF()->set_option("enable_php", true);
        $pdf = PDF::loadView('admin.reports.pdf', compact('organizations', 'general', 'adminheader'))->setPaper('a4', 'landscape');
        return $pdf->stream('Organizations.pdf');
    }
    public function Excel(Request $request)
    {
        $categories = Session::get('categories');       
        return Excel::download(new OrganizationsExport($categories), 'Organizations.xlsx');
    }
//club points
public function clubPoints(Request $request){
    $id=Session::get('id');
    $leagues=League::where('organization_id',Auth::user()->organization_id)->get();
    $league=null;
    $setting = OrganizationSetting::where('organization_id', Auth::user()->organization_id !== null ? Auth::user()->organization_id : $id)->first();
$header=$setting->header;
    return view('reports.clubPoints.index',compact('leagues','league','header','setting'));
}
public function clubPointsFilter(Request $request){
    $league=League::find($request->input('leagueData'));
    $leagueId=Session::put('leagueId',$request->input('leagueData'));
    $le=League::find($league->id);
            $events =$le->events ;
             $setting = OrganizationSetting::where('organization_id', Auth::user()->organization_id !== null ? Auth::user()->organization_id : $id)->first();
$header=$setting->header;
$setting = OrganizationSetting::where('organization_id', Auth::user()->organization_id !== null ? Auth::user()->organization_id : $id)->first();

   $view=view('reports.clubPoints.filter',compact('league','events','setting'))->render();
     $view1 = view('reports.clubPoints.print', compact('league', 'events','setting','header'))->render();
      

        return response()->json(['html' => $view,
        'html2'=>$view1
       

    ]);
}
public function clubPointsPdf(Request $request){
        $leagueId=Session::get('leagueId');
     $league=League::find($leagueId);
             $setting = OrganizationSetting::where('organization_id', Auth::user()->organization_id !== null ? Auth::user()->organization_id : $id)->first();
$header=$setting->header;
            $events =$league?$league->events:'' ;
     $pdf = app('dompdf.wrapper');
        $pdf->getDomPDF()->set_option("enable_php", true);
        $pdf = PDF::loadView('reports.clubPoints.pdf', compact('league', 'events','setting', 'header'))->setPaper('a4', 'landscape');
        return $pdf->stream('Clubs.pdf');
}
public function clubPointsExcel(Request $request){
    $leagueId=Session::get('leagueId');
         $league=League::find($leagueId);
            $events =$league?$league->events:'' ;

        return Excel::download(new ClubPoints($league, $events), 'ClubPoints.xlsx');
}
//end
    //clubs

    public function clubs(Request $request)
    {
        // dd('hi');

        $countries = Country::all();
        $organizations = Organization::all();
        $seasons = Season::all();
        $clubs = Club::where('is_approved', 1)->get();
        $general = generalSetting::first();
        $adminheader =$general->header;

        return view('admin.reports.clubs', compact('clubs', 'countries', 'seasons', 'general', 'adminheader', 'organizations'));
    }
    function filterClubs(Request $request)
    {
        $countries = Country::all();
        $seasons = Season::all();
        $organizations = Organization::all();
        $general = generalSetting::first();
        $adminheader =$general->header;
        $clubs = Club::where('is_approved', 1);
        $categories = $request->input('obj');
        Session::put('clubCategories', $categories);
        if($categories){
        foreach ($categories as $key => $values) {
            if ($key == "country") {
                if($values!=0){
                    $clubs = $clubs->where('country_id', $values);
                }
            } 
            
            elseif ($key == "name") {
                if($values!=null){
                    $clubs = $clubs->where('club_name', 'like', '%' . $values. '%');
                }
            } 
            
            elseif ($key == "season") {
                if($values!=0){
                    $clubs = $clubs->where('season_id', $values);
                }
            }
        }  
    }else{
        $clubs = Club::where('is_approved', 1);

    }
        $clubs = $clubs->get();
        $view = view('admin.reports.filterClubData', compact('clubs', 'countries', 'seasons', 'general'))->render();
        $view2 = view('admin.reports.printClubPreview', compact('clubs', 'countries', 'seasons', 'general', 'adminheader'))->render();

        return response()->json(['html' => $view]);
    }

    public function generateClubPdf(Request $request)
    {

        $countries = Country::all();
        $seasons = Season::all();
        $general = generalSetting::first();
        $adminheader =$general->header;
        $categories = Session::get('clubCategories');
        $clubs = Club::where('is_approved', 1);
        if($categories){
            foreach ($categories as $key => $values) {
                if ($key == "country") {
                    if($values!=0){
                        $clubs = $clubs->where('country_id', $values);
                    }
                } 
                
                elseif ($key == "name") {
                    if($values!=null){
                        $clubs = $clubs->where('club_name', 'like', '%' . $values. '%');
                    }
                } 
                
                elseif ($key == "season") {
                    if($values!=0){
                        $clubs = $clubs->where('season_id', $values);
                    }
                }
            }  
        }else{
            $clubs = Club::where('is_approved', 1);
    
        }

        $clubs = $clubs->get();
        $pdf = app('dompdf.wrapper');
        $pdf->getDomPDF()->set_option("enable_php", true);
        $pdf = PDF::loadView('admin.reports.clubPdf', compact('clubs', 'general', 'adminheader'))->setPaper('a4', 'landscape');
        return $pdf->stream('Clubs.pdf');
    }
    public function ClubExcel(Request $request)
    {
      
        $categories = Session::get('clubCategories');
        return Excel::download(new ClubsExport($categories), 'Clubs.xlsx');
    }
public function Participants()
    {
        $id = Session::get('id');
      
        $organizations=Organization::all();
        $users=User::all();
        if(Auth::user()->hasRole(7)){
            $list_main_events=MainEvent::all();
            $ageGroups=AgeGroup::all();
            $leagues=League::all();

        }else{
        Session::forget('participantCategories');

            $list_main_events=MainEvent::where('organization_id', Auth::user()->organization_id !== null ? Auth::user()->organization_id : $id)->get();
            $ageGroups=AgeGroup::where('organization_id', Auth::user()->organization_id !== null ? Auth::user()->organization_id : $id)->get();
            $leagues=League::where('organization_id', Auth::user()->organization_id !== null ? Auth::user()->organization_id : $id)->get();

        }
        $genders=Gender::all();
        $clubs=Club::where('is_approved',1)->get();
        $ageGroupGender=AgeGroupGender ::all();
        $events=Event::whereNotNull('id')->get();
        $general = generalSetting::first();
        $adminheader =$general->header;
        $userevents=Registration::where('user_id',Auth::user()->id)->get();
        $setting = OrganizationSetting::where('organization_id', Auth::user()->organization_id !== null ? Auth::user()->organization_id : $id)->first();
        $header = $setting ? $setting->header : '';
        $registrations = Registration::where([['organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id],['is_approved','=',1]])->distinct('user_id')->wherehas('user',function($q){
            $q->where('is_approved',1);
        })->get();
        $clubsteams = Club::where('is_approved',1)->get();
        $teams = Team::has('groupRegistrations','>',0)->get();
        $groupRegistrations =GroupRegistration::where('organization_id',Auth::user()->organization_id !== null ? Auth::user()->organization_id : $id)->get();
        $userregistrations = Registration::where('user_id', Auth::user()->id )->get();
       $filter=null;
        return view('admin.PDF.get_pdf_details',
        compact('list_main_events','genders','ageGroups','clubs','teams','clubsteams','adminheader','groupRegistrations','userregistrations','userevents','events','leagues','general','users','setting','header','organizations','registrations','filter'));

    }
    function Participantsfilter(Request $request)
    {
        if(Auth::user()->hasRole(7)){
            $id = Session::get('id');
            $filter=null;
            $general = generalSetting::first();
            $adminheader =$general->header;
            $organizations = Organization::all();
            $general = generalSetting::first();      
            $setting = OrganizationSetting::where('organization_id', Auth::user()->organization_id !== null ? Auth::user()->organization_id : $id)->first();
            $header = $setting ? $setting->header : '';
            $userregistrations = Registration::where('user_id', Auth::user()->id );
            $categories = $request->input('obj');
            Session::put('participantCategories', $categories);
            if ($categories) {
            foreach ($categories as $key => $values) {
                if ($key == "organization") {
                    if($values!=0){
                        $userregistrations=$userregistrations->whereHas('organization',function($qu) use($values){
                            $qu->where('id',$values);
                     });
                    }
                }
                elseif ($key == "league") {
                    if($values!=0){
                        $userregistrations=$userregistrations->where('league_id', $values); 

                    }
                }
                elseif ($key == "event") {
                    if($values!=0){
                                $filter=$values;
                    }else{
                                $filter=null;
                    }
                }
            }
        }
        else {
            $userregistrations = Registration::where('user_id', Auth::user()->id );
        }               
            $userregistrations=$userregistrations->get();
            $view = view('admin.PDF.participantsForPlayer', compact( 'organizations','general','userregistrations','filter','adminheader'))->render();
            $view2 = view('admin.PDF.PartForPlayerPrint', compact('organizations','general','header','userregistrations','setting','filter','adminheader'))->render();
            return response()->json(['html' => $view]);
        }else{
        $id = Session::get('id');
        $categories = $request->input('obj');
        Session::put('participantCategories', $categories);
        $eventname = $request->input('eventData');
        Session::put('eventname', $eventname);
        $organizations = Organization::all();
        $general = generalSetting::first();  
        $setting = OrganizationSetting::where('organization_id', Auth::user()->organization_id !== null ? Auth::user()->organization_id : $id)->first();
        $header = $setting ? $setting->header : '';
        $registrations = Registration::where([['organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id],['is_approved','=',1]])->wherehas('user',function($q){
            $q->where('is_approved',1);
        });
        $filter=null;
        if ($categories) {
        foreach ($categories as $key => $values) {
            if ($key == "gender") {
                if($values!=0){
                    $registrations =  $registrations->where('gender',$values);
                }
            } 
            elseif ($key == "name") {
                if($values!=null){
                    $registrations=$registrations->whereHas('user',function($q) use($values){
                        $q->where('first_name', 'like', '%' . $values. '%')
                        ->orwhere('last_name', 'like', '%' . $values. '%'); 
                        });                
                }
            }
            elseif ($key == "club") {
                if($values!=0){
                    $registrations=$registrations->whereHas('user',function($q) use($values){
                        $q->where('club_id',$values);
                    });          
                }
            }
            elseif ($key == "age_group") {
                if($values!=0){
                    $exp = preg_split("/-/", $values);
                    $regist=Registration::where([['organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id],['is_approved','=',1]])->wherehas('user',function($q){
                        $q->where('is_approved',1);
                    })->get();
                    $userDobYear=array();
                    foreach($regist as $user){
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
                $registrations=$registrations->wherehas('user',function($q) use($userDobYear) {
                    $q->whereIn('dob',array_values($userDobYear));
                });       
                }
            }
            elseif ($key == "league") {
                if($values!=0){
                    $registrations=$registrations->where('league_id', $values); 
                }
            }
            elseif ($key == "event") {
                if($values!=0){
                    $registrations=$registrations->whereHas('events',function($qu) use($values){
                        $qu->whereHas('mainEvent',function($qur) use($values) {
                            $qur->where('id','=',$values);
                        });
                    });
                        $filter=$values;
                }else{
                    $filter=null;
                }
            }
        }
    }
    else {
        $registrations = Registration::where([['organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id],['is_approved','=',1]])->wherehas('user',function($q){
            $q->where('is_approved',1);
        });
        }                 
        $registrations=$registrations->get();
        $view = view('admin.PDF.participants', compact( 'organizations','general','registrations','filter'))->render();
        $view2 = view('admin.PDF.participantsPreview', compact('organizations','general','header','registrations','setting','filter'))->render();
        return response()->json(['html' => $view]);
    }
  
    }

    public function generateParticipantsPdf(Request $request)
    {
        if(Auth::user()->hasRole(7)){
            $id = Session::get('id');
            $filter=null;
            $general = generalSetting::first();
            $adminheader =$general->header;
            $userregistrations = Registration::where('user_id', Auth::user()->id );
            $categories=Session::get('participantCategories');

            if ($categories) {
                foreach ($categories as $key => $values) {
                    if ($key == "organization") {
                        if($values!=0){
                            $userregistrations=$userregistrations->whereHas('organization',function($qu) use($values){
                                $qu->where('id',$values);
                         });
                        }
                    }
                    elseif ($key == "league") {
                        if($values!=0){
                            $userregistrations=$userregistrations->where('league_id', $values); 
    
                        }
                    }
                    elseif ($key == "event") {
                        if($values!=0){
                                    $filter=$values;
                        }else{
                                    $filter=null;
                        }
                    }
                }
            }
            else {
                $userregistrations = Registration::where('user_id', Auth::user()->id );
            }  
                
                $userregistrations=$userregistrations->get();
        
        $pdf = app('dompdf.wrapper');
        $pdf->getDomPDF()->set_option("enable_php", true);
        $pdf = PDF::loadView('admin.PDF.participantspdfForPlayer', compact('userregistrations','filter','adminheader','general'))->setPaper('a4', 'portrait');
        return $pdf->stream('Participants.pdf');

        
    }else{
        $id = Session::get('id');
        $setting = OrganizationSetting::where('organization_id', Auth::user()->organization_id !== null ? Auth::user()->organization_id : $id)->first();
        $header = $setting ? $setting->header : '';
        $general = generalSetting::first();
        $leagueTitle=null;
        $eventTitle=null;
        $AgeTitle=null;
        $GenTitle=null;
        $registrations = Registration::where([['organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id],['is_approved','=',1]])->wherehas('user',function($q){
            $q->where('is_approved',1);
        });
        $categories=Session::get('participantCategories');
        $filter=null;
        if ($categories) {
        foreach ($categories as $key => $values) {
            if ($key == "gender") {
                if($values!=0){
                    $registrations =  $registrations->where('gender',$values);
                    $GenTitle=Gender::where( 'id',$values)->first();
                }
            } 
            elseif ($key == "name") {
                if($values!=null){
                    $registrations=$registrations->whereHas('user',function($q) use($values){
                        $q->where('first_name', 'like', '%' . $values. '%')
                        ->orwhere('last_name', 'like', '%' . $values. '%'); 
                        });                
                }
            }
            elseif ($key == "club") {
                if($values!=0){
                    $registrations=$registrations->whereHas('user',function($q) use($values){
                        $q->where('club_id',$values);
                    });          
                }
            }
            elseif ($key == "age_group") {
                if($values!=0){
                    $exp = preg_split("/-/", $values);
                    $regist=Registration::where([['organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id],['is_approved','=',1]])->wherehas('user',function($q){
                        $q->where('is_approved',1);
                    })->get();
                    $userDobYear=array();
                    foreach($regist as $user){
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
                $registrations=$registrations->wherehas('user',function($q) use($userDobYear) {
                    $q->whereIn('dob',array_values($userDobYear));
                });       
                $AgeTitle=AgeGroup::where( 'id',$values)->first();
            }
            }
            elseif ($key == "league") {
                if($values!=0){
                    $registrations=$registrations->where('league_id', $values); 
                    $leagueTitle=League::where( 'id',$values)->first();
                }
            }
            elseif ($key == "event") {
                if($values!=0){
                    $registrations=$registrations->whereHas('events',function($qu) use($values){
                        $qu->whereHas('mainEvent',function($qur) use($values) {
                            $qur->where('id','=',$values);
                        });
                    });
                    $filter=$values;
                    $eventTitle=MainEvent::where( 'id',$values)->first();
                }else{
                    $filter=null;
                }
            }
        }
    }
    else {
        $registrations = Registration::where([['organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id],['is_approved','=',1]])->wherehas('user',function($q){
            $q->where('is_approved',1);
        });
        } 
        $registrations=$registrations->get();
        $pdf = app('dompdf.wrapper');
        $pdf->getDomPDF()->set_option("enable_php", true);
        $pdf = PDF::loadView('admin.PDF.participants_pdf', compact( 'general','header','registrations','leagueTitle','eventTitle','AgeTitle','GenTitle','setting','filter'))->setPaper('a4', 'landscape');
        return $pdf->stream('Participants.pdf');

    }
    }

    public function ParticipantsExcel(Request $request)
    {
        if(Auth::user()->hasRole(7)){
            $id = Session::get('id');       
            $categories = Session::get('participantCategories');
            return Excel::download(new ParticipantPlayerExport($categories,$id), 'Participants.xlsx');
        }
       
        $id = Session::get('id');       
        $categories = Session::get('participantCategories');
        return Excel::download(new ParticipantsExport($categories,$id), 'Participants.xlsx');
    }



    public function PaymentsRequest()
    {
        $id = Session::get('id');
        $setting = OrganizationSetting::where('organization_id', Auth::user()->organization_id !== null ? Auth::user()->organization_id : $id)->first();
        $header = $setting ? $setting->header : '';
        $registration=Registration::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->whereIn('status',[1,2,3])->wherehas('user',function($q){
                        $q->where('is_approved',1);
                    })->get();
        $groupregistration=GroupRegistration::where([['organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id],['status','!=',0]])->get();

        $leagues=League::all();
        $seasons=Season::all();

     return view('admin.reports.paymentsRequest',compact('registration','header','setting','leagues','seasons','groupregistration'));

    }

    
    public function PaymentsRequestFilter(Request $request)
    {

        $id = Session::get('id');
        $setting = OrganizationSetting::where('organization_id', Auth::user()->organization_id !== null ? Auth::user()->organization_id : $id)->first();
        $header = $setting ? $setting->header : '';
        $general = generalSetting::first();
$registration=Registration::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->whereIn('status',[1,2,3]);
$categories = $request->input('obj');
        Session::put('paymentCategories', $categories);

        if ($categories) {
        foreach ($categories as $key => $values) {
            if ($key == "player_name") {
                if($values!=null){
                    $registration=$registration->whereHas('user',function($query) use($values){
                        $query->where('first_name', 'like', '%' . $values. '%')
                        ->orwhere('last_name', 'like', '%' . $values. '%');

                    });
                }
            } 
            elseif ($key == "status") {
                if($values!=0){
                    $registration=$registration->where('status','=',$values); 
                }
            }

            elseif ($key == "season") {
                if($values!=0){
                    $registration=$registration->where('season_id',$values);
                }
            } 
            elseif ($key == "league") {
                if($values!=0){
                    $registration=$registration->where('league_id',$values);
                }
            } 
            elseif ($key == "membership") {
                if($values!=5){
                    $registration=$registration->wherehas('user',function($q) use($values){
                        $q->where('member_or_not',$values);
                    });
                }
            } 
            elseif ($key == "trans_id") {
                if($values!=null){
                    $registration=$registration->where('trans_id', 'like', '%' . $values. '%');
                }
            }
        }
    }else{
$registration=Registration::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->whereIn('status',[1,2,3]);

    }
        $registration=$registration->get();
        $view = view('admin.reports.paymentsfilter', compact( 'registration','general'))->render();
        $view2 = view('admin.reports.paymentsPreview', compact( 'registration','general','header','setting'))->render();
        return response()->json(['html' => $view]);
    }



    public function PaymentsRequestPdf(Request $request)
    {

        $id = Session::get('id');
        $setting = OrganizationSetting::where('organization_id', Auth::user()->organization_id !== null ? Auth::user()->organization_id : $id)->first();
        $header = $setting ? $setting->header : '';
        $general = generalSetting::first();
        $leagueTitle=null;
$registration=Registration::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->whereIn('status',[1,2,3]);
        $categories=Session::get('paymentCategories');
        if ($categories) {
            foreach ($categories as $key => $values) {
                if ($key == "player_name") {
                    if($values!=null){
                        $registration=$registration->whereHas('user',function($query) use($values){
                            $query->where('first_name', 'like', '%' . $values. '%')
                            ->orwhere('last_name', 'like', '%' . $values. '%');
    
                        });
                    }
                } 
                elseif ($key == "status") {
                    if($values!=0){
                        $registration=$registration->where('status','=',$values); 
                    }
                }
    
                elseif ($key == "season") {
                    if($values!=0){
                        $registration=$registration->where('season_id',$values);
                    }
                } 
                elseif ($key == "league") {
                    if($values!=0){
                        $registration=$registration->where('league_id',$values);
                        $leagueTitle=League::find($values);
                    }
                } 
                elseif ($key == "membership") {
                    if($values!=5){
                        $registration=$registration->wherehas('user',function($q) use($values){
                            $q->where('member_or_not',$values);
                        });
                    }
                } 
                elseif ($key == "trans_id") {
                    if($values!=null){
                        $registration=$registration->where('trans_id', 'like', '%' . $values. '%');
                    }
                }
            }
        }else{
    $registration=Registration::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->whereIn('status',[1,2,3]);
    
        }
                $registration=$registration->get();
                $pdf = app('dompdf.wrapper');
                $pdf->getDomPDF()->set_option("enable_php", true);
                $pdf = PDF::loadView('admin.reports.paymentsPdf', compact( 'general','header','leagueTitle','registration','setting'))->setPaper('a4', 'portrait');
                return $pdf->stream('Payment_Request');
    }


    public function PaymentsRequestExcel(Request $request)
    {
                $categories = Session::get('paymentCategories');
                $id = Session::get('id');
            return Excel::download(new PaymentsExport($categories,$id), 'PaymentsRequest.xlsx');
    }
    public function PaymentsRequestGFilter(Request $request)
    {

        $id = Session::get('id');
        $setting = OrganizationSetting::where('organization_id', Auth::user()->organization_id !== null ? Auth::user()->organization_id : $id)->first();
        $header = $setting ? $setting->header : '';
        $general = generalSetting::first();
        $groupregistration=GroupRegistration::where([['organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id],['status','!=',0]]);
       
        $categories = $request->input('obj');
        Session::put('G-paymentCategories', $categories);
        if ($categories) {
        foreach ($categories as $key => $values) {

            if ($key == "club_name") {
                if($values!=null){
                    $groupregistration=$groupregistration->whereHas('club',function($query) use($values){
                        $query->where('club_name', 'like', '%' . $values. '%');
                    });
                }
            } 
            elseif ($key == "G-status") {
                if($values!=0){
                    if($values=="3"){
                        $groupregistration=$groupregistration->where('status','=',4)->orwhere('status','=',3); 
                 }else{
                    $groupregistration=$groupregistration->where('status',$values);
                 }     
                }
            }

            elseif ($key == "G-season") {
                if($values!=0){
                    $groupregistration=$groupregistration->where('season_id',$values);
                }
            } 
            elseif ($key == "G-league") {
                if($values!=0){
                    $groupregistration=$groupregistration->where('league_id',$values);
                }
            } 
            elseif ($key == "G-trans_id") {
                if($values!=null){
                    $groupregistration=$groupregistration->where('trans_id', 'like', '%' . $values. '%');
                }
            }
        }
    }else{
        $groupregistration=GroupRegistration::where([['organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id],['status','!=',0]]);

    }
               
 
    $groupregistration=$groupregistration->get();
        
        $view = view('admin.reports.paymentsreqGroup', compact( 'groupregistration','general'))->render();
        $view2 = view('admin.reports.paymentsreqPreview', compact( 'groupregistration','general','header','setting'))->render();

        return response()->json(['html' => $view]);

    }
    public function PaymentsRequestGPdf(Request $request)
    {

        $id = Session::get('id');
        $setting = OrganizationSetting::where('organization_id', Auth::user()->organization_id !== null ? Auth::user()->organization_id : $id)->first();
        $header = $setting ? $setting->header : '';
        $general = generalSetting::first();
        $leagueTitle=null;
        $groupregistration=GroupRegistration::where([['organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id],['status','!=',0]]);

        $categories=Session::get('G-paymentCategories');
        if ($categories) {
            foreach ($categories as $key => $values) {
    
                if ($key == "club_name") {
                    if($values!=null){
                        $groupregistration=$groupregistration->whereHas('club',function($query) use($values){
                            $query->where('club_name', 'like', '%' . $values. '%');
                        });
                    }
                } 
                elseif ($key == "G-status") {
                    if($values!=0){
                        if($values=="3"){
                            $groupregistration=$groupregistration->where('status','=',4)->orwhere('status','=',3); 
                     }else{
                        $groupregistration=$groupregistration->where('status',$values);
                     }     
                    }
                }
    
                elseif ($key == "G-season") {
                    if($values!=0){
                        $groupregistration=$groupregistration->where('season_id',$values);
                    }
                } 
                elseif ($key == "G-league") {
                    if($values!=0){
                        $groupregistration=$groupregistration->where('league_id',$values);
                        $leagueTitle=League::find($values);

                    }
                } 
                elseif ($key == "G-trans_id") {
                    if($values!=null){
                        $groupregistration=$groupregistration->where('trans_id', 'like', '%' . $values. '%');
                    }
                }
            }
        }else{
            $groupregistration=GroupRegistration::where([['organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id],['status','!=',0]]);
    
        }
                $groupregistration=$groupregistration->get();
                $pdf = app('dompdf.wrapper');
                $pdf->getDomPDF()->set_option("enable_php", true);
                $pdf = PDF::loadView('admin.reports.G-paymentsPdf', compact( 'general','leagueTitle','header','groupregistration','setting'))->setPaper('a4', 'portrait');
                return $pdf->stream('Payment_Request_clubs');
    }
    public function G_PaymentsRequestExcel(Request $request)
    {
                $categories = Session::get('G-paymentCategories');
                $id = Session::get('id');
            return Excel::download(new GroupPaymentExport($categories,$id), 'PaymentsRequestGroup.xlsx');
    }
 
public function teamsearch(Request $request)
   {
    $id = Session::get('id');
    $filter=null;
    $setting = OrganizationSetting::where('organization_id', Auth::user()->organization_id !== null ? Auth::user()->organization_id : $id)->first();
    $header = $setting ? $setting->header : '';
    $categories12 = $request->input('obj');
    Session::put('categories12', $categories12);
    $groupRegistrations =GroupRegistration::where('organization_id',Auth::user()->organization_id !== null ? Auth::user()->organization_id : $id);
    if ($categories12) {

        foreach ($categories12 as $key => $values) {
            
            if ($key == "clubGroup") {
                if($values!=0){
                    $groupRegistrations=$groupRegistrations->where('club_id',$values);
                }
            } 
            elseif ($key == "leagueGroup") {
                if($values!=0){
                    $groupRegistrations=$groupRegistrations->where('league_id',$values);
                }
            } 
            elseif ($key == "eventGroup") {
                if($values!=0){
                    $groupRegistrations=$groupRegistrations->wherehas('ageGroupGender',function($q) use($values){
                        $q->wherehas('ageGroupEvent',function($q) use($values){
                        $q->wherehas('Event',function($q) use($values){
                            $q->where('main_event_id',$values);
                        });
                        });
                    });                
                }
            }
            elseif ($key == "age_groupGroup") {
                if($values!=0){
                    $groupRegistrations=$groupRegistrations->wherehas('ageGroupGender',function($q) use($values){
                        $q->wherehas('ageGroupEvent',function($q) use($values){
                            $q->where('age_group_id',$values);
                        });
                    });
                        }
            }
            elseif ($key == "genderGroup") {
                if($values!=0){
                    $groupRegistrations=$groupRegistrations->wherehas('ageGroupGender',function($q) use($values){
                        $q->where('gender_id',$values);
                });                
            }
            }

      
   }
   }else{
        $groupRegistrations =GroupRegistration::where('organization_id',Auth::user()->organization_id !== null ? Auth::user()->organization_id : $id);
    }
        $groupRegistrations=$groupRegistrations->get();
        $view = view('admin.PDF.teams', compact( 'header','groupRegistrations'))->render();
        $view2 = view('admin.PDF.TeamsPrint', compact( 'header','groupRegistrations'))->render();

        return response()->json(['html' => $view,'html2' => $view2]);
   }
   public function teamexport(Request $request)
   {
       $eventTitle=null;
       $leagueTitle=null;
       $AgeTitle=null;
       $GenTitle=null;
    $id = Session::get('id');
    $setting = OrganizationSetting::where('organization_id', Auth::user()->organization_id !== null ? Auth::user()->organization_id : $id)->first();
    $header = $setting ? $setting->header : '';
    $general = generalSetting::first();
    $categories12 = Session::get('categories12');
    $groupRegistrations =GroupRegistration::where('organization_id',Auth::user()->organization_id !== null ? Auth::user()->organization_id : $id);
    if ($categories12) {

        foreach ($categories12 as $key => $values) {
            
            if ($key == "clubGroup") {
                if($values!=0){
                    $groupRegistrations=$groupRegistrations->where('club_id',$values);
                }
            } 
            elseif ($key == "leagueGroup") {
                if($values!=0){
                    $groupRegistrations=$groupRegistrations->where('league_id',$values);
                    $leagueTitle=League::where( 'id',$values)->first();

                }
            } 
            elseif ($key == "eventGroup") {
                if($values!=0){
                    $groupRegistrations=$groupRegistrations->wherehas('ageGroupGender',function($q) use($values){
                        $q->wherehas('ageGroupEvent',function($q) use($values){
                        $q->wherehas('Event',function($q) use($values){
                            $q->where('main_event_id',$values);
                        });
                        });
                    });    
                    $eventTitle=MainEvent::where( 'id',$values)->first();
            
                }
            }
            elseif ($key == "age_groupGroup") {
                if($values!=0){
                    $groupRegistrations=$groupRegistrations->wherehas('ageGroupGender',function($q) use($values){
                        $q->wherehas('ageGroupEvent',function($q) use($values){
                            $q->where('age_group_id',$values);
                        });
                    });
                    $AgeTitle=AgeGroup::where( 'id',$values)->first();

                }
            }
            elseif ($key == "genderGroup") {
                if($values!=0){
                    $groupRegistrations=$groupRegistrations->wherehas('ageGroupGender',function($q) use($values){
                        $q->where('gender_id',$values);
                });   
                $GenTitle=Gender::where( 'id',$values)->first();
             
            }
            }

      
   }
   }else{
        $groupRegistrations =GroupRegistration::where('organization_id',Auth::user()->organization_id !== null ? Auth::user()->organization_id : $id);
    }
        $groupRegistrations=$groupRegistrations->get();
        $pdf = app('dompdf.wrapper');
        $pdf->getDomPDF()->set_option("enable_php", true);
        $pdf = PDF::loadView('admin.PDF.teamPDF', compact('eventTitle','AgeTitle','GenTitle','leagueTitle', 'general','header','groupRegistrations','setting'))->setPaper('a4', 'landscape');
        return $pdf->stream('Participate_Teams');
   }
   public function TeamExcel(Request $request)
   {
    $id = Session::get('id');
    $categories12 = Session::get('categories12');
    return Excel::download(new TeamExport($categories12,$id), 'Participate_Teams.xlsx');
   }
   public function ParticipantsOverview()
   {
       $id = Session::get('id');
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
       
       $genders=Gender::all();
       $clubs=Club::where('is_approved',1)->get();
       $ageGroupGender=AgeGroupGender ::all();
       $events=Event::whereNotNull('id')->get();
       $general = generalSetting::first();
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
       $clubsteams = Club::where('is_approved',1)->get();
       $teams = Team::has('groupRegistrations','>',0)->get();

       $users =User::Role('player')->where('organization_id', Auth::user()->organization_id )->get();
      $filter=null;
       return view('admin.PDF.ParticipantsOverView',
       compact('list_main_events','genders','ageGroups','clubs','teams','ageGroupnames','clubsteams','leagues1','userevents','events','ongngLeagues','general','users','setting','header','organizations','filter'));

   }
  public function ParticipantsOverviewSearch(Request $request)
   {
       $id=Session::get('id');
       $setting = OrganizationSetting::where('organization_id', Auth::user()->organization_id !== null ? Auth::user()->organization_id : $id)->first();
       $header = $setting ? $setting->header : '';
       $ongngLeaguesCount=League::where('to_date','>',Carbon::now())->where('from_date','<',Carbon::now())->where('organization_id',Auth::user()->organization_id?Auth::user()->organization_id:$id)->get();
       if(count($ongngLeaguesCount)>0){
           $ongngLeagues=League::where('to_date','>',Carbon::now())->where('from_date','<',Carbon::now())->where('organization_id',Auth::user()->organization_id?Auth::user()->organization_id:$id)->first();
       }else{
           $ongngLeagues=League::where('organization_id',Auth::user()->organization_id?Auth::user()->organization_id:$id)->orderBy('id','desc')->latest()->first();
       }
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
       Session::put('leagueid',$request->input('leagueData'));
       $view = view('admin.PDF.participantsOverviewfilter', compact( 'header','ageGroupnames','ongngLeagues'))->render();
       return response()->json(['html' => $view]);
   }
   public function ParticipantsOverviewexcel(Request $request)
   {
    $id = Session::get('id');
    $leaguesid =Session::get('leagueid');
           return Excel::download(new ParticipantOverview($leaguesid,$id), 'Participant_overview.xlsx');
   }
   public function Clubtransactions(Request $request)
   {
    $id = Session::get('id');
    Session::forget('leagueData1');

   $seasons=Season::all();
   $ongngLeaguesCount=League::where('to_date','>',Carbon::now())->where('from_date','<',Carbon::now())->where('organization_id',Auth::user()->organization_id?Auth::user()->organization_id:$id)->get();
   if(count($ongngLeaguesCount)>0){
       $league=League::where('to_date','>',Carbon::now())->where('from_date','<',Carbon::now())->where('organization_id',Auth::user()->organization_id?Auth::user()->organization_id:$id)->first();
   }else{
       $league=League::where('organization_id',Auth::user()->organization_id?Auth::user()->organization_id:$id)->orderBy('id','desc')->latest()->first();
   }
   $clubId=array();
   $clubId2=array();
   $clubs= DB::table('group_registrations')->where('league_id',$league?$league->id:'')
         ->join('clubs', 'group_registrations.club_id', '=', 'clubs.id')
         ->select('clubs.id')
         ->groupBy('clubs.id')->get();
         $clubs2= DB::table('registrations')->where('league_id',$league?$league->id:'')
         ->join('users', 'registrations.user_id', '=', 'users.id')
         ->join('clubs', 'users.club_id', '=', 'clubs.id')
         ->select('clubs.club_name','clubs.id')
         ->groupBy('clubs.id')->get();

         foreach($clubs as $club){
           $clubId[]=$club->id;
         }
         foreach($clubs2 as $club){
           $clubId2[]=$club->id;
         }
         $club=array_unique(array_merge($clubId, $clubId2));
         $registrations=Club::whereIn('id',$club)->get();

   $leagues =League::where('organization_id', Auth::user()->organization_id !== null ? Auth::user()->organization_id : $this->id)->get();
   $setting = OrganizationSetting::where('organization_id', Auth::user()->organization_id !== null ? Auth::user()->organization_id : $id)->first();
   $header = $setting ? $setting->header : '';
    // $registrations= DB::table('registrations')->where('league_id',$league->id)
    // ->join('users', 'registrations.user_id', '=', 'users.id')
    // ->join('clubs', 'users.club_id', '=', 'clubs.id')
    // ->select('clubs.club_name','clubs.id','registrations.league_id',DB::raw('sum(registrations.totalfee) AS total'))
    // ->groupBy('clubs.id','clubs.club_name')->get();
    return view('admin.reports.ClubTransactions',compact('seasons','registrations','leagues','league','league','setting','header'));
}
   public function clubTrans(Request $request)
   {
    $id = Session::get('id');
   $leagueData1=$request->get('leagueData1');
   Session::put('leagueData1', $leagueData1);

   $ongngLeaguesCount=League::where('to_date','>',Carbon::now())->where('from_date','<',Carbon::now())->where('organization_id',Auth::user()->organization_id?Auth::user()->organization_id:$id)->get();
   if(count($ongngLeaguesCount)>0){
       $league=League::where('to_date','>',Carbon::now())->where('from_date','<',Carbon::now())->where('organization_id',Auth::user()->organization_id?Auth::user()->organization_id:$id)->first();
   }else{
       $league=League::where('organization_id',Auth::user()->organization_id?Auth::user()->organization_id:$id)->orderBy('id','desc')->latest()->first();
   }
   $setting = OrganizationSetting::where('organization_id', Auth::user()->organization_id !== null ? Auth::user()->organization_id : $id)->first();
   $header = $setting ? $setting->header : '';

  
   if($leagueData1!=null){
    $league=League::find($leagueData1);

    $clubId=array();
   $clubId2=array();
   $clubs= DB::table('group_registrations')->where('league_id',$league->id)
         ->join('clubs', 'group_registrations.club_id', '=', 'clubs.id')
         ->select('clubs.id')
         ->groupBy('clubs.id')->get();
         $clubs2= DB::table('registrations')->where('league_id',$league->id)
         ->join('users', 'registrations.user_id', '=', 'users.id')
         ->join('clubs', 'users.club_id', '=', 'clubs.id')
         ->select('clubs.club_name','clubs.id')
         ->groupBy('clubs.id')->get();
         foreach($clubs as $club){
           $clubId[]=$club->id;
         }
         foreach($clubs2 as $club){
           $clubId2[]=$club->id;
         }
         $club=array_unique(array_merge($clubId, $clubId2));
         $registrations=Club::whereIn('id',$club)->get();
   }else{
    $clubId=array();
   $clubId2=array();
   $clubs= DB::table('group_registrations')->where('league_id',$league->id)
         ->join('clubs', 'group_registrations.club_id', '=', 'clubs.id')
         ->select('clubs.id')
         ->groupBy('clubs.id')->get();
         $clubs2= DB::table('registrations')->where('league_id',$league->id)
         ->join('users', 'registrations.user_id', '=', 'users.id')
         ->join('clubs', 'users.club_id', '=', 'clubs.id')
         ->select('clubs.club_name','clubs.id')
         ->groupBy('clubs.id')->get();

         foreach($clubs as $club){
           $clubId[]=$club->id;
         }
         foreach($clubs2 as $club){
           $clubId2[]=$club->id;
         }
         $club=array_unique(array_merge($clubId, $clubId2));
         $registrations=Club::whereIn('id',$club)->get();
    
   }

  
        $view = view('admin.reports.clubTransactionfilter', compact( 'header','registrations','league'))->render();
        $view2 = view('admin.reports.clubTransactionPreview', compact( 'header','registrations','league','setting'))->render();
        $view3 = view('admin.reports.clubTransactionExcel', compact('registrations','league'))->render();

        return response()->json(['html' => $view,'html2' => $view2,'html3' => $view3]);
}
   public function payview(Request $request)
   {
    $club=Crypt::decrypt($request->get('value'));
    $league=$request->get('league');
    Session::put('club', $club);
    Session::put('league', $league);
    $id = Session::get('id');
   $setting = OrganizationSetting::where('organization_id', Auth::user()->organization_id !== null ? Auth::user()->organization_id : $id)->first();
   $header = $setting ? $setting->header : '';
  
//    dd($registrations->count());
    $url="/brief-invoice";
    return response()->json(['url' => $url]);

    // return view('admin.reports.brief-invoice',compact('registrations','setting','header'));
}
   public function clubTransExport(Request $request)
   {
  
    $leagueData1 = Session::get('leagueData1');
    $id = Session::get('id');
    $ongngLeaguesCount=League::where('to_date','>',Carbon::now())->where('from_date','<',Carbon::now())->where('organization_id',Auth::user()->organization_id?Auth::user()->organization_id:$id)->get();
    if(count($ongngLeaguesCount)>0){
        $league=League::where('to_date','>',Carbon::now())->where('from_date','<',Carbon::now())->where('organization_id',Auth::user()->organization_id?Auth::user()->organization_id:$id)->first();
    }else{
        $league=League::where('organization_id',Auth::user()->organization_id?Auth::user()->organization_id:$id)->orderBy('id','desc')->latest()->first();
    }   
    $setting = OrganizationSetting::where('organization_id', Auth::user()->organization_id !== null ? Auth::user()->organization_id : $id)->first();
   $header = $setting ? $setting->header : '';

   if($leagueData1!=null){
    $league=League::find($leagueData1);

    $clubId=array();
   $clubId2=array();
   $clubs= DB::table('group_registrations')->where('league_id',$league->id)
         ->join('clubs', 'group_registrations.club_id', '=', 'clubs.id')
         ->select('clubs.id')
         ->groupBy('clubs.id')->get();
         $clubs2= DB::table('registrations')->where('league_id',$league->id)
         ->join('users', 'registrations.user_id', '=', 'users.id')
         ->join('clubs', 'users.club_id', '=', 'clubs.id')
         ->select('clubs.club_name','clubs.id')
         ->groupBy('clubs.id')->get();
         foreach($clubs as $club){
           $clubId[]=$club->id;
         }
         foreach($clubs2 as $club){
           $clubId2[]=$club->id;
         }
         $club=array_unique(array_merge($clubId, $clubId2));
         $registrations=Club::whereIn('id',$club)->get();
   }else{
    $clubId=array();
   $clubId2=array();
   $clubs= DB::table('group_registrations')->where('league_id',$league?$league->id:'')
         ->join('clubs', 'group_registrations.club_id', '=', 'clubs.id')
         ->select('clubs.id')
         ->groupBy('clubs.id')->get();
         $clubs2= DB::table('registrations')->where('league_id',$league?$league->id:'')
         ->join('users', 'registrations.user_id', '=', 'users.id')
         ->join('clubs', 'users.club_id', '=', 'clubs.id')
         ->select('clubs.club_name','clubs.id')
         ->groupBy('clubs.id')->get();

         foreach($clubs as $club){
           $clubId[]=$club->id;
         }
         foreach($clubs2 as $club){
           $clubId2[]=$club->id;
         }
         $club=array_unique(array_merge($clubId, $clubId2));
         $registrations=Club::whereIn('id',$club)->get();
    
   }
    $pdf = app('dompdf.wrapper');
    $pdf->getDomPDF()->set_option("enable_php", true);
    $pdf = PDF::loadView('admin.reports.clubTransactionPdf', compact('header','registrations','league','setting'))->setPaper('a4', 'portrait');
    return $pdf->stream('ClubTransaction');
}
public function clubTransExcel(Request $request)
{
 $id = Session::get('id');
 $leagueData1 =Session::get('leagueData1');

        return Excel::download(new ClupTransactionExport($leagueData1,$id), 'club_transactions.xlsx');
}
   public function brief_invoice(Request $request)
   {
    
    $club = Session::get('club');
    $league = Session::get('league');
    $iso = Auth::user()->country->currency->currency_iso_code;

    $id = Session::get('id');
   $setting = OrganizationSetting::where('organization_id', Auth::user()->organization_id !== null ? Auth::user()->organization_id : $id)->first();
   $header = $setting ? $setting->header : '';
   $registrations=Registration::where('league_id',$league)->where('organization_id',Auth::user()->organization_id !== null ?Auth::user()->organization_id:$id)->where('is_approved',1)->wherehas('user',function($q) use($club){
    $q->where('club_id',$club);
   })->get();


   $GroupRegistrations=GroupRegistration::where('league_id',$league)->where('organization_id',Auth::user()->organization_id !== null ?Auth::user()->organization_id:$id)->wherehas('teams',function($q) use($club){
    $q->wherehas('club',function($q) use($club){
                $q->where('id',$club);
    });
            })->get();
   $grandtotal=GroupRegistration::where('league_id',$league)->where('organization_id',Auth::user()->organization_id !== null ?Auth::user()->organization_id:$id)->where('status','!=',3)->wherehas('club',function($q) use($club){
    $q->where('id',$club);
})->sum('totalfee');
$paid1=GroupRegistration::where('league_id',$league)->where('organization_id',Auth::user()->organization_id !== null ?Auth::user()->organization_id:$id)->whereIn('status',[1,2])->wherehas('club',function($q) use($club){
    $q->where('id',$club);
})->sum('totalfee');  
$payableG=GroupRegistration::where('league_id',$league)->where('organization_id',Auth::user()->organization_id !== null ?Auth::user()->organization_id:$id)->whereNotIn('status',[1,2,3])->wherehas('club',function($q) use($club){
    $q->where('id',$club);
})->sum('totalfee');

// dd($mainEvents);
   $view2 = view('admin.reports.clubTransactionGroupPrint', compact('grandtotal','GroupRegistrations','payableG','setting','paid1','header','iso','club','league'))->render();
   $view3 = view('admin.reports.brief_invoicePrint', compact('registrations','GroupRegistrations','grandtotal','paid1','payableG','setting','header','iso','club','league'))->render();
    return view('admin.reports.brief-invoice',compact('registrations','GroupRegistrations','grandtotal','payableG','paid1','setting','header','iso','club','league'));
}
   public function BriefExport(Request $request)
   {
    
    $club = Session::get('club');
    $league = Session::get('league');
    $iso = Auth::user()->country->currency->currency_iso_code;
    $leagueName=League::find($league);
    $clubName=Club::find($club);
    $id = Session::get('id');
   $setting = OrganizationSetting::where('organization_id', Auth::user()->organization_id !== null ? Auth::user()->organization_id : $id)->first();
   $header = $setting ? $setting->header : '';
   $registrations=Registration::where('league_id',$league)->where('organization_id',Auth::user()->organization_id !== null ?Auth::user()->organization_id:$id)->where('is_approved',1)->wherehas('user',function($q) use($club){
    $q->where('club_id',$club);
   })->get();
   

   $pdf = app('dompdf.wrapper');
   $pdf->getDomPDF()->set_option("enable_php", true);
   $pdf = PDF::loadView('admin.reports.brief_invoice_pdf', compact('header','registrations','leagueName','clubName','setting','iso','club','league'))->setPaper('a4', 'portrait');
   return $pdf->stream('Invoice_Club_Users');
}
public function BriefExcel(Request $request)
{
 $id = Session::get('id');
 $club = Session::get('club');
$league = Session::get('league');
        return Excel::download(new BriefInvoiceExport($club,$league,$id), 'Part_Pay_Club.xlsx');
}
public function BriefExportGroup(Request $request)
   {
    
    $club = Session::get('club');
    $league = Session::get('league');
    $iso = Auth::user()->country->currency->currency_iso_code;
    $leagueName=League::find($league);
    $clubName=Club::find($club);
    $id = Session::get('id');
   $setting = OrganizationSetting::where('organization_id', Auth::user()->organization_id !== null ? Auth::user()->organization_id : $id)->first();
   $header = $setting ? $setting->header : '';
   $GroupRegistrations=GroupRegistration::where('league_id',$league)->where('organization_id',Auth::user()->organization_id !== null ?Auth::user()->organization_id:$id)->wherehas('teams',function($q) use($club){
    $q->wherehas('club',function($q) use($club){
                $q->where('id',$club);
    });
            })->get();
   $grandtotal=GroupRegistration::where('league_id',$league)->where('organization_id',Auth::user()->organization_id !== null ?Auth::user()->organization_id:$id)->where('status','!=',3)->wherehas('club',function($q) use($club){
    $q->where('id',$club);
})->sum('totalfee');
$paid1=GroupRegistration::where('league_id',$league)->where('organization_id',Auth::user()->organization_id !== null ?Auth::user()->organization_id:$id)->whereIn('status',[1,2])->wherehas('club',function($q) use($club){
    $q->where('id',$club);
})->sum('totalfee');
$payableG=GroupRegistration::where('league_id',$league)->where('organization_id',Auth::user()->organization_id !== null ?Auth::user()->organization_id:$id)->whereNotIn('status',[1,2,3])->wherehas('club',function($q) use($club){
    $q->where('id',$club);
})->sum('totalfee');
   $pdf = app('dompdf.wrapper');
   $pdf->getDomPDF()->set_option("enable_php", true);
   $pdf = PDF::loadView('admin.reports.brief_invoice_group_pdf', compact('header','GroupRegistrations','grandtotal','payableG','paid1','setting','iso','club','clubName','leagueName','league'))->setPaper('a4', 'portrait');
   return $pdf->stream('Invoice_Club_Users');
}
public function clubTransExcelGroup(Request $request)
{
 $id = Session::get('id');
 $club = Session::get('club');
$league = Session::get('league');
        return Excel::download(new InvoiceGroupExport($club,$league,$id), 'GroupEvents_Pay_Club.xlsx');
} 
}
