<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChiTietPhieuNhap extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chi_tiet_phieu_nhap', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('phieu_nhap_id');
            $table->string('ma_san_pham');
            $table->string('ten_san_pham');
            $table->integer('so_luong');
            $table->bigInteger('don_gia');
            $table->timestamps();

            $table->foreign('phieu_nhap_id')->references('id')->on('phieu_nhap_hang')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chi_tiet_phieu_nhap');
    }
}
