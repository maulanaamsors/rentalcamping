<!-- Author : Maulana Amsor S  -->
@extends('master');

@section('konten')
<div class="container">
	<div class="col-xs-6 col-xs-offset-3" style="background-color: #00A1F1;margin-top:30px"><center><h3 style="color:#ffffff">.: Login :.</h3></center></div>
	<div class="col-xs-6 col-xs-offset-3" style="background-color:#efefef; border-radius: 0px; padding-top: 2%; padding-bottom: 2%;margin-bottom:125px">
		<form method="POST" action="{{ action('LoginController@cekLoginPenyewa') }}">
		 {{ csrf_field() }}

            @if ( (count($errors) > 0 ) || (session('status') == 'salah') )
                <div class="alert alert-danger alert-dismissable">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">x</a>
                    Maaf, Username dan Password Anda Salah !
                </div>
            @endif		 
			<div class="form-group has-feedback">
			    <input type="text" class="form-control" placeholder="Username" name="username" />
			    <i class="glyphicon glyphicon-user form-control-feedback"></i>
			</div>
			<div class="form-group has-feedback">
			    <input type="password" class="form-control" placeholder="Password" name="password" />
			    <i class="glyphicon glyphicon-lock form-control-feedback"></i>
			</div>
			<center><input type="submit" name="login" class="btn btn-primary btn-md" style="background-color: #00A1F1" value="Log In"> <br>
		</form>
			<a href="{{url('signup')}}" style="font-size: 8pt;">Sign Up</a></center>
	</div>
</div>
</div><br</div>

@endsection	

@section('csstambahan')
	<style type="text/css">

	.col-xs-6{
			border-radius: 20px 20px 0px 0px;
		}
		
	</style>


@endsection