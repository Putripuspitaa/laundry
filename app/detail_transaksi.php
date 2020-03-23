<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class detail_transaksi extends Model
{
    protected $table="detail_transaksi";
    protected $primaryKey="id";
    public $timestamps= false;
    protected $fillable = [
      'id_transaksi' , 'id_jenis' , 'qty' , 'subtotal'
    ];
    public function jenis_cuci(){
      return $this->belongsTo('App\jenis_cuci', 'id_jenis');
    }
    public function transaksi(){
      return $this->belongsTo('App\transaksi', 'id_transaksi');
    }
}
