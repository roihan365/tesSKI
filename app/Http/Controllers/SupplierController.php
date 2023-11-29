<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use App\Http\Requests\StoreSupplierRequest;
use App\Http\Requests\UpdateSupplierRequest;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $supplier = Supplier::all();
        return view('supplier.index', compact('supplier'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('supplier.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSupplierRequest $request)
    {
        $kode = Supplier::generateKodeSupplier();
        Supplier::create([
            'kode_supplier' => $kode,
            'nama_supplier' => $request->nama_supplier,
        ]);

        return redirect()->route('supplier.create')->with('success', 'Supplier berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Supplier $supplier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Supplier $supplier)
    {
        $supplier = Supplier::findOrFail($supplier->id);
        return view('supplier.edit', compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSupplierRequest $request, Supplier $supplier)
    {
        $supplier = Supplier::findOrFail($supplier->id);
        $supplier->update([
            'nama_supplier' => $request->nama_supplier,
        ]);

        return redirect()->route('supplier.index')->with('success', 'Supplier berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Supplier $supplier)
    {
        //
    }
}
