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
        Schema::create('giave', function (Blueprint $table) {
            $table->id();
            $table->foreignId('idchuyenbay')->constrained('chuyenbay')->onUpdate('cascade')
                ->onDelete('cascade');
            $table -> float("gia");
            $table -> integer("loaive");
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('giave');
    }
};
