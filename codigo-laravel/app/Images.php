<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Images extends Model {
    protected $table = 'images';

    public function comments() {
      return $this->hasMany('App\Comments');
    }

    public function likes() {
      return $this->hasMany('App\Comments');
    }
}
