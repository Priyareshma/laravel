<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $fillable = [
        'start_time',
        'emp_id',
    ];

    protected $casts = [
        'start_time' => 'datetime',
    ];
}
