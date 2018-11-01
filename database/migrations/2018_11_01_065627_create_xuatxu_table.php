<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateXuatxuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('xuatxu', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedMediumInteger ('xx_ma') -> autoIncrement();
            $table->string ('xx_ten', 100);
            $table->timestamp('xx_taoMoi') 
                ->default (DB::raw ('CURRENT_TIMESTAMP')) 
                ->comment ('Thời điểm đầu tiên tạo xuất xứ sản phẩm');
            $table->timestamp('xx_capNhat') 
                ->default (DB::raw ('CURRENT_TIMESTAMP')) 
                ->comment ('Thời điểm cập nhật xuất xứ sản phẩm');
            $table->unsignedTinyInteger('xx_trangThai') 
                ->default ('2') 
                ->comment ('Trạng thái xuất xứ sản phẩm: 1-khóa , 2-khả dụng');
            
            $table->unique(['xx_ten']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('xuatxu');
    }
}
