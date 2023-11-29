<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('detail_orders', function (Blueprint $table) {
            $table->id();
            $table->string('no_order', 10)->foreign('no_order')->references('no_order')->on('orders');
            $table->string('kode_barang', 10)->foreign('kode_barang')->references('kode_barang')->on('barangs');
            $table->integer('harga_beli');
            $table->integer('qty');
            $table->integer('diskon');
            $table->integer('diskon_rupiah');
            $table->integer('total');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_orders');
    }
};
