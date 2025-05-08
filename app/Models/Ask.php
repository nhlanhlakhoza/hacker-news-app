<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ask extends Model
{
    protected $fillable = [
        'hn_id',
        'by',
        'title',
        'text',
        'score',
        'time',
    ];
}
