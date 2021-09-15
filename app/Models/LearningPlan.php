<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
   @property varchar $name name
@property longtext $overview overview
@property tinyint $isActive isActive
@property bigint unsigned $course_id course id
@property bigint unsigned $created_by created by
@property bigint unsigned $team_id team id
@property timestamp $deleted_at deleted at
@property timestamp $created_at created at
@property timestamp $updated_at updated at
@property Team $team belongsTo
@property CreatedBy $user belongsTo
@property Course $course belongsTo
   
 */
class LearningPlan extends Model 
{
    
    /**
    * Database table name
    */
    protected $table = 'learning_plans';

    /**
    * Mass assignable columns
    */
    protected $fillable=['name',
'overview',
'isActive',
'course_id',
'created_by',
'team_id'];

    /**
    * Date time columns.
    */
    protected $dates=[];

    /**
    * team
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function team()
    {
        return $this->belongsTo(Team::class,'team_id');
    }

    /**
    * createdBy
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function createdBy()
    {
        return $this->belongsTo(User::class,'created_by');
    }

    /**
    * course
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function course()
    {
        return $this->belongsTo(Course::class,'course_id');
    }




}