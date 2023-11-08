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
        Schema::create('co_curricular', function (Blueprint $table) {
            $table->id();
            $table->string('exam_name')->comment('required');
            $table->integer('exam_year')->comment('required');
            $table->integer('total_candidates')->comment('required');
            $table->integer('attended_candidates')->comment('required');
            $table->integer('a_plus_holder')->comment('required');
            $table->integer('total_pass')->comment('required');
            $table->integer('pass_rate')->comment('required');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('co_curricular');
    }
};
