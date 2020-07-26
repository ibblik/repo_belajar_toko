<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    //
    protected $table = 'order';
    public $timestamps = false;

    protected $fillable = ['tanggal_pesan','id_barang','id_costumer'];
}
