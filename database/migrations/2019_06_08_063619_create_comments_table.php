<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{

    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('comment');
	        $table->integer('user_id')->references('id')->on('users')->onDelete('CASCADE');
	        $table->integer('parent_id')->references('id')->on('todos')->onDelete('CASCADE');
	        $table->boolean('completed')->default(false);
	        $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
