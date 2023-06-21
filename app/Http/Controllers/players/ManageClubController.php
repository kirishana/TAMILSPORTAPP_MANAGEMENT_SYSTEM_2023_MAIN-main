<?php

namespace App\Http\Controllers\players;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ClubeRquest;
use Auth;
use App\Models\Club;
use App\User;
class ManageClubController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function manageClub()
    {
        $clubRequests=ClubeRquest::where('user_id',Auth::user()->id)->get();
        $clubs=Club::where('is_approved',1)->get();

        return view('manageClubs.index',compact('clubRequests','clubs'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $clubRequest=new ClubeRquest;
        $clubRequest->user_id=Auth::user()->id;
        $clubRequest->old_club_id=Auth::user()->club_id;
        $clubRequest->new_club_id=$request->input('newClub');
        $clubRequest->save();
        $url="/manage-club";
        return response(['url'=>$url]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function clubRequests(Request $request)
    {
        // $clubRequests=ClubeRquest::where('old_club_id',Auth::user()->club_id)->Orwhere('new_club_id',Auth::user()->club_id)->where('status',0)->get();
        $clubRequests=ClubeRquest::all();
        return view('manageClubs.clubRequests',compact('clubRequests'));
    }
public function approveClubRequest(Request $request){
    $clubRequest=ClubeRquest::find($request->input('Request'));
    if($clubRequest->old_club_id==$request->input('id')){
        $clubRequest->status=3;
        $clubRequest->save();
    }else{
        $user=User::find($clubRequest->user_id);
        $ids=$user->userId;
        $club = club::find($clubRequest->new_club_id);
        $oldClub=club::find($clubRequest->old_club_id);
        $user1 = User::where('club_id', $club->id)->orderBy('id', 'desc')->first();
        if ($user1) {
            $prefix = $user1->userId;
            $pre = explode(' ', $prefix);
            $userNumber=$club->prefix . " " . str_pad(($pre[1] + 1), 4, '0', STR_PAD_LEFT);
            $ids=$user->userId;
            $clubRequest->status=1;
            $clubRequest->userIds=$ids;
            $clubRequest->save();
            $user->userId = $userNumber;
            $user->club_id=$club->id;
            $user->save();
        } else {
            $userNumber=$club->prefix . " " . str_pad(1, 4, '0', STR_PAD_LEFT);
            $ids=$user->userId;
            $clubRequest->status=1;
            $clubRequest->userIds=$ids;
            $clubRequest->save();
            $user->userId = $userNumber;
            $user->club_id=$club->id;
            $user->save();
    
        }
    }


    $url="/club-requests";

    return response(['url'=>$url]);

  
}
   
public function declineClubRequest(Request $request){
    $clubRequest=ClubeRquest::find($request->input('Request'));
    if($clubRequest->old_club_id==$request->input('id')){
        $clubRequest->status=2;
        $clubRequest->save();
    }else{
        if($clubRequest->status==3){
            $clubRequest->status=2;
            $clubRequest->save();
        }else{
            $user=User::find($clubRequest->user_id);
    $ids=$user->userId;
    // $club = club::find($clubRequest->new_club_id);
    $club=club::find($clubRequest->old_club_id);
    $user1 = User::where('club_id', $club->id)->orderBy('id', 'desc')->first();
    if ($user1) {
        $prefix = $user1->userId;
        $pre = explode(' ', $prefix);
        $userNumber=$club->prefix . " " . str_pad(($pre[1] + 1), 4, '0', STR_PAD_LEFT);
        $ids=$user->userId;
        $clubRequest->status=2;
        $clubRequest->userIds=$ids;
        $clubRequest->save();
        $user->userId = $userNumber;
        $user->club_id=$club->id;
        $user->save();
    } else {
        $userNumber=$club->prefix . " " . str_pad(1, 4, '0', STR_PAD_LEFT);
        $ids=$user->userId;
        $clubRequest->status=2;
        $clubRequest->userIds=$ids;
        $clubRequest->save();
        $user->userId = $userNumber;
        $user->club_id=$club->id;
        $user->save();

    }

        }
    
}
        $clubRequest->status=2;
        $clubRequest->save();
        $url="/club-requests";

        return response(['url'=>$url]);
        
  
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
