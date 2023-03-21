<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use App\Models\Category;
use App\Models\Experience;
use App\Models\JobType;
use App\Models\Offer;
use App\Models\Department;
use App\Models\OfferCategory;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class CandidateController extends Controller {

	public function index()
	{
		return view('backend.candidates.index');
	}

	public function show(Candidate $candidate)
	{
		return view('backend.candidates.show', compact('candidate'));
	}

}
