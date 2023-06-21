<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\User;
use Carbon\Carbon;
use Cartalyst\Sentinel\Laravel\Facades\Activation;
use File;
use Hash;
use Illuminate\Http\Request;
use Redirect;
use Sentinel;
use URL;
use View;
use App\Models\UserReport;
use App\Models\ReportName;
use App\Models\Gender;
use Yajra\DataTables\DataTables;
use App\Mail\Restore;
use stdClass;
use App\Models\Country;
use App\generalSetting;
use Auth;
use App\Models\Season;
use App\Models\Organization;
use App\Models\Club;
use Spatie\Permission\Models\Role;
use Mail;
use Session;
use PDF;
use App\Exports\UsersSampleExport;
use App\Exports\UsersExport;
use App\Exports\UsersListExport;
use App\Exports\ClubsExport;
use App\Exports\OrgUsersListExport;
use App\Exports\Org_Members_Export;
use App\Models\OrganizationSetting;
use App\Exports\OrgStaffListExport;
use App\Imports\UsersImport;
use Excel;
use Intervention\Image\Facades\Image;
use DB;
use App\Notifications\AlertNotification;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Crypt;
class UsersController extends Controller
{

    /**
     * Show a list of all the users.
     *
     * @return View
     */
    // public function createTeam(){
    //     dd("hi");

    // }
    public function NoUserclub(Request $request)
    {
        if($request->get('role')==3){
            $clubs = Club::where('is_approved',1)->has('users','=',0)->get();
            return response()->json([
                'clubs' => $clubs,
            ]);
        }
        else if($request->get('role')!=3){
            $clubs = Club::where('is_approved',1)->has('users','>',0)->get();
            return response()->json([
                'clubs' => $clubs,
            ]);
        }
    }

    public function clubname(Request $request){
        $clubname=Club::where('id',$request->input('clubname'))->first();
        // dd($clubname->club_name);
        return response()->json([
            'clubn' => $clubname->club_name,
        ]);


    }
     public function countryforsignup(Request $request)
    {
        // dd($request->get('country'));
        $organizations = Organization::where('country_id', $request->input('country'))->where('status',1)->has('users','>',0)->get();
        $country=Country::find($request->input('country'));
        $code=$country->countryCode?$country->countryCode->name:'';
        $clubs = Club::where('is_approved',1)->get();
        return response()->json([
            'organizations' => $organizations,
            'clubs' => $clubs,
            'code'=>$code
        ]);
    }

    public function memberCreate()
    {
                $today=Carbon::now()->format('Y-m-d');

        $countries = Country::all();
        $clubs = Club::all();
        $season = Season::where('status', 1)->first();
        $role = Role::where('id', 7)->first();
        $organizations = Organization::where('status', 1)->get();
        $general = generalSetting::where('id', 1)->first();

        return view('members.create', compact('countries', 'role', 'general', 'organizations', 'season', 'clubs','today'));
    }
public function memberAgeRestrict(Request $request){
   $dob=Carbon::parse($request->input('dob'))->format('Y');
   $date=Carbon::now()->format('Y');
$age=$date-$dob;
if($age>15){
    return response()->json(['errors'=>"This person can not belong to a Family Member"]);

}
else{
    return response()->json(['success']);
 
}

}

    function import(Request $request)
    {
     $this->validate($request, [
      'select_file'  => 'required|mimes:xls,xlsx'
     ]);  
     Excel::import(new UsersImport,$request->file('select_file'));

         
     return back()->with('success', 'UserLists uploaded successfully');

     
    }
    function importUsers(Request $request){
        $general=generalSetting::find(1);
        return view('admin.users.importUsers',compact('general'));
    }
    function imports(Request $request){
        return view('admin.users.import');
    }
    function export(Request $request)
    {
     
        $countries = Country::all();
        $organizations = Organization::all();
        $clubs = Club::all();
        $genders=Gender::all();
        $members=array('Yes','No');
        
        return Excel::download(new UsersSampleExport($countries, $organizations, $clubs,$genders,$members), 'Users.xlsx');

         

     
    }

    public function org_member_Create()
    {
        $id = Session::get('id');

        $countries = Country::all();
        $clubs = Club::where('is_approved','=', 1)->get();
        $season = Season::where('status', 1)->first();
        $role = Role::where('id', 7)->first();
        $organizations = Organization::where('status', 1)->get();
        $general = generalSetting::where('id', 1)->first();
           $today=Carbon::now()->format('Y');

        return view('organizations.create_org_member', compact('countries', 'role', 'general', 'organizations', 'season', 'clubs', 'id','today'));
    }


    public function clubmemberCreate()
    {

        $countries = Country::where('id', Auth::user()->country_id)->get();
        $clubs = Club::where('id', Auth::user()->club_id)->get();
        $season = Season::where('status', 1)->first();
        $role = Role::where('id', 7)->first();
        $organizations = Organization::where('id', Auth::user()->organization_id ? Auth::user()->organization_id : '')->get();
        $general = generalSetting::where('id', 1)->first();

        return view('clubs.club_member_create', compact('countries', 'role', 'general', 'organizations', 'season', 'clubs'));
    }

    public function members()
    {
        // dd(url()->previous());
        // dd(Auth::user()->children);
        $users = User::where('parent_id', Auth::user()->id)->get();
        return view('members.index', compact('users'));
    }

    public function memberStore(Request $request)
    {
        // dd($request->all());
        $org=Organization::find(Auth::user()->organization_id);
        if($org->orgsetting){
        if($org->orgsetting->active==1){
            if($request->input('email')!=null){
                $validator = Validator::make(
             $request->all(),
             [
                'first_name'            => 'required|max:255|regex:/^([a-zA-Z ]{1,255})$/ix',
                  'last_name'             => 'required|max:255|regex:/^([a-zA-Z ]{1,255})$/ix',
                 'dob'                       => 'required',
                 'club'                       => 'required',
                                 'gender'                       => 'required',
                 'role'                  => 'required',
                 'member'                  => 'required',
                 'tel-number'            => 'numeric|digits_between:8,15',
                 'email'                 => 'email|unique:users|max:255',
                
             ],
             [
                 
                  'email.unique'  => 'Email has already been taken',
                  'first_name.required' => 'First Name is Required',
                 'last_name.required'           => 'Last Name is Required',
                 'dob.required'    => 'Date Of Birth is Required',
                 'club.required'       => 'Please Select the Club',
                                 'gender.required'       => 'Please Choose the gender',
                 'first_name.regex' => 'First Name contains only letters',
                 'last_name.regex' => 'Last Name contains only letters',
 
                 // 'tel-number.required' => 'Mobile Number is required',
                'tel-number.numeric' => 'Mobile Number should be number',
                 'role.required'  => 'Please Select The Role',
                 'member.required'  => 'Please Choose answer this question',
               
 
 
             ]
 
         );
         }
         else{
             
         
         $validator = Validator::make(
             $request->all(),
             [
                 'first_name'            => 'required|max:255|regex:/^([a-zA-Z ]{1,255})$/ix',
                  'last_name'             => 'required|max:255|regex:/^([a-zA-Z ]{1,255})$/ix',
                 'dob'                       => 'required',
                 // 'club'                       => 'required',
                 // 'role'                  => 'required',
                 'member'                  => 'required',
                 'gender'                  => 'required',
 
                 'tel-number'            => 'numeric|digits_between:8,15',
             ],
             [
                 'first_name.required' => 'First Name is Required',
                 'last_name.required'           => 'Last Name is Required',
                 'dob.required'    => 'Date Of Birth is Required',
                 // 'club.required'       => 'Please Select the Club',
                 'first_name.regex' => 'First Name contains only letters',
                 'last_name.regex' => 'Last Name contains only letters',
 
                 'tel-number.numeric' => 'Mobile Number should be number',
 
                 // 'role.required'  => 'Please Select The Role',
                 'member.required'  => 'Please Choose answer this question',
                 'gender.required'  => 'Please Choose the gender',
 
 
 
             ]
 
         );
         }

        }else{
            if($request->input('email')!=null){
                $validator = Validator::make(
             $request->all(),
             [
                'first_name'            => 'required|max:255|regex:/^([a-zA-Z ]{1,255})$/ix',
                  'last_name'             => 'required|max:255|regex:/^([a-zA-Z ]{1,255})$/ix',
                 'dob'                       => 'required',
                 'club'                       => 'required',
                                 'gender'                       => 'required',
                 'role'                  => 'required',
                 // 'member'                  => 'required',
                 'tel-number'            => 'numeric|digits_between:8,15',
                 'email'                 => 'email|unique:users|max:255',
                
             ],
             [
                 
                  'email.unique'  => 'Email has already been taken',
                  'first_name.required' => 'First Name is Required',
                 'last_name.required'           => 'Last Name is Required',
                 'dob.required'    => 'Date Of Birth is Required',
                 'club.required'       => 'Please Select the Club',
                                 'gender.required'       => 'Please Choose the gender',
                 'first_name.regex' => 'First Name contains only letters',
                 'last_name.regex' => 'Last Name contains only letters',
 
                 // 'tel-number.required' => 'Mobile Number is required',
                'tel-number.numeric' => 'Mobile Number should be number',
 
                 'role.required'  => 'Please Select The Role',
                 // 'member.required'  => 'Please Choose about membership',
               
 
 
             ]
 
         );
         }
         else{
             
         
         $validator = Validator::make(
             $request->all(),
             [
                 'first_name'            => 'required|max:255|regex:/^([a-zA-Z ]{1,255})$/ix',
                  'last_name'             => 'required|max:255|regex:/^([a-zA-Z ]{1,255})$/ix',
                 'dob'                       => 'required',
                 // 'club'                       => 'required',
                 // 'role'                  => 'required',
                 // 'member'                  => 'required',
                 'gender'                  => 'required',
 
                 'tel-number'            => 'numeric|digits_between:8,15',
             ],
             [
                 'first_name.required' => 'First Name is Required',
                 'last_name.required'           => 'Last Name is Required',
                 'dob.required'    => 'Date Of Birth is Required',
                 // 'club.required'       => 'Please Select the Club',
                 'first_name.regex' => 'First Name contains only letters',
                 'last_name.regex' => 'Last Name contains only letters',
                 'tel-number.numeric' => 'Mobile Number should be number',
                 // 'role.required'  => 'Please Select The Role',
                 // 'member.required'  => 'Please Choose about membership',
                 'gender.required'  => 'Please Choose the gender',
 
 
 
             ]
 
         );
         }

        }
    }else{
        if($request->input('email')!=null){
            $validator = Validator::make(
         $request->all(),
         [
            'first_name'            => 'required|max:255|regex:/^([a-zA-Z ]{1,255})$/ix',
              'last_name'             => 'required|max:255|regex:/^([a-zA-Z ]{1,255})$/ix',
             'dob'                       => 'required',
             'club'                       => 'required',
                             'gender'                       => 'required',
             'role'                  => 'required',
             // 'member'                  => 'required',
             'tel-number'            => 'numeric|digits_between:8,15',
             'email'                 => 'email|unique:users|max:255',
            
         ],
         [
             
              'email.unique'  => 'Email has already been taken',
              'first_name.required' => 'First Name is Required',
             'last_name.required'           => 'Last Name is Required',
             'dob.required'    => 'Date Of Birth is Required',
             'club.required'       => 'Please Select the Club',
                             'gender.required'       => 'Please Choose the gender',
             'first_name.regex' => 'First Name contains only letters',
             'last_name.regex' => 'Last Name contains only letters',

             // 'tel-number.required' => 'Mobile Number is required',
            'tel-number.numeric' => 'Mobile Number should be number',

             'role.required'  => 'Please Select The Role',
             // 'member.required'  => 'Please Choose about membership',
           


         ]

     );
     }
     else{
         
     
     $validator = Validator::make(
         $request->all(),
         [
             'first_name'            => 'required|max:255|regex:/^([a-zA-Z ]{1,255})$/ix',
              'last_name'             => 'required|max:255|regex:/^([a-zA-Z ]{1,255})$/ix',
             'dob'                       => 'required',
             // 'club'                       => 'required',
             // 'role'                  => 'required',
             // 'member'                  => 'required',
             'gender'                  => 'required',

             'tel-number'            => 'numeric|digits_between:8,15',
         ],
         [
             'first_name.required' => 'First Name is Required',
             'last_name.required'           => 'Last Name is Required',
             'dob.required'    => 'Date Of Birth is Required',
             // 'club.required'       => 'Please Select the Club',
             'first_name.regex' => 'First Name contains only letters',
             'last_name.regex' => 'Last Name contains only letters',

            //  'tel-number.regex' => 'Mobile Number should be number',
                             'tel-number.numeric' => 'Mobile Number should be number',

             // 'role.required'  => 'Please Select The Role',
             // 'member.required'  => 'Please Choose about membership',
             'gender.required'  => 'Please Choose the gender',



         ]

     );
     }

    }
       

        if ($validator->fails()) {
            return redirect('/members/create')->withErrors($validator)->withInput();
        }

   if ($request->input('organization') == 0) {
            $organization = null;
        } else {
            $organization = $request->input('organization');
        }

        if ($request->input('club') == 0) {
            $club = null;
        } else {
            $club = $request->input('club');
        }
        $user = new User;
        $user->first_name             = $request->input('first_name');
        $user->parent_id = Auth::user()->id;
        $user->last_name           = $request->input('last_name');
        $user->tel_number = $request->input('tel-number');
        $user->dob             = $request->input('dob');
        $user->country_id        = $request->input('country');
        $user->season_id        = $request->input('season');
        $user->organization_id        = $request->input('organization');
        $user->club_id=$request->input('club');
        $user->email            = $request->input('email');
        $user->status=2;
        $user->gender = $request->input('gender');
        if ($request->get('member')) {
            $user->member_or_not = $request->input('member');
        } else {
            // dd('ji');
            $user->member_or_not=0;

        }
        $user->is_approved = 1;
            $clb = club::find($request->input('club'));
            $users = User::where('club_id', $request->input('club'))->orderBy('id', 'desc')->get();
           
         $userIds=array();
            foreach($users as $user1){
                $userIds[]=explode(' ',$user1->userId)[1];
            }
            // dd($userIds);
           if ($users->count()>0) {
                           $max=max($userIds);
                $pre =$max;
                $user->userId = $clb->prefix  . " ". str_pad(($pre + 1), 4, '0', STR_PAD_LEFT);
            } else {
                $user->userId = $clb->prefix  . " ". str_pad(1, 4, '0', STR_PAD_LEFT);
            }
        $user->save();
        $user->assignRole(7);
        // if ($request->input('role')) {
        //     $user->assignRole($request->input('role'));
        // }


        // $user_email = $request->input('email');

        // $organization = Organization::find($request->input('organization'));
        // Mail::send(
        //     ['html' => 'useraccess'],
        //     ['user' => $user, 'org' => $organization],
        //     function ($message) use ($user_email) {
        //         $message->to($user_email)
        //             ->subject('Registration');
        //     }
        // );


        return redirect('/members')->with('success', ' Registered successfully');
    }
    public function index(Request $request)
    {
    
        $id = Session::get('id') ? Session::get('id') : '';
        $rolesforOnlyOrgUsers=Role::whereNotIn('id',[1,8,3])->get();

        if ($request->ajax()) {
            $dob=null;
            $search5 = $request->get('query5')?$request->get('query5'):'';
           if(is_numeric($search5)&& ((strlen($search5)==1)||(strlen($search5)==2))){
           $today=Carbon::now()->format('Y');
           $dob=$today-$search5;
           }
           $roles=Role::whereNotIn('id',[1,8])->get();
           $sortBy=$request->get('sortby');
           $sorttype=$request->get('sorttype');
        //    dd( $search5);
        Session::put('Anton', $search5);
        Session::put('sortBy', $sortBy);
            Session::put('sorttype', $sorttype);
            if($search5 != ''){
                if($sortBy){

                    if($sortBy=='club'){
                        $users = User::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->where('is_approved',1)
                    ->where(function($query) use($search5,$dob){
                        return $query
                    ->whereHas('roles', function ($q) use ($search5) {
                        $q->where('name', 'like', '%' . $search5 . '%');     
                    })
                    ->orwhereHas('club', function ($q) use ($search5) {
                        $q->where('club_name', 'like', '%' . $search5 . '%');
        
                    })           
                    ->orWhere('first_name','like', '%' . $search5 . '%')
                    ->orWhere('email', $search5 )
                    ->orWhere('tel_number',$search5)
                    ->orWhere('last_name','like', '%' . $search5 . '%')
                    ->orWhereYear('dob',$dob!=null?$dob:'');
                    })->orderBy(Club::select('club_name')->whereColumn('clubs.id','users.club_id'),$sorttype)->paginate(10);
                    }else{
                    $users = User::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->where('is_approved',1)
                    ->where(function($query) use($search5,$dob){
                        return $query
                    ->whereHas('roles', function ($q) use ($search5) {
                        $q->where('name', 'like', '%' . $search5 . '%');     
                    })
                    ->orwhereHas('club', function ($q) use ($search5) {
                        $q->where('club_name', 'like', '%' . $search5 . '%');
        
                    })           
                    ->orWhere('first_name','like', '%' . $search5 . '%')
                    ->orWhere('email', $search5 )
                    ->orWhere('tel_number',$search5)
                    ->orWhere('last_name','like', '%' . $search5 . '%')
                    ->orWhereYear('dob',$dob!=null?$dob:'');
                    })->orderBy($sortBy,$sorttype)->paginate(10);
                    }
                }else{
                    $users = User::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->where('is_approved',1)
                    ->where(function($query) use($search5,$dob){
                        return $query
                    ->whereHas('roles', function ($q) use ($search5) {
                        $q->where('name', 'like', '%' . $search5 . '%');     
                    })
                    ->orwhereHas('club', function ($q) use ($search5) {
                        $q->where('club_name', 'like', '%' . $search5 . '%');
        
                    })           
                    ->orWhere('first_name','like', '%' . $search5 . '%')
                    ->orWhere('email', $search5 )
                    ->orWhere('tel_number',$search5)
                    ->orWhere('last_name','like', '%' . $search5 . '%')
                    ->orWhereYear('dob',$dob!=null?$dob:'');
                    })->orderBy('first_name','Asc')->paginate(10);  
                }
                  
            }
            else{
                $roles=Role::whereNotIn('id',[1,8])->get();
                if($sortBy){
                    if($sortBy=='club'){
                        $users = User::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->orderBy(Club::select('club_name')->whereColumn('clubs.id','users.club_id'),$sorttype)->paginate(10);
    
                    }else{
                    $users = User::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->orderBy($sortBy,$sorttype)->paginate(10);
                    
                    }
                }else{
                    $users = User::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->orderBy('first_name','Asc')->paginate(10);

                }
                

            }
            
            return view('admin.users.org_userlist', compact('users','roles','rolesforOnlyOrgUsers')) ;

        }
        $users = User::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->orderBy('first_name', 'Asc')->paginate(10);
        $setting = OrganizationSetting::where('organization_id', Auth::user()->organization_id !== null ? Auth::user()->organization_id : $id)->first();
        $header = $setting ? $setting->header : '';
        $organizations = Organization::all();
        $roles=Role::whereNotIn('id',[1,8])->get();
        return view('admin.users.index', compact('header','setting','users', 'organizations','roles','rolesforOnlyOrgUsers'));

    }

