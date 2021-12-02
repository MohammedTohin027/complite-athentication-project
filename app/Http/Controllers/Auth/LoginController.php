<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Carbon\Carbon;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;
    protected function redirectTo()
    {
        if (Auth::user()->role_id != 2) {
            return route('admin.dashboard');
        } elseif (Auth::user()->role_id == 2) {
            return route('user.dashboard');
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    //  Google login
    public function redirectToGoogle(){
        return Socialite::driver('google')->redirect();
    }

    //  Google Callback
    public function callbackToGoogle(){
        $user = Socialite::driver('google')->user();
        $this->loginOrRegister($user);
        return redirect()->route('user.dashboard');
    }

    //  Facebook login
    public function redirectToFacebook(){
        return Socialite::driver('facebook')->redirect();
    }

    //  Facebook Callback
    public function callbackToFacebook(){
        $user = Socialite::driver('facebook')->user();
        $this->loginOrRegister($user);
        return redirect()->route('user.dashboard');
    }

    //  Login Or Register
    protected function loginOrRegister($data){
        $user = User::where('email', '=', $data->email)->first();

        if (!$user) {
            $user = new User();
            $user->name = $data->name;
            $user->email = $data->email;
            $user->image = $data->avatar;
            $user->provider_id = $data->id;
            $user->created_at = Carbon::now();
            $user->save();
        }
        Auth::login($user);
    }


}