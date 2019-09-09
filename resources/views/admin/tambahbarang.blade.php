@extends('admin/master')

@section('konten')
	 <div class="row">
        
        <div class="col-lg-12"><br>
          <ol class="breadcrumb">
            <li>
                <i class="fa fa-table"></i><a href="{{url('/admin/barang')}}"> Barang</a>
            </li>
            <li class="active">
                <i class="fa fa-plus-square"></i> Tambah Barang
            </li>
                </ol>
                </div>
        
            
                <div class="col-lg-12" style="margin-top:-30px;">
                    <h1 class="page-header">Tambah Barang</h1>
                </div>

            <div class="col-lg-12">
               <form action="{{url('/admin/barang')}}" method="post" enctype="multipart/form-data">
                  <div class="form-group">
                      <label class="control-label col-sm-2 text-left" style="margin-top:5px;"> Foto Barang </label>
                      <div class="col-sm-4">
                        <input type="file" class="form-control" name="foto" onchange="readURL(this);" value="{{old('foto')}}">
                        @if($errors->has('foto'))  
                          <font color="red">{{$errors->first('foto')}} </font>
                        @endif                   
                      </div> <br><br>
                  </div>
                  <div class="form-group">
                      <label class="control-label col-sm-2 text-left" style="margin-top:5px;"> Nama Barang </label>
                      <div class="col-sm-4">
                         <input type="text" class="form-control" name="nama_brg" value="{{old('nama_brg')}}">
                         @if($errors->has('nama_brg'))  
                          <font color="red">{{$errors->first('nama_brg')}} </font>
                         @endif   
                      </div> <br><br>
                  </div>
                  <div class="form-group">
                      <label class="control-label col-sm-2 text-left" style="margin-top:5px;"> Jenis Barang </label>
                      <div class="col-sm-4">
                       <select class="form-control" name="jenis_brg" value="{{old('jenis_brg')}}">
                         <option value="Tenda">Tenda</option>
                         <option value="Alat Pribadi">Alat Pribadi</option>
                         <option value="Alat Masak" >Alat Masak</option>
                         <option value="Alat Komunikasi">Alat Komunikasi</option>
                       </select>
                      </div> <br><br>
                  </div>
                  <div class="form-group">
                      <label class="control-label col-sm-2 text-left" style="margin-top:5px;"> Stok </label>
                      <div class="col-sm-4">
                         <input type="text" class="form-control" name="stok" value="{{old('stok')}}">
                         @if($errors->has('stok'))  
                          <font color="red">{{$errors->first('stok')}} </font>
                         @endif
                      </div> <br><br>
                  </div>
                  <div class="form-group">
                      <label class="control-label col-sm-2 text-left" style="margin-top:5px;"> Harga Barang </label>
                      <div class="col-sm-4">
                         <input type="text" class="form-control" name="harga" value="{{old('harga')}}">
                         @if($errors->has('harga'))  
                          <font color="red">{{$errors->first('harga')}} </font>
                         @endif
                      </div> <br><br>
                  </div>
                  <div class="form-group">
                      <label class="control-label col-sm-2 text-left" style="margin-top:5px;"> Kapasitas </label>
                      <div class="col-sm-4">
                         <input type="text" class="form-control" name="kapasitas" value="{{old('kapasitas')}}">
                         @if($errors->has('kapasitas'))  
                          <font color="red">{{$errors->first('kapasitas')}} </font>
                         @endif
                      </div> <br><br>
                  </div>
                  <div class="form-group">
                      <label class="control-label col-sm-2 text-left" style="margin-top:5px;"> &nbsp;</label>
                      <div class="col-sm-4">

                      <input type="submit" class="btn btn-primary btn-md" name="simpan" value="Simpan">                  
                      </div><br> 
                  </div>
                 
                  {{csrf_field()}}
               </form>
            </div>
      </div>
@endsection