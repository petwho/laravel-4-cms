<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGalleriesMenusTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('galleries_menus', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('gallery_id')->unsigned()->index();
			$table->foreign('gallery_id')->references('id')->on('galleries')->onDelete('cascade');
			$table->integer('menus_id')->unsigned()->index();
			$table->foreign('menus_id')->references('id')->on('menuses')->onDelete('cascade');
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
		Schema::drop('galleries_menus');
	}

}