    public function userLists(Request $request)
    {
        $org=Organization::first();
        if (Auth::user()->hasRole(1)) {
            $users = User::whereNotIn('id', [1])->where('country_id', Auth::user()->country_id)->orderBy('created_at','desc')->paginate(10);
            $users2 = User::whereNotIn('id', [1])->where('country_id', Auth::user()->country_id)->orderBy('created_at','desc')->get();

        } 
        else {
            $users = User::whereNotIn('id', [1])->where('club_id',null)->where('organization_id',null)->orderBy('id','desc')->paginate(10);
            $users2 = User::whereNotIn('id', [1])->orderBy('id','desc')->where('club_id',null)->where('organization_id',null)->orderBy('id','desc')->get();

        }
        $general = generalSetting::first();
        $roles = Role::whereNotIn('id', [8])->get();
        $adminheader = $general->header;
        $search=null;
        $organizations = Organization::all();
        if ($request->ajax()) {
            $dob=null;

            $search = $request->get('query')?$request->get('query'):'';
           if(is_numeric($search)&& ((strlen($search)==1)||(strlen($search)==2))){
           $today=Carbon::now()->format('Y');
           $dob=$today-$search;
           }
            Session::put('suvarna', $search);
            if($search != ''){
                $users = User::whereNotIn('id', [1])->where('organization_id', null)->where('club_id',null)
                ->where(function($query) use($search,$dob){
                    return $query
                    ->whereHas('roles', function ($q) use ($search) {
                    $q->where('name', 'like', '%' . $search . '%');
    
                    
                })
               
                ->orwhereHas('country', function ($q) use ($search) {
                    $q->where('name', 'like', '%' . $search . '%');
                })
               
                ->orWhere('first_name','like', '%' . $search . '%')
                ->orWhere('email', $search )
                ->orWhere('tel_number',$search)
                ->orWhere('last_name','like', '%' . $search . '%')
                ->orWhereYear('dob',$dob!=null?$dob:'');
            }) ->paginate(10);

                            $users2 = User::whereNotIn('id', [1])->where('organization_id', null)->where('club_id',null)
                            ->where(function($query) use($search,$dob){
                                return $query
                                ->whereHas('roles', function ($q) use ($search) {
                                $q->where('name', 'like', '%' . $search . '%');
                
                                
                            })
                           
                            ->orwhereHas('country', function ($q) use ($search) {
                                $q->where('name', 'like', '%' . $search . '%');
                            })
                            
                            ->orWhere('first_name','like', '%' . $search . '%')
                            ->orWhere('last_name','like', '%' . $search . '%')
                            ->orWhere('email', $search )
                            ->orWhere('tel_number',$search)
                            ->orWhereYear('dob',$dob!=null?$dob:'');
                        })->get();
            }
            else{
                // $users = User::with(['user', 'ageGroups'])->where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->get();
                if (Auth::user()->hasRole(1)) {
                    $users = User::whereNotIn('id', [1])->where('country_id', Auth::user()->country_id)->orderBy('id','desc')->paginate(10);
                    $users2 = User::whereNotIn('id', [1])->where('country_id', Auth::user()->country_id)->orderBy('id','desc')->get();

                } else {
                    $users = User::whereNotIn('id', [1])->where('club_id',null)->where('organization_id',null)->orderBy('id','desc')->paginate(10);
                    $users2 = User::whereNotIn('id', [1])->orderBy('id','desc')->where('club_id',null)->where('organization_id',null)->orderBy('id','desc')->get();
        

                }
            }
            return view('admin.users.user-list-filter', compact('users', 'users2','organizations','org', 'general','roles','search','general','adminheader')) ;

        }
        return view('admin.users.user-lists', compact('users','users2', 'organizations', 'general','org','roles','search','general','adminheader'));

       }

    public function userListData()
    {
        $org=Organization::first();
        if (Auth::user()->hasRole(1)) {
            $users = User::with('club')->whereNotIn('id', [1])->where('country_id', Auth::user()->country_id)->orderBy('created_at', 'desc');
        } else {
            $users = User::with('club')->whereNotIn('id', [1])->orderBy('id', 'desc');
        }

        return DataTables::of($users)
            ->editColumn('created_at', function (User $user) {
                return $user->created_at->diffForHumans();
            })
            ->addColumn('role', function ($user) {

                return $user->roles->pluck('name')[0];
            })
            ->addColumn('age', function ($user) {
                $age = Carbon::parse($user->dob)->diff(Carbon::now())->y;
                return $age;
            })
            ->addColumn('country', function ($user) {
                return $user->country ? $user->country->name : '';
            })
            ->addColumn('organization', function ($user) {
                return $user->organization ? $user->organization->name : '';
            })
            ->addColumn('club', function ($user) {
                return $user->club ? $user->club->club_name : '';
            })
            ->addColumn('status', function ($user) {

                if ($user->is_approved == 1) {
                    return 'Activated';
                }
                if ($user->is_approved == 0) {
                    return 'Denied';
                }

                if ($user->is_approved == 2) {
                    return 'Pending';
                }
            })

            ->addColumn('actions', function ($user) {

                if ($user->is_approved == 2) {
                    $id = $user->id;
                    $actions = '<a href=' . route('user.show.view', $user->id) . '><button style="padding: 2px 4px" class=" btn btn-primary" ata-toggle="tooltip" data-placement="top" title="View User"><i class="material-icons" style="margin-bottom:5px">visibility</i></button></a>
                    <button style="padding: 2px 4px" class=" btn btn-success approve" value="' . $id . '" ata-toggle="tooltip" data-placement="top" title="Approve"><i class="material-icons" style="margin-bottom:5px">check_circle</i></button>
                    <button style="padding: 2px 4px" class=" btn btn-danger decline" value="' . $id . '" ata-toggle="tooltip" data-placement="top" title="Decline"><i class="material-icons" style="margin-bottom:5px">highlight_off</i></button>
                    ';


                    return $actions;
                }
                if ($user->is_approved == 1) {

                    $id = $user->id;
                    $actions = '<a href=' . route('user.show.view', $user->id) . '><button style="padding: 2px 4px" class=" btn btn-primary" ata-toggle="tooltip" data-placement="top" title="View User"><i class="material-icons" style="margin-bottom:5px">visibility</i></button></a>
                    <button style="padding: 2px 4px" class=" btn btn-danger decline" value="' . $id . '" ata-toggle="tooltip" data-placement="top" title="Decline"><i class="material-icons" style="margin-bottom:5px">highlight_off</i></button>';


                    return $actions;
                }
                if ($user->is_approved == 0) {

                    $id = $user->id;
                    $actions = '<a href=' . route('user.show.view', $user->id) . '><button style="padding: 2px 4px" class=" btn btn-primary" ata-toggle="tooltip" data-placement="top" title="View User"><i class="material-icons" style="margin-bottom:5px">visibility</i></button></a>
                    <button style="padding: 2px 4px" class=" btn btn-success approve" value="' . $id . '" ata-toggle="tooltip" data-placement="top" title="Approve"><i class="material-icons" style="margin-bottom:5px">check_circle</i></button>';



                    return $actions;
                }
            })
            ->rawColumns(['actions'])
            ->make(true);
    }


    /*
     * Pass data through ajax call
     */
    /**
     * @return mixed
     */
    public function clubData()
    {
        $users = User::Role(['player'])->where('club_id', Auth::user()->club_id)->orderBy('id', 'DESC')->get();
        // $users=User::Role(['Starter','Judge','EventOrganizer'])->where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->orderBy('created_at', 'Desc');

        return DataTables::of($users)
            ->editColumn('created_at', function (User $user) {
                return $user->created_at->diffForHumans();
            })
            ->addColumn('role', function ($user) {

                return $user->roles->pluck('name')[0];
            })
            ->addColumn('status', function ($user) {

                if ($user->is_approved == 1) {
                    return 'Activated';
                }
                if ($user->is_approved == 0) {
                    return 'Denied';
                }

                if ($user->is_approved == 2) {
                    return 'Pending';
                }
            })


            ->addColumn('actions', function ($user) {

                if ($user->is_approved == 2) {
                    $id = $user->id;


                    $actions = '<a href=' . route('users.show', $user->id) . '><button style="padding: 2px 4px" class=" btn btn-primary" ata-toggle="tooltip" data-placement="top" title="View User"><i class="material-icons" style="margin-bottom:5px">visibility</i></button></a>
                    <a href=' . route('users.edit', $user->id) . '><button style="padding: 2px 4px" class=" btn btn-info" data-toggle="tooltip" data-placement="top" title="Edit User"><i class="material-icons" style="margin-bottom:5px">edit</i></button></a>
                    <button  class="btn btn-success approve" value="' . $id . '"style="padding: 2px 6px;text-transform:none;">Approve </button>
                    <button  class="btn btn-danger decline" value="' . $id . '"style="padding: 2px 6px;text-transform:none;">Decline </button>';


                    return $actions;
                }
                if ($user->is_approved == 1) {

                    $id = $user->id;
                    $actions = '<a href=' . route('users.show', $user->id) . '><button style="padding: 2px 4px" class=" btn btn-primary" ata-toggle="tooltip" data-placement="top" title="View User"><i class="material-icons" style="margin-bottom:5px">visibility</i></button></a>
                    <a href=' . route('users.edit', $user->id) . '><button style="padding: 2px 4px" class=" btn btn-info" data-toggle="tooltip" data-placement="top" title="Edit"><i class="material-icons" style="margin-bottom:5px">edit</i></button></a>
                    <button  class="btn btn-danger decline" value="' . $id . '"style="padding: 2px 6px;text-transform:none;">Decline </button>';


                    return $actions;
                }
                if ($user->is_approved == 0) {

                    $id = $user->id;
                    $actions = '<a href=' . route('users.show', $user->id) . '><button style="padding: 2px 4px" class=" btn btn-primary" ata-toggle="tooltip" data-placement="top" title="View User"><i class="material-icons" style="margin-bottom:5px">visibility</i></button></a>
                                <a href=' . route('users.edit', $user->id) . '><button style="padding: 2px 4px" class=" btn btn-info" data-toggle="tooltip" data-placement="top" title="Edit"><i class="material-icons" style="margin-bottom:5px">edit</i></button></a>
                                <button  class="btn btn-success approve" value="' . $id . '"style="padding: 2px 6px;text-transform:none;">Approve </button>';



                    return $actions;
                }
            })
            ->rawColumns(['actions'])
            ->make(true);
    }
    public function data()
    {
        // dd("hi");
        $id = Session::get('id') ? Session::get('id') : '';

        $users = User::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->orderBy('created_at', 'Desc');
        return DataTables::of($users)
            ->editColumn('created_at', function (User $user) {
                return $user->created_at->diffForHumans();
            })
            ->addColumn('role', function ($user) {

                return $user->roles->pluck('name')[0];
            })
            ->addColumn('club', function ($user) {
                return $user->club ? $user->club->club_name : '';
            })
            ->addColumn('age', function ($user) {
                $age = Carbon::parse($user->dob)->diff(Carbon::now())->y;
                return $age;
            })

            ->addColumn('status', function ($user) {

                if ($user->is_approved == 1) {
                    return 'Activated';
                }
                if ($user->is_approved == 0) {
                    return 'Denied';
                }

                if ($user->is_approved == 2) {
                    return 'Pending';
                }
            })


            ->addColumn('actions', function ($user) {

                if ($user->is_approved == 2) {
                    $id = $user->id;


                    $actions = '<a href=' . route('users.show', $user->id) . '><button style="padding: 2px 4px" class=" btn btn-primary" ata-toggle="tooltip" data-placement="top" title="View User"><i class="material-icons" style="margin-bottom:5px">visibility</i></button></a>
                    <a href=' . route('users.edit', $user->id) . '><button style="padding: 2px 4px" class=" btn btn-info" data-toggle="tooltip" data-placement="top" title="Edit User"><i class="material-icons" style="margin-bottom:5px">edit</i></button></a>
                    <button  class="btn btn-success approve" value="' . $id . '"style="padding: 2px 6px;text-transform:none;">Approve </button>
                    <button  class="btn btn-danger decline" value="' . $id . '"style="padding: 2px 6px;text-transform:none;">Decline </button>';


                    return $actions;
                }
                if ($user->is_approved == 1) {

                    $id = $user->id;
                    $actions = '<a href=' . route('users.show', $user->id) . '><button style="padding: 2px 4px" class=" btn btn-primary" ata-toggle="tooltip" data-placement="top" title="View User"><i class="material-icons" style="margin-bottom:5px">visibility</i></button></a>
                    <a href=' . route('users.edit', $user->id) . '><button style="padding: 2px 4px" class=" btn btn-info" data-toggle="tooltip" data-placement="top" title="Edit"><i class="material-icons" style="margin-bottom:5px">edit</i></button></a>
                    <button  class="btn btn-danger decline" value="' . $id . '"style="padding: 2px 6px;text-transform:none;">Decline </button>';


                    return $actions;
                }
                if ($user->is_approved == 0) {

                    $id = $user->id;
                    $actions = '<a href=' . route('users.show', $user->id) . '><button style="padding: 2px 4px" class=" btn btn-primary" ata-toggle="tooltip" data-placement="top" title="View User"><i class="material-icons" style="margin-bottom:5px">visibility</i></button></a>
                                <a href=' . route('users.edit', $user->id) . '><button style="padding: 2px 4px" class=" btn btn-info" data-toggle="tooltip" data-placement="top" title="Edit"><i class="material-icons" style="margin-bottom:5px">edit</i></button></a>
                                <button  class="btn btn-success approve" value="' . $id . '"style="padding: 2px 6px;text-transform:none;">Approve </button>';



                    return $actions;
                }
            })
            ->rawColumns(['actions'])
            ->make(true);
    }

    /**
     * Create new user
     *
     * @return View
     */
    public function create()
    {
        // Get all the available groups
        $clubs = Club::all();
        $countries = Country::all();
        $season = Season::where('status', 1)->first();
        $id = Session::get('id') ? Session::get('id') : '';
        if (Auth::user()->hasRole(8)) {
            $roles = Role::whereNotIn('id', ['1','8'])->where('status',1)->get();
        }
        if (Auth::user()->hasRole(1)) {
            $roles = Role::whereNotIn('id', ['1', '8'])->where('status',1)->get();
        }
        if (Auth::user()->hasRole(2)) {
            $roles = Role::whereNotIn('id', ['1', '8'])->where('status',1)->get();
        } 
        else{
           $roles=Role::where('status',1)->get();
        }
        $organizations = Organization::all();
        $orgs = Organization::all();
        $general = generalSetting::where('id', 1)->first();
                      $today=Carbon::now()->format('Y-m-d');

        return view('admin.users.create', compact('countries', 'roles', 'general', 'organizations', 'season', 'clubs', 'orgs', 'id','today'));
    }
    public function create2()
    {
  
        // Get all the available groups
        $clubs = Club::where('is_approved', 1)->get();
        
        $season = Season::where('status', 1)->first();
        $roles = Role::whereNotIn('name', ['SuperAdmin'])->where('status',1)->get();
        $organizations = Organization::where('status', 1)->first();
        $countries = Country::find($organizations?$organizations->country_id:'');
        $orgs = Organization::first();
        $general = generalSetting::where('id', 1)->first();
                      $today=Carbon::now()->format('Y-m-d');
                    //   dd($countries);
        
        return view('admin.users.create-2', compact('countries', 'roles', 'general', 'organizations', 'season', 'clubs', 'orgs','today'));

        // Show the page
        // return view('admin.users.create', compact('countries', 'roles', 'general', 'organizations', 'season', 'clubs', 'orgs'));

    }

    public function create3()
    {
        // Get all the available groups
        $id=Session::get('id');
        $clubs = Club::where('is_approved','=', 1)->get();
        // dd($clubs);
        $countries = Country::all();
        $season = Season::where('status', 1)->first();
        if(Auth::user()->hasRole(4)){
            $roles = Role::whereIn('id', [5,6])->where('status',1)->get();
        }else{
            $roles = Role::whereNotIn('id', [1,3,7,8])->where('status',1)->get();
        }
        $organizations = Organization::where('status', 1)->where('country_id', Auth::user()->country_id)->get();
        $orgs = Organization::all();
        $general = generalSetting::where('id', 1)->first();
                        $today=Carbon::now()->format('Y-m-d');

        // Show the page
        return view('admin.users.org_newuser_create', compact('id','countries', 'roles', 'general', 'organizations', 'season', 'clubs', 'orgs','today'));

        // Show the page
        // return view('admin.users.create', compact('countries', 'roles', 'general', 'organizations', 'season', 'clubs', 'orgs'));

    }

