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
        Schema::create('opportunities', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->date('date')->nullable();;
            $table->string('location')->nullable();;
            $table->string('tags')->nullable();;
            $table->string('schedule')->nullable();;
            $table->string('skills')->nullable();;
            $table->string('requirements')->nullable();;
            $table->smallInteger('no_of_volunteers_needed')->nullable();;
            $table->smallInteger('no_of_volunteers_assigned')->nullable();;
            $table->boolean('started')->nullable();;
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
