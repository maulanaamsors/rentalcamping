<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BarangModel extends Model
{
    protected $table = 'barang';
    public $timestamps = false;

    //protected $fillable = ['nama_brg','jenis_brg','stok','harga','keterangan'];
    protected $primaryKey = 'id_brg'; 
    
    public function TransewaModel(){
    	return $this->hasMany('App\Model\TransewaModel','id_brg');
    }
}
