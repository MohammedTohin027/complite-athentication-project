<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class SubAdminController extends Controller
{
    //  view
    public function index(){
        $users = User::where('role_id', '!=', 2)->latest()->get();
        $roles = Role::where('id', '!=', 2)->latest()->get();
        return view('admin.subadmin.index', compact('users', 'roles'));
    }

    //  Store
    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:Users,email',
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required',
            'role_id' => 'required',
        ],[
            'name.required' => 'The name field is required',
            'email.required' => 'The email field is required',
            'passeword.required' => 'The password field is required',
            'password_confirmation.required' => 'The confirm password field is required',
            'role_id.required' => 'The Role name field is required',
        ]);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => $request->role_id,
            'image' => 'uploads/profile/avater.jpg',
        ]);
        $notification = [
            'message' => 'Subadmin Created Successfully!',
            'alert-type' => 'success',
        ];
        return redirect()->back()->with($notification);
    }

    //  edit
    public function edit($id){
        $user = User::findOrFail($id);
        $roles = Role::where('id', '!=', 2)->latest()->get();
        return view('admin.subadmin.edit', compact('user', 'roles'));
    }

    //  update
    public function update(Request $request, $id){
        $user = User::findOrFail($id);
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email,'.$id,
            'role_id' => 'required',
        ],[
            'name.required' => 'The name field is required',
            'email.required' => 'The email field is required',
            'role_id.required' => 'The Role name field is required',
        ]);
        if ($request->password == null) {
            $request['password'] = $user->password;
        }
        else {
            $request['password'] = Hash::make($request->password);
        }
        User::findOrFail($id)->update($request->all());
        $notification = [
            'message' => 'Subadmin Updated Successfully!',
            'alert-type' => 'success',
        ];
        return redirect()->route('subadmin.index')->with($notification);
    }

    //  delete
    public function delete($id){
        User::findOrFail($id)->delete();
        $notification = [
            'message' => 'Subadmin Deleted Successfully!',
            'alert-type' => 'success',
        ];
        return redirect()->back()->with($notification);

   }
}
