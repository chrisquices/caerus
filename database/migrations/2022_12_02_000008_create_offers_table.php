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
		Schema::create('offers', function (Blueprint $table) {
			$table->id();
			$table->unsignedBigInteger('company_id');
			$table->unsignedBigInteger('city_id');
			$table->unsignedBigInteger('job_type_id');
			$table->unsignedBigInteger('experience_id');
			$table->string('title');
			$table->longText('description');
			$table->string('salary')->nullable();
			$table->boolean('is_active');
			$table->timestamp('posted_at');
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
		Schema::dropIfExists('offers');
	}

};
