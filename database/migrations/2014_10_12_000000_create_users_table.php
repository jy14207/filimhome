<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('نام و نام خانوادگی');
            $table->string("mobile")->unique()->comment('شماره همراه');
            $table->string("username")->unique()->comment('نام کاربری');
            $table->string('password')->comment('پسوورد');;
            $table->string('level')->nullable()->comment('سطج کاربری');
            $table->string('email')->nullable()->comment('ایمیل');
            $table->string('store_name')->nullable()->comment('نام فروشگاه');
            $table->string('store_address')->nullable()->comment('آدرس فروشگاه');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
