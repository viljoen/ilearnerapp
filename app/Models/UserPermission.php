<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;


class UserPermission extends Model
{
    use HasFactory, LogsActivity;
    protected $fillable = ['role', 'route',];

    public static function routeNameList(){
        return[
            'dashboard' => 'Dashboard',
            'courses' => 'Courses',
            'course-show' => 'View Course',
            'medias' => 'Media Library',
            'users' => 'Users',
            'user-permissions' => 'User Permissions',
            'messenger' => 'iMessenger',
            'forum' => 'iForum',
            'blogpost' => 'iBlog',
            'todo' => 'iDo',
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
