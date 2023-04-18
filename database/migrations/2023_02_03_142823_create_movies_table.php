<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoviesTable extends Migration
{
    public function up()
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->integer('type_id')->comment('آی دی نوع فیلم'); // فیلم سینمایی یا انیمیشن
            $table->tinyInteger('company_id')->comment('آی دی کشور');
            $table->string('persian_title')->comment('نام فارسی');
            $table->string('english_title')->comment('نام انگلیسی');
            $table->string('genre')->comment('ژانر');
            $table->string('language')->comment('زبان dubbed Subbed '); // dubbed Subbed
            $table->string('year')->comment('سال ساخت');
            $table->string('short_description')->comment('توضیح کوتاه');
            $table->string('movie_story')->comment('داستان فیلم');
            $table->text('about_movie')->comment('درباره فیلم');
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
        Schema::dropIfExists('movies');
    }
}
