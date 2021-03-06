<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateImagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('images', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->string('title');
			$table->text('url');
			$table->text('thumb_url');
			$table->integer('gallery_id')->unsigned();
			$table->foreign('gallery_id')->on('galleries')->references('id')->onDelete('cascade');
			$table->integer('subcat')->unsigned()->nullable(); // values from 1 to 6
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
		Schema::drop('images');
	}

}
