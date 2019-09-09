<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Model\AdminModel;
use App\Model\PenyewaModel;
use Session;
use Validator;

class LoginController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    function cekLoginAdmin(Request $req){

        $validator = Validator::make($req->all(), [
            'username' => 'required',
            'password' => 'required',
        
        ]);

        if ($validator->fails()) {
            return redirect('login-admin')
                        ->withErrors($validator)
                        ->withInput();
        }

        $user= $req->username;
        $pass = $req->password;
        $check = AdminModel::where('username',$user)->where('password',$pass)->count();

        if( !($check > 0) )  {
             return redirect('admin/login-admin')->with('status', 'salah');
        }

        $take = AdminModel::where('username',$user)->where('password',$pass)->first();

        session(['username' => $take->username]);
        session(['password' => true ]);
        return redirect('admin/beranda');
    }

    function cekLoginPenyewa(Request $req){

        $validator = Validator::make($req->all(), [
            'username' => 'required',
            'password' => 'required',
        
        ]);

        if ($validator->fails()) {
            return redirect('login')
                        ->withErrors($validator)
                        ->withInput();
        }


        $user= $req->username;
        $pass = $req->password;

        $check = PenyewaModel::where('username',$user)->where('password',$pass)->count();

        if( !($check > 0) )  {
             return redirect('/login')->with('status', 'salah');
        }

        $take = PenyewaModel::where('username',$user)->where('password',$pass)->first();

        session(['id_penyewa' => $take->id_penyewa]);
        session(['username' => $take->username]);
        session(['password' => true ]);

        $id_penyewa = $take->id_penyewa;
        $username = $take->username;

        return redirect(''.$id_penyewa.'/'.$username.'');
    }

    function logoutAdmin(Request $req){

        $req->session()->regenerate();
        $req->session()->flush();
        
        return redirect('admin/login-admin');

    }


    function logoutpenyewa(Request $req){

        $req->session()->regenerate();
        $req->session()->flush();
        
        return redirect('/');
    }

    public function signup(Request $request){
        $this->validate($request, [ 
            'username' => 'required',
            'password' => 'required',
            'no_telepon' => 'required',
            'nama_penyewa' => 'required',
            'ktp' => 'required',
            'tgl_lahir' => 'required',
            'alamat' => 'required'
        ]);

        $datapenyewa = new PenyewaModel;

        $datapenyewa->nama_penyewa = $request->nama_penyewa;
        $datapenyewa->username = $request->username;
        $datapenyewa->password = $request->password;
        $datapenyewa->ktp = $request->ktp;
        $datapenyewa->no_telepon = $request->no_telepon;
        $datapenyewa->usia = 0;
        $datapenyewa->tgl_lahir = $request->tgl_lahir;
        $datapenyewa->alamat = $request->alamat;
        $datapenyewa->no_rek = 0;
        $datapenyewa->foto = '-';
        $datapenyewa->save();

        return redirect('login');
    }

}
