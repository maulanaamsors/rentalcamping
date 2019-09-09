<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\LoginController;
use App\Model\PenyewaModel;
use App\Model\TransewaModel;
use App\Model\SewaModel;
use Storage;
use Session;

class penyewaController extends Controller
{

    public function formubah($id_penyewa){
        $datapenyewa = PenyewaModel::find($id_penyewa);
       
        return view('admin/penyewa/ubahpenyewa',['penyewa'=> $datapenyewa]);
    }

    public function tampilpenyewa($id_penyewa){

        $datapenyewa = PenyewaModel::find($id_penyewa);

        return view('admin/penyewa/tampilpenyewa',['penyewa'=> $datapenyewa]);
    }


    public function ubahpenyewa(Request $request, $id_penyewa){
        $datapenyewa = PenyewaModel::find($id_penyewa);
        
        $datapenyewa->nama_penyewa = $request->nama_penyewa;
        $datapenyewa->username = $request->username;
        $datapenyewa->ktp = $request->ktp;
        $datapenyewa->no_telepon = $request->no_telepon;
        $datapenyewa->usia = $request->usia;
        $datapenyewa->tgl_lahir = $request->tgl_lahir;
        $datapenyewa->alamat = $request->alamat;
        $datapenyewa->save();

        Session::flash('suksesedit','Data Diperbarui !');
        return redirect('admin/penyewa');
    }

    public function hapuspenyewa($id_penyewa){
        $datapenyewa = PenyewaModel::find($id_penyewa);
        $datapenyewa->delete();

        Session::flash('sukseshapus','Data Terhapus !');
        return redirect('admin/penyewa');

    }

    public function profil($id_penyewa,$username){
    	$datapenyewa = PenyewaModel::find($id_penyewa);

    	$datasewa = TransewaModel::where('id_penyewa',$id_penyewa)->get();

    	$datasewa1 = SewaModel::where('id_penyewa',$id_penyewa)->first();

        $datasewa2 = SewaModel::where('id_penyewa',$id_penyewa)->get();

    	return view('kontenuser/profil',['penyewa' => $datapenyewa,'sewa' => $datasewa,'sewa1' => $datasewa1,'sewa2' => $datasewa2]);
    }

    public function simpanpengaturanakun(Request $request,$id_penyewa,$username){
        
        if (empty($request->foto)) {

            $datapenyewa = PenyewaModel::find($id_penyewa);
            $datapenyewa->nama_penyewa = $request->nama_penyewa;
            $datapenyewa->username = $request->username;
            $datapenyewa->password = $request->password;
            $datapenyewa->ktp = $request->ktp;
            $datapenyewa->no_telepon = $request->no_telepon;
            $datapenyewa->usia = $request->usia;
            $datapenyewa->tgl_lahir = $request->tgl_lahir;
            $datapenyewa->alamat = $request->alamat;
            $datapenyewa->no_rek = $request->no_rek;
        }else {
            $foto = $request->file('foto');
            $upload = 'uploadfoto/penyewa';
            $filename = $foto->getClientOriginalName();
            Storage::put('uploadfoto/penyewa/'.$id_penyewa .'/'. $filename, file_get_contents($request->file('foto')->getRealPath()));

            $datapenyewa = PenyewaModel::find($id_penyewa);
            $datapenyewa->nama_penyewa = $request->nama_penyewa;
            $datapenyewa->username = $request->username;
            $datapenyewa->password = $request->password;
            $datapenyewa->ktp = $request->ktp;
            $datapenyewa->no_telepon = $request->no_telepon;
            $datapenyewa->usia = $request->usia;
            $datapenyewa->tgl_lahir = $request->tgl_lahir;
            $datapenyewa->alamat = $request->alamat;
            $datapenyewa->no_rek = $request->no_rek;
            $datapenyewa->no_rek = $filename;
        }
        

        $datapenyewa->save();
        return redirect(''.$id_penyewa.'/'.$username.'/pengaturanakun');
    }

}
