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
            $table->foreignId("requestor_id")->constrained("solicitantes");
            $table->foreignId("building_id")->constrained("tipo_edificios");
            $table->foreignId("construction_id")->constrained("tipo_obras");
            $table->foreignId("worker_id")->nullable()->constrained("trabajadores");
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
