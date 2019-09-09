@extends('admin/master')

<!-- @section('head')
   <script>
        $(document).ready(function(){
            $("#tambahrow").click(function(){
                $("tbody").append("<tr> <td><select class='form-control nama_brg' name='nama_brg[]'><option value='0' selected='true' disabled='true'>Pilih Barang </option> @foreach ($databarang as $row2 => $key2) <option value='{{$row2}}'>{{$key2}}</option> @endforeach</select></td><td><input type='text' class='form-control jml_brg' name='jml_brg[]'></td><td><input type='text' class='form-control biaya_sewa' name='biaya_sewa[]'></td><td style='text-align:center;background:#eee'><a href='#' class='btn btn-danger btn-sm remove'><i class='glyphicon glyphicon-remove'></i></td></tr>");
            });
        });
    </script>
@endsection -->

@section('konten')


   <div class="row">
        <div class="col-lg-12"><br>
          <ol class="breadcrumb">
            <li>
                <i class="fa fa-table"></i><a href="{{url('/admin/transaksipenyewaan')}}"> Sewa</a>
            </li>
            <li class="active">
                <i class="fa fa-plus-square"></i> Tambah Sewa
            </li>
                </ol>
         </div>
        
        <div class="col-lg-12" style="margin-top:-30px;">
            <h1 class="page-header">Tambah Sewa</h1>
        </div>
        <div class="col-lg-12"> 
            <div class="panel panel-footer">
                <form action="{{url('admin/transaksipenyewaan')}}" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <div class="col-lg-12">

                          <label class="control-label col-sm-2 text-right" style="margin-top:5px;"> Nama Penyewa </label>
                          <div class="col-sm-4">
                              <input type="text" class="form-control nama_penyewa" name="nama_penyewa" value="{{old('nama_penyewa')}}">   
                              @if($errors->has('nama_penyewa'))  
                                <font color="red">Nama Penyewa Harus Diisi!</font><br>
                              @endif                                
                          </div> 
                          <label class="control-label col-sm-2 text-right" style="margin-top:5px;"> KTP </label>
                          <div class="col-sm-4">
                             <input type="text" class="form-control" name="ktp" value="{{old('ktp')}}" maxlength="16">
                              @if($errors->has('ktp'))  
                                <font color="red">KTP harus diisi dengan Angka Max:16</font><br>
                              @endif  
                          </div> <br><br>
                      </div>

                    </div> <!-- end class form-group -->
                    <div class="form-group">
                      <div class="col-lg-12">
                          <label class="control-label col-sm-2 text-right" style="margin-top:5px;"> Tgl Sewa </label>
                          <div class="col-sm-4">
                           <input type="date" class="form-control tgl_sewa" name="tgl_sewa" data-date-format="YYYY MM DD" placeholder="yyyy/mm/dd" value="{{old('tgl_sewa')}}"> 
                           @if($errors->has('tgl_sewa'))  
                                <font color="red">Tgl Sewa harus diisi sesuai Format Date</font><br>
                           @endif 
                          </div> 
                          <label class="control-label col-sm-2 text-right" style="margin-top:5px;"> Tgl Kembali </label>
                          <div class="col-sm-4">
                             <input type="date" class="form-control tgl_kembali" name="tgl_pengembalian" placeholder="yyyy/mm/dd" value="{{old('tgl_pengembalian')}}"> 
                             @if($errors->has('tgl_pengembalian'))  
                                  <font color="red">Tgl Pengembalian harus diisi sesuai Format Date</font><br>
                             @endif                           
                          </div> <br><br>
                      </div>

                    </div> <!-- end class form-group -->
                    <div class="form-group">
                      <div class="col-lg-12">
                          <label class="control-label col-sm-2 text-right" style="margin-top:5px;"> No Telepon </label>
                          <div class="col-sm-4">
                             <input type="text" class="form-control" id="no_telepon" name="no_telepon" value="{{old('no_telepon')}}" maxlength="12"> 
                              @if($errors->has('no_telepon'))  
                                <font color="red">No Telepon harus diisi dengan Angka max:12</font><br>
                              @endif 
                          </div>
                          <label class="control-label col-sm-2 text-right" style="margin-top:5px;"> Uang Muka </label>
                          <div class="col-sm-4">
                             <input type="text" class="form-control" id="uang_muka" name="uang_muka" value="{{old('uang_muka')}}"> 
                              @if($errors->has('uang_muka'))  
                                <font color="red">Uang Muka harus diisi dengan Angka</font><br>
                              @endif  
                          </div> <br><br>                 
                      </div>

                    </div>  <!-- end class form-group -->   
                    <div class="form-group">
                      <div class="col-lg-12">
                          <label class="control-label col-sm-2 text-right" style="margin-top:5px;"> Pilih Antar Barang </label>
                          <div class="col-sm-4">
                            <select class="form-control" name="keterangan_antar" >
                              <option value="Antar">Antar</option>
                              <option value="Tidak Antar">Tidak Antar</option>

                            </select>
                            <!-- <input type="text" class="form-control" name="keterangan_antar" "> -->  
                          </div> 
                          <label class="control-label col-sm-2 text-right" style="margin-top:5px;"> Alamat </label>
                          <div class="col-sm-4">
                            <textarea class="form-control" name="alamat" > {{old('alamat')}} </textarea>
                              @if($errors->has('alamat'))  
                                <font color="red">Alamat harus diisi</font>
                              @endif 
                          </div> 
                                            
                      </div>

                    </div>  <!-- end class form-group -->                    
                    <div class="form-group">
                      <div class="col-lg-12">
                          <label class="control-label col-sm-2 text-right" style="margin-top:5px;"> &nbsp; </label>
                          <div class="col-sm-4">
                            <a href="#" class="btn btn-danger addRow" style="margin-top:10px" title="Tambah">Tambah </a>
                          </div> <br><br>
                                            
                      </div>

                    </div>  <!-- end class form-group -->   
                    <input type="hidden" name="no_rek" value="-">
                    <input type="hidden" name="status" value="disewa">
                    
                    <div class="col-lg-12 col-sm-12" style="margin-top:15px">
                        <div class="form-group">
                        
                            <table class="table table-bordered">
                                <thread>
                                    <th width="40%">Nama Barang </th>
                                    <th width="20%">Harga Barang</th>
                                    <th width="15%">Jumlah</th>
                                    <th width="25%">Biaya </th>
                                
                                </thread>
                                    <tr>
                                        <td>
                                              <select class="form-control nama_brg" name="nama_brg[]">
                                                    <option value="" selected="true" disabled="true">Pilih Barang</option>   
                                                @foreach ($databarang as $row2 => $key2)  
                                                    <option value="{{$row2}}">{{$key2}}</option>
                                                @endforeach
                                              </select>
                                        </td>
                                        <td><input type="text" class="form-control harga" name="harga[]"></td>
                                        <td><input type="text" class="form-control jml_brg" name="jml_brg[]"></td>
                                        <td><input type="text" class="form-control biaya_sewa" name="biaya_sewa[]"></td>
                                      
                                    </tr>
                                <tfoot>
                                  <tr>    
                                      <td colspan="3" style="text-align:right"><b>Total</b></td>
                                      <td><b class="total"></b></td>
                                  </tr>
                                </tfoot>
    
                            </table> 
                            <div class="form-group">
                                  <div class="col-lg-8">
                                  </div>
                                  <div class="col-lg-4">
                                      <label class="control-label col-sm-2 text-right" style="margin-top:5px;"> &nbsp; </label>
                                      <div class="col-sm-4">
                                        <button type="submit" class="btn btn-primary" title="Sewa">Sewa </a>
                                      </div> <br><br>    
                                  </div>
                                </div>  <!-- end class form-group --> 
                            </div>
                    </div>.
                    {{csrf_field()}}
                </form>
            </div>

        </div>
      </div>

