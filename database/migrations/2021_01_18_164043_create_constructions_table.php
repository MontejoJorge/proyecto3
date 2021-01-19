<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConstructionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('constructions', function (Blueprint $table) {
            $table->id();
            $table->foreignId("requestor_id")->constrained("requestors");
            $table->foreignId("building_id")->constrained("building_types");
            $table->foreignId("construction_id")->constrained("construction_types");
            $table->foreignId("worker_id")->nullable()->constrained("workers");
            $table->foreignId("comment_id")->nullable()->constrained("comments");
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
        Schema::dropIfExists('constructions');
    }
}
