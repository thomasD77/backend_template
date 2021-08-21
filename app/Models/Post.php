<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'photo_id',
        'postcategory_id',
        'user_id',
        'title',
        'slug',
        'body',
        'book',
        'archived',
    ];

    public function postcategory()
    {
        return $this->belongsTo(PostCategory::class);
    }

    public function photo()
    {
        return $this->belongsTo(Photo::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
