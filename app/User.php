<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasRoles, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname', 'lastname', 'username', 'email', 'ci', 'phone', 'address', 'birthdate', 'area_id', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Get the post that owns the comment.
     */
    public function area()
    {
        return $this->belongsTo('App\Models\Area');
    }

    /**
     * Get the letters for the .
     */
    public function letters()
    {
        return $this->hasMany('App\Models\Letter');
    }

    /**
     * Get the letters for the .
     */
    public function templates()
    {
        return $this->hasMany('App\Models\Template');
    }

    /**
     * Get the letters for the .
     */
    public function bulletins()
    {
        return $this->hasMany('App\Models\Bulletin');
    }
}
