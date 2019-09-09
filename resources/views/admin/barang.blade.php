@extends('admin/master')

@section('konten')
  			<div class="row">
              <div class="col-lg-12"><br>
               <ol class="breadcrumb">
                            <li class="active">
                                 <i class="fa fa-table"></i> Barang
                            </li>        
                </ol>
                </div>
           </div>
           @include('admin._pesan')
    		<div class="row">
                <div class="col-lg-12" style="margin-top:-30px;">
                    <h1 class="page-header">Data Barang</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Tabel Barang
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                        <a class="btn btn-primary btn-md" value="Tambah" href="{{url('/admin/barang/tambah')}}" style="float:right"> Tambah</a>  <br><br>
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th width="28px">ID</th>
                                        <th>Nama Barang</th>
                                        <th width="50px">Jenis </th>
                                        <th width="50px">Stok</th>
                                        <th width="70px">Harga <br>(hari)</th>
                                        <th>Kapasitas</th>
                                        <th>OPSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($barang as $barangs)
                                    <tr class="odd gradeX">
                                        <td>{{$barangs->id_brg}}</td>
                                        <td>{{$barangs->nama_brg}}</td>
                                        <td>{{$barangs->jenis_brg}}</td>
                                        <td>{{$barangs->stok}}</td>
                                        <td>{{ 'Rp. ' . number_format( $barangs->harga, 0 , '' , '.' ) . ',-'}}</td>
                                        <td>{{$barangs->kapasitas}}</td>
                                        <td width="150px">
                                          <center>
                                         <form action="{{url('/admin/barang/'.$barangs->id_brg.'')}}" method="post">  
                                            <a type="button" href="{{url('/admin/barang/'.$barangs->id_brg.'/ubah')}}" class="btn btn-success btn-sm" title="Ubah"> <i class="glyphicon glyphicon-pencil"></i> </a> &nbsp;
                                             
                                            <a type="button" href="{{url('/admin/barang/'.$barangs->id_brg.'/tampil')}}" class="btn btn-info btn-sm" title="Tampil"> <i class="glyphicon glyphicon-eye-open"></i></a> &nbsp;
                                            <button type="submit" class="btn btn-danger btn-sm" title="Hapus"> <i class="glyphicon glyphicon-trash"></i></button>
                                        	  {{csrf_field()}}
                  						          <input type="hidden" name="_method" value="DELETE">
                                        </form>  
                                          </center>
                                        </td>
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
@endsection