    public function country(Request $request)
    {
        $organizations = Organization::where('country_id', $request->input('country'))->where('status',1)->get();
        $country=Country::find($request->input('country'));
        $code=$country->countryCode?$country->countryCode->name:'';
        $clubs = Club::where('country_id', $request->input('country'))->where('is_approved',1)->get();
        return response()->json([
            'organizations' => $organizations,
            'clubs' => $clubs,
            'code'=>$code
        ]);
    }

    /**
     * User create form processing.
     *
     * @return Redirect
     */
    public function store(Request $request)
    {
        $countries = Country::all();
        // ----------------
      
          $role1=$request->input('role');
        $club1=$request->input('club');
        // dd($club1);
        $org=Organization::first();
        if($org){
        if($org->orgsetting){
        if($org->orgsetting->active==1){
        // if($role1==3){
            $validator = Validator::make(
                $request->all(),
                [
                    'first_name'                  => 'required|max:255|regex:/^([a-zA-Z ]{1,255})$/ix',
                    'last_name'                  => 'required|max:255|regex:/^([a-zA-Z ]{1,255})$/ix',
                    'dob'                       => 'required',
                    'gender'                       => 'required',
                    'member'                       => 'required',
                    'email'                 => 'required|email|max:255|unique:users',
                    'password'              => 'required|min:6|max:20|confirmed',
                    'password_confirmation' => 'required|same:password',
                    'tel-number'            => 'numeric|digits_between:8,15', 
                     'club'=>'required',
                                          'role'=>'required',


                   
                ],
                

               
                [
                    'first_name.required' => 'First Name is Required',
                    'last_name.required' => 'Last Name is Required',
                    'dob.required'    => 'Date Of Birth is Required',
                    // 'country.required'       => 'Please Select the Country',
                    'email.required'  => 'Email is Required',
                     'email.unique'  => 'Email has already been taken',
                    'password.required'  => 'Password is Required',
                     'password_confirmation.required'  => "Password Confirmation doesn't match",
                    'password_confirmation.same'  => "Password Confirmation doesn't match",
                    'gender.required'  => 'Please Select The Gender',
                    'club.required'=>"Please Select The Club",
                    'role.required'=>"Please Select The Role",
                    'member.required'  => 'Please Choose answer this question',
                    'tel-number.numeric' => 'Mobile Number should be number',

    
    
                ]
    
            );
            // dd($validator);
        }else{
            $validator = Validator::make(
                $request->all(),
                [
                    'first_name'                  => 'required|max:255|regex:/^([a-zA-Z ]{1,255})$/ix',
                    'last_name'                  => 'required|max:255|regex:/^([a-zA-Z ]{1,255})$/ix',
                    'dob'                       => 'required',
                    'gender'                       => 'required',
                    'email'                 => 'required|email|max:255|unique:users',
                    'password'              => 'required|min:6|max:20|confirmed',
                    'password_confirmation' => 'required|same:password',
                     'club'=>'required',
                                          'role'=>'required',


                   
                ],
                

               
                [
                    'first_name.required' => 'First Name is Required',
                    'last_name.required' => 'Last Name is Required',
                    'dob.required'    => 'Date Of Birth is Required',
                    'email.required'  => 'Email is Required',
                     'email.unique'  => 'Email has already been taken',
                    'password.required'  => 'Password is Required',
                     'password_confirmation.required'  => "Password Confirmation doesn't match",
                    'password_confirmation.same'  => "Password Confirmation doesn't match",
                    'gender.required'  => 'Please Select The Gender',
                    'club.required'=>"Please Select The Club",
                    'role.required'=>"Please Select The Role",

    
    
                ]
    
            );
        }
    }
else{
        $validator = Validator::make(
            $request->all(),
            [
                'first_name'                  => 'required|max:255|regex:/^([a-zA-Z ]{1,255})$/ix',
                'last_name'                  => 'required|max:255|regex:/^([a-zA-Z ]{1,255})$/ix',
                'dob'                       => 'required',
                'gender'                       => 'required',
                'email'                 => 'required|email|max:255|unique:users',
                'password'              => 'required|min:6|max:20|confirmed',
                'password_confirmation' => 'required|same:password',
                 'club'=>'required',
                                      'role'=>'required',


               
            ],
            

           
            [
                'first_name.required' => 'First Name is Required',
                'last_name.required' => 'Last Name is Required',
                'dob.required'    => 'Date Of Birth is Required',
                'email.required'  => 'Email is Required',
                 'email.unique'  => 'Email has already been taken',
                'password.required'  => 'Password is Required',
                 'password_confirmation.required'  => "Password Confirmation doesn't match",
                'password_confirmation.same'  => "Password Confirmation doesn't match",
                'gender.required'  => 'Please Select The Gender',
                'club.required'=>"Please Select The Club",
                'role.required'=>"Please Select The Role",



            ]

        );
    }
}
            if ($validator->fails()) {
                if (Auth::user()->hasRole(3)) {
                    return redirect('add/club_member')->withErrors($validator)->withInput();
                } 
                if (Auth::user()->hasRole(1) || Auth::user()->hasRole(8)) {
                    return redirect('user/create')->withErrors($validator)->withInput();
                } 
                else {
                    return redirect('users/create')->withErrors($validator)->withInput();
                }
            }
        // }else{
        //     // dd('i');

        //     $validator = Validator::make(
        //         $request->all(),
        //         [
        //             'first_name'                  => 'required|max:255',
        //             'last_name'                  => 'required|max:255',
        //             'dob'                       => 'required',
        //             'gender'                       => 'required',
        //             'country'                       => 'required',
        //             'email'                 => 'required|email|max:255|unique:users',
        //             'password'              => 'required|min:6|max:20|confirmed',
        //             'password_confirmation' => 'required|same:password',
        //             'role'                  => 'required',
        //              'tel-number' => 'required|numeric|regex:/^([0-9]{0,10})$/',
                     
                     
        //         ],
                
               
               
        //         [
        //             'first_name.required' => 'First Name is Required',
        //             'last_name.required' => 'Last Name is Required',
        //             'dob.required'    => 'Date Of Birth is Required',
        //             'country.required'       => 'Please Select the Country',
        //             'email.required'  => 'Email is Required',
        //              'email.unique'  => 'Email has already been taken',
        //              'tel-number.numeric' => 'Mobile Number must be a number',
        //              'tel-number.min' => 'Mobile Number must not bless than 9 digits',
        //              'tel-number.max'=>'Mobile Number must be 10 digits',
        //             'password.required'  => 'Password is Required',
        //              'password_confirmation.required'  => "Password Confirmation doesn't match",
        //             'password_confirmation.same'  => "Password Confirmation doesn't match",
        //             'role.required'  => 'Please Select The Role',
        //             'gender.required'  => 'Please Select The Gender',

    
    
        //         ]
    
        //     );
        //     if ($validator->fails()) {
        //         if (Auth::user()->hasRole(3)) {
        //             return redirect('add/club_member')->withErrors($validator)->withInput();
        //         } 
        //         if (Auth::user()->hasRole(1) || Auth::user()->hasRole(8)) {
        //             return redirect('user/create')->withErrors($validator)->withInput();
        //         } 
        //         else {
        //             return redirect('users/create')->withErrors($validator)->withInput();
        //         }
        //     }
        // }
        
                       

        if ($request->input('organization') == 0) {
            $organization = null;
        } else {
            $organization = $request->input('organization');
        }

        if ($request->input('club') == null) {
            $club = null;
        } else {
            $club = $request->input('club');
        }
$country= Country::find($request->input('country'));
$code=$country->countryCode->name;
        $user = new User;
        $user->first_name             = $request->input('first_name');
        $user->last_name           = $request->input('last_name');
        $user->tel_number = $code.$request->input('tel-number');
        $user->country_id        = $request->input('country');
        $user->organization_id        = $organization;
        $user->club_id=$club;
        $user->email            = $request->input('email');
        $user->dob=$request->input('dob');
        $user->is_approved = 1;
        $user->status=2;
        if ($request->get('member')) {
            $user->member_or_not = $request->input('member');
        } else {
            $user->member_or_not=0;

        }
                        $clb = club::find($request->input('club'));
            $users = User::where('club_id', $request->input('club'))->orderBy('id', 'desc')->get();
   $userIds=array();
            foreach($users as $user1){
                $userIds[]=explode(' ',$user1->userId)[1];
            }
           if ($users->count()>0) {
                           $max=max($userIds);
                $pre =$max;
                $user->userId = $clb->prefix  . " ". str_pad(($pre + 1), 4, '0', STR_PAD_LEFT);
            } else {
                $user->userId = $clb->prefix  . " ". str_pad(1, 4, '0', STR_PAD_LEFT);
            }
        $user->password        = Hash::make($request->input('password'));
        $user->gender            = $request->input('gender');
        $user->remember_token            = str_random(64);
        if ($request->input('club')) {

            $user->club_id      = $request->input('club') ? $request->input('club') : "";
        }
        $user->save();
        if ($request->input('role')) {
            $user->assignRole($request->input('role'));
        }


        $user_email = $request->input('email');

        $organization = Organization::find($request->input('organization'));
        // Mail::send(
        //     ['html' => 'useraccess'],
        //     ['user' => $user, 'org' => $organization],
        //     function ($message) use ($user_email) {
        //         $message->to($user_email)
        //             ->subject('Registration');
        //     }
        // );
        if (Auth::user()->hasRole(3)) {
            return redirect('/club-members')->with('success', ' Registered successfully');
        } 
        if (Auth::user()->hasRole(1) || Auth::user()->hasRole(8)) {
            return redirect('/user-lists')->with('success', ' Registered successfully');
        } 
        else {
            return redirect('/users')->with('success', ' Registered successfully');
        }
    }
  public function Club_member_store(Request $request)
    {
        $countries = Country::all();
$org=Organization::find(Auth::user()->organization_id);
        if($org->orgsetting){
        if($org->orgsetting->active==1){
            $validator = Validator::make(
                $request->all(),
                [
                       'first_name'            => 'required|max:255|regex:/^([a-zA-Z ]{1,255})$/ix',
                     'last_name'             => 'required|max:255|regex:/^([a-zA-Z ]{1,255})$/ix',
                                    //  'email'                 => 'required|unique:users|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix',
                    'dob'                       => 'required',
                    'gender'                       => 'required',
                    'member'                       => 'required',
                    // 'password'              => 'required|min:6|max:20|confirmed',
                    // 'password_confirmation' => 'required|same:password',
                    // 'role'                  => 'required',
                    // 'tel-number' => 'regex:/^[0-9]{8,15}$/|digits_between:8,15',
                ],
                [
                    'first_name.required' => 'First Name is Required',
                        'first_name.regex' => 'First Name contains only letters',
    
                     'last_name.required'           => 'Last Name is Required',
                    'last_name.regex' => 'Last Name contains only letters',
                    // 'email.required'  => 'Email is Required',
                    // 'tel-number.regex' => 'Mobile Number should be number',
                    //                 'email.unique'  => 'Email has already been taken',
                    'member.required'  => 'Please Choose answer this question',
                    'dob.required'    => 'Date Of Birth is Required',
                    'gender.required'       => 'Please Choose the Gender',
                 
                  
    
    
                ]
    
            );
            // -----------------
        
        }else{
            $validator = Validator::make(
                $request->all(),
                [
                       'first_name'            => 'required|max:255|regex:/^([a-zA-Z ]{1,255})$/ix',
                     'last_name'             => 'required|max:255|regex:/^([a-zA-Z ]{1,255})$/ix',
                                    //  'email'                 => 'required|unique:users|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix',
                    'dob'                       => 'required',
                    'gender'                       => 'required',
                    // 'member'                       => 'required',
                    // 'password'              => 'required|min:6|max:20|confirmed',
                    // 'password_confirmation' => 'required|same:password',
                    // 'role'                  => 'required',
                    //  'tel-number' => 'required|numeric|regex:/^([0-9]{0,14})$/',
                ],
                [
                    'first_name.required' => 'First Name is Required',
                        'first_name.regex' => 'First Name contains only letters',
    
                     'last_name.required'           => 'Last Name is Required',
                    'last_name.regex' => 'Last Name contains only letters',
                    // 'email.required'  => 'Email is Required',
                    // 'email.regex'  => 'please enter the valid Email',
                    //                 'email.unique'  => 'Email has already been taken',
                    // 'member.required'  => 'Please Choose about membership',
                    'dob.required'    => 'Date Of Birth is Required',
                    'gender.required'       => 'Please Choose the Gender',
                 
                  
    
    
                ]
    
            );
            // -----------------
    
           
        }
    }else{
        $validator = Validator::make(
            $request->all(),
            [
                   'first_name'            => 'required|max:255|regex:/^([a-zA-Z ]{1,255})$/ix',
                 'last_name'             => 'required|max:255|regex:/^([a-zA-Z ]{1,255})$/ix',
                                //  'email'                 => 'required|unique:users|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix',
                'dob'                       => 'required',
                'gender'                       => 'required',
                // 'member'                       => 'required',
                // 'password'              => 'required|min:6|max:20|confirmed',
                // 'password_confirmation' => 'required|same:password',
                // 'role'                  => 'required',
                //  'tel-number' => 'required|numeric|regex:/^([0-9]{0,14})$/',
            ],
            [
                'first_name.required' => 'First Name is Required',
                    'first_name.regex' => 'First Name contains only letters',

                 'last_name.required'           => 'Last Name is Required',
                'last_name.regex' => 'Last Name contains only letters',
                // 'email.required'  => 'Email is Required',
                // 'email.regex'  => 'please enter the valid Email',
                //                 'email.unique'  => 'Email has already been taken',
                // 'member.required'  => 'Please Choose about membership',
                'dob.required'    => 'Date Of Birth is Required',
                'gender.required'       => 'Please Choose the Gender',
             
              


            ]

        );

    }
        // ----------------
        if ($validator->fails()) {
            return redirect('add/club_member')->withErrors($validator)->withInput();
        }
            
      
$country= Country::find(Auth::user()->country_id);
$code=$country->countryCode->name;
        $user = new User;
        $user->first_name             = $request->input('first_name');
        $user->last_name           = $request->input('last_name');
        // $user->tel_number = $code.$request->input('tel-number');
        $user->country_id        = Auth::user()->country_id;
        $user->organization_id        = Auth::user()->organization_id;
        $user->club_id= Auth::user()->club_id;
        // $user->email    = $request->input('email');
        $user->dob=$request->input('dob');
        if($request->get('member')){
            $user->member_or_not=$request->input('member');
        }else{
            $user->member_or_not=0;
        }
        $user->is_approved = 1;
            $clb = club::find(Auth::user()->club_id);
          $users = User::where('club_id', $clb->id)->orderBy('id', 'desc')->get();
         $userIds=array();
            foreach($users as $user1){
                $userIds[]=explode(' ',$user1->userId)[1];
            }
           if ($users->count()>0) {
                           $max=max($userIds);
                $pre =$max;
                $user->userId = $clb->prefix  . " ". str_pad(($pre + 1), 4, '0', STR_PAD_LEFT);
            } else {
                $user->userId = $clb->prefix  . " ". str_pad(1, 4, '0', STR_PAD_LEFT);
            }
        
        // $user->password        = Hash::make($request->input('password'));
        $user->gender            = $request->input('gender');
        $user->remember_token            = str_random(64);
        $user->status=2;
        $user->save();
        // if ($request->input('role')) {
            $user->assignRole(7);
        // }

        
       
            return redirect('/club-members')->with('success', ' Registered successfully');
    
    }
    // --------------------------------------------------
   
    public function role_change(Request $request,$id)
    {
        $user = User::find($request->input('id'));
        $userRole=$user->roles->pluck('name')[0];
        $newRole=Role::find($request->input('role'));
        $user->removeRole($userRole);
        $user->assignRole($newRole);
        $url = '/user-lists';
        return response()->json([
            'url' => $url
        ]);
    }


    
// ------------------------------------------------------



