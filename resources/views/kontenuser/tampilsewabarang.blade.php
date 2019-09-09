@extends('kontenuser/mastersukses');

@section('konten')

  <div class="container">
   <div class="row">

        
        <div class="col-lg-12" >
            <h1 class="page-header"><center>Tambah Sewa </center></h1>
        </div>
        <div class="col-lg-12"> 
        <?php
            $id_penyewa = $penyewa->id_penyewa;
            $username = $penyewa->username;
        ?>
            <div class="panel panel-footer">
                <form action="{{url(''.''.$id_penyewa.'/'.$username.'/tambahsewaon')}}" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <div class="col-lg-12">
                          <label class="control-label col-sm-2 text-right" style="margin-top:5px;"> Tgl Sewa </label>
                          <div class="col-sm-4">
                           <input type="date" class="form-control tgl_sewa" name="tgl_sewa" data-date-format="YYYY MM DD" placeholder="yyyy/mm/dd" value="{{old('tgl_sewa')}}"> 
                              @if($errors->has('tgl_sewa'))  
                                <font color="red">Tgl Sewa harus diisi sesuai Format! </font><br>
                              @endif   
                          </div> 
                          <label class="control-label col-sm-2 text-right" style="margin-top:5px;"> Tgl Pengembalian </label>
                          <div class="col-sm-4">
                             <input type="date" class="form-control tgl_kembali" name="tgl_pengembalian" placeholder="yyyy/mm/dd" value="{{old('tgl_pengembalian')}}"> 
                              @if($errors->has('tgl_pengembalian'))  
                                <font color="red">Tgl Pengembalian harus diisi sesuai Format! </font><br>
                              @endif 
                          </div> <br><br>
                      </div>

                    </div> <!-- end class form-group -->
                    <div class="form-group">
                      <div class="col-lg-12">
                          <label class="control-label col-sm-2 text-right" style="margin-top:5px;"> Pilih Antar Barang </label>
                          <div class="col-sm-4">
                             <select class="form-control keterangan_antar" name="keterangan_antar">
                                  <option value="Antar"> Antar</option>
                                  <option value="Tidak Antar"> Tidak Antar</option>
                             </select>
                          </div>
                          <label class="control-label col-sm-2 text-right" style="margin-top:5px;"> Uang Muka </label>
                          <div class="col-sm-4">
                             <input type="text" class="form-control" id="uang_muka" name="uang_muka" value="{{old('uang_muka')}}"> 
                              @if($errors->has('uang_muka'))  
                                <font color="red">Uang Muka harus diisi dengan Angka! </font><br>
                              @endif 
                          </div> <br><br>                 
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
                    <!-- FILE HIDDEN -->   
                    <input type="hidden" name="id_penyewa" value="{{$penyewa->id_penyewa}}">                
                    <input type="hidden" name="no_rek" value="-">
                    <input type="hidden" name="status_sewa" value="booking">
                    <input type="hidden" name="bukti_pembayaran" value="-">
                    <input type="hidden" name="konfirmasi" value="H">
                    
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
                                        <button type="submit" class="btn btn-primary" title="Simpan">Sewa </a> </button>
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