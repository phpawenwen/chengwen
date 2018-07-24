<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopcontentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shopcontents', function (Blueprint $table) {
            $table->increments('id');
            $table->string("dizhi")->comment("商铺地址");
            $table->string("name")->comment("商铺名字");
            $table->integer("pinpai")->comment("商铺品牌");
            $table->integer("bao")->comment("是否保标记");
            $table->integer("piao")->comment("是否票标记");
            $table->integer("zhun")->comment("是否准标记");
            $table->integer("content")->comment("商铺简介");
            $table->integer("youhuixinxi")->comment("优惠信息");
            $table->integer("status")->comment("商铺状态");
            $table->integer("peisongfangshi")->comment("配送方式");
            $table->integer("start_send")->comment("起送价");
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
        Schema::dropIfExists('shopcontents');
    }
}
