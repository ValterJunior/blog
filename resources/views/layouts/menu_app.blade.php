@extends('layouts.app')

@section('scripts_header')
   <link rel="stylesheet" type="text/css" href="{{url('css/dashboard.css')}}" />
@endsection

@section('left-menu')

   <ul class="nav nav-sidebar">
      <li><h3 class="subtitle-menu-left"><i class="fa fa-tag"></i> Tags</h3></li>
   </ul>

   <ul class="nav nav-sidebar">

      @if( $_menu_tags->count() > 0 )

         @foreach( $_menu_tags as $tag )
            <li><a href="{{url('/') . '?type=t?search=' . $tag->name }}">{{ ucfirst($tag->name) }}</a></li>
         @endforeach

      @else
         <li><h5 class="subtitle-menu-left">There are no tags to filter</h5><li>
      @endif

   </ul>

   <ul class="nav nav-sidebar">
      <li><h3 class="subtitle-menu-left"><i class="fa fa-archive"></i> Archives</h3></li>
   </ul>

   <ul class="nav nav-sidebar">

      @if( $_menu_archives->count() > 0 )

         @foreach( $_menu_archives as $archive )
            <li><a href="{{ url('/') . '?type=a?search=' . $archive->month . '?year=' . $archive->year }}">{{ DateTime::createFromFormat('!m', $archive->month)->format('F') . ', ' . $archive->year }}</a></li>
         @endforeach

      @else
         <li><h5 class="subtitle-menu-left">There are no tags to filter</h5><li>
      @endif


   </ul>
   
</div>

@endsection

@section('top-menu-right')

   @parent


   {!! Form::open( [ 'class' => 'navbar-form navbar-right', 'method' => 'GET', 'action' => 'HomeController@index' ] ) !!}
      <input type="hidden" name="type" value="s">
      <input type="text" class="form-control" name="search" id="search" placeholder="Search...">
   {!! Form::close() !!}

@endsection