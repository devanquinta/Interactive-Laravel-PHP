<?php

namespace App\Http\Middleware;

use App\Role;
use App\User;
use Closure;
// use App\Channel;
// use App\Http\Requests\TopicRequest;
// use App\Topic;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// use Illuminate\Support\Str;

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

        $role = Role::all();

        $rel = Role::find(2);
        $user = Auth::user($rel);
        $user->role_id;

        if (($user->role_id == 2) or ($user->role_id == 2)) {
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