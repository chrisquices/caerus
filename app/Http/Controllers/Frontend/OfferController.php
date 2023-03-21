<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Offer;
use App\Models\OfferCategory;
use App\Models\Status;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class OfferController extends Controller {

	public function index()
	{
		$offers_count = Offer::where('is_active', 1)->count();

		return view('frontend.offers.index', compact('offers_count'));
	}

	public function show(Offer $offer)
	{
		session()->forget('redirect_offer_id');

		$category_ids = OfferCategory::where('offer_id', $offer->id)->pluck('category_id');

		$similar_offer_ids = OfferCategory::whereIn('category_id', $category_ids)->distinct()->pluck('offer_id');

		$similar_offers = Offer::whereIn('id', $similar_offer_ids)
			->whereDate('created_at', '>=', Carbon::now()->subMonth())
			->inRandomOrder()
			->get()
			->take(5);

		if ($similar_offers->count() < 5) {
			$similar_offers = Offer::latest()->get()->take(5);
		}

		$user = auth()->user();
		$can_apply = false;

		if ($user) {
			$has_application_been_sent = Application::query()
				->where('offer_id', $offer->id)
				->where('candidate_id', $user->candidate->id)
				->first();

			if (!$has_application_been_sent) {
				$can_apply = true;
			}
		}

		return view('frontend.offers.show', compact('offer', 'similar_offers', 'can_apply'));
	}

	public function storeApplication(Request $request, Offer $offer)
	{
		$user = auth()->user();
		$candidate = $user->candidate;
		$status = Status::query()
			->where('company_id', $offer->company->id)
			->where('is_start', 1)
			->first();

		$application = new Application();
		$application->offer_id = $offer->id;
		$application->candidate_id = $candidate->id;
		$application->status_id = $status->id;
		$application->message = $request->message;
		$application->cover_letter = $request->cover_letter;
		$application->expected_salary = $request->expected_salary;
		$application->is_accepted = 0;
		$application->is_active = 1;
		$application->applied_at = now();
		$application->save();

		Session::flash('success', 'Su aplicación ha sido enviada');

		return back();
	}

}
