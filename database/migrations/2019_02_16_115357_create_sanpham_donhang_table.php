<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSanphamDonhangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sanpham_donhang', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigInteger('sp_ma')->comment('Ma san pham');
            $table->bigInteger('dh_ma')->comment('ma don hang');
            $table->bigInteger('dhsp_ma')->comment('Ma don hang - san pham');
            $table->foreign('sp_ma')
                ->references ('sp_ma')
                ->on('sanpham')
                ->onDelete('CASCADE')
                ->onUpdate ('CASCADE');
            $table->foreign('dh_ma')
                ->references ('dh_ma')
                ->on('donhangsanpham')
                ->onDelete('CASCADE')
                ->onUpdate ('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sanpham_donhang');
    }
}
