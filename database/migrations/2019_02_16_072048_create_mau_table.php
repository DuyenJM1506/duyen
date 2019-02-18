<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMauTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mau', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedTinyInteger ('m_ma') -> autoIncrement();
            $table->string ('m_ten', 50);
            $table->timestamp('m_taoMoi') 
                ->default (DB::raw ('CURRENT_TIMESTAMP')) 
                ->comment ('Thời điểm đầu tiên tạo màu sản phẩm');
            $table->timestamp('m_capNhat') 
                ->default (DB::raw ('CURRENT_TIMESTAMP')) 
                ->comment ('Thời điểm cập nhật màu sản phẩm');
            $table->unsignedTinyInteger('m_trangThai') 
                ->default ('2') 
                ->comment ('Trạng thái màu sản phẩm: 1-khóa , 2-khả dụng');
            
            $table->unique(['m_ten']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mau');
    }
}
