@extends('layouts.admin')

@section('content')


	@if(Session::has('deleted_post'))
		<p class="bg-danger">{{session('deleted_post')}}</p>
		@endif





<h1>Posts</h1>


         
  <table class="table">

    <thead>
      <tr>
        <th>Id</th>
        <th>Photo</th>     
        <th>Title</th>            
        <th>Owner</th>
        <th>Category</th>
        <th>Post Link </th>
        <th>Comments</th>        
        <th>Created</th> 
        <th>Updated</th>                              
      </tr>
    </thead>
    <tbody>
    @if($posts)
    	@foreach($posts as $post)

      <tr>

        <td>{{$post->id}}</td>  
        <td><img height="60" width="100" src="{{$post->photo ? $post->photo->file : 'http://placehold.it/400x400'}}"> </td>  
        <td><a href="{{route('admin.posts.edit' ,$post->id)}}"> {{$post->title}}</a></td>                  
        <td>{{$post->user->name}}</td>                
        <td>{{$post->category ? $post->category->name : 'uncategorized'}}</td> 
        <td><a href="{{route('home.post',$post->slug)}}">View Post</a></td>
        <td><a href="{{route('admin.comments.show',$post->id)}}">View Comment</a></td>
        <td>{{$post->created_at->diffForHumans()}}</td>  
        <td>{{$post->updated_at->diffForHumans()}}</td>  

	  </tr>

      	@endforeach
     @endif
    </tbody>
  </table>

  <div class="row">
    <div class="col-sm6 col-sm-offset-5">
        {{$posts->render()}}
      </div>
    
  </div>


@stop