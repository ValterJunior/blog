<?php

namespace App\Models;

use Moloquent;

class Tag extends Moloquent
{
	protected $connection = 'mongodb';
	
	protected $fillable = [
		'name'
	];

	public function posts(){
		return $this->belongsToMany(Post::class);
	}

}
