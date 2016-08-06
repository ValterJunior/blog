@extends('layouts.nomenu_app')

@section('content')

	<h2>Edit Post</h2>
		
	@include('partials._button_back', ["addAdminButton" => false, "link" => "posts/" . $post->id])

	{!!  Form::open( [ 'method' => 'PUT', 'action' => ['PostsController@update', $post->_id] ] ) !!}
		@include('posts.partials._form', ['submit_text' => 'Save'])
	{!! Form::close() !!}

@endsection