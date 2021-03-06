@extends('layouts.app')


@section('content')
<div class="container">

    <div class="row">
        
    <div class="col-md-8">

                <!-- Blog Post -->

                <!-- Title -->
                <h1>{{$post->title}}</h1>
                    
                <!-- Author -->
                <p class="lead">
                    by {{$post->user->name}}
                </p>

                <hr>

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span> Posted {{$post->created_at->diffForHumans()}}</p>

                <hr>

                <!-- Preview Image -->
                <img class="img-responsive"  src="{{$post->photo ? $post->photo->file : $post->photoPlaceholder()}}" alt="">

                <hr>


                <!-- Post Content -->
                <p class="lead">{!! $post->body !!}
                <hr>

                @if(Session::has('comment_message'))
                    <div class="alert alert-success">
                    <p class="bg-success">{{session('comment_message')}}</p>
                    </div>
                    @endif

                <!-- Blog Comments -->
                @if(Auth::check())
                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>

                    {!! Form::open (['method'=>'POST','action'=>'PostCommentsController@store']) !!}
                    <input type="hidden" name="post_id" value="{{$post->id}}">
                    <div class="form-group">
                        {!! Form::label('body','Body:') !!}
                        {!! Form::textarea('body', null,['class'=>'form-control','rows'=>3]) !!}
                        </div>
                    <div class="form-group">
                        {!! Form::submit('Submit comment',['class'=>'btn btn-primary']) !!}
                    </div>  
                    {!! Form::close() !!}

                </div>
                @endif
                <hr>

                <!-- Posted Comments -->
                @if(count($comments) > 0)
                    @foreach($comments as $comment)

                <!-- Comment  per te ven foto default -->
                <div class="media">
                    <a class="pull-left" href="#">
                    <h3></h3>
                        <img height="64" width="64"  class="media-object" src="{{$comment->photo}}" alt=""> 

                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">{{$comment->author}}
                            <small>{{$comment->created_at->diffForHumans()}}</small>
                        
                        
                        </h4>

                        <p>{{$comment->body}}</p>
                           
                           <div class="comment-reply-container">
                    <button class="toggle-reply btn btn-primary pull-right">Reply</button>  

                    <div class="comment-reply col-sm-6">                          

                                        {!! Form::open(['method'=>'POST', 'action'=> 'CommentRepliesController@createReply']) !!}
                                             <div class="form-group">

                                                 <input type="hidden" name="comment_id" value="{{$comment->id}}">

                                                 {!! Form::label('body', 'Body:') !!}
                                                 {!! Form::textarea('body', null, ['class'=>'form-control','rows'=>1])!!}
                                             </div>

                                             <div class="form-group">
                                                 {!! Form::submit('submit', ['class'=>'btn btn-primary']) !!}
                                             </div>
                                        {!! Form::close() !!}

                                        </div> 
    
                        </div>




                            @if(count($comment->replies) > 0)
                            @foreach($comment->replies as $reply)

                                @if($reply->is_active ==1)


                                                    <div id="nested-comment" class="media">
                            <a class="pull-left" href="#">
                                <img class="media-object" height="60" width="60" src="{{$reply->photo}}" alt="">
                            </a>
                            
                            <div class="media-body">
                                <h4 class="media-heading">{{$reply->author}}
                                    <small>{{$reply->created_at->diffForHumans()}}</small>
                                </h4>
                                <p>{{$reply->body}}</p>
                            </div>

                            <div class="comment-reply-container">
                    <button class="toggle-reply btn btn-primary pull-right">Reply</button>  

                    <div class="comment-reply col-sm-6">                          

                                        {!! Form::open(['method'=>'POST', 'action'=> 'CommentRepliesController@createReply']) !!}
                                             <div class="form-group">

                                                 <input type="hidden" name="comment_id" value="{{$comment->id}}">

                                                 {!! Form::label('body', 'Body:') !!}
                                                 {!! Form::textarea('body', null, ['class'=>'form-control','rows'=>1])!!}
                                             </div>

                                             <div class="form-group">
                                                 {!! Form::submit('submit', ['class'=>'btn btn-primary']) !!}
                                             </div>
                                        {!! Form::close() !!}

                                        </div> 
    
                        </div>


                    </div>
                        @endif
                        @endforeach
                        @endif
                    </div>
                </div>
                    @endforeach
                @endif

 </div> <!-- col-md-8 -->

@include('includes.front_sidebar')
</div> <!-- row -->

</div>


<style type="text/css">
    #admin-page {
  padding-top: 0px; }

#nested-comment {
  margin-top: 60px; }

.comment-reply {
  display: none; }

</style>


@stop



@section('scripts')




<script>
        $(".comment-reply-container .toggle-reply").click(function(){


            $(this).next().slideToggle("slow");




        });

</script>

@stop