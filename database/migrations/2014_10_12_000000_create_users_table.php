<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id("sysId");
            $table->foreignId('orgID')->default(0);
            $table->integer('nationalID');
            $table->string('firstName');
            $table->string('lastname');
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('phone');
            $table->string("address");
            $table->foreignId('id_commune');
            $table->foreignId('id_wilaya');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->longText('picture')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
