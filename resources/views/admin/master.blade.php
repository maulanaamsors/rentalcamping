<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin | RC</title>
    <!-- link / js on internet -->
    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.min.css" />
 
    <!-- Jquery css date picker -->
    
    
    <link href="{{asset('bootstrap2/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('bootstrap2/metisMenu/metisMenu.min.css')}}" rel="stylesheet">
    <link href="{{asset('bootstrap2/dist/css/sb-admin-2.css')}}" rel="stylesheet">

    <!-- Tables -->
    <link href="{{asset('bootstrap2/datatables-plugins/dataTables.bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('bootstrap2/datatables-responsive/dataTables.responsive.css')}}" rel="stylesheet">

    <link href="{{asset('bootstrap2/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    <!-- tambah row pake jquery -->
     @yield('head')
 
</head>

<body>

    <div id="wrapper" >

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Admin Rental Camping</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <!-- /.dropdown -->
                <li class="dropdown">
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> {{session('username')}} </a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="{{url('admin/logout')}}"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation" >
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="{{url('admin/beranda')}}"><i class="fa fa-dashboard fa-fw"></i>Beranda</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Barang<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{url('admin/barang')}}">Data Barang</a>
                                </li>

                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Transaksi Penyewaan<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{url('admin/transaksipenyewaan/tambah')}}">Tambah Sewa</a>
                                </li>
                                <li>
                                    <a href="{{url('admin/transaksipenyewaan')}}">Kelola Penyewaan</a>
                                </li>
                                <li>
                                    <a href="{{url('admin/transaksipenyewaan/konfirmasi')}}">Konfirmasi Penyewaan</a>
                                </li>

                            </ul>
                            <!-- /.nav-second-level -->
                        </li>           
                        <li>
                            <a href="#"><i class="fa fa-user fa-fw"></i> Users <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{url('admin/penyewa')}}">Penyewa</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li> 
                        <li>
                            <a href="{{url('admin/pengembalian')}}"><i class="fa fa-bar-chart-o fa-fw"></i> Data Pengembalian</a>
                        </li>                    
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper" >
           @yield('konten')
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="{{asset('bootstrap2/jquery/jquery.min.js')}}"></script>

    <script src="{{asset('bootstrap2/bootstrap/js/bootstrap.min.js')}}"></script>

    <script src="{{asset('bootstrap2/metisMenu/metisMenu.min.js')}}"></script>

    <script src="{{asset('bootstrap2/datatables/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('bootstrap2/datatables-plugins/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{asset('bootstrap2/datatables-responsive/dataTables.responsive.js')}}"></script>
    <script src="{{asset('bootstrap2/bootstrap/js/bootstrap-datepicker.js')}}"></script>
    <script src="{{asset('bootstrap2/dist/js/sb-admin-2.js')}}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>
    
    <!-- buat datepicker jquery -->


<script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>
</body>
    @yield('footer')

</html>
