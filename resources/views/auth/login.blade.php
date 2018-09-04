@extends('main')

@section('title', '| Login')

@section('content')

	<div class="row">
		<div class="col-md-4 offset-md-4">
			<div class="card login" style="width: 22rem;">
				<div class="card-body">
					<h5 class="card-title">Welcome back!</h5>
					{!! Form::open() !!}
						<div class="form-group row">
							<div class="input-group form-icon-margin">
								{{ Form::email('email', null, ['class' => 'form-control', 'placeholder' => "Email Address"]) }}
							</div>
						</div>
						
						<div class="form-group row">
							<div class="input-group form-icon-margin">
								{{ Form::password('password', ['class' => 'form-control', 'placeholder' => "Password"]) }}
							</div>
						</div>

						<div class="form-check">
							{{ Form::checkbox('remember', null, null, ['class' => 'form-check-input']) }}
							{{ Form::label('remember', 'Remember Me', ['class' => 'form-check-label']) }}
							<p><a href="{{ route('password.request') }}">Forgot Password?</a></p>
						</div>
						
						{{ Form::submit('Sign in', ['class' => 'btn btn-primary btn-block', 'style' => 'font-weight: bold;']) }}

					{!! Form::close() !!}
					<div class="card-footer">
						<p>Don't have an account? <a href="#">Sign up</a></p>
					</div>
				</div>
			</div>
			
		</div>
	</div>

@endsection