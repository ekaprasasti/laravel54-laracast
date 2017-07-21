@extends('layouts.master')
@section('content')
	<div class="col-sm-8 blog-main">
		<h1>Create a post</h1>
		<hr>
		<form method="post" action="/posts" >
			{{ CSRF_field() }}
			<div class="form-group">
		    <label for="title">Title:</label>
		    <input type="text" class="form-control" id="title" name="title">
		  </div>
		  <div class="form-group">
		    <label for="body">Body</label>
		    <textarea type="text" class="form-control" id="body" name="body"></textarea>
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-primary">Publish</button>
			</div>			
	
			@include('layouts.errors')

		</form>
		
				
	</div>
@endsection
