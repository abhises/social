<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    public function users()
    {
    	return $this->belongsTO('App\User');

    }
}
