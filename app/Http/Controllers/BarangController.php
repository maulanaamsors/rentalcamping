<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Model\BarangModel;
use Storage;
use Session;

class BarangController extends Controller
{
    
    public function formtambah(){
        return view('admin/tambahbarang');
    }

    public function tambahbarang(Request $request){
        $this->validate($request, [ 
            'nama_brg' => 'required',
            'jenis_brg' => 'required',
            'stok' => 'required',
            'harga' => 'required',
            'kapasitas' => 'required',
            'foto' => 'required'
        ]);

        $foto = $request->file('foto');
        $upload = 'uploadfoto/barang';
        $filename = $foto->getClientOriginalName();
        Storage::put('uploadfoto/barang/' . $filename, file_get_contents($request->file('foto')->getRealPath()));

        $databarang = new BarangModel;
        $databarang->nama_brg = $request->nama_brg;
        $databarang->jenis_brg = $request->jenis_brg;
        $databarang->stok = $request->stok;
        $databarang->harga = $request->harga;
        $databarang->kapasitas = $request->kapasitas;
        $databarang->foto = $filename;
        $databarang->save();

        Session::flash('sukses','Data Tersimpan !');
        return redirect('admin/barang');
    }    

    // public function show($id_brg){

    //  $databarang = BarangModel::find($id_brg);
    //  return view('admin/ubahbarang',['barang'=> $databarang]);
    // }

    public function formubah($id_brg){

        $databarang = BarangModel::find($id_brg);
        
        return view('admin/ubahbarang',['barang'=> $databarang]);
    }

    public function tampilbarang($id_brg){

        $databarang = BarangModel::find($id_brg);

        return view('admin/tampilbarang',['barang'=> $databarang]);
    }

    public function ubahbarang(Request $request, $id_brg){

        if (empty($request->foto)) {
                    $databarang = BarangModel::find($id_brg);
                    $databarang->nama_brg = $request->nama_brg;
                    $databarang->jenis_brg = $request->jenis_brg;
                    $databarang->stok = $request->stok;
                    $databarang->harga = $request->harga;
                    $databarang->kapasitas = $request->kapasitas;
                    $databarang->save(); 
        }else {
                    $foto = $request->file('foto');
                    $upload = 'uploadfoto/barang';
                    $filename = $foto->getClientOriginalName();
                    Storage::put('uploadfoto/barang/' . $filename, file_get_contents($request->file('foto')->getRealPath()));
                    
                    $databarang = BarangModel::find($id_brg);
                    $databarang->nama_brg = $request->nama_brg;
                    $databarang->jenis_brg = $request->jenis_brg;
                    $databarang->stok = $request->stok;
                    $databarang->harga = $request->harga;
                    $databarang->kapasitas = $request->kapasitas;
                    $databarang->foto = $filename;
                    $databarang->save();
        }

        Session::flash('suksesedit','Data Diperbarui !');
        return redirect('admin/barang');

        

    }

    public function hapusbarang($id_brg){
        $databarang = BarangModel::find($id_brg);
        $databarang->delete();

        Session::flash('sukseshapus','Data Terhapus !');
        return redirect('admin/barang');

    }

}
