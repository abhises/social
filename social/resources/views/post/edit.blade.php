@extends('layout.master')
@section('title')
Dashboard/edit
@endsection

@section('content')



<section class=" row new-post">
		{!!Form::model($post,['route'=>['post.update',$post->id],'method'=>'PUT'])!!}
		 {{Form::label('body','Body:',["class"=>'form-spacing-top input-lg'])}}
	     {{Form::textarea('body',null,["class"=>'form-control input-lg'])}}

		{{Form::submit('Save Changes',['class'=>'btn btn-success btn-block'])}}
	
</section>



@endsection 