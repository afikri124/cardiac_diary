<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    public $table = "activity";
    use HasFactory;
    protected $fillable = [
        'activity',
        'date_time',
        'oxygen_lvl',
        'bloodpressure_sys',
        'bloodpressure_dia',
        'user_id'
    ];
}
