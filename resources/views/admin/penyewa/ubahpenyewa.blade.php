@extends('admin/master')

@section('konten')
	 <div class="row">
        <div class="col-lg-12"><br>
          <ol class="breadcrumb">
            <li>
                <i class="fa fa-table"></i><a href="{{url('/admin/penyewa')}}"> Penyewa</a>
            </li>
            <li class="active">
                <i class="fa fa-plus-square"></i> Ubah Penyewa
            </li>
                </ol>
                </div>
            <div class="col-lg-12" style="margin-top:-30px;">
               <h1 class="page-header">Ubah Penyewa</h1>
            </div>
          <div class="col-lg-12">

            <div class="col-lg-7">
               <form action="{{url('/admin/penyewa/'.$penyewa->id_penyewa.'/ubah')}}" method="post">
                  <div class="form-group">
                      <label class="control-label col-sm-4 text-left" style="margin-top:5px;"> Nama Penyewa </label>
                      <div class="col-sm-8">
                         <input type="text" class="form-control" name="nama_penyewa" value="{{$penyewa->nama_penyewa}}">
                      </div> <br><br>
                  </div>
                  <div class="form-group">
                      <label class="control-label col-sm-4 text-left" style="margin-top:5px;">Username </label>
                      <div class="col-sm-8">
                          <input type="text" class="form-control" name="username" value="{{$penyewa->username}}">
                      </div> <br><br>
                  </div>
                  <div class="form-group">
                      <label class="control-label col-sm-4 text-left" style="margin-top:5px;"> Password </label>
                      <div class="col-sm-8">
                          <input type="password" class="form-control" name="password" value="{{$penyewa->password}}" disabled>
                      </div> <br><br>
                  </div>
                  <div class="form-group">
                      <label class="control-label col-sm-4 text-left" style="margin-top:5px;"> KTP </label>
                      <div class="col-sm-8">
                          <input type="text" class="form-control" name="ktp" value="{{$penyewa->ktp}}">
                      </div> <br><br>
                  </div>
                  <div class="form-group">
                      <label class="control-label col-sm-4 text-left" style="margin-top:5px;"> No.Telp/HP </label>
                      <div class="col-sm-8">
                          <input type="text" class="form-control" name="no_telepon" value="{{$penyewa->no_telepon}}">
                      </div> <br><br>
                  </div>
                  <div class="form-group">
                      <label class="control-label col-sm-4 text-left" style="margin-top:5px;"> Usia </label>
                      <div class="col-sm-8">
                          <input type="text" class="form-control" name="usia" value="{{$penyewa->usia}}">
                      </div> <br><br>
                  </div>
                  <div class="form-group">
                      <label class="control-label col-sm-4 text-left" style="margin-top:5px;"> Tanggal Lahir </label>
                      <div class="col-sm-8">
                          <input type="text" class="form-control" name="tgl_lahir" value="{{$penyewa->tgl_lahir}}">
                      </div> <br><br>
                  </div>
                  <div class="form-group">
                      <label class="control-label col-sm-4 text-left" style="margin-top:5px;"> Alamat </label>
                      <div class="col-sm-8">
                      <textarea class="form-control" rows="3" id="comment" name="alamat">{{$penyewa->alamat}}</textarea><br>
                      <input type="submit" class="btn btn-primary btn-md" name="simpan" value="Simpan">                      
                      </div> 
                  </div>
                  
                  {{csrf_field()}}
                  <input type="hidden" name="_method" value="PUT">
               </form>
            </div>
            <div class="col-lg-5">
                <div class="panel panel-dafault">
                    <div class="panel panel-body"> 
                      <img id="prv" src="/rentalcamping/storage/app/uploadfoto/penyewa/{{$penyewa->id_penyewa}}/{{$penyewa->foto}}" class="img-responsive" alt="Image">
                    </div>
                </div>
            </div>
          </div>
    </div>
@endsection