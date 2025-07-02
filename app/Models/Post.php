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

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function readTime($wordsPerMinute = 150)
    {
        $post_size = str_word_count(strip_tags($this->description));
        $read_time = ceil($post_size/$wordsPerMinute);
        return max(1, $read_time);
    }

    public function category(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function likes(){
        return $this->hasMany(Like::class);
    }

}
