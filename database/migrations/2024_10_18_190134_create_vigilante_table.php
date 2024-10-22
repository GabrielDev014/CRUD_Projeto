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
        Schema::create('vigilante', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_cidade')->constrained('cidade')->onDelete('cascade');
            $table->foreignId('id_estado')->constrained('estado')->onDelete('cascade');
            $table->string('vigia_nome');
            $table->boolean('vigia_ativo')->default(1);
            $table->string('vigia_celular');
            $table->string('vigia_email');
            $table->string('vigia_senha');
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
        Schema::dropIfExists('vigilante');
    }
};
