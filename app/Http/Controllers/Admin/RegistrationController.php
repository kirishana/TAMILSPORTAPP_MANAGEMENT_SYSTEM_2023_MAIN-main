<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Registration;
use Auth;
use App\User;
use App\Models\Season;
use App\Exports\PayReqSingleExport;
use App\Exports\PayReqGroupExport;
use App\Models\OrganizationSetting;
use App\generalSetting;
use App\Models\Organization;
use App\Models\Club;
use App\Models\League;
use App\Notifications\PaymentConfirmation;
use App\Models\GroupRegistration;
use Carbon\Carbon;
use DB;
use PhpOffice\PhpSpreadsheet\Calculation\MathTrig\Sum;
use Yajra\DataTables\DataTables;
use Session;
use PDF;
use Excel;
use App\Models\Event;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;
use Mail;
class RegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $id=Session::get('id');
        Session::forget('search3');
        Session::forget('sorttypeGpay');
        Session::forget('sortbyGpay');
        Session::forget('searchPrint');
        Session::forget('sortBypay');
        Session::forget('sorttypepay');
        $setting = OrganizationSetting::where('organization_id', Auth::user()->organization_id !== null ? Auth::user()->organization_id : $id)->first();
        $header = $setting ? $setting->header : '';
        $general = GeneralSetting::first();
        // $search3=$request->get('query3')?$request->get('query3'):'';
        // Session::put('search3',$search3);
        if($request->ajax()){
            $search3=$request->get('query3')?$request->get('query3'):'';
            $sorttypeGpay=$request->get('sorttypeGpay');
            $sortbyGpay=$request->get('sortbyGpay');
            Session::put('search3',$search3);
            Session::put('sorttypeGpay',$sorttypeGpay);
            Session::put('sortbyGpay',$sortbyGpay);
            if($search3!=''){
                if($sortbyGpay){
                    if($sortbyGpay=='club_name'){
                        $groupRegs = GroupRegistration::with(['club', 'league'])
                        ->where('organization_id', Auth::user()->organization_id?Auth::user()->organization_id:$id)->whereIn('status',[1,5,2])
                        ->where(function($query) use($search3){
                            return $query
                            ->orWhereHas('league', function ($q) use ($search3) {
                                $q->where('name', 'LIKE', '%' . $search3 . '%');  
                            })
                            ->orWhereHas('club', function ($q) use ($search3) {
                                $q->where('club_name', 'LIKE', '%' . $search3 . '%');  
                            })
                            ->orWhereHas('club', function ($q) use ($search3) {
                                $q->where('club_email', 'LIKE', '%' . $search3 . '%');  
                            })
                            ->orWhere('trans_id','LIKE', '%' . $search3 . '%');      
                        })->groupBy('trans_id','league_id','club_id')->orderBy(Club::select('club_name')->whereColumn('clubs.id','group_registrations.club_id'),$sorttypeGpay)->paginate(10); 
                    }elseif($sortbyGpay=="league"){
                        $groupRegs = GroupRegistration::with(['club', 'league'])
                    ->where('organization_id', Auth::user()->organization_id?Auth::user()->organization_id:$id)->whereIn('status',[1,5,2])
                    ->where(function($query) use($search3){
                        return $query
                        ->orWhereHas('league', function ($q) use ($search3) {
                            $q->where('name', 'LIKE', '%' . $search3 . '%');  
                        })
                        ->orWhereHas('club', function ($q) use ($search3) {
                            $q->where('club_name', 'LIKE', '%' . $search3 . '%');  
                        })
                        ->orWhereHas('club', function ($q) use ($search3) {
                            $q->where('club_email', 'LIKE', '%' . $search3 . '%');  
                        })
                        ->orWhere('trans_id','LIKE', '%' . $search3 . '%');      
                    })->groupBy('trans_id','league_id','club_id')->orderBy(League::select('name')->whereColumn('leagues.id','group_registrations.league_id'),$sorttypeGpay)->paginate(10);
                    }elseif($sortbyGpay=="totalfee"){
                        $groupRegs = GroupRegistration::with(['club', 'league'])
                    ->where('organization_id', Auth::user()->organization_id?Auth::user()->organization_id:$id)->whereIn('status',[1,5,2])
                    ->where(function($query) use($search3){
                        return $query
                        ->orWhereHas('league', function ($q) use ($search3) {
                            $q->where('name', 'LIKE', '%' . $search3 . '%');  
                        })
                        ->orWhereHas('club', function ($q) use ($search3) {
                            $q->where('club_name', 'LIKE', '%' . $search3 . '%');  
                        })
                        ->orWhereHas('club', function ($q) use ($search3) {
                            $q->where('club_email', 'LIKE', '%' . $search3 . '%');  
                        })
                        ->orWhere('trans_id','LIKE', '%' . $search3 . '%');      
                    })->groupBy('trans_id','league_id','club_id')->orderBy(DB::raw('sum(totalfee)'),$sorttypeGpay)->paginate(10);

                    }elseif($sortbyGpay=="Payment"){
                        if($sorttypeGpay=='asc'){
                            $groupRegs = GroupRegistration::with(['club', 'league'])
                    ->where('organization_id', Auth::user()->organization_id?Auth::user()->organization_id:$id)->whereIn('status',[1,5,2])
                    ->where(function($query) use($search3){
                        return $query
                        ->orWhereHas('league', function ($q) use ($search3) {
                            $q->where('name', 'LIKE', '%' . $search3 . '%');  
                        })
                        ->orWhereHas('club', function ($q) use ($search3) {
                            $q->where('club_name', 'LIKE', '%' . $search3 . '%');  
                        })
                        ->orWhereHas('club', function ($q) use ($search3) {
                            $q->where('club_email', 'LIKE', '%' . $search3 . '%');  
                        })
                        ->orWhere('trans_id','LIKE', '%' . $search3 . '%');      
                    })->groupBy('trans_id','league_id','club_id')->orderbyRaw('FIELD(payment_method,1,5,3,4,2)')->paginate(10);
                        }else{
                            $groupRegs = GroupRegistration::with(['club', 'league'])
                    ->where('organization_id', Auth::user()->organization_id?Auth::user()->organization_id:$id)->whereIn('status',[1,5,2])
                    ->where(function($query) use($search3){
                        return $query
                        ->orWhereHas('league', function ($q) use ($search3) {
                            $q->where('name', 'LIKE', '%' . $search3 . '%');  
                        })
                        ->orWhereHas('club', function ($q) use ($search3) {
                            $q->where('club_name', 'LIKE', '%' . $search3 . '%');  
                        })
                        ->orWhereHas('club', function ($q) use ($search3) {
                            $q->where('club_email', 'LIKE', '%' . $search3 . '%');  
                        })
                        ->orWhere('trans_id','LIKE', '%' . $search3 . '%');      
                    })->groupBy('trans_id','league_id','club_id')->orderbyRaw('FIELD(payment_method,2,4,3,5,1)')->paginate(10);
                        }
                    }else{
                        $groupRegs = GroupRegistration::with(['club', 'league'])
                    ->where('organization_id', Auth::user()->organization_id?Auth::user()->organization_id:$id)->whereIn('status',[1,5,2])
                    ->where(function($query) use($search3){
                        return $query
                        ->orWhereHas('league', function ($q) use ($search3) {
                            $q->where('name', 'LIKE', '%' . $search3 . '%');  
                        })
                        ->orWhereHas('club', function ($q) use ($search3) {
                            $q->where('club_name', 'LIKE', '%' . $search3 . '%');  
                        })
                        ->orWhereHas('club', function ($q) use ($search3) {
                            $q->where('club_email', 'LIKE', '%' . $search3 . '%');  
                        })
                        ->orWhere('trans_id','LIKE', '%' . $search3 . '%');      
                    })->groupBy('trans_id','league_id','club_id')->orderBy($sortbyGpay,$sorttypeGpay)->paginate(10); 
                    }
                    

                }else{
                    $groupRegs = GroupRegistration::with(['club', 'league'])
                    ->where('organization_id', Auth::user()->organization_id?Auth::user()->organization_id:$id)->whereIn('status',[1,5,2])
                    ->where(function($query) use($search3){
                        return $query
                        ->orWhereHas('league', function ($q) use ($search3) {
                            $q->where('name', 'LIKE', '%' . $search3 . '%');  
                        })
                        ->orWhereHas('club', function ($q) use ($search3) {
                            $q->where('club_name', 'LIKE', '%' . $search3 . '%');  
                        })
                        ->orWhereHas('club', function ($q) use ($search3) {
                            $q->where('club_email', 'LIKE', '%' . $search3 . '%');  
                        })
                        ->orWhere('trans_id','LIKE', '%' . $search3 . '%');      
                    })->groupBy('trans_id','league_id','club_id')->paginate(10);
                }
               


            }else{
                if($sortbyGpay){
                    if($sortbyGpay=='club_name'){
                        $groupRegs = GroupRegistration::with(['club', 'league'])
                        ->where('organization_id', Auth::user()->organization_id?Auth::user()->organization_id:$id)->whereIn('status',[1,5,2])->groupBy('trans_id','league_id','club_id')->orderBy(Club::select('club_name')->whereColumn('clubs.id','group_registrations.club_id'),$sorttypeGpay)->paginate(10);
                    }
                    elseif($sortbyGpay=='league'){
                        $groupRegs = GroupRegistration::with(['club', 'league'])
                        ->where('organization_id', Auth::user()->organization_id?Auth::user()->organization_id:$id)->whereIn('status',[1,5,2])->groupBy('trans_id','league_id','club_id')->orderBy(League::select('name')->whereColumn('leagues.id','group_registrations.league_id'),$sorttypeGpay)->paginate(10);
                    }
                    elseif($sortbyGpay=='totalfee'){
                        $groupRegs = GroupRegistration::with(['club', 'league'])
                        ->where('organization_id', Auth::user()->organization_id?Auth::user()->organization_id:$id)->whereIn('status',[1,5,2])->groupBy('trans_id','league_id','club_id')->orderBy(DB::raw('sum(totalfee)'),$sorttypeGpay)->paginate(10);
                    }
                    elseif($sortbyGpay=='Payment'){
                        if($sorttypeGpay=='asc'){
                            $groupRegs = GroupRegistration::with(['club', 'league'])
                        ->where('organization_id', Auth::user()->organization_id?Auth::user()->organization_id:$id)->whereIn('status',[1,5,2])->groupBy('trans_id','league_id','club_id')->orderByRaw('FIELD(payment_method,1,5,3,4,2)')->paginate(10);
                        }else{
                            $groupRegs = GroupRegistration::with(['club', 'league'])
                            ->where('organization_id', Auth::user()->organization_id?Auth::user()->organization_id:$id)->whereIn('status',[1,5,2])->groupBy('trans_id','league_id','club_id')->orderByRaw('FIELD(payment_method,2,4,3,5,1)')->paginate(10);
                        }
                        
                    }
                    else{
                        $groupRegs = GroupRegistration::with(['club', 'league'])
                        ->where('organization_id', Auth::user()->organization_id?Auth::user()->organization_id:$id)->whereIn('status',[1,5,2])->groupBy('trans_id','league_id','club_id')->orderBy($sortbyGpay,$sorttypeGpay)->paginate(10);
                    }
                   
                }else{
                    $groupRegs = GroupRegistration::with(['club', 'league'])
                    ->where('organization_id', Auth::user()->organization_id?Auth::user()->organization_id:$id)->whereIn('status',[1,5,2])->groupBy('trans_id','league_id','club_id')->paginate(10);
                }
                
            }
            return view('paymentRequests.pay_group_filter', compact('groupRegs','setting','header','general'));
   
        }else{
            $groupRegsPrint = GroupRegistration::with(['club', 'league'])
            ->where('organization_id', Auth::user()->organization_id?Auth::user()->organization_id:$id)->whereIn('status',[1,5,2])->groupBy('trans_id','league_id','club_id')->get();
            $groupRegs = GroupRegistration::with(['club', 'league'])->where('organization_id', Auth::user()->organization_id?Auth::user()->organization_id:$id)->whereIn('status',[1,5,2])->groupBy('trans_id','league_id','club_id')->paginate(10);
            $regs = Registration::with(['user', 'league'])->where('organization_id', Auth::user()->organization_id)->whereIn('status',[1,2,3])->whereNotIn('payment_method',[0])->whereNotIn('trans_id',[-1])->groupBy('trans_id','league_id')->paginate(10);
          
        }
              return view('paymentRequests.index', compact('regs','groupRegs','groupRegsPrint','setting','header'));
        
    }

    /*
     * Pass data through ajax call
     */
    /**
     * @return mixed
     */
    public function GroupEventPdf()
    {
        // dd('hi');
        $id=Session::get('id');
        $search3=Session::get('search3');
        $sortbyGpay=Session::get('sortbyGpay');
        $sorttypeGpay=Session::get('sorttypeGpay');
        $setting = OrganizationSetting::where('organization_id', Auth::user()->organization_id !== null ? Auth::user()->organization_id : $id)->first();
        $header = $setting ? $setting->header : '';
        $general = generalSetting::first();
        if($search3!=''){
            if($sortbyGpay){
                if($sortbyGpay=='club_name'){
                    $groupRegs = GroupRegistration::with(['club', 'league'])
                    ->where('organization_id', Auth::user()->organization_id?Auth::user()->organization_id:$id)->whereIn('status',[1,5,2])
                    ->where(function($query) use($search3){
                        return $query
                        ->orWhereHas('league', function ($q) use ($search3) {
                            $q->where('name', 'LIKE', '%' . $search3 . '%');  
                        })
                        ->orWhereHas('club', function ($q) use ($search3) {
                            $q->where('club_name', 'LIKE', '%' . $search3 . '%');  
                        })
                        ->orWhereHas('club', function ($q) use ($search3) {
                            $q->where('club_email', 'LIKE', '%' . $search3 . '%');  
                        })
                        ->orWhere('trans_id','LIKE', '%' . $search3 . '%');      
                    })->groupBy('trans_id','league_id','club_id')->orderBy(Club::select('club_name')->whereColumn('clubs.id','group_registrations.club_id'),$sorttypeGpay)->get(); 
                }elseif($sortbyGpay=="league"){
                    $groupRegs = GroupRegistration::with(['club', 'league'])
                ->where('organization_id', Auth::user()->organization_id?Auth::user()->organization_id:$id)->whereIn('status',[1,5,2])
                ->where(function($query) use($search3){
                    return $query
                    ->orWhereHas('league', function ($q) use ($search3) {
                        $q->where('name', 'LIKE', '%' . $search3 . '%');  
                    })
                    ->orWhereHas('club', function ($q) use ($search3) {
                        $q->where('club_name', 'LIKE', '%' . $search3 . '%');  
                    })
                    ->orWhereHas('club', function ($q) use ($search3) {
                        $q->where('club_email', 'LIKE', '%' . $search3 . '%');  
                    })
                    ->orWhere('trans_id','LIKE', '%' . $search3 . '%');      
                })->groupBy('trans_id','league_id','club_id')->orderBy(League::select('name')->whereColumn('leagues.id','group_registrations.league_id'),$sorttypeGpay)->get();

                }elseif($sortbyGpay=='totalfee'){
                    $groupRegs = GroupRegistration::with(['club', 'league'])
                    ->where('organization_id', Auth::user()->organization_id?Auth::user()->organization_id:$id)->whereIn('status',[1,5,2])
                    ->where(function($query) use($search3){
                        return $query
                        ->orWhereHas('league', function ($q) use ($search3) {
                            $q->where('name', 'LIKE', '%' . $search3 . '%');  
                        })
                        ->orWhereHas('club', function ($q) use ($search3) {
                            $q->where('club_name', 'LIKE', '%' . $search3 . '%');  
                        })
                        ->orWhereHas('club', function ($q) use ($search3) {
                            $q->where('club_email', 'LIKE', '%' . $search3 . '%');  
                        })
                        ->orWhere('trans_id','LIKE', '%' . $search3 . '%');      
                    })->groupBy('trans_id','league_id','club_id')->orderBy(DB::raw('sum(totalfee)'),$sorttypeGpay)->paginate(10);
                }
                elseif($sortbyGpay=="Payment"){
                    if($sorttypeGpay=='asc'){
                        $groupRegs = GroupRegistration::with(['club', 'league'])
                ->where('organization_id', Auth::user()->organization_id?Auth::user()->organization_id:$id)->whereIn('status',[1,5,2])
                ->where(function($query) use($search3){
                    return $query
                    ->orWhereHas('league', function ($q) use ($search3) {
                        $q->where('name', 'LIKE', '%' . $search3 . '%');  
                    })
                    ->orWhereHas('club', function ($q) use ($search3) {
                        $q->where('club_name', 'LIKE', '%' . $search3 . '%');  
                    })
                    ->orWhereHas('club', function ($q) use ($search3) {
                        $q->where('club_email', 'LIKE', '%' . $search3 . '%');  
                    })
                    ->orWhere('trans_id','LIKE', '%' . $search3 . '%');      
                })->groupBy('trans_id','league_id','club_id')->orderbyRaw('FIELD(payment_method,1,5,3,4,2)')->get();
                    }else{
                        $groupRegs = GroupRegistration::with(['club', 'league'])
                ->where('organization_id', Auth::user()->organization_id?Auth::user()->organization_id:$id)->whereIn('status',[1,5,2])
                ->where(function($query) use($search3){
                    return $query
                    ->orWhereHas('league', function ($q) use ($search3) {
                        $q->where('name', 'LIKE', '%' . $search3 . '%');  
                    })
                    ->orWhereHas('club', function ($q) use ($search3) {
                        $q->where('club_name', 'LIKE', '%' . $search3 . '%');  
                    })
                    ->orWhereHas('club', function ($q) use ($search3) {
                        $q->where('club_email', 'LIKE', '%' . $search3 . '%');  
                    })
                    ->orWhere('trans_id','LIKE', '%' . $search3 . '%');      
                })->groupBy('trans_id','league_id','club_id')->orderbyRaw('FIELD(payment_method,2,4,3,5,1)')->get();
                    }
                }
                else{
                    $groupRegs = GroupRegistration::with(['club', 'league'])
                ->where('organization_id', Auth::user()->organization_id?Auth::user()->organization_id:$id)->whereIn('status',[1,5,2])
                ->where(function($query) use($search3){
                    return $query
                    ->orWhereHas('league', function ($q) use ($search3) {
                        $q->where('name', 'LIKE', '%' . $search3 . '%');  
                    })
                    ->orWhereHas('club', function ($q) use ($search3) {
                        $q->where('club_name', 'LIKE', '%' . $search3 . '%');  
                    })
                    ->orWhereHas('club', function ($q) use ($search3) {
                        $q->where('club_email', 'LIKE', '%' . $search3 . '%');  
                    })
                    ->orWhere('trans_id','LIKE', '%' . $search3 . '%');      
                })->groupBy('trans_id','league_id','club_id')->orderBy($sortbyGpay,$sorttypeGpay)->get(); 
                }
                

            }else{
                $groupRegs = GroupRegistration::with(['club', 'league'])
                ->where('organization_id', Auth::user()->organization_id?Auth::user()->organization_id:$id)->whereIn('status',[1,5,2])
                ->where(function($query) use($search3){
                    return $query
                    ->orWhereHas('league', function ($q) use ($search3) {
                        $q->where('name', 'LIKE', '%' . $search3 . '%');  
                    })
                    ->orWhereHas('club', function ($q) use ($search3) {
                        $q->where('club_name', 'LIKE', '%' . $search3 . '%');  
                    })
                    ->orWhereHas('club', function ($q) use ($search3) {
                        $q->where('club_email', 'LIKE', '%' . $search3 . '%');  
                    })
                    ->orWhere('trans_id','LIKE', '%' . $search3 . '%');      
                })->groupBy('trans_id','league_id','club_id')->get();
            }
           


        }else{
            if($sortbyGpay){
                if($sortbyGpay=='club_name'){
                    $groupRegs = GroupRegistration::with(['club', 'league'])
                    ->where('organization_id', Auth::user()->organization_id?Auth::user()->organization_id:$id)->whereIn('status',[1,5,2])->groupBy('trans_id','league_id','club_id')->orderBy(Club::select('club_name')->whereColumn('clubs.id','group_registrations.club_id'),$sorttypeGpay)->get();
                }
                elseif($sortbyGpay=='league'){
                    $groupRegs = GroupRegistration::with(['club', 'league'])
                    ->where('organization_id', Auth::user()->organization_id?Auth::user()->organization_id:$id)->whereIn('status',[1,5,2])->groupBy('trans_id','league_id','club_id')->orderBy(League::select('name')->whereColumn('leagues.id','group_registrations.league_id'),$sorttypeGpay)->get();
                }
                elseif($sortbyGpay=='totalfee'){
                    $groupRegs = GroupRegistration::with(['club', 'league'])
                    ->where('organization_id', Auth::user()->organization_id?Auth::user()->organization_id:$id)->whereIn('status',[1,5,2])->groupBy('trans_id','league_id','club_id')->orderBy(DB::raw('sum(totalfee)'),$sorttypeGpay)->get();
                }
                elseif($sortbyGpay=='Payment'){
                    if($sorttypeGpay=='asc'){
                        $groupRegs = GroupRegistration::with(['club', 'league'])
                    ->where('organization_id', Auth::user()->organization_id?Auth::user()->organization_id:$id)->whereIn('status',[1,5,2])->groupBy('trans_id','league_id','club_id')->orderByRaw('FIELD(payment_method,1,5,3,4,2)')->get();
                    }else{
                        $groupRegs = GroupRegistration::with(['club', 'league'])
                        ->where('organization_id', Auth::user()->organization_id?Auth::user()->organization_id:$id)->whereIn('status',[1,5,2])->groupBy('trans_id','league_id','club_id')->orderByRaw('FIELD(payment_method,2,4,3,5,1)')->get();
                    }
                    
                }
                else{
                    $groupRegs = GroupRegistration::with(['club', 'league'])
                    ->where('organization_id', Auth::user()->organization_id?Auth::user()->organization_id:$id)->whereIn('status',[1,5,2])->groupBy('trans_id','league_id','club_id')->orderBy($sortbyGpay,$sorttypeGpay)->get();
                }
               
            }else{
                $groupRegs = GroupRegistration::with(['club', 'league'])
                ->where('organization_id', Auth::user()->organization_id?Auth::user()->organization_id:$id)->whereIn('status',[1,5,2])->groupBy('trans_id','league_id','club_id')->get();
            }
            
        }
    $pdf = app('dompdf.wrapper');
     $pdf->getDomPDF()->set_option("enable_php", true);
     $pdf = PDF::loadView('paymentRequests.PayGrRequestPdf', compact('groupRegs','id','header','setting'))->setPaper('a4', 'landscape');
     return $pdf->stream('GroupEventPaymentRequest.pdf');
    
    }
    public function GroupEventPrint()
    {
        // dd('hi');
        $id=Session::get('id');
        $search3=Session::get('search3');
        $sortbyGpay=Session::get('sortbyGpay');
        $sorttypeGpay=Session::get('sorttypeGpay');
        $setting = OrganizationSetting::where('organization_id', Auth::user()->organization_id !== null ? Auth::user()->organization_id : $id)->first();
        $header = $setting ? $setting->header : '';
        $general = generalSetting::first();
        if($search3!=''){
            if($sortbyGpay){
                if($sortbyGpay=='club_name'){
                    $groupRegsPrint = GroupRegistration::with(['club', 'league'])
                    ->where('organization_id', Auth::user()->organization_id?Auth::user()->organization_id:$id)->whereIn('status',[1,5,2])
                    ->where(function($query) use($search3){
                        return $query
                        ->orWhereHas('league', function ($q) use ($search3) {
                            $q->where('name', 'LIKE', '%' . $search3 . '%');  
                        })
                        ->orWhereHas('club', function ($q) use ($search3) {
                            $q->where('club_name', 'LIKE', '%' . $search3 . '%');  
                        })
                        ->orWhereHas('club', function ($q) use ($search3) {
                            $q->where('club_email', 'LIKE', '%' . $search3 . '%');  
                        })
                        ->orWhere('trans_id','LIKE', '%' . $search3 . '%');      
                    })->groupBy('trans_id','league_id','club_id')->orderBy(Club::select('club_name')->whereColumn('clubs.id','group_registrations.club_id'),$sorttypeGpay)->get(); 
                }elseif($sortbyGpay=="league"){
                    $groupRegsPrint = GroupRegistration::with(['club', 'league'])
                ->where('organization_id', Auth::user()->organization_id?Auth::user()->organization_id:$id)->whereIn('status',[1,5,2])
                ->where(function($query) use($search3){
                    return $query
                    ->orWhereHas('league', function ($q) use ($search3) {
                        $q->where('name', 'LIKE', '%' . $search3 . '%');  
                    })
                    ->orWhereHas('club', function ($q) use ($search3) {
                        $q->where('club_name', 'LIKE', '%' . $search3 . '%');  
                    })
                    ->orWhereHas('club', function ($q) use ($search3) {
                        $q->where('club_email', 'LIKE', '%' . $search3 . '%');  
                    })
                    ->orWhere('trans_id','LIKE', '%' . $search3 . '%');      
                })->groupBy('trans_id','league_id','club_id')->orderBy(League::select('name')->whereColumn('leagues.id','group_registrations.league_id'),$sorttypeGpay)->get();

                }elseif($sortbyGpay=='totalfee'){
                    $groupRegs = GroupRegistration::with(['club', 'league'])
                    ->where('organization_id', Auth::user()->organization_id?Auth::user()->organization_id:$id)->whereIn('status',[1,5,2])
                    ->where(function($query) use($search3){
                        return $query
                        ->orWhereHas('league', function ($q) use ($search3) {
                            $q->where('name', 'LIKE', '%' . $search3 . '%');  
                        })
                        ->orWhereHas('club', function ($q) use ($search3) {
                            $q->where('club_name', 'LIKE', '%' . $search3 . '%');  
                        })
                        ->orWhereHas('club', function ($q) use ($search3) {
                            $q->where('club_email', 'LIKE', '%' . $search3 . '%');  
                        })
                        ->orWhere('trans_id','LIKE', '%' . $search3 . '%');      
                    })->groupBy('trans_id','league_id','club_id')->orderBy(DB::raw('sum(totalfee)'),$sorttypeGpay)->paginate(10);
                }
                elseif($sortbyGpay=="Payment"){
                    if($sorttypeGpay=='asc'){
                        $groupRegsPrint = GroupRegistration::with(['club', 'league'])
                ->where('organization_id', Auth::user()->organization_id?Auth::user()->organization_id:$id)->whereIn('status',[1,5,2])
                ->where(function($query) use($search3){
                    return $query
                    ->orWhereHas('league', function ($q) use ($search3) {
                        $q->where('name', 'LIKE', '%' . $search3 . '%');  
                    })
                    ->orWhereHas('club', function ($q) use ($search3) {
                        $q->where('club_name', 'LIKE', '%' . $search3 . '%');  
                    })
                    ->orWhereHas('club', function ($q) use ($search3) {
                        $q->where('club_email', 'LIKE', '%' . $search3 . '%');  
                    })
                    ->orWhere('trans_id','LIKE', '%' . $search3 . '%');      
                })->groupBy('trans_id','league_id','club_id')->orderbyRaw('FIELD(payment_method,1,5,3,4,2)')->get();
                    }else{
                        $groupRegsPrint = GroupRegistration::with(['club', 'league'])
                ->where('organization_id', Auth::user()->organization_id?Auth::user()->organization_id:$id)->whereIn('status',[1,5,2])
                ->where(function($query) use($search3){
                    return $query
                    ->orWhereHas('league', function ($q) use ($search3) {
                        $q->where('name', 'LIKE', '%' . $search3 . '%');  
                    })
                    ->orWhereHas('club', function ($q) use ($search3) {
                        $q->where('club_name', 'LIKE', '%' . $search3 . '%');  
                    })
                    ->orWhereHas('club', function ($q) use ($search3) {
                        $q->where('club_email', 'LIKE', '%' . $search3 . '%');  
                    })
                    ->orWhere('trans_id','LIKE', '%' . $search3 . '%');      
                })->groupBy('trans_id','league_id','club_id')->orderbyRaw('FIELD(payment_method,2,4,3,5,1)')->get();
                    }
                }
                else{
                    $groupRegsPrint = GroupRegistration::with(['club', 'league'])
                ->where('organization_id', Auth::user()->organization_id?Auth::user()->organization_id:$id)->whereIn('status',[1,5,2])
                ->where(function($query) use($search3){
                    return $query
                    ->orWhereHas('league', function ($q) use ($search3) {
                        $q->where('name', 'LIKE', '%' . $search3 . '%');  
                    })
                    ->orWhereHas('club', function ($q) use ($search3) {
                        $q->where('club_name', 'LIKE', '%' . $search3 . '%');  
                    })
                    ->orWhereHas('club', function ($q) use ($search3) {
                        $q->where('club_email', 'LIKE', '%' . $search3 . '%');  
                    })
                    ->orWhere('trans_id','LIKE', '%' . $search3 . '%');      
                })->groupBy('trans_id','league_id','club_id')->orderBy($sortbyGpay,$sorttypeGpay)->get(); 
                }
                

            }else{
                $groupRegsPrint = GroupRegistration::with(['club', 'league'])
                ->where('organization_id', Auth::user()->organization_id?Auth::user()->organization_id:$id)->whereIn('status',[1,5,2])
                ->where(function($query) use($search3){
                    return $query
                    ->orWhereHas('league', function ($q) use ($search3) {
                        $q->where('name', 'LIKE', '%' . $search3 . '%');  
                    })
                    ->orWhereHas('club', function ($q) use ($search3) {
                        $q->where('club_name', 'LIKE', '%' . $search3 . '%');  
                    })
                    ->orWhereHas('club', function ($q) use ($search3) {
                        $q->where('club_email', 'LIKE', '%' . $search3 . '%');  
                    })
                    ->orWhere('trans_id','LIKE', '%' . $search3 . '%');      
                })->groupBy('trans_id','league_id','club_id')->get();
            }
           


        }else{
            if($sortbyGpay){
                if($sortbyGpay=='club_name'){
                    $groupRegsPrint = GroupRegistration::with(['club', 'league'])
                    ->where('organization_id', Auth::user()->organization_id?Auth::user()->organization_id:$id)->whereIn('status',[1,5,2])->groupBy('trans_id','league_id','club_id')->orderBy(Club::select('club_name')->whereColumn('clubs.id','group_registrations.club_id'),$sorttypeGpay)->get();
                }
                elseif($sortbyGpay=='league'){
                    $groupRegsPrint = GroupRegistration::with(['club', 'league'])
                    ->where('organization_id', Auth::user()->organization_id?Auth::user()->organization_id:$id)->whereIn('status',[1,5,2])->groupBy('trans_id','league_id','club_id')->orderBy(League::select('name')->whereColumn('leagues.id','group_registrations.league_id'),$sorttypeGpay)->get();
                }
                elseif($sortbyGpay=='totalfee'){
                    $groupRegsPrint = GroupRegistration::with(['club', 'league'])
                    ->where('organization_id', Auth::user()->organization_id?Auth::user()->organization_id:$id)->whereIn('status',[1,5,2])->groupBy('trans_id','league_id','club_id')->orderBy(DB::raw('sum(totalfee)'),$sorttypeGpay)->get();
                }
                elseif($sortbyGpay=='Payment'){
                    if($sorttypeGpay=='asc'){
                        $groupRegsPrint = GroupRegistration::with(['club', 'league'])
                    ->where('organization_id', Auth::user()->organization_id?Auth::user()->organization_id:$id)->whereIn('status',[1,5,2])->groupBy('trans_id','league_id','club_id')->orderByRaw('FIELD(payment_method,1,5,3,4,2)')->get();
                    }else{
                        $groupRegsPrint = GroupRegistration::with(['club', 'league'])
                        ->where('organization_id', Auth::user()->organization_id?Auth::user()->organization_id:$id)->whereIn('status',[1,5,2])->groupBy('trans_id','league_id','club_id')->orderByRaw('FIELD(payment_method,2,4,3,5,1)')->get();
                    }
                    
                }
                else{
                    $groupRegsPrint = GroupRegistration::with(['club', 'league'])
                    ->where('organization_id', Auth::user()->organization_id?Auth::user()->organization_id:$id)->whereIn('status',[1,5,2])->groupBy('trans_id','league_id','club_id')->orderBy($sortbyGpay,$sorttypeGpay)->get();
                }
               
            }else{
                $groupRegsPrint = GroupRegistration::with(['club', 'league'])
                ->where('organization_id', Auth::user()->organization_id?Auth::user()->organization_id:$id)->whereIn('status',[1,5,2])->groupBy('trans_id','league_id','club_id')->get();
            }
            
        }
    $view = view('paymentRequests.G-pay-ReqPrint', compact('groupRegsPrint','id','setting','header'))->render();
    return response()->json(['html' => $view
]);
    }
    public function GroupEvReqExcel()
    {
        $search3=Session::get('search3');
        $sortbyGpay=Session::get('sortbyGpay');
        $sorttypeGpay=Session::get('sorttypeGpay');
        $id = Session::get('id');
        
        
        $sorttypeGpay=Session::get('sorttypeGpay');
        return Excel::download(new PayReqGroupExport($search3,$sortbyGpay,$sorttypeGpay,$id), 'payment_Req_Group_event List.xlsx');
    }
    public function Pdf()
    {
        $id=Session::get('id');
        $searchPrint=Session::get('searchPrint');
        $sortBypay=Session::get('sortBypay');
        $sorttypepay=Session::get('sorttypepay');
        $setting = OrganizationSetting::where('organization_id', Auth::user()->organization_id !== null ? Auth::user()->organization_id : $id)->first();
        $header = $setting ? $setting->header : '';
        $general = generalSetting::first();

        if($searchPrint != ''){
            if($sortBypay){
                if($sortBypay=='name_i'){
                   
                    if($sorttypepay=='asc'){
                        $regs = Registration::where('organization_id', Auth::user()->organization_id)->whereIn('status',[1,2,3])
                        ->whereNotIn('payment_method',[0])->whereNotIn('trans_id',[-1])
                        ->where(function($query) use($searchPrint){
                            return $query
                            ->orWhereHas('league', function ($q) use ($searchPrint) {
                                $q->where('name', 'LIKE', '%' . $searchPrint . '%');  
                            })
                            ->orWhereHas('user', function ($q) use ($searchPrint) {
                                $q->wherehas('club',function($q) use ($searchPrint){
                                    $q->where('club_name', 'LIKE', '%' . $searchPrint . '%');
                                });
                            })
                            ->orwhere('payment_method', 'LIKE', '%' . $searchPrint . '%')
                            ->orwhere('trans_id', 'LIKE', '%' . $searchPrint . '%');  
                                 
                        })->groupBy('trans_id')->get()->sortBy(function($query){
                            return $query->user->club->club_name;
                         })->all();
                       
                    }else{
                        $regs = Registration::where('organization_id', Auth::user()->organization_id)->whereIn('status',[1,2,3])
                        ->whereNotIn('payment_method',[0])->whereNotIn('trans_id',[-1])
                        ->where(function($query) use($searchPrint){
                            return $query
                            ->orWhereHas('league', function ($q) use ($searchPrint) {
                                $q->where('name', 'LIKE', '%' . $searchPrint . '%');  
                            })
                            ->orWhereHas('user', function ($q) use ($searchPrint) {
                                $q->wherehas('club',function($q) use ($searchPrint){
                                    $q->where('club_name', 'LIKE', '%' . $searchPrint . '%');
                                });
                            })
                            ->orwhere('payment_method', 'LIKE', '%' . $searchPrint . '%')
                            ->orwhere('trans_id', 'LIKE', '%' . $searchPrint . '%');  
                                 
                        })->groupBy('trans_id')->get()->sortByDesc(function($query){
                            return $query->user->club->club_name;
                         })->all();
                       
                    }

                }elseif($sortBypay=='payment_method'){
                    if($sorttypepay=='asc'){
                        $regs = Registration::where('organization_id', Auth::user()->organization_id)->whereIn('status',[1,2,3])
                        ->whereNotIn('payment_method',[0])->whereNotIn('trans_id',[-1])
                        ->where(function($query) use($searchPrint){
                            return $query
                        ->orWhereHas('league', function ($q) use ($searchPrint) {
                            $q->where('name', 'LIKE', '%' . $searchPrint . '%');  
                        })
                        ->orWhereHas('user', function ($q) use ($searchPrint) {
                            $q->wherehas('club',function($q) use ($searchPrint){
                                $q->where('club_name', 'LIKE', '%' . $searchPrint . '%');
                            });
                        })
                        ->orwhere('payment_method', 'LIKE', '%' . $searchPrint . '%')
                        ->orwhere('trans_id', 'LIKE', '%' . $searchPrint . '%');  

                        })->groupBy('trans_id')->orderbyRaw('FIELD(payment_method,1,5,3,4,2)')->get();
                    }else{
                        $regs = Registration::where('organization_id', Auth::user()->organization_id)->whereIn('status',[1,2,3])
                        ->whereNotIn('payment_method',[0])->whereNotIn('trans_id',[-1])
                        ->where(function($query) use($searchPrint){
                           return $query
                        ->orWhereHas('league', function ($q) use ($searchPrint) {
                            $q->where('name', 'LIKE', '%' . $searchPrint . '%');  
                        })
                        ->orWhereHas('user', function ($q) use ($searchPrint) {
                            $q->wherehas('club',function($q) use ($searchPrint){
                                $q->where('club_name', 'LIKE', '%' . $searchPrint . '%');
                            });
                        })
                        ->orwhere('payment_method', 'LIKE', '%' . $searchPrint . '%')
                        ->orwhere('trans_id', 'LIKE', '%' . $searchPrint . '%');  

                        })->groupBy('trans_id')->orderbyRaw('FIELD(payment_method,2,4,3,5,1)')->get();
                    }
                }elseif($sortBypay=='trans_id'){
                    $regs = Registration::where('organization_id', Auth::user()->organization_id)->whereIn('status',[1,2,3])
                        ->whereNotIn('payment_method',[0])->whereNotIn('trans_id',[-1])
                        ->where(function($query) use($searchPrint){
                            return $query
                            ->orWhereHas('league', function ($q) use ($searchPrint) {
                                $q->where('name', 'LIKE', '%' . $searchPrint . '%');  
                            })
                            ->orWhereHas('user', function ($q) use ($searchPrint) {
                                $q->wherehas('club',function($q) use ($searchPrint){
                                    $q->where('club_name', 'LIKE', '%' . $searchPrint . '%');
                                });
                            })
                            ->orwhere('payment_method', 'LIKE', '%' . $searchPrint . '%')
                            ->orwhere('trans_id', 'LIKE', '%' . $searchPrint . '%');      
                        })->groupBy('trans_id')->orderby($sortBypay,$sorttypepay)->get();
                
                }elseif($sortBypay=='total_i'){
                    $regs = Registration::where('organization_id', Auth::user()->organization_id)->whereIn('status',[1,2,3])
                    ->whereNotIn('payment_method',[0])->whereNotIn('trans_id',[-1])
                    ->where(function($query) use($searchPrint){
                        return $query
                        ->orWhereHas('league', function ($q) use ($searchPrint) {
                            $q->where('name', 'LIKE', '%' . $searchPrint . '%');  
                        })
                        ->orWhereHas('user', function ($q) use ($searchPrint) {
                            $q->wherehas('club',function($q) use ($searchPrint){
                                $q->where('club_name', 'LIKE', '%' . $searchPrint . '%');
                            });
                        })
                        ->orwhere('payment_method', 'LIKE', '%' . $searchPrint . '%')
                        ->orwhere('trans_id', 'LIKE', '%' . $searchPrint . '%');      
                    })->groupBy('trans_id')->orderBy(DB::raw('sum(totalfee)'),$sorttypepay)->get();
                
                }elseif($sortBypay=='league.name'){
                    $regs = Registration::where('organization_id', Auth::user()->organization_id)->whereIn('status',[1,2,3])
                        ->whereNotIn('payment_method',[0])->whereNotIn('trans_id',[-1])
                        ->where(function($query) use($searchPrint){
                            return $query
                            ->orWhereHas('league', function ($q) use ($searchPrint) {
                                $q->where('name', 'LIKE', '%' . $searchPrint . '%');  
                            })
                            ->orWhereHas('user', function ($q) use ($searchPrint) {
                                $q->wherehas('club',function($q) use ($searchPrint){
                                    $q->where('club_name', 'LIKE', '%' . $searchPrint . '%');
                                });
                            })
                            ->orwhere('payment_method', 'LIKE', '%' . $searchPrint . '%')
                            ->orwhere('trans_id', 'LIKE', '%' . $searchPrint . '%');        
                        })->groupBy('trans_id')->orderBy(League::select('name')->whereColumn('leagues.id','registrations.league_id'),$sorttypepay)->get();
                }

            }else{
                $regs = Registration::where('organization_id', Auth::user()->organization_id)->whereIn('status',[1,2,3])
                ->whereNotIn('payment_method',[0])->whereNotIn('trans_id',[-1])
                ->where(function($query) use($searchPrint){
                    return $query
                    ->orWhereHas('league', function ($q) use ($searchPrint) {
                        $q->where('name', 'LIKE', '%' . $searchPrint . '%');  
                    })
                    ->orWhereHas('user', function ($q) use ($searchPrint) {
                        $q->wherehas('club',function($q) use ($searchPrint){
                            $q->where('club_name', 'LIKE', '%' . $searchPrint . '%');
                        });
                    })
                    ->orwhere('payment_method', 'LIKE', '%' . $searchPrint . '%')
                    ->orwhere('trans_id', 'LIKE', '%' . $searchPrint . '%');
                })->groupBy('trans_id')->get();
            }  
        }else{
            if($sortBypay){
                if($sortBypay=='name_i'){
                    if($sorttypepay=='asc'){
                        $regs = Registration::where('organization_id', Auth::user()->organization_id)->whereIn('status',[1,2,3])
                        ->whereNotIn('payment_method',[0])->whereNotIn('trans_id',[-1])->groupBy('trans_id')->get();
                        $regs=$regs->sortBy(function($query){
                            return $query->user->club->club_name;
                         })->all();
                    }else{
                        $regs = Registration::where('organization_id', Auth::user()->organization_id)->whereIn('status',[1,2,3])
                        ->whereNotIn('payment_method',[0])->whereNotIn('trans_id',[-1])->groupBy('trans_id')->get();
                        $regs=$regs->sortByDesc(function($query){
                            return $query->user->club->club_name;
                         })->all();
                    }
                }elseif($sortBypay=='payment_method'){
                    if($sorttypepay=='asc'){
                        $regs = Registration::where('organization_id', Auth::user()->organization_id)->whereIn('status',[1,2,3])
                        ->whereNotIn('payment_method',[0])->whereNotIn('trans_id',[-1])->groupBy('trans_id')->orderbyRaw('FIELD(payment_method,1,5,3,4,2)')->get();
                    }else{
                        $regs = Registration::where('organization_id', Auth::user()->organization_id)->whereIn('status',[1,2,3])
                        ->whereNotIn('payment_method',[0])->whereNotIn('trans_id',[-1])->groupBy('trans_id')->orderbyRaw('FIELD(payment_method,2,4,3,5,1)')->get();
                    } 
                }elseif($sortBypay=='league.name'){
                    $regs = Registration::where('organization_id', Auth::user()->organization_id)->whereIn('status',[1,2,3])
                ->whereNotIn('payment_method',[0])->whereNotIn('trans_id',[-1])->groupBy('trans_id')->orderBy(League::select('name')->whereColumn('leagues.id','registrations.league_id'),$sorttypepay)->get();
                }elseif($sortBypay=='total_i'){
                    $regs = Registration::where('organization_id', Auth::user()->organization_id)->whereIn('status',[1,2,3])
                    ->whereNotIn('payment_method',[0])->whereNotIn('trans_id',[-1])->groupBy('trans_id')->orderBy(DB::raw('sum(totalfee)'),$sorttypepay)->get();
                }elseif($sortBypay=='trans_id'){
                    $regs = Registration::where('organization_id', Auth::user()->organization_id)->whereIn('status',[1,2,3])
                    ->whereNotIn('payment_method',[0])->whereNotIn('trans_id',[-1])->groupBy('trans_id')->orderBy($sortBypay,$sorttypepay)->get();
                }
            }else{
                $regs = Registration::where('organization_id', Auth::user()->organization_id)->whereIn('status',[1,2,3])
                ->whereNotIn('payment_method',[0])->whereNotIn('trans_id',[-1])->groupBy('trans_id')->get();
            }                 
            }
    $pdf = app('dompdf.wrapper');
     $pdf->getDomPDF()->set_option("enable_php", true);
     $pdf = PDF::loadView('paymentRequests.PaymentsRegPdf', compact('regs','id','header','setting'))->setPaper('a4', 'landscape');
     return $pdf->stream('paymentRequest.pdf');
    }
    public function singlePrint(Request $request)
    {
        $id=Session::get('id');
        $searchPrint=$request->get('query');
        $sorttypepay=$request->get('sorttypepay');
        $sortBypay=$request->get('sortbypay');
        Session::put('searchPrint',$searchPrint);
        Session::put('sorttypepay',$sorttypepay);
        Session::put('sortBypay',$sortBypay);
        $setting = OrganizationSetting::where('organization_id', Auth::user()->organization_id !== null ? Auth::user()->organization_id : $id)->first();
        $header = $setting ? $setting->header : '';
        $general = generalSetting::first();
        if($searchPrint != ''){
            if($sortBypay){
                if($sortBypay=='name_i'){
                   
                    if($sorttypepay=='asc'){
                        $regs = Registration::where('organization_id', Auth::user()->organization_id)->whereIn('status',[1,2,3])
                        ->whereNotIn('payment_method',[0])->whereNotIn('trans_id',[-1])
                        ->where(function($query) use($searchPrint){
                            return $query
                            ->orWhereHas('league', function ($q) use ($searchPrint) {
                                $q->where('name', 'LIKE', '%' . $searchPrint . '%');  
                            })
                            ->orWhereHas('user', function ($q) use ($searchPrint) {
                                $q->wherehas('club',function($q) use ($searchPrint){
                                    $q->where('club_name', 'LIKE', '%' . $searchPrint . '%');
                                });
                            })
                            ->orwhere('payment_method', 'LIKE', '%' . $searchPrint . '%')
                            ->orwhere('trans_id', 'LIKE', '%' . $searchPrint . '%');  
                                 
                        })->groupBy('trans_id')->get()->sortBy(function($query){
                            return $query->user->club->club_name;
                         })->all();
                       
                    }else{
                        $regs = Registration::where('organization_id', Auth::user()->organization_id)->whereIn('status',[1,2,3])
                        ->whereNotIn('payment_method',[0])->whereNotIn('trans_id',[-1])
                        ->where(function($query) use($searchPrint){
                            return $query
                            ->orWhereHas('league', function ($q) use ($searchPrint) {
                                $q->where('name', 'LIKE', '%' . $searchPrint . '%');  
                            })
                            ->orWhereHas('user', function ($q) use ($searchPrint) {
                                $q->wherehas('club',function($q) use ($searchPrint){
                                    $q->where('club_name', 'LIKE', '%' . $searchPrint . '%');
                                });
                            })
                            ->orwhere('payment_method', 'LIKE', '%' . $searchPrint . '%')
                            ->orwhere('trans_id', 'LIKE', '%' . $searchPrint . '%');  
                                 
                        })->groupBy('trans_id')->get()->sortByDesc(function($query){
                            return $query->user->club->club_name;
                         })->all();
                       
                    }

                }elseif($sortBypay=='payment_method'){
                    if($sorttypepay=='asc'){
                        $regs = Registration::where('organization_id', Auth::user()->organization_id)->whereIn('status',[1,2,3])
                        ->whereNotIn('payment_method',[0])->whereNotIn('trans_id',[-1])
                        ->where(function($query) use($searchPrint){
                            return $query
                        ->orWhereHas('league', function ($q) use ($searchPrint) {
                            $q->where('name', 'LIKE', '%' . $searchPrint . '%');  
                        })
                        ->orWhereHas('user', function ($q) use ($searchPrint) {
                            $q->wherehas('club',function($q) use ($searchPrint){
                                $q->where('club_name', 'LIKE', '%' . $searchPrint . '%');
                            });
                        })
                        ->orwhere('payment_method', 'LIKE', '%' . $searchPrint . '%')
                        ->orwhere('trans_id', 'LIKE', '%' . $searchPrint . '%');  

                        })->groupBy('trans_id')->orderbyRaw('FIELD(payment_method,1,5,3,4,2)')->get();
                    }else{
                        $regs = Registration::where('organization_id', Auth::user()->organization_id)->whereIn('status',[1,2,3])
                        ->whereNotIn('payment_method',[0])->whereNotIn('trans_id',[-1])
                        ->where(function($query) use($searchPrint){
                           return $query
                        ->orWhereHas('league', function ($q) use ($searchPrint) {
                            $q->where('name', 'LIKE', '%' . $searchPrint . '%');  
                        })
                        ->orWhereHas('user', function ($q) use ($searchPrint) {
                            $q->wherehas('club',function($q) use ($searchPrint){
                                $q->where('club_name', 'LIKE', '%' . $searchPrint . '%');
                            });
                        })
                        ->orwhere('payment_method', 'LIKE', '%' . $searchPrint . '%')
                        ->orwhere('trans_id', 'LIKE', '%' . $searchPrint . '%');  

                        })->groupBy('trans_id')->orderbyRaw('FIELD(payment_method,2,4,3,5,1)')->get();
                    }
                }elseif($sortBypay=='trans_id'){
                    $regs = Registration::where('organization_id', Auth::user()->organization_id)->whereIn('status',[1,2,3])
                        ->whereNotIn('payment_method',[0])->whereNotIn('trans_id',[-1])
                        ->where(function($query) use($searchPrint){
                            return $query
                            ->orWhereHas('league', function ($q) use ($searchPrint) {
                                $q->where('name', 'LIKE', '%' . $searchPrint . '%');  
                            })
                            ->orWhereHas('user', function ($q) use ($searchPrint) {
                                $q->wherehas('club',function($q) use ($searchPrint){
                                    $q->where('club_name', 'LIKE', '%' . $searchPrint . '%');
                                });
                            })
                            ->orwhere('payment_method', 'LIKE', '%' . $searchPrint . '%')
                            ->orwhere('trans_id', 'LIKE', '%' . $searchPrint . '%');      
                        })->groupBy('trans_id')->orderby($sortBypay,$sorttypepay)->get();
                
                }elseif($sortBypay=='total_i'){
                    $regs = Registration::where('organization_id', Auth::user()->organization_id)->whereIn('status',[1,2,3])
                    ->whereNotIn('payment_method',[0])->whereNotIn('trans_id',[-1])
                    ->where(function($query) use($searchPrint){
                        return $query
                        ->orWhereHas('league', function ($q) use ($searchPrint) {
                            $q->where('name', 'LIKE', '%' . $searchPrint . '%');  
                        })
                        ->orWhereHas('user', function ($q) use ($searchPrint) {
                            $q->wherehas('club',function($q) use ($searchPrint){
                                $q->where('club_name', 'LIKE', '%' . $searchPrint . '%');
                            });
                        })
                        ->orwhere('payment_method', 'LIKE', '%' . $searchPrint . '%')
                        ->orwhere('trans_id', 'LIKE', '%' . $searchPrint . '%');      
                    })->groupBy('trans_id')->orderBy(DB::raw('sum(totalfee)'),$sorttypepay)->get();
                
                }elseif($sortBypay=='league.name'){
                    $regs = Registration::where('organization_id', Auth::user()->organization_id)->whereIn('status',[1,2,3])
                        ->whereNotIn('payment_method',[0])->whereNotIn('trans_id',[-1])
                        ->where(function($query) use($searchPrint){
                            return $query
                            ->orWhereHas('league', function ($q) use ($searchPrint) {
                                $q->where('name', 'LIKE', '%' . $searchPrint . '%');  
                            })
                            ->orWhereHas('user', function ($q) use ($searchPrint) {
                                $q->wherehas('club',function($q) use ($searchPrint){
                                    $q->where('club_name', 'LIKE', '%' . $searchPrint . '%');
                                });
                            })
                            ->orwhere('payment_method', 'LIKE', '%' . $searchPrint . '%')
                            ->orwhere('trans_id', 'LIKE', '%' . $searchPrint . '%');        
                        })->groupBy('trans_id')->orderBy(League::select('name')->whereColumn('leagues.id','registrations.league_id'),$sorttypepay)->get();
                }

            }else{
                $regs = Registration::where('organization_id', Auth::user()->organization_id)->whereIn('status',[1,2,3])
                ->whereNotIn('payment_method',[0])->whereNotIn('trans_id',[-1])
                ->where(function($query) use($searchPrint){
                    return $query
                    ->orWhereHas('league', function ($q) use ($searchPrint) {
                        $q->where('name', 'LIKE', '%' . $searchPrint . '%');  
                    })
                    ->orWhereHas('user', function ($q) use ($searchPrint) {
                        $q->wherehas('club',function($q) use ($searchPrint){
                            $q->where('club_name', 'LIKE', '%' . $searchPrint . '%');
                        });
                    })
                    ->orwhere('payment_method', 'LIKE', '%' . $searchPrint . '%')
                    ->orwhere('trans_id', 'LIKE', '%' . $searchPrint . '%');
                })->groupBy('trans_id')->get();
            }  
        }else{
            if($sortBypay){
                if($sortBypay=='name_i'){
                    if($sorttypepay=='asc'){
                        $regs = Registration::where('organization_id', Auth::user()->organization_id)->whereIn('status',[1,2,3])
                        ->whereNotIn('payment_method',[0])->whereNotIn('trans_id',[-1])->groupBy('trans_id')->get();
                        $regs=$regs->sortBy(function($query){
                            return $query->user->club->club_name;
                         })->all();
                    }else{
                        $regs = Registration::where('organization_id', Auth::user()->organization_id)->whereIn('status',[1,2,3])
                        ->whereNotIn('payment_method',[0])->whereNotIn('trans_id',[-1])->groupBy('trans_id')->get();
                        $regs=$regs->sortByDesc(function($query){
                            return $query->user->club->club_name;
                         })->all();
                    }
                }elseif($sortBypay=='payment_method'){
                    if($sorttypepay=='asc'){
                        $regs = Registration::where('organization_id', Auth::user()->organization_id)->whereIn('status',[1,2,3])
                        ->whereNotIn('payment_method',[0])->whereNotIn('trans_id',[-1])->groupBy('trans_id')->orderbyRaw('FIELD(payment_method,1,5,3,4,2)')->get();
                    }else{
                        $regs = Registration::where('organization_id', Auth::user()->organization_id)->whereIn('status',[1,2,3])
                        ->whereNotIn('payment_method',[0])->whereNotIn('trans_id',[-1])->groupBy('trans_id')->orderbyRaw('FIELD(payment_method,2,4,3,5,1)')->get();
                    } 
                }elseif($sortBypay=='league.name'){
                    $regs = Registration::where('organization_id', Auth::user()->organization_id)->whereIn('status',[1,2,3])
                ->whereNotIn('payment_method',[0])->whereNotIn('trans_id',[-1])->groupBy('trans_id')->orderBy(League::select('name')->whereColumn('leagues.id','registrations.league_id'),$sorttypepay)->get();
                }elseif($sortBypay=='total_i'){
                    $regs = Registration::where('organization_id', Auth::user()->organization_id)->whereIn('status',[1,2,3])
                    ->whereNotIn('payment_method',[0])->whereNotIn('trans_id',[-1])->groupBy('trans_id')->orderBy(DB::raw('sum(totalfee)'),$sorttypepay)->get();
                }elseif($sortBypay=='trans_id'){
                    $regs = Registration::where('organization_id', Auth::user()->organization_id)->whereIn('status',[1,2,3])
                    ->whereNotIn('payment_method',[0])->whereNotIn('trans_id',[-1])->groupBy('trans_id')->orderBy($sortBypay,$sorttypepay)->get();
                }
            }else{
                $regs = Registration::where('organization_id', Auth::user()->organization_id)->whereIn('status',[1,2,3])
                ->whereNotIn('payment_method',[0])->whereNotIn('trans_id',[-1])->groupBy('trans_id')->get();
            }                 
            }
            $view = view('paymentRequests.PaymentsRegPrint', compact('regs','id','setting','header'))->render();
            return response()->json(['html' => $view
        ]);
    }
    public function SingleEvReqExcel()
    {
        $search = Session::get('search');
        $searchPrint=Session::get('searchPrint');
        $sortBypay=Session::get('sortBypay');
        $sorttypepay=Session::get('sorttypepay');
        $id = Session::get('id');
        
        
        return Excel::download(new PayReqSingleExport($searchPrint,$sortBypay,$sorttypepay,$id), 'payment_Req_single_event List.xlsx');
    }
  
    public function data()
    {
 $total=0;
 $iso=Auth::user()->organization->country->currency->currency_iso_code;
        $regs = Registration::with(['user', 'league'])->where('organization_id', Auth::user()->organization_id)->whereIn('status',[1,2,3])->whereNotIn('payment_method',[0])->whereNotIn('trans_id',[-1])->groupBy('trans_id')->get();
        return DataTables::of($regs)
        ->editColumn('name', function ($reg){
            if($reg->user->club_id!=null){
                $name=$reg->user->club->club_name;
            }
            else{
                                $name=$reg->user->first_name;

            }
            return $name;

                                                    
         


        })
        
        ->editColumn('Paid Amount', function ($reg) use($total,$iso){
            $total=$reg->where('organization_id',Auth::user()->organization_id)
                            //    ->where('league_id',$reg->league_id)
                               ->where('trans_id',$reg->trans_id)
                               ->sum('totalfee');
        //   $total=$total+$reg->totalfee;
            return $iso.'.'.$total;
        })
          ->editColumn('method', function ($reg){
              if($reg->payment_method==1){
                  $method="Bank";
              }
                if($reg->payment_method==2){
                  $method="Vipps";
              }
              if($reg->payment_method==3){
                  $method="SIL Member";
              }
              if($reg->payment_method==4){
                $method="Stripe";
            }
              if($reg->payment_method==5){
                $method="QrPayments";
            }
             
            return $method;

                                                    
         


        })
            ->addColumn('actions', function ($reg) {
                
                if ($reg->status == 1) {
                    $id = $reg->trans_id;


                     $actions = '<button style="padding: 2px 3px" class=" btn btn-success approve"  id="' . $id . '" data-toggle="tooltip"  league="'.$reg->league_id.'"  data-placement="top" title="Approve"><i class="material-icons" style="margin-bottom:5px">check_circle</i></button>
                     <button style="padding: 2px 3px" class=" btn btn-danger decline" id="' . $id . '" data-toggle="tooltip" league="'.$reg->league_id.'" data-placement="top" title="Decline"><i class="material-icons" style="margin-bottom:5px">highlight_off</i></button>';
 
                    
                    return $actions;
                }
                if ($reg->status == 2) {

                    $id = $reg->trans_id;
                    $actions = ' <button style="padding: 2px 3px" class=" btn btn-danger decline" id="' . $id . '" data-toggle="tooltip" league="'.$reg->league_id.'" data-placement="top" title="Decline"><i class="material-icons" style="margin-bottom:5px">highlight_off</i></button>';


                    return $actions;
                }
                if ($reg->status == 3) {
                    $id = $reg->trans_id;
                    $actions = '<button style="padding: 2px 3px" class=" btn btn-success approve" id="' . $id . '" data-toggle="tooltip" league="'.$reg->league_id.'" data-placement="top" title="Approve"><i class="material-icons" style="margin-bottom:5px">check_circle</i></button>';
                    return $actions;
                }
            })

            ->rawColumns(['actions'])
            ->make(true);
    }


    public function groupEventData()
    {
        $leagues=League::where('organization_id',Auth::user()->organization_id)->where('to_date','>',Carbon::now())->get();
$leagueIds=array();
foreach($leagues as $league){
    $leagueIds[]=$league->id;
}
$groups=array();
$total = 0;
// $regs = GroupRegistration::with(['club', 'league'])->where('organization_id', Auth::user()->organization_id)->whereIn('league_id',$leagueIds)->get();

//  $groups[]=$registrations->groupBy('trans_id')->map(function ($row) {
//     return$row->sum('totalfee');
// });
 
                
                    
                
        return DataTables::of($regs)
    
        ->editColumn('paidAmount', function ($reg) use($total){
            $total = $total+1;
            return $total;

                                                    
         


        })
        
            ->addColumn('actions', function ($reg) {
                if ($reg->status == 0) {
                 

                    $actions = '<button  style="padding: 2px 4px" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Not PAID"><i class="material-icons" style="margin-bottom:5px">highlight_off</i> </button>';


                    return $actions;
                }
                if ($reg->status == 5) {
                    $id = $reg->club_id;
                    $leagueId=$reg->league_id;
                    $transId=$reg->trans_id;

                    $actions = '<button  style="padding: 2px 4px" class="btn btn-success accept" transId="'.$transId.'" league="'.$leagueId.'" id="' . $id . '" data-toggle="tooltip" data-placement="top" title="Approve"><i class="material-icons" style="margin-bottom:5px">check_circle</i> </button>';

                   

                    return $actions;
                }
                if ($reg->status == 1) {

                    $id = $reg->club_id;
                    $transId=$reg->trans_id;
                   $leagueId=$reg->league_id;
                    $actions = '<button  style="padding: 2px 4px" class="btn btn-success accept" transId="'.$transId.'" league="'.$leagueId.'" id="' . $id . '" data-toggle="tooltip" data-placement="top" title="Approve"><i class="material-icons" style="margin-bottom:5px">check_circle</i> </button>
                    <button class="btn btn-danger reject" transId="'.$transId.'" league="'.$leagueId.'" id="' . $id . '" style="padding: 2px 4px;" data-toggle="tooltip" data-placement="top" title="Decline"><i class="material-icons" style="margin-bottom:5px">highlight_off</i> </button>';


                    return $actions;
                }
                if ($reg->status == 2) {

                    $id = $reg->club_id;
                    $leagueId=$reg->league_id;
                    $transId=$reg->trans_id;

                    $actions = '  <button class="btn btn-danger reject" transId="'.$transId.'" league="'.$leagueId.'" id="' . $id . '" style="padding: 2px 4px;" data-toggle="tooltip" data-placement="top" title="Decline"><i class="material-icons" style="margin-bottom:5px">highlight_off</i> </button>';


                    return $actions;
                }
            })
            ->rawColumns(['actions'])
            ->make(true);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $league = League::find($request->input('league'));
        if ($request->input('reg')) {
            $total = $request->input('total');
            $total = explode(' ', $request->input('total'));
            $registration = Registration::find($request->input('reg'));
            $registration->organization_id = $request->input('org');
            $registration->league_id = $request->input('league');
            $registration->season_id = $league->season_id;
            $registration->payment_method=$request->input('method')== 'bank'? '1' : ($request->input('method') == 'Vipps'? '2' : '5');
            $registration->totalfee = $total[1];
            $dob = User::find($request->input('user'));
            // dd($dob);
            $registration->user_id = $request->input('user') ? $request->input('user') : Auth::user()->id;
            if($request->input('transId')){
                $registration->trans_id = $request->input('transId');

            }
            else{
                $registration->trans_id =$request->input('transId2');

            }
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
        } else {
            $registration = new Registration;
            $total = explode(' ', $request->input('total'));

            $registration->organization_id = $request->input('org');
            $registration->league_id = $request->input('league');
            $registration->season_id = $league->season_id;
            $registration->status = 1;
            $registration->totalfee = $total[1];
            $registration->is_approved=1;
                    $registration->self_reg = 1;

            $registration->payment_method=$request->input('method')== 'bank'? '1' : ($request->input('method') == 'Vipps'? '2' : '5');
            $dob = User::find($request->input('user'));
            // dd($dob);
            $registration->user_id = $request->input('user') ? $request->input('user') : Auth::user()->id;
            if($request->input('transId')){
                $registration->trans_id = $request->input('transId');

            }
            else{
                $registration->trans_id =$request->input('transId2');

            }
            $gender = $request->input('user') ? $dob->gender : Auth::user()->gender;
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
        $id = Crypt::encrypt($request->input('user'));
        if ($request->input('user') != Auth::user()->id) {
            activity()
            ->causedBy($dob)
            ->performedOn($dob)
            ->withProperties(["attributes"=>['ip_address' => request()->ip()]])
            ->log('Registered Events');
            return redirect('/events/Crypt::encrypt($request->input("user"))')->withInput(['tab' => 'tab2']);
        }
        activity()
        ->causedBy($dob)
        ->performedOn($dob)
        ->withProperties(["attributes"=>['ip_address' => request()->ip()]])
        ->log('Registered Events');
        return redirect('/events')->withInput(['tab' => 'tab2']);
    }
    public function storeMemberNotPay(Request $request){

        $user = $request->input('user') ? $request->input('user') : Auth::User()->id;
        $userDet=User::find($user);
        if ($request->input('reg')) {
            $subtotal=0;
            $subtotal1=0;
             if($request->input('events')){
                 foreach ($request->input('events') as $fieldEvent){
                      $event = Event::where('id', $fieldEvent)->first();
                            if ($event->mainEvent->discount > 0) {
                                $subtotal = $subtotal+$event->mainEvent->price - (($event->mainEvent->discount / 100) * $event->mainEvent->price);
                            } else {
                                $subtotal = $subtotal+$event->mainEvent->price;
                            } 
                 }
             }
                if($request->input('events2')){
                 foreach ($request->input('events2') as $fieldEvent){
                      $event = Event::where('id', $fieldEvent)->first();
                            if ($event->mainEvent->discount > 0) {
                                $subtotal1 = $subtotal1+$event->mainEvent->price - (($event->mainEvent->discount / 100) * $event->mainEvent->price);
                            } else {
                                $subtotal1 = $subtotal1+$event->mainEvent->price;
                            } 
                       
                 }
             }
             if($event->mainEvent->organization->orgsetting){
                if($event->mainEvent->organization->orgsetting->active==1){
                    if($userDet->member_or_not==1){
                        $subtotal2 = $subtotal+$subtotal1-(($event->mainEvent->organization->orgsetting->discount / 100) * ($subtotal+$subtotal1));
                                              
                    }
                    else{
                        $subtotal2=$subtotal+$subtotal1;
                    }
                }else{
                    $subtotal2=$subtotal+$subtotal1;
                }
            }else{
                $subtotal2=$subtotal+$subtotal1;
            } 

            $registration = Registration::find($request->input('reg'));
            $registration->organization_id = $request->input('org');
            $registration->league_id = $request->input('league');
                $league = League::find($registration->league_id );
                if($league->organization->orgsetting){
                    if($league->organization->orgsetting->active==1){
                        if($userDet->member_or_not==1){
                        $registration->discount = $league->organization->orgsetting->discount;
                        }
                    }else{
                        $registration->discount =0;
                    }
                    }else{
                        $registration->discount =0;
            
                    }
            $registration->season_id = $league->season_id;
            $registration->totalfee = $subtotal2;
    
           
            
            $registration->save();
            $registration->events()->detach();
            if ($request->input('events')) {
                $registration->events()->attach($request->input('events', ['age_group_gender_id' => $request->input('gender')]));
            }
            if ($request->input('events2')) {
    
                $registration->events()->attach($request->input('events2', ['age_group_gender_id' => $request->input('gender')]));
            }
    
            $id = Crypt::encrypt($request->input("user"));
    } 
    else {
        $subtotal2=0;
        if($request->input('totalEvents')){
           
            foreach (explode(',',$request->input('totalEvents')) as $totalEvent){
                 $event = Event::where('id', $totalEvent)->first();
                        if ($event->mainEvent->discount > 0) {
                            $subtotal2 = $subtotal2+$event->mainEvent->price - (($event->mainEvent->discount / 100) * $event->mainEvent->price);
                        } else {
                            $subtotal2 = $subtotal2+$event->mainEvent->price;
                        } 
            }
            if($event->mainEvent->organization->orgsetting){
                if($event->mainEvent->organization->orgsetting->active==1){
                    if($userDet->member_or_not==1){
                        $subtotal2 = $subtotal2-(($event->mainEvent->organization->orgsetting->discount / 100) * $subtotal2);
                                              
                    }
                    else{
                        $subtotal2;
                    }
                }else{
                    $subtotal2;
                }
            }else{
                $subtotal2;
            }
        }
         $subtotal4=$subtotal2;
        $registration = new Registration;
        // $total = explode(' ', $request->input('total'));

        $registration->organization_id = Event::find($totalEvent)->organization_id;
        $registration->league_id = Event::find($totalEvent)->league_id;
        $league = League::find(Event::find($totalEvent)->league_id);
        if($league->organization->orgsetting){
            if($league->organization->orgsetting->active==1){
                if($userDet->member_or_not==1){
                $registration->discount = $league->organization->orgsetting->discount;
                }
            }else{
                $registration->discount =0;
            }
            }else{
                $registration->discount =0;
    
            }
        $registration->season_id = $league->season_id;
        $registration->status = 4;
        $registration->totalfee =  $subtotal4;
        $registration->is_approved = 1;
        $registration->self_reg = 0;

        $dob = User::find($user);
        $registration->user_id = $user ;
        if ($request->input('transId')) {

            $registration->trans_id = $request->input('transId');
        }
        $gender = $dob->gender;
        // dd($gender);
        if ($gender == 'male')
            $registration->gender = 1;
        else
            $registration->gender = 2;

        $registration->save();
        if ($request->input('totalEvents')) {
            
            $registration->events()->attach(explode(',',$request->input('totalEvents')));
        }
    }
    $id = Crypt::encrypt($request->input('user'));
if(Auth::user()->hasRole(2)){
    if($userDet->email==null && $userDet->parent_id==null){
        $email=null;
    }
    elseif($userDet->email==null){
$email=$userDet->parent->email;
    }else{
$email=$userDet->email;
    }
    $registeredEvents=$registration->events;
    $general = generalSetting::first();
    if($email!=null){
    Mail::send(
        ['html' => 'eventRegistration'],
        ['user' => $userDet, 'regs' => $registeredEvents,'general'=>$general],
        function ($message) use ($email) {
            $message->to($email)
            ->replyTo('admin@sangamil.no', 'Stovner')
                ->subject("Event Registration");
        }
    );
}
activity()
        ->causedBy($userDet)
        ->performedOn($userDet)
        ->withProperties(["attributes"=>['ip_address' => request()->ip()]])
        ->log('Registered Events');
    return redirect('/org-member/events/' . $id . '')->withInput(['tab' => 'tab2']);

}else{
    activity()
        ->causedBy($userDet)
        ->performedOn($userDet)
        ->withProperties(["attributes"=>['ip_address' => request()->ip()]])
        ->log('Registered Events');
    return redirect('/member/events/' . $id . '')->withInput(['tab' => 'tab2']);

}
   
}
public function storeNotPay(Request $request){

    $user = $request->input('user') ? $request->input('user') : Auth::User()->id;
    $userDet=User::find($user);
    if ($request->input('reg')) {
        $subtotal=0;
        $subtotal1=0;
         if($request->input('events')){
             foreach ($request->input('events') as $fieldEvent){
                  $event = Event::where('id', $fieldEvent)->first();
                        if ($event->mainEvent->discount > 0) {
                            $subtotal = $subtotal+$event->mainEvent->price - (($event->mainEvent->discount / 100) * $event->mainEvent->price);
                        } else {
                            $subtotal = $subtotal+$event->mainEvent->price;
                        } 
             }

         }
            if($request->input('events2')){
             foreach ($request->input('events2') as $fieldEvent){
                  $event = Event::where('id', $fieldEvent)->first();
                    
                        if ($event->mainEvent->discount > 0) {
                            $subtotal1 = $subtotal1+$event->mainEvent->price - (($event->mainEvent->discount / 100) * $event->mainEvent->price);
                        } else {
                            $subtotal1 = $subtotal1+$event->mainEvent->price;
                        } 
                    
             }
         }
         if($event->mainEvent->organization->orgsetting){
            if($event->mainEvent->organization->orgsetting->active==1){
                if($userDet->member_or_not==1){
                    $subtotal2 = $subtotal+$subtotal1-(($event->mainEvent->organization->orgsetting->discount / 100) * ($subtotal+$subtotal1));
                                          
                }
                else{
                    $subtotal2=$subtotal+$subtotal1;
                }
            }else{
                $subtotal2=$subtotal+$subtotal1;
            }
        }else{
            $subtotal2=$subtotal+$subtotal1;
        }       
        $registration = Registration::find($request->input('reg'));
        $registration->organization_id = $request->input('org');
        $registration->league_id = $request->input('league');
        $league = League::find($registration->league_id );
        if($league->organization->orgsetting){
            if($league->organization->orgsetting->active==1){
                if($userDet->member_or_not==1){
                $registration->discount = $league->organization->orgsetting->discount;
                }
            }else{
                $registration->discount =0;
            }
            }else{
                $registration->discount =0;
    
            }
        $registration->season_id = $league->season_id;
        $registration->totalfee = $subtotal2;

    //    dd($registration->discount);
        
        $registration->save();
        $registration->events()->detach();
        if ($request->input('events')) {
            $registration->events()->attach($request->input('events', ['age_group_gender_id' => $request->input('gender')]));
        }
        if ($request->input('events2')) {

            $registration->events()->attach($request->input('events2', ['age_group_gender_id' => $request->input('gender')]));
        }

        $id = Crypt::encrypt($request->input("user"));
  
    if ($request->input('user') !=null) {
        activity()
        ->causedBy($userDet)
        ->performedOn($userDet)
        ->withProperties(["attributes"=>['ip_address' => request()->ip()]])
        ->log('Edit Registered Events');
        return redirect('/events/' . $id . '')->withInput(['tab' => 'tab2']);
    }
    activity()
                ->causedBy($userDet)
                ->performedOn($userDet)
                ->withProperties(["attributes"=>['ip_address' => request()->ip()]])
                ->log('Edit Registered Events');
    return redirect('/events')->withInput(['tab' => 'tab2']);
    } else {
        $subtotal2=0;
        $subtotal3=0;
        $discount=$request->input('discount');
         if($request->input('totalEvents')){
             foreach (explode(',',$request->input('totalEvents')) as $totalEvent){
                  $event = Event::where('id', $totalEvent)->first();
                        if ($event->mainEvent->discount > 0) {
                            $subtotal2 = $subtotal2+$event->mainEvent->price - (($event->mainEvent->discount / 100) * $event->mainEvent->price);
                        } else {
                            $subtotal2 = $subtotal2+$event->mainEvent->price;
                        } 
             }
            if($event->mainEvent->organization->orgsetting){
                if($event->mainEvent->organization->orgsetting->active==1){
                    if($userDet->member_or_not==1){
                        $subtotal2 = $subtotal2-(($event->mainEvent->organization->orgsetting->discount / 100) * $subtotal2);
                                              
                    }
                    else{
                        $subtotal2;
                    }
                }else{
                    $subtotal2;
                }
            }else{
                $subtotal2;
            }
         }
         $subtotal4=$subtotal2;
        $registration = new Registration;
        $registration->organization_id = Event::find($totalEvent)->organization_id;
        $registration->league_id = Event::find($totalEvent)->league_id;
        $league = League::find(Event::find($totalEvent)->league_id);

        $registration->season_id = $league->season_id;
        $registration->status = 4;
        $registration->totalfee =  $subtotal4;
        if($league->organization->orgsetting){
            if($league->organization->orgsetting->active==1){
                if($userDet->member_or_not==1){
                $registration->discount = $league->organization->orgsetting->discount;
                }
            }else{
                $registration->discount =0;
            }
            }else{
                $registration->discount =0;
    
            }
        $registration->is_approved = 2;
        $registration->self_reg = 1;

        $dob = User::find($user);
        $registration->user_id = $user ;
        if ($request->input('transId')) {

            $registration->trans_id = $request->input('transId');
        }
        $gender = $dob->gender;
        if ($gender == 'male')
            $registration->gender = 1;
        else
            $registration->gender = 2;

        $registration->save();
      
        if ($request->input('totalEvents')) {
            $registration->events()->attach(explode(',',$request->input('totalEvents')));
        }
      
       
        $id = Crypt::encrypt($user);
        $registeredEvents=$registration->events;
        $general = generalSetting::first();
        if($userDet->email==null){
            $email=Auth::user()->email;
            $parent=Auth::user();
            Mail::send(
                ['html' => 'eventRegistrationFamMember'],
                ['user' => $userDet, 'regs' => $registeredEvents,'general'=>$general,'parent'=>$parent],
                function ($message) use($email) {
                    $message->to($email)
                    ->replyTo('admin@sangamil.no', 'Stovner')
                        ->subject("Event Registration");
                }
            );
        }else{
            Mail::send(
                ['html' => 'eventRegistration'],
                ['user' => $userDet, 'regs' => $registeredEvents,'general'=>$general],
                function ($message) use ($userDet) {
                    $message->to($userDet->email)
                    ->replyTo('admin@sangamil.no', 'Stovner')
                        ->subject("Event Registration");
                }
            );
        }
       
        $clubAdmins=User::Role([3])->where('club_id', $userDet->club_id)->get();
foreach($clubAdmins as $admin){
    Mail::send(
        ['html' => 'eventRegistrationNotify'],
        ['user' => $userDet, 'regs' => $registeredEvents,'general'=>$general,'admin'=>$admin,'reg'=>$registration],
        function ($message) use ($admin) {
            $message->to($admin->email)
            ->replyTo('admin@sangamil.no', 'Stovner')
                ->subject("Event Registration");
        }
    );
}
    if ($user !=Auth::user()->id) {
        activity()
        ->causedBy($userDet)
        ->performedOn($userDet)
        ->withProperties(["attributes"=>['ip_address' => request()->ip()]])
        ->log('Registered Events');
        return redirect('/events/' . $id . '')->with('message', 'This member has successfully registered events.please check your mail')->withInput(['tab' => 'tab2']);
    }
    activity()
    ->causedBy($userDet)
    ->performedOn($userDet)
    ->withProperties(["attributes"=>['ip_address' => request()->ip()]])
    ->log('Registered Events');
    return redirect('/events')->with('message', 'You have successfully registered events.please check the mail')->withInput(['tab' => 'tab2']);
    }
    
}
public function editParticipant(Request $request){
        $subtotal=0;
        $subtotal1=0;
         if($request->input('events')){
             foreach ($request->input('events') as $fieldEvent){
                  $event = Event::where('id', $fieldEvent)->first();
                
                      if(Auth::User()->organization_id==$request->input('org')){
                           if ($event->mainEvent->discount > 0) {


                                                        $subtotal = $subtotal+$event->mainEvent->price - (($event->mainEvent->discount / 100) * $event->mainEvent->price);
                                                    } else {
                                                        $subtotal = $subtotal+$event->mainEvent->price;
                                                    }
                                                    
                      }
                      else{
                                                $subtotal=$subtotal+$event->mainEvent->price;

                      }
                 

             }
         }
            if($request->input('events2')){
             foreach ($request->input('events2') as $fieldEvent){
                  $event = Event::where('id', $fieldEvent)->first();
                      if(Auth::User()->organization_id==$request->input('org')){
                           if ($event->mainEvent->discount > 0) {


                                                        $subtotal1 = $subtotal1+$event->mainEvent->price - (($event->mainEvent->discount / 100) * $event->mainEvent->price);
                                                    } else {
                                                        $subtotal1 = $subtotal1+$event->mainEvent->price;
                                                    }
                                                    
                      }
                      else{
                                                $subtotal1=$subtotal1+$event->mainEvent->price;

                      }
                 

             }
         }
         $subtotal2=$subtotal+$subtotal1;
           $league = League::find($request->input('league'));

        $registration = Registration::find($request->input('reg'));
        $registration->organization_id = $request->input('org');
        $registration->league_id = $request->input('league');
        $registration->season_id = $league->season_id;
        $registration->totalfee = $subtotal2;

        $dob = User::find($request->input('user'));
        $registration->user_id = $request->input('user') ;
        if ($request->input('transId')) {

            $registration->trans_id = $request->input('transId');
        }
        $gender = $request->input('user');
        if ($gender == 'male')
            $registration->gender = 1;
        else
            $registration->gender = 2;
        $registration->save();
        $registration->events()->detach();
        if ($request->input('events')) {
            $registration->events()->attach($request->input('events', ['age_group_gender_id' => $request->input('gender')]));
        }
        if ($request->input('events2')) {

            $registration->events()->attach($request->input('events2', ['age_group_gender_id' => $request->input('gender')]));
        }

        $id = Crypt::encrypt($request->input("user"));
  
  
    return redirect("leagues/participants/registrations/$league->id");
}
public function childPay(Request $request){
    $league = League::find($request->input('league'));
    $registration = Registration::find($request->input('reg'));
    if ($request->input('reg')) {
        if($request->input('user')){
             $total = $request->input('total');
        $total = explode(' ', $request->input('total'));
            $registration->totalfee = $total[1];


        }
        else{
            $subtotal=0;
            $subtotal1=0;
             if($request->input('events')){
                 foreach ($request->input('events') as $fieldEvent){
                      $event = Event::where('id', $fieldEvent)->first();
                          if(Auth::User()->organization_id==$request->input('org')){
                               if ($event->mainEvent->discount > 0) {
    
    
                                                            $subtotal = $subtotal+$event->mainEvent->price - (($event->mainEvent->discount / 100) * $event->mainEvent->price);
                                                        } else {
                                                            $subtotal = $subtotal+$event->mainEvent->price;
                                                        }
                                                        
                          }
                          else{
                                                        $subtotal=$subtotal+$event->mainEvent->price;

                          }
                     
                 }
             }
                if($request->input('events2')){
                 foreach ($request->input('events2') as $fieldEvent){
                      $event = Event::where('id', $fieldEvent)->first();
                          if(Auth::User()->organization_id==$request->input('org')){
                               if ($event->mainEvent->discount > 0) {
    
    
                                                            $subtotal1 = $subtotal1+$event->mainEvent->price - (($event->mainEvent->discount / 100) * $event->mainEvent->price);
                                                        } else {
                                                            $subtotal1 = $subtotal1+$event->mainEvent->price;
                                                        }
                                                        
                          }
                          else{
                                                        $subtotal1=$subtotal1+$event->mainEvent->price;

                          }
                  
    
                 }
             }
             $subtotal2=$subtotal+$subtotal1;
             $registration->totalfee = $subtotal2;
        }
 
    
        $registration->organization_id = $request->input('org');
        $registration->league_id = $request->input('league');
        $registration->season_id = $league->season_id;
        $dob = User::find($request->input('user'));
        // dd($dob);
        $registration->user_id = $request->input('user') ? $request->input('user') : Auth::user()->id;
        if ($request->input('transId')) {

            $registration->trans_id = $request->input('transId');
        }
        $gender = $request->input('user') ? $dob->gender : Auth::user()->gender;
        if ($gender == 'male')
            $registration->gender = 1;
        else
            $registration->gender = 2;
        $registration->save();
        $registration->events()->detach();
        if ($request->input('events')) {
            $registration->events()->attach($request->input('events', ['age_group_gender_id' => $request->input('gender')]));
        }
        if ($request->input('events2')) {

            $registration->events()->attach($request->input('events2', ['age_group_gender_id' => $request->input('gender')]));
        }

        // $id = $request->input('user');
        $id = Crypt::encrypt($request->input("user"));

    } 
    else {

        $dob = User::find($request->input('user'));
        $registration = new Registration;
        $total = explode(' ', $request->input('total'));

        $registration->organization_id = $request->input('org');
        $registration->league_id = $request->input('league');
        $registration->season_id = $league->season_id;
        if($dob->member_or_not==1){
            $registration->status = 2;
            $registration->payment_method =2;
        }
        if($dob->member_or_not==0){
            $registration->status =4;
        }
        $registration->totalfee = $total[1];
        $registration->is_approved = 1;

        $registration->user_id = $request->input('user') ? $request->input('user') : Auth::user()->id;
        if ($request->input('transId')) {

            $registration->trans_id = $request->input('transId');
        }
        $gender = $request->input('user') ? $dob->gender : Auth::user()->gender;
        // dd($gender);
        if ($gender == 'male')
            $registration->gender = 1;
        else
            $registration->gender = 2;

        $registration->save();
        if ($request->input('fieldevents')) {
            $registration->events()->attach($request->input('fieldevents'));
        }
        if ($request->input('trackEvents')) {

            $registration->events()->attach($request->input('trackEvents'));
        }
    }
    $id = Crypt::encrypt($request->input("user"));

    if ($request->input('user') != Auth::user()->id) {
        activity()
    ->causedBy($dob)
    ->performedOn($dob)
    ->withProperties(["attributes"=>['ip_address' => request()->ip()]])
    ->log('Registered Events');
        return redirect('/events/' . $id . '')->withInput(['tab' => 'tab2']);
    }
    activity()
    ->causedBy($dob)
    ->performedOn($dob)
    ->withProperties(["attributes"=>['ip_address' => request()->ip()]])
    ->log('Registered Events');
    return redirect('/events')->withInput(['tab' => 'tab2']);
}
    public function payment()
    {

        $iso = Auth::user()->country->currency->currency_iso_code;
        $organization = null;
        $children = Auth::user()->children;
        if ($children->count() > 0) {
            foreach ($children as $child) {
                $user = User::where('id', $child->id)->first();

                $eventslists = $user->registrations;
                if ($eventslists) {
                    foreach ($eventslists as $list) {
                        $org = $list->organization_id;
                        $organization = $org ? Organization::find($org) : "";
                    }
                }
                if (Auth::user()->registrations) {
                    foreach (Auth::user()->registrations as $list) {
                        $org = $list->organization_id;
                        $organization = $org ? Organization::find($org) : "";
                    }
                }
            }
        } else {
            $user = User::where('id', Auth::user()->id)->first();
            $eventslists = $user->registrations;
            if ($eventslists) {
                foreach ($eventslists as $list) {
                    $org = $list->organization_id;
                    $organization = $org ? Organization::find($org) : "";
                }
            }
            // else{
            //     $organization=null;
            // }
        }
        $season = Season::where('status', 1)->first();


        $pastPayments = Registration::where('user_id', Auth::user()->id)->where('status', 2)->get();
        // dd($pastPayments);

        $todoPayments = Registration::where('user_id', Auth::user()->id)->where('status', 1)->get();
        // dd($todoPayments);
        return view('members.memberPaymentMethods', compact('children', 'season', 'iso', 'pastPayments', 'todoPayments', 'organization'));
    }
    public function invoice(Request $request, $id, $orgId)
    {
      
        $iso = Auth::user()->country->currency->currency_iso_code;
        $reg = Registration::find($id);
        $organization = Organization::find($orgId);
        $league_id = $organization->league_id;
        $season = Season::where('status', 1)->first();
        $children = Auth::user()->children;
        $invoiceCount=Registration::where('league_id',$reg->league_id)->where('status','!=',4)->count();
        // dd($invoiceCount);
        if ($children->count() > 0) {
            foreach ($children as $child) {
                $user = User::where('id', $child->id)->first();
                $eventslists = $user->registrations;
                if ($eventslists) {
                    foreach ($eventslists as $list) {
                        $org = $list->organization_id;
                    }
                }
                if (Auth::user()->registrations) {
                    foreach (Auth::user()->registrations as $list) {
                        $org = $list->organization_id;
                    }
                }
            }
        } else {
            $user = User::where('id', Auth::user()->id)->first();
            $eventslists = $user->registrations;
            if ($eventslists) {
                foreach ($eventslists as $list) {
                    $org = $list->organization_id;
                }
            }
        }



        return view('members.invoice', compact('organization','invoiceCount','iso', 'season', 'children', 'org', 'list', 'reg'));
    }

    public function pastInvoice(Request $request, $id, $orgId)
    {
        $iso = Auth::user()->country->currency->currency_iso_code;
        $reg = Registration::find($id);
        $organization = Organization::find($orgId);
        return view('members.past-invoice', compact('reg', 'organization', 'iso'));
    }
    public function pay($id, $regId)
    {
        $iso = Auth::user()->country->currency->currency_iso_code;
        $children = Auth::user()->children;
        $organization = Organization::find($id);
        $reg = Registration::find($regId);

        $season = Season::where('status', 1)->first();

        return view('members.pay', compact('children', 'organization', 'iso', 'season', 'reg'));
    }
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


    public function update(Request $request)
    {
        // dd($request->all());
        // $children=Auth::user()->children;
        // $season = Season::where('status', 1)->first();
        // dd($request->input('method')=='bank'?'1':'2');
        $reg = Registration::where("id", $request->input('reg'))->update(['trans_id' => $request->input('transId')?$request->input('transId'):$request->input('transId2'),'status'=>1,'payment_method' => $request->input('method')=='bank'?'1':'2']);


        return redirect("members/pay")->with('success', 'Your Payment Details Has been sent');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $reg=Registration::find($id);
        $user=User::find($reg->user_id);
        $reg->events()->detach();
        $reg->delete();
        activity()
        ->causedBy($user)
        ->performedOn($user)
        ->withProperties(["attributes"=>['ip_address' => request()->ip()]])
        ->log('Delete Registered Events');
         $url='/events';
        return response()->json(['url'=>$url]);
    }
}
