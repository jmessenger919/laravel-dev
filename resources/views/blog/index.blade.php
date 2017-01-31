@extends('main')

@section('styles')
    
@stop

@section('title', 'Blog Index')

@section('content')

    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h1>Blog</h1>
        </div>
    </div>
    
    @foreach ($posts as $post)
    
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h2>{{ $post->title }}</h2>
                <h5>Published: {{ date('M j, Y', strtotime($post->created_at)) }}</h5>
                <p>{{ substr($post->body, 0, 250) }}{{ strlen($post->body) > 250 ? '...' : "" }}</p>
                <a href="{{ url('blog/' . $post->slug) }}" class="btn btn-primary">Read More</a>
            </div>
        </div>
        <hr>
    
    @endforeach
    
    <div class="row">
        <div class="col-md-12">
            <div class="textCenter">
                <div class="text-xs-center">
                    {!! $posts->links( 'vendor.pagination.bootstrap-4' ) !!} <!-- Bootstrap 4 Pagination SOURCE: https://www.laravel.com/docs/5.3/pagination#customizing-the-pagination-view -->
                </div>
            </div>
        </div>
    </div>
    
@stop

@section('scripts')

@stop