@extends('layouts.app')

@section('left-menu')

   <div class="col-sm-3 col-md-2 sidebar">

      <ul class="nav nav-sidebar">
         <li><h3 class="subtitle-menu-left"><i class="fa fa-tag"></i> Tags</h3></li>
      </ul>

      <ul class="nav nav-sidebar">

         @if( $_menu_tags->count() > 0 )

            @foreach( $_menu_tags as $tag )
               <li><a href="{{action('HomeController@index', [ '' => '', 'type' => 't', 'search' => $tag->id]) }}">{{ ucfirst($tag->name) }}</a></li>
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
               <li><a href="{{ action('HomeController@index', [ '' => '', 'type' => 'a', 'search' => $archive->month, 'year' => $archive->year ]) }}">{{ DateTime::createFromFormat('!m', $archive->month)->format('F') . ', ' . $archive->year }}</a></li>
            @endforeach

         @else
            <li><h5 class="subtitle-menu-left">There are no tags to filter</h5><li>
         @endif


      </ul>
   
   </div>

@endsection