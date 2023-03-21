<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Company;
use App\Models\JobType;
use App\Models\Language;
use App\Models\Offer;
use App\Models\OfferCategory;
use App\Models\Status;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\CodeCoverage\Report\PHP;

class LanguageSeeder extends Seeder {

	/**
	 * Seed the application's database.
	 *
	 * @return void
	 */
	public function run()
	{
		$languages = ['Español', 'Inglés', 'Alemán', 'Portugués', 'Japonés', 'Koreano'];

		foreach ($languages as $language) {
			$new_language = new Language();
			$new_language->name = $language;
			$new_language->save();
		}

	}

}
