<?php

namespace App\Http\Middleware;

use App\Models\User;
use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        //  user Banned or Unbanned
        if (Auth::check() && Auth::user()->isban) {
            $banned = Auth::user()->isban == 1;
            Auth::logout();
            if ($banned) {
                $notification = [
                    'message' => 'Your Account has been Banned! Please Contact Admin',
                    'alert-type' => 'error',
                ];
                return redirect()->route('login')->with($notification);
                // return redirect()->route('login')->with(['message' => 'Your Account has been Banned! Please Contact Admin', 'alert-type' => 'error']);
            }
        }

        //  User Online or Offline
        if(Auth::check()){
            $expireTime = Carbon::now()->addSeconds(90);
            Cache::put('user-is-online' . Auth::id(), true, $expireTime);
            User::findOrFail(Auth::id())->update([
                'last_seen' => Carbon::now(),
            ]);
        }

        if(Auth::check() && Auth::user()->role_id == 2){
            return $next($request);
        }
        else{
            return redirect()->route('login');
        }

    }
}
