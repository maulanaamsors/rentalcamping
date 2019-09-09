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
use Storage;
use Session;
use Illuminate\Html\FormFacade;

class TransaksiPenyewaanController extends Controller
{
    public function datakelolasewa(){
    	// $datasewa = PenyewaModel::all();
                
        // return view('kontenuser/namapenyewa',['namapenyewa'=>$namapenyewa]);

        $datasewa = SewaModel::all();
        // $datasewa = DB::table('sewa')->get();
        return view('admin/sewa',['sewa'=> $datasewa]);
    }


    public function tampilpenyewaan($id_penyewa,$id_sewa){

        $datasewa = SewaModel::find($id_sewa);
        $datasewa1 = TransewaModel::where('id_penyewa',$id_penyewa)->first();
        $datasewa2 = TransewaModel::where('no_faktur',$id_sewa)->get();

        return view('admin/transaksipenyewaan/tampilpenyewaan',['sewa'=> $datasewa, 'sewa1'=> $datasewa1, 'sewa2'=> $datasewa2]);
    }

    //simpan sewa barang langsung
    public function tambahpenyewaan(Request $request){  
        $this->validate($request, [ 
            'nama_penyewa' => 'required',
            'ktp' => 'required|numeric',
            'tgl_sewa' => 'required|date',
            'tgl_pengembalian' => 'required|date',
            'no_telepon' => 'required|numeric  ',
            'uang_muka' => 'required|numeric',
            'keterangan_antar' => 'required',
            'alamat' => 'required',
            'jml_brg' => 'required',
        ]);

        //dump($request->except(['_token']));
    	$datapenyewa = new PenyewaModel;
    	$datapenyewa->nama_penyewa = $request->nama_penyewa;
    	$datapenyewa->username = '-';
    	$datapenyewa->password = '-';
    	$datapenyewa->ktp = $request->ktp;
    	$datapenyewa->alamat = $request->alamat;
    	$datapenyewa->no_telepon = $request->no_telepon;
    	$datapenyewa->usia = '0';
    	$datapenyewa->tgl_lahir = date("Y-m-d");
    	$datapenyewa->no_rek = $request->no_rek;
        $datapenyewa->foto = '-';
     
            $total = 0;
            foreach ($request->biaya_sewa as $j => $nilai) {
                $subtotal = $request->biaya_sewa[$j];
                $total = $total + $subtotal;
            }

            $antar = 0;
            if ($request->keterangan_antar == 'Antar') {
                $antar = 20000;
            }

            $bukti_pembayaran = '-';
            $status = 'Y';
            // $no_faktur = TransewaModel::max('no_faktur');
            // $no_faktur = $no_faktur + 1;

            $selisih = ((abs(strtotime ($request->tgl_pengembalian) - strtotime ($request->tgl_sewa)))/(60*60*24));
            $total = $total * $selisih;

            $total = ($total - $request->uang_muka) + ($antar); //table sewa
    	 

        if ($datapenyewa->save()) {
            $id_sewa = $datapenyewa->id_penyewa;
            $tgl_sewa = $request->tgl_sewa;
            $tgl_sewa = strtotime($tgl_sewa);
            $tgl_sewa = date('Y-m-d', $tgl_sewa);

            $tgl_pengembalian= $request->tgl_pengembalian;
            $tgl_pengembalian= strtotime($tgl_pengembalian);
            $tgl_pengembalian= date('Y-m-d', $tgl_pengembalian);
            $id_penyewa = $datapenyewa->id_penyewa;
            
            $datamenyewa = new SewaModel;
            $datamenyewa->id_penyewa = $id_penyewa;
            $datamenyewa->tgl_sewa = $tgl_sewa;
            $datamenyewa->tgl_pengembalian = $tgl_pengembalian;
            $datamenyewa->uang_muka = $request->uang_muka;
            $datamenyewa->total_harga = $total;
            $datamenyewa->bukti_pembayaran = $bukti_pembayaran;
            $datamenyewa->konfirmasi = $status;
            $datamenyewa->status_sewa = $request->status; 
            
            if($datamenyewa->save()){
                $id_sewa = $datamenyewa->id_sewa;
                
                foreach ($request->nama_brg as $i => $nilai) {
                    $datasewa = array('no_faktur'=> $id_sewa,
                                      'id_penyewa' => $id_penyewa, 
                                      'id_brg' => $nilai, 
                                      'jml_brg' => $request->jml_brg[$i] ,
                                      'biaya_sewa' => $request->biaya_sewa[$i],
                                      'total' => $total, 
                                      'keterangan_antar' => $request->keterangan_antar);
                    TransewaModel::insert($datasewa);
                }

            }
            
    	}

        Session::flash('sukses','Data Tersimpan !');
        return redirect('admin/transaksipenyewaan');
    }

