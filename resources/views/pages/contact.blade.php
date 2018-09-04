@extends('main')

@section('title', '| Contact')

@section('stylesheets')

    <!-- reCaptcha --> 
    <script src='https://www.google.com/recaptcha/api.js'></script>

@endsection

@section('content')
        <div class="row">
            <div class="col-md-12">
                <h1>Contact Me</h1>
                <hr>
                <form action="{{ url('contact') }}" method="POST" id="form">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label name="email">Email:</label>
                        <input id="email" name="email" class="form-control">
                    </div>

                    <div class="form-group">
                        <label name="subject">Subject:</label>
                        <input id="subject" name="subject" class="form-control">
                    </div>

                    <div class="form-group">
                        <label name="message">Message:</label>
                        <textarea id="message" name="message" class="form-control">Type your message here...</textarea>
                    </div>

                    <div class="g-recaptcha" data-sitekey="6Ldgd1wUAAAAAEZJ9Htq8DQhIjEhkrLnGPIXovyF"></div>

                    <input type="submit" value="Send Message" class="btn btn-success btn-h1-spacing">
                </form>
            </div>
        </div>
@endsection

@section('scripts')

    <script>
        $(function() {
            $('#form').submit(function(event) {
                var verified = grecaptcha.getResponse();
                if(verified.length === 0) {
                    event.preventDefault();
                }
            });
        });
    </script>

@endsection