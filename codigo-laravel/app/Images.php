<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Images extends Model {
    protected $table = 'images';

    public function comments() {
      return $this->hasMany('App\Comments', 'id_image');
    }

    public function likes() {
      return $this->hasMany('App\Likes', 'id_image');
    }
}
