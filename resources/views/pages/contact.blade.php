@extends('main')

@section('styles')

@stop

@section('title')
    Contact
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>Contact Me</h1>
            <hr>
            <form>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="text" name="email" id="email" class="form-control" />
                </div>
                <div class="form-group">
                    <label for="subject">Subject:</label>
                    <input type="text" name="subject" id="subject" class="form-control" />
                </div>
                <div class="form-group">
                    <label for="message">Message:</label>
                    <textarea name="message" id="message" class="form-control" />Type your message here...</textarea>
                </div>
                <input type="submit" name="submit" id="submit" class="btn btn-success" />
            </form>
        </div>
    </div>
@stop

@section('scripts')

@stop