<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'no_order',
        'nama_order',
        'kode_supplier',
        'tgl_order'
    ];

    public static function generateKodeOrder()
    {
        $order = Order::orderBy('no_order', 'desc')->first();
        if (!empty($order)) {
            $kode = $order->kode_order;
            $urutan = substr($kode, 7, 3);
            $urutan++;
            $kode = 'B' . date('Ym') . sprintf("%03s", $urutan);
        } else {
            $kode = 'B' . date('Ym') . '001';
        }
        return $kode;
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'kode_supplier', 'kode_supplier');
    }
}
