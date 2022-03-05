<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;
use Te7aHoudini\LaravelTrix\Traits\HasTrixRichText;

class Forum extends Model
{
    use HasFactory;
    use HasTrixRichText;
    use HasFactory, LogsActivity,SoftDeletes;

    protected $guarded = [];

    protected $table = 'forums';
    /**
     *
    protected static $logAttributes = ['name', 'slug'];
    protected static $logName = 'course';
     */

    /**
     * Adding golabl scope to always return results related
     * to current logged in user's team
     */

    public static function boot (){

        parent::boot();

        static::addGlobalScope('created_user_team', function(Builder $builder){
            if (auth()->check()){
                return $builder->where('team_id', auth()->user()->currentTeam->id);
            }
        });


    }


    /**
     * adding the relationship for the created_by field
     * Stating that it links to the User class
     * @return mixed

    public function user(){
        return $this->belongsTo(User::class, 'created_by');
    }
     */

    /**
     * adding the relationship for the created_by field
     * Stating that it links to the User class
     * @return mixed

    public function team(){
        return $this->belongsTo(Team::class, 'team_id');
    }
     */
    public static function search($search)
    {
        return empty($search) ? static::query()
            : static::query()->where('id', 'like', '%'.$search.'%')
                ->orWhere('name', 'like', '%'.$search.'%')
                ->orWhere('slug', 'like', '%'.$search.'%');
    }







}
