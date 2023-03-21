<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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

class OfferSeeder extends Seeder {

	/**
	 * Seed the application's database.
	 *
	 * @return void
	 */
	public function run()
	{
		$title_prefixes = ['', 'Buscamos ', 'Urgente ', '', ''];

		$title_suffixes = ['Sin Experiencia', 'Sin Exp.', 'Junior', 'Jr', 'Jr.', 'Intermedio', 'Inter.', 'Intermedio-Senior', 'Senior', 'Senior+'];

		$salaries = [null, 2500000, 3000000, 4000000, 4500000, 5000000, 6000000, 7000000, 8000000, 9000000];

		for ($i = 0; $i < 1000; $i++) {
			$offer = new Offer();
			$offer->company_id = fake()->randomElement([1, 2, 3, 4, 5, 6, 7, 8]);
			$offer->city_id = City::all()->random(1)->first()->id;
			$offer->experience_id = Experience::all()->random(1)->first()->id;
			$offer->job_type_id = JobType::all()->random(1)->first()->id;
			$offer->title = fake()->randomElement($title_prefixes) . ' ' . Profession::all()->random(1)->first()->name . ' ' . fake()->randomElement($title_suffixes);
			$offer->description = fake()->text(1500);
			$offer->salary = fake()->randomElement($salaries);
			$offer->is_active = 1;
			$offer->posted_at = now();
			$offer->save();
		}

	}

}
