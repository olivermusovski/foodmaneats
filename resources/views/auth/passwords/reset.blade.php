@extends('main')

@section('title', '| Reset Form')

@section('content')

	<div class="row">
		<div class="col-md-6 offset-md-3">
			<div class="card">
				<div class="card-header">Reset Password</div>
					<div class="card-body">
						{!! Form::open(['url' => 'password/reset', 'method' => "POST"]) !!}

						{{  Form::hidden('token', $token) }}

						{{  Form::label('email', 'Email Address:') }}
						{{  Form::email('email', $email, ['class' => 'form-control']) }}
						
						{{  Form::label('password', 'New Password:') }}
						{{  Form::password('password', ['class' => 'form-control']) }}

						{{  Form::label('password_confirmation', 'Confirm New Password:') }}
						{{  Form::password('password_confirmation', ['class' => 'form-control']) }}

						{{  Form::submit('Reset Password', ['class' => 'btn btn-primary btn-h1-spacing']) }}

						{!!  Form:: close() !!}
					</div>
			</div>
		</div>
	</div>

@endsection