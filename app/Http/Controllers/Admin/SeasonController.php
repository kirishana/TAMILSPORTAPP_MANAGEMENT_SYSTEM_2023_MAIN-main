<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Season;
use App\Models\Organization;
use DB;
use App\generalSetting;
use Illuminate\Support\Facades\Validator;
class SeasonController extends Controller
{
    public function index()
    {

        $seasons=Season::all();
       return response([
        'seasons'=>$seasons
       ]);
    }
public function season()
{
    $seasons=Season::all();
    $organizations=Organization::all();
    $general=generalSetting::first();
    return view('seasons.index', compact('organizations','seasons','general'));

}
   
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
             
                'name'                 => 'required|unique:seasonss',
            


            ],
            [
                'name.unique' => 'Season Name  Already Exists',
             


            ]

        );

        if ($validator->fails()) {
            return response()->json(['errors'=>$validator->errors()->all()]);
        }
        $season = Season::create(['name' => $request['name']]);
        return response()->json([
            'status'=>200,
            'season'=>$season
        ]);
    }
    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $season=Season::find($id);
        return response()->json([
            'status'=>200,
            'season'=>$season
        ]);

    }

    public function update(Request $request,$id)
    {
        $validator = Validator::make(
            $request->all(),
            [
             
                'name'                 => 'required|unique:seasonss',
            


            ],
            [
                'name.unique' => 'Season Name  Already Exists',
             


            ]

        );

        if ($validator->fails()) {
            return response()->json(['errors'=>$validator->errors()->all()]);
        }
        $season = Season::find($id);
        // Make sure you've got the Page model
        if($season) {
            $season->name = $request->input('name');
            $season->save();
        }
        return response()->json([
            'message'=>'updated'
        ]);
    }

    public function activate(Request $request)
    {
        $season=Season::find($request->input('id'));
        $season->status=0;
        $season->save();
        return response()->json([
            'message'=>'updated'
        ]);
    }

    public function deactivate(Request $request)
    {
        $season=Season::find($request->input('id'));
        $season->status=1;
        $season->save();
        return response()->json([
            'message'=>'updated'
        ]);
    }
    public function delete(Request $request)
    {
        $season=Season::find($request->input('id'));
        $clubCount = DB::table('clubs')->where('season_id', $season->id)->count();
        $organizationsCount = DB::table('organizations')->where('season_id', $season->id)->count();

        if($season->leagues()->count() >0 || $clubCount > 0 || $organizationsCount > 0){
            $season=Season::find($request->input('id'));
            $season->status=0;
            $season->save();
            $status=1;
            $message='Some leagues,clubs or organizations dependent on this season, So it has been disabled';
        }else{
            $season=Season::find($request->input('id'));
            $season->delete();
            $status=2;
            $message='Successfully Deleted';
        }
        return response()->json([
            'status'=>$status,
            'message'=>$message
        ]);
    }

}
