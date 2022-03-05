<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;
use Te7aHoudini\LaravelTrix\Traits\HasTrixRichText;

class Todo extends Model
{
    use HasFactory,HasTrixRichText,LogsActivity,SoftDeletes;
    protected $guarded = [];

    protected $table = 'todos';


    public static function search($search)
    {
        return empty($search) ? static::query()
            : static::query()->where('id', 'like', '%'.$search.'%')
                ->orWhere('name', 'like', '%'.$search.'%')
                ->orWhere('description', 'like', '%'.$search.'%');
    }
}
