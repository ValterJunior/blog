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
	'created_at',
	'month',
	'year',
	];

	public function user(){
		return $this->belongsTo(User::class);
	}

	public function tags(){
		return $this->belongsToMany(Tag::class);
	}

	public function comments(){
		return $this->hasMany(Comment::class);
	}

    protected static function boot() {
    
        parent::boot();

 		// Saving the month/year data to optimize searches!
 		static::creating(function ($post) {
            
            $post->month = date('n');
            $post->year  = date('Y');

        });        

	    // Deleting related tables!
        static::deleting( function($post) {

			$post->comments()->delete();

 			// Deleting tags when there is no more posts related!
 			foreach ($post->tags as $tag) {

 				if( $tag->posts->count() <= 1 ){
	                $tag->delete();
 				}

            }

        });

    }	

}
