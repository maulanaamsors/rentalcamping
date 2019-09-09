<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\AdminModel;
use App\Model\TransewaModel;
use App\Model\BarangModel;
use App\Model\PenyewaModel;
use App\Model\SewaModel;
use Storage;
use Session;
use Illuminate\Html\FormFacade;

class MainController extends Controller
{
    public function formsignup(){
        return view('kontenuser/formsignup');
    }

    //Tampil Login Admin Dan Penyewa
    public function tampilLoginAdmin(){  
      $dataadmin = AdminModel::all();
      return view('admin/login',['admin'=> $dataadmin]);
    }

    public function tampilLoginPenyewa(){    
      $datapenyewa = PenyewaModel::all();
      return view('kontenuser/login',['penyewa'=> $datapenyewa]);
    }

    public function tampilpenyewaanbaru(){
    	$datasewa = SewaModel::all();
        
        return view('admin/transaksipenyewaan/konfirmasipenyewaan',['sewa'=> $datasewa]);
    }

    //Sewa Barang Langsung
    public function formtambah(){
      $databarang = BarangModel::pluck('nama_brg','id_brg');

        // $datapenyewa = PenyewaModel::pluck('nama_penyewa','id_penyewa');
        return view('admin/tambahsewa',compact('databarang'));
    }

    //Tampil Data kelola barang 
    public function datakelolabarang(){  
        $databarang = BarangModel::all();
        return view('admin/barang',['barang'=> $databarang]);
    }

    //Tampil Data kelola penyewaan 
    public function datakelolasewa(){
      // $datasewa = PenyewaModel::all();
                
        // return view('kontenuser/namapenyewa',['namapenyewa'=>$namapenyewa]);

        $datasewa = SewaModel::all();
        // $datasewa = DB::table('sewa')->get();
        return view('admin/sewa',['sewa'=> $datasewa]);
    }

    public function datakelolapenyewa(){
      $datapenyewa = PenyewaModel::all();
      return view('admin/penyewa/penyewa',['penyewa'=>$datapenyewa]);
    }

    
    //==>  Konfirmasi Penyewaan
    public function detailkonfirmasipenyewaan($id_penyewa,$id_sewa){
        $datasewa = SewaModel::find($id_sewa);

        $datasewa1 = TransewaModel::where('no_faktur',$id_sewa)->first();

        $datasewa2 = TransewaModel::where('no_faktur',$id_sewa)->get();

       return view('admin/transaksipenyewaan/detailkonfirmasipenyewaan',['sewa'=> $datasewa, 'sewa1'=> $datasewa1, 'sewa2'=> $datasewa2]);
    }



    public function tolakpengirimanbarang($id_sewa)
    {
           $konfirmasi = 'T';
           $datasewa = SewaModel::find($id_sewa);
           $datasewa->konfirmasi = $konfirmasi;
           $datasewa->save();

           Session::flash('sukseskonfirmasi','Data Berhasil Dikonfirmasi !');
           return redirect('admin/transaksipenyewaan');
    } 


    public function alatcamping(){
          $databarang = BarangModel::all();

          return view('kontenuser/alatcamping',['barang'=> $databarang]);
    }

    public function alatcamping1(){
          $databarang = BarangModel::all();

          return view('kontenuser/alatcamping1',['barang'=> $databarang]);
    }

    public function tampilsewabarang($id_penyewa,$username){
          $databarang = BarangModel::pluck('nama_brg','id_brg');
          $databarang1 = BarangModel::all();

          $datapenyewa = PenyewaModel::find($id_penyewa);
          return view('kontenuser/tampilsewabarang',compact('databarang'),['penyewa'=>$datapenyewa,'barang'=>$databarang1]);
    }    

    //tampil form pembayaran 
    public function tampilformpembayaran($id_penyewa,$username){

      $datapenyewa = PenyewaModel::find($id_penyewa);
      $datasewa = TransewaModel::where('id_penyewa',$id_penyewa)->get();
      $datasewa1 = SewaModel::where('id_penyewa',$id_penyewa)->first();
      $datasewa2 = SewaModel::where('id_penyewa',$id_penyewa)->get();

      return view('kontenuser/pembayaran',['penyewa' => $datapenyewa,'sewa' => $datasewa,'sewa1' => $datasewa1,'sewa2' => $datasewa2]);
    
    }

    //upload bukti pembayaran
    public function tampiluploadbukti($id_penyewa,$username,$id_sewa){

      $datapenyewa = PenyewaModel::find($id_penyewa);
      $datasewa = TransewaModel::where('id_penyewa',$id_penyewa)->get();
      $datasewa1 = SewaModel::find($id_sewa);
      $datasewa2 = SewaModel::where('id_penyewa',$id_penyewa)->get();

      return view('kontenuser/tampiluploadbukti',['penyewa' => $datapenyewa,'sewa' => $datasewa,'sewa1' => $datasewa1,'sewa2' => $datasewa2]);
    
    }    

    public function lihatbarangsewa($id_penyewa,$username,$id_sewa){
      $datapenyewa = PenyewaModel::find($id_penyewa);

      $datasewa    = TransewaModel::where('no_faktur',$id_sewa)->get();

      $datasewa1   = SewaModel::where('id_sewa',$id_sewa)->first();

      $datasewa2 = SewaModel::where('id_penyewa',$id_penyewa)->get();

      return view('kontenuser/lihatbarangsewa',['penyewa' => $datapenyewa,'sewa' => $datasewa,'sewa1' => $datasewa1,'sewa2' => $datasewa2]);
    }

    public function tampilpengaturanakun($id_penyewa,$username){
        $datapenyewa = PenyewaModel::find($id_penyewa);

        return view('kontenuser/tampilpengaturanakun',['penyewa'=>$datapenyewa]);
    }

    //pengembalian
    public function tampilpengembalianpenyewa($id_penyewa,$username){
        $datapenyewa = PenyewaModel::find($id_penyewa);

        $datasewa = TransewaModel::where('id_penyewa',$id_penyewa)->get();

        $datasewa1 = SewaModel::where('id_penyewa',$id_penyewa)->first();

        $datasewa2 = SewaModel::where('id_penyewa',$id_penyewa)->get();

        return view('kontenuser/tampilpengembalianpenyewa',['penyewa' => $datapenyewa,'sewa' => $datasewa,'sewa1' => $datasewa1,'sewa2' => $datasewa2]);
    }

    public function formpengembalianpenyewa(Request $request,$id_penyewa,$username,$id_sewa){
        $datapenyewa = PenyewaModel::find($id_penyewa);

        $datasewa = TransewaModel::where('id_penyewa',$id_penyewa)->get();

        $datasewa1 = SewaModel::where('id_penyewa',$id_penyewa)->first();

        $datasewa2 = SewaModel::where('id_penyewa',$id_penyewa)->get();

        return view('kontenuser/formpengembalianpenyewa',['penyewa' => $datapenyewa,'sewa' => $datasewa,'sewa1' => $datasewa1,'sewa2' => $datasewa2]);
    }
}
