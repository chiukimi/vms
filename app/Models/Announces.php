<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announces  extends Model
{
    use HasFactory;

    protected $fillable = [
        'author',
        'title',
        'banner',
        'content',
        
    ];

    protected $nullable = [
        'stasus',
    ];
}
