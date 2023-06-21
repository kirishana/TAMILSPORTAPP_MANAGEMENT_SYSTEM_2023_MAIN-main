<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Organization;
use App\User;
use Illuminate\Support\Facades\DB;
use Mail;
use App\generalSetting;
use App\Models\CountryCode;

class CountryController extends Controller
{
    


   public function country()
   {		
       $organizations=Organization::all();
       $general=generalSetting::first();
       $countries=Country::all();
       $countryAdmins=User::role('CountryAdmin')->get();
       $currencies=DB::table('currency')->get();
       $countryCodes=CountryCode::all();
        return view('admin.country.index',compact('organizations','countries','countryAdmins','currencies','general','countryCodes'));

   }
    public function store(Request $request)
    {
        //  dd($request->all());
        $country = Country::create(
            ['name' => $request['data'],'currency_id'=>$request['isoCode'],'country_code_id'=>$request['countryCode']]
        );
        $url='/admin/countries';
        return response()->json([
            'url'=>$url
        ]);
    }
    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $country=Country::find($id);
        $currencies=DB::table('currency')->get();
        $countryCodes=CountryCode::all();
        // $users=User::Role(['CountryAdmin'])->where('country_id', $country->id)->get();
        return response()->json([
            'currencies'=>$currencies,
            'countryCodes'=>$countryCodes,
            'country'=>$country
        ]);

    }

    public function changeOwnership(Request $request)
    {
        $country=$request->input('id');
        $countryCode=$request->input('countryCode');
        $currency=$request->input('currency');
        $name=$request->input('name');
        $countryDet=Country::find($country);
        $countryDet->name=$name;
        $countryDet->currency_id=$currency;
        $countryDet->country_code_id=$countryCode;
        $countryDet->save();
        // $countryDet->
        //  $user=$request->input('data');
        //  $countryAdmin=User::role('CountryAdmin')->where('country_id',$country)->first();
        //  $adminName=$countryAdmin->first_name;
        //  $countryAdmin->removeRole('CountryAdmin');
        //  $countryAdmin->assignRole('Player');
        //  Mail::send(['html' => 'countryownership'], ['countryDet'=>$countryDet,'adminName'=>$adminName],
        //  function ($message) use ($user_email) {
        //      $message->to($user_email)
        //          ->subject('Ownership');
        //  });
            // $user_email=User::find($request->input('data'))->email;
            // $user_name=User::find($request->input('data'))->first_name;
        // Mail::send(['html' => 'countryadminOwnership'], ['countryDet'=>$countryDet,'user_name'=>$user_name],
        //     function ($message) use ($user_email) {
        //         $message->to($user_email)
        //             ->subject('Ownership');
        //     });
            $url='/admin/countries';
            return response()->json([
                'url'=>$url
            ]);
        
    }
    
    public function destroy(Request $request)
    {
        $country=Country::find($request->input('id'));
        $url='/admin/countries';
        if($country->users()->count() > 0 || $country->organization()->count() > 0 || $country->clubs()->count() > 0) {
                $status=1;
                $message='Some users , clubs or organization dependent on this country';
         
        } else {
            $country=Country::find($request->input('id'));
            $country->delete();
            $status=0;
            $message='Deleted successfully';
           
        }
        return response()->json([
            'status' => $status,
            'url' => $url,
            'message' => $message
        ]);
    }
        public function activate(Request $request)
        {
            $role=Role::find($request->input('id'));
            $role->status=0;
            $role->save();
            return response()->json([
                'message'=>'updated'
            ]);
        }

        public function deactivate(Request $request)
        {
            $role=Role::find($request->input('id'));
            $role->status=1;
            $role->save();
            return response()->json([
                'message'=>'updated'
            ]);
        }
}
