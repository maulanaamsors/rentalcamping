@extends('admin/master')

@section('konten')
	 <div class="row">
        <div class="col-lg-12"><br>
          <ol class="breadcrumb">
            <li>
                <i class="fa fa-table"></i><a href="{{url('/admin/barang')}}"> Barang</a>
            </li>
            <li class="active">
                <i class="fa fa-plus-square"></i> Tampil Barang
            </li>
                </ol>
                </div>
            <div class="col-lg-12" style="margin-top:-30px;">
               <h1 class="page-header">Tampil Barang</h1>
            </div>
                <div class="row">
                  <div class="col-lg-1">
                  </div>
                    <div class="col-lg-10">
                      <div class="panel panel-primary">
                        <div class="panel-heading" style="background-color:#00A1F1"> <b> Barang  </b></div>
                        <ul class="list-group">
                                <li class="list-group-item"  style="padding:1%">
                            <center> <div class="panel-body"><img src="/rentalcamping/storage/app/uploadfoto/barang/{{$barang->foto}}" class="img-responsive" alt="Image"></div> </center>
                          </li>
                          <li class="list-group-item"  style="padding:1%">
                            <table class="table" style="color:black">
                              <tbody>
                                <tr>
                                 <td class="col-sm-2 ">  ID Barang </td> 
                                 <td class="col-sm-1">: </td>
                                 <td> {{$barang->id_brg}}</td>
                                </tr>   
                                <tr>
                                 <td class="col-sm-2">  Nama Barang </td> 
                                 <td> : </td>
                                 <td> {{$barang->nama_brg}} </td>
                                </tr>   
                                <tr>
                                 <td class="col-sm-2">  Jenis Barang </td> 
                                 <td> : </td>
                                 <td> {{$barang->jenis_brg}} </td>
                                </tr>   
                                <tr>
                                 <td class="col-sm-2">  Stok </td> 
                                 <td> : </td>
                                 <td> {{$barang->stok}} </td>
                                </tr>   
                                <tr>
                                 <td class="col-sm-2">  Harga </td> 
                                 <td> : </td>
                                 <td> {{ 'Rp. ' . number_format( $barang->harga, 0 , '' , '.' ) . ',-'}} </td>
                                </tr>
                                <tr>
                                 <td class="col-sm-2">  Kapasitas </td> 
                                 <td> : </td>
                                 <td> {{$barang->kapasitas}} </td>
                                </tr>     
                              </tbody>
                            </table>
                          </li>
                        </ul>
                     </div>
                  </div>

                  <div class="col-lg-1">
                  </div>
                </div>
    </div>
@endsection