<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $fillable = [
        'hn_id', 'by', 'title', 'text', 'url', 'score', 'time',
    ];

    protected $casts = [
        'time' => 'datetime',
    ];
}
