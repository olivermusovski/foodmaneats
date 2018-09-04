@extends('main')

@section('title', '| Create New Post')

@section('stylesheets')

	{!! Html::style('css/parsley.css') !!}

    <!-- Select2 CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    
    <!-- TinyMCE -->
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
    <script>
        tinymce.init({ 
            selector:'textarea',
            plugins: 'code link lists image advlist textcolor colorpicker emoticons',
            toolbar1: 'formatselect | bold italic strikethrough forecolor backcolor | link | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | emoticons | removeformat',
            toolbar2: 'fontselect fontsizeselect',
            branding: false,
            statusbar: false 
        });
    </script>

@endsection

@section('content')

	<div class="row">
		<div class="col-md-8 offset-md-2">
			<h1>Create New Post</h1>
			<hr>
			{!! Form::open(array('route' => 'posts.store', 'data-parsley-validate' => '', 'files' => true)) !!}
    			{{ Form::label('title', 'Title:') }}
    			{{ Form::text('title', NULL, array('class' => 'form-control', 'required' => '', 'maxlength' => '255')) }}

    			{{ Form::label('slug', 'Slug:') }}
    			{{ Form::text('slug', NULL, array('class' => 'form-control', 'required' => '', 'minlength' => '5', 'maxlength' => '255')) }}

    			{{ Form::label('category_id', 'Category:') }}
    			<select class="form-control" name="category_id">
    				@foreach($categories as $category)
    					<option value="{{ $category->id }}">{{ $category->name }}</option>
    				@endforeach
    			</select>

                {{ Form::label('tags', 'Tags:') }}
                <select class="form-control select2-multi" name="tags[]" multiple="multiple">
                    @foreach($tags as $tag)
                        <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                    @endforeach
                </select>

                {{ Form::label('featured_image', 'Upload Featured Image:') }}
                {{ Form::file('featured_image', ['class' => 'form-control']) }}

    			{{ Form::label('body', 'Post Body:') }}
    			{{ Form::textarea('body', NULL, array('class' => 'form-control')) }}

    			{{ Form::submit('Create Post', array('class' => 'btn btn-success btn-lg btn-block', 'style' => 'margin-top: 20px;')) }}
			{!! Form::close() !!}
		</div>
	</div>

@endsection

@section('scripts')

	{!! Html::script('js/parsley.min.js') !!}

    <!-- Select2 javascript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

    <script type="text/javascript">
        $('.select2-multi').select2();
    </script>

@endsection