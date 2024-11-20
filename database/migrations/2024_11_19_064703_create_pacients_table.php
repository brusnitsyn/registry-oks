<?php

use App\Models\Lpu;
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
        Schema::create('pacients', function (Blueprint $table) {
            $table->id();
            $table->string('num')->nullable();
            $table->string('fio');
            $table->string('snils')->nullable();
            $table->timestamp('birth_at')->nullable();
            $table->timestamp('receipt_at');
            $table->timestamp('discharge_at')->nullable();
            $table->foreignIdFor(Lpu::class)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pacients');
    }
};
