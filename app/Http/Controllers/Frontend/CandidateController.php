<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use App\Models\Category;
use App\Models\Experience;
use App\Models\JobType;
use App\Models\Offer;
use App\Models\Department;
use App\Models\QuickOffer;
use Carbon\Carbon;

class CandidateController extends Controller {

	public function index()
	{
		$candidates_count = Candidate::query()
			->where('is_active', 1)
			->where('is_public', 1)
			->count();

		return view('frontend.candidates.index', compact('candidates_count'));
	}

	public function show(Candidate $candidate)
	{
		return view('frontend.candidates.show', compact('candidate'));
	}

}
