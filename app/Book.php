<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    public function category(){
    	return $this->belongsTo('\App\Category');
    }

    public function language(){
    	return $this->belongsTo('\App\Language');
    }

    public function condition(){
    	return $this->belongsTo('\App\Condition');
    }

    public function publisher(){
    	return $this->belongsTo('\App\Publisher');
    }

    // public function user(){
    // 	return $this->belongsTo('\App\User');
    // }

    public function authors(){
    	return $this->belongsToMany('\App\Author')->withPivot("quantity")->withTimeStamps();
    }
}
