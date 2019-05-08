<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSizesanphamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    
        Schema::create('sizesanpham', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedInteger ('sst') -> autoIncrement();
            $table->smallInteger ('ssp_soLuong', 5);
            
            $table->foreign('s_ma')->references('s_ma')
            ->on('size')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('sp_ma')->references('sp_ma')
            ->on('sanpham')->onDelete('CASCADE')->onUpdate('CASCADE');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sizesanpham');
    }
}
