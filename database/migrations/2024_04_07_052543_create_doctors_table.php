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
            $table->id("sysId");
            $table->integer("orgId");
            $table->string("uid");
            $table->longText('picture')->nullable();
            $table->integer("nationalId");
            $table->string('lastName');
            $table->string('firstName');
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('phone_number');
            $table->string('address');
            $table->boolean('is_active')->default(0);
            $table->foreignId('id_commune');
            $table->foreignId('id_wilaya');

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
        Schema::dropIfExists('doctors');
    }
}
