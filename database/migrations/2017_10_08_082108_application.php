<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Application extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('application', function (Blueprint $table) {
         $table->increments('id');
         $table->string('avatar')->comment('头像');
         $table->string('name')->comment('姓名');
         $table->string('academy')->comment('学院');
         $table->string('phone')->unique();
         $table->string('group')->comment('组别');
         $table->text('intro')->comment('个人简介');
         $table->text('exper')->comment('个人经历');
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
        Schema::dropIfExists('application');
    }
}
