<?php

namespace App\Http\Controllers;
use App\Model\SewaModel;
use Illuminate\Http\Request;
use App\Http\Controllers\DB;

class AdminController extends Controller
{
   public function tampilberanda(){
   	

   		return view('admin/beranda');
   }


}
