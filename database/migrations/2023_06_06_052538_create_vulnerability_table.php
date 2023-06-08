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
        Schema::create('vulnerability', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('vulnerability_type');
            $table->longText('conclusion');
            $table->timestamps();
            $table->foreign('vulnerability_type')->references('id')->on('vulnerability_types');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vulnerability');
    }
};
