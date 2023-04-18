<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buys', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->comment('آی دی کاربر');
            $table->integer('commodity_id')->comment('آی دی کالا');
            $table->integer('count')->default(1)->comment('تعداد');
            $table->bigInteger('unit_price')->default(1)->comment('قیمت واحد');
            $table->bigInteger('total_price')->default(1)->comment('قیمت کل');
            $table->string('date')->nullable()->comment('تاریخ');
            $table->string('description')->nullable()->comment('توضیحات');
            $table->bigInteger('unit_sale_price')->nullable()->comment('قیمت واحد - فروش');
            $table->bigInteger('total_sale_price')->nullable()->comment('قیمت واحد - فروش');
            $table->integer('inventory')->nullable()->comment('تعداد موجودی انبار');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('buys');
    }
}
