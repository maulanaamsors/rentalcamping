@extends('kontenuser/mastersukses');

@section('konten')


<div class="container">    
  <div class="row">
   <div class="col-sm-3">
	    <div class="col-sm-99" style="border:0px;">
	      <div class="panel panel-default">
	        <div class="panel-heading" style="background-color: #00A1F1">{{$penyewa->nama_penyewa}}</div> 
	        <div class="panel-body"><img src="" class="img-responsive" alt="Image"></div>
	      </div>
	    </div>

	    <div class="col-sm-99" style="border:0px;">
	      <div class="panel panel-default">
	       <div class="panel-heading" style="background-color: #00A1F1">Profil User</div>
	       <div class="panel-body">
	         <table class="col-sm-12">
	          <th class="col-sm-12" style="border-bottom:1px solid #00A1F1; float:left;"><font size="2"> KTP  </font></th>
	            <tr class="col-sm-12">
	              <td style="float:right;">{{$penyewa->ktp}}</td>
	            </tr>
	          <th class="col-sm-12" style="border-bottom:1px solid #00A1F1; float:left;"><font size="2"> No.Telp/HP  </font> </th>
	            <tr class="col-sm-12">
	              <td style="float:right;">{{$penyewa->no_telepon}}</td>
	            </tr>
	          <th class="col-sm-12" style="border-bottom:1px solid #00A1F1; float:left;"><font size="2"> Usia  </font> </th>
	            <tr class="col-sm-12">
	              <td style="float:right;">{{$penyewa->usia}}</td>
	            </tr>
	             <th class="col-sm-12" style="border-bottom:1px solid #00A1F1; float:left;"> <font size="2">Tanggal Lahir</font></th>
	            <tr class="col-sm-12">
	              <td style="float:right;">{{$penyewa->tgl_lahir}}</td>
	            </tr>
	            <th class="col-sm-12" style="border-bottom:1px solid #00A1F1; float:left;"> <font size="2"> Alamat  </font></th>
	            <tr class="col-sm-12">
	              <td style="float:right;">{{$penyewa->alamat}}</td>
	            </tr>

	         </table>
	       </div>
	      </div>
	    </div>
  </div>
  	<div class="col-sm-9">
  		<div class="row">
  			<div class="col-sm-12" >
  				<div class="panel panel-default">	
  				   <div class="container">
             <?php
                $id_penyewa = $penyewa->id_penyewa;
                $username = $penyewa->username;

             ?>
	  				   <h3 class="page-header" style="width:71%">Status Penyewaan </h3>
	  				   		  <ul class="nav nav-pills" style="margin-top:12px" >
							    <li class="active"><a href="{{url(''.$id_penyewa.'/'.$username.'')}}">Status Penyewaan</a></li>
							    <li><a href="{{url(''.$id_penyewa.'/'.$username.'/konfirmasipenyewaan')}}">Konfirmasi Penyewaan</a></li>
							    <li><a href="{{url(''.$id_penyewa.'/'.$username.'/pembayaran')}}">Pembayaran</a></li>
							    <li><a href="{{url(''.$id_penyewa.'/'.$username.'/pengembalian')}}">Pengembalian</a></li>
	  						  </ul>
  							
  							<div class="row">
  								<div class="col-sm-11">
		  							<div class="panel panel-default" style="width:78%">
		  								
		  							</div>
		  						</div>
  							</div>
  							<div class="row" >
  								<div class="col-sm-11">
		  							<div class="panel panel-default" style="width:78%;margin-top:-5px">
                              
                                <div class="row" style="margin-top:2%;margin-bottom:2%">
                                  <div class="container">
                                    <div class="col-sm-12">
                                    <font size="3">Tanggal Sewa :{{$sewa1->tgl_sewa}} </font><br><font size="3">Tanggal Pengembalian :{{$sewa1->tgl_pengembalian}}</font>
                                    </div>
                                  </div>
                                </div>

                                <div class="panel-heading">
                                    Tabel Transaksi Penyewaan
                                </div> 
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <table  class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th >Nama Barang</th>
                                        <th width="20%">Harga Barang</th>
                                        <th width="5%">Jumlah</th>
                                        <th width="20%">Harga Total</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                
                                    @foreach($sewa as $sewas)
                                        
                                        <tr class="odd gradeX">
                                            <td>{{$sewas->BarangModel->nama_brg}}</td>
                                            <td>{{ 'Rp. ' . number_format( $sewas->BarangModel->harga, 0 , '' , '.' ) . ',-'}}</td>
                                            <td>{{$sewas->jml_brg}}</td>
                                            <td>{{ 'Rp. ' . number_format( $sewas->biaya_sewa, 0 , '' , '.' ) . ',-'}}</td>

                                        </tr>
                                        
                                     
                                    @endforeach
                                    
                                </tbody>
                              </table>
                              <!-- /.table-responsive -->
                        </div> 

		  							</div>
		  						</div>
  							</div>
  							
  					</div><br><br> <!-- akhir container-->
  				</div>
  			</div>
  		</div>
  	</div>
  </div>
</div><br>

@endsection	