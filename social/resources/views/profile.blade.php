@extends('layout.master')
@section('title')
{{Auth::user()->first_name}}
@endsection

@section('content')



<div class="row">
	<div class="col-md-4">

	<h3>{{Auth::user()->first_name}}'s Profile Picture</h3>
	@foreach($photo->chunk(1) as $chunk)
	@foreach($chunk as $photos)
	@if(Auth::user()==$photos->user)
	<img class="img-rounded"  src="storage/album_covers/{{$photos->avatar}}" alt="{{$photos->avatar}}" width="304" height="236">
	@endif
	@if(Auth::user()==$photos->user)
	{!!Form::open(['route'=>['destroy',$photos->id],'method'=>'DELETE'])!!}
 		 				{!!Form::submit('Delete',['class'=>'btn btn-danger '])!!}
 		 				{!!Form::close()!!}
 		 				@endif
	@endforeach
	@endforeach
		
	</div>  

	<div class="col-md-4 offset-1">
		<h5>Upload Profile Picture</h5>
		{!!Form::open(['action'=>'UserController@image','method'=>'POST','enctype'=>'multipart/form-data'])!!}
		 {{ csrf_field() }}
		 {{Form::file('avatar')}}
		{{Form::submit('Upload',['class'=>'btn btn-success btn-lg'])}}
		{!!Form::close()!!}
		
	</div>
	
</div>
<hr>
<h5>Previous Profile photo</h5>
 @foreach($album as $albums)
 @if(Auth::user()==$albums->user)
	<img class="img-rounded"  src="storage/album_covers/{{$albums->avatar}}" alt="{{$albums->avatar}}" width="304" height="236">
	@endif

 @endforeach





@endsection 