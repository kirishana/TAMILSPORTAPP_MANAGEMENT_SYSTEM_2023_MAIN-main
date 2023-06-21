<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AthleticSetting;
use App\user;
use Auth;
use Session;

class AthleticSettingsController extends Controller
{
    public function athleticSettings(Request $request)
    {
        $id = Session::get('id');


        return view('organizations.atheletic', compact('id'));
    }
    public function store(Request $request)
    {

        $id = Session::get('id') ? Session::get('id') : '';
        $athleticSetting = new AthleticSetting;
        $athleticSetting->organization_id       = Auth::user()->organization_id ? Auth::user()->organization_id : $id;
        $athleticSetting->track_events          = $request->input('trackCount');
        $athleticSetting->field_events          = $request->input('fieldCount');
        $athleticSetting->total_events          = $request->input('total');
        $athleticSetting->track_event_method    = $request->input('time');
        $athleticSetting->heat_method    = $request->input('rank');
        $athleticSetting->first_place = $request->input('first_place');
        $athleticSetting->second_place = $request->input('second_place');
        $athleticSetting->third_place = $request->input('third_place');
        $athleticSetting->group_first_place = $request->input('group_first_place');
        $athleticSetting->group_second_place = $request->input('group_second_place');
        $athleticSetting->group_third_place = $request->input('group_third_place');
       
        $athleticSetting->save();
        $id = Auth::user()->organization_id;
        return redirect('/organization/atheletic-settings')->with('success', 'Athletic Settings updated successfully');
    }

    /**
     * User update.
     *
     * @param  int $id
     * @return View
     */
    public function edit()
    {
        $orgId = Session::get('id');
        $athletic = AthleticSetting::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $orgId)->first();
        return view('organizations.atheletic', compact('athletic'));
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
        $orgId = Session::get('id');
                    // dd($request->input('ffplace'));

        $atheletic = AthleticSetting::find($id);
        $atheletic->organization_id          = Auth::user()->organization_id ? Auth::user()->organization_id : $orgId;
        $atheletic->track_events          = $request->input('trackCount');
        $atheletic->field_events          = $request->input('fieldCount');
        $atheletic->total_events          = $request->input('total');
        $atheletic->track_event_method    = $request->input('time');
        $atheletic->heat_method    = $request->input('rank');
        $atheletic->first_place = $request->input('first_place');
        $atheletic->second_place = $request->input('second_place');
        $atheletic->third_place = $request->input('third_place');
        $atheletic->group_first_place = $request->input('group_first_place');
        $atheletic->group_second_place = $request->input('group_second_place');
        $atheletic->group_third_place = $request->input('group_third_place');
       
        $atheletic->save();
        $id = Auth::user()->organization_id;
        return redirect('/organization/atheletic-settings')->with('success', 'Athletic Settings updated successfully');
    }
    public function athletic(Request $request)
    {
        $atheletic = AthleticSetting::find($request->org);
        $track_events = $atheletic->track_events;
        return response([
            'track_events' => $track_events
        ]);
    }
}
