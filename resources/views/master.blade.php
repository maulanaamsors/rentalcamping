
<?php
  function current_page($uri = "/"){
      return request()->path() == $uri;

  }
?>

<!-- Author : Maulana Amsor S -->
<!DOCTYPE html>
<html lang="en">
   <head>
   <title>Potong Kompas | Rental Camping Online</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}" >
      <script src="{{asset('bootstrap/js/jquery.min.js') }}"> </script>
      <script src="{{asset('bootstrap/js/bootstrap.min.js') }}"> </script> 
      <style type="text/css">
    
        .parallax {
            /* The image used */
            background-image: url("img/bg_tenda2.jpg");

            /* Set a specific height */
            min-height:750px; 
            margin-top:-20px;
            /* Create the parallax scrolling effect */
            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }

          .bg-4 { 
      background-color: #f7f7f7; /* Black Gray */
      color: black;
  }

      </style>
      @yield('csstambahan')
  </head>
<body>
        
  <nav class="navbar navbar-default" style="margin-top:-20px">
  <div class="container">
  
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#"><b>Kompas RC</b></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
      <li class="{{current_page('/') ? 'active': ''}}"><a href="{{url('/')}}">Home</a></li>
      <li class="{{current_page('alatcamping') ? 'active': ''}}"><a href="{{url('alatcamping')}}">Alat Camping</a></li>
      </ul>
      <form class="navbar-form navbar-left">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Cari Alat Camping" style="width:500px">
          <div class="input-group-btn">
            <button class="btn btn-default" type="submit">
              <i class="glyphicon glyphicon-search" style="height:20px"></i>
            </button>
          </div>
        </div>
      </form>
      <select>
        <option></option>
      </select>
      <ul class="nav navbar-nav navbar-right">
        <li class="{{current_page('signup') ? 'active': ''}}"><a href="{{url('signup')}}"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        <li class="{{current_page('login') ? 'active': ''}}"><a href="{{url('login')}}"><span class="glyphicon glyphicon-log-in" ></span> Log In</a></li> 
      </ul>
    </div>
  </div>
</nav>

@yield('konten')

<footer class="container-fluid bg-4"> 
  <div class="container">
     <div class="panel-footer">
     <p> Alamat : <br><span class="glyphicon glyphicon-map-marker"></span> Jl.Gagak No.152, Sadang Serang Kota Bandung  </a></p>
     <p> Kontak : <br><span class="glyphicon glyphicon-envelope"></span> 0853-2000-8919 </a></p>
     <p> About : <br> Website Tugas RPLII © 2017 RPL-5 IF UNIKOM </a></p>
     </div> 
  </div>
</footer>
    </body>

</nav>
</html>
