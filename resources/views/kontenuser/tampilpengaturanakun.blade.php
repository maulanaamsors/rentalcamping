@extends('kontenuser/mastersukses');

@section('konten')

<div class="container">
 <div class="row" style="margin-top:15px;">
    <div class="col-sm-4 col-md-4" >

      <?php
         $id_penyewa = $penyewa->id_penyewa;
         $username = $penyewa->username;
      ?>
      <form action="{{url(''.$id_penyewa.'/'.$username.'/simpanpengaturanakun')}}" method="post" enctype="multipart/form-data">
      <div class="panel panel-primary">
        <div class="panel-body"><img id="prv" src="/rentalcamping/storage/app/uploadfoto/penyewa/{{$penyewa->id_penyewa}}/{{$penyewa->foto}}" class="img-responsive" alt="Image"></div>
      </div>
          <span class="btn btn-default btn-file" style="margin-top:-5%; margin-bottom:5%;">
            Pilih Foto <input type="file" name="foto" onchange="readURL(this);">
          </span> 
   </div>

   <div class="col-sm-8">
      <div class="panel-group" style="background-color:white;">
      <div class="panel panel-default" style="border-color:blue;">
       <div class="panel-heading"><h4> Akun <br> </h4> <h6> Ubah pengaturan dasar akun Anda. </h6></div>
        <div class="panel-body">

          <div class="form-group">
              <label class="control-label col-sm-2 text-right" style="margin-top:5px;" for="nama"> Nama </label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="nama_penyewa" value="{{$penyewa->nama_penyewa}}"/>
              </div> <center> <p id="user"> </p> </center><br><br>
          </div>
          <div class="form-group">
              <label class="control-label col-sm-2 text-right" style="margin-top:5px;"> Username </label>
              <div class="col-sm-10">
              <input type="text" class="form-control" name="email" value="{{$penyewa->username}}"/>
              </div>
          </div><br><br><br>
          <div class="form-group">
              <label class="control-label col-sm-2 text-right" style="margin-top:5px;"> Password </label>
              <div class="col-sm-10">
              <input type="password" class="form-control" name="password" value="{{$penyewa->password}}"/>
              </div><br><br>
          </div>
      <div class="form-group has-feedback">
        <label class="control-label col-sm-2 text-right" > Tanggal lahir (MM/DD/YYYY) </label>
        <div class="col-sm-10">
        <input type="date" name="tgl_lahir" class="form-control" value="{{$penyewa->tgl_lahir}}" data-date-format="YYYY MM DD">
        </div><br><br>
      </div>
      <div class="form-group">
              <label class="control-label col-sm-2 text-right" style="margin-top:5px;" for="no_telepon"> No.Telp/HP </label>
              <div class="col-sm-10">
              <input type="text" class="form-control" name="no_telepon" value="{{$penyewa->no_telepon}}"/>
              </div> <center> <p id="user"> </p> </center><br><br>
       </div>
       <div class="form-group">
              <label class="control-label col-sm-2 text-right" style="margin-top:5px;" for="no_telepon"> KTP </label>
              <div class="col-sm-10">
              <input type="text" class="form-control" name="ktp" value="{{$penyewa->ktp}}"/>
              </div> <center> <p id="user"> </p> </center><br><br>
       </div>
       <div class="form-group">
              <label class="control-label col-sm-2 text-right" style="margin-top:5px;" for="usia"> Usia </label>
              <div class="col-sm-10">
              <input type="number" class="form-control" name="usia" value="{{$penyewa->usia}}"/>
              </div> <center> <p id="user"> </p> </center><br><br>
       </div>
       <div class="form-group">
              <label class="control-label col-sm-2 text-right" style="margin-top:5px;" for="no_rek"> No.Rekening </label>
              <div class="col-sm-10">
              <input type="text" class="form-control" name="no_rek" value="{{$penyewa->no_rek}}"/>
              </div> <center> <p id="user"> </p> </center><br><br>
       </div>
       <div class="form-group">
              <label class="control-label col-sm-2 text-right" style="margin-top:5px;" for="alamat"> Alamat </label>
              <div class="col-sm-10">
              <textarea class="form-control" name="alamat" value="{{$penyewa->alamat}}"/>{{$penyewa->alamat}} </textarea>
              </div> <center> <p id="user"> </p> </center><br><br>
       </div><br
           <div class="form-group">
              <label class="control-label col-sm-2 text-right" style="margin-top:5px;" for="alamat"> &nbsp; </label>
              <input type="submit" name="update" class="btn btn-primary btn-md" style="margin-left:2%" value="Simpan"/>

              {{csrf_field()}}
              <input type="hidden" name="_method" value="PUT">
           </div>
        </form>
        </div>
        </div>
      </div>
    </div>

        
 </div>
</div>

</div>
</div>
</div>


@endsection	