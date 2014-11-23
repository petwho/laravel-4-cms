<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGalleryProjectTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('gallery_project', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('gallery_id')->unsigned()->index();
			$table->foreign('gallery_id')->references('id')->on('galleries')->onDelete('cascade');
			$table->integer('project_id')->unsigned()->index();
			$table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
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
		Schema::drop('gallery_project');
	}

}
