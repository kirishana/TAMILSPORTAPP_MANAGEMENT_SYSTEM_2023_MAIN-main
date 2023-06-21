<?php

namespace App\Http\Controllers\Admin;

use App\Country;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Datatable;

class selectFilterController extends Controller
{
    public function typeaheadIndex()
    {
        return view('admin.examples.selectfilter');
    }
    

    public function store(Country $country, Request $request)
    {
        $val =$request->newTag;
        if (is_numeric($val)){
            return false;
        }
        $check = Country::where('name',$request->newTag)->first();
        if ($check === null) {
            $country->name = $request->newTag;
            $country->countri_id = $request->newTag;
            $country->save();
        }
    }
}
