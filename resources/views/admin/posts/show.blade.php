@extends('main') 

@section('title', 'View Post')

@section ('content')

    <div class="row">
        <div class="col-md-8">
            <h1>{{ $post->title }}</h1>
            <p class="lead">{{ $post->body }}</p>
        </div>
        <div class="col-md-4">
            <div class="card cardPadding">
                <dl class="list-group list-group-flush" style="text-align:center;">
                    <dt style="display:inline;">Post Slug:</dt>
                    <dd style="display:inline;"><a href="{{ url('blog/' . $post->slug) }}">{{ url('blog/' . $post->slug) }}</a></dd>
                </dl>
                <dl class="list-group list-group-flush" style="text-align:center;">
                    <dt style="display:inline;">Created On:</dt>
                    <dd style="display:inline;">{{ date( 'M jS, Y g:ia', strtotime($post->created_at)) }}</dd>
                </dl>
                <dl class="list-group list-group-flush" style="text-align:center;">
                    <dt style="display:inline;">Last Updated:</dt>
                    <dd style="display:inline;">{{ date( 'M jS, Y g:ia', strtotime($post->updated_at)) }}</dd>
                </dl>
                <div class="row smallMarginTop">
                    <div class="col-md-6">
                        {!! Html::linkRoute('posts.edit', 'Edit', array($post->id), array('class' => 'btn btn-warning btn-block')) !!}
                    </div>
                    <div class="col-md-6">
                        {!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'DELETE']) !!}
                        
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) !!}
                        
                        {!! Form::close() !!}
                    </div>
                </div>
                <div class="row smallMarginTop">
                    <div class="col-md-12">
                        {!! Html::linkRoute('posts.index', '<< See All Posts', array(), array('class' => 'btn btn-secondary btn-block')) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop