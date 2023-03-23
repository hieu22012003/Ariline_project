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
        Schema::create('hoadon', function (Blueprint $table) {
            $table->id();
            $table->foreignId('idkh')->constrained('khachhang')->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('mave')->constrained('ve')->onUpdate('cascade')
                ->onDelete('cascade');
            $table->date("ngaylaphoadon");
            $table->integer("tongtien");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hoadon');
    }
};
