<?php

namespace App\Http\Controllers\Admin\reports;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gender;
use App\Models\Club;
use App\User;
use Auth;
use App\generalSetting;
use PDF;
use Session;
use Excel;
use App\Exports\ClubMemberExport;



class clubMembersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Session::get('id');      
        Session::forget('c-membersCategories');
        $genders=Gender::all();
        $general = generalSetting::first();
        $adminheader = $general->header;
        $users=User::where('club_id', Auth::user()->club_id )->where('is_approved',1)->get();
        // $clubs=Club::where('id', Auth::user()->club_id ? Auth::user()->club_id : $id)->first();
        // dd($users);
      
       return view('admin.reports.clubMember.clubMembers',compact('general','genders','users','adminheader'));
    }
  

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function filter(Request $request)
    {
        $id = Session::get('id');
        $general = generalSetting::first();
        $adminheader = $general->header;
        $users=User::where('club_id', Auth::user()->club_id)->where('is_approved',1);
        $categories = $request->input('obj');
        Session::put('c-membersCategories', $categories);

        if ($categories) {
        foreach ($categories as $key => $values) {

            if ($key == "f_name") {
                if($values!=null){
                    $users=$users->where('first_name', 'like', '%' . $values. '%');
                }
            } 
            elseif ($key == "l_name") {
                if($values!=null){
                    $users=$users->where('last_name', 'like', '%' . $values. '%');
                }
            } 
            elseif ($key == "gender") {
                if($values!=0){
                    if($values==1){
                        $users=$users->where('gender','=','male');
                    }else{
                        $users=$users->where('gender','=','female');
                    }
                }
            }
            elseif ($key == "user_id") {
                if($values!=null){
                    $users=$users->where('userId', 'like', '%' . $values. '%');
                }
            }
        }
    }else{
        $users=User::where('club_id', Auth::user()->club_id)->where('is_approved',1);

    }
    $users=$users->get();
        
        $view = view('admin.reports.clubMember.clubMemberFilter', compact( 'users'))->render();
        $view2 = view('admin.reports.clubMember.clubMemberPreview', compact( 'general','users','adminheader'))->render();

        return response()->json(['html' => $view]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function generatePdf(Request $request)
    {
        // $id = Session::get('id');
        $general = generalSetting::first();
        $adminheader = $general->header;
        $users=User::where('club_id', Auth::user()->club_id)->where('is_approved',1);
        $categories=Session::get('c-membersCategories');

        if ($categories) {
            foreach ($categories as $key => $values) {
    
                if ($key == "f_name") {
                    if($values!=null){
                        $users=$users->where('first_name', 'like', '%' . $values. '%');
                    }
                } 
                elseif ($key == "l_name") {
                    if($values!=null){
                        $users=$users->where('last_name', 'like', '%' . $values. '%');
                    }
                } 
                elseif ($key == "gender") {
                    if($values!=0){
                        if($values==1){
                            $users=$users->where('gender','=','male');
                        }else{
                            $users=$users->where('gender','=','female');
                        }                    
                    }
                }
                elseif ($key == "user_id") {
                    if($values!=null){
                        $users=$users->where('userId', 'like', '%' . $values. '%');
                    }
                }
            }
        }else{
            $users=User::where('club_id', Auth::user()->club_id)->where('is_approved',1);
    
        }
                $users=$users->get();

        $pdf = app('dompdf.wrapper');
        $pdf->getDomPDF()->set_option("enable_php", true);
        $pdf = PDF::loadView('admin.reports.clubMember.clubMemberPdf', compact('general','users','adminheader'))->setPaper('a4', 'landscape');
        return $pdf->stream('clubMembers.pdf');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function Excel()
    {
    
        $id = Session::get('id');
        $categories = Session::get('c-membersCategories');
        return Excel::download(new ClubMemberExport($categories,$id), 'clubMembers.xlsx');
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
