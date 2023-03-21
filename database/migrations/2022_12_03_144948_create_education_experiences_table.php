<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('education_experiences', function (Blueprint $table) {
			$table->id();
			$table->unsignedBigInteger('candidate_id');
			$table->string('institution');
			$table->string('title');
			$table->string('location');
			$table->string('from');
			$table->string('to');
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
		Schema::dropIfExists('education_experiences');
	}

};
