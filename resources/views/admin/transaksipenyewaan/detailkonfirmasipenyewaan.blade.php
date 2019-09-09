@extends('admin/master')

@section('konten')
	 <div class="row">
        <div class="col-lg-12"><br>
          <ol class="breadcrumb">
            <li>
                <i class="fa fa-table"></i><a href="{{url('/admin/transaksipenyewaan/konfirmasi')}}"> Konfirmasi Penyewaan</a>
            </li>
            <li class="active">
                <i class="fa fa-eye"></i> Detail Konfirmasi Penyewaan
            </li>
                </ol>
                </div>
            <div class="col-lg-12" style="margin-top:-30px;">
               <h1 class="page-header"> Detail Konfirmasi Penyewaan</h1>
            </div>
            <div class="col-lg-12">
            <div class="well well-sm"><a href="{{url('admin/transaksipenyewaan/konfirmasi/'.$sewa->id_sewa.'')}}" class="btn btn-primary"><i class="fa fa-check" aria-hidden="true"></i> Konfirmasi </a> || 
            <a href="{{url('admin/transaksipenyewaan/tolakkonfirmasi/'.$sewa->id_sewa.'')}}" class="btn btn-danger"><i class="glyphicon glyphicon-remove-circle" aria-hidden="true"></i> Tolak Konfirmasi </a></div>                      
              <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#detail">Detail</a></li>
                <li><a data-toggle="tab" href="#bukti">Bukti Pembayaran</a></li>
              </ul>

                <div class="tab-content">
                <div id="detail" class="tab-pane fade in active">
                <div class="panel panel-default">
                  <div class="panel-body">
                      <div class="container">
                        <div class="col-lg-6">
                        <div class="form-group">
                            <font size="5px"> Username : </font> <font size="3">{{$sewa->PenyewaModel->username}}</font>
                        </div>
                        <div class="form-group">
                            <font size="5px"> Penyewa : </font> <font size="3">{{$sewa->PenyewaModel->nama_penyewa}}</font>
                        </div>
                        <div class="form-group">
                            <font size="5px"> No. Telp/HP : </font> <font size="3">{{$sewa->PenyewaModel->no_telepon}}</font>
                        </div>
                        <div class="form-group">
                            <font size="5px"> Alamat : </font> <font size="3">{{$sewa->PenyewaModel->alamat}}</font>
                        </div>
                        </div>
                        <div class="col-lg-6">
                        <div class="form-group">
                            <font size="5px"> Tanggal Sewa : </font> <font size="3">{{$sewa->tgl_sewa}}</font>
                        </div>
                        <div class="form-group">
                            <font size="5px"> Tanggal Pengembalian : </font> <font size="3">{{$sewa->tgl_pengembalian}}</font>
                        </div>
                        <div class="form-group">
                            <font size="5px"> Uang Muka : </font> <font size="3">{{ 'Rp. ' . number_format( $sewa->uang_muka, 0 , '' , '.' ) . ',-'}}</font>
                        </div>
                        <div class="form-group">
                            <font size="5px"> Total Biaya : </font> <font size="3">{{ 'Rp. ' . number_format( $sewa->total_harga, 0 , '' , '.' ) . ',-'}}</font>
                        </div>
                        </div>
                      </div>
                       <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Tabel Barang
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th width="5%">ID</th>
                                                <th width="25%">Nama Barang</th>
                                                <th width="10%">Harga Barang </th>
                                                <th width="5%">Jumlah</th>
                                                <th width="12%">Harga Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($sewa2 as $sewas2)
                                          
                                                <tr class="odd gradeX">
                                                    <td>{{$sewas2->id_brg}}</td>
                                                    <td>{{$sewas2->BarangModel->nama_brg}}</td>
                                                    <td>{{ 'Rp. ' . number_format( $sewas2->BarangModel->harga, 0 , '' , '.' ) . ',-'}}</td>
                                                    <td>{{$sewas2->jml_brg}}</td>
                                                    <td>{{ 'Rp. ' . number_format( $sewas2->biaya_sewa, 0 , '' , '.' ) . ',-'}}</td>
                                                </tr>
                                            
                                        @endforeach
                                        </tbody>
                                    </table>
                                    <!-- /.table-responsive -->
                                </div>
                                <!-- /.panel-body -->
                            </div>
                            <!-- /.panel -->
                        </div>
                        <!-- /.col-lg-12 -->
                  </div>
                 </div> <!-- harusnya didalem ini @mas -->
               </div>
                </div>
                <div id="bukti" class="tab-pane fade">
                                <div class="panel panel-default">
                  <div class="panel-body">
                      <div class="container">

                      <font size="5px"> No. Rekening :</font> <font size="3">{{$sewa1->PenyewaModel->no_rek}}</font> <br>
                      <center>
                          <img src="/rentalcamping/storage/app/uploadfoto/pembayaran/{{$sewa->id_sewa}}/{{$sewa->bukti_pembayaran}}" class="img-responsive" alt="Image">
                      </center>
                      </div>
                      </div>
                      </div>
                  
                </div>

              </div>

                

            </div>
                       
    </div>
@endsection