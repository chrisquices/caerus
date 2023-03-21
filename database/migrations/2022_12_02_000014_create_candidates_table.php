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
		Schema::create('candidates', function (Blueprint $table) {
			$table->id();
			$table->unsignedBigInteger('profession_id')->nullable();
			$table->unsignedBigInteger('experience_id')->nullable();
			$table->unsignedBigInteger('city_id')->nullable();
			$table->text('about_me')->nullable();
			$table->text('telephone')->nullable();
			$table->text('address')->nullable();
			$table->date('birth_date')->nullable();
			$table->string('expected_salary')->nullable();
			$table->string('banner')->nullable();
			$table->string('resume')->nullable();
			$table->boolean('is_public')->default(1);
			$table->boolean('is_verified');
			$table->boolean('is_active');
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
		Schema::dropIfExists('candidates');
	}

};
