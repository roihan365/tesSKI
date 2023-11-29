<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Barang;
use App\Models\DetailOrder;
use App\Models\Supplier;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $order = Order::all();
        return view('pembelian.index', compact('order'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $supplier = Supplier::all();
        $barang = Barang::all();
        return view('pembelian.create', compact('supplier', 'barang'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrderRequest $request)
    {
        $kode = Order::generateKodeOrder();
        Order::create([
            'no_order' => $kode,
            'kode_supplier' => $request->kode_supplier,
            'tgl_order' => date('Y-m-d'),
        ]);

        $hargaBarang = Barang::where('kode_barang', 'SKI1129202')->first()->harga;
        $diskon = ($request->diskon / 100) * ($hargaBarang * $request->qty);

        DetailOrder::create([
            'no_order' => $kode,
            'kode_barang' => $request->kode_barang,
            'harga_beli' => $hargaBarang,
            'qty' => $request->qty,
            'diskon' => $request->diskon,
            //hitung diskon rupiah
            'diskon_rupiah' => $diskon,
            //hitung total
            'total' => ($request->qty * $hargaBarang) - $diskon,
        ]);

        return redirect()->route('pembelian.create')->with('success', 'Order berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
