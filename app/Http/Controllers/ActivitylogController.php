<?php

namespace App\Http\Controllers;

use App\generalSetting;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;
use App\User;
use Illuminate\Support\Facades\Auth;

class ActivitylogController extends Controller
{
    public function showActivities(User $user ,Request $request)
    {
        $general = generalSetting::first();

        if ($request->ajax()) {
            $dob=null;
            $search5 = $request->get('query5')?$request->get('query5'):'';
           if(is_numeric($search5)&& ((strlen($search5)==1)||(strlen($search5)==2))){
           $today=Carbon::now()->format('Y');
           $dob=$today-$search5;
           }
          
            if(Auth::user()->hasRole(8)){
                if($search5 != ''){
                    $activityLogs = Activity::where(function($query) use($search5){
                        return $query
                    ->whereHas('subject', function ($q) use ($search5) {
                        $q->where('first_name', 'like', '%' . $search5 . '%')->orWhere('last_name', 'like', '%' . $search5 . '%');     
                    })
                    ->orwhereHas('causer', function ($q) use ($search5) {
                        $q->where('first_name', 'like', '%' . $search5 . '%')->orWhere('last_name', 'like', '%' . $search5 . '%');     
        
                    })           
                    ->orWhere('description','like', '%' . $search5 . '%');
                    })->orderByDesc('created_at')->paginate(10);     
                }
                else{
                    $activityLogs = Activity::orderByDesc('created_at')->paginate(10);
    
                }
                return view('admin.filter_activity', compact('activityLogs')) ;

            }else{
                if($search5 != ''){
                    $activityLogs = Activity::where('subject_id','!=',1)->where(function($query) use($search5){
                        return $query
                    ->whereHas('subject', function ($q) use ($search5) {
                        $q->where('first_name', 'like', '%' . $search5 . '%')->orWhere('last_name', 'like', '%' . $search5 . '%');     
                    })
                    ->orwhereHas('causer', function ($q) use ($search5) {
                        $q->where('first_name', 'like', '%' . $search5 . '%')->orWhere('last_name', 'like', '%' . $search5 . '%');     
        
                    })           
                    ->orWhere('description','like', '%' . $search5 . '%');
                    })->orderByDesc('created_at')->paginate(10);     
                }
                else{
                    $activityLogs = Activity::where('subject_id','!=',1)->orderByDesc('created_at')->paginate(10);
    
                }

                return view('admin.filter_org_activity', compact('activityLogs')) ;

            }
            

        }
        if(Auth::user()->hasRole(8)){
            $activityLogs = Activity::orderByDesc('created_at')->paginate(10);
            return view('admin.activityLog',compact('activityLogs','general'));            
        }
            else{
                $activityLogs = Activity::where('subject_id','!=',1)->orderByDesc('created_at')->paginate(10);

                return view('admin.org_activityLog',compact('activityLogs','general')); 
            }        
    }

    public function delete(){
        $activityLogs = Activity::truncate();
        $url="/activity";
        return response()->json([
               'activityLogs' => $activityLogs,
               'status' => 200,
           ]);
    }
}
