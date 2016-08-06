@extends('layouts.menu_app')

@section('content')

	@if (Session::has('message'))
		<div class="flash alert-info">
		</div>
		<div class="alert alert-success" role="alert">
		  <span class="glyphicon glyphicon glyphicon-ok" aria-hidden="true"></span>
		  <span class="sr-only">Message:</span>
			{{ Session::get('message') }}
		</div>
	@endif

	@if( $posts->count() > 0 )

		@if( !Auth::guest() )
			<div class="row">
				<div class="pull-right">
					@include('home.partials._create_link', [ "buttonText" => "New Post"])
				</div>
			</div>
		@endif

		<?php $MAX_LENGTH  = 2000; ?>

		@foreach ($posts as $post)

			
			<?php 
				$isBigEnough = strlen($post->content) > $MAX_LENGTH; 
				$postLink    = '/posts/' . $post->id;
			?>

			<div class="row">

				<h1><a href="{{url($postLink)}}">{{ $post->title }}</a></h1>
				<p style="margin-bottom: 20px; color: #999;">{{ date('F d, Y \a\t H:i', strtotime($post->created_at)) }}</p>
				<p class="text-justify">{{ $isBigEnough ? substr($post->content, 1, $MAX_LENGTH) . '...' : $post->content }}</p>
				
				@if( $isBigEnough )
					<a href="{{url($postLink)}}" class="btn btn-default">Read more</a>
				@endif
				
				<div style="margin-top:15px" >
					@include('partials._tags', ["tags" => $post->tags])
				</div>

			</div>
		@endforeach

	@else
		<h4>No Posts found</h4>
		@if(!Auth::guest())
			@include('home.partials._create_link', [ "buttonText" => "Start your first Post"])
		@endif
	@endif

@endsection