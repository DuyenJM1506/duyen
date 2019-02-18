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
            $table->string ('q_ten', 191);
            $table->string('q_moTa', 191);
          
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
