<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/app.css" />
    <script type="text/javascript" src="js/app.js"></script>
    <title>View Template that use Bootstrap</title>
  </head>

  <body>

<div class="page-header">
  <h1 class="text-center">Awesome Blog</h1>
</div>

<div class="navbar navbar-default navbar-fixed-left">
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
<div class="container">
 <div class="row">
   @yield('content')
 </div>
</div>

  </body>
</html>