<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 255);
            $table->unsignedInteger('categori_id')->unsigned();
            $table->unsignedInteger('user_id')->unsigned();
            $table->unsignedInteger('public_user_id')->unsigned()->nullable();
            $table->string('meta_key', 255)->nullable();
            $table->string('site_title', 255)->nullable();
            $table->string('meta_desc', 255)->nullable();
            $table->string('image_preview', 255)->nullable();
            $table->string('image_banner', 255)->nullable();
            $table->integer('view')->default(0);
            $table->text('content')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->tinyInteger('hot')->default(0);
            $table->foreign('categori_id')->references('id')->on('categories')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('news');
    }
}
