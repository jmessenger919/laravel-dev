@extends('main')

@section('styles')
    
@stop

@section('title', 'Register')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card card-block cardPadding">
                <h1 class="card-title textCenter">Register</h1>
                <hr>
                <div class="card-text">
                    <form id="registerForm" class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}" data-parsley-validate novalidate>
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label offset-md-1">Name</label>
    
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required maxlength="255" minlength="1" autofocus>
    
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label offset-md-1">E-Mail Address</label>
    
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required maxlength="255" minlength="5">
    
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="col-md-4 control-label offset-md-1">Password</label>
    
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" required maxlength="60" minlength="8">
    
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <label for="password-confirm" class="col-md-4 control-label offset-md-1">Confirm Password</label>
    
                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required maxlength="255" minlength="8" data-parsley-equalto="#password">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <div class="col-md-6 offset-md-5">
                                    <button type="submit" class="btn btn-primary">
                                        Register
                                    </button>
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