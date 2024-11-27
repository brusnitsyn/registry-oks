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
        Schema::create('disp_call_brief_questions', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\DispCallBrief::class);
            $table->foreignIdFor(\App\Models\DispCallBriefQuestionChapter::class);
            $table->string('question');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('disp_call_brief_questions');
    }
};
