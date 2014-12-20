<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGalleryMenuTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('gallery_menu', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('gallery_id')->unsigned()->index();
			$table->foreign('gallery_id')->references('id')->on('galleries')->onDelete('cascade');
			$table->integer('menu_id')->unsigned()->index();
			$table->foreign('menu_id')->references('id')->on('menus')->onDelete('cascade');
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
		Schema::drop('gallery_menu');
	}

}
