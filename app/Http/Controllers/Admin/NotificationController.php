<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\JoshController;
use App\Http\Requests\UserRequest;
use App\User;
use Carbon\Carbon;
use Cartalyst\Sentinel\Laravel\Facades\Activation;
use File;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Redirect;
use Sentinel;
use URL;
use View;
use Yajra\DataTables\DataTables;
use Validator;
use App\Mail\Restore;
use App\Models\Registration;
use App\Models\Organization;
use App\Models\Season;
use stdClass;
use Auth;

class NotificationController extends JoshController
{

    public function show(Request $request, $id)
    {
        $reg = Registration::find($id);
        $userName = User::find($reg->user_id);
        $children = $userName->children ? $userName->children : '';
        $iso = $userName->country->currency->currency_iso_code;
        $organizations = Organization::all();
        $season = Season::where('status', 1)->first();
        Auth::user()->unreadNotifications->map(function ($n) use ($request) {
            if ($n->id == $request->get('notificationId')) {
                $n->markAsRead();
            }
        });
        return view('admin.newuserNotification.show', compact('organizations', 'reg', 'children', 'season', 'iso'));
    }

    public function approve(Request $request)
    {
        $trans_id = $request->input('id');
        $league = $request->input('league');
        $regs = Registration::where('trans_id',$trans_id)->where('league_id',$league)->get();
        foreach($regs as $reg){
             $reg->status = 2;
        $reg->save();
        }

       

        // $email = $reg->user->email;
        // Mail::send(
        //     ['html' => 'admin.newuserNotification.received'],
        //     ['reg' => $reg,],
        //     function ($message) use ($email) {
        //         $message->to($email)
        //             ->subject('Access Granted');
        //     }
        // );
        return response()->json(['url' => url('/payment-requests')]);
    }

    public function decline(Request $request)
    {
        $trans_id = $request->input('id');
        $league = $request->input('league');

        $regs = Registration::where('trans_id',$trans_id)->where('league_id',$league)->get();
        foreach($regs as $reg){
             $reg->status = 3;
        $reg->save();
        }
        // $email = $reg->user->email;
        // Mail::send(
        //     ['html' => 'admin.newuserNotification.declined'],
        //     ['reg' => $reg,],
        //     function ($message) use ($email) {
        //         $message->to($email)
        //             ->subject('Access Denied');
        //     }
        // );
        return response()->json(['url' => url('/payment-requests')]);
    }
}
