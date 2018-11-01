<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuyenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quyen', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedTinyInteger ('q_ma') -> autoIncrement();
            $table->string ('q_ten', 30);
            $table->string('q_dienGiai', 250);
            $table->timestamp('q_taoMoi') 
                ->default (DB::raw ('CURRENT_TIMESTAMP')) 
                ->comment ('Thời điểm đầu tiên tạo quyền');
            $table->timestamp('q_capNhat') 
                ->default (DB::raw ('CURRENT_TIMESTAMP')) 
                ->comment ('Thời điểm cập nhật quyền');
            $table->unsignedTinyInteger('q_trangThai') 
                ->default ('2') 
                ->comment ('Trạng thái quyền: 1-khóa , 2-khả dụng');
            
            $table->unique(['q_ten']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quyen');
    }
}
