<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserAulasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_aulas', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->unsignedBigInteger('part_id')->nullable();
            $table->unsignedBigInteger('curso_id')->nullable();
            $table->unsignedBigInteger('clase_id')->nullable();

            $table->string('usuario')->unique();
            $table->string('email');
            $table->string('password');

            $table->foreign('clase_id')->references('id')->on('clases')
            ->onUpdate('cascade')->onDelete('set null');
            $table->foreign('curso_id')->references('id')->on('cursos')
            ->onUpdate('cascade')->onDelete('set null');
            $table->foreign('part_id')->references('id')->on('participants')
            ->onUpdate('cascade')->onDelete('set null');

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
        Schema::dropIfExists('user_aulas');
    }
}
