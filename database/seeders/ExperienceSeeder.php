<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Company;
use App\Models\Experience;
use App\Models\Offer;
use App\Models\OfferCategory;
use App\Models\Status;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\CodeCoverage\Report\PHP;

class ExperienceSeeder extends Seeder {

	/**
	 * Seed the application's database.
	 *
	 * @return void
	 */
	public function run()
	{
		$experiences = [
			'Sin exp.',
			'1 año',
			'2 años',
			'3 años',
			'4 años',
			'5 años',
			'5+ años',
		];

		foreach ($experiences as $experience) {
			$new_experience = new Experience();
			$new_experience->name = $experience;
			$new_experience->save();
		}

	}

}
