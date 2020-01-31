<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeToNullableDrawMemberIdOnTableDrawGroup extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('draw_groups', function (Blueprint $table) {
            $table->integer('draw_member_id')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('draw_groups', function (Blueprint $table) {
            $table->integer('draw_member_id')->nullable(false)->change();
        });
    }
}
