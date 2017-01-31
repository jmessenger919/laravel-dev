@extends('main')

@section('title', 'All Posts')

@section('content')

    <div class="row">
        <div class="col-md-9">
            <h1>
                All Posts
            </h1>
        </div>
        <div class="col-md-3">
            <a href="{{ route('posts.create') }}" class="btn btn-primary btn-block btn-h1-spacing">
                Create Post
            </a>
        </div>
        <div class="col-md-12">
            <hr>
        </div>
    </div>
    
    <div class="row" id="postAdminView">
        <div class="col-md-12">
            <table class="table">
                <thead>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Body</th>
                    <th>Created On</th>
                    <th></th>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                    
                        <tr>
                            <th>{{ $post->id }}</th>
                            <td>{{ $post->title }}</td>
                            <td>{{ substr($post->body, 0, 50) }}{{ strlen($post->body) > 50 ? "..." : "" }}</td>
                            <td>{{ date('M jS, Y', strtotime($post->created_at)) }}</td>
                            <td>
                                <a href="{{ route('posts.show', $post->id) }}" class="btn btn-secondary btn-sm">View</a>
                                <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                {!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'DELETE', 'class' => 'inline']) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    
                    @endforeach
                </tbody>
            </table>
            <div class="text-xs-center">
                    {!! $posts->links( 'vendor.pagination.bootstrap-4' ) !!} <!-- Bootstrap 4 Pagination SOURCE: https://www.laravel.com/docs/5.3/pagination#customizing-the-pagination-view -->
            </div>
        </div>
    </div>

@stop