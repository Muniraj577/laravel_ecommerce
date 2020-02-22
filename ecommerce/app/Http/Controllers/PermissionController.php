<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:permission-list');
        $this->middleware('permission:permission-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:permission-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:permission-delete', ['only' => ['destroy']]);
    }


    public function index()
    {
        $permissions = Permission::all();
        return view('admin.permissions.index', compact('permissions'));
    }


    public function create()
    {
        $roles = Role::get();
        return view('admin.permissions.create', compact('roles'));
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:40',
        ]);

        $name = $request['name'];
        $permission = new Permission();
        $permission->name = $name;

        $roles = $request['roles'];

        $permission->save();

        if (!empty($request['roles'])) {
            foreach ($roles as $role) {
                $r = Role::where('id', '=', $role)->firstOrFail();
                $permission = Permission::where('name', '=', $name)->first();
                $r->givePermissionTo($permission);
            }
        }
        return redirect()->route('permissions.index')->with('success', 'Permission'. ' ' . $permission->name.' added!');
    }

    public function edit($id)
    {
        $permission = Permission::findOrFail($id);
        return view('admin.permissions.edit', compact('permission'));
    }


    public function update(Request $request, $id)
    {
        $permission = Permission::findOrFail($id);
        $this->validate($request, [
            'name' => 'required|max:40',
        ]);
        $input = $request->all();
        $permission->update($input)->save();

        return redirect()->route('permissions.index')->with('success', 'Permission'. $permission->name.' updated!');
    }


    public function destroy($id)
    {
        $permission = Permission::findOrFail($id);

        $permission->delete();

        return redirect()->route('permissions.index')
            ->with('success', 'Permission deleted!');
    }
}
