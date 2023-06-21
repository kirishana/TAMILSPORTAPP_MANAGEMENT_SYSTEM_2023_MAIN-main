<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AgeGroup;
use Auth;
use Session;
use App\CustomClasses\ColectionPaginate;
class AgeGroupController extends Controller
{
    public function agegroup(Request $request)
    {
        $id = Session::get('id');
        if ($request->ajax()) {
            $search = $request->get('query') ? $request->get('query') : '';
            $sorttype = $request->get('sorttype');
            $sortBy = $request->get('sortby');
            Session::put('sorttype', $sorttype);
            Session::put('sortBy', $sortBy);
            if ($request->get('query')) {
                
                if($sortBy){
               
                    $AgeGroups1 = AgeGroup::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->get();
                    $AgeGroups2=array();
                    foreach($AgeGroups1 as $ageGroup){
                        $exp = preg_split("/-/", $ageGroup->name);
                                                                    if (isset($exp[1])) {
                                                                        if (($exp[0] < $search) && ($exp[1] == $search || $exp[1] > $search)) {
                                                                            $AgeGroups2[]=$ageGroup;
                                                        }
                                                    }
                                                    if ($exp[0] == $search) {
                                                        $AgeGroups2[]=$ageGroup;
                                                    }
                    }
                    if($sorttype =="asc"){

                        $AgeGroups3=collect($AgeGroups2)->sortBy('name');
                    }
                    else if($sorttype =="desc"){
                    $AgeGroups3=collect($AgeGroups2)->sortByDesc('name');
                    }
                
                     
                    

                  $AgeGroups=ColectionPaginate::paginate($AgeGroups3, 10);
                  
                }else{
                   
                $AgeGroups1 = AgeGroup::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->get();
                $AgeGroups2=array();
                foreach($AgeGroups1 as $ageGroup){
                    $exp = preg_split("/-/", $ageGroup->name);
                                                                if (isset($exp[1])) {
                                                                    if (($exp[0] < $search) && ($exp[1] == $search || $exp[1] > $search)) {
                                                                        $AgeGroups2[]=$ageGroup;
                                                    }
                                                }
                                                if ($exp[0] == $search) {
                                                    $AgeGroups2[]=$ageGroup;
                                                }
                }
                $AgeGroups3=collect($AgeGroups2);
              $AgeGroups3->sortByDesc('name');
              $AgeGroups=ColectionPaginate::paginate($AgeGroups3, 10);
              
                }
            } else {
                if($sortBy){
                    $AgeGroups = AgeGroup::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->orderBy($sortBy,$sorttype)->paginate(10);
                }else{
                $AgeGroups = AgeGroup::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->orderBy('id','asc')->paginate(10);
                }
                
                // $AgeGroups = AgeGroup::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->paginate(10);

                // return response()->json(['html' => $view]);
            }
            return view('admin.agegroup.table', compact('AgeGroups'));

        } else {

            $AgeGroups = AgeGroup::where('organization_id', Auth::user()->organization ? Auth::user()->organization->id : $id)->orderBy('id','asc')->paginate(10);
            return view('admin.agegroup.index', compact('AgeGroups'));
        }
    }
    
    public function index(Request $request)
    {
        $id = Session::get('id');
        $AgeGroups = AgeGroup::where('organization_id', Auth::user()->organization ? Auth::user()->organization->id : $id)->orderBy(
            'name',
            'asc'
        )->paginate(5);
    }

