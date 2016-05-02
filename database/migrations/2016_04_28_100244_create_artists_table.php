<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArtistsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('artists', function (Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->string('description');
			$table->dateTime('start');
			$table->dateTime('end');
			$table->string('image');
			// TODO events embedded or separated -> should artist play more than once?
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
		Schema::drop('artists');
	}
}