    public function userStore(Request $request)
    {
        if(Auth::user()->organization->orgsetting){
        if(Auth::user()->organization->orgsetting->active==1){
            $validator = Validator::make(
                $request->all(),
                 [
                    'first_name'            => 'required|max:255|regex:/^([a-zA-Z ]{1,255})$/ix',
                     'last_name'             => 'required|max:255|regex:/^([a-zA-Z ]{1,255})$/ix',
                    'dob'                   => 'required',
                    'email'                 => 'required|unique:users|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix',
                    'password'              => 'required|min:8|max:20|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/',
                    'password_confirmation' => 'required|same:password',
                     'gender'                => 'required',
                    'role'                  => 'required',
                    'member'                  => 'required',
                    'club'=>'required',
                    'tel-number'            => 'numeric',
                ],
                [
                    'first_name.required' => 'First Name is Required',
                    'first_name.regex' => 'First Name contains only letters',
                     'last_name.required'           => 'Last Name is Required',
                    'last_name.regex' => 'Last Name contains only letters',
                    'dob.required'    => 'Date Of Birth is Required',
                     'role.required'    => 'Please select the Role',
                    'club.required'    => 'Please select the Club',
                    'email.required'  => 'Email is Required',
                    'email.regex'  => 'please enter the valid Email',
                    'email.unique'  => 'Email has already been taken',
                    'member.required'  => 'Please Choose answer this Question',
                    'tel-number.numeric' => 'Mobile Number should be number',
                    // 'tel-number.required' => 'Mobile Number is Required',
                     'gender.required'  => 'Please Choose  The Gender',
                    'password.min' => 'Password should contain minimum 8 characters',
                     'password.regex' => 'Password should contain capital letters,simple letters,number and special characters',
                    'password_confirmation.same' => 'Password confirmation should be same as password',
                 //  'tel-number.digits_between' => 'Mobile Number at least contains 8 digits',
                ]
    
            );
        }else{
        
        $validator = Validator::make(
            $request->all(),
             [
                'first_name'            => 'required|max:255|regex:/^([a-zA-Z ]{1,255})$/ix',
                 'last_name'             => 'required|max:255|regex:/^([a-zA-Z ]{1,255})$/ix',
                'dob'                   => 'required',
                'email'                 => 'required|unique:users|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix',
                'password'              => 'required|min:8|max:20|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/',
                'password_confirmation' => 'required|same:password',
                 'gender'                => 'required',
                'role'                  => 'required',
                'club'=>'required',
                'tel-number'            => 'numeric|digits_between:8,15',
            ],
            [
                'first_name.required' => 'First Name is Required',
                'first_name.regex' => 'First Name contains only letters',
                 'last_name.required'           => 'Last Name is Required',
                'last_name.regex' => 'Last Name contains only letters',
                'dob.required'    => 'Date Of Birth is Required',
                 'role.required'    => 'Please select the Role',
                'club.required'    => 'Please select the Club',
                'email.required'  => 'Email is Required',
                'email.regex'  => 'please enter the valid Email',
                'email.unique'  => 'Email has already been taken',
                'tel-number.numeric' => 'Mobile Number should be number',
                // 'tel-number.required' => 'Mobile Number is Required',
                 'gender.required'  => 'Please Choose  The Gender',
                'password.min' => 'Password should contain minimum 8 characters',
                 'password.regex' => 'Password should contain capital letters,simple letters,number and special characters',
                'password_confirmation.same' => 'Password confirmation should be same as password',
             //  'tel-number.digits_between' => 'Mobile Number at least contains 8 digits',
            ]

        );
    }
}else{
            $validator = Validator::make(
                $request->all(),
                 [
                    'first_name'            => 'required|max:255|regex:/^([a-zA-Z ]{1,255})$/ix',
                     'last_name'             => 'required|max:255|regex:/^([a-zA-Z ]{1,255})$/ix',
                    'dob'                   => 'required',
                    'email'                 => 'required|unique:users|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix',
                    'password'              => 'required|min:8|max:20|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/',
                    'password_confirmation' => 'required|same:password',
                     'gender'                => 'required',
                    'role'                  => 'required',
                    // 'member'                  => 'required',
                    'club'=>'required',
                    'tel-number'            => 'numeric|digits_between:8,15',
                ],
                [
                    'first_name.required' => 'First Name is Required',
                    'first_name.regex' => 'First Name contains only letters',
                     'last_name.required'           => 'Last Name is Required',
                    'last_name.regex' => 'Last Name contains only letters',
                    'dob.required'    => 'Date Of Birth is Required',
                     'role.required'    => 'Please select the Role',
                    'club.required'    => 'Please select the Club',
                    'email.required'  => 'Email is Required',
                    'email.regex'  => 'please enter the valid Email',
                    'email.unique'  => 'Email has already been taken',
                    // 'member.required'  => 'Please Choose about this Question',
                    'tel-number.numeric' => 'Mobile Number should be number',
                    // 'tel-number.required' => 'Mobile Number is Required',
                     'gender.required'  => 'Please Choose  The Gender',
                    'password.min' => 'Password should contain minimum 8 characters',
                     'password.regex' => 'Password should contain capital letters,simple letters,number and special characters',
                    'password_confirmation.same' => 'Password confirmation should be same as password',
                 //  'tel-number.digits_between' => 'Mobile Number at least contains 8 digits',
                ]
    
            );  
        }
  

            // -----------------

            if ($validator->fails()) {
    
                return redirect('/users/create')->withErrors($validator)->withInput();
            }
     
        
 
        $user = new User;
        $user->first_name             = $request->input('first_name');
        $user->last_name           = $request->input('last_name');
        $user->tel_number = $request->input('tel-number');
        $user->dob             = $request->input('dob');
        $user->country_id        = Auth::user()->country_id;
        $user->season_id        = $request->input('season');
        $user->organization_id        = Auth::user()->organization_id;
        $user->email            = $request->input('email');
        $user->status=2;
        if($request->get('member')){
            $user->member_or_not=$request->input('member');
        }else{
            $user->member_or_not=0;
        }
        $user->is_approved = 1;
        $clb = club::find($request->input('club'));
        $users = User::where('club_id', $request->input('club'))->orderBy('id', 'desc')->get();
       $userIds=array();
            foreach($users as $user1){
                $userIds[]=explode(' ',$user1->userId)[1];
            }
            // dd($userIds);
           if ($users->count()>0) {
                           $max=max($userIds);
                $pre =$max;
                $user->userId = $clb->prefix  . " ". str_pad(($pre + 1), 4, '0', STR_PAD_LEFT);
            } else {
                $user->userId = $clb->prefix  . " ". str_pad(1, 4, '0', STR_PAD_LEFT);
            }
        
        $user->password        = Hash::make($request->input('password'));
        $user->gender            = $request->input('gender');
        $user->remember_token            = str_random(64);
        if ($request->input('club')) {

            $user->club_id      = $request->input('club') ? $request->input('club') : "";
        }
        $user->save();
        if ($request->input('role')) {
            $user->assignRole($request->input('role'));
        }


        $user_email = $request->input('email');

        $organization = Organization::find($request->input('organization'));
        // Mail::send(
        //     ['html' => 'useraccess'],
        //     ['user' => $user, 'org' => $organization],
        //     function ($message) use ($user_email) {
        //         $message->to($user_email)
        //             ->subject('Registration');
        //     }
        // );

        return redirect('/users')->with('success', ' Registered successfully');
    }


    public function decline(Request $request, $id)
    {
        $id = $request->input('id');
        $user = User::find($id);
        $user->is_approved = 0;
        $user->save();
        $email = $user->email;
        // Mail::send(
        //     ['html' => 'denied'],
        //     ['user' => $user,],
        //     function ($message) use ($email) {
        //         $message->to($email)
        //             ->subject('Access Denied');
        //     }
        // );
        // -----------------------------------------------------------------------------------------------------
      

            if (Auth::user()->hasRole(8) || Auth::user()->hasRole(1)) {
                return response()->json(['url' => url('/user-lists')]);
            } elseif (Auth::user()->hasRole(3)) {
                return response()->json(['url' => url('/club-members')]);
            } else {
                return response()->json(['url' => url('/users')]);
            }
        
    }
    public function declineOrgstaff(Request $request){
        $id = $request->input('id');
        $user = User::find($id);
        $user->is_approved = 0;
        $user->save();
        return response()->json(['url' => url('/organization-staffs')]);

    }
    public function approveOrgStaff(Request $request){
        $id = $request->input('id');
        $user = User::find($id);
        $user->is_approved = 1;
        $user->save();
        return response()->json(['url' => url('/organization-staffs')]);

    }
    public function declineOrgMember(Request $request){
        $id = $request->input('id');
        $user = User::find($id);
        $user->is_approved = 0;
        $user->save();
        return response()->json(['url' => url('/org_member_data')]);

    }
    public function approveOrgMember(Request $request){
        $id = $request->input('id');
        $user = User::find($id);
        $user->is_approved = 1;
        $user->save();
        return response()->json(['url' => url('/org_member_data')]);

    }
    public function declineOrgUser(Request $request){
        $id = $request->input('id');
        $user = User::find($id);
        $user->is_approved = 0;
        $user->save();
        return response()->json(['url' => url('/users')]);

    }
    public function approveOrgUser(Request $request){
        $id = $request->input('id');
        $user = User::find($id);
        $user->is_approved = 1;
        $user->save();
        return response()->json(['url' => url('/users')]);

    }
    public function approve(Request $request, $id)
    {
        $id = $request->input('id');
        $user = User::find($id);
        $user->is_approved = 1;
        $user->save();

        $email = $user->email;
        // Mail::send(
        //     ['html' => 'access'],
        //     ['user' => $user,],
        //     function ($message) use ($email) {
        //         $message->to($email)
        //             ->subject('Access Granted');
        //     }
        // );
        if (Auth::user()->hasRole(8) || Auth::user()->hasRole(1)) {
            return response()->json(['url' => url('/user-lists')]);
        } elseif (Auth::user()->hasRole(3)) {
            return response()->json(['url' => url('/club-members')]);
        } else {
            return response()->json(['url' => url('/users')]);
        }
    }


