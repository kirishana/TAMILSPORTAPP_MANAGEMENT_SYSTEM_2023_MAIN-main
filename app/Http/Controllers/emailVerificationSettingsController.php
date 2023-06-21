<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\emailVerificationSetting;
use Auth;
class emailVerificationSettingsController extends Controller
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $emailVerificationSetting=new emailVerificationSetting();
        $emailVerificationSetting->organization_id=Auth::user()->organization_id;
        $emailVerificationSetting->subject=$request->input('subject')?$request->input('subject'):'';
        $emailVerificationSetting->title=$request->input('title')?$request->input('title'):'';
        $emailVerificationSetting->content=$request->input('content')?$request->input('content'):'';
        $emailVerificationSetting->footer=$request->input('footer')?$request->input('footer'):'';
        if ($image = $request->file('logo')) {
            $destinationPath = 'organization/emailVerifySettings';
            $logo = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $logo);
            $input['logo'] = "$logo";
            $emailVerificationSetting->logo= $input['logo'];
        }        
        
        $emailVerificationSetting->save();
        return redirect()->back();
    }
    public function resetPwUpdate(Request $request,$id)
    {
        $emailVerificationSetting=emailVerificationSetting ::find($id);
        $emailVerificationSetting->reset_pw_subject=$request->input('reset_pw_subject')?$request->input('reset_pw_subject'):'';
        $emailVerificationSetting->reset_pw_content=$request->input('reset_pw_content')?$request->input('reset_pw_content'):'';       
        $emailVerificationSetting->save();
        return redirect()->back();
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
        $emailVerificationSetting=emailVerificationSetting ::find($id);
        $emailVerificationSetting->organization_id=Auth::user()->organization_id;
        $emailVerificationSetting->subject=$request->input('subject')?$request->input('subject'):'';
        $emailVerificationSetting->title=$request->input('title')?$request->input('title'):'';
        $emailVerificationSetting->content=$request->input('content')?$request->input('content'):'';
        $emailVerificationSetting->footer=$request->input('footer')?$request->input('footer'):'';
        if ($image = $request->file('logo')) {
            $destinationPath = 'organization/emailVerifySettings';
            $logo = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $logo);
            $input['logo'] = "$logo";
            $emailVerificationSetting->logo= $input['logo'];
        }        
        
        $emailVerificationSetting->save();
        return redirect()->back();
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
