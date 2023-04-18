<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCashesTable extends Migration
{
    public function up()
    {
        Schema::create('cashes', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->comment('آی دی کاربر');
            $table->string('date')->comment('تاریخ');
            $table->string('resource')->comment('منبع');
            $table->bigInteger('amount')->comment('مبلغ');
            $table->string('description')->nullable()->comment('توضیحات');
            $table->timestamps();

        });
    }

    public function down()
    {
        Schema::dropIfExists('cashes');
    }
}
