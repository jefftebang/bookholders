<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Telegraph extends Model
{
    public function status(){
    	return $this->belongsTo('\App\Status');
    }

    public function book(){
    	return $this->belongsTo('\App\Book');
    }

    public function user(){
    	return $this->belongsTo('\App\User');
    }
}
