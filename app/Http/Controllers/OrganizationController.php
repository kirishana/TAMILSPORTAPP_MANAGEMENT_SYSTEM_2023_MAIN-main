<?php

namespace App\Http\Controllers;

use App\DataTables\OrganizationDataTable;
use App\Http\Requests;
use App\Models\Organization;
use Flash;
use App\Models\Country;
use App\Models\Season;
use App\Models\League;
use App\Models\Team;
use App\User;
use App\Models\OrganizationSetting;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Illuminate\Support\Facades\Validator;
use Mail;
use Response;
use Auth;
use PDF;
use Carbon\Carbon;
use App\generalSetting;
use App\Models\BankTransfer;
use App\Models\Vipps;
use App\Models\Stripe;
use App\Models\ActivePaymentMethod;
use App\Models\Club;
use App\Models\Event;

use App\Exports\OrgExcelExport;
use App\Exports\Archived_OrglExport;
use App\Models\QrPayment;
use Spatie\Permission\Models\Role;
use File;
use Excel;
use Illuminate\Support\Facades\Crypt;
use Yajra\DataTables\DataTables;
use Session;
use Mailchimp;
class OrganizationController extends AppBaseController
{
    public function futureLeagues(Request $request,$id){
    $org=Organization::find($id);
    $leagues=$org->leagues()->where('reg_start_date','<',Carbon::now()->format('Y-m-d')||'reg_start_date','=',Carbon::now()->format('Y-m-d'))->where('reg_end_date','>=',Carbon::now()->format('Y-m-d'))->get();
    return response()->json([
        'leagues' => $leagues
    ]);

}
public function futureLeagueEvents(Request $request,$id){
    $league=League::find($id);
    if(Auth::user()->hasRole(2)){
        $club=Session::get('cl');
        $club1="hi";
        $teams = Team::where('club_id', Session::get('clubId'))->get();
        }
        else{
            $teams = Team::where('club_id', Auth::user()->club_id)->get();
    
        }
    $futureEvents=1;
    if(Auth::user()->hasRole(2)){
        $leagues=League::where('to_date','>=',Carbon::now()->format('Y-m-d'))->where('organization_id',Auth::user()->organization_id)->get();
        $events=Event::where('league_id',$league->id)->whereHas('mainEvent', function ($q)  {
            $q->where('event_category_id', 3);  
        })->get();
        $selectedLeague=League::find($id);

        $view = view('admin.clubTeams.reg', compact('leagues','club1','league','teams','futureEvents','events'))->render();
    }else{
        $leagues =League::where('reg_start_date','<=',Carbon::now()->format('Y-m-d'))->where('reg_end_date','>=',Carbon::now()->format('Y-m-d'))->get();
$selectedLeague=League::find($id);
        $view = view('clubs.futureEvents', compact('selectedLeague','leagues','teams','futureEvents'))->render();
    }
    return response()->json(['html' => $view,'selectedLeague'=>$selectedLeague,
    'cl'=>Session::get('cl'),
]);
}
    public function org($id, Request $request)
    {
        $organization = Organization::where('id', $request->input('org'))->first();
        // dd($organization);
        $admin = User::role('OrganizationAdmin')->where('organization_id', $organization->id)->first();
        // dd($admin);
        // $id = $admin->id;
        // $orgId = $admin->organization->id;
        Session::put('id', $request->input('org'));
        // $organization=Organization::find($request->input('org'));
        $url = '/dashboard/' . $organization->id . '';
        return response()->json([
            'url' => $url,
            'organization' => $organization->id
        ]);
    }
    /**
     * Display a listing of the Organization.
     *
     * @param OrganizationDataTable $organizationDataTable
     * @return Response
     */
    public function index(Request $request)
    {
        $event = Session::get('id');
        $search = $request->get('query')?$request->get('query'):'';
        Session::put('search', $search);
        $organizations = Organization::all();
        $general = generalSetting::first();
        $header = $general->header;
        // dd($search);
        if(Auth::user()->hasRole(8)){
        return view('organizations.index', compact('organizations', 'general','header'));
        }
        else{
            return "sorry! You don't have the permission to access this page";
        }
    }
    public function archived()
    {
        $organizations = Organization::all();
        $general = generalSetting::first();
        $header = $general->header;
        $seasonIds=array();
        $seasons = Season::where('status', 1)->get();
        foreach($seasons as $season){
            $seasonIds[]=$season->id;
        } 
        $Archivedorganizations = Organization::with(['country'])->where('status', 0)->whereIn('season_id', $seasonIds)
        ->where('country_id', Auth::user()->country_id)->get();

        return view('organizations.archived', compact('organizations','Archivedorganizations', 'general','header'));
    }
    public function data()
    {
        $season = Season::where('status', 1)->first();
        $seasonIds=array();
        $seasons = Season::where('status', 1)->get();
        foreach($seasons as $season){
            $seasonIds[]=$season->id;
        } 
        if(Auth::user()->hasRole(1)){
        $organizations = Organization::with(['country'])->where('status', 1)->where('country_id', Auth::user()->country_id)->get();
        }
        else{
            $organizations = Organization::with(['country'])->where('status', 1)->get();

        }
        return DataTables::of($organizations)
            ->editColumn('created_at', function (Organization $organization) {
                return $organization->created_at->format('m/d/Y');
            })

            ->addColumn('actions', function ($organization) {
                $id = $organization->id;
                $actions = '<button style="padding: 2px 4px" class=" btn btn-danger delete" data-id="' . $id . '" ata-toggle="tooltip" data-placement="top" title="Decline"><i class="material-icons" style="margin-bottom:5px">highlight_off</i></button>
                <a href=' . route('organizations.edit', Crypt::encrypt($id)) . '><button style="padding: 2px 4px" class=" btn btn-primary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="material-icons" style="margin-bottom:5px">edit</i></button></a>';

                return $actions;
            })
            ->rawColumns(['actions'])
            ->make(true);
    }
    /**
     * Show the form for creating a new Organization.
     *
     * @return Response
     */
    public function create()
    {
        $organizations = Organization::all();
        $countries = Country::all();
        $season = Season::where('status', 1)->latest()->first();
        $general = generalSetting::first();
if(Auth::user()->hasRole(8)){
        return view('organizations.create', compact('organizations', 'countries', 'season', 'general'));
}
else{
    return "sorry! You don't have the permission to access this page";
}
    }

