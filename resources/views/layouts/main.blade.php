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
    <link rel="stylesheet" type="text/css" href="/css/app.css" />
    <link rel="stylesheet" type="text/css" href="/css/dashboard.css" />

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

    <nav class="navbar navbar-inverse navbar-fixed-top">

      <div class="container-fluid">

        <div class="navbar-header">

          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>

          <a class="navbar-brand" href="{{ action('HomeController@index') }}">Awesome Blog!</a> <div class="develop hidden-xs">Developed by <a href="https://valterjunior.github.io" target="_blank">Valter Oliveira</a></div>


        </div>

        <div id="navbar" class="navbar-collapse collapse">
          @yield('top-menu-right')
        </div>

      </div>

    </nav>

    <div class="container" style="margin-top:20px;">

      <div class="row">

         <div class="col-sm-3 col-md-2">
            @yield('left-menu')
         </div>

         <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

            <h1 class="page-header">Awesome Blog!</h1>

            <div class="row">
              @yield('content')
            </div>

         </div>

      </div>

    </div>

    <script src="/js/app.js"></script>

    @yield('scripts_footer')

  </body>

</html>
