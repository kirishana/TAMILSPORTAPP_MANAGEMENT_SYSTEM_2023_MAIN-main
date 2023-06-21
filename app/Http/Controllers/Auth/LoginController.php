<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Country;
use App\generalSetting;
use Spatie\Permission\Models\Role;
use Validator;
use App\User;
use App\Models\Club;
use App\Models\Season;
use App\Models\Organization;
use URL;
use Carbon\Carbon;
use Auth;
use Session;
use DB;
use Mail;
use Spatie\Activitylog\Models\Activity;
class LoginController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;
    
    /**
     * Where to redirect users after login.
     *
     * @var string
     */

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct() 
    // {
    //   $this->middleware('auth');
    // }
    public function showLoginForm()
    {
        $clubs = Club::all();
        $countries = Country::first();
        $season = Season::where('status', 1)->first();
        $roles = Role::whereNotIn('name', ['SuperAdmin'])->get();
        $organizations = Organization::where('status', 1)->first();
        $general = generalSetting::first();
        $clubs = Club::where('is_approved',1)->has('users','>',0)->get();
        $today = Carbon::now();
$message=null;
$varu="채mma";

        return view('auth.login', compact('clubs', 'countries', 'roles', 'general', 'organizations', 'season', 'clubs', 'today','message','varu'));
    }
    
    public function login(Request $request)
    {
        
        $general = generalSetting::first();
        $validator = Validator::make(
            $request->all(),
            [
                'email'                 => 'required|email|max:255',
                'password'              => 'required',
            ],
            [
                'email.required'                 => 'Email is required',
                'password.required'              => 'password is required',
            ]

        );

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $input = $request->all();
        $user = User::where('email', $request->input('email'))->first();

        if (!$user) {
            return redirect('/')->with('error', 'Sorry you are not a member of this system');
        }
        $user->roles->pluck('name')[0];
        if ($user->is_approved == 2) {
            return redirect('/')->with('error', 'Sorry you are not activate yet');

        }
        elseif ($user->status == 1) {

            return redirect('/')->with('error', 'Sorry you are not activate yet. please check your mail');
        } 
        elseif ($user->is_approved == 0) {

            return redirect('/')->with('error', 'Sorry your activation is cancelled. You ae no longer in this system');
        } 
        elseif (auth()->attempt(array('email' => $input['email'], 'password' => $input['password']))) {
                $user=auth()->user();
                if(auth()->user()->organization!=null){
                if (auth()->user()->organization->orgsetting){
                if (auth()->user()->organization->orgsetting->two_factor_auth == 1) { 
                     if(auth()->user()->enable_two_factor==1)    {   
                        $userHrs=auth()->user()->hrs_on->format('H');
                        $hrs=Carbon::now()->format('H');
                        $varian=$hrs-$userHrs;
                        if($varian > 12){
                $user->generateTwoFactorCode();
                $user_email=$user->email;
                Mail::send(
                    ['html' => 'twoFactor'],
                    ['user' => $user, 'general'=>$general],
                    function ($message) use ($user_email) {
                        $message->to($user_email);
                       
                    }
                );
                return redirect()->route('verify.index');
            }
        }
        }
    }
                }
            
            DB::table('active_users')->insert(['user_id' => Auth::user()->id]);
            $dayUser = User::find(Auth::user()->id)->dayUser != null ? User::find(Auth::user()->id)->dayUser : null;
            if ($dayUser == null) {
                DB::table('day_users')->insert(['user_id' => Auth::user()->id, 'date' => Carbon::now()]);
            } else {
                $lastUse = User::find(Auth::user()->id)->dayUser;
                DB::table('day_users')
                    ->where('user_id', Auth::user()->id)
                    ->update(['date' => Carbon::now()]);
            }
            if (URL::previous() == $general->website_url."club_login") {
                if ($user->roles->pluck('name')[0] == 'ClubAdmin') {
                    return redirect('/club_login')->with('error', 'Sorry you are already an admin of another club');
                } else {
                    return redirect('/club_registration')->with('success', 'You have successfully registered. please check the mail');
                }
            } elseif ($user->roles->pluck('name')[0]=='SuperAdmin' || $user->roles->pluck('name')[0]=='CountryAdmin') {
                return redirect('admin/');
            } elseif ($user->roles->pluck('id')[0] == '2') {
                activity()
            ->causedBy($user)
            ->performedOn($user)
            ->withProperties(["attributes"=>['ip_address' => request()->ip()]])
            ->log('login');
                return redirect('/dashboard/' . $user->organization_id . '');
            } elseif ($user->roles->pluck('name')[0]=='ClubAdmin') {
                activity()
                ->causedBy($user)
                ->performedOn($user)
                ->withProperties(["attributes"=>['ip_address' => request()->ip()]])
                ->log('login');
                return redirect('/dashboard/' . $user->id . '');
            } else {
                activity()
                ->causedBy($user)
                ->performedOn($user)
                ->withProperties(["attributes"=>['ip_address' => request()->ip()]])
                ->log('login');
                return redirect('events');
            }
            
        } else {


            return redirect('/')->with('error', 'Email or password is wrong');
        }
    }
    public function logout()
    {
        DB::table('active_users')->where('user_id', '=', Auth::id())->delete();
        $user = Auth::user();
        activity()
        ->causedBy($user)
        ->performedOn($user)
        ->withProperties(["attributes"=>['ip_address' => request()->ip()]])
        ->log('Logged Out');
        Session::flush();
        Auth::logout();

        return redirect('/');
    }
  
}
