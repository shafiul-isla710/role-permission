<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $roles = Role::with('Permissions')->latest()->get();

        return view('backend.pages.role.role', compact('roles'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissions = Permission::all();
        return view('backend.pages.role.createRole', ['permissions' => $permissions]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {



        $request->validate([
            'name' => 'required|unique:roles,name',
            'permission' => 'required'
        ]);
        $permissionId = array_map('intval', $request->input('permission'));
        $role = Role::create(['name' => $request->input('name')]);
        $role->syncPermissions($permissionId);
        flash()->success('Role Created Successfully');

        return redirect()->route('roles.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $permissions = Permission::all();
        $role = Role::with("Permissions")->find($id);
        $rolePermission = $role->permissions->pluck('id')->all();
        return view('backend.pages.role.edit', compact('role', 'permissions', 'rolePermission'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request->all());
        
        $request->validate([
            'name' => 'required|unique:roles,name,'.$id,
            'permission' => 'required'
        ]);
        $role = Role::find($id);
        $role->name = $request->input('name');
        $role->save();

        $permissionId = array_map('intval', $request->input('permission'));
        $role->syncPermissions($permissionId);
        flash()->success('Role Updated Successfully');
        return redirect()->route('roles.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function q(string $id)
    {
        Role::find($id)->delete();
         sweetalert()->success("Role Deleted Successfully");
        return redirect()->back();
    }
}
