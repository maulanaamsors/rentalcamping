<html lang="en">
<head>
    <title> Admin RC | LOGIN </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}" >
    <script src="{{asset('bootstrap/js/jquery.min.js') }}"> </script>
    <script src="{{asset('bootstrap/js/bootstrap.min.js') }}"> </script> 
    <style type="text/css">
    </style>
</head>

<body>
	<div class="container">
    <div class="row">
    <div class="center-block">
        <div class="col-md-6 col-md-offset-3" style="margin-top:100px">
            <div class="panel panel-primary">
                <div class="panel-heading" ><b>Login</b></div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ action('LoginController@cekLoginAdmin') }}">
                        {{ csrf_field() }}

                        @if ( (count($errors) > 0 ) || (session('status') == 'salah') )
                            <div class="alert alert-danger alert-dismissable">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">x</a>
                                 Maaf, Username dan Password Anda Salah !
                            </div>
                        @endif

                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">Username</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="username" value="{{ old('username') }}">
                            </div><br><br>
                        </div>
                        <div class="form-group">
                            <label for="password" class="col-md-4 control-label">Password</label>
                            <div class="col-md-7">
                                <input type="password" class="form-control" name="password">
                            </div><br><br>
                        </div>
                        <div class="form-group">
                            <div class="col-md-7 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


</body>

</html>