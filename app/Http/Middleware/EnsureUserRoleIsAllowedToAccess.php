<?php

namespace App\Http\Middleware;

use App\Models\UserPermission;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;

class EnsureUserRoleIsAllowedToAccess
{
    /**
     * dashboard, courses
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        try{

            echo 'The middleware is running whenever and http request is made.<br>';

            $currentRouteName = Route::currentRouteName();
            echo 'CurrentRouteName: '. $currentRouteName. '<br>';

            $userRole = auth()->user()->role;
            echo 'UserRole: '. $userRole.'<br>';


            if ( UserPermission::isRoleHaveRighToAccess($userRole, $currentRouteName)
                || in_array($currentRouteName, $this->defaultUserAccessRole()[$userRole])){
                return $next($request);
            } else {
                abort(403,"You are not allowed to access this page");
            }

        } catch (\Throwable $th){
            abort(403,"You are not allowed to access this page");
        }




    }

    private function defaultUserAccessRole(){
        return[

            'admin' => [

                'user-permissions',
            ],

        ];
    }
}
