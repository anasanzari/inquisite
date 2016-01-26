<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class IncrementFbid extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('stories', function ($table){
		    $table->dropForeign('stories_userid_foreign');
		});

		DB::statement('ALTER TABLE fb_users MODIFY fbid VARCHAR(25)');
		DB::statement('ALTER TABLE stories MODIFY userid VARCHAR(25)');

		Schema::table('stories', function ($table){
		    $table->foreign('userid')->references('fbid')->on('fb_users');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{

	}

}
