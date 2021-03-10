<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTamañosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tamaños', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre', 50);
            $table->decimal('ancho', 8, 2);
            $table->decimal('alto', 8, 2);
            $table->decimal('grueso', 8, 2);
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
        Schema::dropIfExists('tamaños');
    }
}
