<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGiaonhansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('giaonhans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('soquyen');
            $table->integer('loaihoadon_id');
            $table->integer('sohdbatdau',7);
            $table->integer('sohdkethuc',7);
            $table->date('ngaythang');
            $table->integer('nguoigiao_id');
            $table->integer('nguoinhan_id');
            $table->integer('xacnhan');//0: chua xac nhan; 1: da xac nhan
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
        Schema::drop('giaonhans');
    }
}
