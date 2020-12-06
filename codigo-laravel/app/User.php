<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable {
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $table = 'usuarios';
    public $timestamps = false;

    public function images() {
       return $this->hasMany('App\Images', 'id_user')->orderBy('id', 'DESC');
   }

   public function comments() {
     return $this->hasMany('App\Comments', 'id_user');
   }

   public function likes() {
     return $this->hasMany('App\Likes', 'id_user');
   }

   public function hasLiked($id) {
     $image = $this->likes()->where('id_image', $id)->first();
     return $image != null;
   }

    protected $fillable = [
        'username', 'email', 'password',
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
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
