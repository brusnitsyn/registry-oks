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
        Schema::create('disp_call_brief_answers', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\DispCallBriefQuestion::class);
            $table->string('answer');
            $table->boolean('has_send_smp')->default(false);
            $table->boolean('has_send_doctor')->default(false);
            $table->boolean('has_attention')->default(false);
            $table->boolean('has_need_consult_doctor')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('disp_call_brief_answers');
    }
};
