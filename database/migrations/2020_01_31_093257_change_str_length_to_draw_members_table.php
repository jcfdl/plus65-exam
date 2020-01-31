<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeStrLengthToDrawMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('draw_members', function (Blueprint $table) {
            $table->string('number1', 10)->change();
            $table->string('number2', 10)->change();
            $table->string('number3', 10)->change();
            $table->string('number4', 10)->change();
            $table->string('number5', 10)->change();
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
            //
        });
    }
}
