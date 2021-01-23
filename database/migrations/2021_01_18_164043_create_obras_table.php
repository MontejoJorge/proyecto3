<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateObrasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('obras', function (Blueprint $table) {
            $table->id();
            //Foreign Keys
            $table->foreignId("requestor_id")->constrained("users");
            $table->foreignId("building_type")->constrained("tipos_edificios");
            $table->foreignId("construction_type")->constrained("tipos_obras");
            $table->foreignId("worker_id")->nullable()->constrained("users");

            //Direccion
            $table->string("street_name");
            $table->string("number");
            $table->string("floor");
            $table->string("door");
            $table->integer("postal_code");
            $table->string("city");
            $table->string("province");

            //Fechas
            $table->date("start_date")->useCurrent()->nullable();
            $table->date("end_date")->nullable();

            //Otros
            $table->text("description");
            $table->longText("blueprint")->nullable();
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
        Schema::dropIfExists('obras');
    }
}
