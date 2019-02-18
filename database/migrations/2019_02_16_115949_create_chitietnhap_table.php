<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChitietnhapTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chitietnhap', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigInteger('sp_ma');
            $table->bigInteger('pn_ma')->comment('Ma phieu nhap');
            $table->bigInteger('ctn_soLuong')->comment('So luong san pham nhap vao');
            $table->unsignedInteger('ctn_donGia')->comment('Gia nhap kho cua sp');

            $table->foreign('sp_ma')->references('sp_ma')
            ->on('sanpham')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('pn_ma')->references('pn_ma')
            ->on('phieunhap')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
        DB::statement("ALTER TABLE `chitietnhap` comment 'Chi tiết nhập # Chi tiết phiếu nhập: sản phẩm, màu, số lượng, đơn giá, phiếu nhập'");
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chitietnhap');
    }
}
