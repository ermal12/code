@extends('layouts.admin')

@section('content')


<h1>Media</h1>

@if($photos)

	<form  action="/delete/media" method="post" class="form-inline">
		<div class="form-group">
			<select name="checkBoxArray1" id="" class="form-control">
				<option value="delete">Delete</option>
			</select>
		</div>
		<div class="form-group">
			<input type="submit" name="delete_all" class="btn-primary">
		</div>	
		
<table class="table">

	<thead>
		<tr>
		<th><input type="checkbox" id="options" > </th>
			<th>Id</th>
			<th>Name</th>
			<th>Created</th>
			<th>Delete</th>
		</tr>
	</thead>	
	<tbody>

		@foreach($photos as $photo)

	<tr>
	<td><input class="checkBoxes" type="checkbox" name="checkBoxArray[]" value="{{$photo->id}}"></td>
	<td>{{$photo->id}}</td>	
	<td><img height="60" width="100" src="{{$photo->file}}"></td>	
	<td>{{$photo->created_at ? $photo->created_at : 'no date' }}</td>
	<td>
		{!! Form::open(['method'=>'DELETE','action'=>['AdminMediasController@destroy',$photo->id]]) !!}
		<div class="form-group">
		{!! Form::submit ('Delete',['class'=>'btn btn-danger']) !!}
		</div>
		{!! Form::close() !!}
	</td>	
	<tr>
	@endforeach
	</tbody>
	
</table>
	</form>

@endif


@stop

<!-- @section('scripts')

 -->

<script src="{{asset('js/libs.js')}}"></script>

 <script >
	$(document).ready(function(){

		$('#options').click(function(){
				if(this.checked){
					$('.checkBoxes').each(function(){
						this.checked = true;
					});
				}
				else{
						$('.checkBoxes').each(function(){
						this.checked = false;
					});
				}
		});
	});
</script>
@stop