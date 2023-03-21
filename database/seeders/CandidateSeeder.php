<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Candidate;
use App\Models\Category;
use App\Models\City;
use App\Models\Company;
use App\Models\Experience;
use App\Models\JobType;
use App\Models\Offer;
use App\Models\OfferCategory;
use App\Models\Profession;
use App\Models\Status;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\CodeCoverage\Report\PHP;

class CandidateSeeder extends Seeder {

	/**
	 * Seed the application's database.
	 *
	 * @return void
	 */
	public function run()
	{
		$salaries = [null, null, 2500000, 3000000, 4000000, 4500000, 5000000, 6000000, 7000000, 8000000, 9000000];

		$users = User::where('type', 'Candidate')->get();

		foreach ($users as $user) {
			$new_candidate = new Candidate();
			$new_candidate->profession_id = Profession::all()->random(1)->first()->id;
			$new_candidate->experience_id = Experience::all()->random(1)->first()->id;
			$new_candidate->city_id = City::all()->random(1)->first()->id;
			$new_candidate->about_me = fake()->text(500);
			$new_candidate->telephone = fake()->phoneNumber();
			$new_candidate->address = fake()->address();
			$new_candidate->birth_date = Carbon::parse(Carbon::now()->subYears(18))->subYears(rand(1, 10));
			$new_candidate->expected_salary = $salaries[fake()->randomElement([0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 10])];
			$new_candidate->banner = 'candidates/candidate-banner-default.jpg';
			$new_candidate->is_verified = 1;
			$new_candidate->is_active = 1;
			$new_candidate->save();

			$user->candidate_id = $new_candidate->id;
			$user->save();
		}

	}

}
