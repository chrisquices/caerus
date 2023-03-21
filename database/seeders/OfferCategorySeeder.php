<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Offer;
use App\Models\OfferCategory;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\CodeCoverage\Report\PHP;

class OfferCategorySeeder extends Seeder {

	/**
	 * Seed the application's database.
	 *
	 * @return void
	 */
	public function run()
	{
		$offers = Offer::all();

		foreach ($offers as $offer) {

			$random_category_id = Category::all()->random(1)->first();

			$offer_category_exists = OfferCategory::query()
				->where('offer_id', $offer->id)
				->where('category_id', $random_category_id->id)
				->first();

			if (!$offer_category_exists) {
				$offer_category = new OfferCategory();
				$offer_category->offer_id = $offer->id;
				$offer_category->category_id = $random_category_id->id;
				$offer_category->save();
			}

			$random_category_id = Category::all()->random(1)->first();

			$offer_category_exists = OfferCategory::query()
				->where('offer_id', $offer->id)
				->where('category_id', $random_category_id->id)
				->first();

			if (!$offer_category_exists) {
				$offer_category = new OfferCategory();
				$offer_category->offer_id = $offer->id;
				$offer_category->category_id = $random_category_id->id;
				$offer_category->save();
			}

		}

	}

}
