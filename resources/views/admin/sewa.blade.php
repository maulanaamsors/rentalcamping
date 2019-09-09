@extends('admin/master')

@section('konten')
  			<div class="row">
              <div class="col-lg-12"><br>
               <ol class="breadcrumb">
                            <li class="active">
                                 <i class="fa fa-table"></i> Transaksi Penyewaan
                            </li>        
                </ol>
                </div>
           </div>
           @include('admin._pesan')
    		<div class="row">
                <div class="col-lg-12" style="margin-top:-30px;">
                    <h1 class="page-header">Data Sewa </h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Tabel Transaksi Penyewaan
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                        <!-- <a class="btn btn-primary btn-md" value="Tambah" href="{{url('/admin/transaksipenyewaan/tambah')}}" style="float:right"> Tambah</a>  <br><br> -->
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th width="5%"> ID Sewa </th>
                                        <th width="20%">Nama Penyewa</th>
                                        <th width="20%">Tgl Sewa</th>
                                        <th width="20%">Tgl Pengembalian</th>
                                        <th width="20%">Total Harga</th>
                                        
                                        <th>OPSI</th>
                                    </tr>
                                </thead>

                                
                                <tbody>
                                
                                    @foreach($sewa as $sewas)
                                        @if(($sewas->konfirmasi == 'Y') && ($sewas->status_sewa == 'disewa')) 
                                        <tr class="odd gradeX">
                                            <td>{{$sewas->id_sewa}}</td>
                                            <td>{{$sewas->PenyewaModel->nama_penyewa}}</td>
                                            <td>{{$sewas->tgl_sewa}}</td>
                                            <td>{{$sewas->tgl_pengembalian}}</td>
                                            <td>{{ 'Rp. ' . number_format( $sewas->total_harga, 0 , '' , '.' ) . ',-'}}</td>

                                            <td width="150px">
                                              <center>
      
                                             <form action="{{url('/admin/transaksipenyewaan/'.$sewas->id_sewa.'')}}" method="post">  
                                                 
                                                <a type="button" href="{{url('/admin/transaksipenyewaan/'.$sewas->id_penyewa.'/'.$sewas->id_sewa.'/tampil')}}" class="btn btn-info btn-sm" title="Tampil"> <i class="glyphicon glyphicon-eye-open"></i></a> &nbsp;
                                                <input type="hidden" value="{{$sewas->PenyewaModel->id_penyewa}}" name="id_penyewa"> 
                                                <button type="submit" class="btn btn-success btn-sm" title="Pengembalian"> <i class="glyphicon glyphicon-arrow-right"></i></button> 
                                            	  {{csrf_field()}}
                      						          <input type="hidden" name="_method" value="PUT">
                                            </form>  
                                              </center>
                                            </td>
                                        </tr>
                                        
                                        @endif     
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
@endsection