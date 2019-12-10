<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArticleImage extends Model
{
    protected $fillable = [
        'name', 'ext', 'path', 'article_id',
    ];

    /**
     * Get the post that owns the comment.
     */
    public function article()
    {
        return $this->belongsTo('App\Models\Article');
    }
}
