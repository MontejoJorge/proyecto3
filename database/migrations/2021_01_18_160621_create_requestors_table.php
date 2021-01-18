<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requestors', function (Blueprint $table) {
            $table->id();
            $table->string("email");
            $table->string("password");
            $table->integer("phone");
            $table->string("name");
            $table->string("surname");
            $table->string("dni");
            $table->date("birthdate");
            $table->string("place_of_birth");
            $table->integer("postal_code");
            $table->string("street_name");
            $table->integer("number");
            $table->integer("floor");
            $table->string("door");
            $table->string("city");
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
        Schema::dropIfExists('requestors');
    }
}
