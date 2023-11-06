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
        Schema::create('directors', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('required');
            $table->string('email')->comment('required');
            $table->string('phone')->comment('required');
            $table->string('image')->comment("required");
            $table->string('designation')->comment('required');
            $table->text('biodata')->nullable();
            $table->text('speech')->nullable();
            $table->string('subject')->nullable();
            $table->integer('d_c_id')->comment('required');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('directors');
    }
};
