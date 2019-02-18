<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMausizeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mausize', function (Blueprint $table) {
            $table->unsignedTinyInteger('m_ma')->comment('Ma mau');
            $table->unsignedTinyInteger('s_ma')->comment('Ma size');
            
            $table->foreign('m_ma')->references('m_ma')
            ->on('mau')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('s_ma')->references('s_ma')
            ->on('size')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mausize');
    }
}
