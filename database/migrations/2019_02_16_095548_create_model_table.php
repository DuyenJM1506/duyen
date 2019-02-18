<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('model', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedbigInteger('md_ma')->autoIncrement()->comment('Ma model');
            $table->float('md_canNang')->comment('Can nang nguoi dung');
            $table->bigInteger('md_chieuCao')->comment('Chieu cao nguoi dung');
        });
        DB::statement("ALTER TABLE `model` comment 'Model # Model'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('model');
    }
}
