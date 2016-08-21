<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDonvisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donvis', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tendonvi');
            $table->string('madonvi', 6)->unique();
            $table->integer('donvi_id');
            $table->integer('loaidonvi');
            $table->integer('trangthai')->default(1);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('donvis');
    }
}
