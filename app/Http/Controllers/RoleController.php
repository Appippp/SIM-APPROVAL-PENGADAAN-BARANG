<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::all();

        return view('pages.management-access.role.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.management-access.role.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => [
                'required',
                'string',
                'unique:roles,name'
            ]
        ]);

        Role::create([
            'name' => $request ->name
        ]);

        return redirect()->route('roles.index')->with('success','Role Created Successfully');
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
        $roles = Role::find($id);
        return view('pages.management-access.role.edit', compact('roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $roles = Role::findOrFail($id);

        $request->validate([
            'name' => [
                'required',
                'string',
                'unique:roles,name,'. $roles->id
            ]
        ]);

        $roles->update([
            'name' => $request ->name
        ]);

        return redirect()->route('roles.index')->with('success','Role Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $roles  = Role::find($id);
        
        
        $roles ->delete();
        return redirect()->route('roles.index')->with('success', 'Role deleted successfully');
    }

    public function addPermissionToRole($id)
    {
        $permissions = Permission::get();
        $role  = Role::findOrFail($id);
        $rolePermissions= DB::table('role_has_permissions')->where('role_has_permissions.role_id', $role->id)->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')->all();
        return view('pages.management-access.role.add-permission', ['role' => $role, 'permissions' => $permissions, 'rolePermissions' => $rolePermissions]);

    }

    public function givePermissionToRole(Request $request, $id)
    {
        $request->validate([
            'permission' => 'required'
        ]);

        $role  = Role::findOrFail($id);
        $role->syncPermissions($request->permission);

        return redirect()->back()->with('success','Permissions added to role');

    }
}
