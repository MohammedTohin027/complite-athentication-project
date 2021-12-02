<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class AdminController extends Controller
{
    //  Dasboard
    public function index(){
        return view('admin.home');
    }

    //  view Profile
    public function viewProfile()
    {
        return view('admin.profile.profile-view');
    }

    //  All User View
    public function allUser(){
        $users = User::where('role_id', '!=', 1)->orderBy('id', 'DESC')->get();
        return view('admin.user.view', compact('users'));
    }

    //  Banned User
    public function userBanned($id){
        User::findOrFail($id)->update([
            'isban' => 1,
            'updated_at' => Carbon::now(),
        ]);
        $notification = [
            'message' => 'User Banned Successfully',
            'alert-type' => 'error',
        ];
        return redirect()->back()->with($notification);
    }

    //  Banned User
    public function userUnbanned($id){
        User::findOrFail($id)->update([
            'isban' => 0,
            'updated_at' => Carbon::now(),
        ]);
        $notification = [
            'message' => 'User Unbanned Successfully',
            'alert-type' => 'success',
        ];
        return redirect()->back()->with($notification);
    }


    //  Update Profile Info
    public function updateProfileInfo(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email,'.auth()->id(),
            'phone' => 'required',
        ]);
        User::findOrFail(Auth::id())->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'updated_at' => Carbon::now(),
        ]);
        $notification = [
            'message' => 'Profile Successfully Updated',
            'alert-type' => 'success',
        ];
        return redirect()->back()->with($notification);
    }

    //  Change Profile Image
    public function changeImage()
    {
        return view('admin.profile.change-image');
    }

    //  Update Profile Image
    public function updateImage(Request $request)
    {
        $old_image = $request->old_image;
        if (Auth::user()->image == 'uploads/profile/avater.jpg') {
            $image = $request->file('image');
            $image_ex = $image->getClientOriginalExtension();
            $name_gen = dechex(uniqid()) . octdec(uniqid()) . '.' . $image_ex;
            $save_url = 'uploads/profile/' . $name_gen;

            User::findOrFail(Auth::id())->update([
                'image' => $save_url,
                'updated_at' => Carbon::now(),
            ]);
            Image::make($image)->resize(300, 300)->save($save_url);
            $notification = [
                'message' => 'Image Successfully Uploaded!',
                'alert-type' => 'success',
            ];
            return redirect()->route('view.profile')->with($notification);
        } else {
            unlink($old_image);
            $image = $request->file('image');
            $image_ex = $image->getClientOriginalExtension();
            $name_gen = dechex(uniqid()) . octdec(uniqid()) . '.' . $image_ex;
            $save_url = 'uploads/profile/' . $name_gen;

            User::findOrFail(Auth::id())->update([
                'image' => $save_url,
            ]);
            Image::make($image)->resize(300, 300)->save($save_url);
            $notification = [
                'message' => 'Image Successfully Uploaded!',
                'alert-type' => 'success',
            ];
            return redirect()->route('view.profile')->with($notification);
        }
    }

    //  Change Profile Password
    public function changePassword()
    {
        return view('admin.profile.change-password');
    }

    //  Update Profile Password
    public function updatePassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|min:8',
            'password_confirmation' => 'required|min:8',
        ], [
            'old_password.required' => 'The old password field is required',
            'new_password.required' => 'The new password field is required',
            'password_confirmation.required' => 'The confirmation password field is requirerequired',
        ]);
        $db_pass = Auth::user()->password;
        $old_pass = $request->old_password;
        $new_pass = $request->new_password;
        $confirm_pass = $request->password_confirmation;
        if (Hash::check($old_pass, $db_pass)) {
            if ($new_pass == $confirm_pass) {
                User::findOrFail(Auth::id())->update([
                    'password' => Hash::make($new_pass),
                    'updated_at' => Carbon::now(),
                ]);
                Auth::logout();
                $notification = [
                    'message' => 'Your password updated successfuly! Now login new password.',
                    'alert-type' => 'success',
                ];
                return redirect()->route('login')->with($notification);
            } else {
                $notification = [
                    'message' => 'New password & confirm password does not match',
                    'alert-type' => 'error',
                ];
            }
        } else {
            $notification = [
                'message' => 'Current password does not match in records',
                'alert-type' => 'error',
            ];
        }
        return redirect()->back()->with($notification);
    }
}
