<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSanphamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sanpham', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigInteger('sp_ma') ->autoIncrement();
            $table->string ('sp_ten', 191);
            $table->integer('sp_giaGoc')
                ->default ('0');
            $table->unsignedInteger('sp_giaBan')
                ->default ('0'); 
            $table->string ('sp_hinh', 200);
           
            $table->timestamp('sp_taoMoi') 
                ->default (DB::raw ('CURRENT_TIMESTAMP')) 
                ->comment ('Tạo sản phẩm mới'); 
            $table->timestamp('sp_capNhat') 
                ->default (DB::raw ('CURRENT_TIMESTAMP')) 
                ->comment ('Cập nhật sản phẩm mới'); 
            $table->unsignedTinyInteger('sp_trangThai') 
                ->default ('2') 
                ->comment ('Trạng thái sản phẩm: 1-khóa , 2-khả dụng');
            $table->unsignedTinyInteger ('l_ma')
                ->comment ('Loại sản phâm');
            $table->unique('sp_ten');
            $table->bigInteger('sp_soLuongBanDau');
            $table->bigInteger('sp_soLuongHienTai');
            $table->foreign('l_ma')
                ->references ('l_ma')
                ->on('loai')
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
        Schema::dropIfExists('sanpham');
    }
}
