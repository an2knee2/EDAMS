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
        Schema::create('counselors', function (Blueprint $table) {
            $table->id();
            $table->string('id_number')->unique();
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->string('ext_name')->nullable();
            $table->string('sex');
            $table->string('contact_number');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('status')->default('Activated');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('counselors');
    }
};
