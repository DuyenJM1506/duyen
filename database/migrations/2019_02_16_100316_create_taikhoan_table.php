<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaikhoanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taikhoan', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedBigInteger('tk_ma')->comment('Mã tài khoản');
            $table->string('tk_username')->comment('Username dùng để đăng nhập');
            $table->string('tk_password')->comment('Password dùng để đăng nhập');
            $table->timestamp('tk_capNhat')->default(DB::raw('CURRENT_TIMESTAMP'))
                ->comment('Thời điểm tạo # Thời điểm cập nhật tài khoản');
            $table->timestamp('tk_taoMoi')->default(DB::raw('CURRENT_TIMESTAMP'))
                ->comment('Thời điểm tạo # Thời điểm tạo mới tài khoản');
            $table->unsignedTinyInteger('tk_trangThai')->default('1')
                ->comment('Trạng thái # Trạng thái tài khoản: 1-Khóa, 2-Khả dụng');
            $table->unsignedTinyInteger('q_ma')->comment('Mã quyền đăng nhập tài khoản');
            $table->foreign('q_ma')
                ->references ('q_ma')
                ->on('quyen')
                ->onDelete('CASCADE')
                ->onUpdate ('CASCADE');
        });
        DB::statement("ALTER TABLE `taikhoan` comment 'Tài khoản # Tài khoản'");
      
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('taikhoan');
    }
}
