<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\User;
use App\Models\Organization;
use App\generalSetting;
use DB;
use Illuminate\Support\Str;

class RolesController extends Controller
{

    public function index()
    {
        $roles = Role::whereNotIn('name', ['SuperAdmin'])->get();
        return response([
            'roles' => $roles
        ]);
    }

    public function role()
    {
        $organizations = Organization::all();
        $general = generalSetting::first();

        $roles = Role::all();
        return view('admin.roles.index', compact('organizations', 'roles', 'general'));
    }
    public function store(Request $request)
    {
        $role = Role::create([
            'name' => $request['data'],
            'slug'             => Str::slug($request['data'], '-'),
        ]);
        return response()->json([
            'status' => 200,
            'role' => $role
        ]);
    }
    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $role = Role::find($id);
        return response()->json([
            'status' => 200,
            'role' => $role
        ]);
    }

    public function update(Request $request, $id)
    {

        $page = Role::find($id);
        // Make sure you've got the Page model
        if ($page) {
            $page->name = $request->input('data');
            $page->save();
        }
        return response()->json([
            'message' => 'updated'
        ]);
    }


    public function destroy($id)
    {
        //
    }
    public function activate(Request $request)
    {
        $role = Role::find($request->input('id'));
        $role->status = 0;
        $role->save();
        return response()->json([
            'message' => 'updated'
        ]);
    }

    public function deactivate(Request $request)
    {
        $role = Role::find($request->input('id'));
        $role->status = 1;
        $role->save();
        return response()->json([
            'message' => 'updated'
        ]);
    }
    public function permission($id)
    {

        $organizations = Organization::all();
        $general = generalSetting::first();

        $permissionGroups = Permission::select('group_name')->groupBy('group_name')->get();
        $role = Role::find($id);
        return view('admin.roles.permission', compact('organizations', 'role', 'general'));
    }

    public function permissionStore(Request $request, $id)
    {
        $role = Role::find($id);
        $role->syncPermissions($request->input('permission'));
        $tab = $request->get('tab');
        return redirect()->back();
    }
}
