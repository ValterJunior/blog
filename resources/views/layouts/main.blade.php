<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Awesome Blog!</title>

  <!-- Fonts -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

  <link rel="stylesheet" type="text/css" href="{{url('css/app.css')}}" />

  @yield('scripts_header')

  <style>

      body {
         font-family: 'Lato';
      }

      .fa-btn {
         margin-right: 6px;
      }

   </style>

</head>

<body id="app-layout">
  <nav class="navbar navbar-default navbar-static-top">
    <div class="container">
      <div class="navbar-header">

        <!-- Collapsed Hamburger -->
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
          <span class="sr-only">Toggle Navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
       </button>

       <!-- Branding Image -->
       <a class="navbar-brand" href="{{ url('/') }}">
        Awesome Blog!
     </a>
  </div>

  <div class="collapse navbar-collapse" id="app-navbar-collapse">
   @yield('top-menu')
</div>

</div>
</nav>

<div class="container">
 <div class="row">
   <div class="col-md-2">
      @yield('left-menu')
   </div>
   <div class="col-md-8">
      @yield('content')
   </div>
   <div class="col-md-2"></div>
 </div>
</div>

</div>

<script src="{{ url('js/app.js')}}"></script>
@yield('scripts_footer')

</body>
</html>
