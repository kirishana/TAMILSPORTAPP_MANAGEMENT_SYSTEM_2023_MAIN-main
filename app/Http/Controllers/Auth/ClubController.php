<?php


namespace App\Http\Controllers\Auth;

use App\generalSetting;
use App\Notifications\NewUser;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use App\Models\Organization;
use App\Models\MarathonPoint;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
// use Spatie\Permission\Models\Role;
use Mail;
use App\Models\Club;
use App\Exports\AllclubExcelExport;
use App\Models\Season;
use App\Models\Country;
use Auth;
use Excel;
use Illuminate\Support\Facades\Crypt;
use URL;
use PDF;
use Yajra\DataTables\DataTables;
use Session;


class ClubController extends Controller
{
public function points(Request $request,$id){
    if($request->input('pointId') == null){
        $marathonPoint=new MarathonPoint();
        $marathonPoint->league_id=$request->input('league');
        $marathonPoint->club_id=$id;
        $marathonPoint->points=$request->input('points');
        $marathonPoint->save();
    }
    else{
        $marathonPoint=MarathonPoint::find($request->input('pointId'));
        $marathonPoint->update(['points' =>$request->input('points')]);
    }
    return response()->json([
        'id'=>$id,
    ]);
    
}
    //use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function index2()
    // {
    //     if (Auth::user()->hasRole(1)) {
    //         $clubs = Club::with('country')->where('country_id', Auth::user()->country_id)->get();
    //     } else {
    //         $clubs = Club::with('country')->get();
    //     }
    //     $general = generalSetting::where('id', 1)->first();
    //     $organizations = Organization::where('status', 1)->get();
    // }

    // public function registration()
    // {
    //     $countries = Country::all();
    //     $roles = Role::all();
    //     $organizations = Organization::all();
    //     return view('auth.register', compact('roles', 'countries', 'organizations'));
    // }



    // --------------------------------

    // public function clubCreate()
    // {
    // $countries = Country::all();
    // $season = Season::where('status', 1)->first();
    //     $roles = Role::whereNotIn('name', ['SuperAdmin'])->get();
    //     $organizations = Organization::where('status', 1)->get();
    //     $general = generalSetting::where('id', 1)->first();

    //     return view('club.create', compact('roles', 'general', 'organizations'));
    // }


    public function Create()
    {
        $organizations = Organization::all();
        $users=User::all();
        $clubs = Club::all();
        $countries = Country::all();
            // return redirect('/admin')->with('success', ' Club has been registered successfully please check the mail');
        return view('club_register', compact('organizations', 'clubs', 'countries'));
    }
    public function clubCreateOut()
    {
        
        $organizations = Organization::all();
        $users=User::all();
        $clubs = Club::all();
        $countries = Country::all();
            // return redirect('/admin')->with('success', ' Club has been registered successfully please check the mail');
        return view('club_register', compact('organizations', 'clubs', 'countries'));
    }
    public function clubCreate()
    {
        $organizations = Organization::all();
        $clubs = Club::all();
        $countries = Country::all();
        $general = generalSetting::first();
        if(Auth::user()->hasRole(8)){
            return view('clubs.create', compact('organizations', 'clubs', 'countries', 'general'));

        }
        else{
            return view('clubs.createOne', compact('organizations', 'clubs', 'countries', 'general'));

        }
    } 

    public function index(Request $request)
    {
        $id=Session::get('id');
        $search=$request->get('query')?$request->get('query'):'';
        Session::put('search',$search);
        $general = generalSetting::first();
        $adminheader = $general->header;
        $clubs = Club::all();
        $countries = Country::all();
        $general = generalSetting::first();
        $organizations = Organization::all();
        if(Auth::user()->hasRole(8)){
            return view('clubs.club_list', compact('clubs', 'countries', 'general', 'organizations','adminheader'));

        }else{
 
        }
        return view('clubs.clubListOtherMembers', compact('clubs', 'countries', 'general', 'organizations','adminheader'));
    }

