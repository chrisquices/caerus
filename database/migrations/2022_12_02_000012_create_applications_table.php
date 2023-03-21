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
		Schema::create('applications', function (Blueprint $table) {
			$table->id();
			$table->unsignedBigInteger('offer_id');
			$table->unsignedBigInteger('candidate_id');
			$table->unsignedBigInteger('status_id');
			$table->text('message')->nullable();
			$table->text('cover_letter')->nullable();
			$table->text('expected_salary')->nullable();
			$table->boolean('is_accepted');
			$table->boolean('is_active');
			$table->timestamp('applied_at');
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
		Schema::dropIfExists('applications');
	}

};
