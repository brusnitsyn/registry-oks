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
        Schema::create('lpus', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('short_name')->nullable();
            $table->string('ogrn')->nullable();
            $table->string('inn')->nullable();
            $table->string('kpp')->nullable();
            $table->string('fio_gv')->nullable();
            $table->string('tel')->nullable();
            $table->string('email')->nullable();
            $table->string('okpo')->nullable();
            $table->string('code_mo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lpus');
    }
};
