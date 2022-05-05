<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaksi extends Model
{
    protected $guarded=['id'];
    // protected $table = 'transaksis';
    // protected $fillable = ['kode','nama_customer', 'tgl','status'];
    public function place()
    {
        return $this->belongsTo(Place::class);
    }
}