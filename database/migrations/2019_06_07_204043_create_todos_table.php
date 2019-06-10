<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTodosTable extends Migration
{
    public function up()
    {
        Schema::create('todos', function (Blueprint $table) {
            $table->bigIncrements('id');
	        $table->string('name');
	        $table->string('description')->default(null);;
	        $table->integer('status');
	        $table->integer('user_id')->references('id')->on('users')->onDelete('CASCADE');
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('todos');
    }
}
