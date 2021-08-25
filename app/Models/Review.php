<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'post_id',
        'user_id',
        'avatar_id',
        'is_active',
        'body',
    ];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function avatar()
    {
        return $this->belongsTo(Avatar::class);
    }

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }
}
