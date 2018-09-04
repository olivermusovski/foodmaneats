@extends('main')

@section('title', '| Homepage')

@section('stylesheets')
    
    <!-- Twitter -->
    <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>

@endsection

@section('special')

    <div class="jumbo">
        <img src="{{ asset('images/logo.png') }}" alt="logo" height="250" width="300" class="logo">
    </div>

@endsection

@section('content')
        
        
        @php $count = 0; @endphp
        <div class="row">
            @foreach($posts as $post)
                @php $count++; @endphp
                <div class="col-lg-4 triplet">
                    <img src="{{ asset('images/' . $post->image) }}" alt="140x140" class="rounded-circle" width="140" height="140">
                    <h2>{{ $post->title }}</h2>
                    <p style="font-size: 14px;"><i class="far fa-calendar-alt" style="color: grey; margin-right: 5px;"></i>{{ date('F n, Y' ,strtotime($post->created_at)) }}</p>
                    <p>{{ substr(strip_tags($post->body), 0, 200) }}{{ strlen(strip_tags($post->body)) > 200 ? "..." : "" }}</p>
                    <a href="{{ route('blog.single', $post->slug) }}" class="btn btn-light btn-lg">Read More</a>
                </div>
                @php 
                if($count == 3) break; 
                @endphp
            @endforeach
        </div>

        <hr class="featurette-divider">
        
        @php
        $posts = $posts->slice(3);
        $count = 0;
        @endphp

        @foreach($posts as $post)
            @php $count++; @endphp
            <div class="row featurette">
                @php
                if($count == 2) {
                @endphp
                    <div class="col-md-7">
                        <h2 class="featurette-heading">{{ $post->title }}</h2>
                        <p class="featurette-p" style="font-size: 14px;"><i class="far fa-calendar-alt" style="color: grey; margin-right: 5px;"></i>{{ date('F n, Y' ,strtotime($post->created_at)) }}</p>
                        <p class="lead featurette-p">{{ substr(strip_tags($post->body), 0, 300) }}{{ strlen(strip_tags($post->body)) > 300 ? "..." : "" }}</p>
                        <a href="{{ route('blog.single', $post->slug) }}" class="btn btn-light btn-lg">Read More</a>
                    </div>
                    <div class="col-md-5">
                        <img class="featurette-image img-fluid mx-auto" src="{{ asset('images/' . $post->image) }}" alt="500x500" style="width: 500px; height: 500px;">
                    </div>
                @php
                } else {
                @endphp
                     
                    <div class="col-md-5">
                        <img class="featurette-image img-fluid mx-auto" src="{{ asset('images/' . $post->image) }}" alt="500x500" style="width: 500px; height: 500px;">
                    </div>
                    <div class="col-md-7">
                        <h2 class="featurette-heading">{{ $post->title }}</h2>
                        <p class="featurette-p" style="font-size: 14px;"><i class="far fa-calendar-alt" style="color: grey; margin-right: 5px;"></i>{{ date('F n, Y' ,strtotime($post->created_at)) }}</p>
                        <p class="lead featurette-p">{{ substr(strip_tags($post->body), 0, 300) }}{{ strlen(strip_tags($post->body)) > 300 ? "..." : "" }}</p>
                        <a href="{{ route('blog.single', $post->slug) }}" class="btn btn-light btn-lg">Read More</a>
                    </div>
                @php
                }
                @endphp
            </div>
            <hr class="featurette-divider">
         @endforeach

@endsection