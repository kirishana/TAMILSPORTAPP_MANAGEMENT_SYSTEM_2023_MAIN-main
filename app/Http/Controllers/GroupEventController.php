<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AgeGroup;
use App\Models\AgeGroupEvent;
use App\Models\AgeGroupGender;
use App\Models\Organization;
use App\Models\Event;
use App\User;
use App\Models\Club;
use App\Models\GroupRegistration;
use App\Models\Registration;
use App\Models\League;
use App\Models\Team;
use App\Models\Gender;
use Auth;
use Carbon\Carbon;
use App\Models\Season;
use Session;
use Stripe;
use Stripe\Customer;
use zaporylie\Vipps\Vipps;
use zaporylie\Vipps\Client;

class GroupEventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function generateInvoice(Request $request)
    {

        if ($request->input('reg')) {
            $teams = array();
            foreach ($request->input('members') as $mem) {
                $teams[] = $mem;
            }
        } else {

            $exp = explode(',', $request->input('member'));
            $teams = array();
            foreach ($exp as $mem) {
                $teams[] = $mem;
            }
        }
        $iso = Auth::user()->country->currency->currency_iso_code;
        $gender = AgeGroupGender::find($request->input('gender'));
        $ageGroupEvent = AgeGroupEvent::where('id', $gender->age_group_event_id)->first();
        $event = Event::find($ageGroupEvent->event_id);
        $org = Organization::find($event->organization_id);

        $reg = $request->input('reg');
        $genderId = $request->input('gender');

        return view('clubs.invoice', compact('teams', 'org', 'event',  'iso', 'reg', 'genderId'));
    }
    public function pay(Request $request)
    {
        $iso = Auth::user()->country->currency->currency_iso_code;
        $org = Organization::find($request->input('org'));
        $total = $request->input('total');
        $invNo = $request->input('invNo');
        $gender = $request->input('gender') ? $request->input('gender') : '';
        $team = $request->input('teams') ? $request->input('teams') : "";
        $regs = $request->input('regs') ? $request->input('regs') : "";
        $event = $request->input('event') ? $request->input('event') : "";
        $league = $request->input('league') ? $request->input('league') : "";
        $reg = $request->input('reg') ? $request->input('reg') : '';
        $season = $request->input('season') ? $request->input('season') : '';
        if($org->stripe){
        Stripe\Stripe::setApiKey($org->Stripe?$org->Stripe->secret_key:'');
      
        $customer = Customer::create(array(
            'name' =>Auth::user()->first_name.Auth::user()->last_name,
            'email'  =>Auth::user()->email,
        ));
     
        $charge=\Stripe\PaymentIntent::create ([
            'customer' => $customer->id,
                "amount" => $total*100,
                "currency" => 'INR',
                "source" => $request->stripeToken,
                "description" => Auth::user()->first_name.Auth::user()->last_name."paid for events",


        ]);
        $intent = $charge->client_secret;
        }
        else{
        $intent=null;
        $charge=null;
        $customer=null;
        }
        return view('clubs.pay', compact('total','customer', 'invNo', 'org', 'iso', 'team', 'event', 'gender', 'league', 'regs', 'season','intent','charge'));
    }

    public function register(Request $request)
    {
        if ($request->input('reg') != null) {
            $reg = GroupRegistration::find($request->input('reg'));
            $ageGroupGender = AgeGroupGender::find($request->input('gender'));
            $event = Event::find($ageGroupGender->ageGroupEvent->event_id);
            $groupTotalFee = ($event->mainEvent->price) * count($request->members);
            $reg->totalfee = $groupTotalFee;
            $reg->teams()->detach();
            $reg->teams()->attach($request->members);
            $reg->save();
             } 
        else {
            $reg1 = new GroupRegistration();
            if (Auth::user()->hasRole(2)) {
                $reg1->club_id = Session::get('clubId');
            } else {
                $reg1->club_id = Auth::user()->club_id;
            }
            $ageGroupGender = AgeGroupGender::find($request->input('gender'));
            $event = Event::find($ageGroupGender->ageGroupEvent->event_id);
            $groupTotalFee =($event->mainEvent->price - (($event->discount / 100) * $event->mainEvent->price)) * count(explode(',', $request->member));
            $reg1->age_group_gender_id = $request->input('gender');
            $reg1->event_id = $ageGroupGender->ageGroupEvent->event_id;
            $reg1->organization_id = $ageGroupGender->ageGroupEvent->Event->organization_id;
            $reg1->season_id = 1;
            $reg1->league_id = $ageGroupGender->ageGroupEvent->Event->league_id;
            $reg1->totalfee = $groupTotalFee;
            // dd($reg1);
            $reg1->save();
            if (Auth::user()->hasRole(2)) {
                $reg1->teams()->attach(explode(',', $request->member));
            } else {
                $reg1->teams()->attach(explode(',', $request->member));
            }
        }
        if (Auth::user()->hasRole(2)) {
            $clubId = Session::get('clubId');
            $clubs = Club::where('is_approved', 1)->get();
            $club1 = null;
            $teams = 0;
            $team = null;
            $futureEvents = null;
            $leagues = League::where('to_date', '>=', Carbon::now()->format('Y-m-d'))->get();
            $leagueEvents = League::where('to_date', '>=', Carbon::now()->format('Y-m-d'))->where('from_date', '<', Carbon::now())->orwhere('from_date', '>=', Carbon::now()->format('Y-m-d'))->get();
            return view('admin.clubTeams.index', compact('leagueEvents','clubs', 'club1', 'teams', 'team', 'clubId', 'leagues', 'futureEvents'));
        } else {
            return redirect('/events')->withInput(['tab' => 'tab5']);
        }
    }
    public function editSingleEventPayment(Request $request)
    {
        foreach ($request->input('regs') as $reg) {
            $registration = Registration::find($reg);
            if ($request->input('transId')) {
                $registration->trans_id = $request->input('transId');
            } else {
                $registration->trans_id = $request->input('transId2');
            }
            $registration->status = 1;
            if ($request->input('club') == "0") {
                $registration->payment_method = '3';
            } else {
                $registration->payment_method =$request->input('method')== 'bank'? '1' : ($request->input('method') == 'Vipps'? '2' : '5');
            }
            if ($request->input('club') == "0") {
                $registration->inv_no = 0;
            } else {
                $inv = $request->input('invNo');
                $registration->inv_no = $inv;
            }
            $registration->save();
        }
        return redirect('/group-event/payment')->with('success', 'Your payment  updated successfully');

    }
    public function VippsPay(Request $request)
    {
        $amount= $request->input('total');
            $mobile= $request->input('mobile');
            $order_id=$request->input('invNo');
            $regs[]=$request->input('regs');
            $options=$regs;
            $mobile = substr($mobile,-8);
            $client = new \zaporylie\Vipps\Client(env('VIPPS_CLIENT_ID'));
            $app = new \zaporylie\Vipps\Vipps($client);
            $auth = $app->authorization(env('VIPPS_SUB_KEY'));
            $auth->getToken(env('VIPPS_CLIENT_SECRET'));
            // Get payment API - pass product's subcription key obtainted from Developer Portal.
            // @see \zaporylie\Vipps\Vipps::payment()
            $payment = $app->payment(env('VIPPS_SUB_KEY'), env('VIPPS_MERCHANT_SERIAL'));
            // Initiate new payment.
            // @see \zaporylie\Vipps\Api\Payment::initiatePayment()
            $payment_details = $payment->initiatePayment($order_id,$mobile,$amount, 'Events registration amount', '/afterVippsPay',$options);
        
        return redirect('/group-event/payment')->with('success', 'Your payment  updated successfully');
    }
    public function payment()
    {
        $iso = Auth::user()->country->currency->currency_iso_code;
        $season = Season::where('status', 1)->first();
        $leagueEvents = GroupRegistration::where('club_id', Auth::user()->club_id)->whereNotIn('status', [3])->get();
        $leagueIndividualEvents = League::where('to_date', '>', Carbon::now())->orderBy('created_at', 'desc')->get();
        $leaguePastEvents = League::where('to_date', '<', Carbon::now())->orderBy('created_at', 'desc')->get();

        return view('clubs.payment', compact('leagueEvents', 'season', 'iso', 'leaguePastEvents', 'leagueIndividualEvents'));
    }
    public function approve(Request $request)
    {

        $regs = GroupRegistration::where('league_id', $request->input('league'))->where('club_id', $request->input('id'))->where('trans_id', $request->input('transId'))->get();
        foreach ($regs as $reg) {
            $reg->status = 2;
            $reg->save();
        }
        return response()->json([
            'url' => url('/payment-requests'),
            'status' => 200
        ]);
    }

    public function decline(Request $request)
    {
        $regs = GroupRegistration::where('league_id', $request->input('league'))->where('club_id', $request->input('id'))->where('trans_id', $request->input('transId'))->get();
        foreach ($regs as $reg) {
            $reg->status = 5;
            $reg->save();
        }
        return response()->json([
            'url' => url('/payment-requests'),
            'status' => 200
        ]);
    }
    public function editEvent($id)
    {
if(Auth::user()->hasRole(2)){
    $event = AgeGroupGender::find($id);
    $member = GroupRegistration::where('club_id', Session::get('clubId'))->where('age_group_gender_id', $id)->first();
    $team1 = $member->teams;
    $teams = Team::where('club_id', Session::get('clubId'))->get();
}else{
    $event = AgeGroupGender::find($id);
    $member = GroupRegistration::where('club_id', Auth::user()->club_id)->where('age_group_gender_id', $id)->first();
    $team1 = $member->teams;
    $teams = Team::where('club_id', Auth::user()->club_id)->get();
}
        

        return view('clubs.editEvent', compact('event', 'teams', 'team1', 'member'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function futureInvoice(Request $request, $id)
    {
        $groupRegistrations = GroupRegistration::where('club_id', Auth::user()->club_id)->where('payment_method', 0)->where('league_id', $id)->get();
        Session::put('groupRegistrations', $groupRegistrations);

        $iso = Auth::user()->country->currency->currency_iso_code;
        foreach ($groupRegistrations as $group) {
            $org = $group->organization;
            $league =$group->league;
        }
        return view('clubs.futureInvoice', compact('groupRegistrations', 'org', 'league', 'iso'));
    }
    public function redirectInvoice(Request $request)
    {
        $iso = Auth::user()->country->currency->currency_iso_code;
        $groupRegistrations = Session::get('groupRegistrations');
        foreach ($groupRegistrations as $group) {
            $org = $group->organization;
            $league = $group->league;
        }
        return view('clubs.futureInvoice', compact('groupRegistrations', 'org', 'league', 'iso'));
    }
    public function individualEvent($id)
    {
        // $ages = AgeGroup::all();
        // foreach ($ages as $age) {
        //     $events = AgeGroupEvent::where('age_group_id', $age->id)->get();
        //     foreach ($events as $event) {
        //         $genders = AgeGroupGender::where('id', 7)->get();
        //         foreach ($genders as $gender) {
        //             foreach ($gender->users as $user) {
        //                 dd($user->pivot->time);
        //             }
        //         }
        //     }
        // }
        $invoiceCount = Registration::where('league_id', $id)->where('status', '!=', 4)->count();
        // dd($invoiceCount);
        $iso = Auth::user()->country->currency->currency_iso_code;
        $league = League::find($id);
        $org = $league->organization;
        $season = Season::where('status', 1)->first();
        // dd($org);
        return view('clubs.individualEventInvoice', compact('org', 'league', 'invoiceCount', 'iso', 'season'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function payBill(Request $request)
    {
        // dd($request->all());
        $league = League::find($request->input('league'));
        $iso = Auth::user()->country->currency->currency_iso_code;
        $org = Organization::find($request->input('org'));
        $groupRegistrations = $request->input('groupRegistraions');
        $trans = $request->input('trans');
        $total = $request->input('total');
        $invNo = $request->input('invNo');
        if($org->stripe){
            Stripe\Stripe::setApiKey($org->Stripe?$org->Stripe->secret_key:'');
          
            $customer = Customer::create(array(
                'name' =>Auth::user()->first_name.Auth::user()->last_name,
                'email'  =>Auth::user()->email,
            ));
         
            $charge=\Stripe\PaymentIntent::create ([
                'customer' => $customer->id,
                    "amount" => $total*100,
                    "currency" => 'INR',
                    "source" => $request->stripeToken,
                    "description" => Auth::user()->first_name.Auth::user()->last_name."paid for group Events",
    
    
            ]);
            $intent = $charge->client_secret;
            }
            else{
            $intent=null;
            $charge=null;
            $customer=null;
            }
        return view('clubs.editPay', compact('groupRegistrations', 'league', 'iso', 'org', 'total', 'trans', 'invNo','intent','charge','customer'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editGroupEvent(Request $request)
    {
        $groupRegistrations = GroupRegistration::where('league_id', $request->input('league'))->where('inv_no', 0)->where('club_id', Auth::user()->club_id)->get();
        foreach ($groupRegistrations as $group) {
            $reg = GroupRegistration::find($group->id);
            $reg->trans_id = $request->input('transId') ? $request->input('transId') : $request->input('transId2');
            $reg->status = 1;
            $reg->inv_no = $request->input('invNo');
            $reg->payment_method =$request->input('method')== 'Bank'? '1' : ($request->input('method') == 'Vipps'? '2' : '5');
            $reg->save();
        }
        return redirect('/group-event/payment')->with('success', 'Your payment detials will be updated successfully');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        
        if (Auth::user()->hasRole(2)) {
            $groupReg = GroupRegistration::find($id);
        $groupReg->teams()->detach();
        $groupReg->delete();
            $clubId = Session::get('clubId');
            $club=Club::find($clubId);
            $teams = Team::with('users')->where('club_id', $club->id)->where('status',1)->get();
            $users = User::where('club_id', $club->id)->where('is_approved',1)->get();
            $genders=Gender::all();
            $ages=AgeGroup::orderBy('name','asc')->groupBy('name')->get();
            $ageGroup=array();
            foreach($ages as $age){
                foreach($age->events as $event){
                    if($event->mainEvent->event_category_id==3){
                        $ageGroup[]=$age;
                    }
                }
            }
            $team=null;
            $ageGroups=array_unique($ageGroup);
            $club1="hi";
            $clubId=$club->id;
            $futureEvents="hello";
            $leagueEvents = League::where('to_date', '>', Carbon::now())->where('from_date', '<', Carbon::now())->orwhere('from_date', '>', Carbon::now())->get();
            $clubs=Club::where('is_approved',1)->get();
            $leagues=League::where('to_date','>=',Carbon::now()->format('Y-m-d'))->get();
             return response()->json([
    'html'=>view('admin.clubTeams.registeredEvents', compact('leagueEvents','leagues','clubs','clubId','teams', 'users','team','genders','ageGroups','club','club1','futureEvents'))->render()
     ]);
    //         return response()->json([
    // 'html'=>view('admin.clubTeams.registeredEvents', compact('leagueEvents','leagues','clubs','clubId','teams', 'users','team','genders','ageGroups','club','club1','futureEvents'))->render()
    //  ]);
        
        } else {
            $groupReg = GroupRegistration::find($id);
        $groupReg->teams()->detach();
        $groupReg->delete();
        $url = '/events';
        return response()->json(['url' => $url]);
    }
}
}
