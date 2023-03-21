<?php

namespace Database\Seeders;

use App\Models\Application;
use App\Models\Candidate;
use App\Models\Offer;
use App\Models\Status;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ApplicationSeeder extends Seeder {

	/**
	 * Seed the application's database.
	 *
	 * @return void
	 */
	public function run()
	{
		$offers = Offer::all();

		foreach ($offers as $offer) {

			$random_candidate = Candidate::all()->random(1)->first();

			$application_exists = Application::query()
				->where('offer_id', $offer->id)
				->where('candidate_id', $random_candidate->id)
				->first();

			if (!$application_exists) {
				$new_application = new Application();
				$new_application->offer_id = $offer->id;
				$new_application->candidate_id = $random_candidate->id;
				$new_application->status_id = Status::where('company_id', $offer->company->id)->where('is_start', 1)->first()->id;
				$new_application->message = fake()->text(500);
				$new_application->cover_letter = fake()->text(1000);
				$new_application->expected_salary = $random_candidate->expected_salary;
				$new_application->is_accepted = 0;
				$new_application->is_active = 1;
				$new_application->applied_at = Carbon::today()->subDays(rand(0, 90));
				$new_application->save();
			}
		}

	}

}
