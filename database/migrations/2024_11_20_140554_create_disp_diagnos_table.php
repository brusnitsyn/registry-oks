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
        Schema::create('disp_diagnos', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Disp::class);
            $table->foreignIdFor(\App\Models\DiagnosType::class);
            $table->foreignIdFor(\App\Models\Mkb::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('disp_diagnos');
    }
};
