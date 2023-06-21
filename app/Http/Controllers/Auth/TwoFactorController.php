<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Mail;
use App\generalSetting;
use Carbon\Carbon;
class TwoFactorController extends Controller
{
    public function index() 
    {
        $general = generalSetting::first();

        return view('auth.twoFactor',compact('general'));
    }

    public function store(Request $request)
    {
      
        $request->validate([
            'two_factor_code' => 'integer|required',
        ]);

        $user = auth()->user();
        if(auth()->check() && $user->two_factor_code)
        {
            $mins=$user->two_factor_expires_at->format('i');
            $nowMinutes=now()->format('i');
            $minutes=$nowMinutes-$mins;
            if($minutes>5)
            {
                $user->resetTwoFactorCode();

                return redirect()->back()
                ->withErrors(['message' =>'The verification  code has expired. Please click below to resend the code.']);
            }
        }
        if($request->input('two_factor_code') == $user->two_factor_code)
        {
if($request->input('twoFactorAuth')){
    // dd(Carbon::now()->format('H:i:s'));
    $user->hrs_on=Carbon::now()->format('H:i:s');
    $user->save();
}
            $user->resetTwoFactorCode();

            if ($user->roles->pluck('name')[0]=='SuperAdmin' || $user->roles->pluck('name')[0]=='CountryAdmin') {
                return redirect('admin/');
            } elseif ($user->roles->pluck('id')[0] == '2') {
                return redirect('/dashboard/' . $user->organization_id . '');
            } elseif ($user->roles->pluck('name')[0]=='ClubAdmin') {
                return redirect('/dashboard/' . $user->id . '');
            } else {
                return redirect('events');
            }
        }
    return redirect()->back()
    ->withErrors(['two_factor_code' => 
        'The verification code you have entered does not match']);

        
    }

    public function resend()
    {
        $general = generalSetting::first();
        $user = auth()->user();
        $user->generateTwoFactorCode();
        $user_email=$user->email;
                Mail::send(
                    ['html' => 'twoFactor'],
                    ['user' => $user, 'general'=>$general],
                    function ($message) use ($user_email) {
                        $message->to($user_email);
                       
                    }
                );
                return redirect("/verify")->with( 'success','The verification code has been sent again');
    }
}
