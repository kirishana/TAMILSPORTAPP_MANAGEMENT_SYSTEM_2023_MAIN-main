<?php

namespace App\Http\Controllers\Admin\reports;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\League;
use App\Models\Season;
use App\Models\Registration;
use App\Models\GroupRegistration;
use App\generalSetting;
use PDF;
use Auth;
use Session;
use Excel;
use App\Exports\ClubpaymentExport;
use App\Exports\ClubGroupEventpaymentExport;
use App\Models\OrganizationSetting;

class ClubPaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function Payments()
    {
        $id = Session::get('id');     
        Session::forget('payclubCategories');      
        Session::forget('GroupCategories');
        $general = generalSetting::first();
        $adminheader = $general->header;
        $registration=Registration::has('events','>',0)->wherehas('user',function($query) use($id){
            $query->where('club_id',Auth::user()->club_id?Auth::user()->club_id:$id);
        })->get();
        $groupregistration=GroupRegistration::has('event','>',0)->where('club_id', Auth::user()->club_id?Auth::user()->club_id:$id)->get();
        $leagues=League::all();
        $seasons=Season::all();
     return view('admin.reports.clubpayment.clubpaymentss',compact('registration','general','adminheader','leagues','seasons','groupregistration'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function Filter(Request $request)
    {
        $id = Session::get('id');     
        $general = generalSetting::first();
        $adminheader = $general->header;
        $registration=Registration::has('events','>',0)->wherehas('user',function($query) {
            $query->where('club_id',Auth::user()->club_id?Auth::user()->club_id:$id);
        });
        $categories = $request->input('obj');
        Session::put('payclubCategories', $categories);
        if ($categories) {
        foreach ($categories as $key => $values) {
            if ($key == "player_name") {
                if($values!=null){
                    $registration=$registration->wherehas('user',function($query) use($values) {
                        $query->where('first_name','like', '%' . $values. '%')->orwhere('last_name','like', '%' . $values. '%');
                    });
                }
            } 
            elseif ($key == "status") {
                if($values!=0){
                if($values==2){
                    $registration=$registration->where('status','=',$values); 
                }else{
                    $registration=$registration->whereNotIn('status',[2]); 
                }
                }
            }elseif ($key == "season") {
                if($values!=0){
                    $registration=$registration->where('season_id',$values);
                }
            } 
            elseif ($key == "league") {
                if($values!=0){
                    $registration=$registration->where('league_id',$values);
                }
            } 
            elseif ($key == "membership") {
                if($values!=5){
                    $registration=$registration->wherehas('user',function($q) use($values){
                        $q->where('member_or_not',$values);
                    });  
                }
            }elseif ($key == "trans_id") {
                if($values!=null){
                    $registration=$registration->where('trans_id', 'like', '%' . $values.'%');
                }
            }
        }
    }else{
        $registration=Registration::wherehas('user',function($query) {
            $query->where('club_id',Auth::user()->club_id);
        });
    }
               
 
    $registration=$registration->get();
        
        $view = view('admin.reports.clubpayment.clubpayfilter', compact( 'registration','general','adminheader'))->render();
        $view2 = view('admin.reports.clubpayment.clubpaypreview', compact( 'registration','general','adminheader'))->render();

        return response()->json(['html' => $view,'html2' => $view2]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function PaymentPdf(Request $request)
    {
        $id = Session::get('id');
        $general = generalSetting::first();
        $adminheader = $general->header;
        $registration=Registration::has('events','>',0)->wherehas('user',function($query) {
            $query->where('club_id',Auth::user()->club_id);
        });
        $categories=Session::get('payclubCategories');
        if ($categories) {
            foreach ($categories as $key => $values) {
                if ($key == "player_name") {
                    if($values!=null){
                        $registration=$registration->wherehas('user',function($query) use($values) {
                            $query->where('first_name','like', '%' . $values. '%')->orwhere('last_name','like', '%' . $values. '%');
                        });
                    }
                } 
                elseif ($key == "status") {
                    if($values!=0){
                        if($values==2){
                            $registration=$registration->where('status','=',$values); 
                        }else{
                            $registration=$registration->whereNotIn('status',[2]); 
                        }            
                    }
                }elseif ($key == "season") {
                    if($values!=0){
                        $registration=$registration->where('season_id',$values);
                    }
                } 
                elseif ($key == "league") {
                    if($values!=0){
                        $registration=$registration->where('league_id',$values);
                    }
                } 
                elseif ($key == "membership") {
                    if($values!=5){
                        $registration=$registration->wherehas('user',function($q) use($values){
                            $q->where('member_or_not',$values);
                        });  
                    }
                }elseif ($key == "trans_id") {
                    if($values!=null){
                        $registration=$registration->where('trans_id', 'like', '%' . $values.'%');
                    }
                }
            }
        }else{
            $registration=Registration::wherehas('user',function($query) {
                $query->where('club_id',Auth::user()->club_id);
            });
        }
           
    $registration=$registration->get();
                $pdf = app('dompdf.wrapper');
                $pdf->getDomPDF()->set_option("enable_php", true);
                $pdf = PDF::loadView('admin.reports.clubpayment.clubpaypdf', compact('registration','general','adminheader'))->setPaper('a4', 'landscape');
                return $pdf->stream('clubmemberPayment');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function PaymentExcel()
    {
        $id = Session::get('id');  
        $categories = Session::get('payclubCategories');
    return Excel::download(new ClubpaymentExport($categories,$id), 'clubMemberspayment.xlsx');
    }

    public function GPayFilter(Request $request)
    {
        $id = Session::get('id');
        $general = generalSetting::first();
        $adminheader = $general->header;
        $groupregistration=GroupRegistration::has('event','>',0)->where('club_id', Auth::user()->club_id?Auth::user()->club_id:$id);
        $cates = $request->input('Gobj');
        Session::put('GroupCategories', $cates);
        if ($cates) {
        foreach ($cates as $key => $values) {
            if ($key == "G-trans_id") {
                if($values!=0){
                    $groupregistration=$groupregistration->where('trans_id', 'like', '%' . $values. '%');
                }
            }else if ($key == "G-status") {
            if($values!=0){
            if($values==2){
                $groupregistration=$groupregistration->where('status','=',$values); 
            }else{
                $groupregistration=$groupregistration->whereNotIn('status',[2]); 
            }
            }
        } elseif ($key == "G-league") {
                if($values!=0){
                    $groupregistration=$groupregistration->where('league_id',$values);
                }
            }
        }
    }
    else{
        $groupregistration=GroupRegistration::has('event','>',0)->where('club_id', Auth::user()->club_id?Auth::user()->club_id:$id);
    }
    $groupregistration=$groupregistration->get();
        $view = view('admin.reports.clubpayment.groupPayment', compact( 'groupregistration','general'))->render();
        $view2 = view('admin.reports.clubpayment.groupPaypreview', compact( 'groupregistration','general','adminheader'))->render();
        return response()->json(['html' => $view,'html2' => $view2]);
    }

    public function GPayPdf(Request $request)
    {
        $general = generalSetting::first();
        $adminheader = $general->header;        
        $id = Session::get('id');
        $groupregistration=GroupRegistration::has('event','>',0)->where('club_id', Auth::user()->club_id?Auth::user()->club_id:$id);
        $categories=Session::get('GroupCategories');
        if ($categories) {
            foreach ($categories as $key => $values) {
                if ($key == "G-trans_id") {
                    if($values!=0){
                        $groupregistration=$groupregistration->where('trans_id', 'like', '%' . $values. '%');
                    }
                }else if ($key == "G-status") {
                if($values!=0){
                    if($values==2){
                        $groupregistration=$groupregistration->where('status','=',$values); 
                    }else{
                        $groupregistration=$groupregistration->whereNotIn('status',[2]); 
                    }                
                }
            } elseif ($key == "G-league") {
                    if($values!=0){
                        $groupregistration=$groupregistration->where('league_id',$values);
                    }
                }
            }
        }
        else{
            $groupregistration=GroupRegistration::has('event','>',0)->where('club_id', Auth::user()->club_id?Auth::user()->club_id:$id);
        }
        $groupregistration=$groupregistration->get();
// dd($groupregistration);
                $pdf = app('dompdf.wrapper');
                $pdf->getDomPDF()->set_option("enable_php", true);
                $pdf = PDF::loadView('admin.reports.clubpayment.groupPayPdf', compact('groupregistration','adminheader','general'))->setPaper('a4', 'portrait');
                return $pdf->stream('clubGroupEventPayment');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function GPayExcel()
    {
        $id = Session::get('id');
        $categories=Session::get('GroupCategories');
    return Excel::download(new ClubGroupEventpaymentExport($categories,$id), 'clubGroupEventpayment.xlsx');
    }
}