    public function org_staff(Request $request)
    {
        $id = Session::get('id') ? Session::get('id') : '';
        $general = generalSetting::first();
        $roles = Role::whereNotIn('id', [8])->get();
        $search=null;
        $organizations = Organization::all();
        $setting = OrganizationSetting::where('organization_id', Auth::user()->organization_id !== null ? Auth::user()->organization_id : $id)->first();
        $header = $setting ? $setting->header : '';
        if ($request->ajax()) {
            // dd($sortByStaff);
            $sorttypeStaff = $request->get('sorttypeStaff');
            $sortByStaff = $request->get('sortbyStaff');
            $search2 = $request->get('query2')?$request->get('query2'):'';
            
            Session::put('sorttypeStaff',$sorttypeStaff);
            Session::put('sortByStaff',$sortByStaff );
            Session::put('org', $search2);

            if($search2 != ''){   
                if($sortByStaff){
                if($sortByStaff=='club'){
                    $users = User::Role(['Starter', 'Judge', 'EventOrganizer'])
                    ->where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)
                    ->where(function($query) use($search2){
                        return $query
                        ->whereHas('roles', function ($q) use ($search2) {
                            $q->where('name', 'like', '%' . $search2 . '%');                      
                        })
                    ->orwhere('email', $search2 )
                    ->orWhere('tel_number',$search2)
                    ->orWhere('last_name','like', '%' . $search2 . '%')
                    ->orWhere('first_name','like', '%' . $search2 . '%');
                    })->orderBy(Club::select('club_name')->whereColumn('clubs.id','users.club_id'),$sorttypeStaff)->paginate(10);
                }else{
                $users = User::Role(['Starter', 'Judge', 'EventOrganizer'])
                ->where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)
                ->where(function($query) use($search2){
                    return $query
                    ->whereHas('roles', function ($q) use ($search2) {
                        $q->where('name', 'like', '%' . $search2 . '%');                      
                    })
                ->orwhere('email', $search2 )
                ->orWhere('tel_number',$search2)
                ->orWhere('last_name','like', '%' . $search2 . '%')
                ->orWhere('first_name','like', '%' . $search2 . '%');
                })->orderBy($sortByStaff,$sorttypeStaff)->paginate(10);
                }  
            }else{
                $users = User::Role(['Starter', 'Judge', 'EventOrganizer'])
                ->where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)
                ->where(function($query) use($search2){
                    return $query
                    ->whereHas('roles', function ($q) use ($search2) {
                        $q->where('name', 'like', '%' . $search2 . '%');                      
                    })
                ->orwhere('email', $search2 )
                ->orWhere('tel_number',$search2)
                ->orWhere('last_name','like', '%' . $search2 . '%')
                ->orWhere('first_name','like', '%' . $search2 . '%');
                })->orderBy('created_at','Desc')->paginate(10);

            }
        }else{
            if($sortByStaff){
                if($sortByStaff=='club'){
                    $users = User::Role(['Starter', 'Judge', 'EventOrganizer'])
                    ->orderBy(Club::select('club_name')->whereColumn('clubs.id','users.club_id'),$sorttypeStaff)
                    ->paginate(10);
                }else{
                    $users = User::Role(['Starter', 'Judge', 'EventOrganizer'])
                    ->where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)
                    ->orderBy($sortByStaff,$sorttypeStaff)->paginate(10);

                }

            }else{
                $users = User::Role(['Starter', 'Judge', 'EventOrganizer'])
                    ->where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)
                    ->orderBy('created_at','Desc')->paginate(10);


            }

            }
            return view('organizations.show_org_staffs_table', compact('setting','header','users','id','roles'));

        }
       
       
        $users = User::Role(['Starter', 'Judge', 'EventOrganizer'])
        ->where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)
        ->orderBy('created_at', 'Desc')->paginate(10);
        $userss = User::Role(['Starter', 'Judge', 'EventOrganizer'])
        ->where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)
        ->orderBy('created_at', 'Desc')->get();

        return view('organizations.show_org_staffs', compact('setting','header','userss','users','id','roles'));
    
    }
   public function sortByStaff(Request $request){
    $id=Session::get('id');
    $search2=Session::get('org');
    $sortByStaff=Session::get('sortByStaff');
    $sorttypeStaff=Session::get('sorttypeStaff');

    if($request->input('value')==1){
        if($search2 != ''){                
            $users = User::Role(['Starter', 'Judge', 'EventOrganizer'])
            ->where('organization_id', Auth::user()->organization_id )
            ->where(function($query) use($search2){
                return $query
                ->whereHas('roles', function ($q) use ($search2) {
                    $q->where('name', 'like', '%' . $search2 . '%');                      
                })
            ->orwhere('email', $search2 )
            ->orWhere('tel_number',$search2)
            ->orWhere('last_name','like', '%' . $search2 . '%')
            ->orWhere('first_name','like', '%' . $search2 . '%');
            }) ->orderBy('first_name')->paginate(10);
            
    
        }
        else{
            $users = User::Role(['Starter', 'Judge', 'EventOrganizer'])
            ->where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)
            ->orderBy('first_name')->paginate(10);
            
        }
                }
             
                elseif($request->input('value')==2){
                    $users=$users->sortBy(function($query){
                                return $query->last_name;
                             })->all();
                      
                            }
                            elseif($request->input('value')==3){
                                $users=$users->sortBy(function($query){
                                            return $query->email;
                                         })->all();
                                        }
                                         elseif($request->input('value')==4){
                                            $users=$users->sortBy(function($query){
                                                        return $query->roles->name;
                                                     })->all();
                                  
                                        }
                                        $setting = OrganizationSetting::where('organization_id', Auth::user()->organization_id)->first();
                                        $header = $setting ? $setting->header : '';
                                        $id = Session::get('id') ? Session::get('id') : '';
                                        $roles = Role::whereNotIn('id', [8])->get();
                                      
                                        $view = view('organizations.show_org_staffs_table', compact('setting','header','users','id','roles'))->render();
                                
                                            return response()->json([
                                                'html' => $view,
                                
                                            ]);

   }
    public function org_staffprint(Request $request)
    {
        $id = Session::get('id') ? Session::get('id') : '';
        $sortByStaff=Session::get('sortByStaff');
        $sorttypeStaff=Session::get('sorttypeStaff');
        $search2=Session::get('org')?Session::get('org'):'';
        $general = generalSetting::first();
        $roles = Role::whereNotIn('id', [8])->get();
        $organizations = Organization::all();
        $setting = OrganizationSetting::where('organization_id', Auth::user()->organization_id !== null ? Auth::user()->organization_id : $id)->first();
        $header = $setting ? $setting->header : '';
            if($search2 != ''){
                if($sortByStaff){
                    if($sortByStaff=='club'){
                        $userss = User::Role(['Starter', 'Judge', 'EventOrganizer'])
                        ->where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)
                        ->where(function($query) use($search2){
                            return $query
                            ->whereHas('roles', function ($q) use ($search2) {
                                $q->where('name', 'like', '%' . $search2 . '%');                      
                            })
                        ->orwhere('email', $search2 )
                        ->orWhere('tel_number',$search2)
                        ->orWhere('last_name','like', '%' . $search2 . '%')
                        ->orWhere('first_name','like', '%' . $search2 . '%');
                        })->orderBy(Club::select('club_name')->whereColumn('clubs.id','users.club_id'),$sorttypeStaff)->get();
                    }else{
                    $userss = User::Role(['Starter', 'Judge', 'EventOrganizer'])
                    ->where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)
                    ->where(function($query) use($search2){
                        return $query
                        ->whereHas('roles', function ($q) use ($search2) {
                            $q->where('name', 'like', '%' . $search2 . '%');                      
                        })
                    ->orwhere('email', $search2 )
                    ->orWhere('tel_number',$search2)
                    ->orWhere('last_name','like', '%' . $search2 . '%')
                    ->orWhere('first_name','like', '%' . $search2 . '%');
                    })->orderBy($sortByStaff,$sorttypeStaff)->get();
                    }  
                }else{
                    $userss = User::Role(['Starter', 'Judge', 'EventOrganizer'])
                    ->where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)
                    ->where(function($query) use($search2){
                        return $query
                        ->whereHas('roles', function ($q) use ($search2) {
                            $q->where('name', 'like', '%' . $search2 . '%');                      
                        })
                    ->orwhere('email', $search2 )
                    ->orWhere('tel_number',$search2)
                    ->orWhere('last_name','like', '%' . $search2 . '%')
                    ->orWhere('first_name','like', '%' . $search2 . '%');
                    })->orderBy('created_at','Desc')->get();
                }

                $view = view('organizations.show_org_staff_print', compact('userss','id','setting','header'))->render();
                return response()->json(['html' => $view
            ]);
        }else{
            if($sortByStaff){
                if($sortByStaff=='club'){
                    $userss = User::Role(['Starter', 'Judge', 'EventOrganizer'])
                    ->orderBy(Club::select('club_name')->whereColumn('clubs.id','users.club_id'),$sorttypeStaff)
                    ->get();
                }else{
                    $userss = User::Role(['Starter', 'Judge', 'EventOrganizer'])
                    ->where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)
                    ->orderBy($sortByStaff,$sorttypeStaff)->get();

                }
            }else{
                $userss = User::Role(['Starter', 'Judge', 'EventOrganizer'])
                    ->where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)
                    ->orderBy('created_at','Desc')->get();


            }
            $view = view('organizations.show_org_staff_print', compact('userss','id','setting','header'))->render();
            return response()->json(['html' => $view
        ]);
        } 
    }
    // -------------------------------------------------------------------------------
    public function org_staff_Create()
    {
        $id = Session::get('id');
        $countries = Country::all();
        $clubs = Club::all();
        $season = Season::where('status', 1)->first();
        $role = Role::where('id', 7)->first();
        $organizations = Organization::where('status', 1)->get();
        $general = generalSetting::where('id', 1)->first();
        $today=Carbon::now()->format('Y-m-d');


        return view('organizations.create_org_member', compact('countries', 'role', 'general', 'organizations', 'season', 'clubs', 'id','today'));
    }

    // ---------------------------------------------

    public function staff_store(Request $request)
    {
        if(Auth::user()->organization->orgsetting){
        if(Auth::user()->organization->orgsetting->active==1){
        $validator = Validator::make(
            $request->all(),
            [
                'first_name'            => 'required|max:255|regex:/^([a-zA-Z ]{1,255})$/ix',
                 'last_name'             => 'required|max:255|regex:/^([a-zA-Z ]{1,255})$/ix',
                'dob'                       => 'required',
                'club'                       => 'required',
                'email'                 => 'required|email|max:255|unique:users|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix',
                'password'              => 'required|min:8|max:20|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/',
                'password_confirmation' => 'required|same:password',
                'role'                  => 'required',
                'member' => 'required',
                'tel-number'            => 'numeric|digits_between:8,15',
                 'gender'                  => 'required',

            ],
            [
                'first_name.required' => 'First Name is Required',
                    'first_name.regex' => 'First Name contains only letters',
                 'last-name.required'           => 'Last Name is Required',
                'last-name.regex' => 'Last Name contains only letters',
                'dob.required'    => 'Date Of Birth is Required',
                'club.required'       => 'Please select the club',
                'email.required'  => 'Email is Required',
                'email.unique'  => 'Email has already been taken',
                // 'tel-number.required' => 'Mobile Number is required',
                //   'tel-number.digits_between' => 'Mobile Number at least contains 8 digits',
                'tel-number.numeric' => 'Mobile Number should be number',
                'password.required'  => 'Password is Required',
                 'password_confirmation.required'  => "Password Confirmation doesn't match",
                'password_confirmation.same'  => "Password Confirmation doesn't match",
                 'password.regex' => 'Password should contain capital letters,simple letters,number and special characters',
                'role.required'  => 'Please Select The Role',
                'gender.required'  => 'Please Choose  The Gender',
                'member.required'  => 'Please Choose answer this  Question',



            ]

        );
        

    }else{
    $validator = Validator::make(
        $request->all(),
        [
            'first_name'            => 'required|max:255|regex:/^([a-zA-Z ]{1,255})$/ix',
             'last_name'             => 'required|max:255|regex:/^([a-zA-Z ]{1,255})$/ix',
            'dob'                       => 'required',
            'club'                       => 'required',
            'email'                 => 'required|email|max:255|unique:users|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix',
            'password'              => 'required|min:8|max:20|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/',
            'password_confirmation' => 'required|same:password',
            'role'                  => 'required',
            // 'member' => 'required',
            'tel-number'            => 'numeric|digits_between:8,15',
             'gender'                  => 'required',

        ],
        [
            'first_name.required' => 'First Name is Required',
                'first_name.regex' => 'First Name contains only letters',
             'last-name.required'           => 'Last Name is Required',
            'last-name.regex' => 'Last Name contains only letters',
            'dob.required'    => 'Date Of Birth is Required',
            'club.required'       => 'Please select the club',
            'email.required'  => 'Email is Required',
            'email.unique'  => 'Email has already been taken',
            // 'tel-number.required' => 'Mobile Number is required',
            //   'tel-number.digits_between' => 'Mobile Number at least contains 8 digits',
                              'tel-number.numeric' => 'Mobile Number should be number',
            'password.required'  => 'Password is Required',
             'password_confirmation.required'  => "Password Confirmation doesn't match",
            'password_confirmation.same'  => "Password Confirmation doesn't match",
             'password.regex' => 'Password should contain capital letters,simple letters,number and special characters',
            'role.required'  => 'Please Select The Role',
                             'gender.required'  => 'Please Choose  The Gender',
                            //  'member.required'  => 'Please Choose about membership',



        ]

    );
}
        }
else{

        $validator = Validator::make(
            $request->all(),
            [
                'first_name'            => 'required|max:255|regex:/^([a-zA-Z ]{1,255})$/ix',
                 'last_name'             => 'required|max:255|regex:/^([a-zA-Z ]{1,255})$/ix',
                'dob'                       => 'required',
                'club'                       => 'required',
                'email'                 => 'required|email|max:255|unique:users|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix',
                'password'              => 'required|min:8|max:20|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/',
                'password_confirmation' => 'required|same:password',
                'role'                  => 'required',
                // 'member' => 'required',
                'tel-number'            => 'numeric|digits_between:8,15',
                 'gender'                  => 'required',

            ],
            [
                'first_name.required' => 'First Name is Required',
                    'first_name.regex' => 'First Name contains only letters',
                 'last-name.required'           => 'Last Name is Required',
                'last-name.regex' => 'Last Name contains only letters',
                'dob.required'    => 'Date Of Birth is Required',
                'club.required'       => 'Please select the club',
                'email.required'  => 'Email is Required',
                'email.unique'  => 'Email has already been taken',
                // 'tel-number.required' => 'Mobile Number is required',
                //   'tel-number.digits_between' => 'Mobile Number at least contains 8 digits',
                                  'tel-number.numeric' => 'Mobile Number should be number',
                'password.required'  => 'Password is Required',
                 'password_confirmation.required'  => "Password Confirmation doesn't match",
                'password_confirmation.same'  => "Password Confirmation doesn't match",
                 'password.regex' => 'Password should contain capital letters,simple letters,number and special characters',
                'role.required'  => 'Please Select The Role',
                                 'gender.required'  => 'Please Choose  The Gender',
                                //  'member.required'  => 'Please Choose about membership',



            ]

        );
       

    }
    if ($validator->fails()) {
           
        return redirect('/org/user/create')->withErrors($validator)->withInput();
    
}
        
       

  
        $user = new User;
        $user->first_name             = $request->input('first_name');
        $user->last_name           = $request->input('last_name');
        $user->tel_number = $request->input('tel-number');
        $user->dob             = $request->input('dob');
        $user->country_id        = Auth::user()->country_id;
        $user->season_id        = $request->input('season');
        $user->organization_id        = Auth::user()->organization_id;
        $user->email            = $request->input('email');
        if($request->get('member')){
            $user->member_or_not=$request->input('member');
        }else{
            $user->member_or_not=0;
        }
        $user->is_approved = 1;
        $user->status=2;
          
            $clb = club::find($request->input('club'));
            $users = User::where('club_id', $request->input('club'))->orderBy('id', 'desc')->get();
             $userIds=array();
            foreach($users as $user1){
                $userIds[]=explode(' ',$user1->userId)[1];
            }
            // dd($userIds);
           if ($users->count()>0) {
                           $max=max($userIds);
                $pre =$max;
                $user->userId = $clb->prefix  . " ". str_pad(($pre + 1), 4, '0', STR_PAD_LEFT);
            } else {
                $user->userId = $clb->prefix  . " ". str_pad(1, 4, '0', STR_PAD_LEFT);
            }
        
        $user->password        = Hash::make($request->input('password'));
        $user->gender            = $request->input('gender');
        $user->remember_token            = str_random(64);
        if ($request->input('club')) {

            $user->club_id      = $request->input('club') ? $request->input('club') : "";
        }
        $user->save();
        if ($request->input('role')) {
            $user->assignRole($request->input('role'));
        }


        $user_email = $request->input('email');

        $organization = Organization::find($request->input('organization'));
        // Mail::send(
        //     ['html' => 'useraccess'],
        //     ['user' => $user, 'org' => $organization],
        //     function ($message) use ($user_email) {
        //         $message->to($user_email)
        //             ->subject('Registration');
        //     }
        // );
       
            return redirect('/organization-staffs')->with('success', ' Registered successfully');
        
    }

    // --------------------------------------------------------------------------------
    public function member_store(Request $request)
    {
        // ----------------
        if(Auth::user()->organization->orgsetting){
        if(Auth::user()->organization->orgsetting->active==1){
        $validator = Validator::make(
          $request->all(),
            [
                'first_name'            => 'required|max:255|regex:/^([a-zA-Z ]{1,255})$/ix',
                 'last_name'             => 'required|max:255|regex:/^([a-zA-Z ]{1,255})$/ix',
                'dob'                   => 'required',
                'club'               => 'required',
                'email'                 => 'required|unique:users|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix',
                'password'              => 'required|min:8|max:20|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/',
                'password_confirmation' => 'required|same:password',
                 'gender'                  => 'required',
                 'member' => 'required',
                 'tel-number'            => 'numeric|digits_between:8,15',
            ],
            [
                'first_name.required' => 'First Name is Required',
                    'first_name.regex' => 'First Name contains only letters',
                 'last_name.required'           => 'Last Name is Required',
                'last_name.regex' => 'Last Name contains only letters',
                'dob.required'    => 'Date Of Birth is Required',
                'email.required'  => 'Email is Required',
                'email.regex'  => 'please enter the valid Email',
                                'email.unique'  => 'Email has already been taken',
                'tel_number.numeric' => 'Mobile Number should be number',
                // 'tel_number.required' => 'Mobile Number is Required',
                 'gender.required'  => 'Please Choose  The Gender',
                'club.required' => 'Please Select Club',
                'member.required'  => 'Please Choose about membership',
                'password.min' => 'Password should contain minimum 8 characters',
                                'password.regex' => 'Password should contain capital letters,simple letters,number and special characters',

                'password_confirmation.same' => 'Password confirmation should be same as password'


            ]

        );
    }else{
    $validator = Validator::make(
        $request->all(),
        [
            'first_name'            => 'required|max:255|regex:/^([a-zA-Z ]{1,255})$/ix',
             'last_name'             => 'required|max:255|regex:/^([a-zA-Z ]{1,255})$/ix',
            'dob'                       => 'required',
            'club'                       => 'required',
            'email'                 => 'required|email|max:255|unique:users|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix',
            'password'              => 'required|min:8|max:20|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/',
            'password_confirmation' => 'required|same:password',
            'role'                  => 'required',
            // 'member' => 'required',
            'tel-number'            => 'numeric|digits_between:8,15',
             'gender'                  => 'required',

        ],
        [
            'first_name.required' => 'First Name is Required',
                'first_name.regex' => 'First Name contains only letters',
             'last-name.required'           => 'Last Name is Required',
            'last-name.regex' => 'Last Name contains only letters',
            'dob.required'    => 'Date Of Birth is Required',
            'club.required'       => 'Please select the club',
            'email.required'  => 'Email is Required',
            'email.unique'  => 'Email has already been taken',
            // 'tel-number.required' => 'Mobile Number is required',
            //   'tel-number.digits_between' => 'Mobile Number at least contains 8 digits',
            'tel-number.numeric' => 'Mobile Number should be number',
            'password.required'  => 'Password is Required',
             'password_confirmation.required'  => "Password Confirmation doesn't match",
            'password_confirmation.same'  => "Password Confirmation doesn't match",
             'password.regex' => 'Password should contain capital letters,simple letters,number and special characters',
            'role.required'  => 'Please Select The Role',
                             'gender.required'  => 'Please Choose  The Gender',
                            //  'member.required'  => 'Please Choose about membership',



        ]

    );
}
        }
else{
        $validator = Validator::make(
            $request->all(),
              [
                  'first_name'            => 'required|max:255|regex:/^([a-zA-Z ]{1,255})$/ix',
                   'last_name'             => 'required|max:255|regex:/^([a-zA-Z ]{1,255})$/ix',
                  'dob'                   => 'required',
                  'club'               => 'required',
                  'email'                 => 'required|unique:users|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix',
                  'password'              => 'required|min:8|max:20|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/',
                  'password_confirmation' => 'required|same:password',
                   'gender'                  => 'required',
                //    'member' => 'required',
                'tel-number'            => 'numeric|digits_between:8,15',
              ],
              [
                  'first_name.required' => 'First Name is Required',
                      'first_name.regex' => 'First Name contains only letters',
                   'last_name.required'           => 'Last Name is Required',
                  'last_name.regex' => 'Last Name contains only letters',
                  'dob.required'    => 'Date Of Birth is Required',
                  'email.required'  => 'Email is Required',
                  'email.regex'  => 'please enter the valid Email',
                                  'email.unique'  => 'Email has already been taken',
                  'tel-number.numeric' => 'Mobile Number should be number',
                  // 'tel_number.required' => 'Mobile Number is Required',
                   'gender.required'  => 'Please Choose  The Gender',
                  'club.required' => 'Please Select Club',
                //   'member.required'  => 'Please Choose about membership',
                  'password.min' => 'Password should contain minimum 8 characters',
                                  'password.regex' => 'Password should contain capital letters,simple letters,number and special characters',
  
                  'password_confirmation.same' => 'Password confirmation should be same as password'
  
  
              ]
  
          );
    }
    
        // -----------------

        if ($validator->fails()) {
            // if (Auth::user()->hasRole(1) || Auth::user()->hasRole(8)) {
            //     return redirect('organizations/create_org_member')->withErrors($validator)->withInput();
            // } else {
                return redirect('organizations/create_org_member')->withErrors($validator)->withInput();
            // }
        }



        $user = new User;
        $user->first_name             = $request->input('first_name');

        $user->last_name           = $request->input('last_name');
        $user->tel_number = $request->input('tel_number');
        $user->dob             = $request->input('dob');
        $user->country_id        = Auth::user()->country_id;
        $user->season_id        = $request->input('season');
        $user->organization_id        = Auth::user()->organization_id;
        $user->email            = $request->input('email');
        if($request->get('member')){
            $user->member_or_not=$request->input('member');
        }else{
            $user->member_or_not=0;
        }
        $user->is_approved = 1;
        $user->status=2;
            $clb = club::find($request->input('club'));
            $users = User::where('club_id', $request->input('club'))->orderBy('id', 'desc')->get();
             $userIds=array();
            foreach($users as $user1){
                $userIds[]=explode(' ',$user1->userId)[1];
            }
            // dd($userIds);
           if ($users->count()>0) {
                           $max=max($userIds);
                $pre =$max;
                $user->userId = $clb->prefix  . " ". str_pad(($pre + 1), 4, '0', STR_PAD_LEFT);
            } else {
                $user->userId = $clb->prefix  . " ". str_pad(1, 4, '0', STR_PAD_LEFT);
            }
      
        $user->password        = Hash::make($request->input('password'));
        $user->gender            = $request->input('gender');
        $user->remember_token            = str_random(64);
        if ($request->input('club')) {

            $user->club_id      = $request->input('club') ? $request->input('club') : "";
        }
        $user->save();
        if ($request->input('role')) {
            $user->assignRole($request->input('role'));
        }


        $user_email = $request->input('email');

        $organization = Organization::find($request->input('organization'));
        // Mail::send(
        //     ['html' => 'useraccess'],
        //     ['user' => $user, 'org' => $organization],
        //     function ($message) use ($user_email) {
        //         $message->to($user_email)
        //             ->subject('Registration');
        //     }
        // );
        if (Auth::user()->hasRole(1) || Auth::user()->hasRole(8)) {
            return redirect('/org_member_data')->with('success', ' Registered successfully');
        } else {
            return redirect('/org_member_data')->with('success', ' Registered successfully');
        }
    }
    // ----------------------------------------------------------------------------------

    /**
     * User update.
     *
     * @param  int $id
     * @return View
     */
    public function edit($id)
    {
        $organizations = Organization::all();
        $clubs = Club::all();
        $user = User::find(Crypt::decrypt($id));
        $countries = Country::all();
        $general = generalSetting::first();
        $age = Carbon::parse(Auth::user()->dob)->diff(Carbon::now())->y;
        $clubs=Club::where('is_approved',1)->has('users','>',0)->get();
        $orgs = Organization::where('status',1)->has('users','>',0)->get();
        return view('admin.users.edit', compact('organizations', 'user', 'countries', 'age', 'clubs','orgs'));
    }
    public function edit2($id)
    {
        // dd('ih');
        $organizations = Organization::all();
        $user = User::find(Crypt::decrypt($id));
        $countries = Country::all();
        $general = generalSetting::first();
        $age = Carbon::parse(Auth::user()->dob)->diff(Carbon::now())->y;
        return view('admin.users.edit-2', compact('organizations', 'user', 'countries', 'age', 'general'));
    }
    public function memberEdit(Request $request ,$id){
        $organizations = Organization::all();
        $clubs = Club::all();
        $user = User::find(Crypt::decrypt($id));
        $countries = Country::all();
        $general = generalSetting::first();
        $age = Carbon::parse(Auth::user()->dob)->diff(Carbon::now())->y;
        $clubs=Club::where('is_approved',1)->has('users','>',0)->get();
        $orgs = Organization::where('status',1)->has('users','>',0)->get();
        return view('admin.users.edit-3', compact('organizations', 'user', 'countries', 'age', 'clubs','orgs'));
    }
    /**
     * User update form processing page.
     *
     * @param  User $user
     * @param UserRequest $request
     * @return Redirect
     */
       public function memberUpdate(Request $request, $id)
    {
            $user = User::find($id);
        if ($image = $request->file('profile_logo')) {
            $destinationPath = 'profile/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['profile_logo'] = "$profileImage";
        }

        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->organization_id = Auth::user()->organization_id;
        $user->guardian_name = $request->input('gu_name');
        $user->guardian_mail = $request->input('gu_email');
        $user->guardian_number = $request->input('gu_number');
        $user->gender = $request->input('gender');
        $user->country_id = $request->input('country');
        $user->state = $request->input('state');
        $user->city = $request->input('city');
        $user->address = $request->input('address');
        $user->postal = $request->input('postal');
        $user->tel_number=$request->input('tel');
        $user->dob=$request->input('dob');
        $user->first_login=1;
        if ($request->file('profile_logo')) {
            $user->profile_pic =  $input['profile_logo'];
        }
        if ($request->file('medical_report')) {
            $user->medical_report =  $input['medical_report'];
        }
        if ($request->password !== null) {
            $user->password = Hash::make($request->password);
        }
        
          
        
        $user->save();
        $id = $user->id;
        if(Auth::user()->hasRole(3)){
                        return redirect("/club-members")->with('success', 'Your profile detail is updated successfully');

        }
        else{
                        return redirect("/members")->with('success', 'Your profile detail is updated successfully');

        }
       
        
    }
    public function updateMembership(Request $request){
        $user=User::find(Auth::user()->id);
        $user->member_or_not=$request->input('member');
        $user->membership_updated_year=Carbon::now();
        $user->save();
        return redirect()->back();
    }
    public function update(Request $request, $id)
    {
        // dd($request->all());
     
       


            $user = User::find($id);
       
        $user->first_name = $request->input('first_name');
         $user->last_name = $request->input('last_name');
        $user->organization_id = Auth::user()->organization_id;
        $user->guardian_name = $request->input('gu_name');
        $user->guardian_mail = $request->input('gu_email');
        $user->guardian_number = $request->input('gu_number');
        $user->gender = $request->input('gender');
        $user->country_id = $request->input('country');
        $user->state = $request->input('state');
        $user->city = $request->input('city');
        $user->address = $request->input('address');
        $user->postal = $request->input('postal');
        $user->tel_number=$request->input('tel');
        $user->first_login=1;
        // if ($request->file('profile_logo')) {
        //     $user->profile_pic =  $input['profile_logo'];
        // }
        if ($request->file('medical_report')) {
            $user->medical_report =  $input['medical_report'];
        }
        // if ($request->password != null) {
        //     $user->password = Hash::make($request->password);
        // }
        if($request->get('ImageUrl')){
            $image = $request->get('ImageUrl');
            $folderPath = public_path('profile/');
            if(!File::isDirectory($folderPath)){
                File::makeDirectory($folderPath, 0777, true, true);
            } 
            $image_parts = explode(";base64,", $image);
            $image_type_aux = explode("image/", $image_parts[0]);
            $image_type = $image_type_aux[1];
            $image_base64 = base64_decode($image_parts[1]);
            $imageName = time() . $image_type;
            $imageFullPath = $folderPath.$imageName;
            file_put_contents($imageFullPath, $image_base64);
            $profile_pic = "$imageName";
            $user->profile_pic = $profile_pic;
        }
        $user->save();
        $id = Crypt::encrypt($user->id);
        if (Auth::user()->hasRole(8)) {
            return redirect("/user/$id")->withInput(['tab' => 'tab1']);
        } else {
            return redirect("users/$id")->with('success', 'Your profile detail is updated successfully');
        }
    }
