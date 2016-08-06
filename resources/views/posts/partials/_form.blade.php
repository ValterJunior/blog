
	@if ($errors->any())

		<div class="row">
			<div class="alert alert-danger margin-top-10" role="alert">
			  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
			  <span class="sr-only">Error(s) Found!</span>
			  Please fix the errors down below.
			</div>	
		</div>

	@endif

	<input type="hidden" id="id" name="id" value="{{ old( 'id', $post->id ?? "" ) }}">

	<div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">

	<label for="title">Title</label>
	<input type="text" class="form-control" id="title" name="title" placeholder="Type a beautiful title here" value="{{ old( 'title', $post->title ?? "" ) }}">

	@if ($errors->has('title'))
	    <span class="help-block">
	        <strong>{{ $errors->first('title') }}</strong>
	    </span>
	@endif	

</div>

<div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">

	<label for="content">Content</label>
	<textarea class="form-control" id="content" name="content" rows="20" placeholder="Write something amazing here">{{ old( 'content', $post->content ?? "" ) }}</textarea>

	@if ($errors->has('content'))
	    <span class="help-block">
	        <strong>{{ $errors->first('content') }}</strong>
	    </span>
	@endif	

</div>

<div class="form-group{{ $errors->has('tags') ? ' has-error' : '' }}">

	<label for="tags">Tags - <small class="text-muted">Use commas to add more than one tag</small></label>
	<input type="text" class="form-control" id="tags" name="tags" placeholder="Type as many tags as you want" value="{{ old( 'tags', $tags ?? "" ) }}">

	@if ($errors->has('tags'))
	    <span class="help-block">
	        <strong>{{ $errors->first('tags') }}</strong>
	    </span>
	@endif	

</div>

<button type="submit" class="btn btn-success">{{$submit_text}}</button>

