<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    //
         protected $fillable = ['nama_pelanggan', 'id_barang', 'tanggal', 'harga_barang', 'jumlah_beli', 'sub_total', 'id_petugas'];

         public function barang()
         {
         	return $this->belongsTo('App\Barang','id_barang');
         }
         public function anggota()
         {
         	return $this->belongsTo('App\Anggota','id_petugas');
         }

}