public function orgStaffs(Request $request){

}
    public function addReport($id, Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'report'                  => 'required|max:255',
                'reportImage'=>'required',
                
            ],
            [
                'report.required' => 'Please select the report to be updated',
                'reportImage.required' => 'Please select the reportImage to be updated',

            ]);
        if ($validator->fails()) 

        { 

            $id=Auth::user()->id;
            return redirect("user/$id")->withErrors($validator)->withInput();

                        
        } 

        $id = Auth::user()->id;

        if ($request->input('report2')) {

            if ($request->input('report') == 1) {
                $policeReport = UserReport::where('user_id', Auth::user()->id)->where('report_name_id', 1)->first();

                if ($policeReport) {
                    $policeReport->delete();
                    $report = new UserReport;
                    $report->user_id = Auth::user()->id;


                    $report->report_name_id = $request->input('report');
                    $image = $request->file('reportImage');
                    $destinationPath = 'user-reports/';
                    $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
                    $image->move($destinationPath, $profileImage);

                    if ($image) {
                        $input['reportImage'] = "$profileImage";

                        $report->reports =  $input['reportImage'];
                    }
                }
            }
            if ($request->input('report') == 2) {

                $medicalReport = UserReport::where('user_id', Auth::user()->id)->where('report_name_id', 2)->first();
                if ($medicalReport) {
                    $medicalReport->delete();
                    $report = new UserReport;
                    $report->user_id = Auth::user()->id;

                    $report->report_name_id = $request->input('report');
                    $image = $request->file('reportImage');
                    $destinationPath = 'user-reports/';
                    $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
                    $image->move($destinationPath, $profileImage);

                    if ($image) {
                        $input['reportImage'] = "$profileImage";

                        $report->reports =  $input['reportImage'];
                    }
                }
            }
            if ($request->input('report') == 3) {
                $medicalReport = UserReport::where('user_id', Auth::user()->id)->where('report_name_id', 2)->first();
                if ($medicalReport) {
                    $medicalReport->delete();
                    $report = new UserReport;
                    $report->user_id = Auth::user()->id;
                    $report->report_name_id = $request->input('report');
                    $image = $request->file('reportImage');
                    $destinationPath = 'user-reports/';
                    $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
                    $image->move($destinationPath, $profileImage);
                    if ($image) {
                        $input['reportImage'] = "$profileImage";
                        $report->reports =  $input['reportImage'];
                    }
                }
            }
            $report->save();
        }
         else {

$user=User::find(Auth::user()->id);
$user->first_login=1;
$user->save();
            $report = new UserReport;
            $report->user_id = $request->input('userId');
            if ($request->input('report') == 1) {
                $report->report_name_id = $request->input('report');
                $image = $request->file('reportImage');
                $destinationPath = 'user-reports/';
                $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $profileImage);

                if ($image) {
                    $input['reportImage'] = "$profileImage";

                    $report->reports =  $input['reportImage'];
                }
            }
            if ($request->input('report') == 2) {
                $report->report_name_id = $request->input('report');
                $image = $request->file('reportImage');
                $destinationPath = 'user-reports/';
                $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $profileImage);

                if ($image) {
                    $input['reportImage'] = "$profileImage";

                    $report->reports =  $input['reportImage'];
                }
            }
            if ($request->input('report') == 3) {
                $report->report_name_id = $request->input('report');
                $image = $request->file('reportImage');
                $destinationPath = 'user-reports/';
                $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $profileImage);

                if ($image) {
                    $input['reportImage'] = "$profileImage";

                    $report->reports =  $input['reportImage'];
                }
            }
            $report->save();
            session(["id" => $request->input('userId')]);
           
        }
        return back()->withInput(['tab' => 'tab3']);
    }

    public function downloadReport(Request $request,$id){
        $userReport=UserReport::find($id);
        // $filePath=

        return response()->download(public_path('user-reports/' . $userReport->reports));
    }
    public function editReport($id, Request $request)
    {
        $userReport = UserReport::find($id);
        $userReport2 = $userReport->reports;
        // dd('<img src="/user-reports/'.$userReport2.'"');
        $report = $userReport->reportName;
        return response()->json([
            'userReport2' => $userReport2,
            'report' => $report
        ]);
    }
    public function fetchReports($id)
    {
        $id = session("id");
        $user = User::find($id);
        $userReports = $user->userReports->orderBy('created_at', 'desc');

        $user = Auth::user();
        $organizations = Organization::all();
        $reports = ReportName::all();
        return view('admin.users.show', compact('userReports', 'organizations', 'user', 'reports'));
    }

    public function fetchReports2($id)
    {

        $userReport = UserReport::find($id);
        $userReport2 = $user->userReports->orderBy('created_at', 'desc');
        $reportId = $userReport->report_name_id;
        return response()->json([
            'userReport2' => $userReport2,
            'reportId' => $reportId
        ]);
    }

