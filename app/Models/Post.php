<?php

namespace App\Models;

use Moloquent;

class Post extends Moloquent
{
	protected $connection = 'mongodb';
    
	protected $fillable = [
	'title',
	'content',
	'user_id',
	'created_at'
	];

	public function user(){
		return $this->belongsTo(User::class);
	}

	public function tags(){
		return $this->belongsToMany(Tag::class);
	}

}
