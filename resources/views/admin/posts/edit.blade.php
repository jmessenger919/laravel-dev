@extends('main') 

@section('title', 'Edit Post')

@section ('content')

    <div class="row">
        {!! Form::model($post, ['route' => ['posts.update', $post->id], 'method' => 'PUT']) !!}
        <div class="col-md-8">
            {{ Form::label('title', 'Title:') }}
            {{ Form::text('title', null, ['class' => 'form-control form-control-lg']) }}
            {{ Form::label('slug', 'Slug:', ['class' => 'form-spacing-top']) }}
            {{ Form::text('slug', null, array('class' => 'form-control', 'required' => '', 'minlength' => '5', 'maxlength' => '255')) }}
            {{ Form::label('body', 'Body:', ['class' => 'form-spacing-top']) }}
            {{ Form::textarea('body', null, ['class' => 'form-control form-control-lg']) }}
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
                        {!! Html::linkRoute('posts.show', 'Cancel', array($post->id), array('class' => 'btn btn-secondary btn-block')) !!}
                    </div>
                    <div class="col-md-6">
                        {{ Form::submit('Save Changes', ['class' => 'btn btn-success btn-block']) }}
                    </div>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>

@stop