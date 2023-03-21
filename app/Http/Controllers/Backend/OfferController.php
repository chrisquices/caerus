<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
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

class OfferController extends Controller {

	public function index()
	{
		return view('backend.offers.index');
	}

	public function create()
	{
		$categories = Category::all();
		$departments = Department::all();
		$experiences = Experience::all();
		$job_types = JobType::all();

		return view('backend.offers.create', compact('categories', 'departments', 'experiences', 'job_types'));
	}

	public function store(Request $request)
	{
		$validator = Validator::make($request->all(), [
			'city_id'       => 'required',
			'experience_id' => 'required',
			'job_type_id'   => 'required',
			'title'         => 'required',
			'description'   => 'required',
			'category_ids'  => 'required',
		])->validate();

		$offer = new Offer();
		$offer->company_id = session('global_company_id');
		$offer->city_id = $request->city_id;
		$offer->experience_id = $request->experience_id;
		$offer->job_type_id = $request->job_type_id;
		$offer->title = $request->title;
		$offer->description = $request->description;
		$offer->salary = $request->salary;
		$offer->posted_at = now();
		$offer->is_active = 1;
		$offer->save();

		foreach ($request->category_ids as $category_id) {
			$offer_category = new OfferCategory();
			$offer_category->offer_id = $offer->id;
			$offer_category->category_id = $category_id;
			$offer_category->save();
		}

		Session::flash('success', 'Oferta creada exitosamente');

		return redirect()->route('backend.offers.show', ['offer' => $offer->id]);
	}

	public function show(Offer $offer)
	{
		$categories = Category::all();
		$departments = Department::all();
		$experiences = Experience::all();
		$job_types = JobType::all();

		return view('backend.offers.show', compact('offer', 'categories', 'departments', 'experiences', 'job_types'));
	}

	public function edit(Offer $offer)
	{
		$categories = Category::all();
		$departments = Department::all();
		$experiences = Experience::all();
		$job_types = JobType::all();

		return view('backend.offers.edit', compact('offer', 'categories', 'departments', 'experiences', 'job_types'));
	}

	public function update(Request $request, Offer $offer)
	{
		$validator = Validator::make($request->all(), [
			'city_id'       => 'required',
			'experience_id' => 'required',
			'job_type_id'   => 'required',
			'title'         => 'required',
			'description'   => 'required',
			'category_ids'  => 'required',
		])->validate();

		$offer->city_id = $request->city_id;
		$offer->experience_id = $request->experience_id;
		$offer->job_type_id = $request->job_type_id;
		$offer->title = $request->title;
		$offer->description = $request->description;
		$offer->salary = $request->salary;
		$offer->is_active = $request->is_active;
		$offer->save();

		OfferCategory::where('offer_id', $offer->id)->delete();

		foreach ($request->category_ids as $category_id) {
			$offer_category = new OfferCategory();
			$offer_category->offer_id = $offer->id;
			$offer_category->category_id = $category_id;
			$offer_category->save();
		}

		Session::flash('success', 'Oferta actualizada exitosamente');

		return redirect()->route('backend.offers.show', ['offer' => $offer->id]);
	}

	public function delete(Offer $offer)
	{
		try {
			$offer->delete();

			Session::flash('success', 'Oferta eliminada exitosamente');

		} catch (QueryException $e) {
			Session::flash('error', 'No se pudo eliminar el registro');
		}

		return redirect()->route('backend.offers.index');
	}


}
