<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gastos', function (Blueprint $table) {
            $table->id();


            $table->unsignedBigInteger('instalation_id');
            $table->foreign('instalation_id')
                ->references('id')
                ->on('instalations')
                ->onDelete('cascade');

            $table->unsignedBigInteger('materiale_id');
            $table->foreign('materiale_id')
                ->references('id')
                ->on('materiales')
                ->onDelete('cascade');
                
            $table->unsignedBigInteger('propietario_id');
            $table->foreign('propietario_id')
                ->references('id')
                ->on('propietarios')
                ->onDelete('cascade');


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
        Schema::dropIfExists('gastos');
    }
};
