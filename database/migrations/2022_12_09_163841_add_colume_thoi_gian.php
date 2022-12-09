<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumeThoiGian extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cong_viec_chi_tiet', function (Blueprint $table) {
            $table->date('thoi_gian_ht')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cong_viec_chi_tiet', function (Blueprint $table) {
            $table->dropColumn('thoi_gian_ht');
        });
    }
}
