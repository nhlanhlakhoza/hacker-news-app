<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'hn_id',
        'by',
        'text',
        'parent',
        'kids',
        'time',
    ];
}
