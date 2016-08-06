<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use App\Http\Requests;
use App\Models\{Post, Comment};

class CommentsController extends Controller
{
    
	/**
	 * Save a new comment
	 * OBS: Should works via ajax call but I didn't have time for that :( !
	 * @return Response
	 */
	public function store( Request $request ){

		$owner   = $request->input('owner');
		$text    = $request->input('comment');
		$post_id = $request->input('post_id');
		$msg     = '';

		$comment = new Comment([ 'text' => $text, 'owner_name' => $owner ]);
		$post    = Post::find($post_id);

		if( isset($post) ){
			$post->comments()->save($comment);
			$msg = 'Your comment has been submitted.';
		}else{
			$msg = "Something went wrong";
		}

		return Redirect::route('posts.show', $post_id)->with("comment_msg", $msg);
	}

}
