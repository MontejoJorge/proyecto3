<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Obra;

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
            $table->string("postal_code");
            $table->string("city");
            $table->string("province");
            $table->string("latitude");
            $table->string("longitude");

            //Fechas
            $table->date("start_date")->useCurrent()->nullable();
            $table->date("end_date")->nullable();

            //Otros
            $table->enum("state",["created", "pending", "denied", "authorized"])->default("created");
            $table->text("description");
            $table->char("blueprint")->nullable();
            $table->timestamps();
        });

        Obra::create([
            "requestor_id" => 2,
            "building_type" => 1,
            "construction_type" => 1,
            "worker_id" => 1,
            "street_name" => "Calle la fundicion",
            "number" => "2",
            "floor" => "3",
            "door" => "D",
            "postal_code" => "09200",
            "city" => "Miranda",
            "province" => "Burgos",
            "state" => "created",
            "description" => "Quiero hace una terraza nueva",
        ]);

        Obra::create([
            "requestor_id" => 2,
            "building_type" => 1,
            "construction_type" => 1,
            "street_name" => "Av Olarizu",
            "number" => "2",
            "floor" => "3",
            "door" => "D",
            "postal_code" => "09200",
            "city" => "Miranda",
            "province" => "Burgos",
            "state" => "pending",
            "description" => "Quiero hace una terraza nueva",
        ]);
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