    /**
     * Store a newly created Organization in storage.
     *
     * @param CreateOrganizationRequest $request
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name'                  => 'required|max:255|unique:organizations',
                'email'                       => 'required',
                'mobile'                       => 'required',
                'address'              => 'required|max:255',
                'state' => 'required',
                'country'                  => 'required',
                'postal'                    => 'required',
                'city' => 'required',



            ],
            [
                'name.required' => 'Organization Name is Required',
                'name.unique'=>'Organization Name is already Taken',
                'email.required'           => 'Email is Required',
                'mobile.required'    => 'Mobile Number is Required',
                'address.required'       => 'Address is Required',
                'state.required'  => 'State is Required',
                'country.required'  => 'Select the Country',
                'postal.required'  => 'PostalCode is Required',
                'city.required'  => 'City is Required',
            ]
        );

        if ($validator->fails()) {
            return redirect('/organizations/create')->withErrors($validator)->withInput();
        }
        $organization = new Organization;
        if($request->input('prefix')!=null){
            $prefixget= $request->input('prefix');
            $prefix=strtoupper($prefixget);
        }else{
            $prefixFinal=null;

            $result = preg_replace("([A-Z]|[a-z]|[0-9])", " $0", $request->input('name'));
            $result = explode(' ', trim($result));
    
            $count = count($result);
            $final=array_map('strtoupper', $result);
    
    $organizations=Organization::all();
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
            // foreach($organizations as $club)
            // {
            
            //      $pre=$club->prefix;
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
      
        // $prefix=$prefixFinal!=null?$prefixFinal:$prefix;
        $organization->name   = $request->input('name');
        $organization->email   = $request->input('email');
        $organization->tpnumber  = $request->input('tp');
        $organization->mobile   = $request->input('mobile');
        $organization->address   = $request->input('address');
        $organization->state   = $request->input('state');
        $organization->postalcode   = $request->input('postal');
        $organization->country_id   = $request->input('country');
        $organization->orgnum   = $request->input('orgnum');
        $organization->city   = $request->input('city');
        $organization->season_id   = $request->input('season');
                    $organization->prefix  = $prefix;
// dd($organization->prefix);
        $organization->save();

        // $user_email=$request->input('email');
        // Mail::send(['html' => 'organizations.mail'], ['organization' => $organization],
        //     function ($message) use ($user_email) {
        //         $message->to($user_email)
        //             ->subject('Organization Registration');
        //     });
        return redirect('/organizations');
    }

    /**
     * Display the specified Organization.
     *
     * @param  int $id
     *
     * @return Response
     */

