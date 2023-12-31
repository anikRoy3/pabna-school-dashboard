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
        Schema::create('school_activities', function (Blueprint $table) {
            $table->id();
            $table->string('title')->comment('required');
            $table->text('long_description')->nullable();
            $table->enum('category', ['ক্লাব এবং সোসাইটি', 'মাল্টিমিডিয়া ক্লাস রুম', 'লাইব্রেরি', 'গেমস এবং স্পোর্টস'])->comment('required');
            $table->text('images');
            $table->boolean('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('school_activities');
    }
};
