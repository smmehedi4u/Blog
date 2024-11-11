<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'image',
        'name',
        'user_id',
        'post_status',
        'user_type',
    ];

    // Relationship to User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}



