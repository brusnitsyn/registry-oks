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
        Schema::table('disps', function (Blueprint $table) {
            $table->foreignIdFor(\App\Models\DispReasonClose::class)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('disps', function (Blueprint $table) {
            $table->dropColumn('disp_reason_close_id');
        });
    }
};
