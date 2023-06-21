<?php

namespace App\Http\Controllers\Admin;

use App\Datatable;
use App\Jtable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Response;

class JtableController extends Controller
{
    public function index(Request $request)
    {

        $count = Datatable::all()->count();
        $order = explode(" ", $request->get('jtSorting'));
        if($request->firstname && $request->lastname == ''){
            $data = Datatable::where('firstname',$request->firstname)->orderBy($order[0], $order[1])
                ->take($request->get('jtPageSize'))
                ->skip($request->get('jtStartIndex'));
        }else if($request->firstname == '' && $request->lastname){
            $data = Datatable::where('lastname',$request->lastname)->orderBy($order[0], $order[1])
                ->take($request->get('jtPageSize'))
                ->skip($request->get('jtStartIndex'));
        }
        else if($request->firstname && $request->lastname){
            $data = Datatable::where('firstname',$request->firstname)->where('lastname',$request->lastname)->orderBy($order[0], $order[1])
                ->take($request->get('jtPageSize'))
                ->skip($request->get('jtStartIndex'));
        }
        else{
        $data = Datatable::orderBy($order[0], $order[1])
            ->take($request->get('jtPageSize'))
            ->skip($request->get('jtStartIndex'));
        }

        return Response::json(array(
            'Result' => 'OK',
            'TotalRecordCount' => $count,
            'Records' => $data->get()->toArray()
        ));

    }
    public function store( Request $request)
    {
        info($request->all());
        $data = new Datatable($request->all());
        if($data->save() )
        {
            info($data);
            $jTableResult = [];
            $jTableResult['Result'] = "OK";
            $jTableResult['Record'] = $data;
            return $jTableResult;
        }
    }
    public function update(Request $request)
    {
        info($request->all());
        $id = $request->id;
        $data = Datatable::find($id);
        $data->update($request->all());
        return [
            'Result'=>'OK'
        ];

    }
    public function destroy(Request $request)
    {
        info('delete');
        info($request->all());
            $data = Datatable::find($request->id);
            if ($data->delete()) {
                return [
                    'Result' => 'OK'
                ];
            }
    }
}