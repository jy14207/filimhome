<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->comment('آی دی یوزر');
            $table->integer('commodity_id')->comment('آی دی کالا');
            $table->integer('count')->comment('تعداد');
            $table->bigInteger('unit_price')->comment('قیمت واحد');
            $table->bigInteger('total_price')->comment('قیمت کل');
            $table->string('date')->comment('تاریخ');
            $table->integer('discount_price')->default(0)->nullable()->comment('مبلغ تخفیف');
            $table->integer('invoices_with_inventory')->comment('آی دی فاکتور در جدول خرید');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('sales');
    }
}
