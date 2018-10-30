<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChudeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chude', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedTinyInteger ('cd_ma') -> autoIncrement();
            $table->string ('cd_ten', 50);
            $table->timestamp('cd_taoMoi') 
                ->default (DB::raw ('CURRENT_TIMESTAMP')) 
                ->comment ('Thời điểm đầu tiên tạo chủ đề sản phẩm');
            $table->timestamp('cd_capNhat') 
                ->default (DB::raw ('CURRENT_TIMESTAMP')) 
                ->comment ('Thời điểm cập nhật chủ đề sản phẩm gần nhất');
            $table->unsignedTinyInteger('cd_trangThai') 
                ->default ('2') 
                ->comment ('Trạng thái chủ đề sản phẩm: 1-khóa , 2-khả dụng');

            $table->unique(['cd_ten']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chude');
    }
}
