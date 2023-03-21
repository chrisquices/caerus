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
		Schema::create('companies', function (Blueprint $table) {
			$table->id();
			$table->string('city_id');
			$table->string('category_id');
			$table->string('name');
			$table->text('description');
			$table->string('email');
			$table->string('telephone');
			$table->string('address');
			$table->string('website');
			$table->string('photo')->nullable();
			$table->string('banner')->nullable();
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
		Schema::dropIfExists('companies');
	}

};