    public function show($id)
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        $organization = $user->organization;
        return view('organizations.show', compact('organization'));
    }

    /**
     * Show the form for editing the specified Organization.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var Organization $organization */
        $organization = Organization::find(Crypt::decrypt($id));
        $countries = Country::all();
        $admins = User::role('OrganizationAdmin')->get();
        $general = generalSetting::first();
        return view('organizations.edit', compact('organization', 'countries', 'general','admins'));
    }

    /**
     * Update the specified Organization in storage.
     *
     * @param  int              $id
     * @param UpdateOrganizationRequest $request
     *
     * @return Response
     */
    function update(Request $request,$id)
    {
        /** @var Organization $organization */
        $organization = Organization::find($id);
        $validator = Validator::make(
            $request->all(),
            [
                'name'                  => 'required|max:255',
                'email'                       => 'required',
                'address'              => 'required|max:255',
                'state' => 'required',
                'postal'                    => 'required'
            ],
            [
                'name.required' => 'Organization Name is Required',
                'email.required'           => 'Email is Required',
                'address.required'       => 'Address is Required',
                'state.required'  => 'State is Required',
                'postal.required'  => 'PostalCode is Required',


            ]

        );

        if ($validator->fails()) {
            return redirect('/organizations/'. Auth::user()->organization_id .'/edit')->withErrors($validator)->withInput();
        }
        $organization->name   = $request->input('name');
        $organization->email   = $request->input('email');
        $organization->tpnumber  = $request->input('tp');
        $organization->mobile   = $request->input('mobile');
        $organization->address   = $request->input('address');
        $organization->state   = $request->input('state');
        $organization->orgnum   = $request->input('orgnum');

        $organization->postalcode   = $request->input('postal');
        $organization->save();
        $id=Auth::user()->id;
        return redirect("/organizations");
    }

    /**
     * Remove the specified Organization from storage.
     *
     * @param  int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function settings()
    {
        $id = Session::get('id');


        $admins = User::role('OrganizationAdmin')->where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->get();
        $organization = Auth::user()->organization_id ? Auth::user()->organization_id : $id;
        // dd($organization);

        $admins = User::role('OrganizationAdmin')->where('organization_id', Auth::user()->organization_id?Auth::user()->organization_id:$id)->get();
        $organization = Auth::user()->organization_id?Auth::user()->organization_id:$id;
        // dd($or?ganization);
        return view('organizations.settings', compact('admins', 'organization'));
    }
    public function paymentMethods(Request $request)
    {
        $id = Session::get('id') ? Session::get('id') : '';

        $bank = BankTransfer::where("organization_id", Auth::user()->organization_id ? Auth::user()->organization_id : $id) ? BankTransfer::where("organization_id", Auth::user()->organization_id ? Auth::user()->organization_id : $id)->first() : '';
        $vipps = Vipps::where("organization_id", Auth::user()->organization_id ? Auth::user()->organization_id : $id) ? Vipps::where("organization_id", Auth::user()->organization_id ? Auth::user()->organization_id : $id)->first() : '';
        $stripe = Stripe::where("organization_id", Auth::user()->organization_id ? Auth::user()->organization_id : $id) ? Stripe::where("organization_id", Auth::user()->organization_id ? Auth::user()->organization_id : $id)->first() : '';
        $qrPayment=QrPayment::where("organization_id", Auth::user()->organization_id ? Auth::user()->organization_id : $id) ? QrPayment::where("organization_id", Auth::user()->organization_id ? Auth::user()->organization_id : $id)->first() : '';
        return view('paymentMethods.index', compact('bank','qrPayment', 'vipps', 'stripe', 'id'));
    }
    public function bankTransfer(Request $request)
    {
        $id = Session::get('id') ? Session::get('id') : '';

        $validator = Validator::make(
            $request->all(),
            [
                'bank'                  => 'required|max:255',
                'holder'                       => 'required',
                'number'                       => 'required',
                'branch' => 'required',
            ],
            [
                'bank.required' => 'Bank Name is Required',
                'holder.required'           => 'Accoount Holder Name is Required',
                'number.required'    => 'Account Number is Required',
                'branch.required'  => 'Branch is Required',
            ]

        );

        if ($validator->fails()) {
            return redirect('/organizations/payment-methods')->withErrors($validator)->withInput();
        }

        $bank = new BankTransfer();
        $bank->organization_id = Auth::user()->organization_id ? Auth::user()->organization_id : $id;
        $bank->bank_name   = $request->input('bank');
        $bank->account_holder_name   = $request->input('holder');
        $bank->account_number  = $request->input('number');
        $bank->account_branch   = $request->input('branch');
        $bank->swift_code   = $request->input('swiftCode') ? $request->input('swiftCode') : "";
        $bank->info   = $request->input('info') ? $request->input('info') : "";
        $bank->save();


        return redirect('/organizations/payment-methods');
    }
    public function bankTransferUpdate(Request $request, $bankId)
    {
        $id = Session::get('id') ? Session::get('id') : '';
        $validator = Validator::make(
            $request->all(),
            [
                'bank'                  => 'required|max:255',
                'holder'                       => 'required',
                'number'                       => 'required',
                'branch' => 'required',
            ],
            [
                'bank.required' => 'Bank Name is Required',
                'holder.required'           => 'Accoount Holder Name is Required',
                'number.required'    => 'Account Number is Required',
                'branch.required'  => 'Branch is Required',
            ]

        );

        if ($validator->fails()) {
            return redirect('/organizations/payment-methods')->withErrors($validator)->withInput();
        }

        $bank = BankTransfer::find($bankId);
        $bank->organization_id = Auth::user()->organization_id ? Auth::user()->organization_id : $id;
        $bank->bank_name   = $request->input('bank');
        $bank->account_holder_name   = $request->input('holder');
        $bank->account_number  = $request->input('number');
        $bank->account_branch   = $request->input('branch');
        $bank->swift_code   = $request->input('swiftCode') ? $request->input('swiftCode') : "";
        $bank->info   = $request->input('info') ? $request->input('info') : "";
        $bank->save();


        return redirect('/organizations/payment-methods');
    }
//qrpayment
public function qrPayment(Request $request)
{

    $id = Session::get('id') ? Session::get('id') : '';

    $validator = Validator::make(
        $request->all(),
        [
            'name'                  => 'required|max:255',
            'number'                       => 'required',
            'qrCode'                       => 'required',
            'qrLogo'                       => 'required'

        ],
        [
            'name.required' => ' Organization Name is Required',
            'number.required'           => 'Number is Required',
            'qrCode.required'    => 'Qr code is Required',
            'qrLogo.required'    => 'Qr logo is Required',
        ]

    );

    if ($validator->fails()) {
        return redirect('/organizations/payment-methods')->withErrors($validator)->withInput();
    }
    $qrPayment = new QrPayment();
    $qrPayment->organization_id = Auth::user()->organization_id ? Auth::user()->organization_id : $id;
    $qrPayment->name   = $request->input('name');
    $qrPayment->no   = $request->input('number');
    if ($image = $request->file('qrCode')) {
        $destinationPath = 'organization/vipps';
        $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
        $image->move($destinationPath, $profileImage);
        $input['qr_code'] = "$profileImage";
        $qrPayment->qr_code = $input['qr_code'];
    }
    if ($qrLogo = $request->file('qrLogo')) {
        $destinationPath = 'organization/vipps/logo';
        $profileImage = date('YmdHis') . "." . $qrLogo->getClientOriginalExtension();
        $qrLogo->move($destinationPath, $profileImage);
        $input['qr_logo'] = "$profileImage";
        $qrPayment->qr_logo= $input['qr_logo'];
    }
    $qrPayment->save();


    return redirect('/organizations/payment-methods');
}
public function qrPaymentUpdate(Request $request, $vipsId)
{
    $id = Session::get('id') ? Session::get('id') : '';
    $validator = Validator::make(
        [
            'name'                  => 'required|max:255',
            'number'                       => 'required',
            'qrCode'                       => 'required',
            'qrLogo'                       => 'required'

        ],
        [
            'name.required' => ' Organization Name is Required',
            'number.required'           => 'Number is Required',
            'qrCode.required'    => 'Qr code is Required',
            'qrLogo.required'    => 'Qr logo is Required',
        ]


    );

    if ($validator->fails()) {
        return redirect('/organizations/payment-methods')->withErrors($validator)->withInput();
    }
    $qrPayment = QrPayment::find($vipsId);
    $qrPayment->organization_id = Auth::user()->organization_id ? Auth::user()->organization_id : $id;
    $qrPayment->name   = $request->input('name');
    $qrPayment->no   = $request->input('number');
    $qrPayment->save();
    $image = $request->file('qrCode');
    if ($image) {
        $destinationPath = 'organization/vipps';
        $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
        $image->move($destinationPath, $profileImage);
        $qrCode = public_path('organization/vipps/') . Auth::user()->organization->qrPayment->qr_code;
        $input['qr_code'] = "$profileImage";
        $qrPayment->qr_code = $input['qr_code'];
        if (file_exists($qrCode)) {

@unlink($qrCode); // then delete previous photo
            $qrPayment->qr_code =  $input['qr_code'];
            $qrPayment->save();
        }else{
            $qrPayment->qr_code =  $input['qr_code'];
            $qrPayment->save();
        }
    }
    if ($image1 = $request->file('qrLogo')) {
        $destinationPath = 'organization/vipps/logo';
        $profileImage = date('YmdHis') . "." . $image1->getClientOriginalExtension();
        $image1->move($destinationPath, $profileImage);
        $qrLogo = public_path('organization/vipps/logo/') .Auth::user()->organization->qrPayment->qr_logo;
        $input['qr_logo'] = "$profileImage";
        $qrPayment->qr_logo = $input['qr_logo'];
        if (file_exists($qrLogo)) {
            @unlink($qrLogo); // then delete previous photo
            $qrPayment->qr_logo =  $input['qr_logo'];
            $qrPayment->save();    
        }else{
            $qrPayment->qr_logo =  $input['qr_logo'];
            $qrPayment->save();
        }
    
}
return redirect('/organizations/payment-methods');
}
//end
    public function vipps(Request $request)
    {

        $id = Session::get('id') ? Session::get('id') : '';

        $validator = Validator::make(
            $request->all(),
            [
                'clientId'                  => 'required|max:255',
                'clientSecret'                       => 'required',
                'merchantSerial'                       => 'required',
                'subKey'                       => 'required'
            ],
            [
                'clientId.required' => 'Client Id is Required',
                'clientSecret.required'           => 'Client Secret is Required',
                'merchantSerial.required'    => 'Merchant Serial is Required',
                'subKey.required'    => 'Subscription Key is Required',
            ]

        );

        if ($validator->fails()) {
            return redirect('/organizations/payment-methods')->withErrors($validator)->withInput();
        }

        $vipps = new Vipps();
        $vipps->organization_id = Auth::user()->organization_id ? Auth::user()->organization_id : $id;
        $vipps->client_id   = $request->input('clientId');
        $vipps->client_secret   = $request->input('clientSecret');
        $vipps->merchant_serial   = $request->input('merchantSerial');
        $vipps->subscription_key   = $request->input('subKey');
        $vipps->save();


        return redirect('/organizations/payment-methods');
    }
    public function vippsUpdate(Request $request, $vipsId)
    {
        $id = Session::get('id') ? Session::get('id') : '';

        $validator = Validator::make(
            $request->all(),
            [
                'clientId'                  => 'required|max:255',
                'clientSecret'                       => 'required',
                'merchantSerial'                       => 'required',
                'subKey'                       => 'required'
            ],
            [
                'clientId.required' => 'Client Id is Required',
                'clientSecret.required'           => 'Client Secret is Required',
                'merchantSerial.required'    => 'Merchant Serial is Required',
                'subKey.required'    => 'Subscription Key is Required',
            ]

        );

        if ($validator->fails()) {
            return redirect('/organizations/payment-methods')->withErrors($validator)->withInput();
        }

        $vipps = Vipps::find($vipsId);
        $vipps->organization_id = Auth::user()->organization_id ? Auth::user()->organization_id : $id;
        $vipps->client_id   = $request->input('clientId');
        $vipps->client_secret   = $request->input('clientSecret');
        $vipps->merchant_serial   = $request->input('merchantSerial');
        $vipps->subscription_key   = $request->input('subKey');
        $vipps->save();


        return redirect('/organizations/payment-methods');
    }
    public function stripe(Request $request)
    {
        $id = Session::get('id') ? Session::get('id') : '';

        $validator = Validator::make(
            $request->all(),
            [
                'secret'                  => 'required|max:255',
                'publish'                       => 'required',

            ],
            [
                'secret.required' => 'Secret Key is Required',
                'publish.required'           => 'Publish Key is Required',
            ]

        );

        if ($validator->fails()) {
            return redirect('/organizations/payment-methods')->withErrors($validator)->withInput();
        }

        $stripe = new Stripe();
        $stripe->organization_id = Auth::user()->organization_id ? Auth::user()->organization_id : $id;
        $stripe->secret_key   = $request->input('secret');
        $stripe->public_key   = $request->input('publish');
        $stripe->save();


        return redirect('/organizations/payment-methods');
    }
    public function stripeUpdate(Request $request, $stripeId)
    {
        $id = Session::get('id') ? Session::get('id') : '';

        $validator = Validator::make(
            $request->all(),
            [
                'secret'                  => 'required|max:255',
                'publish'                       => 'required',

            ],
            [
                'secret.required' => 'Secret Key is Required',
                'publish.required'           => 'Publish Key is Required',
            ]

        );

        if ($validator->fails()) {
            return redirect('/organizations/payment-methods')->withErrors($validator)->withInput();
        }

        $stripe = Stripe::find($stripeId);
        // dd($strip?e);
        $stripe->organization_id = Auth::user()->organization_id ? Auth::user()->organization_id : $id;
        $stripe->secret_key   = $request->input('secret');
        $stripe->public_key   = $request->input('publish');
        $stripe->save();


        return redirect('/organizations/payment-methods');
    }
    public function activeMethods(Request $request)
    {
        $id = Session::get('id') ? Session::get('id') : '';
        $org = Organization::find($id);
        $bankTransfer=BankTransfer::where('organization_id',Auth::user()->organization_id ? Auth::user()->organization_id : $id)->first();
        if($bankTransfer){
            $active = ActivePaymentMethod::where("organization_id", Auth::user()->organization_id ? Auth::user()->organization_id : $id)->where('bank_transfer_id', Auth::user()->organization_id ? Auth::user()->organization->bankTransfer->id : $org->bankTransfer->id)->first();
            $active ? $active->delete() : "";
        }  
        $vipps=Vipps::where('organization_id',Auth::user()->organization_id ? Auth::user()->organization_id : $id)->first();
        if($vipps){
            $active1 = ActivePaymentMethod::where("organization_id", Auth::user()->organization_id ? Auth::user()->organization_id : $id)->where('vipps_id', Auth::user()->organization_id ? Auth::user()->organization->Vipps->id : $org->Vipps->id)->first();
        $active1 ? $active1->delete() : "";
        }
        $stripe=Stripe::where('organization_id',Auth::user()->organization_id ? Auth::user()->organization_id : $id)->first();
        if($stripe){
        $active2 = ActivePaymentMethod::where("organization_id", Auth::user()->organization_id ? Auth::user()->organization_id : $id)->where('stripe_id', Auth::user()->organization_id ? Auth::user()->organization->Stripe->id : $org->Stripe->id)->first();
        $active2 ? $active2->delete() : "";
        }
        $qr=QrPayment::where('organization_id',Auth::user()->organization_id ? Auth::user()->organization_id : $id)->first();
        if($qr){
        $active3= ActivePaymentMethod::where("organization_id", Auth::user()->organization_id ? Auth::user()->organization_id : $id)->where('qr_payment_id', Auth::user()->organization_id ? Auth::user()->organization->qrPayment->id : $org->qrPayment->id)->first();
        $active3 ? $active3->delete() : "";
        }
        // if ($request->input('bank')) {
        //     $active = new ActivePaymentMethod();
        //     $active->organization_id = Auth::user()->organization_id ? Auth::user()->organization_id : $id;
        //     $active->bank_transfer_id = Auth::user()->organization_id ? Auth::user()->organization->bankTransfer->id : $org->bankTransfer->id;
        //     $active->status = 1;
        //     $active->save();
        // }
        // if ($request->input('vipps')) {
        //     $active2 = new ActivePaymentMethod();
        //     $active2->organization_id = Auth::user()->organization_id ? Auth::user()->organization_id : $id;
        //     $active2->vipps_id =  Auth::user()->organization_id ? Auth::user()->organization->Vipps->id : $org->Vipps->id;
        //     $active2->status = 1;
        //     $active2->save();
        // }
        // if ($request->input('stripe')) {
        //         $active3 = new ActivePaymentMethod();
        //         $active3->organization_id = Auth::user()->organization_id ? Auth::user()->organization_id : $id;
        //         $active3->stripe_id =  Auth::user()->organization_id ? Auth::user()->organization->Stripe->id : $org->Stripe->id;
        //         $active3->status = 1;
         
           
        // }
        // if ($request->input('qrPayment')) {
        //     $active4= new ActivePaymentMethod();
        //     $active4->organization_id = Auth::user()->organization_id ? Auth::user()->organization_id : $id;
        //     $active4->qr_payment_id =  Auth::user()->organization_id ? Auth::user()->organization->qrPayment->id : $org->qrPayment->id;
        //     $active4->status = 1;
        //     $active4->save();
        // }
        if ($request->input('bank')) {
            if (Auth::user()->organization_id && Auth::user()->organization->bankTransfer) {
                $active = new ActivePaymentMethod();
                $active->organization_id = Auth::user()->organization_id;
                $active->bank_transfer_id = Auth::user()->organization->bankTransfer->id;
                $active->status = 1;
                $active->save();
            } else {
                return redirect('/organizations/payment-methods?error=Bank+Payment+Method+Not+Yet+Stored');
            }
        }
        if ($request->input('vipps')) {
            if (Auth::user()->organization_id && Auth::user()->organization->Vipps) {
                $active2 = new ActivePaymentMethod();
                $active2->organization_id = Auth::user()->organization_id;
                $active2->vipps_id =  Auth::user()->organization->Vipps->id;
                $active2->status = 1;
                $active2->save();
            } else {
                return redirect('/organizations/payment-methods?error=Vipps+Payment+Method+Not+Yet+Stored');
            }
        }
        if ($request->input('stripe')) {
            if ($stripe != null && Auth::user()->organization_id && Auth::user()->organization->Stripe) {
                $active3 = new ActivePaymentMethod();
                $active3->organization_id = Auth::user()->organization_id;
                $active3->stripe_id =  Auth::user()->organization->Stripe->id;
                $active3->status = 1;
                $active3->save();
            } else {
                return redirect('/organizations/payment-methods?error=Stripe+Payment+Method+Not+Yet+Stored');
            }
        }
        if ($request->input('qrPayment')) {
            if (Auth::user()->organization_id && Auth::user()->organization->qrPayment) {
                $active4= new ActivePaymentMethod();
                $active4->organization_id = Auth::user()->organization_id;
                $active4->qr_payment_id =  Auth::user()->organization->qrPayment->id;
                $active4->status = 1;
                $active4->save();
            } else {
                return redirect('/organizations/payment-methods?error=QR+Payment+Method+Not+Yet+Stored');
            }
        }
        return redirect('/organizations/payment-methods');

    }
    public function changeOwnership(Request $request)
    {
        $id = Session::get('id') ? Session::get('id') : '';
        $old = OrganizationSetting::where('organization_id', $request->input('id'))->first();
        if ($old) {
            if ($request->input('admin')) {
                $admin = User::role('OrganizationAdmin')->where('organization_id', $request->input('id'))->first();
                if ($id) {
                    $admin->removeRole('OrganizationAdmin');
                    $admin->assignRole('Player');
                } else {
                    Auth::user()->removeRole('OrganizationAdmin');
                    Auth::user()->assignRole('Player');
                }
                $user_email = User::find($request->input('admin'))->email;
                $user_name = User::find($request->input('admin'))->first_name;
                $organization = Organization::find($request->input('id'));
                $old->organization_id = $request->input('id');
                Mail::send(
                    ['html' => 'org'],
                    ['user_name' => $user_name, 'organization' => $organization],
                    function ($message) use ($user_email) {
                        $message->to($user_email)
                            ->subject('Organization Admin');
                    }
                );
            }

            if ($image = $request->file('org_logo')) {
                $destinationPath = 'organization/';
                $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $profileImage);
                $input['org_logo'] = "$profileImage";
                $organization = Organization::find($id);
                $orgLogo =  Auth::user()->organization_id != null ? Auth::user()->organization->orgsetting->org_logo : $organization->orgsetting->org_logo;
                @unlink($orgLogo);
                $old->organization_id = $request->input('id');
                $old->org_logo =   $input['org_logo'];
            } else {
                $organization = Organization::find($id);
                $old->org_logo =   Auth::user()->organization_id != null ?  Auth::user()->organization->orgsetting->org_logo :  $organization->orgsetting->org_logo;
            }


            if ($image1 = $request->file('header')) {
                $destinationPath = 'organization/header';
                $header = date('YmdHis') . "." . $image1->getClientOriginalExtension();
                $image1->move($destinationPath, $header);
                $input['header'] = "$header";
                $organization = Organization::find($id);

                $header =  Auth::user()->organization_id != null ? Auth::user()->organization->orgsetting->header : $organization->orgsetting->header;

                if (file_exists($header)) {

@unlink($header);
                    $old->organization_id = $request->input('id');
                    $old->header =   $input['header'];
                } else {
                    $old->organization_id = $request->input('id');
                    $old->header =   $input['header'];
                }
            }
            if ($image2 = $request->file('invoice_logo')) {
                $destinationPath = 'organization/invoice';
                $header2 = date('YmdHis') . "." . $image2->getClientOriginalExtension();
                $image2->move($destinationPath, $header2);
                $input['invoice_logo'] = "$header2";
                $organization = Organization::find($id);
                $invoice =Auth::user()->organization_id != null ?  Auth::user()->organization->orgsetting->invoice_logo :$organization->orgsetting->invoice_logo;


                if (file_exists($invoice)) {

@unlink($invoice);
                    $old->organization_id = $request->input('id');
                    $old->invoice_logo =   $input['invoice_logo'];
                } else {
                    $old->organization_id = $request->input('id');
                    $old->invoice_logo =   $input['invoice_logo'];
                }
            }
            if ($image3 = $request->file('player_number_logo')) {
                $destinationPath = 'organization/player';
                $playerNumber = date('YmdHis') . "." . $image3->getClientOriginalExtension();
                $image3->move($destinationPath, $playerNumber);
                $input['player_number_logo'] = "$playerNumber";
                $organization = Organization::find($id);
                $playerNumberLogo =  Auth::user()->organization_id != null ? Auth::user()->organization->orgsetting->player_number_logo : $organization->orgsetting->player_number_logo;
@unlink($playerNumberLogo);
                $old->organization_id = $request->input('id');
                $old->player_number_logo =   $input['player_number_logo'];
            } else {
                $organization = Organization::find($id);
                $old->player_number_logo =   Auth::user()->organization_id != null ?  Auth::user()->organization->orgsetting->player_number_logo :  $organization->orgsetting->player_number_logo;
            }
            if ($image4 = $request->file('staffId')) {
                $destinationPath = 'organization/staffId';
                $staffId = date('YmdHis') . "." . $image4->getClientOriginalExtension();
                $image4->move($destinationPath, $staffId);
                $input['staffId'] = "$staffId";
                $organization = Organization::find($id);
                $staffId =Auth::user()->organization_id != null ?  Auth::user()->organization->orgsetting->staff_id :$organization->orgsetting->staff_id;


                if (file_exists($staffId)) {

@unlink($staffId);
                    $old->organization_id = $request->input('id');
                    $old->staff_id =   $input['staffId'];
                } else {
                    $old->organization_id = $request->input('id');
                    $old->staff_id =   $input['staffId'];
                }
            }
            if ($request->input('description')) {
                $old->footer = $request->input('description');
            }
            if ($request->input('question')) {
                $old->extra_question = $request->input('question');
            }
            if ($request->input('yes')) {
                $old->yes = $request->input('yes');
            }
            if ($request->input('no')) {
                $old->no = $request->input('no');
            }
            if ($request->input('terms')) {
                $old->terms_conditions = $request->input('terms');
            }

            if ($request->input('discount')) {
                $old->discount = $request->input('discount');
            }
            if ($request->input('active')) {
                // $request->input('active')=='on'?1:0;
                $old->active =1;
            }else{
                $old->active =0;
            }
            if ($request->input('twofactor')) {
                // $request->input('active')=='on'?1:0;
                $old->two_factor_auth =1;
            }else{
                $old->two_factor_auth =0;
            }

            $old->save();
        }
         else {
            $orgSetting = new OrganizationSetting();

            if ($request->input('admin')) {
                $admin = User::role('OrganizationAdmin')->where('organization_id', $request->input('id'))->first();
                if ($id) {
                    $admin->removeRole('OrganizationAdmin');
                    $admin->assignRole('Player');
                } else {
                    Auth::user()->removeRole('OrganizationAdmin');
                    Auth::user()->assignRole('Player');
                }

                $user_email = User::find($request->input('admin'))->email;
                $user_name = User::find($request->input('admin'))->first_name;
                $organization = Organization::find($request->input('id'));
                $orgSetting->organization_id = $request->input('id');
                Mail::send(
                    ['html' => 'org'],
                    ['user_name' => $user_name, 'organization' => $organization],
                    function ($message) use ($user_email) {
                        $message->to($user_email)
                            ->subject('Organization Admin');
                    }
                );
            }
            $org = Organization::find($request->input('id'));
            $orgSetting->organization_id = $request->input('id');
            if ($image = $request->file('org_logo')) {
                $destinationPath = 'organization/';
                $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $profileImage);
                $input['org_logo'] = "$profileImage";
               
                $orgSetting->org_logo =   $input['org_logo'];
            }


            if ($image1 = $request->file('header')) {
                $destinationPath = 'organization/header';
                $header = date('YmdHis') . "." . $image1->getClientOriginalExtension();
                $image1->move($destinationPath, $header);
                $input['header'] = "$header";
                $orgSetting->organization_id = $request->input('id');
                $orgSetting->header =   $input['header'];
            }
            if ($image2 = $request->file('invoice_logo')) {
                $destinationPath = 'organization/invoice';
                $header = date('YmdHis') . "." . $image2->getClientOriginalExtension();
                $image2->move($destinationPath, $header);
                $input['invoice_logo'] = "$header";
                $orgSetting->organization_id = $request->input('id');
                $orgSetting->invoice_logo =   $input['invoice_logo'];
            }
            if ($image3 = $request->file('player_number_logo')) {
                $destinationPath = 'organization/player';
                $playerLogo = date('YmdHis') . "." . $image3->getClientOriginalExtension();
                $image3->move($destinationPath, $playerLogo);
                $input['player_number_logo'] = "$playerLogo";
                $org = Organization::find($request->input('id'));
                $orgSetting->organization_id = $request->input('id');
                $orgSetting->player_number_logo =   $input['player_number_logo'];
            }
            if ($image4 = $request->file('staffId')) {
                $destinationPath = 'organization/staffId';
                $staffId = date('YmdHis') . "." . $image4->getClientOriginalExtension();
                $image4->move($destinationPath, $staffId);
                $input['staffId'] = "$staffId";
                $org = Organization::find($request->input('id'));
                $orgSetting->organization_id = $request->input('id');
                $orgSetting->staff_id =   $input['staffId'];
            }

            if ($request->input('description')) {
                $orgSetting->organization_id = $request->input('id');
                $orgSetting->footer = $request->input('description');
            }
            if ($request->input('question')) {
                $orgSetting->extra_question = $request->input('question');
            }
            if ($request->input('yes')) {
                $orgSetting->yes = $request->input('yes');
            }
            if ($request->input('no')) {
                $orgSetting->no = $request->input('no');
            }
            if ($request->input('terms')) {
                $orgSetting->terms_conditions = $request->input('terms');
            }
            if ($request->input('discount')) {
                $orgSetting->discount = $request->input('discount');
            }
            if ($request->input('active')) {
                // $request->input('active')=='on'?'1':'0';
                $orgSetting->active =1;
            }else{
                $orgSetting->active =0;
            }
            if ($request->input('twofactor')) {
                // $request->input('active')=='on'?'1':'0';
                $orgSetting->two_factor_auth =1;
            }else{
                $orgSetting->two_factor_auth =0;
            }
            // dd('hi');

            $orgSetting->save();

        }

        if ($request->input('admin')) {
            if (Auth::user()->hasRole(8)) {
                return redirect("organizations/settings")->with('success', 'Organization Admin Has been changed successfully');
            } else {
                Auth::logout();

                return redirect('/')->with('success', 'You are no longer an admin to the organization');
            }
        } else {
            return redirect("organizations/settings");
        }
    }
    public function archive(Request $request)
    {

        $organization = Organization::find($request->input('id'));
        //  dd($organization);
        $organization->status = 0;
        $organization->save();
        return response()->json([
            'message' => 'deleted'
        ]);
    }

    public function revert(Request $request)
    {

        $organization = Organization::find($request->input('id'));
        //  dd($organization);
        $organization->status = 1;
        $organization->save();
        return response()->json([
            'url' => '/organizations'
        ]);
    }

    public function archivedData()
    {
        $seasonIds=array();
        $seasons = Season::where('status', 1)->get();
        foreach($seasons as $season){
            $seasonIds[]=$season->id;
        }         $Archivedorganizations = Organization::with(['country'])->where('status', 0)->get();
        return DataTables::of($Archivedorganizations)
            ->editColumn('created_at', function (Organization $organization) {
                return $organization->created_at->format('m/d/Y');
            })

            ->addColumn('actions', function ($organization) {
                $id = $organization->id;
                $actions =  '<button style="padding: 2px 4px" class=" btn btn-danger delete" data-id="' . $id . '" ata-toggle="tooltip" data-placement="top" title="Decline"><i class="material-icons" style="margin-bottom:5px">highlight_off</i></button>
                <a href=' . route('organizations.edit', Crypt::encrypt($id)) . '><button style="padding: 2px 4px" class=" btn btn-primary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="material-icons" style="margin-bottom:5px">edit</i></button></a>';

                return $actions;
            })
            ->rawColumns(['actions'])
            ->make(true);
    }
    public function smsSettings(Request $request)
    {
        return view('smsSettings.index');
    }
    public function emailSettings(Request $request)
    {
        return view('emailSettings.index');
    }


    // public function index1()
    // {

    //     $clubs =Club::get();

    //     $countries = Country::all();
    //     $general = generalSetting::first();
    //     $organizations = Organization::all();

    //     return view('clubs.club_list', compact('clubs', 'countries', 'general', 'organizations'));
    // }


    

    public function change(Request $request)
    {
        $user = User::find($request->input('id'));
        $userRole=$user->roles->pluck('name')[0];
        $newRole=Role::find($request->input('role'));
        $user->removeRole($userRole);
        $user->assignRole($newRole);
        $url = '/organization-staffs';
        return response()->json([
            'url' => $url
        ]);
    }
public function newsLetter(Request $request){
    return view('organizations.newLetter');
}

    public function role_change(Request $request,$id)
    {
        $user = User::find($request->input('id'));
        $userRole=$user->roles->pluck('name')[0];
        $newRole=Role::find($request->input('role'));
        $user->removeRole($userRole);
        $user->assignRole($newRole);
        $url = '/users';
        return response()->json([
            'url' => $url
        ]);
    }
//-----------------------------Remove-----------------------------------------------
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
    //---------------------------------------------------

    public function print(Request $request)
    {
        $id=Session::get('id');
        
        $search=Session::get('search');
        // dd($search);     
        $general = generalSetting::first();
        $header = $general->header;
        if($search != ''){
            $organizations = Organization::where('status',1)

                            ->where(function($query) use($search){
                                return $query
                                ->orwhereHas('country', function ($q) use ($search) {
                                    $q->where('name', 'LIKE', '%' . $search . '%');  
                                })
                            ->orWhere('name','LIKE', '%' . $search . '%')              
                            ->orWhere('city','LIKE', '%' . $search . '%')            
                            ->orWhere('email','LIKE', '%' . $search . '%');               
                                })->orderBy('id', 'DESC')->get();
                                $view = view('organizations.org_print', compact('organizations','id','general','header'))->render();
                                return response()->json(['html' => $view
                            ]);
            
                    }else{

                        $organizations = Organization::where('status',1)->orderBy('id', 'DESC')->get();
                        // dd($organizations);

                        $view = view('organizations.org_print', compact('organizations','id','general','header'))->render();
                         return response()->json(['html' => $view
                            ]);
                
            
            
            
                }


    }
    public function pdf(Request $request)
    {
        $id=Session::get('id');
        $search=Session::get('search');
        $general = generalSetting::first();
        $adminheader=$general->header;
        if($search != ''){
            // dd($search);
                          
            $organizations = Organization::where('status',1)
            
                            ->where(function($query) use($search){
                                return $query
                                ->orwhereHas('country', function ($q) use ($search) {
                                    $q->where('name', 'LIKE', '%' . $search . '%');  
                                })
                            ->orWhere('name','LIKE', '%' . $search . '%')              
                            ->orWhere('city','LIKE', '%' . $search . '%')            
                            ->orWhere('email','LIKE', '%' . $search . '%');               
                                })->orderBy('id', 'DESC')->get();
                        $pdf = app('dompdf.wrapper');
                        $pdf->getDomPDF()->set_option("enable_php", true);
                        $pdf = PDF::loadView('organizations.org_pdf', compact('organizations','id','header','general'))->setPaper('a4', 'landscape');
                        return $pdf->stream('organizations.pdf');
            
                    }else{
                       
                        $organizations = Organization::where('status',1)->get();
            
                        $pdf = app('dompdf.wrapper');
                        $pdf->getDomPDF()->set_option("enable_php", true);
                        $pdf = PDF::loadView('organizations.org_pdf', compact('organizations','id','adminheader','general'))->setPaper('a4', 'landscape');
                        return $pdf->stream('organizations.pdf');          
                       }
                     }
                     public function org_excel(Request $request)
                     {
                         $search = Session::get('search');
                         
                         $id = Session::get('id');
                         
                         
                         return Excel::download(new OrgExcelExport($search, $id), 'All_Org_Excel List.xlsx');
                 
                     }
    public function arch_pdf(Request $request)
    {
        $id=Session::get('id');
        $search=Session::get('search');
        $general = generalSetting::first();
        $adminheader=$general->header;
        $seasonIds=array();
        $seasons = Season::where('status', 1)->get();
        foreach($seasons as $season){
        $seasonIds[]=$season->id;
        }     
        if($search != ''){
            $Archivedorganizations = Organization::with(['country'])->where([['status','=', 0],['season_id','=',$seasonIds],['country_id','=', Auth::user()->country_id]])
            ->where(function($query) use($search){
                return $query
                ->orwhereHas('country', function ($q) use ($search) {
                    $q->where('name', 'LIKE', '%' . $search . '%');  
                })
            ->orWhere('name','LIKE', '%' . $search . '%')              
            ->orWhere('city','LIKE', '%' . $search . '%')            
            ->orWhere('email','LIKE', '%' . $search . '%');               
                })->orderBy('id', 'DESC')->get();
                        $pdf = app('dompdf.wrapper');
                        $pdf->getDomPDF()->set_option("enable_php", true);
                        $pdf = PDF::loadView('organizations.Arch_org_pdf', compact('Archivedorganizations','id','header','general'))->setPaper('a4', 'landscape');
                        return $pdf->stream('Archivedorganizations.pdf');
            
                    }else{
                       
                        $Archivedorganizations = Organization::with(['country'])->where('status', 0)->whereIn('season_id', $seasonIds)
                        ->where('country_id', Auth::user()->country_id)->get();
            
                        $pdf = app('dompdf.wrapper');
                        $pdf->getDomPDF()->set_option("enable_php", true);
                        $pdf = PDF::loadView('organizations.Arch_org_pdf', compact('Archivedorganizations','id','adminheader','general'))->setPaper('a4', 'landscape');
                        return $pdf->stream('organizations.pdf');          
                       }
                     }
                     public function Arch_org_excel(Request $request)
                     {
                         $search = Session::get('search');
                         
                         $id = Session::get('id');                         
                         return Excel::download(new Archived_OrglExport($search, $id), 'Archived_Org_Excel List.xlsx');
                 
                     }

                     public function archivedprint(Request $request)
                     {
                         $id=Session::get('id');
                         
                         $search=Session::get('search');
                        //  dd($search);     
                         $general = generalSetting::first();
                         $header = $general->header;
                         $seasonIds=array();
                        $seasons = Season::where('status', 1)->get();
                        foreach($seasons as $season){
                        $seasonIds[]=$season->id;
                        }         
                         if($search != ''){
                            $Archivedorganizations = Organization::with(['country'])->where([['status','=', 0],['season_id','=',$seasonIds],['country_id','=', Auth::user()->country_id]])
                                             ->where(function($query) use($search){
                                                 return $query
                                                 ->orwhereHas('country', function ($q) use ($search) {
                                                     $q->where('name', 'LIKE', '%' . $search . '%');  
                                                 })
                                             ->orWhere('name','LIKE', '%' . $search . '%')              
                                             ->orWhere('city','LIKE', '%' . $search . '%')            
                                             ->orWhere('email','LIKE', '%' . $search . '%');               
                                                 })->orderBy('id', 'DESC')->get();
                                                 $view = view('organizations.archived_org_print', compact('Archivedorganizations','id','general','header'))->render();
                                                 return response()->json(['html' => $view
                                             ]);
                             
                                     }else{
                 
                                        $Archivedorganizations = Organization::with(['country'])->where('status', 0)->whereIn('season_id', $seasonIds)
                                        ->where('country_id', Auth::user()->country_id)->get();
                                        // dd($organizations);
                 
                                         $view = view('organizations.archived_org_print', compact('Archivedorganizations','id','general','header'))->render();
                                          return response()->json(['html' => $view
                                             ]);
                                 
                             
                             
                             
                                 }
                 
                 
                     }

public function OrgPrefix(Request $request){

    $OrgName=$request->get('name');
    $prefixFinal=null;

    $result = preg_replace("([A-Z]|[a-z]|[0-9])", " $0", $OrgName);
    $result = explode(' ', trim($result));
    $count = count($result);
    $final=array_map('strtoupper', $result);
$organizations=Organization::all();
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
    $pre=array();
    $Clubpre=array();
    foreach($organizations as $organization)
    {
         $pre[]=$organization->prefix;   
    }
    foreach($clubs as $organization)
    {
         $Clubpre[]=$organization->prefix;
       
    }
    $allprefix = array_merge($pre, $Clubpre);   
            if(in_array($prefix,$allprefix)==true){
            $alreadyExits=1;
            return response()->json(['alreadyExists' => $alreadyExits]);
            
        }else{

            $alreadyExits=0;
            return response()->json(['alreadyExists' => $alreadyExits]);

        }
}

public function newsLetterStore(Request $request){
    
		$listId = env('MAILCHIMP_LIST_ID');

		$mailchimp = new \Mailchimp(env('MAILCHIMP_APIKEY'));

		$campaign = $mailchimp->campaigns->create('regular',[
			'list_id'=>$listId,
			'subject'=>'Welcome Mail',
			'from_email'=>'noreply@devrohit.com',
			'from_name'=>'Devrohit',
			'to_name'=>'Devrohit Subscriber',		
		],[
			'html'=> $request->input('body'),
			'text'=>strip_tags($request->input('body'))
		]);

		$mailchimp->campaigns->send($campaign['id']);

		dd('Campaign send successfully.');
	
}
}
