<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class UserPermission extends Model
{
    use HasFactory;
    protected $fillable = ['role', 'route',];

    public static function routeNameList(){
        return[
            'dashboard' => 'Dashboard',
            'courses' => 'Courses',
            'users' => 'Users',
            'user-permissions' => 'User Permissions',
            'messenger' => 'iMessenger'
        ];
    }

    public static function isRoleHaveRighToAccess($userRole, $route){
        try{
            $model = static::where('role', $userRole)
                ->where('route',$route)
                ->first();

            return $model ? true : false;
        }catch (\Throwable $th){
            return false;
        }
    }
}
