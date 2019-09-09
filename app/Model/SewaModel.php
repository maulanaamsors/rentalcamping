<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SewaModel extends Model
{
    protected $table = 'sewa';
    public $timestamps = false;
    protected $primaryKey = 'id_sewa'; 

    public function TransewaModel(){
    	return $this->hasMany('App\Model\TransewaModel','id_sewa');
    }

    public function PenyewaModel(){
   		return $this->belongsTo('App\Model\PenyewaModel','id_penyewa');
    }

    public function PengembalianModel(){
   		return $this->belongsTo('App\Model\PengembalianModel','id_pengembalian');
   }
}
