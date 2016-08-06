<div class="detailBox">

    <div class="titleBox">
        <label>Comments</label>
    </div>

    <div class="actionBox">

        @if( $post->comments->count() > 0 )

            <ul class="commentList">

                @foreach( $post->comments as $comment )

                    <li>
                        <div class="commenterImage">
                            <span class="glyphicon glyphicon-user"></span>
                        </div>
                        <div class="commentText">
                            <h5 class="comment-title" ><strong>{{ $comment->owner_name }}</strong></h5>
                            <p class="">{{ $comment->text }}</p> <span class="date sub-text">on {{ date('F d, Y \a\t H:i', strtotime($comment->created_at)) }}</span>
                        </div>
                    </li>

                @endforeach

        @else
            <div style="min-height: 40px;">
                <h5>There are no comments yet{{ !Auth::guest() ? ", why not be the first." : "." }}</h5>
            </div>
        @endif

        @if( Auth::guest() )

            <div style="margin-top:10px;">

                {!! Form::open( [ 'action' => ['CommentsController@store'] ] ) !!}

                    <input type="hidden" id="post_id" name="post_id" value="{{ $post->id }}">

                    <div class="col-md-4 comment-input">
                        <input class="form-control" type="text" id="owner" name="owner" placeholder="Your name" />
                    </div>
                    
                    <div class="col-md-6 comment-input">
                        <input class="form-control" type="text" id="comment" name="comment" placeholder="Your comments" />
                    </div>

                    <div class="col-md-2">
                        <button type="submit" class="btn btn-default">Add</button>
                    </div>

                {!! Form::close() !!}

            </div>

        @endif

    </div>

</div>
