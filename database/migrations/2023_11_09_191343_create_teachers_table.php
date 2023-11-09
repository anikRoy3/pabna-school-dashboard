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
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('required');
            $table->string('email')->comment('required');
            $table->string('phone')->comment('required');
            $table->string('designation')->comment('required');
            $table->string('lastDegree')->comment('required');
            $table->enum('section', ['day', 'morning', 'others'])->comment('required');
            $table->boolean('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teachers');
    }
};
