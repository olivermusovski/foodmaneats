@extends('main')

@section('title', '| Forgot My Password')

@section('content')

	<div class="row">
		<div class="col-md-6 offset-md-3">
			<div class="card">
				<div class="card-header">Reset Password</div>
					<div class="card-body">
						@if(session('status'))
							<div class="alert alert-success">
								{{ session('status') }}
							</div>
						@endif
						
						{!! Form::open(['route' => 'password.email', 'method' => "POST"]) !!}

						{{  Form::label('email', 'Email Address:') }}
						{{  Form::email('email', null, ['class' => 'form-control']) }}

						{{  Form::submit('Reset Password', ['class' => 'btn btn-primary btn-h1-spacing']) }}
						{!!  Form:: close() !!}
					</div>
			</div>
		</div>
	</div>

@endsection