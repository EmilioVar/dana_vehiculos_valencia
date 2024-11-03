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
        Schema::create('avistamientos', function (Blueprint $table) {
            $table->id();
            $table->string('matricula')->unique();
            $table->string('lat')->nullable();
            $table->string('lon')->nullable();
            $table->enum('status', ['aparcado', 'siniestro']);
            $table->boolean('personas')->default(false);
            $table->text('observaciones')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('avistamientos');
    }
};
