<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeNumbersToNullableTableDrawMembers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('draw_members', function (Blueprint $table) {
            $table->string('number1')->nullable()->change();
            $table->string('number2')->nullable()->change();
            $table->string('number3')->nullable()->change();
            $table->string('number4')->nullable()->change();
            $table->string('number5')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('draw_members', function (Blueprint $table) {
            //  $table->integer('number1')->nullable(false)->change();
            // $table->integer('number2')->nullable(false)->change();
            // $table->integer('number3')->nullable(false)->change();
            // $table->integer('number4')->nullable(false)->change();
            // $table->integer('number5')->nullable(false)->change();
        });
    }
}
