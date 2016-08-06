@extends('layouts.app')

@section('left-menu')

    <div class="navbar navbar-default navbar-fixed-left" style="max-height:100px">
      <ul class="nav navbar-nav">
       <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Labels <span class="caret"></span></a>
         <ul class="dropdown-menu" role="menu">
          <li><a href="#">Sub Menu1</a></li>
          <li><a href="#">Sub Menu2</a></li>
          <li><a href="#">Sub Menu3</a></li>
          <li class="divider"></li>
          <li><a href="#">Sub Menu4</a></li>
          <li><a href="#">Sub Menu5</a></li>
         </ul>
       </li>
       <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Archives <span class="caret"></span></a>
         <ul class="dropdown-menu" role="menu">
          <li><a href="#">Sub Menu1</a></li>
          <li><a href="#">Sub Menu2</a></li>
          <li><a href="#">Sub Menu3</a></li>
          <li class="divider"></li>
          <li><a href="#">Sub Menu4</a></li>
          <li><a href="#">Sub Menu5</a></li>
         </ul>
       </li>
      </ul>
    </div>

@endsection