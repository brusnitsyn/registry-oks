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
        Schema::create('disp_control_points', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Disp::class);
            $table->foreignIdFor(\App\Models\ControlPoint::class);
            $table->timestamp('control_at')->nullable();
            $table->timestamp('controled_at')->nullable();
            $table->foreignIdFor(\App\Models\ControlPointOption::class)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('disp_control_points');
    }
};
