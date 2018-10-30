<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loai', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedTinyInteger ('l_ma') -> autoIncrement();
            $table->string ('l_ten', 50);
            $table->timestamp('l_taoMoi') 
                ->default (DB::raw ('CURRENT_TIMESTAMP')) 
                ->comment ('Thời điểm đầu tiên tạo loại sản phẩm');
            $table->timestamp('l_capNhat') 
                ->default (DB::raw ('CURRENT_TIMESTAMP')) 
                ->comment ('Thời điểm cập nhật loại sản phẩm gần nhất');
            $table->unsignedTinyInteger('l_trangThai') 
                ->default ('2') 
                ->comment ('Trạng thái loại sản phẩm: 1-khóa , 2-khả dụng');
            
            $table->unique(['l_ten']);
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('loai');
    }
}
