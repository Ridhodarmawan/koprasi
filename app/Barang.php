<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    //
     protected $fillable = ['nama_barang', 'kode_barang', 'harga_barang', 'stok_barang', 'satuan'];

     public function satuan()
         {
         	return $this->belongsTo('App\Satuan','satuan');
         }
}
