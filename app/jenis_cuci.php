<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class jenis_cuci extends Model
{
    protected $table="jenis_cuci";
    protected $primaryKey="id";
    public $timestamps= false;
    protected $fillable = [
      'nama_jenis', 'harga_per_kg'
    ];
}
