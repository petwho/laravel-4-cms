<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('posts', function($table)
    {
			$table->increments('id');
	    $table->integer('category_id')->unsigned();
	    $table->string('title');
	    $table->string('summary');
	    $table->text('content');
	    $table->string('image');
	    $table->softDeletes();
	    $table->timestamps();
	    $table->foreign('category_id')
        ->references('id')->on('categories')
        ->onDelete('cascade');
	  });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('posts');
	}

}
