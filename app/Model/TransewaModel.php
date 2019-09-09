<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class TransewaModel extends Model
{
    protected $table = 'transaksi_penyewaan';
    public $timestamps = false;

   public function PenyewaModel(){
   		return $this->belongsTo('App\Model\PenyewaModel','id_penyewa');
   }

   public function BarangModel(){
   		return $this->belongsTo('App\Model\BarangModel','id_brg');
   }

   public function SewaModel(){
   		return $this->belongsTo('App\Model\SewaModel','id_sewa');
   }

   
}
