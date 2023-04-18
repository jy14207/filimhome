<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommoditiesTable extends Migration
{
    public function up()
    {
        Schema::create('commodities', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('user_id')->comment('آی دی یوزر');
            $table->bigInteger('code')->comment('کد کالا');
            $table->smallInteger('category_id')->nullable()->comment('ای دی دسته بندی');
            $table->string('title')->comment('نام کالا');
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('commodities');
    }
}
