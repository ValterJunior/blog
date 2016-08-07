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

		{{ $posts->links() }}
		
		@foreach ($posts as $post)

			
			<?php 
				$isBigEnough = strlen($post->content) > $MAX_LENGTH; 
				$postLink    = action('PostsController@show', ['id' => $post->id]);
			?>

			<!-- Just to wrap a blog post! -->
			<article id="{{ 'post-' . $post->id }}"> 

				<div class="row">
					<h1><a href="{{url($postLink)}}">{{ $post->title }}</a></h1>
					<p style="margin-bottom: 20px; color: #999;">{{ date('F d, Y \a\t H:i', strtotime($post->created_at)) }}</p>
					<p class="text-justify">{!! nl2br( e( $isBigEnough ? substr($post->content, 1, $MAX_LENGTH) . '...' : $post->content ) ) !!}</p>
				</div>

				<div class="row">

					@if( $isBigEnough )
						<a href="{{url($postLink)}}" class="btn btn-default">Read more</a>
					@endif

				</div>

				<div class="row">
					@include('partials._tags', ["tags" => $post->tags])
				</div>

			</article>

		@endforeach

		{{ $posts->links() }}

	@else

		<div class="row">

			<div class="col-md-12">

				<h4>There are no Posts yet</h4>
				
				@if(!Auth::guest())
					@include('home.partials._create_link', [ "buttonText" => "Start your first Post"])
				@endif

			</div>

		</div>
		
	@endif

@endsection

@section('top-menu-right')

   @parent

   {!! Form::open( [ 'class' => 'navbar-form navbar-right', 'method' => 'GET', 'action' => 'HomeController@index' ] ) !!}
      <input type="hidden" name="type" value="s">
      <input type="text" class="form-control" name="search" id="search" placeholder="Search...">
   {!! Form::close() !!}

   <a href="{{ action('HomeController@index') }}" class="btn btn-default navbar-button navbar-right"><i class="fa fa-eraser"></i> Clear Filters</a>

@endsection