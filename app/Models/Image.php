<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
	protected $fillable = [
        'name', 'ext', 'path', 'letter_id',
    ];

    /**
     * Get the post that owns the comment.
     */
    public function letter()
    {
        return $this->belongsTo('App\Models\Letter');
    }
}
