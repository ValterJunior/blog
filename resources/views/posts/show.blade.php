@extends('layouts.menu_app')

@section('content')
	
	@include('partials._button_back', [ "addAdminButton" => !Auth::guest(), "link" => "/", "post" => $post, "modalDeleteId" => "removePost"])

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
		<p class="text-justify">{{ $post->content }}</p>
	</div>

	@include('posts.partials._comments_box', ["post" => $post])

	{!! Form::open( [ 'method' => 'DELETE', 'action' => ['PostsController@destroy', $post->_id] ] ) !!}

		<div class="modal fade" id="removePost" tabindex="-1" role="dialog" aria-labelledby="removePostLabel">

		  <div class="modal-dialog" role="document">

		    <div class="modal-content">

		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title" id="removePostLabel">Delete Post</h4>
		      </div>

		      <div class="modal-body">
		        <p>Do you really want to remove this Post?</p>
		      </div>

		      <div class="modal-footer">
		        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		        <button type="submit" class="btn btn-danger">Delete</button>
		      </div>

		    </div>

		  </div>

		</div>

	{!! Form::close() !!}

@endsection