<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\User;
use App\Channel;
use App\Http\Requests\TopicRequest;
use App\Topic;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AcessControlMiddleware
{
    use AuthorizesRequests;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure                 $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // $role = Role::get('role', 'ROLE_ROOT');
        // $su = Role::where('role', 'ROLE_USER_SU');        
        // // dd($role[1]->role);
        // $auth = User::find(Auth::user());
        // $user = User::all();
        $role = Role::all();
        // $r = Role::find(2)->where(Auth::user()->id);
        // dd($r);
        // $r =  Role::where('role', 'ROLE_ROOT', Auth::check());
        // dd(Auth::user()->role());

        
        // $user = Auth::user()->isRoot();
        $rel = Role::find(2);
        $user =Auth::user($rel);
        $user->role_id;
       
        if (($user->role_id == 2) or ($user->role_id == 2))   {
            $ignoreResources = config('accessRoot')['ignore.roles'];

            if (!in_array($request->route()->getName(), $ignoreResources)) {
                $this->authorize($request->route()->getName());
            }
            return $next($request);
        } else {
            $ignoreResources = config('accessControlList')['ignore.resources'];

            if (!in_array($request->route()->getName(), $ignoreResources)) {
                $this->authorize($request->route()->getName());
            }
            return $next($request);

        }
    }
}
