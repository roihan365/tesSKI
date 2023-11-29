<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;
    protected $fillable = [
        'kode_supplier',
        'nama_supplier',
    ];

    /**
     * Generate kode supplier.
     */
    public static function generateKodeSupplier(): string
    {
        $kode_barang = 'SUP' . date('md') . rand(100, 999);

        if (self::where('kode_supplier', $kode_barang)->exists()) {
            return self::generateKodeBarang();
        }

        return $kode_barang;
    }

    public function order()
    {
        return $this->hasMany(Order::class, 'kode_supplier', 'kode_supplier');
    }
}
