<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id("healthId");
            $table->string('firstName');
            // $table->string('lastName');
            $table->string('email');
            // $table->date('birthDate');
            // $table->enum('gender', ["M", "F"]);
            $table->string('password');
            // $table->string('phone');
            // $table->string('street');
            // $table->foreignId('baldya');
            // $table->foreignId('wilaya');
            // $table->foreignId('generalMedicalRecord');
            // $table->foreignId('card');
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patients');
    }
}
