<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('kontenuser/home');
});

Route::get('/alatcamping', 'MainController@alatcamping');

//LOGIN
Route::get('/admin/login-admin', 'MainController@tampilLoginAdmin');
Route::post('/admin/login-admin', 'LoginController@cekLoginAdmin');
Route::get('/admin/logout','LoginController@logoutAdmin');

//LOGIN PENYEWA
Route::get('/login', 'MainController@tampilLoginPenyewa');
Route::post('/login', 'LoginController@cekLoginPenyewa');
Route::get('/logout','LoginController@logoutPenyewa');

//SIGNUP Penyewa
Route::get('/signup','MainController@formsignup');
Route::post('/tambahakun','LoginController@signup'); //tambah akun sign-up / menyimpan akun baru 

//Route untuk Admin
Route::group(['middleware' => 'ceklogin'], function () {
	Route::get('/admin/beranda', 'AdminController@tampilberanda');

	Route::get('/admin/barang', 'MainController@datakelolabarang');
	
	//CRUD
	//Route untuk tambah barang
	Route::get('/admin/barang/tambah', 'BarangController@formtambah'); //form tambah barang 
	Route::post('/admin/barang', 'BarangController@tambahbarang');
	//Route untuk ubah barang
	Route::get('/admin/barang/{id_brg}/ubah', 'BarangController@formubah');
	Route::put('/admin/barang/{id_brg}/ubah', 'BarangController@ubahbarang');
	//Route untuk tampil barang
	Route::get('/admin/barang/{id_brg}/tampil', 'BarangController@tampilbarang');
	//Route hapus Barang
	Route::delete('/admin/barang/{id_brg}', 'BarangController@hapusbarang');

	//Route untuk CRUD Penyewa
	Route::get('/admin/penyewa', 'MainController@datakelolapenyewa');
	//Route untuk tambah data penyewa
	Route::get('/admin/penyewa/tambah', 'PenyewaController@formtambah');
	Route::post('/admin/penyewa', 'PenyewaController@tambahpenyewa');
	//Route untuk ubah Penyewa
	Route::get('/admin/penyewa/{id_penyewa}/ubah', 'PenyewaController@formubah');
	Route::put('/admin/penyewa/{id_penyewa}/ubah', 'PenyewaController@ubahpenyewa');
	//Route untuk tampil Penyewa
	Route::get('/admin/penyewa/{id_penyewa}/tampil', 'PenyewaController@tampilpenyewa');
	//Route hapus Penyewa
	Route::delete('/admin/penyewa/{id_penyewa}', 'PenyewaController@hapuspenyewa');
	//Route	

	//SEWA BARANG
	//CRUD ADMIN MENU TRANSAKSI PENYEWAAN
	Route::get('/admin/transaksipenyewaan', 'MainController@datakelolasewa');
	Route::get('/admin/transaksipenyewaan/tambah', 'MainController@formtambah');

	//Route untuk tampil transaksi --> kelola barang
	Route::get('/admin/transaksipenyewaan/{id_penyewa}/{id_sewa}/tampil', 'TransaksiPenyewaanController@tampilpenyewaan');	
	Route::put('/admin/transaksipenyewaan/{id_sewa}', 'PengembalianController@tambahpengembalian');
	Route::get('/admin/pengembalian','PengembalianController@tampilpengembalian');
	
	//Konfirmasi Penyewaan
	Route::get('/admin/transaksipenyewaan/konfirmasi', 'MainController@tampilpenyewaanbaru');
	Route::get('/admin/transaksipenyewaan/konfirmasi/tampil/{id_penyewa}/{id_sewa}', 'MainController@detailkonfirmasipenyewaan');
	Route::get('/admin/transaksipenyewaan/konfirmasi/{id_sewa}', 'TransaksiPenyewaanController@simpanpengirimanbarang');
	Route::get('/admin/transaksipenyewaan/tolakkonfirmasi/{id_sewa}', 'MainController@tolakpengirimanbarang');

	Route::post('/admin/transaksipenyewaan', array('as' => 'transaksipenyewaan', 'uses' => 'TransaksiPenyewaanController@tambahpenyewaan' ));

	// Route::post('/admin/transaksipenyewaan', 'TransaksiPenyewaanController@tambahpenyewaan');
	Route::get('/admin/transaksipenyewaan/cariHargaBarang',array('as' =>'cariHargaBarang','uses' => 'TransaksiPenyewaanController@cariHargaBarang'));
});

//Route untuk Penyewa
Route::group(['middleware' => 'cekloginpenyewa'], function () {

	//Status Penyewaan
	Route::get('/{id_penyewa}/{username}', 'PenyewaController@profil');

	//status konfirmasi untuk penyewa
	Route::get('/{id_penyewa}/{username}/konfirmasipenyewaan','TransaksiPenyewaanController@statuskonfirmasipenyewaan');

	//pembayaran
	Route::get('/{id_penyewa}/{username}/pembayaran','MainController@tampilformpembayaran');
	Route::get('/{id_penyewa}/{username}/pembayaran/{id_sewa}/uploadbukti','MainController@tampiluploadbukti');
	
	Route::put('/{id_penyewa}/{username}/simpanpembayaran/{id_sewa}','TransaksiPenyewaanController@simpanpembayaran');
	Route::get('/{id_penyewa}/{username}/alatcamping','MainController@alatcamping1');
	Route::get('/{id_penyewa}/{username}/tambahsewa','MainController@tampilsewabarang');
	
	//Pengaturan Akun
	Route::get('/{id_penyewa}/{username}/pengaturanakun','MainController@tampilpengaturanakun');
	Route::put('/{id_penyewa}/{username}/simpanpengaturanakun','PenyewaController@simpanpengaturanakun');

	Route::post('/{id_penyewa}/{username}/tambahsewaon','TransaksiPenyewaanController@tambahsewaon');
	Route::get('/{id_penyewa}/{username}/lihatbarangsewa/{id_sewa}','MainController@lihatbarangsewa');

	//pengembalian
	Route::get('/{id_penyewa}/{username}/pengembalian','MainController@tampilpengembalianpenyewa');
	Route::get('/{id_penyewa}/{username}/pengembalian/{id_sewa}/form','MainController@formpengembalianpenyewa');
	Route::post('/{id_penyewa}/{username}/pengembalian/{id_sewa}/tambahpengembalianpenyewa','PengembalianController@tambahpengembalianpenyewa');
});



