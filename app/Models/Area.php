<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'slug', 'description',
    ];

    /**
     * Get the comments for the blog post.
     */
    public function letters()
    {
        return $this->hasMany('App\Models\Letter');
    }

    /**
     * Get the comments for the blog post.
     */
    public function users()
    {
        return $this->hasMany('App\Models\User');
    }
}
