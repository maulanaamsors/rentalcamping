@extends('kontenuser/mastersukses');

@section('konten')


<div class="container">    
  <div class="row">
   <div class="col-sm-3">
	    <div class="col-sm-99" style="border:0px;">
	      <div class="panel panel-default">
	        <div class="panel-heading" style="background-color: #00A1F1">{{$penyewa->nama_penyewa}}</div> 
	        <div class="panel-body"><img src="/rentalcamping/storage/app/uploadfoto/penyewa/{{$penyewa->id_penyewa}}/{{$penyewa->foto}}" class="img-responsive" alt="Image"></div>
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
                                <div class="panel-heading">
                                    Tabel Transaksi Penyewaan
                                </div> 
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <table  class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th width="20%">Nama Penyewa</th>
                                        <th width="20%">Tgl Sewa</th>
                                        <th width="20%">Tgl Pengembalian</th>
                                        <th width="20%">Total Harga</th>
                                        
                                        <th>Lihat Barang </th>
                                    </tr>
                                </thead>
                                <tbody>
                                
                                    @foreach($sewa2 as $sewas)
                                        @if(($sewas->konfirmasi == 'Y') && ($sewas->status_sewa == 'disewa')) 
                                        <tr class="odd gradeX">
                                            <td>{{$sewas->PenyewaModel->nama_penyewa}}</td>
                                            <td>{{$sewas->tgl_sewa}}</td>
                                            <td>{{$sewas->tgl_pengembalian}}</td>
                                            <td>{{ 'Rp. ' . number_format( $sewas->total_harga, 0 , '' , '.' ) . ',-'}}</td>

                                            <td width="150px">
                                              <center>
                                                <a type="button" href="{{url(''.$penyewa->id_penyewa.'/'.$penyewa->username.'/lihatbarangsewa/'.$sewas->id_sewa.'')}}" class="btn btn-info btn-sm" title="Tampil"> <i class="glyphicon glyphicon-eye-open"></i></a> &nbsp;
                                              </center>
                                            </td>
                                        </tr>
                                        
                                        @endif     
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