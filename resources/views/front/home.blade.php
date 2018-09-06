@extends('layouts.blog-home')

@section('content')

    <!-- Navigation -->
    @include('includes.front_nav')

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">



                <!-- First Blog Post -->
                @if($posts)
                    @foreach($posts as $post)
                <h2>
                    <a href="#">{{$post->title}}</a>
                </h2>
                <p class="lead">
                    by {{$post->user->name}}
                </p>
                <p><span class="glyphicon glyphicon-time"></span>{{$post->created_at->diffForHumans()}}</p>
                <hr>
                <img class="img-responsive" src="http://placehold.it/900x300" alt="">
                <hr>
                <p>{!!str_limit($post->body,100)!!}</p>
                <a class="btn btn-primary" href="/post/{{$post->slug}}">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>
                    @endforeach
                @endif

                <!-- Second Blog Post -->
               

                <!-- Pagination -->
                <div class="row">
                    <div class="col 6 col-sm-offset-5"></div>
                </div>
                {{$posts->render()}}

            </div>
    <!-- Sidebar -->
@include('includes.front_sidebar')
@endsection
