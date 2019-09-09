@extends('admin/master')

@section('konten')
	 <div class="row">
        <div class="col-lg-12"><br>
          <ol class="breadcrumb">
            <li>
                <i class="fa fa-table"></i><a href="{{url('/admin/barang')}}"> Barang</a>
            </li>
            <li class="active">
                <i class="fa fa-plus-square"></i> Ubah Barang
            </li>
                </ol>
                </div>
            <div class="col-lg-12" style="margin-top:-30px;">
               <h1 class="page-header">Ubah Barang</h1>
            </div>
            <div class="col-sm-12">
              <div class="row">

            <div class="col-sm-7">
               <form action="{{url('/admin/barang/'.$barang->id_brg.'/ubah')}}" method="post" enctype="multipart/form-data">
                  <div class="form-group">
                      <label class="control-label col-sm-4 text-left" style="margin-top:5px;"> Upload Foto </label>
                      <div class="col-sm-8">
                       <input type="file" class="form-control" name="foto" value="{{$barang->foto}}">
                      </div> <br><br>
                  </div>

                  <div class="form-group">
                      <label class="control-label col-sm-4 text-left" style="margin-top:5px;"> Nama Barang </label>
                      <div class="col-sm-8">
                       <input type="text" class="form-control" name="nama_brg" value="{{$barang->nama_brg}}">
                      </div> <br><br>
                  </div>
                  <div class="form-group">
                      <label class="control-label col-sm-4 text-left" style="margin-top:5px;"> Jenis Barang </label>
                      <div class="col-sm-8">
                      <select class="form-control" name="jenis_brg" >
                      <?php
                        $jns_brg[0] = "Tenda";
                        $jns_brg[1] = "Alat Pribadi";
                        $jns_brg[2] = "Alat Masak";
                        $jns_brg[3] = "Alat Komunikasi";
 
                        $i = 0;
                          while ($i<=3) {
                            if($jns_brg[$i]!=$barang->jenis_brg){
                              ?>
                              <option value="<?php echo $jns_brg[$i]?>"><?php echo $jns_brg[$i]?></option>
                              <?php
                            }
                            else if($jns_brg[$i]==$barang->jenis_brg){
                              ?>
                              <option value="<?php echo $barang->jenis_brg ?>" selected><?php echo $barang->jenis_brg ?></option>
                              <?php
                            }
                          $i=$i+1;
                          }
                      ?>
                       
                         <!-- <option value="Tenda">Tenda</option>
                         <option value="Alat Pribadi">Alat Pribadi</option>
                         <option value="Alat Masak" >Alat Masak</option>
                         <option value="Alat Komunikasi">Alat Komunikasi</option> -->
                       </select>
                      </div> <br><br>
                  </div>
                  <div class="form-group">
                      <label class="control-label col-sm-4 text-left" style="margin-top:5px;"> Stok </label>
                      <div class="col-sm-8">
                       <input type="text" class="form-control" name="stok" value="{{$barang->stok}}">
                      </div> <br><br>
                  </div>
                  <div class="form-group">
                      <label class="control-label col-sm-4 text-left" style="margin-top:5px;"> Harga Barang </label>
                      <div class="col-sm-8">
                       <input type="text" class="form-control" name="harga" value="{{$barang->harga}}">
                      </div> <br><br>
                  </div>
                  <div class="form-group">
                      <label class="control-label col-sm-4 text-left" style="margin-top:5px;"> Kapasitas </label>
                      <div class="col-sm-8">
                       <input type="text" class="form-control" name="kapasitas" value="{{$barang->kapasitas}}">
                      </div> <br><br>
                  </div>
                  <div class="form-group">
                      <label class="control-label col-sm-4 text-left" style="margin-top:5px;">&nbsp;</label>
                      <div class="col-sm-8">
                      
                      <input type="submit" class="btn btn-primary btn-md" name="simpan" value="Simpan">                      
                      </div> 
                  </div>
                  
                  {{csrf_field()}}
                  <input type="hidden" name="_method" value="PUT">
               </form>
            </div>
            <div class="col-sm-5">
              <div class="col-sm-12">
                  <div class="panel panel-default">
                     <div class="panel panel-heading"> Foto</div>
                     <div class="panel panel-body">
                        <img id="prv" src="/rentalcamping/storage/app/uploadfoto/barang/{{$barang->foto}}" class="img-responsive" alt="Image">
                     </div>
                  </div>
              </div>
            </div>
            </div>
            </div>
    </div>
@endsection