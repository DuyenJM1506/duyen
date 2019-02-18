<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMausanphamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mausanpham', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigInteger('sp_ma')->comment('Màu sắc # m_ma # m_ten # Mã sản phẩm');
            $table->unsignedTinyInteger('m_ma')->comment('Sản phẩm # sp_ma # sp_ten # Mã màu sản phẩm');
            $table->unsignedSmallInteger('msp_soluong')->default('0')->comment('Số lượng # Số lượng sản phẩm tương ứng với màu');
            
            $table->primary(['sp_ma', 'm_ma']);
            $table->foreign('m_ma')->references('m_ma')->on('mau')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('sp_ma')->references('sp_ma')->on('sanpham')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
        DB::statement("ALTER TABLE `mausanpham` comment 'Số lượng sản phẩm theo màu # Số lượng sản phẩm tương ứng với các màu'");
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mausanpham');
    }
}
