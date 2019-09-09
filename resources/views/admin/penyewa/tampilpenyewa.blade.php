@extends('admin/master')

@section('konten')
	 <div class="row">
        <div class="col-lg-12"><br>
          <ol class="breadcrumb">
            <li>
                <i class="fa fa-table"></i><a href="{{url('/admin/penyewa')}}"> Penyewa</a>
            </li>
            <li class="active">
                <i class="fa fa-plus-square"></i> Tampil Penyewa
            </li>
                </ol>
                </div>
            <div class="col-lg-12" style="margin-top:-30px;">
               <h1 class="page-header">Tampil Penyewa</h1>
            </div>
                <div class="row">
                  <div class="col-lg-1">
                  </div>
                    <div class="col-lg-10">
                      <div class="panel panel-primary">
                        <div class="panel-heading" style="background-color:#00A1F1"> <b> Penyewa  </b></div>
                        <ul class="list-group">
                                <li class="list-group-item"  style="padding:1%">
                            <center> <div class="panel-body"><img src="/rentalcamping/storage/app/uploadfoto/penyewa/{{$penyewa->id_penyewa}}/{{$penyewa->foto}}" class="img-responsive" alt="Image"></div> </center>
                          </li>
                          <li class="list-group-item"  style="padding:1%">
                            <table class="table" style="color:black">
                              <tbody>
                                <tr>
                                 <td class="col-sm-2 ">  ID Penyewa </td> 
                                 <td class="col-sm-1">: </td>
                                 <td> {{$penyewa->penyewa}}</td>
                                </tr>   
                                <tr>
                                 <td class="col-sm-2">  Nama Penyewa </td> 
                                 <td> : </td>
                                 <td> {{$penyewa->penyewa}} </td>
                                </tr>   
                                <tr>
                                 <td class="col-sm-2">  Username </td> 
                                 <td> : </td>
                                 <td> {{$penyewa->username}} </td>
                                </tr>   
                                <tr>
                                 <td class="col-sm-2">  KTP </td> 
                                 <td> : </td>
                                 <td> {{$penyewa->ktp}} </td>
                                </tr>   
                                <tr>
                                 <td class="col-sm-2">  No Telp/HP </td> 
                                 <td> : </td>
                                 <td>{{$penyewa->no_telepon}} </td>
                                </tr>
                                <tr>
                                 <td class="col-sm-2">  Usia </td> 
                                 <td> : </td>
                                 <td> {{$penyewa->usia}} </td>
                                </tr>
                                <tr>
                                 <td class="col-sm-2">  Tanggal Lahir </td> 
                                 <td> : </td>
                                 <td> {{$penyewa->tgl_lahir}} </td>
                                </tr>
                                <tr>
                                 <td class="col-sm-2">  Alamat </td> 
                                 <td> : </td>
                                 <td> {{$penyewa->alamat}} </td>
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