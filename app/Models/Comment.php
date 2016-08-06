<?php

namespace App\Models;

use Moloquent;

class Comment extends Moloquent
{
	protected $connection = 'mongodb';
    
	protected $fillable = [
		'text',
		'owner_name',
		'post_id',
		'created_at'
	];

	public function post(){
		return $this->belongsTo(Post::class);
	}

}
