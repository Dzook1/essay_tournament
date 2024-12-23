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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('role')->default('user');
            $table->string('first_name', 30);
            $table->string('last_name', 30);
            $table->string('username', 40)->unique();
            $table->string('email', 254)->unique();
            $table->string('password', 255);
            $table->integer('rank')->nullable();
            $table->string('profile_pic', 1000)->nullable();
            $table->string('about', 255)->nullable();
            $table->integer('number_wins')->default(0);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
