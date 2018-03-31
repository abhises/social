<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    public function user()
    {
    	return $this->belongsTO('App\User');
    }
    

    public function post()
    {
    	return $this->belongsTo('App\Post');
    }
}
