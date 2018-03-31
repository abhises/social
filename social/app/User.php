<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;

class User extends Model implements Authenticatable
{
  use AuthenticableTrait;

  public function posts()
  {
  	return $this->hasMany('App\Post');
  }

   public function photos()
  {
  	return $this->hasMany('App\Photo');
  }

   public function likes()
  {
    	return $this->hasMany('App\Like');
   }

}
