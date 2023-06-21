<?php

namespace App\Http\Controllers\settings;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\generalSetting;
use App\Models\Organization;
use File;
use Image;
use Auth;
use App\user;

use Spatie\Permission\Models\Role;

class GeneralSettingsController extends Controller
{

    public function create()
    {
        $general = generalSetting::first();
        $organizations = Organization::all();

        $roles = Role::all();
        // dd($general);
        return view('admin.settings.general.create', compact('organizations', 'roles', 'general'));
    }
    public function index()
    {
        // Show the page


    }

    /*
     * Pass data through ajax call
     */
    /**
     * @return mixed
     */



    /**
     * User create form processing.
     *
     * @return Redirect
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $signLogo = $request->file('sign_logo')->store('public');
        $dashboardLogo = $request->file('dashboard_logo') ? $request->file('dashboard_logo')->store('public') : '';


        $generalSetting = new generalSetting;
        $generalSetting->title          = $request->input('title');
        $generalSetting->name          = $request->input('name');
        $generalSetting->telephone          = $request->input('telephone');
        $generalSetting->address          = $request->input('address');
        $generalSetting->dashboard_logo          = $dashboardLogo;
        $generalSetting->signup_logo          = $signLogo;
        $generalSetting->website_url=$request->input('url');


        //dd($categoryImage);
        $generalSetting->save();
        return redirect('/admin/settings')->with('success', 'general info updated successfully');
    }

    /**
     * User update.
     *
     * @param  int $id
     * @return View
     */
    public function edit($id)
    {
        $general = generalSetting::find($id);
        // Show the page
        return view('admin.settings.general.edit', compact('general'));
    }

    /**
     * User update form processing page.
     *
     * @param  User $user
     * @param UserRequest $request
     * @return Redirect
     */
    public function update(Request $request, $id)
    {
        $generalSetting = generalSetting::find($id);
        if ($generalSetting) {
            if ($image = $request->file('dashboard_logo')) {
                $destinationPath = 'general/';
                $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $profileImage);
                $input['dashboard_logo'] = "$profileImage";
                $orgLogo =$generalSetting->dashboard_logo  ;
                if (file_exists($orgLogo)) {

                @unlink($orgLogo);
                }
                else{
                $generalSetting->id = 1;
                $generalSetting->dashboard_logo =   $input['dashboard_logo'];
                }
            } 
            
            else {
                $orgLogo =$generalSetting->dashboard_logo  ;
            }

            if ($image1 = $request->file('header')) {

                $destinationPath = 'general/header';
                $header = date('YmdHis') . "." . $image1->getClientOriginalExtension();
                $image1->move($destinationPath, $header);
                $input['header'] = "$header";
                $header =  $generalSetting->header;

                if (file_exists($header)) {
                    @unlink($header);
                }
                else{
                    $generalSetting->id = 1;
                    $generalSetting->header =   $input['header'];
                }
               
            }
            else {
                $generalSetting->header  ;
            }
            if ($image2 = $request->file('sign_logo')) {
                $destinationPath = 'general/signUp';
                $header2 = date('YmdHis') . "." . $image2->getClientOriginalExtension();
                $image2->move($destinationPath, $header2);
                $input['sign_logo'] = "$header2";
$signLogo=$generalSetting->signup_logo;

                if (file_exists($signLogo)) {

                    @unlink($signLogo);
                }
                else{
                    $generalSetting->id = 1;
                    $generalSetting->signup_logo =   $input['sign_logo'];
                }
                
            }
            else {
                $generalSetting->id = 1;
                $generalSetting->signup_logo ;
            }
            if ($request->input('description')) {
                $generalSetting->footer = $request->input('description');
            }

            $generalSetting->title          = $request->input('title');
            $generalSetting->name          = $request->input('name');
            $generalSetting->telephone          = $request->input('telephone');
            $generalSetting->address          = $request->input('address');
            $generalSetting->website_url=$request->input('url');
    
            $generalSetting->save();
        }
        return redirect('/admin/general-setting')->with('success', 'general info  updated successfully');
    }
}