    public function show()
    {
        // dd( Auth::club());

        $club = Club::find(Auth::user()->club_id);
        // dd($club);
        // dd($clubs);
        // $clubs = Club::all();
        $countries = Country::all();
        return view('clubs.show', compact('club', 'countries'));
    }
    public function approve(Request $request, $id)
    {
        
        $id = $request->input('id');
        $club = Club::find($id);
        $club->is_approved = 1;
        $club->save();
        //     $user1 = User::where('club_id', $club->id)->first();
        //   $user1->club_id=$club->id;
        //         $user1->userId = $club->prefix . " " . str_pad(1, 4, '0', STR_PAD_LEFT);
       
        // $userRole=$user1->roles->pluck('name')[0];
        //     $user1->removeRole($userRole);
        //     $user1->assignRole('ClubAdmin');
        //     $user1  ->save();
        

       
     return response()->json(['url' => url('/all-clubs')]);
    }

    public function decline(Request $request, $id)
    {
        $id = $request->input('id');
        $club = Club::find($id);
        $club->is_approved = 0;
        $club->save();
        // $email = $user->email;
        // Mail::send(
        //     ['html' => 'denied'],
        //     ['user' => $user,],
        //     function ($message) use ($email) {
        //         $message->to($email)
        //             ->subject('Access Denied');
        //     }
        // );

        return response()->json(['url' => url('/all-clubs')]);
    }


    public function club()
    {
        // dd(url()->previous());
        // // dd(Auth::user()->children);
        // $users = User::where('parent_id', Auth::user()->id)->get();
        // return view('members.index', compact('users'));

    }


    // --------------------------------