public function delete($id){
    $user=User::find($id);
    $user->is_approved=10;
    $user->first_name="Unknown";
    $user->last_name="Unknown";
    $user->email=null;
    $user->save();
    $url="/club-members";
     return response()->json([
            'url' => $url,
        ]);
} 
    /**
     * Show a list of all the deleted users.
     *
     * @return View
     */
    public function getDeletedUsers()
    {
        // Grab deleted users
        $users = User::onlyTrashed()->get();

        // Show the page
        return view('admin.deleted_users', compact('users'));
    }


    /**
     * Delete Confirm
     *
     * @param   int $id
     * @return  View
     */
    public function getModalDelete($id = null)
    {
        $model = 'users';
        $confirm_route = $error = null;
        try {
            // Get user information
            $user = Sentinel::findById($id);

            // Check if we are not trying to delete ourselves
            if ($user->id === Sentinel::getUser()->id) {
                // Prepare the error message
                $error = trans('users/message.error.delete');

                return view('admin.layouts.modal_confirmation', compact('error', 'model', 'confirm_route'));
            }
        } catch (UserNotFoundException $e) {
            // Prepare the error message
            $error = trans('users/message.user_not_found', compact('id'));
            return view('admin.layouts.modal_confirmation', compact('error', 'model', 'confirm_route'));
        }
        $confirm_route = route('admin.users.delete', ['id' => $user->id]);
        return view('admin.layouts.modal_confirmation', compact('error', 'model', 'confirm_route'));
    }

    /**
     * Delete the given user.
     *
     * @param  int $id
     * @return Redirect
     */
    public function destroy($id = null)
    {
        try {
            // Get user information
            $user = Sentinel::findById($id);

            // Check if we are not trying to delete ourselves
            if ($user->id === Sentinel::getUser()->id) {
                // Prepare the error message
                $error = trans('admin/users/message.error.delete');

                // Redirect to the user management page
                return Redirect::route('admin.users.index')->with('error', $error);
            }

            // Delete the user
            //to allow soft deleted, we are performing query on users model instead of Sentinel model
            //$user->delete();
            User::destroy($id);
            Activation::where('user_id', $user->id)->delete();
            // Prepare the success message
            $success = trans('users/message.success.delete');
            //Activity log for user delete
            activity($user->full_name)
                ->performedOn($user)
                ->causedBy($user)
                ->log('User deleted by ' . Sentinel::getUser()->full_name);

            // Redirect to the user management page
            return Redirect::route('admin.users.index')->with('success', $success);
        } catch (UserNotFoundException $e) {
            // Prepare the error message
            $error = trans('admin/users/message.user_not_found', compact('id'));

            // Redirect to the user management page
            return Redirect::route('admin.users.index')->with('error', $error);
        }
    }

    /**
     * Restore a deleted user.
     *
     * @param  int $id
     * @return Redirect
     */
    public function getRestore($id = null)
    {

        $data = new stdClass();
        try {
            // Get user information
            $user = User::withTrashed()->find($id);

            // Restore the user
            $user->restore();

            // create activation record for user and send mail with activation link
            $data = [
                'user_name' => $user->first_name . ' ' . $user->last_name,
                'activationUrl' => URL::route('activate', [$user->id, Activation::create($user)->code])
            ];
            Mail::to($user->email)
                ->send(new Restore($data));
            // Prepare the success message
            $success = trans('users/message.success.restored');
            //activity log
            activity($user->full_name)
                ->performedOn($user)
                ->causedBy($user)
                ->log('User restored by ' . Sentinel::getUser()->full_name);
            // Redirect to the user management page
            return Redirect::route('admin.deleted_users')->with('success', $success);
        } catch (UserNotFoundException $e) {
            // Prepare the error message
            $error = trans('users/message.user_not_found', compact('id'));

            // Redirect to the user management page
            return Redirect::route('admin.deleted_users')->with('error', $error);
        }
    }

    /**
     * Display specified user profile.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        // dd(Crypt::decrypt($id));
        $general = generalSetting::first();
        // dd($general->website_url/users);
        // if(Auth::user()->id!=$id && (URL::previous()==$general->website_url.'users'||URL::previous()==$general->website_url.'organization-staffs'||URL::previous()==$general->website_url.'org_member_data'||URL::previous()==$general->website_url.'club-members')){
            $user = User::find(Crypt::decrypt($id));

        // $organizations = Organization::all();
        // $reports = ReportName::all();
        
        // $userReports = $user->userReports;
        // $general = generalSetting::first();
        // $message=null;
        // return view('admin.users.show', compact('userReports', 'organizations', 'user', 'reports','message'));
        // }
        //  elseif(Auth::user()->id!=$id){
        // $user = User::find(Auth::user()->id);

        // $organizations = Organization::all();
        // $reports = ReportName::all();
        
        // $userReports = $user->userReports;
        // $general = generalSetting::first();
        // $message="You don't have the permission to view this info";

        // return view('admin.users.show', compact('userReports', 'organizations', 'user', 'reports','message'));
        //  }
        // $user = User::find($id);
            // dd($user);
            $existReports=$user->userReports;
            $ids=array();
            foreach($existReports as $rep){
                $ids[]=$rep->report_name_id;
            }
            $reports = ReportName::whereNotIn('id',$ids)->get();
            $userReports = $user->userReports()->orderBy('id', 'desc')->get();
        $organizations = Organization::all();
        $message=null;

        // $userReports = $user->userReports?$user->userReports:'';
        $general = generalSetting::first();
        return view('admin.users.show', compact('userReports', 'organizations', 'user', 'reports','message'));
    }
    public function show2($id)
    {
        $user = User::find(Crypt::decrypt($id));
        $existReports=$user->userReports;
        $ids=array();
        foreach($existReports as $rep){
            $ids[]=$rep->report_name_id;
        }
        $message=null;
        $organizations = Organization::all();
        $reports = ReportName::whereNotIn('id',$ids)->get();
        $userReports = $user->userReports()->orderBy('id', 'desc')->get();

        $general = generalSetting::first();

        return view('admin.users.show-2', compact('userReports', 'organizations', 'user', 'reports', 'general','ids','message'));
}
    
    public function viewUser($id)
    {

        $user = User::find(Crypt::decrypt($id));
        $organizations = Organization::all();
        $reports = ReportName::all();
        $userReports = $user->userReports;

        $general = generalSetting::first();
        if (Auth::user()->hasRole(3)) {
            return view('clubs.clubmembershow', compact('userReports', 'organizations', 'user', 'reports', 'general'));
        }else{
        return view('admin.users.show-3', compact('userReports', 'organizations', 'user', 'reports', 'general'));
        }
    }

    public function passwordreset($id, Request $request)
    {
        $user = User::find($id);
        $user->password = Hash::make($request->password);
        $user->save();
    }

    public function lockscreen($id)
    {
        if (Sentinel::check()) {
            $user = Sentinel::findUserById($id);
            return view('admin.lockscreen', compact('user'));
        }
        return view('admin.login');
    }

    public function postLockscreen(Request $request)
    {
        $password = Sentinel::getUser()->password;
        if (Hash::check($request->password, $password)) {
            return 'success';
        } else {
            return 'error';
        }
    }

  public function users(Request $request)
    {
        $id = Session::get('id');
        Session::forget('userCategories');
        $roles = Role::whereNotIn('id', ['8', '1', '2'])->get();
        $seasons = Season::all();
        $genders = Gender::all();
        $clubs=Club::all();
        $setting = OrganizationSetting::where('organization_id', Auth::user()->organization_id !== null ? Auth::user()->organization_id : $id)->first();
        $header = $setting ? $setting->header : '';
        $users = User::where([['organization_id','=',Auth::user()->organization_id !== null ? Auth::user()->organization_id : $id],['is_approved','=',1]])->get();
        return view('admin.users.users', compact('users', 'roles', 'seasons', 'setting', 'header', 'genders','clubs'));
    }
    function filter(Request $request)
    {
        $id = Session::get('id');
        $roles = Role::whereNotIn('id', ['8', '1', '2'])->get();
        $seasons = Season::all();
        $genders = Gender::all();
        $setting = OrganizationSetting::where('organization_id', Auth::user()->organization_id !== null ? Auth::user()->organization_id : $id)->first();
        $header = $setting ? $setting->header : '';  // dd($header);
        $users = User::where([['organization_id','=',Auth::user()->organization_id !== null ? Auth::user()->organization_id : $id],['is_approved','=',1]]);
        $categories = $request->input('obj');
        Session::put('userCategories', $categories);
        if($categories){
        foreach ($categories as $key => $values) {
           if ($key == "role") {
            if($values!=0){
                $roleName=Role::find($values);
                $users =  $users->role($roleName->name);
            }
            } 
            elseif ($key == "gender") {
                if($values!=0){
                    if ($values==1) {
                        $gender = "male";
                    } else {
                        $gender = 'female';
                    }
                    $users = $users->where('gender', $gender);
                }
            } 
            elseif ($key == "name") {
                if($values!=null){
                    $users = $users->where('first_name', 'like', '%' . $values. '%');
                }
            }
            elseif ($key == "club") {
                if($values!=0){
                    if ($values=="exceptClub"){
                        $users = User::where([['organization_id','=',Auth::user()->organization_id !== null ? Auth::user()->organization_id : $id],['is_approved','=',1]])->where('club_id',null);
                    } else {
                        $users =  $users->where('club_id', $values);
                    }                
                }
            }
            
        }
    }else{
        $users = User::where([['organization_id','=',Auth::user()->organization_id !== null ? Auth::user()->organization_id : $id],['is_approved','=',1]]);

    }
        $users = $users->get();
        
        $view = view('admin.users.filterUserData', compact('users', 'genders', 'roles', 'seasons', 'setting'))->render();
        $view2 = view('admin.users.printUserPreview', compact('users', 'genders', 'roles', 'seasons', 'setting', 'header'))->render();

        return response()->json(['html' => $view]);
    }

    public function generatePDF(Request $request)
    {
       
        $id = Session::get('id');

        $countries = Country::all();
        $seasons = Season::all();
        $setting = OrganizationSetting::where('organization_id', Auth::user()->organization_id !== null ? Auth::user()->organization_id : $id)->first();
        $header = $setting ? $setting->header : '';
        $users = User::where([['organization_id','=',Auth::user()->organization_id !== null ? Auth::user()->organization_id : $id],['is_approved','=',1]]);
        $categories = Session::get('userCategories');
        if($categories){
            foreach ($categories as $key => $values) {
               if ($key == "role") {
                if($values!=0){
                    $roleName=Role::find($values);
                    $users =  $users->role($roleName->name);
                }
                } 
                elseif ($key == "gender") {
                    if($values!=0){
                        if ($values==1) {
                            $gender = "male";
                        } else {
                            $gender = 'female';
                        }
                        $users = $users->where('gender', $gender);
                    }
                } 
                elseif ($key == "name") {
                    if($values!=null){
                        $users = $users->where('first_name', 'like', '%' . $values. '%');
                    }
                }
                elseif ($key == "club") {
                    if($values!=0){
                        if ($values=="exceptClub"){
                            $users = User::where([['organization_id','=',Auth::user()->organization_id !== null ? Auth::user()->organization_id : $id],['is_approved','=',1]])->where('club_id',null);
                        } else {
                            $users =  $users->where('club_id', $values);
                        }                
                    }
                }
                
            }
        }else{
            $users = User::where([['organization_id','=',Auth::user()->organization_id !== null ? Auth::user()->organization_id : $id],['is_approved','=',1]]);
    
        }
        $users = $users->get();
        $pdf = app('dompdf.wrapper');
        $pdf->getDomPDF()->set_option("enable_php", true);
        $pdf = PDF::loadView('admin.users.userPdf', compact('users', 'setting', 'header'))->setPaper('a4', 'landscape');
        return $pdf->stream('users.pdf');
    }
    public function excel(Request $request)
    {
        $id = Session::get('id');
        $categories = Session::get('userCategories');
        return Excel::download(new UsersExport($categories,$id), 'Users.xlsx');
    }

    // ---------------------------------------------------------
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

    public function staff_data()
    {
        // dd("hi");
        $id = Session::get('id') ? Session::get('id') : '';
        $roles = Role::whereNotIn('id', ['1', '3', '8'])->get();
        $users = User::Role(['Starter', 'Judge', 'EventOrganizer'])->where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->get();
        //  dd($users);
        // $users=Role::whereNotIn('id', ['1', '2', '7', '8'])->get();
        // -----------------------------------------------------------------------------------

        return DataTables::of($users)
            ->editColumn('created_at', function (User $user) {
                return $user->created_at->format('m/d/Y');
            })
            ->addColumn('roles', function ($user) {

                return $user->roles->pluck('name')[0];
            })

            ->addColumn('actions', function ($user) {

                $actions = '<a href=' . route('users.show', $user->id) . '><button style="padding: 2px 4px" class=" btn btn-primary" ata-toggle="tooltip" data-placement="top" title="View User"><i class="material-icons" style="margin-bottom:5px">visibility</i></button></a>';
                return $actions;
            })

            // ->addColumn('roles', function ($user) use($roles)  {
            //     $options = '';
            //     foreach ($roles as $role) {
            //         $options .= '<option value="test">'.$role->name.'</option>';
            //     }
            //     $rolenames='<select class="change">' . $options . '</select>';   
            //     return $rolenames;
            // })
            ->rawColumns(['actions'])
            ->make(true);
    }

    public function org_member_data(Request $request)
    {
        $id = Session::get('id');
        $general = generalSetting::first();
        $setting = OrganizationSetting::where('organization_id', Auth::user()->organization_id !== null ? Auth::user()->organization_id : $id)->first();
        $header = $setting ? $setting->header : ''; 
        $org=Auth::user()->organization;

        if($request->ajax()){
            $search3 = $request->get('query');
            Session::put('search3', $search3);
            $sorttypeMember = $request->get('sorttypeMember');
            $sortByMember = $request->get('sortbyMember');
            Session::put('sorttypeMember',$sorttypeMember);
            Session::put('sortByMember',$sortByMember );
            $dob=null;
            if(is_numeric($search3)&& ((strlen($search3)==1)||(strlen($search3)==2))){
                $today=Carbon::now()->format('Y');
                $dob=$today-$search3;
                Session::put('dob',$dob);
                }
                if($search3 !=' '){ 
                    if($sortByMember){
                        if($sortByMember=='club'){
                    $users = User::Role(['Player'])->where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)
                    ->where(function($query) use($search3,$dob){
                        return $query
                        ->Where('last_name','like', '%' . $search3 . '%')
                        ->orWhere('first_name','like', '%' . $search3 . '%')
                        ->orwhere('email', $search3 )
                        ->orWhereYear('dob',$dob!=null?$dob:'');
    
                    })->orderBy(Club::select('club_name')->whereColumn('clubs.id','users.club_id'),$sorttypeMember)->paginate(10);
                }else{
                    $users = User::Role(['Player'])->where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)
                    ->where(function($query) use($search3,$dob){
                        return $query
                        ->Where('last_name','like', '%' . $search3 . '%')
                        ->orWhere('first_name','like', '%' . $search3 . '%')
                        ->orwhere('email', $search3 )
                        ->orWhereYear('dob',$dob!=null?$dob:'');
                    })->orderBy($sortByMember,$sorttypeMember)->paginate(10);

                }
            }else{
                $users = User::Role(['Player'])->where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)
                ->where(function($query) use($search3,$dob){
                    return $query
                    ->Where('last_name','like', '%' . $search3 . '%')
                    ->orWhere('first_name','like', '%' . $search3 . '%')
                    ->orwhere('email', $search3 )                    
                    ->orWhereYear('dob',$dob!=null?$dob:'');
                })->paginate(10);


            }
                }else{
                    if($sortByMember){
                        if($sortByMember=='club'){
                            $users = User::Role(['Player'])
                            ->orderBy(Club::select('club_name')->whereColumn('clubs.id','users.club_id'),$sorttypeMember)
                            ->paginate(10);
                        }else{
                            $users = User::Role(['Player'])
                            ->where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)
                            ->orderBy($sortByMember,$sorttypeMember)->paginate(10);
        
                        }
        
                    }else{
                        $users = User::Role(['Player'])->where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->orderBy('created_at','desc')->paginate(10);
                    }
                }
                    return view('organizations.show_org_members_table',compact('org','users','setting','header'));
            
                
        }
       
       
        $printusers = User::Role(['Player'])->where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->orderBy('created_at','desc')->get();
        $users = User::Role(['Player'])->where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->orderBy('created_at','desc')->paginate(10);
        return view('organizations.show_org_members',compact('org','users','setting','header','printusers'));
      
    }
    public function org_member_Pdf(Request $request)
    {
        $id = Session::get('id');
        $search3 = Session::get('search3');
        $sorttypeMember = Session::get('sorttypeMember');
        $sortByMember = Session::get('sortByMember');
        $dob = Session::get('dob');
       
        $general = generalSetting::first();
        $setting = OrganizationSetting::where('organization_id', Auth::user()->organization_id !== null ? Auth::user()->organization_id : $id)->first();
        $header = $setting ? $setting->header : '';
     $org=Auth::user()->organization;
        // dd($search3)
        if(is_numeric($search3)&& ((strlen($search3)==1)||(strlen($search3)==2))){
            $today=Carbon::now()->format('Y');
            $dob=$today-$search3;
            Session::put('dob',$dob);
            }
            if($search3 !=''){ 
                if($sortByMember){
                    if($sortByMember=='club'){
                $usermems = User::Role(['Player'])->where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)
                ->where(function($query) use($search3,$dob){
                    return $query
                    ->Where('last_name','like', '%' . $search3 . '%')
                    ->orWhere('first_name','like', '%' . $search3 . '%')
                    ->where('email', $search3 )
                    ->orWhereYear('dob',$dob!=null?$dob:'');

                })->orderBy(Club::select('club_name')->whereColumn('clubs.id','users.club_id'),$sorttypeMember)->get();
            }else{
                $usermems = User::Role(['Player'])->where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)
                ->where(function($query) use($search3,$dob){
                    return $query
                    ->orWhere('last_name','like', '%' . $search3 . '%')
                    ->orWhere('first_name','like', '%' . $search3 . '%')
                    ->orwhere('email', $search3 )
                    ->orWhereYear('dob',$dob!=null?$dob:'');

                })->orderBy($sortByMember,$sorttypeMember)->get();

            }
        }else{
            $usermems = User::Role(['Player'])->where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)
            ->where(function($query) use($search3,$dob){
                return $query
                ->orWhere('last_name','like', '%' . $search3 . '%')
                ->orWhere('first_name','like', '%' . $search3 . '%')
                ->orwhere('email', $search3 )
                ->orWhereYear('dob',$dob!=null?$dob:'');

            })->get();

        }
            }else{
                if($sortByMember){
                    if($sortByMember=='club'){
                        $usermems = User::Role(['Player'])
                        ->orderBy(Club::select('club_name')->whereColumn('clubs.id','users.club_id'),$sorttypeMember)
                        ->get();
                    }else{
                        $usermems = User::Role(['Player'])
                        ->where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)
                        ->orderBy($sortByMember,$sorttypeMember)->get();
    
                    }
    
                }else{
                    $usermems = User::Role(['Player'])->where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->orderBy('created_at','desc')->get();

                }
            }
            $pdf = app('dompdf.wrapper');
        $pdf->getDomPDF()->set_option("enable_php", true);
        $pdf = PDF::loadView('organizations.org_members_pdf', compact('org','usermems', 'setting', 'header'))->setPaper('a4', 'landscape');
        return $pdf->stream('org_members.pdf');
            
    }
    public function org_member_Print(Request $request)
    {
        $id = Session::get('id') ? Session::get('id') : '';
        $search3 = Session::get('search3');
        $sorttypeMember = Session::get('sorttypeMember');
        $sortByMember = Session::get('sortByMember');
        $dob = Session::get('dob');
        $general = generalSetting::first();
        $setting = OrganizationSetting::where('organization_id', Auth::user()->organization_id !== null ? Auth::user()->organization_id : $id)->first();
        $header = $setting ? $setting->header : '';
        $org=Auth::user()->organization;
            $dob=null;
            if(is_numeric($search3)&& ((strlen($search3)==1)||(strlen($search3)==2))){
                $today=Carbon::now()->format('Y');
                $dob=$today-$search3;
                Session::put('dob',$dob);
                }
                if($search3 !=''){ 
                    if($sortByMember){
                        if($sortByMember=='club'){
                    $printusers = User::Role(['Player'])->where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)
                    ->where(function($query) use($search3,$dob){
                        return $query
                        ->Where('last_name','like', '%' . $search3 . '%')
                        ->orWhere('first_name','like', '%' . $search3 . '%')
                        ->orwhere('email', $search3 )
                        ->orWhereYear('dob',$dob!=null?$dob:'');
    
                    })->orderBy(Club::select('club_name')->whereColumn('clubs.id','users.club_id'),$sorttypeMember)->get();
                }else{
                    $printusers = User::Role(['Player'])->where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)
                    ->where(function($query) use($search3,$dob){
                        return $query
                        ->Where('last_name','like', '%' . $search3 . '%')
                        ->orWhere('first_name','like', '%' . $search3 . '%')
                        ->orwhere('email', $search3 )
                        ->orWhereYear('dob',$dob!=null?$dob:'');
    
                    })->orderBy($sortByMember,$sorttypeMember)->get();

                }
            }else{
                $printusers = User::Role(['Player'])->where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)
                ->where(function($query) use($search3,$dob){
                    return $query
                    ->Where('last_name','like', '%' . $search3 . '%')
                    ->orWhere('first_name','like', '%' . $search3 . '%')
                    ->orwhere('email', $search3 )
                    ->orWhereYear('dob',$dob!=null?$dob:'');

                })->get();

            }
                }else{
                    if($sortByMember){
                        if($sortByMember=='club'){
                            $printusers = User::Role(['Player'])
                            ->orderBy(Club::select('club_name')->whereColumn('clubs.id','users.club_id'),$sorttypeMember)
                            ->get();
                        }else{
                            $printusers = User::Role(['Player'])
                            ->where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)
                            ->orderBy($sortByMember,$sorttypeMember)->get();
        
                        }
        
                    }else{
                        $printusers = User::Role(['Player'])->where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->orderBy('created_at','desc')->get();

                    }
                }
                    // dd($users);
                    $view = view('organizations.org_member_print', compact('org','printusers','id','setting','header'))->render();
                    return response()->json(['html' => $view
                ]);
      

    }
    public function User_mem_Excel(Request $request)
    {

        $search3 = Session::get('search3');
        $sorttypeMember = Session::get('sorttypeMember');
        $sortByMember = Session::get('sortByMember');
        $id = Session::get('id');
        
        
        return Excel::download(new Org_Members_Export($search3, $id,$sorttypeMember,$sortByMember), 'Org_Members_List.xlsx');
            
    }
    public function generateuserPdf(Request $request)
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
    public function userExcel(Request $request)
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
// -------------------------------User list search -------------------------------------------------------
    public function UserListSearch(Request $request){
        $id = Session::get('id');
      $dob=null;

        $search = $request->get('query')?$request->get('query'):'';
       if(is_numeric($search)&& ((strlen($search)==1)||(strlen($search)==2))){
       $today=Carbon::now()->format('Y');
       $dob=$today-$search;
       }
        Session::put('suvarna', $search);
        if($search){
            $users2 = User::whereNotIn('id', [1])->whereHas('roles', function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%');

                
            })
            ->orwhereHas('club', function ($q) use ($search) {
                $q->where('club_name', 'like', '%' . $search . '%');

            })
            ->orwhereHas('country', function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%');
            })
            ->orwhereHas('organization', function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%');
            })
           
              
            
            ->orWhere('first_name','like', '%' . $search . '%')
            ->orWhere('email', $search )
            ->orWhere('tel_number',$search)
            ->orWhere('last_name','like', '%' . $search . '%')
            ->orWhereYear('dob',$dob!=null?$dob:'')
                        ->get();
                        $users = User::whereNotIn('id', [1])->whereHas('roles', function ($q) use ($search) {
                            $q->where('name', 'like', '%' . $search . '%');
            
                            
                        })
                        ->orwhereHas('club', function ($q) use ($search) {
                            $q->where('club_name', 'like', '%' . $search . '%');
            
                        })
                        ->orwhereHas('country', function ($q) use ($search) {
                            $q->where('name', 'like', '%' . $search . '%');
                        })
                        ->orwhereHas('organization', function ($q) use ($search) {
                            $q->where('name', 'like', '%' . $search . '%');
                        })                        
                        ->orWhere('first_name','like', '%' . $search . '%')
                        ->orWhere('last_name','like', '%' . $search . '%')
                        ->orWhere('email', $search )
                        ->orWhere('tel_number',$search)
                        ->orWhereYear('dob',$dob!=null?$dob:'')
                                    ->paginate(10);
        }
        else{
            // $users = User::with(['user', 'ageGroups'])->where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->get();
            if (Auth::user()->hasRole(1)) {
                $users = User::whereNotIn('id', [1])->where('country_id', Auth::user()->country_id)->orderBy('id','desc')->paginate(10);
                $users2 = User::whereNotIn('id', [1])->where('country_id', Auth::user()->country_id)->orderBy('id','desc')->get();

            } else {
                $users = User::whereNotIn('id', [1])->orderBy('id','desc')->paginate(10);
                $users2 = User::whereNotIn('id', [1])->orderBy('id','desc')->get();

            }
        }
        $country=Country::all();
        $user=User::all();
        $organization=Organization::all();
        $roles=Role::all();
        $general = generalSetting::first();
        $header = $general->header;
        $view2 = view('admin.users.user-list-filter', compact('roles','users', 'country', 'user', 'organization', 'id','search'))->render();
        $view = view('admin.users.printUsers', compact('roles','users2', 'country', 'user', 'organization', 'id','search','header','general'))->render();
        $view3 = view('organizations.show_org_staffs_table', compact('roles','users', 'country', 'user', 'organization', 'id','search','header','general'))->render();

        return response()->json(['html' => $view2,
    'html2'=>$view,
'html3'=>$view3]);
    }
//--------------- End user list search -----------------------------------------
//-----------------PDf----------------------
public function generatUserListePDF(){
    $general = generalSetting::first();
    $org=Organization::first();
    $search = Session::get('suvarna');
            $id = Session::get('id');
            $dob=null;
           if(is_numeric($search)&& ((strlen($search)==1)||(strlen($search)==2))){
           $today=Carbon::now()->format('Y');
           $dob=$today-$search;
           }
            if($search != ''){
                $users = User::whereNotIn('id',[1])->where('organization_id', null)->where('club_id',null)
                ->where(function($query) use($search,$dob){
                    return $query
                    ->whereHas('roles', function ($q) use ($search) {
                    $q->where('name', 'like', '%' . $search . '%');  
                })
                
                ->orwhereHas('country', function ($q) use ($search) {
                    $q->where('name', 'like', '%' . $search . '%');
                }) 
                ->orWhere('first_name','like', '%' . $search . '%')
                ->orWhere('tel_number',$search)
                ->orWhere('last_name','like', '%' . $search . '%')
                ->orWhere('email', $search )
                ->orWhereYear('dob',$dob!=null?$dob:'');
            })
                            ->get();
            $clubs=Club::all();
        
            $country=Country::all();
            $organizations=Organization::all();
            $roles=Role::all();
            $general = generalSetting::first();
            $adminheader = $general->header;
            $pdf = app('dompdf.wrapper');
            $pdf->getDomPDF()->set_option("enable_php", true);
            $pdf = PDF::loadView('admin.users.user_list_table_pdf', compact('users','clubs','country','organizations','org','general','adminheader'))->setPaper('a4', 'landscape');
            return $pdf->stream('User List.pdf');
           
        }
        
        else{
            if (Auth::user()->hasRole(1)) {
                $users =  User::whereNotIn('id',[1])->where('organization_id', null)->where('club_id',null)->orderBy('id','desc')->get();
            } else {
                $users = User::whereNotIn('id', [1])->where('organization_id', null)->where('club_id',null)
                ->orderBy('id','desc')->get();
            }
            $clubs=Club::all();
        
            $country=Country::all();
            $organizations=Organization::all();
            $roles=Role::all();
            $general = generalSetting::first();
            $adminheader = $general->header;
            $pdf = app('dompdf.wrapper');
            $pdf->getDomPDF()->set_option("enable_php", true);
            $pdf = PDF::loadView('admin.users.user_list_table_pdf', compact('users','clubs','country','organizations','org','general','adminheader'))->setPaper('a4', 'landscape');
            return $pdf->stream('User List.pdf');
        }
        // $users = User::all();
    // $users = User::all();
    // $pdf = PDF::loadView('admin.users.user_list_table_pdf',compact('users'))->setPaper('a4', 'landscape');
    
    //     return $pdf->download('user list.pdf');

}
//-----------User list excel export-------------

    public function UserListExcel(Request $request)
    {

        $search = Session::get('suvarna');

        $id = Session::get('id');
        $roles=Role::all();
        
        
        return Excel::download(new UsersListExport($search, $id), 'User List.xlsx');
            
    }
    public function twoFactorEnable(Request $request,$id){
        $user=User::find($id);
        $user->enable_two_factor=$request->input('twofactor');
        $user->save();

    }
// ----------------End User list excel export---------------

// --------------org_user---------------------------------
//search----------
// public function org_UserListSearch(Request $request){

//     $id = Session::get('id');
      
//         $search = $request->get('query')?$request->get('query'):'';
//         Session::put('shana', $search);

//     $id = Session::get('id');
//     $dob=null;
//     $search = $request->get('query')?$request->get('query'):'';
//    if(is_numeric($search)&& ((strlen($search)==1)||(strlen($search)==2))){
//    $today=Carbon::now()->format('Y');
//    $dob=$today-$search;
//    }
//        if($search != ''){
        
       
//         $users = User::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)
//         ->where(function($query) use($search,$dob){
//             return $query
//             ->whereHas('roles', function ($q) use ($search) {
//                 $q->where('name', 'like', '%' . $search . '%');  
//             })
//             ->orwhereHas('club', function ($q) use ($search) {
//                 $q->where('club_name', 'like', '%' . $search . '%');
    
//             })
//             ->orwhereHas('country', function ($q) use ($search) {
//                 $q->where('name', 'like', '%' . $search . '%');
//             })
//             ->orWhere('first_name','like', '%' . $search . '%')
//             ->orWhere('tel_number',$search)
//             ->orWhere('last_name','like', '%' . $search . '%')
//             ->orWhere('email', $search)
//             ->orWhereYear('dob',$dob!=null?$dob:'');
//         })->get();
//     }
//     else{
       
//         $users = User::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->orderBy('id', 'Desc')->get();
//     }
//     $country=Country::all();
//     $organization=Organization::all();
//     $roles=Role::all();
//     $setting = OrganizationSetting::where('organization_id', Auth::user()->organization_id !== null ? Auth::user()->organization_id : $id)->first();
//     $header = $setting ? $setting->header : '';
 
//     $view2 = view('admin.users.org_userlist', compact('setting','header','roles','users',  'organization', 'id'))->render();
//         $view = view('admin.users.org-userlist-print', compact('setting','header','roles','users', 'organization', 'id','search'))->render();

//         return response()->json(['html' => $view,
//         'html2'=>$view2,

// ]);
// }

//pdf------------

public function org_generatUserListePDF(){
    $id = Session::get('id');
    $general = generalSetting::first();
    $header = $general->header;
    $setting = OrganizationSetting::where('organization_id', Auth::user()->organization_id !== null ? Auth::user()->organization_id : $id)->first();

    $sorttype = Session::get('sorttype');
    $sortBy = Session::get('sortBy');
    $search5 = Session::get('Anton')?Session::get('Anton'):'';
            $dob=null;
           if(is_numeric($search5)&& ((strlen($search5)==1)||(strlen($search5)==2))){
           $today=Carbon::now()->format('Y');
           $dob=$today-$search5;
           }
           if($search5 != ''){
            $general = generalSetting::first();
            $setting = OrganizationSetting::where('organization_id', Auth::user()->organization_id !== null ? Auth::user()->organization_id : $id)->first();
            $header = $setting ? $setting->header : '';

            if($sortBy){
            if($sortBy=='club'){

                $users = User::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->where('is_approved',1)
                ->where(function($query) use($search5,$dob){
                    return $query
                ->whereHas('roles', function ($q) use ($search5) {
                    $q->where('name', 'like', '%' . $search5 . '%');     
                })
                ->orwhereHas('club', function ($q) use ($search5) {
                    $q->where('club_name', 'like', '%' . $search5 . '%');
    
                })           
                ->orWhere('first_name','like', '%' . $search5 . '%')
                ->orWhere('email', $search5 )
                ->orWhere('tel_number',$search5)
                ->orWhere('last_name','like', '%' . $search5 . '%')
                ->orWhereYear('dob',$dob!=null?$dob:'');
                })->orderBy(Club::select('club_name')->whereColumn('clubs.id','users.club_id'),$sorttype)->get();
                
            }
            else{
                $users = User::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->where('is_approved',1)
                ->where(function($query) use($search5,$dob){
                    return $query
                ->whereHas('roles', function ($q) use ($search5) {
                    $q->where('name', 'like', '%' . $search5 . '%');     
                })
                ->orwhereHas('club', function ($q) use ($search5) {
                    $q->where('club_name', 'like', '%' . $search5 . '%');
    
                })           
                ->orWhere('first_name','like', '%' . $search5 . '%')
                ->orWhere('email', $search5 )
                ->orWhere('tel_number',$search5)
                ->orWhere('last_name','like', '%' . $search5 . '%')
                ->orWhereYear('dob',$dob!=null?$dob:'');
                })->orderBy($sortBy, $sorttype)->get();
            }
        }else{
            $users = User::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->where('is_approved',1)
                ->where(function($query) use($search5,$dob){
                    return $query
                ->whereHas('roles', function ($q) use ($search5) {
                    $q->where('name', 'like', '%' . $search5 . '%');     
                })
                ->orwhereHas('club', function ($q) use ($search5) {
                    $q->where('club_name', 'like', '%' . $search5 . '%');
    
                })           
                ->orWhere('first_name','like', '%' . $search5 . '%')
                ->orWhere('email', $search5 )
                ->orWhere('tel_number',$search5)
                ->orWhere('last_name','like', '%' . $search5 . '%')
                ->orWhereYear('dob',$dob!=null?$dob:'');
                })->orderBy('first_name','Asc')->get();
        }
              
    }else{
        if($sortBy){

       if($sortBy=='club'){
            $users = User::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->where('is_approved',1)->orderBy(Club::select('club_name')->whereColumn('clubs.id','users.club_id'),$sorttype)->get();
        }
       else{
            $users = User::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->where('is_approved',1)->orderBy($sortBy, $sorttype)->get();

        }
    }else{
        $users = User::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->where('is_approved',1)->orderBy('first_name','Asc')->get();

    }
       
    }
    // dd($users);

        $clubs=Club::all();
        $country=Country::all();
        $organizations=Organization::all();
        $roles=Role::all();
        $setting = OrganizationSetting::where('organization_id', Auth::user()->organization_id !== null ? Auth::user()->organization_id : $id)->first();
        $header = $setting ? $setting->header : '';
        $pdf = PDF::loadView('admin.users.pdf', compact('header','setting','users','clubs','country','organizations','general'))->setPaper('a4', 'landscape');
        return $pdf->stream('Org User List.pdf');

}
public function org_UserPrint(Request $request){
    $id = Session::get('id');

    $general = generalSetting::first();
    $setting = OrganizationSetting::where('organization_id', Auth::user()->organization_id !== null ? Auth::user()->organization_id : $id)->first();
    $header = $setting ? $setting->header : '';
    $sortBy = Session::get('sortBy')?Session::get('sortBy'):'';
    $sorttype = Session::get('sorttype')?Session::get('sorttype'):'';
    $search5 = Session::get('Anton')?Session::get('Anton'):'';
            $dob=null;
           if(is_numeric($search5)&& ((strlen($search5)==1)||(strlen($search5)==2))){
           $today=Carbon::now()->format('Y');
           $dob=$today-$search5;
           }
               if($search5 != ''){
                $general = generalSetting::first();
                $setting = OrganizationSetting::where('organization_id', Auth::user()->organization_id !== null ? Auth::user()->organization_id : $id)->first();
                $header = $setting ? $setting->header : '';

                if($sortBy){
                if($sortBy=='club'){

                    $users = User::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->where('is_approved',1)
                    ->where(function($query) use($search5,$dob){
                        return $query
                    ->whereHas('roles', function ($q) use ($search5) {
                        $q->where('name', 'like', '%' . $search5 . '%');     
                    })
                    ->orwhereHas('club', function ($q) use ($search5) {
                        $q->where('club_name', 'like', '%' . $search5 . '%');
        
                    })           
                    ->orWhere('first_name','like', '%' . $search5 . '%')
                    ->orWhere('email', $search5 )
                    ->orWhere('tel_number',$search5)
                    ->orWhere('last_name','like', '%' . $search5 . '%')
                    ->orWhereYear('dob',$dob!=null?$dob:'');
                    })->orderBy(Club::select('club_name')->whereColumn('clubs.id','users.club_id'),$sorttype)->get();
                    
                }
                else{
                    $users = User::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->where('is_approved',1)
                    ->where(function($query) use($search5,$dob){
                        return $query
                    ->whereHas('roles', function ($q) use ($search5) {
                        $q->where('name', 'like', '%' . $search5 . '%');     
                    })
                    ->orwhereHas('club', function ($q) use ($search5) {
                        $q->where('club_name', 'like', '%' . $search5 . '%');
        
                    })           
                    ->orWhere('first_name','like', '%' . $search5 . '%')
                    ->orWhere('email', $search5 )
                    ->orWhere('tel_number',$search5)
                    ->orWhere('last_name','like', '%' . $search5 . '%')
                    ->orWhereYear('dob',$dob!=null?$dob:'');
                    })->orderBy($sortBy, $sorttype)->get();
                }
            }else{
                $users = User::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->where('is_approved',1)
                    ->where(function($query) use($search5,$dob){
                        return $query
                    ->whereHas('roles', function ($q) use ($search5) {
                        $q->where('name', 'like', '%' . $search5 . '%');     
                    })
                    ->orwhereHas('club', function ($q) use ($search5) {
                        $q->where('club_name', 'like', '%' . $search5 . '%');
        
                    })           
                    ->orWhere('first_name','like', '%' . $search5 . '%')
                    ->orWhere('email', $search5 )
                    ->orWhere('tel_number',$search5)
                    ->orWhere('last_name','like', '%' . $search5 . '%')
                    ->orWhereYear('dob',$dob!=null?$dob:'');
                    })->orderBy('first_name','Asc')->get();
            }
                   $view = view('admin.users.org-userlist-print', compact('users','id','general','header','setting'))->render();
        return response()->json(['html' => $view
    ]);   
        }else{
            if($sortBy){

            if($sortBy=='club'){
                $users = User::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->where('is_approved',1)->orderBy(Club::select('club_name')->whereColumn('clubs.id','users.club_id'),$sorttype)->get();
            }
           else{
                $users = User::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->where('is_approved',1)->orderBy($sortBy, $sorttype)->get();

            }
        }else{
            $users = User::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->where('is_approved',1)->orderBy('first_name','Asc')->get();

        }
             $view = view('admin.users.org-userlist-print', compact('users','id','general','header','setting'))->render();
             return response()->json(['html' => $view
         ]);
        }
     

}

//excel------------
public function org_Excel(Request $request)
    {

        $search5 = Session::get('Anton')?Session::get('Anton'):'';
        $id = Session::get('id');
        $roles=Role::all();
        $sorttype = Session::get('sorttype');
        $sortBy = Session::get('sortBy');

        // $users = User::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->orderBy('id', 'Desc')->get();
        
        return Excel::download(new OrgUsersListExport($search5, $id,$sortBy,$sorttype), 'Org User List.xlsx');
            
    }
    public function exportStaffId(Request $request){
        $general = generalSetting::first();
        // $header = $general->header;
        $search2 = Session::get('org');
        $id = Session::get('id');
        $sortByStaff = Session::get('sortByStaff');
        $sorttypeStaff = Session::get('sorttypeStaff');
    
        if($search2 != ''){
            if($sortByStaff){
                if($sortByStaff=='club'){
                    $users = User::Role(['Starter', 'Judge', 'EventOrganizer'])
                    ->where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)
                    ->where(function($query) use($search2){
                        return $query
                        ->whereHas('roles', function ($q) use ($search2) {
                            $q->where('name', 'like', '%' . $search2 . '%');                      
                        })
                    ->orwhere('email', $search2 )
                    ->orWhere('tel_number',$search2)
                    ->orWhere('last_name','like', '%' . $search2 . '%')
                    ->orWhere('first_name','like', '%' . $search2 . '%');
                    })->orderBy(Club::select('club_name')->whereColumn('clubs.id','users.club_id'),$sorttypeStaff)->get();
                }else{
                $users = User::Role(['Starter', 'Judge', 'EventOrganizer'])
                ->where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)
                ->where(function($query) use($search2){
                    return $query
                    ->whereHas('roles', function ($q) use ($search2) {
                        $q->where('name', 'like', '%' . $search2 . '%');                      
                    })
                ->orwhere('email', $search2 )
                ->orWhere('tel_number',$search2)
                ->orWhere('last_name','like', '%' . $search2 . '%')
                ->orWhere('first_name','like', '%' . $search2 . '%');
                })->orderBy($sortByStaff,$sorttypeStaff)->get();
                }  
            }else{
                $users = User::Role(['Starter', 'Judge', 'EventOrganizer'])
                ->where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)
                ->where(function($query) use($search2){
                    return $query
                    ->whereHas('roles', function ($q) use ($search2) {
                        $q->where('name', 'like', '%' . $search2 . '%');                      
                    })
                ->orwhere('email', $search2 )
                ->orWhere('tel_number',$search2)
                ->orWhere('last_name','like', '%' . $search2 . '%')
                ->orWhere('first_name','like', '%' . $search2 . '%');
                })->orderBy('created_at','Desc')->get();
            }

    }else{
        if($sortByStaff){
            if($sortByStaff=='club'){
                $users = User::Role(['Starter', 'Judge', 'EventOrganizer'])
                ->orderBy(Club::select('club_name')->whereColumn('clubs.id','users.club_id'),$sorttypeStaff)
                ->get();
            }else{
                $users = User::Role(['Starter', 'Judge', 'EventOrganizer'])
                ->where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)
                ->orderBy($sortByStaff,$sorttypeStaff)->get();

            }

        }else{
            $users = User::Role(['Starter', 'Judge', 'EventOrganizer'])
                ->where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)
                ->orderBy('created_at','Desc')->get();
        }
    }
          
            $roles=Role::all();
            $setting = OrganizationSetting::where('organization_id', Auth::user()->organization_id !== null ? Auth::user()->organization_id : $id)->first();
            $header = $setting ? $setting->staff_id : '';
            $org=Auth::user()->organization;
            $pdf = PDF::loadView('organizations.staffIdCard', compact('header','setting','users','roles','org'))->setPaper('a4', 'landscape');
            return $pdf->stream('Staff Id Card.pdf');
        }

public function org_generat_staffListePDF(Request $request){
    $general = generalSetting::first();
    $search2 = Session::get('org');
    $sortByStaff = Session::get('sortByStaff');
    $sorttypeStaff = Session::get('sorttypeStaff');
    $id = Session::get('id');

     if($search2 != ''){
                if($sortByStaff){
                    if($sortByStaff=='club'){
                        $users = User::Role(['Starter', 'Judge', 'EventOrganizer'])
                        ->where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)
                        ->where(function($query) use($search2){
                            return $query
                            ->whereHas('roles', function ($q) use ($search2) {
                                $q->where('name', 'like', '%' . $search2 . '%');                      
                            })
                        ->orwhere('email', $search2 )
                        ->orWhere('tel_number',$search2)
                        ->orWhere('last_name','like', '%' . $search2 . '%')
                        ->orWhere('first_name','like', '%' . $search2 . '%');
                        })->orderBy(Club::select('club_name')->whereColumn('clubs.id','users.club_id'),$sorttypeStaff)->get();
                    }else{
                    $users = User::Role(['Starter', 'Judge', 'EventOrganizer'])
                    ->where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)
                    ->where(function($query) use($search2){
                        return $query
                        ->whereHas('roles', function ($q) use ($search2) {
                            $q->where('name', 'like', '%' . $search2 . '%');                      
                        })
                    ->orwhere('email', $search2 )
                    ->orWhere('tel_number',$search2)
                    ->orWhere('last_name','like', '%' . $search2 . '%')
                    ->orWhere('first_name','like', '%' . $search2 . '%');
                    })->orderBy($sortByStaff,$sorttypeStaff)->get();
                    }  
                }else{
                    $users = User::Role(['Starter', 'Judge', 'EventOrganizer'])
                    ->where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)
                    ->where(function($query) use($search2){
                        return $query
                        ->whereHas('roles', function ($q) use ($search2) {
                            $q->where('name', 'like', '%' . $search2 . '%');                      
                        })
                    ->orwhere('email', $search2 )
                    ->orWhere('tel_number',$search2)
                    ->orWhere('last_name','like', '%' . $search2 . '%')
                    ->orWhere('first_name','like', '%' . $search2 . '%');
                    })->orderBy('created_at','Desc')->get();
                }

        }else{
            if($sortByStaff){
                if($sortByStaff=='club'){
                    $users = User::Role(['Starter', 'Judge', 'EventOrganizer'])
                    ->orderBy(Club::select('club_name')->whereColumn('clubs.id','users.club_id'),$sorttypeStaff)
                    ->get();
                }else{
                    $users = User::Role(['Starter', 'Judge', 'EventOrganizer'])
                    ->where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)
                    ->orderBy($sortByStaff,$sorttypeStaff)->get();

                }

            }else{
                $users = User::Role(['Starter', 'Judge', 'EventOrganizer'])
                    ->where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)
                    ->orderBy('created_at','Desc')->get();
            }
        }
        $roles=Role::all();
        $setting = OrganizationSetting::where('organization_id', Auth::user()->organization_id !== null ? Auth::user()->organization_id : $id)->first();
        $header = $setting ? $setting->header : '';
        $org=Auth::user()->organization;
        $pdf = PDF::loadView('organizations.show_org_staffs_pdf', compact('header','setting','users','roles','org'))->setPaper('a4', 'landscape');
        return $pdf->stream('Org Staff List.pdf');
    }

    
    public function org_staff_Excel(Request $request){

        $search2 = Session::get('org');
        $id = Session::get('id');
        $sorttypeStaff = Session::get('sorttypeStaff');
        $sortByStaff = Session::get('sortByStaff');

        
        return Excel::download(new OrgStaffListExport($search2, $id,$sorttypeStaff,$sortByStaff), 'Staffs List.xlsx');
            
    }
// //org staff list excel end

//         $search2 = Session::get('org');
//         $id = Session::get('id');
        
//         return Excel::download(new OrgStaffListExport($search2, $id), 'Staffs List.xlsx');
            
//     }
//org staff list excel end


}
