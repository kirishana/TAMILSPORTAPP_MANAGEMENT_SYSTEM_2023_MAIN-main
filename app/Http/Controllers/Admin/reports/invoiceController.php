<?php

namespace App\Http\Controllers\Admin\reports;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\League;
use Auth;
use App\Models\Registration;
use App\Models\GroupRegistration;
use PDF;
class invoiceController extends Controller
{
    public function invoices(Request $request){
        $leagues=League::all();
        $invoices=null;
        return view('reports.invoice.index',compact('leagues','invoices'));
    }
    public function filter(Request $request){
        $league=League::find($request->input('leagueData'));
       $invoices=$league->registrations()->where('is_approved','1')->whereHas('user', function ($q)  {
        $q->where('club_id', Auth::user()->club_id);
})->get();
$groupInvoices=$league->groupRegistrations()->where('club_id',Auth::user()->club_id)->get()->groupBy('inv_no');
       $view = view('reports.invoice.filter', compact('invoices','groupInvoices'))->render();

       return response()->json([
           'html' => $view,   
            ]);
     
    }
    public function viewInvoice($league,$id)
    {
       $regs=Registration::where('league_id',$league)->where('trans_id',$id)->where('is_approved',1)->get();
       foreach($regs as $reg){
        $inv=$reg->inv_no;
       }
       $league=League::find($league);
       return view('reports.invoice.invoice',compact('regs','league','inv','reg'));
    }
    public function viewGroupRegInvoice($league,$invNo){
        $regs=GroupRegistration::where('league_id',$league)->where('inv_no',$invNo)->get();
      foreach($regs as $reg){
        $inv=$reg->inv_no;
      }
       $league=League::find($league);
       return view('reports.invoice.groupRegInvoice',compact('regs','league','reg','inv','invNo'));
    }
    public function downloadInvoice($league,$id){
        $regs=Registration::where('league_id',$league)->where('trans_id',$id)->get();
       foreach($regs as $reg){
        $inv=$reg->inv_no;
       }
       $league=League::find($league);
        $pdf = PDF::loadView('reports.invoice.download',compact('regs','league','inv','reg'))->setPaper('a4', 'landscape');
        return $pdf->download('invoice.pdf');  
    }
    public function downloadGroupRegInvoice($league,$invNo){
        $regs=GroupRegistration::where('league_id',$league)->where('inv_no',$invNo)->get();
       foreach($regs as $reg){
        $inv=$reg->inv_no;
       }
       $league=League::find($league);
        $pdf = PDF::loadView('reports.invoice.downloadGroupReg',compact('regs','league','inv','reg')); 
        return $pdf->download('GroupEventInvoice.pdf');  
    }
}
