<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCostsTable extends Migration
{
    public function up()
    {
        Schema::create('costs', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->comment('آی دی کاربر');
            $table->string('date')->comment('تاریخ');
            $table->string('subject')->comment('موضوع هزینه');
            $table->bigInteger('amount')->comment('مبلغ');
            $table->timestamps();


        });
    }

    public function down()
    {
        Schema::dropIfExists('costs');
    }
}
