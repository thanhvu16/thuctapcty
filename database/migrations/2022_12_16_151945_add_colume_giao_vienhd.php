<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumeGiaoVienhd extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('khoa', function (Blueprint $table) {
            $table->integer('giang_vien_hd')->nullable();
            $table->integer('giao_vu')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('khoa', function (Blueprint $table) {
            $table->dropColumn('giang_vien_hd');
            $table->dropColumn('giao_vu');
        });
    }
}
