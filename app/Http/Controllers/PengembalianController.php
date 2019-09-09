<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\TransewaModel;
use App\Model\BarangModel;
use App\Model\PenyewaModel;
use App\Model\SewaModel;
use App\Model\PengembalianModel;
use Storage;
use Session;
use Illuminate\Html\FormFacade;

class PengembalianController extends Controller
{
    public function tambahpengembalian(Request $request, $id_sewa){
        $status_sewa = 'dikembalikan';

        $datasewa = SewaModel::find($id_sewa);
        $datasewa->status_sewa = $status_sewa;
        $tgl_ambilbrg =  date("Y-m-d");

        if($datasewa->save()){
            $total_harga = $datasewa->total_harga;

            $selisih = ((abs(strtotime ($tgl_ambilbrg) - strtotime ($datasewa->tgl_pengembalian)))/(60*60*24));
            $denda = $total_harga * $selisih;

            $total_biaya = $denda + $total_harga;

            $datapengembalian = new PengembalianModel;
            $datapengembalian->id_penyewa = $datasewa->id_penyewa;
            $datapengembalian->id_sewa = $datasewa->id_sewa;
            $datapengembalian->tgl_ambilbrg = $tgl_ambilbrg;
            $datapengembalian->denda = $denda;
            $datapengembalian->total_biaya = $total_biaya;
            $datapengembalian->status_antar = 'Tidak Antar';
            $datapengembalian->save();
        }
        Session::flash('sukses','Barang Sudah Dikembalikan !');
        return redirect('admin/pengembalian');
    }

    public function tampilpengembalian(){
        $datasewa = SewaModel::all();

        return view('admin/pengembalian',['sewa'=> $datasewa]);
    }

    public function tambahpengembalianpenyewa(Request $request,$id_penyewa,$username,$id_sewa){
        
        $status_sewa = 'dikembalikan';

        $datasewa = SewaModel::find($id_sewa);
        $datasewa->status_sewa = $status_sewa;
        
        $antar = 0;
        if($request->status_antar == 'Antar'){
            $antar = 20000;
        }

        if($datasewa->save()){
            $total_harga = $request->total_harga;

            $selisih = ((abs(strtotime ($request->tgl_ambilbrg) - strtotime ($request->tgl_pengembalian)))/(60*60*24));
            $denda = $total_harga * $selisih;

            $total_biaya = $denda + $total_harga + $antar;

            $datapengembalian = new PengembalianModel;
            $datapengembalian->id_penyewa = $request->id_penyewa;
            $datapengembalian->id_sewa = $request->id_sewa;
            $datapengembalian->tgl_ambilbrg = $request->tgl_ambilbrg;
            $datapengembalian->denda = $denda;
            $datapengembalian->total_biaya = $total_biaya;
            $datapengembalian->status_antar = $request->status_antar;
            $datapengembalian->save();
        }

        return redirect(''.$id_penyewa.'/'.$username.'/pengembalian');

        
    }

   
}
