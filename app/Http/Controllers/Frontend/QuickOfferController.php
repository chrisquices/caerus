<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Offer;
use App\Models\Department;
use App\Models\QuickOffer;
use Carbon\Carbon;

class QuickOfferController extends Controller {

	public function index()
	{
		$quick_offers = QuickOffer::whereDate('created_at', '>=', Carbon::now()->subDays(7))->get();
		$quick_offers_today = QuickOffer::whereDate('created_at', Carbon::today())->count();

		return view('frontend.quick-offers.index', compact('quick_offers', 'quick_offers_today'));
	}

}
