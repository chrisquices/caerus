<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Company;
use App\Models\Offer;
use App\Models\OfferCategory;
use App\Models\QuickOffer;
use App\Models\Status;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\CodeCoverage\Report\PHP;

class QuickOfferSeeder extends Seeder {

	/**
	 * Seed the application's database.
	 *
	 * @return void
	 */
	public function run()
	{
		$quick_offers = [
			'quick-offers/quick-offer-00001.jpg',
			'quick-offers/quick-offer-00002.jpg',
			'quick-offers/quick-offer-00003.jpg',
			'quick-offers/quick-offer-00004.jpg',
			'quick-offers/quick-offer-00005.jpg',
			'quick-offers/quick-offer-00006.jpg',
			'quick-offers/quick-offer-00007.jpg',
			'quick-offers/quick-offer-00008.jpg',
			'quick-offers/quick-offer-00009.jpg',
			'quick-offers/quick-offer-00010.jpg',
			'quick-offers/quick-offer-00011.jpg',
			'quick-offers/quick-offer-00012.jpg',
			'quick-offers/quick-offer-00013.jpg',
			'quick-offers/quick-offer-00014.jpg',
			'quick-offers/quick-offer-00015.jpg',
			'quick-offers/quick-offer-00016.jpg',
			'quick-offers/quick-offer-00017.jpg',
			'quick-offers/quick-offer-00018.jpg',
		];

		foreach ($quick_offers as $quick_offer) {
			$new_quick_offer = new QuickOffer();
			$new_quick_offer->photo = $quick_offer;
			$new_quick_offer->save();
		}

	}

}
