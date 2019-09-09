@extends('master');

@section('konten')


<div class="container">
	<div class="col-xs-6 col-xs-offset-3" style="background-color: #00A1F1;margin-top:30px"><center><h3 style="color:#ffffff">.: Sign-Up :.</h3></center></div>
	<div class="col-xs-6 col-xs-offset-3" style="background-color:#efefef; border-radius: 0px; padding-top: 2%; padding-bottom: 2%;">
		<form method="POST" action="{{url('tambahakun')}}">
		 {{ csrf_field() }}
			<div class="form-group has-feedback">
			    <input type="text" class="form-control" placeholder="Username *" name="username" id="user" maxlength="20" value="{{old('username')}}"/>
			    <i class="glyphicon glyphicon-user form-control-feedback"></i>
			    @if($errors->has('username'))  
                          <font color="red">{{$errors->first('username')}} </font>
                @endif  
			</div>
			<p id="check-length-user" style="color:red;"></p>
			<div class="form-group has-feedback">
			    <input type="password" class="form-control" placeholder="Password *" name="password" id="password1" maxlength="20" value="{{old('password')}}"/>
			    <i class="glyphicon glyphicon-lock form-control-feedback"></i>
			    @if($errors->has('password'))  
                          <font color="red">{{$errors->first('password')}} </font>
                @endif  
			</div>
			 <p id="validate-status-p" style="color:red;"></p>
			<div class="form-group has-feedback">
			    <input type="text" class="form-control" placeholder="No. Telp/HP *" name="no_telepon" maxlength="12" value="{{old('no_telepon')}}" />
			    <i class="glyphicon glyphicon-envelope form-control-feedback"></i>
			    @if($errors->has('no_telepon'))  
                     <font color="red">{{$errors->first('no_telepon')}} </font>
                @endif  
			</div>
			<div class="form-group has-feedback">
			    <input type="text" class="form-control" placeholder="Nama *" name="nama_penyewa" maxlength="30" value="{{old('nama_penyewa')}}"/>
			    <i class="glyphicon glyphicon-font form-control-feedback"></i>
			    @if($errors->has('nama_penyewa'))  
                     <font color="red">{{$errors->first('nama_penyewa')}} </font>
                @endif  
			</div>
			<div class="form-group has-feedback">
			    <input type="date" class="form-control"  data-date-format="YYYY MM DD" placeholder="yyyy/mm/dd" name="tgl_lahir"  value="{{old('tgl_lahir')}}"/>
			    <i class="glyphicon glyphicon-font form-control-feedback"></i>
			    @if($errors->has('tgl_lahir'))  
                     <font color="red">{{$errors->first('tgl_lahir')}} </font>
                @endif  
			</div>
			<div class="form-group has-feedback">
			    <input type="text" class="form-control" placeholder="NO.KTP" name="ktp" maxlength="15" value="{{old('ktp')}}"/>
			    @if($errors->has('ktp'))  
                     <font color="red">{{$errors->first('ktp')}} </font>
                @endif  
			</div>
			<div class="form-group has-feedback">
			    <textarea class="form-control" placeholder="Alamat" name="alamat" value="{{old('alamat')}}"></textarea>
			    @if($errors->has('alamat'))  
                     <font color="red">{{$errors->first('alamat')}} </font>
                @endif      
			</div>
			<center><input type="submit" name="sign-up" class="btn btn-primary btn-md" style="background-color: #00A1F1" value="Simpan"> <br>
		</form>
			
	</div>
</div><br><br><br>


@endsection	

@section('csstambahan')
	<style type="text/css">

	.col-xs-6{
			border-radius: 20px 20px 0px 0px;
		}
		
	</style>


@endsection