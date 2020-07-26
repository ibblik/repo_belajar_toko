<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class costumer extends Model
{
    //
    protected $table = 'costumer';
    public $timestamps = false;

    protected $fillable = ['nama_costumer','alamat','no_hp'];
}
