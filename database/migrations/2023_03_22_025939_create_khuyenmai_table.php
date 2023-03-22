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
        Schema::create('khuyenmai', function (Blueprint $table) {
            $table->id();
            $table->foreignId('idkh')->constrained('khachhang')->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('idchuyenbay')->constrained('chuyenbay')->onUpdate('cascade')
                ->onDelete('cascade');
            $table->integer('Giam');
            $table->longText('noidung');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('khuyenmai');
    }
};
