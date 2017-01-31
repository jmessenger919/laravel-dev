@extends('main')

@section('styles')
    
@stop

@section('title', 'Home')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="jumbotron">
                <h1 class="display-3">Welcome to My Blog!</h1>
                <p class="lead">Thank you so much for visiting. This is my test website built with Laravel. Please read my latest post!</p>
                <hr class="my-2">
                <p>Thanks for being an awesome human. :)</p>
                <p class="lead">
                    <a class="btn btn-primary btn-lg" href="#" role="button">Popular Post</a>
                </p>
            </div>
        </div>
    </div>
    <!-- Jumbotron End -->
    <div class="row">
        <div class="col-md-8">
            
            @foreach($posts as $post)
            
                <div class="post">
                    <h3>{{ $post->title }}</h3>
                    <p>
                        {{ substr($post->body, 0, 300) }}
                        {{ strlen($post->body) > 300 ? "..." : "" }}
                    </p>
                    <a href="{{ url('blog/' . $post->slug) }}" class="btn btn-primary">Read More</a>
                </div>
                
                <hr>
            
            @endforeach
            
        </div>
        <div class="col-md-3 offset-md-1">
            <h1>Sidebar</h1>
        </div>
    </div>
@stop

@section('scripts')

@stop