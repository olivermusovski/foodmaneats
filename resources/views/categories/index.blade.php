@extends('main')

@section('title', '| All Categories')

@section('content')

	<div class="row">
		<div class="col-md-8">
			<h1>Categories</h1>
			<table class="table">
				<thead>
					<tr>
						<th>#</th>
						<th>NAME</th> 
						<th></th>
					</tr>
				</thead>
				<tbody>
					@foreach($categories as $category)
					<tr>
						<th>{{ $category->id }}</th>
						<td>{{ $category->name }}</td>
						<td>
							{!! Form::open(['route' => ['categories.destroy', $category->id], 'class' => "td-hidden", 'method' => 'DELETE']) !!}
							<a href="{{ route('categories.edit', $category->id) }}" class="post-actions">Edit</a>
							{!! Form::button('Delete', ['class' => 'post-actions', 'style' => "background: none!important; border: none; padding: 0px 5px; font: inherit; cursor: pointer;", 'type'=>'submit']) !!}
							{!! Form::close() !!}
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div> <!-- end of col md 8 -->
		<div class="col-md-4">
			<div class = "card" style="margin-top: 55px;">
				<div class="card-body">
					<h5 class="card-title">New Category</h5>
					{!! Form::open(['route' => 'categories.store', 'method' => 'POST']) !!}

					{{ Form::label('name', 'Name') }}
					{{ Form::text('name', null, ['class' => 'form-control']) }}

					{{ Form::submit('Create New Category', ['class' => 'btn btn-primary btn-block btn-h1-spacing']) }}
				</div>
			</div>
		</div>
	</div>

@endsection