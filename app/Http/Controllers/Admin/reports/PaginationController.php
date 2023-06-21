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
use Carbon;
use App\Exports\clubMembersearchExport;


class PaginationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $id = Session::get('id');
        $search=null;
        Session::forget('search');
        Session::forget('sortBy');
        Session::forget('sorttype');
        $general = generalSetting::first();
        $adminheader = $general->header;
        
        if ($request->ajax()) {
            $dob=null;         
            $search = $request->get('query')?$request->get('query'):'';
            if(is_numeric($search)&& ((strlen($search)==1)||(strlen($search)==2))){
                $today=Carbon\Carbon::now()->format('Y');
                $dob=$today-$search;
                }
            $sortBy=$request->get('sortby');
            $sorttype=$request->get('sorttype');
            Session::put('sortBy', $sortBy);
            Session::put('sorttype', $sorttype);
            Session::put('search', $search);
            if($search != ''){
                if($sortBy){
                $users = User::Role(['player'])->where('club_id', Auth::user()->club_id ? Auth::user()->club_id : $id)->where('is_approved',1)
                ->where(function($query) use($search,$dob){
                    return $query
                ->orWhere('first_name','LIKE', '%' . $search . '%')
                ->orWhere('email', $search )
                ->orWhere('last_name','LIKE', '%' . $search . '%')
                ->orWhereYear('dob',$dob !=null? $dob:'');
            })->orderBy($sortBy,$sorttype)->paginate(10);
            // dd($users->count());
        }else{
            $users = User::Role(['player'])->where('club_id', Auth::user()->club_id ? Auth::user()->club_id : $id)->where('is_approved',1)
            ->where(function($query) use($search,$dob){
                return $query
            ->orWhere('first_name','LIKE', '%' . $search . '%')
            ->orWhere('email', $search )
            ->orWhere('last_name','LIKE', '%' . $search . '%')
            ->orWhereYear('dob',$dob !=null? $dob:'');
        })->orderBy('id','Desc')->paginate(10);
        }
                return view('clubs.club_member_filter', compact('users','id'));
                // $view = view('clubs.club_member_print', compact('users','id'))->render();
                // return response()->json(['html' => $view
        //  ]);


            }
            else{
                if($sortBy){
                $users = User::Role(['player'])->where('club_id', Auth::user()->club_id)->orderBy($sortBy,$sorttype)->where('is_approved',1)->paginate(10);
                }else{
                    $users = User::Role(['player'])->where('club_id', Auth::user()->club_id)->orderBy('id','Desc')->where('is_approved',1)->paginate(10);
                }
                return view('clubs.club_member_filter', compact('users','id')) ;

            }
           

        }
        else{
            $users = User::Role(['player'])->where('club_id', Auth::user()->club_id)->orderBy('id', 'DESC')->where('is_approved',1)->paginate(10);
       
            return view('clubs.club_members', compact('users','id','general','adminheader'));

        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function print(Request $request)
    {
        $id = Session::get('id');
// dd('j');
        // $search = $request->get('query')?$request->get('query'):'';
        $search=Session::get('search');
        $sortBy=Session::get('sortBy');
        $sorttype=Session::get('sorttype');
        $general = generalSetting::first();
        $adminheader = $general->header;
        $dob=null;         
        if(is_numeric($search)&& ((strlen($search)==1)||(strlen($search)==2))){
            $today=Carbon\Carbon::now()->format('Y');
            $dob=$today-$search;
            }

        if($search != ''){
            if($sortBy){
            $users = User::Role(['player'])->where('club_id', Auth::user()->club_id ? Auth::user()->club_id : $id)->where('is_approved',1)
            ->where(function($query) use($search,$dob){
                return $query
            ->Where('first_name','LIKE', '%' . $search . '%')
            ->orWhere('email', $search )
            ->orWhere('last_name','LIKE', '%' . $search . '%')
            ->orWhereYear('dob',$dob !=null? $dob:'');
            })->orderBy($sortBy,$sorttype)
             ->get();
        }else{
            $users = User::Role(['player'])->where('club_id', Auth::user()->club_id ? Auth::user()->club_id : $id)->where('is_approved',1)
            ->where(function($query) use($search,$dob){
                return $query
            ->Where('first_name','LIKE', '%' . $search . '%')
            ->orWhere('email', $search )
            ->orWhere('last_name','LIKE', '%' . $search . '%')
            ->orWhereYear('dob',$dob !=null? $dob:'');
            })->orderBy('id','Desc')
             ->get();

        }
            // return view('clubs.club_member_print', compact('users','id'))->render();

             $view = view('clubs.club_member_print', compact('users','id','general','adminheader'))->render();
                return response()->json(['html' => $view
            ]);
                                    // dd($view);


        }else{
            if($sortBy){
                $users = User::Role(['player'])->where('club_id', Auth::user()->club_id? Auth::user()->club_id : $id)->where('is_approved',1)->orderBy($sortBy,$sorttype)->get();
            }else{
                $users = User::Role(['player'])->where('club_id', Auth::user()->club_id? Auth::user()->club_id : $id)->where('is_approved',1)->orderBy('id', 'DESC')->get();

            }
            // dd($users);
            $view = view('clubs.club_member_print', compact('users','id','general','adminheader'))->render();
                return response()->json(['html' => $view
         ]);


        }
    
   

      
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function pdf(Request $request)
    {
        $search=Session::get('search');
        $id = Session::get('id');
        $sortBy = Session::get('sortBy');
        $sorttype = Session::get('sorttype');
        $general = generalSetting::first();
        $adminheader = $general->header;
        // dd($sortBy);
        $dob=null;         
        if(is_numeric($search)&& ((strlen($search)==1)||(strlen($search)==2))){
            $today=Carbon\Carbon::now()->format('Y');
            $dob=$today-$search;
            }

        if($search != ''){
            if($sortBy){
            $users = User::Role(['player'])->where('club_id', Auth::user()->club_id ? Auth::user()->club_id : $id)->where('is_approved',1)  
            ->where(function($query) use($search,$dob){
                return $query
            ->Where('first_name','LIKE', '%' . $search . '%')
            ->orWhere('email', $search )
            ->orWhere('last_name','LIKE', '%' . $search . '%')
            ->orWhereYear('dob',$dob !=null? $dob:'');
            })->orderBy($sortBy,$sorttype)->get();
        }else{
            $users = User::Role(['player'])->where('club_id', Auth::user()->club_id ? Auth::user()->club_id : $id)->where('is_approved',1)  
            ->where(function($query) use($search,$dob){
                return $query
            ->Where('first_name','LIKE', '%' . $search . '%')
            ->orWhere('email', $search )
            ->orWhere('last_name','LIKE', '%' . $search . '%')
            ->orWhereYear('dob',$dob !=null? $dob:'');
            })->orderBy('id', 'DESC')->get();

        }
             $pdf = app('dompdf.wrapper');
             $pdf->getDomPDF()->set_option("enable_php", true);
             $pdf = PDF::loadView('clubs.club_member_pdf', compact('users','id','general','adminheader'))->setPaper('a4', 'potrait');
             return $pdf->stream('Club-members.pdf');
        }else{
            if($sortBy){
                $users = User::Role(['player'])->where('club_id', Auth::user()->club_id)->where('is_approved',1)->orderBy($sortBy,$sorttype)->get();
            }else{
                $users = User::Role(['player'])->where('club_id', Auth::user()->club_id)->where('is_approved',1)->orderBy('id', 'DESC')->get();
            }
            $pdf = app('dompdf.wrapper');
            $pdf->getDomPDF()->set_option("enable_php", true);
            $pdf = PDF::loadView('clubs.club_member_pdf', compact('users','id','general','adminheader'))->setPaper('a4','landscape');
            return $pdf->stream('Club-members.pdf');

        }
      
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function excel()
    {
        $search = Session::get('search');
        $sortBy = Session::get('sortBy');
        $sorttype = Session::get('sorttype');
        $id = Session::get('id');
        
        
        return Excel::download(new clubMembersearchExport($search, $id,$sortBy,$sorttype), 'club-members List.xlsx');
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
