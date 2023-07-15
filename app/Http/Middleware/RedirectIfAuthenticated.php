<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string|null  ...$guards
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                // dd(Role::get());
                // $role_id =User::where("id", Auth::user()->id)->with('model_has_roles')->first()->model_has_roles->role_id;
                // $role = Role::findOrFail($role_id)->name;
                // dd(Auth::user()->id);
                if($request->is('admin/*')){
                    return redirect(RouteServiceProvider::ADMINHOME);
                }else{
                return redirect(RouteServiceProvider::HOME);
                }
            }
        }

        return $next($request);
    }
}
