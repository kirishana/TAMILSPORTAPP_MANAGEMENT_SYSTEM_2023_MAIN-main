<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Season;
use App\Models\Organization;
use App\Models\Registration;
use App\Models\League;
use Auth;
use App\User;
use DB;
use Illuminate\Support\Facades\Crypt;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.suvarnanathan@gmail.com    
     *
     * @return \Illuminate\Http\Response
     */
    public function eventApporovals(Request $request){
        $approvals=Registration::where('is_approved',2)->orderBy('id','desc')->get();
        if(Auth::user()->hasRole(3)){
        return view('eventApprovals.index',compact('approvals'));
        }
        else{
            return "sorry! You don't have the permission to access this page";
        }

    }
    public function approve(Request $request,$id){
        $reg=Registration::find($id);
        $reg->is_approved=1;
        $reg->save();
        $url="/event-approvals";
        return response()->json([
"url"=>$url
        ]);
    }
    public function decline(Request $request,$id){
        $reg=Registration::find($id);
        $reg->is_approved=0;
        $reg->save();
        $url="/event-approvals";
        return response()->json([
"url"=>$url
        ]);
    }
    public function create(Request $request,$id)
    {
        $iso = Auth::user()->country->currency->currency_iso_code;
        if ($request->events) {
            foreach ($request->events as $event)
                $org = Event::where('id', $event)->first();
        }
        if ($request->events2) {
            foreach ($request->events2 as $event)
                $org = Event::where('id', $event)->first();
        }
        if ($request->events == null &&  $request->events2 == null) {
            return redirect('/events')->with("error", "please select events");
        }
        $organization_id = $org->organization_id;
        $organization = Organization::find($organization_id);
        $league_id = $org->league_id;
        $trackEvents = $request->events ? $request->events : '';
        $fieldEvents = $request->events2 ? $request->events2 : '';
       
        $season = Season::where('status', 1)->first();
        if($request->input('user')!=null && Auth::user()->club){
            return view('players.previewChildEvents', compact('organization_id', 'trackEvents', 'fieldEvents', 'league_id', 'organization', 'org', 'user', 'iso', 'season'));
        }
        elseif ($request->input('user') !== null) {
            return view('members.member-payment', compact('organization_id', 'trackEvents', 'fieldEvents', 'league_id', 'organization', 'org', 'user', 'iso', 'season'));
        }
        elseif(Auth::user()->club){
                return view('players.previewEvents', compact('organization_id', 'trackEvents', 'fieldEvents', 'league_id', 'organization', 'org', 'user', 'iso', 'season'));

}

        else {
            return view('players.payment', compact('organization_id', 'trackEvents', 'fieldEvents', 'league_id', 'organization', 'org', 'user', 'iso', 'season'));
        }

    }
    public function createClubMemberInvoice(Request $request){
         $iso = Auth::user()->country->currency->currency_iso_code;
        if ($request->events) {
            foreach ($request->events as $event)
                $org = Event::where('id', $event)->first();
        }
        if ($request->events2) {
            foreach ($request->events2 as $event)
                $org = Event::where('id', $event)->first();
        }
        if ($request->events == null &&  $request->events2 == null) {
            return redirect('/events')->with("error", "please select events");
        }

        $organization_id = $org->organization_id;
        $organization = Organization::find($organization_id);
        $league_id = $org->league_id;
        $trackEvents = $request->events ? $request->events : '';
        $fieldEvents = $request->events2 ? $request->events2 : '';
        $user = $request->user ? $request->user : Auth::User()->id;
        $season = Season::where('status', 1)->first();
                        return view('players.previewMemberEvents', compact('organization_id', 'trackEvents', 'fieldEvents', 'league_id', 'organization', 'org', 'user', 'iso', 'season'));

    }
    public function createInvoice(Request $request, $id)
    {
        $reg = Registration::find($id);
        $iso = Auth::user()->country->currency->currency_iso_code;
// dd($request->get('discount'));
        // $iso = Auth::user()->country->currency->currency_iso_code;
        if ($request->events) {
            foreach ($request->events as $event) {

                $org = Event::where('id', $event)->first();
            }
        }
        if ($request->events2) {
            foreach ($request->events2 as $event)
                $org = Event::where('id', $event)->first();
        }
        if ($request->events == null &&  $request->events2 == null) {
            return redirect('/events')->with("error", "please select events");
        }
        $organization_id = $org->organization_id;
        $organization = Organization::find($organization_id);
        $league_id = $org->league_id;
        $trackEvents = $request->events ? $request->events : '';
        $fieldEvents = $request->events2 ? $request->events2 : '';
        $user = $request->user ? $request->user : Auth::User()->id;
        $season = Season::where('status', 1)->first();
        if ($request->input('user') !== null) {
            return view('members.edit-member-payment', compact('organization_id', 'trackEvents', 'fieldEvents', 'league_id', 'organization', 'org', 'user', 'iso', 'season', 'reg'));
        } else {
            return view('players.editpayment', compact('organization_id', 'trackEvents', 'fieldEvents', 'league_id', 'organization', 'org', 'user', 'iso', 'season', 'reg'));
        }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function paymenthMethod(Request $request)
    {
            $organization = $request->input('org');
            $auth = User::find(Auth::user()->id);
            $iso = Auth::user()->country->currency->currency_iso_code;
            $season = Season::where('status', 1)->first();
            $children = $auth->children;
            $org = Organization::find($organization);
            $league = $request->input('league');
            $fieldEvents = $request->input('fieldevents');
            $trackEvents = $request->input('trackEvents');
            $total = $request->input('total');
            $user =  Auth::User()->id;
            return view('players.paymentMethods', compact('user', 'organization', 'trackEvents', 'fieldEvents', 'league', 'total', 'org', 'children', 'season', 'iso'));
    }
    public function paymentExituser(Request $request)
    {
        $league = League::find($request->input('league'));
            $auth = User::find(Auth::user()->id);
            $iso = Auth::user()->country->currency->currency_iso_code;
            $season = Season::where('status', 1)->first();
            $children = $auth->children;
            $fieldEvents = $request->input('fieldevents');
            $trackEvents = $request->input('trackEvents');

            if($request->input('reg')){
                $total = $request->input('total');
                $total = explode(' ', $request->input('total'));
                $registration = Registration::find($request->input('reg'));
                $registration->organization_id = $request->input('org');
                $registration->league_id = $request->input('league');
                $registration->season_id = $league->season_id;
                $registration->payment_method=null;
                $registration->totalfee = $total[1];
                $dob = User::find($request->input('user'));
                // dd($dob);
                $registration->user_id = $request->input('user') ? $request->input('user') : Auth::user()->id;
                    $registration->trans_id =null;
                $gender = $request->input('user') ? $dob->gender : Auth::user()->gender;
                if ($gender == 'male')
                    $registration->gender = 1;
                else
                    $registration->gender = 2;
                $registration->save();
                $registration->events()->detach();
                if ($request->input('fieldevents')) {
                    $registration->events()->attach($request->input('fieldevents', ['age_group_gender_id' => $request->input('gender')]));
                }
                if ($request->input('trackEvents')) {
    
                    $registration->events()->attach($request->input('trackEvents', ['age_group_gender_id' => $request->input('gender')]));
                }
    
                $id = $request->input('user');

            }else{

                $registration = new Registration;
                $total = explode(' ', $request->input('total'));
    
                $registration->organization_id = $request->input('org');
                $registration->league_id = $request->input('league');
                $registration->season_id = $league->season_id;
                $registration->status =2;
                $registration->totalfee = $total[1];
                $registration->is_approved=1;
                $registration->self_reg = 1;
    
                $registration->payment_method=2;
                $dob = User::find(Auth::user()->id);
                // dd($dob);
                $registration->user_id =Auth::user()->id;
                    $registration->trans_id =null;
                $gender =$dob->gender?$dob->gender: Auth::user()->gender;
                // dd($gender);
                if ($gender == 'male')
                    $registration->gender = 1;
                else
                    $registration->gender = 2;
                $registration->save();
                // dd($registration->payment_method);
    
                if ($request->input('fieldevents')) {
                    $registration->events()->attach($request->input('fieldevents'));
                }
                if ($request->input('trackEvents')) {
    
                    $registration->events()->attach($request->input('trackEvents'));
                }
            }

            if ($request->input('user') != Auth::user()->id) {
                $user_id=Crypt::encrypt($request->input("user"));
                return redirect('/member/events/'.$user_id.'')->withInput(['tab' => 'tab2']);
            }
            return redirect('/events')->withInput(['tab' => 'tab2']);
        

    }

    public function editPaymenthMethod(Request $request)
    {
        $organization = $request->input('org');
        $auth = User::find(Auth::user()->id);
        $iso = Auth::user()->country->currency->currency_iso_code;
        $season = Season::where('status', 1)->first();
        $children = $auth->children;
        $org = Organization::find($organization);
        $league = $request->input('league');
        $fieldEvents = $request->input('fieldevents');
        $trackEvents = $request->input('trackEvents');
        $reg = Registration::find($request->input('reg'));
        if ($reg->status == 1) {
            $regTotal = $reg->totalfee;
            $total = $request->input('total');
            $total1 = explode(' ', $request->input('total'));
            $pay = $total1[1] - $regTotal;
        } else {
            $total = $request->input('total');
            $total1 = explode(' ', $request->input('total'));
            $pay = $total1[1];
        }


        $user = $request->input('user') ? $request->input('user') : Auth::User()->id;
        return view('players.editPaymentMethods', compact('user', 'organization', 'trackEvents', 'fieldEvents', 'league', 'total', 'org', 'children', 'season', 'iso', 'pay', 'reg'));
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
    public function edit($id)
    {
        //
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
    public function destroy($id)
    {
        //
    }
}
