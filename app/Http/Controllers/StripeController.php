<?php

namespace App\Http\Controllers;
use App\Models\Registration;
use App\Models\GroupRegistration;
use Illuminate\Http\Request;
use Auth;
use Session;
use Stripe;
use App\Models\Organization;
use Stripe\Customer;
use App\generalSetting;
use Mail;
use Carbon\Carbon;
class StripeController extends Controller
{
    public function stripe()
    {
        return view('stripe');
    }

    public function stripePost(Request $request)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $charge=\Stripe\PaymentIntent::create ([
                "amount" => $request->input('stripeAmount')*100,
                "currency" => "INR",
                "source" => $request->stripeToken,
                // "customer"=>Auth::user()->email,
                "description" => "This is test payment",
        ]);
        $intent = $charge->client_secret;
        return view('clubs.pay',compact('intent','charge'));
        

        // return view('payments',compact('regs','invNo'));
        // Session::flash('success', 'Payment Successful !');
           
        // return view('');
    }
    public function edit(Request $request){
        $org=Organization::find($request->input('org'));
        $stripe = new \Stripe\StripeClient(
            $org->Stripe?$org->Stripe->secret_key:''
          );
        
          $method=$stripe->paymentMethods->retrieve(
            $request->input('results'),
            []
          );
          $invNo=$request->input('invNo');

        $user_email=Auth::user()->email;
        $user=Auth::user();
		$general = generalSetting::first();
$date=Carbon::now()->format('Y-m-d');
    $subject='Payment Confirmation';
    $group=null;
Mail::send(
                ['html' => 'stripePayment'],
                ['user' => $user, 'org' => $org,'general'=>$general,'method'=>$method,'invNo'=>$invNo,'date'=>$date,'group'=>$group],
                function ($message) use ($user_email,$subject) {
                    $message->to($user_email)
                    ->replyTo('admin@sangamil.no', 'Stovener Games 2022')
                        ->subject($subject);
                }
            );
        foreach ($request->input('regs') as $reg) {
            $registration = Registration::find($reg);
           
                $registration->trans_id =$request->input('trans_id');           
                $registration->status = 1;           
                $registration->payment_method = 4;
                $inv = $invNo;
                $registration->inv_no = $inv;
            

            $registration->save();
        }
        
        return redirect('/group-event/payment')->with('success', 'Your payment  updated successfully');
    }
    public function editGroupEvent(Request $request){
        $org=Organization::find($request->input('org'));
        $stripe = new \Stripe\StripeClient(
            $org->Stripe?$org->Stripe->secret_key:''
          );
        
          $method=$stripe->paymentMethods->retrieve(
            $request->input('results'),
            []
          );
          $invNo=$request->input('invNo');

        $user_email=Auth::user()->email;
        $user=Auth::user();
		$general = generalSetting::first();
$date=Carbon::now()->format('Y-m-d');
    $subject='Payment Confirmation';
$group="yes";
Mail::send(
                ['html' => 'stripePayment'],
                ['user' => $user, 'org' => $org,'general'=>$general,'method'=>$method,'invNo'=>$invNo,'date'=>$date,'group'=>$group],
                function ($message) use ($user_email,$subject) {
                    $message->to($user_email)
                    ->replyTo('admin@sangamil.no', 'Stovener Games 2022')
                        ->subject($subject);
                }
            );
        $groupRegistrations = GroupRegistration::where('league_id', $request->input('league'))->where('inv_no', 0)->where('club_id', Auth::user()->club_id)->get();
        foreach ($groupRegistrations as $group) {
            $reg = GroupRegistration::find($group->id);
            $reg->trans_id = $request->input('trans_id');
            $reg->status = 1;
            $reg->inv_no = $request->input('invNo');
            $reg->payment_method = 4;
            $reg->save();
        }
        return redirect('/group-event/payment')->with('success', 'Your payment detials will be updated successfully');
    }
}