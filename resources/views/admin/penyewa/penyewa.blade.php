@extends('admin/master')

@section('konten')
  			<div class="row">
              <div class="col-lg-12"><br>
               <ol class="breadcrumb">
                            <li class="active">
                                 <i class="fa fa-table"></i> Penyewa
                            </li>        
                </ol>
                </div>
           </div>
           @include('admin._pesan')
    		<div class="row">
                <div class="col-lg-12" style="margin-top:-30px;">
                    <h1 class="page-header">Data Penyewa</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Tabel Penyewa
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                        
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th width="28px">ID</th>
                                        <th width="170px">Nama Penyewa</th>
                                        <th width="100px">Username </th>
                                        <th width="100px">No.Telp/HP</th>
                                        <th>Alamat </th>
                                        <th>OPSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($penyewa as $penyewas)
                                    <tr class="odd gradeX">
                                        <td>{{$penyewas->id_penyewa}}</td>
                                        <td>{{$penyewas->nama_penyewa}}</td>
                                        <td>{{$penyewas->username}}</td>
                                        <td>{{$penyewas->no_telepon}}</td>
                                        <td>{{$penyewas->alamat}}</td>
                                        <td width="150px">
                                          <center>
  
                                         <form action="{{url('/admin/penyewa/'.$penyewas->id_penyewa.'')}}" method="post">  
                                            <a type="button" href="{{url('/admin/penyewa/'.$penyewas->id_penyewa.'/ubah')}}" class="btn btn-success btn-sm" title="Ubah"> <i class="glyphicon glyphicon-pencil"></i> </a> &nbsp;
                                             
                                            <a type="button" href="{{url('/admin/penyewa/'.$penyewas->id_penyewa.'/tampil')}}" class="btn btn-info btn-sm" title="Tampil"> <i class="glyphicon glyphicon-eye-open"></i></a> &nbsp;
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