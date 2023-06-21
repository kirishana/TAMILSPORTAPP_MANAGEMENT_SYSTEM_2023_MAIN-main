<?php

namespace App\Http\Controllers\Admin\reports;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Models\Organization;
use App\Models\Club;
use App\Models\Country;
use App\Models\EventCategory;
use App\Models\MainEvent;
use App\Models\Event;
use App\User;
use App\Models\League;
use App\Models\AgeGroup;
use App\Models\AgeGroupGender;
use App\Models\AgeGroupEvent;
use App\Models\Gender;
use App\Models\Season;
use App\Models\Registration;
use App\Models\GroupRegistration;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\generalSetting;
use PDF;
use Auth;
use Session;
use Excel;
use App\Exports\PlayerpaymentExport;
use App\Models\OrganizationSetting;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    //    dd('hi');
    $id = Session::get('id');
    $general = generalSetting::first();
    $adminheader =$general->header;
        $leagues=League::all();
        $organizations=Organization::all();
        $child_id=array();
    if(Auth::user()->children){
        $user_ids=Auth::user()->children;
        foreach($user_ids as $user_id){
            $child_id[]=$user_id->id;
        } 

    }else{
            $child_id[]=null;
    }
 

      array_push($child_id,Auth::user()->id);
        $currency=Organization::where('id', Auth::user()->organization_id)->first();
        // dd($children->id);
        $registration=Registration::whereIn('user_id',$child_id)->has('events','>',0)->get();
        // dd($registration);
     return view('admin.reports.player.payment',compact('leagues','organizations','registration','currency','general','adminheader'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function PayFilter(Request $request)
    {
        $id = Session::get('id');
        $general = generalSetting::first();
        $adminheader = $general->header;
         $child_id=array();
    if(Auth::user()->children){
        $user_ids=Auth::user()->children;
        foreach($user_ids as $user_id){
            $child_id[]=$user_id->id;
        } 

    }else{
            $child_id[]=null;
    }
    array_push($child_id,Auth::user()->id);

        $registration=Registration::whereIn('user_id',$child_id)->has('events','>',0);

        $categories = $request->input('obj');
        Session::put('payplay', $categories);

        if ($categories) {
        foreach ($categories as $key => $values) {
            if ($key == "amount") {
                if($values!=null){
                    $registration=$registration->where('totalfee', 'like', '%' . $values . '%');
                }
            } 
            elseif ($key == "status") {
                if($values!=0){
                if($values==2){
                    $registration=$registration->where('status','=',$values); 
                }else{
                    $registration=$registration->whereIn('status',[3,4]); 
                }
                }
            }

            elseif ($key == "organization") {
                if($values!=0){
                    $registration=$registration->where('organization_id',$values);
                }
            } 
            elseif ($key == "league") {
                if($values!=0){
                    $registration=$registration->where('league_id',$values);
                }
            } 
            elseif ($key == "trans_id") {
                if($values!=null){
                    $registration=$registration->where('trans_id', 'like', '%' . $values. '%');
                }
            }
        }
    }else{
        $registration=Registration::whereIn('user_id',$child_id)->has('events','>',0);

    }
               
 
    $registration=$registration->get();
        
        $view = view('admin.reports.player.pay-filter', compact( 'registration','general','adminheader'))->render();
        $view2 = view('admin.reports.player.pay-preview', compact( 'registration','general','adminheader'))->render();

        return response()->json(['html' => $view]);

    }



    public function PayPdf(Request $request)
    {

        $id = Session::get('id');
        $general = generalSetting::first();
        $adminheader =$general->header;
        $child_id=array();
        if(Auth::user()->children){
            $user_ids=Auth::user()->children;
            foreach($user_ids as $user_id){
                $child_id[]=$user_id->id;
            } 
    
        }else{
                $child_id[]=null;
        }
        array_push($child_id,Auth::user()->id);

        $registration=Registration::whereIn('user_id',$child_id)->has('events','>',0);

        $categories=Session::get('payplay');
        if ($categories) {
            foreach ($categories as $key => $values) {
                if ($key == "amount") {
                    if($values!=null){
                        $registration=$registration->where('totalfee', 'like', '%' . $values . '%');
                    }
                } 
                elseif ($key == "status") {
                    if($values!=0){
                        if($values==2){
                            $registration=$registration->where('status','=',$values); 
                        }else{
                            $registration=$registration->whereIn('status',[3,4]); 
                        }                   
                    }
                }
    
                elseif ($key == "organization") {
                    if($values!=0){
                        $registration=$registration->where('organization_id',$values);
                    }
                } 
                elseif ($key == "league") {
                    if($values!=0){
                        $registration=$registration->where('league_id',$values);
                    }
                } 
                elseif ($key == "trans_id") {
                    if($values!=null){
                        $registration=$registration->where('trans_id', 'like', '%' . $values. '%');
                    }
                }
            }
        }else{
            $registration=Registration::whereIn('user_id',$child_id)->has('events','>',0);
    
        }
                  
        $registration=$registration->get();
                $pdf = app('dompdf.wrapper');
                $pdf->getDomPDF()->set_option("enable_php", true);
                $pdf = PDF::loadView('admin.reports.player.pay-pdf', compact('registration','general','adminheader'))->setPaper('a4', 'landscape');
                return $pdf->stream('Payment');
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function PayExcel()
    {     
        $categories = Session::get('payplay');
        $id = Session::get('id');
    return Excel::download(new PlayerpaymentExport($categories,$id), 'payment.xlsx');
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
