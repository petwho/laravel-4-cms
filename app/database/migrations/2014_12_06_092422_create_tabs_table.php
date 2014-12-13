<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTabsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tabs', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('panel_id')->unsigned();
			$table->string('title');
			$table->integer('position');
			$table->foreign('panel_id')->references('id')->on('panels')->onDelete('cascade');
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
		Schema::drop('tabs');
	}

}
