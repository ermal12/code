@extends('layouts.admin')

@section('content')
<h1>Create Post</h1>





{!!Form::open(['method'=>'POST','action'=>'AdminPostsController@store', 'files'=>true]) !!}
	
	{{csrf_field()}}
	



	<div class="form-group">
		{!! Form::label('title','Title:') !!}
		{!! Form::text ('title',null,['class'=>'form-control'])!!}
	</div>



		<div class="form-group">
		{!! Form::label('category_id','Category:') !!}
		{!! Form::select ('category_id',array('1'=>'PHP','0'=>'javascript'), null,['class'=>'form-control'])!!}
	</div>

	<div class="form-group">
		{!! Form::label('photo_id','Photo:') !!}
		{!! Form::file ('photo_id',null,['class'=>'form-control'])!!}
	</div>

	<div class="form-group">
		{!! Form::label('body','Description:') !!}
		{!! Form::textarea ('body',null,['class'=>'form-control'])!!}
	</div>


		<div class="form-group">
		{!! Form::submit('Create User',['class'=>'btn btn-primary']) !!}
		</div>

	@include('includes.form_errors')

	{!! Form::close() !!}




@stop