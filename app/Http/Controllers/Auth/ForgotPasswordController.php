<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use DB;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Mail;
use Hash;
use Illuminate\Support\Facades\Validator;
use Auth;
use App\generalSetting;
use App\Models\Organization;
use URL;
use Illuminate\Support\Facades\Crypt;


class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    // use SendsPasswordResetEmails;
    protected $redirectTo = '/signin';
    public function sendResetLinkEmail(Request $request)
    {

        $validator = Validator::make(
            $request->all(),
            [
                'email' => 'required|email|exists:users',
              
            ]
        );
        if ($validator->fails()) {
            return redirect('/#toforgot')->withErrors($validator)->withInput();
        }
        else{

        
        $token = Str::random(64);
        $email = $request->email;
        $user=User::where('email',$email)->first();
        $general = generalSetting::first();
        if($user->organization->emailVerificationSetting){
            $subject=$user->organization->emailVerificationSetting->reset_pw_subject;
        }
        else{
            $subject='Reset Password';
        }
        DB::table('password_resets')->insert([
            'email' => $email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);
   Mail::send(
            ['html' => 'auth.passwords.mail'],
            ['token' => $token, 'email' => $email,'user'=>$user,'general'=>$general],
            function ($message) use ($email,$subject) {
                $message->to($email);
            $message->subject($subject);
            }
        );


        return redirect('/')->with('success', 'We have e-mailed your password reset link!If you do not receive the email within a few minutes, please check your spam folder');
    }
    }
    public function showResetForm($token,$email)
    {
        return view('auth.passwords.reset', ['token' => $token, 'email' => $email]);
    }
    public function updatePassword(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'email' => 'required|email|exists:users|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix',
                 'password'              => 'required|min:8|max:20|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/',
                'password_confirmation' => 'required|same:password',
                // 'password' => 'required|string|min:6|confirmed',
                // 'password_confirmation' => 'required'
            ],
             [
                
                'email.required'  => 'Email is Required',
                'email.regex'  => 'please enter the valid Email',
                                'email.exists'  => 'Email is not exist alreday in the system',

              
                'password.min' => 'Password should contain minimum 8 characters',
                                'password.regex' => 'Password should contain capital letters,simple letters,number and special characters',

                'password_confirmation.same' => 'Password confirmation should be same as password'


            ]

        );
        if ($validator->fails()) {
            return redirect('/password/'.$request->input('token').'/reset/'.$request->input('email').'')->withErrors($validator)->withInput();
        }
        $updatePassword = DB::table('password_resets')
            ->where([
                'token' => $request->token,
                'email' => $request->email
            ])
            ->first();
        if (!$updatePassword) {
            return back()->withInput()->with('error', 'Invalid token!');
        }
        $user = User::where('email', $request->email)
            ->update(['password' => Hash::make($request->password)]);
        DB::table('password_resets')->where(['email' => $request->email])->delete();
        return redirect('/')->with('success', 'You have successfully changed password');
    }


    public function changePassword(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
           [
                 'password'              => 'required|min:8|max:20|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/',
                'password_confirmation' => 'required|same:password',
            
            ],
             [
                
               
                'password.min' => 'Password should contain minimum 8 characters',
                                'password.regex' => 'Password should contain capital letters,simple letters,number and special characters',

                'password_confirmation.same' => 'Password confirmation should be same as password'


            ]
        );
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput(['tab' => 'tab2']);
        }
        $user = User::where('id', Crypt::decrypt($request->id))
            ->update(['password' => Hash::make($request->password)]);
      
        $userId=Crypt::decrypt($request->input('id'))?Crypt::decrypt($request->input('id')):'';
        $general = generalSetting::first();
        // dd($general->website_url."user/view/$userId");
        if (Auth::user()->hasRole(1) || Auth::user()->hasRole(8)) {
            return back()->withInput(['tab' => 'tab2']);
        } else {
            return back()->withInput(['tab' => 'tab2']);
        }
    }
}
