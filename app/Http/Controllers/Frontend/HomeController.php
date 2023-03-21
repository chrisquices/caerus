<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Offer;
use App\Models\Department;

class HomeController extends Controller {

	public function index()
	{
		$user = auth()->user();
		$categories = Category::all();
		$categories_chunks = Category::all()->chunk(2);
		$departments = Department::all();
		$latest_offers = Offer::query()
			->where('is_active', 1)
			->latest()
			->get()
			->take(8);

		return view('frontend.index', compact('categories', 'categories_chunks', 'departments', 'latest_offers'));
	}

}
