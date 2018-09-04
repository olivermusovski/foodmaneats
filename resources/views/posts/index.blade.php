@extends('main')

@section('title', '| All Posts')

@section('content')

	<div class="row" style="margin-bottom: 10px;">
		<div class="col-md-10">
			<h1>All Posts</h1>
		</div>
		<div class="col-md-2">
			<a href="{{ route('posts.create') }}" class="btn btn-lg btn-block btn-primary btn-h1-spacing">Create Post</a>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<table class="table">
				<thead>
					<th>#</th>
					<th>TITLE</th>
					<th>BODY</th>
					<th>CREATED AT</th>
					<th></th>
				</thead>

				<tbody>
					@foreach($posts as $post)
						<tr>
							<th>{{ $post->id }}</th>
							<td>{{ $post->title }}</td>
							<td>{{ substr(strip_tags($post->body), 0, 50) }}{{ strlen(strip_tags($post->body)) > 50 ? "..." : "" }}</td>
							<td>{{ date('M j, Y', strtotime($post->created_at)) }}</td>
							<td>
								{!! Form::open(['route' => ['posts.destroy', $post->id], 'class' => "td-hidden", 'method' => 'DELETE']) !!}
								<a href="{{ route('posts.show', $post->id) }}" class="post-actions">View</a>
								<a href="{{ route('posts.edit', $post->id) }}" class="post-actions">Edit</a>
								{!! Form::button('Delete', ['class' => 'post-actions', 'style' => "background: none!important; border: none; padding: 0px 5px; font: inherit; cursor: pointer;", 'type'=>'submit']) !!}
								{!! Form::close() !!}
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>

			<div class="text-center">
				{!! $posts->links(); !!}
			</div>
		</div>
		
	</div>

@endsection