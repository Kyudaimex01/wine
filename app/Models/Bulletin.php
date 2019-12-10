<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bulletin extends Model
{
    protected $fillable = [
        'bulletin_title','bulletin_vol','ext' ,'path','path_cover','path_pdf','user_id','published',
    ];


    /**
     * Get the post that owns the comment.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function scopeName($query, $name){
        if(trim($name)!= ""){
            $query->where(\DB::raw("CONCAT(bulletin_title)"), "LIKE", "%$name%");
        }
    }   
    //public function setPathAttribute($path) {

    //	if(!empty($path)){
    //		$nombre = $path->getClienteOriginalName();
    //		$this->attributes['path'] = $nombre;
    //		\Storage::disk('local')->put($nombre, \file::get($path));
    	
}






