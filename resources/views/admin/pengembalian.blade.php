@extends('admin/master')

@section('konten')
  			<div class="row">
              <div class="col-lg-12"><br>
               <ol class="breadcrumb">
                            <li class="active">
                                 <i class="fa fa-table"></i>  Data Pengembalian
                            </li>        
                </ol>
                </div>
           </div>
           @include('admin._pesan')
    		<div class="row">
                <div class="col-lg-12" style="margin-top:-30px;">
                    <h1 class="page-header">Data Pengembalian </h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Tabel Pengembalian
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                        
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th width="5%"> ID Sewa </th>
                                        <th width="20%">Nama Penyewa</th>
                                        <th width="20%">Tgl Sewa</th>
                                        <th width="20%">Tgl Pengembalian</th>
                                        <th width="20%">Total Harga</th>
                                        

                                    </tr>
                                </thead>

                                
                                <tbody>
                                
                                    @foreach($sewa as $sewas)
                                        @if(($sewas->konfirmasi == 'Y') && ($sewas->status_sewa == 'dikembalikan')) 
                                        <tr class="odd gradeX">
                                            <td>{{$sewas->id_sewa}}</td>
                                            <td>{{$sewas->PenyewaModel->nama_penyewa}}</td>
                                            <td>{{$sewas->tgl_sewa}}</td>
                                            <td>{{$sewas->tgl_pengembalian}}</td>
                                            <td>{{ 'Rp. ' . number_format( $sewas->total_harga, 0 , '' , '.' ) . ',-'}}</td>


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