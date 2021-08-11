<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Te7aHoudini\LaravelTrix\Traits\HasTrixRichText;

class Course extends Model
{
    use HasTrixRichText;
    use HasFactory, LogsActivity;
    protected $guarded = [];

    protected static $logAttributes = ['name', 'slug'];
    protected static $logName = 'course';

}