    protected function club_register2(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                // 'club_registation_num'                  => 'required|max:255',
                'club_name'                  => 'required|max:255|unique:clubs',
                'club_email'                 => 'required|max:255',
                'address'                       => 'required',
                'city'                       => 'required',
                'postal'                       => 'required',
                'country'                       => 'required',
                'mobile'                       => 'required',
                'state'                       => 'required',
            ],
            [
                'club_name.required'           => 'Club Name is Required',
                'club_email.required'  => 'Club Email is Required',
                'club_email.unique'  => 'Club Email has already been taken',
                'address.required'       => 'Club Address is Required',
                'city.required'       => 'Club City is Required',
                'postal.required'       => 'Club Postal Code is Required',
                'country.required'       => 'Club Country is Required',
                'mobile.required'       => 'Club Mobile Number is Required',
                'state.required'       => 'state is Required',

            ]

        );

        if ($validator->fails()) {
            return redirect('/club/create')->withErrors($validator)->withInput();
        }
      
       

        $season = Season::where('status', 1)->first();
        $club = new Club;
        if($request->input('prefix')!=null){
            $prefixget= $request->input('prefix');
            $prefix=strtoupper($prefixget);
        }else{
            $prefixFinal=null;
        $result = preg_replace("([A-Z]|[a-z]|[0-9])", " $0", $request->input('club_name'));
        $result = explode(' ', trim($result));
        $final=array_map('strtoupper', $result);
$clubs=Club::all();
$pre=array();
$count = count($final);
        //  dd($count);
        $prefix1 = $final[0][0];
      
        $prefix2 = $final[1][0];
        //  dd($prefix2);

        if ($count == 3) {
            $prefix3 = $final[2][0];
            $prefix = $prefix1 . $prefix2 . $prefix3;
        } else {
            $prefix = $prefix1 . $prefix2;
        }
        // foreach($clubs as $club)
        // {
        //     $pre=$club->prefix;
        //     if($pre==$prefix){
        //         $prefix3 = $final[2][0];
                
        // $prefixFinal=$prefix.$prefix3;
        //     }
        //     if($prefixFinal){
        //         $prefix3 = $final[2][0];
        //             $prefix4 = $final[3][0];
        //         $prefixFinal=$prefix.$prefix3.$prefix4;

        //         }
            
        // }
        }
      
        $club->club_registation_num             = $request->input('club_registation_num');
        $club->club_name           = $request->input('club_name');
        $club->club_email            = $request->input('club_email');
        $club->club_start_date             = $request->input('club_start_date');
        $club->address        = $request->input('address');
        $club->mobile        = $request->input('mobile');
        $club->tpnumber        = $request->input('tpnumber');
        $club->city        = $request->input('city');
        $club->postal        = $request->input('postal');
        $club->season_id = $season->id;
        $club->country_id        = $request->input('country');
        $club->prefix = $prefix;
        $club->is_approved = 1;

        $club->save();
       

        return redirect('/all-clubs')->with('success', 'Club have successfully registered.');
    }

    // ---------------------------------------------------

    public function edit($id)
    {
        // dd(Auth::user()->organization!==null);
        // $organizations = Organization::all();
        // $user = User::find($id);
        $general = generalSetting::first();
        $club = Club::find(Crypt::decrypt($id));
        $countries = Country::all();
        // $age = Carbon::parse(Auth::user()->dob)->diff(Carbon::now())->y;
        if(Auth::user()->hasRole(8)){
            return view('clubs.editAdmin', compact('club', 'countries','general'));

        }else{
 
        }
        return view('clubs.edit', compact('club', 'countries','general'));
        // Show the page
    }




    // ---------------------------------------------


    public function update(Request $request, $id)
    {
        $club = Club::find($id);

        // if ($image = $request->file('profile_logo')) {
        //     $destinationPath = 'profile/';
        //     $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
        //     $image->move($destinationPath, $profileImage);
        //     $input['profile_logo'] = "$profileImage";
        // }

        $club->club_registation_num = $request->input('club_registation_num');
        $club->club_name = $request->input('club_name');
        $club->club_email = $request->input('club_email');
        $club->club_start_date = $request->input('club_start_date');
        $club->mobile = $request->input('mobile');
        $club->tpnumber = $request->input('tpnumber');
        $club->address = $request->input('address');
        $club->city = $request->input('city');
        $club->postal = $request->input('postal');
        $club->country_id = $request->input('country');

        // $user->postal = $request->input('postal');
        // if ($request->file('profile_logo')) {
        //     $user->profile_pic =  $input['profile_logo'];
        // }      
        // }
        // if ($request->password !== null) {
        //     $user->password = Hash::make($request->password);
        // }

        $club->save();
        $id = $club->id;
        return redirect("/all-clubs")->with('success', 'Your club detail is updated successfully');
    }




    // ------------------------------------




    protected function club_register(Request $request)
    {
        $general = generalSetting::first();

        $validator = Validator::make(
            $request->all(),

            [
                'club_name'                  => 'required|max:255',
                'club_email'                 => 'required|max:255',
                'address'                       => 'required',
                'city'                       => 'required',
                'postal'                       => 'required',
                'country'                       => 'required',
            ],
            [
                'club_name.required'           => 'Club Name is Required',
                'club_email.required'  => 'Club Email is Required',
                'club_email.unique'  => 'Club Email has already been taken',
                'address.required'       => 'Club Address is Required',
                'city.required'       => 'Club City is Required',
                'postal.required'       => 'Club Postal Code is Required',
                'country.required'       => 'Club Country is Required',

            ]

        );

        if ($validator->fails()) {
            return redirect('/club_registration')->withErrors($validator)->withInput();
        }


        $season = Season::where('status', 1)->first();
        $prefixFinal=null;
        $result = preg_replace("([A-Z]|[a-z]|[0-9])", " $0", $request->input('club_name'));
        $result = explode(' ', trim($result));
        $final=array_map('strtoupper', $result);
$clubs=Club::all();
$pre=array();
$count = count($final);
        $prefix1 = $final[0][0];
      
        $prefix2 = $final[1][0];

        if ($count == 3) {
            $prefix3 = $final[2][0];
            $prefix = $prefix1 . $prefix2 . $prefix3;
        } else {
            $prefix = $prefix1 . $prefix2;
        }
        foreach($clubs as $club)
        {
            $pre=$club->prefix;
            if($pre==$prefix){
                $prefix3 = $final[2][0];
        $prefixFinal=$prefix.$prefix3;
            }
        }
        $prefix=$prefixFinal!=null?$prefixFinal:$prefix;
        $club = new Club;
        $club->club_registation_num             = $request->input('club_registation_num');
        $club->club_name           = $request->input('club_name');
        $club->club_email            = $request->input('club_email');
        $club->club_start_date             = $request->input('club_start_date');
        $club->mobile        = $request->input('mobile');
        $club->tpnumber        = $request->input('tpnumber');
        $club->address        = $request->input('address');
        $club->city        = $request->input('city');
        $club->postal        = $request->input('postal');
        $club->country_id        = $request->input('country');
        $club->season_id = $season->id;
        $club->is_approved = 2;
                    $user = Auth::user()?Auth::user():User::latest()->first();

   $club->user=$user->id;
        $club->prefix = $prefix;
        $club->save();
        if (URL::previous() ==$general->website_url."club_register") { 
            Auth::logout();
           return redirect('/')->with('success', ' Club has been registered successfully please check the E-mail');
        } 
        else {
        
            return redirect('/')->with('success', ' Club has been registered successfully please check the mail');
        }


        // $club_email = $request->input('club_email');
        // Mail::send(
        //     ['html' => 'welcome'],
        //     ['club' => $club,],
        //     function ($message) use ($club_email) {
        //         $message->to($club_email)
        //             ->subject('Registration');
        //     }
        // );

    }
    public function settings(Request $request)
    {
        $admins = User::role('ClubAdmin')->whereNotIn('id',[Auth::user()->id])->where('club_id', Auth::user()->club_id)->get();
        $club = Auth::user()->club_id;
        return view('clubs.settings', compact('admins', 'club'));
    }
    public function generalSettings(Request $request, $id)
    {
        if ($request->input('admin')) {
            Auth::user()->removeRole('ClubAdmin');
            Auth::user()->assignRole('Player');

            // $user_email = User::find($request->input('admin'))->email;
            // $user_name = User::find($request->input('admin'))->first_name;
            // Mail::send(
            //     ['html' => 'org'],
            //     ['organization' => $organization, 'user_name' => $user_name],
            //     function ($message) use ($user_email) {
            //         $message->to($user_email)
            //             ->subject('Organization Admin');
            //     }
            // );
        }


        if ($image = $request->file('club_logo')) {
            $destinationPath = 'club/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['club_logo'] = "$profileImage";
            $userPhoto = public_path('club/') . Auth::user()->club->club_logo;
            $clubSetting = Club::where('id', Auth::user()->club_id)->first();

            if (file_exists($userPhoto)) {

                @unlink($userPhoto); // then delete previous photo
                $clubSetting->club_logo = $input['club_logo'];
                $clubSetting->save();
            } else {


                $clubSetting->club_logo = $input['club_logo'];
                $clubSetting->save();
            }
        }

        if ($request->input('admin')) {
            return redirect('/admin')->with('success', 'You are no longer an admin to the organization');
        } else {
            return redirect("/club/settings");
        }
    }
    public function data(Request $request)
    {
        $search = $request->filter?$request->filter:null;
        Session::put('search', $search);
        if($search!=null)
        {
            if (Auth::user()->hasRole(1)) {
                $clubs = Club::with('country')->where('country_id', Auth::user()->country_id)->where('is_approved',1)
                ->where(function($query) use($search){
                    return $query
                ->Where('club_name','LIKE', '%' . $search . '%')              
                ->orWhere('club_registation_num','LIKE', '%' . $search . '%')              
                ->orWhere('club_email','LIKE', '%' . $search . '%');               
                })->get();
            } else {
                $clubs = Club::with('country')->where('is_approved',1)
                ->where(function($query) use($search){
                    return $query
                ->Where('club_name','LIKE', '%' . $search . '%')              
                ->orWhere('club_registation_num','LIKE', '%' . $search . '%')              
                ->orWhere('club_email','LIKE', '%' . $search . '%');               
                })->get();
            }  
        }
        else
        {
            if (Auth::user()->hasRole(1)) {
                $clubs = Club::with('country')->where('country_id', Auth::user()->country_id)->where('is_approved',1)->orderBy('created_at','desc');
            } else {
                $clubs = Club::with('country')->orderBy('created_at','desc');
            }
        }



        return DataTables::of($clubs)
            ->editColumn('created_at', function (Club $club) {
                return $club->created_at->format('d/m/Y');
            })
            ->editColumn('members', function ($club) {
                 $count=$club->users?$club->users->count():'0';
                 return $count;
            })
           ->editColumn('admin', function ($club) {
                $user=User::Role(['ClubAdmin'])->where('club_id',$club->id)->first();
                $admin=$user?$user->email:'';
                return $admin;
           })

            ->addColumn('actions', function ($club) {
                if ($club->is_approved == 2) {
                    $id = $club->id;
                    // $actions = '<a href=' . route('clubs.show', $club->id) . '><button style="padding: 2px 4px" class=" btn btn-primary" ata-toggle="tooltip" data-placement="top" title="View Club"><i class="material-icons" style="margin-bottom:5px">visibility</i></button></a>
                    // <a href=' . route('clubs.edit', $club->id) . '><button style="padding: 2px 4px" class=" btn btn-info" data-toggle="tooltip" data-placement="top" title="Edit Club"><i class="material-icons" style="margin-bottom:5px">edit</i></button></a>
                    $actions = '<button style="padding: 2px 4px" class=" btn btn-success approve" value="' . $id . '" ata-toggle="tooltip" data-placement="top" title="Approve"><i class="material-icons" style="margin-bottom:5px">check_circle</i></button>
                    <button style="padding: 2px 4px" class=" btn btn-danger decline" value="' . $id . '" ata-toggle="tooltip" data-placement="top" title="Decline"><i class="material-icons" style="margin-bottom:5px">highlight_off</i></button>
                    <a href=' . route('clubs.edit',Crypt::encrypt($id)) . '><button style="padding: 2px 4px" class=" btn btn-primary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="material-icons" style="margin-bottom:5px">edit</i></button></a>';

                   
                    return $actions;
                }
                if ($club->is_approved == 1) {

                    $id = $club->id;
                    // $actions = '<a href=' . route('clubs.show', $club->id) . '><button style="padding: 2px 4px" class=" btn btn-primary" ata-toggle="tooltip" data-placement="top" title="View Club"><i class="material-icons" style="margin-bottom:5px">visibility</i></button></a>
                    //  <a href=' . route('users.edit', $user->id) . '><button style="padding: 2px 4px" class=" btn btn-info" data-toggle="tooltip" data-placement="top" title="Edit"><i class="material-icons" style="margin-bottom:5px">edit</i></button></a>
                    $actions = '<button style="padding: 2px 4px" class=" btn btn-danger decline" value="' . $id . '" ata-toggle="tooltip" data-placement="top" title="Decline"><i class="material-icons" style="margin-bottom:5px">highlight_off</i></button>
                    <a href=' . route('clubs.edit',Crypt::encrypt($id)) . '><button style="padding: 2px 4px" class=" btn btn-primary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="material-icons" style="margin-bottom:5px">edit</i></button></a>';


                    return $actions;
                }
                if ($club->is_approved == 0) {

                    $id = $club->id;
                    $actions = // '<a href=' . route('clubs.show', $club->id) . '><button style="padding: 2px 4px" class=" btn btn-primary" ata-toggle="tooltip" data-placement="top" title="View Club"><i class="material-icons" style="margin-bottom:5px">visibility</i></button></a>
                        // <a href=' . route('clubs.edit', $club->id) . '><button style="padding: 2px 4px" class=" btn btn-info" data-toggle="tooltip" data-placement="top" title="Edit"><i class="material-icons" style="margin-bottom:5px">edit</i></button></a>
                        '<button style="padding: 2px 4px" class=" btn btn-success approve" value="' . $id . '" ata-toggle="tooltip" data-placement="top" title="Approve"><i class="material-icons" style="margin-bottom:5px">check_circle</i></button>
                        <a href=' . route('clubs.edit', Crypt::encrypt($id)) . '><button style="padding: 2px 4px" class=" btn btn-primary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="material-icons" style="margin-bottom:5px">edit</i></button></a>';



                    return $actions;
                }
            })
            ->rawColumns(['actions'])
            ->make(true);
    }
    public function print()
    {
        $id=Session::get('id');
        
        $search=Session::get('search');
        $general = generalSetting::first();
        $adminheader =$general->header;

        if($search != ''){
                            $clubs = Club::where('is_approved',1)

                            ->where(function($query) use($search){
                                return $query
                            ->orWhere('club_name','LIKE', '%' . $search . '%')              
                            ->orWhere('club_registation_num', '%' . $search . '%')            
                            ->orWhere('club_email','LIKE', '%' . $search . '%')   
                            ->orWhere('mobile','LIKE', '%' . $search . '%');               
          
                                })->orderBy('id', 'DESC')->get();
                                // dd($clubs);     

                                $view = view('clubs.All_club_print', compact('clubs','id','general','adminheader'))->render();
                                return response()->json(['html' => $view
                            ]);
            
                    }else{


                        $clubs = Club::where('is_approved',1)->orderBy('id', 'DESC')->get();

                        $view = view('clubs.All_club_print', compact('clubs','id','general','adminheader'))->render();
                         return response()->json(['html' => $view
                            ]);
                
            
            
            
                }


    }
    public function pdf()
    {
        $id=Session::get('id');
        
        $search=Session::get('search');
        // dd($search);     
        $general = generalSetting::first();
        $adminheader=$general->header;

        if($search != ''){
                            $clubs = Club::where('is_approved',1)

                            ->where(function($query) use($search){
                                return $query
                            ->orWhere('club_name','LIKE', '%' . $search . '%')              
                            ->orWhere('club_registation_num', '%' . $search . '%')            
                            ->orWhere('club_email','LIKE', '%' . $search . '%')
                            ->orWhere('mobile','LIKE', '%' . $search . '%');               
               
                                })->orderBy('id', 'DESC')->get();
                                $pdf = app('dompdf.wrapper');
                                $pdf->getDomPDF()->set_option("enable_php", true);
                                $pdf = PDF::loadView('clubs.All_club_pdf', compact('clubs','id','adminheader','general'))->setPaper('a4', 'landscape');
                                return $pdf->stream('clubs.pdf');
                    }else{


                        $clubs = Club::where('is_approved',1)->orderBy('id', 'DESC')->get();
                        // dd($clubs);     
                        $pdf = app('dompdf.wrapper');
                        $pdf->getDomPDF()->set_option("enable_php", true);
                        $pdf = PDF::loadView('clubs.All_club_pdf', compact('clubs','id','adminheader','general'))->setPaper('a4', 'landscape');
                        return $pdf->stream('clubs.pdf');
            
            
            
                }


    }

    public function excel(Request $request)
    {
        $search = Session::get('search');
        
        $id = Session::get('id');
        
        
        return Excel::download(new AllclubExcelExport($search, $id), 'All_clubs_Excel List.xlsx');

    }
}
