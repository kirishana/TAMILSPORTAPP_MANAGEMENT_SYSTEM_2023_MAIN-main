<?php

namespace App\Http\Controllers\Auth;

use App\Notifications\NewUser;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use App\Models\Country;
use App\Models\Club;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Mail;
use App\generalSetting;
use Auth;
use App\Models\Season;
use App\Models\Organization;
use URL;
use Carbon\Carbon;

class RegisterController extends Controller
{
    

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function registration()
    {
        $countries = Country::all();
        $roles = Role::all();
        $organizations = Organization::all();
        $clubs = Club::all();

        return view('auth.club_manager', compact('roles', 'clubs', 'countries', 'organizations'));
    }
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */


    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */


    protected function register(Request $request)
    {
        $general = generalSetting::first();
        $organization=Organization::find($request->input('organization'));

        if($organization->orgsetting){
            if($organization->orgsetting->active==1){
        $validator = Validator::make(
            $request->all(),
            [
                'first-name'            => 'required|max:255|regex:/^([a-zA-Z ]{1,255})$/ix',
                 'last-name'             => 'required|max:255|regex:/^([a-zA-Z ]{1,255})$/ix',
                'dob'                   => 'required',
                'member'                   => 'required',

                // 'countries'               => 'required',
                'email'                 => 'required|unique:users|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix',
                'password'              => 'required|min:8|max:20|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/',
                'password_confirmation' => 'required|same:password',
                 'gender'                  => 'required',
                                  'club'                  => 'required',
                                  

                // 'tel'            => 'numeric|digits_between:8,15',
            ],
            [
                'first-name.required' => 'First Name is Required',
                    'first-name.regex' => 'First Name contains only letters',

                 'last-name.required'           => 'Last Name is Required',
                'last-name.regex' => 'Last Name contains only letters',
                'dob.required'    => 'Date Of Birth is Required',
                'email.required'  => 'Email is Required',
                'email.regex'  => 'please enter the valid Email',
                                'email.unique'  => 'Email has already been taken',
                'club.required' => 'Club is Required',
                'member.required'  => 'Please Choose answer this Question',

                // 'tel.numeric' => 'Mobile Number should be number',
                // 'tel.required' => 'Mobile Number is Required',
                 // 'tel.digits_between' => 'Mobile Number at least contains 8 digits',
                 'gender.required'  => 'Please Choose  The Gender',
                // 'countries.required' => 'Please Select Country',
                'password.min' => 'Password should contain minimum 8 characters',
                                'password.regex' => 'Password should contain capital letters,simple letters,number and special characters',

                'password_confirmation.same' => 'Password confirmation should be same as password'


            ]
           


        );
    }else{
        $validator = Validator::make(
            $request->all(),
            [
                'first-name'            => 'required|max:255|regex:/^([a-zA-Z ]{1,255})$/ix',
                 'last-name'             => 'required|max:255|regex:/^([a-zA-Z ]{1,255})$/ix',
                'dob'                   => 'required',
                'email'                 => 'required|unique:users|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix',
                'password'              => 'required|min:8|max:20|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/',
                'password_confirmation' => 'required|same:password',
                'gender'                  => 'required',
                'club'                  => 'required',
    
                // 'tel'            => 'numeric|digits_between:8,15',
            ],
            [
                'first-name.required' => 'First Name is Required',
                'first-name.regex' => 'First Name contains only letters',
                'last-name.required'           => 'Last Name is Required',
                'last-name.regex' => 'Last Name contains only letters',
                'dob.required'    => 'Date Of Birth is Required',
                'email.required'  => 'Email is Required',
                'email.regex'  => 'please enter the valid Email',
                                'email.unique'  => 'Email has already been taken',
                'club.required' => 'Club is Required',
    
                // 'tel.numeric' => 'Mobile Number should be number',
                // 'tel.required' => 'Mobile Number is Required',
                                // 'tel.digits_between' => 'Mobile Number at least contains 8 digits',
                 'gender.required'  => 'Please Choose  The Gender',
                // 'countries.required' => 'Please Select Country',
                'password.min' => 'Password should contain minimum 8 characters',
                 'password.regex' => 'Password should contain capital letters,simple letters,number and special characters',
                'password_confirmation.same' => 'Password confirmation should be same as password'
    
    
            ]
           
    
    
        );

    }
}
else{
    $validator = Validator::make(
        $request->all(),
        [
            'first-name'            => 'required|max:255|regex:/^([a-zA-Z ]{1,255})$/ix',
             'last-name'             => 'required|max:255|regex:/^([a-zA-Z ]{1,255})$/ix',
            'dob'                   => 'required',
            // 'countries'               => 'required',
            'email'                 => 'required|unique:users|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix',
            'password'              => 'required|min:8|max:20|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/',
            'password_confirmation' => 'required|same:password',
             'gender'                  => 'required',
                              'club'                  => 'required',

            // 'tel'            => 'numeric|digits_between:8,15',
        ],
        [
            'first-name.required' => 'First Name is Required',
                'first-name.regex' => 'First Name contains only letters',

             'last-name.required'           => 'Last Name is Required',
            'last-name.regex' => 'Last Name contains only letters',
            'dob.required'    => 'Date Of Birth is Required',
            'email.required'  => 'Email is Required',
            'email.regex'  => 'please enter the valid Email',
                            'email.unique'  => 'Email has already been taken',
            'club.required' => 'Club is Required',

            // 'tel.numeric' => 'Mobile Number should be number',
            // 'tel.required' => 'Mobile Number is Required',
                            // 'tel.digits_between' => 'Mobile Number at least contains 8 digits',
             'gender.required'  => 'Please Choose  The Gender',
            // 'countries.required' => 'Please Select Country',
            'password.min' => 'Password should contain minimum 8 characters',
                            'password.regex' => 'Password should contain capital letters,simple letters,number and special characters',

            'password_confirmation.same' => 'Password confirmation should be same as password'


        ]
       


    );
}

        if ($validator->fails()) {
                return redirect('/#toregister')->withErrors($validator)->withInput();


            
        }


        $user = new User;
       $user->first_name             =$request->input('first-name');
         $user->last_name           =    $request->input('last-name');
        $user->tel_number = $request->input('tel');
        $user->dob             = $request->input('dob');
        $user->country_id        = $request->input('country');
        $user->season_id        = $request->input('season');
        $user->organization_id        = $request->input('organization');
        $user->club_id        = $request->input('club');
        $user->email            = $request->input('email');
        $user->member_or_not=$request->input('member')?$request->input('member'):0;
        $user->is_approved=1;


       
            $clb = club::find($request->input('club'));
            $users = User::where('club_id', $request->input('club'))->orderBy('id', 'desc')->get();
            $userIds=array();
            foreach($users as $user1){
                $userIds[]=$user1->userId;
            }
          if ($users->count()>0) {
                           $max=max($userIds);
                $pre = explode(' ',$max);

                $user->userId = $clb->prefix . " " . str_pad(($pre[1] + 1), 4, '0', STR_PAD_LEFT);
            } else {
                $user->userId = $clb->prefix  . " ". str_pad(1, 4, '0', STR_PAD_LEFT);
            }


        $user->password        = Hash::make($request->input('password'));
        $user->gender            = $request->input('gender');
        $user->remember_token            = str_random(64);
        $user->save();
        $user->assignRole(7);
       
        $user_email=$user->email;
		$general = generalSetting::first();
$organization = Organization::find($request->input('organization'));
if($user->organization->emailVerificationSetting){
    $subject=$user->organization->emailVerificationSetting->subject;
}
else{
    $subject='Email Verification';
}
Mail::send(
                ['html' => 'emailVerification'],
                ['user' => $user, 'org' => $organization,'general'=>$general],
                function ($message) use ($user_email,$subject) {
                    $message->to($user_email)
                    ->replyTo('admin@sangamil.no', 'Stovener Games 2022')
                        ->subject($subject);
                }
            );
           return redirect('/')->with('success', 'An email has been sent to your email address containing an activation link. Please click on the link to activate your account. If you do not receive the email within a few minutes, please check your spam folder.'); 
    }
public function verify(Request $request,$id){
    $user=User::find($id);
if($user){
                $user->status=2;
                    $user->is_approved=1;

    $user->save();
    $ipAddress = $_SERVER['REMOTE_ADDR'];
    activity()
        ->causedBy($user)
        ->performedOn($user)
        ->withProperties(["attributes"=>['ip_address' => request()->ip()]])
        ->log('Verified');
    $message="Your email has been verified successfully";
}
else{
    $message="user doesn't exist in the system ";

}
return redirect()->route('login')->with('success', $message);
}
}