    public function store(Request $request)
    {
        $id = Session::get('id') ? Session::get('id') : '';
         $names = AgeGroup::where('organization_id', Auth::user()->organization ? Auth::user()->organization->id : $id)->where('status', 1)->get();
        $age = preg_split("/-/", $request->input('name'));

        if (count($names) > 0) {
            for ($i = 0; $i < count($names); $i++) {


                $exp = preg_split("/-/", $names[$i]->name);
                //    dd(($exp[0] == $request->input('name')||$exp[0] < $request->input('name')) && ($exp[1] == $request->input('name') || $exp[1] > $request->input('name')));
                if ($names[$i]->name == $request->input('name')) {
                    return response()->json(['errors' => "Age already exists"]);
                }
                // if (isset($exp[1])) {
                //     if (isset($age[1])) {
                //         if (($exp[0] < $age[0] && $exp[1] > $age[0])) {
                //             return response()->json(['errors' => "Age already exists"]);
                //         }
                //     } elseif (($exp[0] == $request->input('name') || $exp[0] < $request->input('name')) && ($exp[1] == $request->input('name') || $exp[1] > $request->input('name'))) {
                //         return response()->json(['errors' => "Age already exists"]);
                //     }
                // } elseif ($exp[0]) {
                //     if (isset($age[1])) {
                //         if ($exp[0] == $age[0] || $exp[0] > $age[0]) {
                //             return response()->json(['errors' => "Age already exists"]);
                //         }
                //     }
                // }
            }


            $AgeGroup = new AgeGroup;

            $AgeGroup->name = $request->input('name');
            $AgeGroup->organization_id = Auth::user()->organization_id ? Auth::user()->organization_id : $id;
            $AgeGroup->save();
            $message="AgeGroup Successfully Created";

            return response()->json([
                'status' => 200,
                'AgeGroup' => $AgeGroup,
                'message' => $message
            ]);
        } else {
            $AgeGroup = new AgeGroup;

            $AgeGroup->name = $request->input('name');
            $AgeGroup->organization_id = Auth::user()->organization_id ? Auth::user()->organization_id : $id;
            $AgeGroup->save();
            $message="AgeGroup Successfully Created";

            return response()->json([
                'status' => 200,
                'AgeGroup' => $AgeGroup,
                'message' => $message
            ]);
        // }
    }
    }
    public function delete(Request $request)
    {
        $ageGroup=AgeGroup::find($request->input('id'));
        if($ageGroup->events()->count() > 0) {
            $ageGroup=AgeGroup::find($request->input('id'));
            $ageGroup->status=0;
            $ageGroup->save();
            $status=1;
            $message='Some Events dependent on this AgeGroup ,So it has been disabled';
     
    } else {
        $ageGroup=AgeGroup::find($request->input('id'));
        $ageGroup->delete();
        $status=0;
        $message='Deleted successfully';
       
    }
    return response()->json([
        'status' => $status,
        'message' => $message
    ]);
    }

    public function edit($id)
    {
        $AgeGroup = AgeGroup::find($id);
        return response()->json([
            'status' => 200,
            'AgeGroup' => $AgeGroup
        ]);
    }

    public function update(Request $request, $id)
    {

        $AgeGroup = AgeGroup::find($id);
        // Make sure you've got the Page model
        if ($AgeGroup) {
            $AgeGroup->name = $request->input('data');
            $AgeGroup->save();
        }
        $message="AgeGroup Successfully Created";
        return response()->json([
            'message' => $message
        ]);
    }

    public function activate(Request $request)


    
    {
        $AgeGroup = AgeGroup::find($request->input('id'));
        $AgeGroup->status = 0;
        $AgeGroup->save();
        return response()->json([
            'message' => 'updated'
        ]);
    }

    public function deactivate(Request $request)
    {
        $AgeGroup = AgeGroup::find($request->input('id'));
        $AgeGroup->status = 1;
        $AgeGroup->save();
        return response()->json([
            'message' => 'updated'
        ]);
    }
    public function search(Request $request)
    {
        // $id = Session::get('id');

        // $search = $request->get('query');
        // Session::put('search', $search);

        // if ($search != '') {
        //     $AgeGroups = AgeGroup::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->where('name', 'LIKE', '%' . $search . '%')
        // ->paginate(5);
        // } else {
        //     $AgeGroups = AgeGroup::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->paginate(5);
        // }



        // $view = view('admin.agegroup.table', compact('AgeGroups'))->render();

        // return response()->json(['html' => $view]);
    }
}