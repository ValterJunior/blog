@extends('layouts.menu_app')

@section('content')
	
	@include('posts.partials._buttons_post', [ "addAdminButton" => !Auth::guest(), "link" => action('HomeController@index'), "post" => $post, "modalDeleteId" => "removePost"])

	<div class="row">

		<div class="col-md-12">
			<h1>{{ $post->title }}</h1>
		</div>

	</div>

	<div class="row">
		<div class="col-md-8">
			<p style="margin-bottom: 20px; color: #999;">{{ date('F d, Y \a\t H:i', strtotime($post->created_at)) }}</p>
		</div>
		<div class="col-md-4">
			<div class="pull-right">
				@include('partials._tags', ["tags" => $post->tags])
			</div>
		</div>
	</div>

	<div class="row">
		<p class="text-justify">{!! nl2br(e($post->content)) !!}</p>
	</div>

	@include('posts.partials._comments_box', ["post" => $post])
	@include('posts.partials._modal_delete', ["post_id" => $post->id])

@endsection