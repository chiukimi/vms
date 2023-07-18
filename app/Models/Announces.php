<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announces  extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'stasus',
    ];

    protected $nullable = [
        'stasus',
    ];
}
