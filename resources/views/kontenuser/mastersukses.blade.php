<?php
  function current_page($uri = "/"){
      return request()->path() == $uri;

  }
?>  


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
        <?php
            $id_penyewa = session('id_penyewa');
            $username = session('username');
        ?>
      <a class="navbar-brand" href="#"><b>Kompas RC</b></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="{{current_page(''.$id_penyewa.'/'.$username.'/alatcamping') ? 'active': ''}}">
        <a href="{{url(''.$id_penyewa.'/'.$username.'/alatcamping')}}"> Alat Camping </a></li>

          <li class="{{current_page(''.$id_penyewa.'/'.$username.'') ? 'active': ''}}"><a href="{{url(''.$id_penyewa.'/'.$username.'')}}"> 
          <span class="glyphicon glyphicon-user"></span> {{session('username')}} </a></li>
          <input type="hidden" name="id_penyewa" value="{{session('id_penyewa')}}"> 
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="{{current_page(''.$id_penyewa.'/'.$username.'/tambahsewa') ? 'active': ''}}"><a href="{{url(''.$id_penyewa.'/'.$username.'/tambahsewa')}}">
          <span class="glyphicon glyphicon-plus"></span> Sewa </a>
        </li> 
        <li class="{{current_page(''.$id_penyewa.'/'.$username.'/pengaturanakun') ? 'active': ''}}"><a href="{{url(''.$id_penyewa.'/'.$username.'/pengaturanakun')}}">
           <span class="glyphicon glyphicon-cog"></span> </a>
        </li> 
        <li class="{{current_page('logout') ? 'active': ''}}"><a href="{{url('logout')}}">
          Logout <span class="glyphicon glyphicon-log-out"></span></a>
        </li> 
     
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
    @yield('footer');
</html>
