@extends('main')

@section('styles')
    
@stop

@section('title', 'Login')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card card-block cardPadding">
                <h1 class="card-title textCenter">Reset Password</h1>
                <hr>
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/email') }}" data-parsley-validate novalidate>
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label offset-md-1">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required required maxlength="255" minlength="5" autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 offset-md-5 col-sm-12 smallMarginTop">
                                    <button type="submit" class="btn btn-block btn-primary">
                                        Reset Password
                                    </button>
                                </div>
                                <div class="col-md-2 col-sm-12 smallMarginTop">
                                    <a href="/login" class="btn btn-block btn-secondary">Cancel</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('scripts')
    
    {!! Html::script('js/parsley.min.js') !!}
    
@stop