<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCombosTable extends Migration
{
    public function up()
    {
        Schema::create('combos', function (Blueprint $table) {
            $table->id();
            $table->string('form_name')->comment('نام فرمی که این فیلد باید در آن نمایش داده شود');
            $table->tinyInteger('select_index')->comment('شماره کمبو باکسی که این فیلد باید در آن نمایش داده شود');
            $table->tinyInteger('value')->comment('مقدار آپشن');
            $table->string('text')->comment('تکست آپشن');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('combos');
    }
}
