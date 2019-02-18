<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateThanhtoanTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('thanhtoan', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedTinyInteger('tt_ma')->autoIncrement()->comment('Mã phương thức thanh toán');
            $table->string('tt_ten')->comment('Tên phương thức # Tên phương thức thanh toán');
          
            $table->unique(['tt_ten']);
        });
        DB::statement("ALTER TABLE `thanhtoan` comment 'Phương thức thanh toán # Phương thức thanh toán'");
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('thanhtoan');
    }
}