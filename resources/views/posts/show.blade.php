@extends('main')

@section('title', '| View Post')

@section('content')

	<div class="row">
		<div class="col-md-8">
			<h1>{{ $post->title }}</h1>
			<p class="lead">{!! $post->body !!}</p>
			<hr>
			<div class="tags">
				@foreach($post->tags as $tag)
					<span class="badge badge-pill badge-secondary"><i class="fas fa-tag "></i> {{ $tag->name }}</span>
				@endforeach
			</div>
			<div id="backend-comments" style="margin-top: 50px">
				<h3>Comments <small>{{ $post->comments()->count() }} total</small></h3>

				<table class="table">
					<thead>
						<tr>
							<th>Name</th>
							<th>Email</th>
							<th>Comment</th>
							<th style="width: 100px;"></th>
						</tr>
					</thead>
					<tbody>
						@foreach($post->comments as $comment)
						<tr>
							<td>{{ $comment->name }}</td>
							<td>{{ $comment->email }}</td>
							<td>{{ $comment->comment }}</td>
							<td>
								{!! Form::open(['route' => ['comments.destroy', $comment->id], 'method' => 'DELETE']) !!}
								<a href="{{ route('comments.edit', $comment->id) }}" class="btn btn-outline-primary btn-sm"><i class="fas fa-edit"></i></a>
								{!! Form::button('<i class="fas fa-trash-alt"></i>', ['class' => 'btn btn-outline-danger btn-sm', 'type'=>'submit']) !!}
								{!! Form::close() !!}
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
		<div class="col-md-4">
			<div class="card bg-light">
				<img class="card-img-top" src="{{ asset('images/' . $post->image) }}">
				<div class="card-body">
					<dl class="row">
						<dt class="col-sm-5">URL Slug:</dt>
						<dd class="col=sm-7">{{  '/blog/'.$post->slug }}</dd>	
					</dl>
					<dl class="row">
						<dt class="col-sm-5">Category:</dt>
						<dd class="col=sm-7">{{ $post->category->name }}</dd>	
					</dl>
					<dl class="row">
						<dt class="col-sm-5">Created At:</dt>
						<dd class="col=sm-7">{{ date('M j, Y g:ia', strtotime($post->created_at)) }}</dd>	
					</dl>
					<dl class="row">
						<dt class="col-sm-5">Last Updated:</dt>
						<dd class="col=sm-7">{{ date('M j, Y g:ia',strtotime($post->updated_at)) }}</dd>	
					</dl>
					<hr>
					<div class="row">
						<div class="col-sm-6">
							{!! Html::linkRoute('posts.edit', 'Edit', array($post->id), array('class' => 'btn btn-primary btn-block')) !!}
						</div>
						<div class="col-sm-6">
							{!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'DELETE']) !!}
								{!! Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) !!}
							{!! Form::close() !!}
							
						</div>
					</div>

					<div class="row">
						<div class="col-sm-12">
							{!! Html::linkRoute('posts.index', '<< See All Posts', [], ['class' => 'btn btn-outline-secondary btn-block btn-h1-spacing']) !!}
						</div>
					</div>
				</div>

			</div>
		</div>

	</div>
	

@endsection