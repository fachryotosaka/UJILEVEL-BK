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
        Schema::create('consultations', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->longText('description');
            $table->time('time')->nullable();
            $table->date('date')->nullable();
            $table->longText('place')->nullable();
            $table->enum('status', ['waiting', 'approve', 'decline', 'finished'])->nullable();
            $table->longText('result')->nullable();
            $table->longText('reason')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('consultations');
        Schema::enableForeignKeyConstraints();
    }
};
