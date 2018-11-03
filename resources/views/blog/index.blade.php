@extends('main')

@section('title', '| Blog')

@section('content')	
	
	@php
	$numofCols = 2;
	$count = 0;
	@endphp
	
	 
	<div class="row card-spacing">

	@foreach($posts as $post)
		<div class="col-md-6">
			<div class="card" style="width: 100%;">
				<img class="card-img-top" src="{{ asset('images/' . $post->image) }}">
				<div class="card-body">
					<h4 class="card-title">{{ $post->title }}</h4>
					<h6 class="card-subtitle mb-2 text-muted">Published: {{ date('M j, Y', strtotime($post->created_at)) }}</h6>

					<p class="card-text">{{ substr(strip_tags($post->body), 0, 250) }}{{ strlen(strip_tags($post->body)) > 250 ? '...' : "" }}</p>

					<a href="{{ route('blog.single', $post->slug) }}" class=" card-link btn btn-primary">Read More</a>
				</div>
			</div>
		</div>
		@php
		$count++;
		if($count % 2 == 0) echo '</div> <div class="row card-spacing">';
		@endphp
	@endforeach
	</div>
	
	  
	<div class="row">
		<div class="col-md-12">
			<div class="text-center">
				{!! $posts->links() !!}
			</div>
		</div>
	</div>
	


@endsection