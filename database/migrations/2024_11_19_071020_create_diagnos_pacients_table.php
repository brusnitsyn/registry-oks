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
        Schema::create('diagnos_pacients', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Diagnos::class);
            $table->foreignIdFor(\App\Models\DiagnosType::class);
            $table->foreignIdFor(\App\Models\Pacient::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('diagnos_pacients');
    }
};
