<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolicitantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitantes', function (Blueprint $table) {
            $table->id();
            $table->string("email")->unique();
            $table->string("password");
            $table->bigInteger("phone")->unique();
            $table->string("name");
            $table->string("surname");
            $table->string("dni")->unique();
            $table->date("birthdate");
            $table->string("place_of_birth");
            $table->integer("postal_code");
            $table->string("street_name");
            $table->string("number");
            $table->string("floor");
            $table->string("door");
            $table->string("city");
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
        Schema::dropIfExists('solicitantes');
    }
}
