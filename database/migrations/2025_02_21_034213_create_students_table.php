<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('id_number')->unique();
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->string('ext_name')->nullable();
            $table->enum('sex', ['Male', 'Female']);
            $table->unsignedBigInteger('school_id');
            $table->unsignedBigInteger('program_id');
            $table->string('contact_number');
            $table->string('email')->unique();
            $table->string('password');
            $table->enum('status', ['Activated', 'Disabled'])->default('Activated');
            $table->timestamps();

            $table->foreign('school_id')->references('id')->on('schools')->onDelete('cascade');
            $table->foreign('program_id')->references('id')->on('programs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}