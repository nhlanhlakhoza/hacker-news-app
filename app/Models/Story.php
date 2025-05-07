<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    protected $fillable = [
        'hn_id',
        'by',
        'title',
        'type',
        'url',
        'score',
        'descendants',
        'kids',
        'time',
    ];
}
