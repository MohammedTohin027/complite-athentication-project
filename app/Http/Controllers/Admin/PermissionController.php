<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Permission;
use App\Models\Role;

class PermissionController extends Controller
{
     //  view
     public function index(){
        $permissions = Permission::latest()->get();
        return view('admin.permission.index', compact('permissions'));
    }

     //  create
     public function create(){
        $roles = Role::where('id', '!=', 2)->latest()->get();
        return view('admin.permission.create', compact('roles'));
    }

    //  Store
    public function store(Request $request){
        $request->validate([
            'role_id' => 'required|unique:permissions,role_id',
        ],[
            'role_id.required' => 'The role name field id required',
        ]);
        Permission::create($request->all());
        $notification = [
            'message' => 'Permission Created Successfully!',
            'alert-type' => 'success',
        ];
        return redirect()->route('permission.index')->with($notification);
    }

    //  edit
    public function edit($id){
        $roles = Role::where('id', '!=', 2)->latest()->get();
        $permission = Permission::findOrFail($id);
        return view('admin.permission.edit', compact('permission', 'roles'));
    }

    //  update
    public function update(Request $request, $id){
        $request->validate([
            'role_id' => 'required|unique:permissions,role_id,'.$id
        ],[
            'role_id.required' => 'The role name field id required',
        ]);
        Permission::findOrFail($id)->update($request->all());
        $notification = [
            'message' => 'Permission Updated Successfully!',
            'alert-type' => 'success',
        ];
        return redirect()->route('permission.index')->with($notification);
    }

    //  delete
    public function delete($id){
        Permission::findOrFail($id)->delete();
        $notification = [
            'message' => 'Permission Deleted Successfully!',
            'alert-type' => 'success',
        ];
        return redirect()->back()->with($notification);
    }
}
