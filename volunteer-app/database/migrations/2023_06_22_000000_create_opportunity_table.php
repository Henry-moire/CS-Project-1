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
        Schema::create('opportunity', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->date('date');
            $table->string('location');
            $table->string('tags');
            $table->string('schedule');
            $table->string('skills');
            $table->string('requirements');
            $table->smallInteger('no_of_volunteers_needed');
            $table->smallInteger('no_of_volunteers_assigned');
            $table->boolean('started');
            $table->timestamp('created_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_roles');
    }
};
