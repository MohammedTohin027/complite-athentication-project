<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    //  view
    public function index(){
        $roles = Role::where('id', '!=', 2)->latest()->get();
        return view('admin.role.index', compact('roles'));
    }

    //  Store
    public function store(Request $request){
        $request->validate([
            'name' => 'required|unique:roles,name',
        ],[
            'name.required' => 'The role name field id required',
        ]);
        Role::create($request->all());
        $notification = [
            'message' => 'Role Created Successfully!',
            'alert-type' => 'success',
        ];
        return redirect()->route('role.index')->with($notification);
    }

    //  edit
    public function edit($id){
        $role = Role::findOrFail($id);
        return view('admin.role.edit', compact('role'));        
    }

    //  update
    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required|unique:roles,name,'.$id
        ],[
            'name.required' => 'The role name field id required',
        ]);
        Role::findOrFail($id)->update($request->all());
        $notification = [
            'message' => 'Role Updated Successfully!',
            'alert-type' => 'success',
        ];
        return redirect()->route('role.index')->with($notification);
    }

    //  delete
    public function delete($id){
        Role::findOrFail($id)->delete();
        $notification = [
            'message' => 'Role Deleted Successfully!',
            'alert-type' => 'success',
        ];
        return redirect()->back()->with($notification);
    }
    

    
}