@extends('layout.master')
@section('title')
Dashboard
@endsection

@section('content')
@include('includes.message-block')

<section class=" row new-post">
		<div class="col-md-6 col-md-offset-3">
			<header><h3>What do you want to say</h3></header>
			<form action="{{route('post.store')}}" method="POST">
				<div class="form-group">
					<textarea class="form-control" name="body" id="new-post" rows="5" placeholder="Your Post"></textarea>
					
				</div>
				<button type="submit" class="btn btn-success">Create Post</button>
				<input type="hidden" name="_token" value="{{Session::token()}}">
				
			</form>
			
		</div>
	
</section>
<section class="row posts">
	<div class="col-md-6 col-md-3-offset">
	<header><h3>What ever other people say</h3></header>
		@foreach($posts as $post)

		<article class="post">
			<p>{{$post->body}}</p>
			<div class="info">
				Post by {{$post->user->first_name}} on {{$post->created_at}}<br>
				Poster email:{{$post->user->email}}
				<div class="interaction">
					<div class="row">
						<a href="#" class="like">Like</a>|
					<a href="#" class="like" >Dislike</a>|
					@if(Auth::user()==$post->user)
					<a href="{{route('post.edit',['id'=>$post->id])}}" class="btn btn-warning">Edit</a>
					
					
						{!!Form::open(['route'=>['post.destroy',$post->id],'method'=>'DELETE'])!!}
 		 				{!!Form::submit('Delete',['class'=>'btn btn-danger '])!!}
 		 				{!!Form::close()!!}
					
					
					@endif
						
					</div>
					
				</div>
		@endforeach
		

		
		
	</div>
		
</section>




@endsection 

@section('js')
 <script type="text/javascript" src="{{asset('/src/js/app.js')}}"></script>
@endsection