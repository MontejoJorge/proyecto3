<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\TipoEdificio;

class CreateTiposEdificiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipos_edificios', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->timestamps();
        });

        TipoEdificio::create([
            "name" => "Restaurante",
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tipos_edificios');
    }
}
