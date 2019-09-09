<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PengembalianModel extends Model
{
    protected $table = 'pengembalian';
    public $timestamps = false;
    protected $primaryKey = 'id_pengembalian'; 

    public function SewaModel(){
    	return $this->hasOne('App\Model\SewaModel','id_sewa');
    }

    public function PenyewaModel(){
   		return $this->belongsTo('App\Model\PenyewaModel','id_penyewa');
    }
}