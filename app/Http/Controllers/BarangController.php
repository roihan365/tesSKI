<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Http\Requests\StoreBarangRequest;
use App\Http\Requests\UpdateBarangRequest;
use App\Models\Stock;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barang = Barang::with('stock')->orderBy('created_at', 'desc')->paginate(10);
        return view('barang.index', compact('barang'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('barang.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBarangRequest $request)
    {
        $kode_barang = Barang::generateKodeBarang();

        Barang::create([
            'kode_barang' => $kode_barang,
            'nama_barang' => $request->nama_barang,
            'satuan' => $request->satuan,
            'harga' => $request->harga,
        ]);

        Stock::create([
            'kode_barang' => $kode_barang,
            'stok' => $request->stok,
        ]);

        return redirect()->route('barang.create')->with('success', 'Barang berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Barang $barang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Barang $barang)
    {
        $barang = Barang::findOrFail($barang->id);
        return view('barang.edit', compact('barang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBarangRequest $request, Barang $barang)
    {
        $barang = Barang::findOrFail($barang->id);
        $barang->update([
            'nama_barang' => $request->nama_barang,
            'satuan' => $request->satuan,
            'harga' => $request->harga,
        ]);

        if ($barang->stock) {
            $barang->stock->update([
                'stok' => $request->stok,
            ]);
        } else {
            Stock::create([
                'kode_barang' => $barang->kode_barang,
                'stok' => $request->stok,
            ]);
        }

        return redirect()->route('barang.index')->with('success', 'Barang berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Barang $barang)
    {
        //
    }
}