    public function simpanpengirimanbarang($id_sewa)
    {
           $status_sewa = 'disewa';
           $konfirmasi = 'Y';

           $datasewa = SewaModel::find($id_sewa);
           $datasewa->konfirmasi = $konfirmasi;
           $datasewa->status_sewa = $status_sewa;
           $datasewa->save();

           Session::flash('sukses','Data Berhasil Dikonfirmasi !');
           return redirect('admin/transaksipenyewaan');
    } 
    // public function hapuspenyewaan($id_penyewa){
    //     $datasewa = PenyewaModel::find($id_penyewa);
    //     $datasewa->delete();

    //     Session::flash('sukseshapus','Data Terhapus !');
    //     return redirect('admin/transaksipenyewaan');

    // }



    public function cariHargaBarang(Request $request){
    	 $data=BarangModel::select('harga')->where('id_brg',$request->id_brg)->first();
    	 return response()->json($data);
    }

    //konfirmasi penyewaan
    public function statuskonfirmasipenyewaan($id_penyewa,$username){
        $datapenyewa = PenyewaModel::find($id_penyewa);

        $datasewa = TransewaModel::where('id_penyewa',$id_penyewa)->get();

        $datasewa1 = SewaModel::where('id_penyewa',$id_penyewa)->first();

        $datasewa2 = SewaModel::where('id_penyewa',$id_penyewa)->get();

        return view('kontenuser/konfirmasipenyewaan',['penyewa' => $datapenyewa,'sewa' => $datasewa,'sewa1' => $datasewa1,'sewa2' => $datasewa2]);    
    }

    //pembayaran oleh user
    public function simpanpembayaran(Request $request,$id_penyewa,$username,$id_sewa){

        $foto = $request->file('bukti_pembayaran');
        $upload = 'uploadfoto/pembayaran';
        $filename = $foto->getClientOriginalName();
        Storage::put('uploadfoto/pembayaran/'.$id_sewa.'/'. $filename, file_get_contents($request->file('bukti_pembayaran')->getRealPath()));

        $datapenyewa = PenyewaModel::find($id_penyewa);
        
        $datapenyewa->no_rek = $request->no_rek;
        
        if ($datapenyewa->save()) {

                    $datasewa = SewaModel::find($id_sewa);
                    $datasewa->bukti_pembayaran = $filename;
                    $datasewa->save();
        }
        
        return redirect(''.$id_penyewa.'/'.$username.'/pembayaran');

    }

    //Use Case Sewa Barang
    public function tambahsewaon(Request $request,$id_penyewa,$username){
        $this->validate($request, [ 
            'tgl_sewa' => 'required|date',
            'tgl_pengembalian' => 'required|date',
            'uang_muka' => 'required|numeric',
        ]);

        $total = 0;
        foreach ($request->biaya_sewa as $j => $nilai) {
            $subtotal = $request->biaya_sewa[$j];
            $total = $total + $subtotal;
        }

        $antar = 0;
        if ($request->keterangan_antar == 'Antar') {
            $antar = 20000;
        }

        $selisih = ((abs(strtotime ($request->tgl_pengembalian) - strtotime ($request->tgl_sewa)))/(60*60*24));
        $total = $total * $selisih;
        $total = ($total - $request->uang_muka) + ($antar); //table sewa

        $datamenyewa = new SewaModel;
        $datamenyewa->id_penyewa = $request->id_penyewa;
        $datamenyewa->tgl_sewa = $request->tgl_sewa;
        $datamenyewa->tgl_pengembalian = $request->tgl_pengembalian;
        $datamenyewa->uang_muka = $request->uang_muka;
        $datamenyewa->total_harga = $total;
        $datamenyewa->bukti_pembayaran = $request->bukti_pembayaran;
        $datamenyewa->konfirmasi = $request->konfirmasi;
        $datamenyewa->status_sewa = $request->status_sewa;
        if($datamenyewa->save()){
             $id_penyewa = $request->id_penyewa;
             $no_faktur = $datamenyewa->id_sewa;

             foreach ($request->nama_brg as $i => $nilai) {
             $datasewa = array('no_faktur'=> $no_faktur,
                        'id_penyewa' => $id_penyewa, 
                        'id_brg' => $nilai, 
                        'jml_brg' => $request->jml_brg[$i] ,
                        'biaya_sewa' => $request->biaya_sewa[$i],
                        'total' => $total, 
                        'keterangan_antar' => $request->keterangan_antar);
                        TransewaModel::insert($datasewa);
            }

        }

        return redirect(''.$id_penyewa.'/'.$username.'');

    }
}
