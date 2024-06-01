<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrganizationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('organizations', function (Blueprint $table) {
            $table->id("org_id");
            $table->string("org_name");
            $table->string("org_email");
            $table->string("org_phone");
            $table->string("org_address");
            $table->string("org_wilaya");
            $table->string("org_baldya");
            $table->unsignedBigInteger("org_type");
            $table->foreign("org_type")->references("type_id")->on("organization_types")->onUpdate('cascade')->onDelete('cascade');
        });
        Schema::create('organization_types', function (Blueprint $table) {
            $table->id("type_id");
            $table->string("type_name");
            $table->string("type_des");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('organizations');
        Schema::dropIfExists('organization_types');
    }
}
