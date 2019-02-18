<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSizeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    { 
        Schema::create('size', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedTinyInteger ('s_ma') -> autoIncrement();
            $table->string ('s_ten', 50);
            $table->timestamp('s_taoMoi') 
                ->default (DB::raw ('CURRENT_TIMESTAMP')) 
                ->comment ('Thời điểm đầu tiên tạo size sản phẩm');
            $table->timestamp('s_capNhat') 
                ->default (DB::raw ('CURRENT_TIMESTAMP')) 
                ->comment ('Thời điểm cập nhật size sản phẩm');
            $table->unsignedTinyInteger('s_trangThai') 
                ->default ('2') 
                ->comment ('Trạng thái size sản phẩm: 1-khóa , 2-khả dụng');
            
            $table->unique(['s_ten']);
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('size');
    }
}
