<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStampErrorsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('stamp_errors', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id');
			$table->string('receipt');
			$table->string('created_response');
			$table->string('secure');
			$table->string('error_message');
			$table->string('error_code');
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
		Schema::drop('stamp_errors');
	}

}
