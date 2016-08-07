@extends('layouts.nomenu_app')

@section('scripts_header')
    <link rel="stylesheet" type="text/css" href="{{url('css/errors.css')}}" />
@endsection

@section('content')

    <div class="error-template">

        <h1>Oops!</h1>

        <h2>404 Not Found</h2>

        <div class="error-details">
            Sorry, an error has occured, Requested page not found!
        </div>

        <div class="error-actions">
            <a href="{{ action('HomeController@index') }}" class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-home"></span>
                Take Me Home </a><a href="#" class="btn btn-default btn-lg"><span class="glyphicon glyphicon-envelope"></span> Contact Support </a>
        </div>

    </div>

@endsection