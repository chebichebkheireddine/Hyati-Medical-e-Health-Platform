<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->id("doctor_id");
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('name');
            $table->string('phone_number');
            $table->string('address');
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('specializations', function (Blueprint $table) {
            $table->id('specialization_id');
            $table->string('specialization_name');
            $table->string('specialization_description');
        });

        // Table of Specialization
        Schema::create('doctor_specializations', function (Blueprint $table) {
            $table->foreignId('doctor_id')->constrained('doctors', 'doctor_id')->cascadeOnDelete();
            $table->foreignId('specialization_id')->constrained('specializations', 'specialization_id')->cascadeOnDelete();
            $table->primary(['doctor_id', 'specialization_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('doctor_specializations');
        Schema::dropIfExists('doctors');
        Schema::dropIfExists('specializations');
    }
}
