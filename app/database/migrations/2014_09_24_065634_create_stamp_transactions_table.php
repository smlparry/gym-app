<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStampTransactionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('stamp_transactions', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('stamp_user_id');
			$table->integer('user_id');
			$table->string('stamp_id');
			$table->string('receipt');
			$table->string('secure');
			$table->string('created_response');
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
		Schema::drop('stamp_transactions');
	}

}
