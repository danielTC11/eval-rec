<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->increments('id_producto')->nullable(false); //  obligatorio
            $table->string('nombre',100)->nullable(false); //  obligatorio
            $table->string('marca',100)->nullable();
            $table->double('precio')->nullable(false); //  obligatorio
            $table->integer('stock')->nullable();
            $table->unsignedInteger('id_categoria')->nullable(false); //  obligatorio
            $table->timestamps();

            $table->foreign('id_categoria')->references('id_categoria')->on('categorias')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
