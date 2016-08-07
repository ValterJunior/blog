<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;

use App\Http\Requests;
use App\Models\{Post, Tag};

class PostsController extends Controller
{

	protected $rules = [
		'title'   => [ 'required' ],
		'content' => [ 'required' ],
		'tags'    => [ 'required', 'tag_requires_comma' ]
	];

	public function __construct(){
		$this->middleware('auth', ['except' => ['show']]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return redirect('/');
	}    

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return View
	 */
	public function create()
	{
		return view('posts.create');
	}    

	/**
	 * Save a new post data
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$this->validate( $request, $this->rules );

		// Saving post!
		$post = $this->savePost($request);

		// Saving tags relationships!
		$this->saveTag($request, $post);

		return Redirect::to('/')->with('message', 'Post created!');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  string $id
	 * @return View
	 */
	public function edit(string $id)
	{
		$post     = Post::find($id);
		$tagsList = array();

		if(!$post){
			abort(404);
		}

		foreach( $post->tags as $tag ){
			$tagsList[] = $tag->name;			
		}

		$tags = implode( ',', $tagsList );

		return view('posts.edit' )->with( compact('post') )->with( compact('tags') );
	}

	/**
	 * Update the specified resource in the storage.
	 *
	 * @param  Request
	 * @return Response
	 */
	public function update(Request $request)
	{
		
		$this->validate( $request, $this->rules );

		// Saving post!
		$post = $this->updatePost( $request );

		// Saving tags relationships!
		$this->saveTag($request, $post);

		return Redirect::route('posts.show', $post->id)->with('message', 'Post updated!');

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  string $id
	 * @return View
	 */
	public function show(string $id)
	{
		$post = Post::find($id);

		if( !$post ){
			abort(404);
		}

		if( $post->comments() ){
			return view('posts.show', compact('post'));
		}else{
			return 'Teste!';
		}

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  Request
	 * @return Response
	 */
	public function destroy(string $id)
	{
		
		$msg = '';

		if( isset($id) ){

			Post::find($id)->delete();
			$msg = 'Post deleted!';
		}else{
			$msg = 'No Post found to delete';
		}

		return Redirect::to('/')->with('message', $msg);

	}

	/**
	 * Save the request data into a new Post
	 *
	 * @param  Request
	 * @return App\Model\Post
	 */
	private function savePost( Request $request ) : Post {

		$post = new Post;

		$this->putPost( $post, $request );
		$post->save();

		return $post;

	}

	/**
	 * Update the request data into a new Post
	 *
	 * @param  Request
	 * @return App\Models\Post
	 */
	private function updatePost( Request $request ) : Post {

		$id   = $request->input('id');
		$post = Post::find( $id );

		if( isset($post) ){

			$this->putPost( $post, $request );
			$post->save();

		}

		return $post;
	}

	/**
	 * Save a string of tags as rows of Tag table related with a Post
	 *
	 * @param  Request
	 * @param  App\Model\Post
	 * @return null
	 */
	private function saveTag( Request $request, Post $post ){

		$listTags = explode( ',', $request->input('tags') );

		//$post->tags()->sync([]);

		foreach( $listTags as $name ){
			
			$name = strtolower( trim($name) );

			$tag = Tag::where( 'name', '=', $name )->first();

			if( !isset($tag) ){
				$tag = new Tag(['name' => $name]);
			}

			$post->tags()->save($tag);
		}

	}

	/**
	 * Fill the Post object with the given requested fields
	 *
	 * @param  App\Model\Post
	 * @param  Request
	 * @return null
	 */
	private function putPost( Post $post, Request $request ){
		$post->title   = $request->input('title');
		$post->content = $request->input('content');
	}


}
