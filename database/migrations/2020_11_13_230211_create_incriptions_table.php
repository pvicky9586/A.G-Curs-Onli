<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incriptions', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');              
            $table->unsignedBigInteger('curso_id')->nullable();
            $table->unsignedBigInteger('part_id')->nullable();
            $table->boolean('conf')->default('0');
            $table->integer('user_conf')->nullable();
            $table->integer('user_created')->nullable();
            $table->integer('user_updated')->nullable();

            $table->foreign('curso_id')->references('id')->on('cursos');
            $table->foreign('part_id')->references('id')->on('participants');

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
        Schema::dropIfExists('incriptions');
    }
}
