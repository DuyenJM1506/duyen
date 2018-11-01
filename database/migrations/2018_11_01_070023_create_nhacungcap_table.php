<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNhacungcapTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nhacungcap', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedSmallInteger ('ncc_ma') -> autoIncrement();
            $table->string ('ncc_ten', 191);
            $table->string ('ncc_daiDien',100);
            $table->string ('ncc_diaChi', 250);
            $table->string ('ncc_dienThoai', 11);
            $table->string ('ncc_email', 100);
            $table->timestamp('ncc_taoMoi') 
                ->default (DB::raw ('CURRENT_TIMESTAMP')) 
                ->comment ('Thời điểm đầu tiên tạo nhà cung cấp sản phẩm');
            $table->timestamp('ncc_capNhat') 
                ->default (DB::raw ('CURRENT_TIMESTAMP')) 
                ->comment ('Thời điểm cập nhật nhà cung cấp sản phẩm');
            $table->unsignedTinyInteger('ncc_trangThai') 
                ->default ('2') 
                ->comment ('Trạng thái nhà cung cấp sản phẩm: 1-khóa , 2-khả dụng');
            $table->unsignedMediumInteger ('xx_ma');
            $table->unique (['ncc_ten']);
            $table->foreign('xx_ma')
                ->references ('xx_ma')
                ->on('xuatxu')
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
        Schema::dropIfExists('nhacungcap');
    }
}
