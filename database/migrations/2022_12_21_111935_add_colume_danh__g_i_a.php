<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumeDanhGIA extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('y_kien_doanh_nghiep')->nullable();
            $table->string('danh_gia_doanh_nghiep')->nullable();
            $table->string('diem_doanh_nghiep')->nullable();
            $table->string('y_kien_giang_vien')->nullable();
            $table->string('danh_gia_giang_vien')->nullable();
            $table->string('diem_giang_vien')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('danh_gia_doanh_nghiep');
            $table->dropColumn('diem_doanh_nghiep');
            $table->dropColumn('danh_gia_giang_vien');
            $table->dropColumn('diem_giang_vien');
            $table->dropColumn('y_kien_giang_vien');
            $table->dropColumn('y_kien_doanh_nghiep');
        });
    }
}
