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
        Schema::create('call_disp_control_points', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\DispControlPoint::class);
            $table->foreignIdFor(App\Models\ResultCall::class);
            $table->text('info')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('call_disp_control_points');
    }
};
