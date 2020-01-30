<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDrawMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('draw_members', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->integer('number1');
            $table->integer('number2');
            $table->integer('number3');
            $table->integer('number4');
            $table->integer('number5');
            $table->integer('total');
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
        Schema::dropIfExists('draw_members');
    }
}
