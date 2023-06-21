<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Spatie\Permission\Exceptions\UnauthorizedException;
use Auth;
class PermissionMiddle
{
   
    public function handle(Request $request, Closure $next,$permission = null, $guard = null)
    {
        $authGuard = app('auth')->guard($guard);

        if ($authGuard->guest()) {
            throw UnauthorizedException::notLoggedIn();
        }

        if (! is_null($permission)) {
            $permissions = is_array($permission)
                ? $permission
                : explode('|', $permission);
        }

        if ( is_null($permission) ) {
            $permission =Auth::user()->getAllPermissions();

            $permissions = array($permission);
            // dd($permissions);   
        }


        foreach ($permissions as $permission) {
            // dd($permission);
            if ($authGuard->user()->can('Create-league')) {
                return $next($request);
            }
        }
        throw UnauthorizedException::forPermissions($permissions);

    }
}
