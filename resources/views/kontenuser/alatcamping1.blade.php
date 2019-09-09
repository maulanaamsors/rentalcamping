@extends('kontenuser/mastersukses');

@section('konten')


<div class="container">    
  <div class="row"><center>
  <h1 class="page-header"> Alat Camping</h1> </center>
  @foreach($barang as $barangs)
  	@if($barangs->stok <= 0) 
  		    <div class="col-sm-4">
		      <div class="panel panel-danger">
		        <div class="panel-heading">{{$barangs->nama_brg}}</div>
		        <div class="panel-body"><img src="/rentalcamping/storage/app/uploadfoto/barang/{{$barangs->foto}}" class="img-responsive" style="height:220px;" alt="Image"></div>
		        <div class="panel-footer">Kapasitas : <font size="3">{{$barangs->kapasitas}}</font> <br> Harga <b>(/hari)</b> : <font size="3">{{ 'Rp. ' . number_format( $barangs->harga, 0 , '' , '.' ) . ',-'}}</font> <br> Stok : <font size="4">{{$barangs->stok}} </font>(Kosong)</div>
		      </div>
		    </div>

  	@else 
    <div class="col-sm-4">
      <div class="panel panel-info">
        <div class="panel-heading">{{$barangs->nama_brg}}</div>
        <div class="panel-body"><center><img  src="/rentalcamping/storage/app/uploadfoto/barang/{{$barangs->foto}}" class="img-responsive" style="height:220px;" alt="Image"></center></div>
        <div class="panel-footer">Kapasitas : <font size="3">{{$barangs->kapasitas}}</font> <br>Harga <b>(/hari)</b> : <font size="3">{{ 'Rp. ' . number_format( $barangs->harga, 0 , '' , '.' ) . ',-'}}</font> <br> Stok : <font size="4">{{$barangs->stok}} </font> </div>
      </div>
    </div>

    @endif

  @endforeach
  </div>
</div><br>


@endsection	