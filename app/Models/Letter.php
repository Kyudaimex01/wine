<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Letter extends Model
{
    protected $fillable = [
        'letter_greeting', 'letter_content', 'letter_farewell', 'user_id', 'area_id',
    ];

     /**
     * Get the comments for the blog post.
     */
    public function images()
    {
        return $this->hasMany('App\Models\Image');
    }

    /**
     * Get the post that owns the comment.
     */
    public function area()
    {
        return $this->belongsTo('App\Models\Area');
    }

    /**
     * Get the post that owns the comment.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
