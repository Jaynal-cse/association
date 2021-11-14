<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function posts(){
		return $this->belongsToMany('App\Post')->withTimeStamps();
	}
	
	public function services()
    {
        return $this->belongsToMany('App\Service')->withTimestamps();
    }
	public function officers()
    {
        return $this->belongsToMany('App\Officer')->withTimestamps();
    }
	
	
}
