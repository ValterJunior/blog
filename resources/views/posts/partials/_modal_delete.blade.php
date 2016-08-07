{!! Form::open( [ 'method' => 'DELETE', 'action' => ['PostsController@destroy', $post_id] ] ) !!}

	<div class="modal fade" id="removePost" tabindex="-1" role="dialog" aria-labelledby="removePostLabel">

	  <div class="modal-dialog" role="document">

	    <div class="modal-content">

	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="removePostLabel">Delete Post</h4>
	      </div>

	      <div class="modal-body">
	        <p>Do you really want to remove this <strong>Post</strong>?</p>
	      </div>

	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
	        <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</button>
	      </div>

	    </div>

	  </div>

	</div>

{!! Form::close() !!}
