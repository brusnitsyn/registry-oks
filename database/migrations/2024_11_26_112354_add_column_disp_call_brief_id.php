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
        Schema::table('call_disp_control_points', function (Blueprint $table) {
            $table->foreignIdFor(\App\Models\DispCallBrief::class)->default(1);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('call_disp_control_points', function (Blueprint $table) {
            $table->dropColumn('disp_call_brief_id');
        });
    }
};
