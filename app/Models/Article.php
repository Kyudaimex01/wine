<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'article_title','article_author','article_keywords','article_content','article_bibliography','path','user_id'
    ];


    /**
     * Get the comments for the blog post.
     */
    public function articleImages()
    {
        return $this->hasMany('App\Models\ArticleImage');
    }
    public function scopeName($query, $name){
      if (trim($name) !="")
      {
         $query->where(\DB::raw("CONCAT(article_title)"), "LIKE", "%$name%")
         ->orWhere(\DB::raw("CONCAT(article_content)"), "LIKE", "%$name%")
         ->orWhere(\DB::raw("CONCAT(article_author)"), "LIKE", "%$name%");
      }
        
    }

    //public function setPathAttribute($path) {

    //	if(!empty($path)){
    //		$nombre = $path->getClienteOriginalName();
    //		$this->attributes['path'] = $nombre;
    //		\Storage::disk('local')->put($nombre, \file::get($path));
    	
}






