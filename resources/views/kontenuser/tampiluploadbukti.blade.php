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
                $id_sewa = $sewa1->id_sewa;

             ?>
	  				   <h3 class="page-header" style="width:71%">Pembayaran </h3>
	  				   		  <ul class="nav nav-pills" style="margin-top:12px" >
							    <li ><a href="{{url(''.$id_penyewa.'/'.$username.'')}}">Status Penyewaan</a></li>
							    <li ><a href="{{url(''.$id_penyewa.'/'.$username.'/konfirmasipenyewaan')}}">Konfirmasi Penyewaan</a></li>
							    <li class="active"><a href="{{url(''.$id_penyewa.'/'.$username.'/pembayaran')}}">Pembayaran</a></li>
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

		  								<div class="form-group" style="margin:1% 2% 2% 2%">
                      <br>
                      <div class="row">
                          @if(($sewa1->bukti_pembayaran == '-'))
                          <form action="{{url(''.$id_penyewa.'/'.$username.'/simpanpembayaran/'.$id_sewa.'')}}" method="post" enctype="multipart/form-data">
                                <div class="col-sm-12">
                                  <label class="col-sm-4">No.Rekening</label>
                                  <input type="text" class="form-control col-sm-8" name="no_rek">
                                </div> 
                                <div class="col-sm-12">
                                  <br><label class="col-sm-4">Upload bukti pembayaran</label>
                                  <input type="file" class="form-control" name="bukti_pembayaran" onchange="readURL(this);"><br>
                                  <input type="submit" class="btn btn-primary" name="kirim" value="Kirim"> 
                                  {{csrf_field()}}
                                   <input type="hidden" name="_method" value="PUT">
                                </div>
                          </form>
                          @else
                          <div class="col-sm-12">
                          <div class="panel panel-default" style="background-color:grey">
                            <div class="container">
                            <div class="row">
                             
                                  
                                  <h4 style="margin-left:2%"> {{$penyewa->nama_penyewa}}, Anda sudah melakukan pembayaran.</h4>
                             </div>
                             </div>
                             </div>
                            </div>
                          @endif
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