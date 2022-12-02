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
        Schema::create('empresas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 45);
            $table->string('logo')->nullable();
            $table->string('slogan')->nullable();
            $table->string('direccion')->nullable();
            $table->string('rnc')->nullable();
            
            $table->unsignedBigInteger('user_id')
                ->unique();
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

           /*  $table->unsignedBigInteger('telefono_id')
                ->unique();
            $table->foreign('telefono_id')
                ->references('id')
                ->on('telefonos')
                ->onDelete('cascade'); */

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
        Schema::dropIfExists('empresas');
    }
};
