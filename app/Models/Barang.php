<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    protected $fillable = [
        'kode_barang',
        'nama_barang',
        'satuan',
        'harga',
    ];

    /**
     * Generate kode barang.
     */
    public static function generateKodeBarang(): string
    {
        $kode_barang = 'SKI' . date('md') . rand(100, 999);

        if (self::where('kode_barang', $kode_barang)->exists()) {
            return self::generateKodeBarang();
        }

        return $kode_barang;
    }

    public function stock()
    {
        return $this->hasOne(Stock::class, 'kode_barang', 'kode_barang');
    }
    
}
