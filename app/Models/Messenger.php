<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Messenger extends Model
{
    use HasFactory,LogsActivity;
    protected $fillable = [
        'room_id',
        'user_id',
        'message',
    ];
}