@endsection

@section('footer')
  
   <script type="text/javascript">



     $('tbody').delegate('.nama_brg','change',function(){
          var tr = $(this).parent().parent();
          var id_brg = tr.find('.nama_brg').val();
          var dataId ={'id_brg':id_brg};
          $.ajax({
              type   : 'GET',
              url    : '{{url('/admin/transaksipenyewaan/cariHargaBarang')}}',
              dataType : 'json',
              data   : dataId,
              success:function(data){
                  tr.find('.harga').val(data.harga);
              }
          }); 
     });

     $('tbody').delegate('.nama_brg','change',function(){
          var tr=$(this).parent().parent();
          tr.find('.jml_brg').focus();
     });

     $('tbody').delegate('.jml_brg,.biaya_sewa','keyup',function(){
            var tr=$(this).parent().parent();
                        var oneDay = 24*60*60*1000; // hours*minutes*seconds*milliseconds            
            var tgl_sewa = new Date($('.tgl_sewa').val());
            var tgl_pengembalian = new Date($('.tgl_pengembalian').val());
            var selisihhari= Math.round(Math.round((tgl_pengembalian.getTime() - tgl_sewa.getTime()) / (oneDay)));

            var harga_brg = tr.find('.harga').val();
            var jml_brg = tr.find('.jml_brg').val();
            var biaya_sewa = (harga_brg * jml_brg)
            tr.find('.biaya_sewa').val(biaya_sewa);
            total();
     });

     function total()
     {
             var total =0
             $('.biaya_sewa').each(function(i,e){
                 var biaya_sewa = $(this).val()-0;
                 total += biaya_sewa;
             })
            var uang_muka = document.getElementById("uang_muka").value;

            total = total - uang_muka;
            $('.total').html(total);

     }

       $('.addRow').on('click',function(){
          var tr='<tr>'+
                        '<td>'+
                        '<select class="form-control nama_brg" name="nama_brg[]">'+
                                  '<option value="" selected="true" disabled="true">Pilih Barang</option> '+
                              '@foreach ($databarang as $row2 => $key2) '+                                       
                                  '<option value="{{$row2}}">{{$key2}}</option>'+
                              '@endforeach'+
                            '</select>'+
                            '</td>'+
                              '<td><input type="text" class="form-control harga" name="harga[]"></td>'+
                              '<td><input type="text" class="form-control jml_brg" name="jml_brg[]"></td>'+
                              '<td><input type="text" class="form-control biaya_sewa" name="biaya_sewa[]"></td>'+
                              
                        '</tr>';
           $('tbody').append(tr);    
       });

       // $('.remove').on('click',function(){

       //       $(this).parent().parent().remove();
       // });  failure remove jadi dihapus
        

  
  </script>
@endsection