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
        Schema::create('grade_assignments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('round_id')->constrained()->onDelete('cascade');
            $table->foreignId('participant_a_id')->constrained('participants')->onDelete('cascade');
            $table->foreignId('submission_a_id')->constrained('submissions')->onDelete('cascade');
            $table->boolean('is_graded_a')->default(false);
            $table->foreignId('participant_b_id')->constrained('participants')->onDelete('cascade');
            $table->foreignId('submission_b_id')->constrained('submissions')->onDelete('cascade');
            $table->boolean('is_graded_b')->default(false);
            $table->dateTime('grading_deadline');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grade_assignments');
    }
};
