<!doctype html>
<html class="no-js" lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Photo Gallery</title>
    <link rel="stylesheet" href="/photogallery/public/css/foundation.css">
    <link rel="stylesheet" href="/photogallery/public/css/app.css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  </head>
  <body>
        
    <div class="off-canvas position-left reveal-for-large" id="my-info" data-off-canvas>
  <div class="grid-y grid-padding-x" style="height: 100%;">
    <br>
    <div class="cell shrink">
      
    </div>
    <div class="cell auto">
      <h5>Main Menu</h5>
        <ul class = "side-nav"> 
            <li><a href=<?php echo url("/")?> >Home</a></li>
            
            <?php if(!Auth::check()) : ?>
                <li><a href=<?php echo url("/")?>/login>Login</a></li>
                <li><a href=<?php echo url("/")?>/register>Register</a></li>
            <?php endif ?>  
            
            <?php if(Auth::check()) : ?>
              <li><a href=<?php echo url("/")?>/gallery/create>Create Gallery</a></li>
              <li><a href=<?php echo url("/")?>/logout>Logout</a></li>
            <?php endif ?>  
            
        </ul>
    </div>
  </div>
</div>

<div class="off-canvas-content" data-off-canvas-content>
  <div class="title-bar hide-for-large">
    <div class="title-bar-left">
      <button class="menu-icon" type="button" data-toggle="my-info"></button>
      <span class="title-bar-title"></span>
    </div>
  </div>

  @if(Session::has('message'))
  <div data-alertclass="alert-box">
      {{Session::get('message')}}
  </div>
  @endif 
  @yield('content')
</div>
    <script src="/photogallery/public/js/vendor/jquery.js"></script>
    <script src="/photogallery/public/js/vendor/what-input.js"></script>
    <script src="/photogallery/public/js/vendor/foundation.js"></script>
    <script src="/photogallery/public/js/app.js"></script>
    
  </body>
</html>