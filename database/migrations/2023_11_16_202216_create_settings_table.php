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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('school_name')->comment('required');
            $table->string('school_logo')->comment('required');
            $table->string('address')->comment('required');
            $table->string('EIIN_no')->comment('required');
            $table->unsignedBigInteger('college_code')->comment('required');
            $table->unsignedBigInteger('school_code')->comment('required');
            $table->json('mobile_numbers');
            $table->json('emails');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
