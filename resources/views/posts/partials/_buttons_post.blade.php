<div class="row">
	<div class="pull-right">

		<a href="{{ url($link) }}" class="btn btn-warning"><i class="fa fa-undo"></i> Back to Posts</a>

		@if( $addAdminButton && isset($post) )

			<a href="{{ action('PostsController@edit', ['id' => $post->id]) }}" class="btn btn-primary"><i class="fa fa-edit"></i> Edit Post</a>

			@if( isset($modalDeleteId))
				<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#{{$modalDeleteId}}"><i class="fa fa-trash"></i> Delete Post</button>
			@endif

		@endif

	</div>
</div>
