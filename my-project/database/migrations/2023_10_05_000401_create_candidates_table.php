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
        Schema::create('candidates', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('uuid')->unique();
            $table->string('career_level');
            $table->string('job_major');
            $table->integer('years_of_experience');
            $table->string('degree_type');
            $table->json('skills');
            $table->string('nationality');
            $table->string('city');
            $table->decimal('salary', 10, 2);
            $table->enum('gender', ['Male', 'Female', 'Not Specified']);
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidates');
    }
};
