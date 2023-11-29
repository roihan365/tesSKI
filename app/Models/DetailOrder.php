<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailOrder extends Model
{
    use HasFactory;
    protected $fillable = [
        'no_order',
        'kode_barang',
        'harga_beli',
        'qty',
        'diskon',
        'diskon_rupiah',
        'total'
    ];
}
