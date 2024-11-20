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
        Schema::create('disps', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Pacient::class);
            $table->timestamp('begin_at');
            $table->timestamp('end_at')->nullable();
            $table->foreignIdFor(\App\Models\DispState::class);
            $table->foreignIdFor(\App\Models\DispDopHealth::class);
            $table->foreignIdFor(\App\Models\LekPrState::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('disps');
    }
};
