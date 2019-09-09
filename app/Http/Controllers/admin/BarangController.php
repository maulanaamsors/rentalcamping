<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KelolaBrgController extends Controller
{
    function index(){
    	return view('admin/barang');
    }

    function show($id){
    	return 'rental camping hal : '.$id;
    }
}
