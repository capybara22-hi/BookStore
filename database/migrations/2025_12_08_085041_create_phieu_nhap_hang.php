<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhieuNhapHang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phieu_nhap_hang', function (Blueprint $table) {
            $table->id();
            $table->integer('nguoi_nhap');
            $table->timestamps();

            // Foreign key bỏ comment nếu bảng users có ma_nguoi_dung là unsignedBigInteger
            $table->foreign('nguoi_nhap')->references('ma_nguoi_dung')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('phieu_nhap_hang');
    }
}
