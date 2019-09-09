<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AdminModel extends Model
{
    protected $table = 'admin';
    public $timestamps = false;
    protected $primaryKey = 'id_admin'; 
}
