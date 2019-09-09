<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PenyewaModel extends Model
{
    protected $table = 'penyewa';
    public $timestamps = false;
    protected $primaryKey = 'id_penyewa'; 

    public function TransewaModel(){
    	return $this->hasMany('App\Model\TransewaModel','id_penyewa');
    }

    public function SewaModel(){
   		return $this->belongsTo('App\Model\SewaModel','id_sewa');
    }

    public function PengembalianModel(){
   		return $this->belongsTo('App\Model\PengembalianModel','id_pengembalian');
    }    
}
