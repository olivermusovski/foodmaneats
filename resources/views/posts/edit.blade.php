@extends('main')

@section('title', '| Edit Blog Post')

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
		
		<div class="col-md-8">
			{!! Form::model($post, ['route' => ['posts.update', $post->id], 'method' => 'PUT', 'files' => true,  'data-parsley-validate' => '']) !!}
				{{ Form::label('title', 'Title:', ["class" => 'form-label-bold'] ) }}
				{{ Form::text('title', null, ["class" => 'form-control form-control-lg', 'required' => '', 'maxlength' => '255']) }}

				{{ Form::label('slug', 'Slug:', ["class" => 'form-label-bold', "style" => 'margin-top: 10px;']) }}
				{{ Form::text('slug', null, ["class" => 'form-control', 'required' => '', 'minlength' => '5', 'maxlength' => '255']) }}

				{{ Form::label('category_id', "Category:", ['class' => 'form-label-bold', 'style' => 'margin-top: 10px;']) }}
				{{ Form::select('category_id', $categories, null, ['class' => 'form-control']) }}

				{{ Form::label('tags', 'Tags:', ['class' => 'form-label-bold', 'style' => 'margin-top: 10px;']) }}
                {{ Form::select('tags[]', $tags, null, ['class' => 'form-control select2-multi', 'multiple' => 'multiple' ]) }}

                {{ Form::label('featured_image', 'Update Featured Image:', ['class' => 'form-label-bold', 'style' => 'margin-top: 10px;']) }}
                {{ Form::file('featured_image', ['class' => 'form-control']) }}
                
				{{ Form::label('body', 'Body:', ["class" => 'form-label-bold', "style" => 'margin-top: 10px;']) }}
				{{ Form::textarea('body', null, ["class" => 'form-control', 'required' => '']) }}
			
		</div>
		
		<div class="col-md-4">
			<div class="card bg-light">
				<div class="card-body">
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
							{!! Html::linkRoute('posts.show', 'Cancel', array($post->id), array('class' => 'btn btn-danger btn-block')) !!}
						</div>
						<div class="col-sm-6">
							{{ Form::submit('Save', ['class' => 'btn btn-success btn-block']) }}							
						</div>
					</div>
				</div>
			</div>
		</div>
		{!! Form::close() !!}
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