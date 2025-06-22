<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use hasfactory;

    protected $fillable = [
        'title',
        'description',
        'image',
        'category_id',
        'slug',
        'user_id',
        'published_at',
    ];
}
