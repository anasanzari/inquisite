<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStoriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('stories', function(Blueprint $table)
	{
		$table->increments('id');
		$table->string('userid',15);
		$table->string('person',70);
		$table->integer('stickerid')->unsigned()->nullable();
		$table->text('content');
		$table->foreign('stickerid')->references('id')->on('stickers')->onDelete('set null');

	});



	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('stories');
		//
	}

}
