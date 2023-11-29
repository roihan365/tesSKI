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
        Schema::create('hutangs', function (Blueprint $table) {
            $table->id();
            $table->string('no_order', 10)->foreign('no_order')->references('no_order')->on('orders');
            $table->string('kode_supplier', 10)->foreign('kode_supplier')->references('kode_supplier')->on('suppliers');
            $table->dateTime('tgl_hutang');
            $table->integer('total_hutang');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hutangs');
    }
};
