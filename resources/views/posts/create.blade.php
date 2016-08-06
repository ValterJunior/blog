@extends('layouts.nomenu_app')

@section('content')

	<h2>Create New Post</h2>
		
	@include('partials._button_back', ["addAdminButton" => false, "link" => "/"])

	{!!  Form::open( [ 'action' => 'PostsController@store' ] ) !!}
		@include('posts.partials._form', ['submit_text' => 'Create'])
	{!! Form::close() !!}

@endsection