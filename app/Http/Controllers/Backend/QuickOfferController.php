<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Department;
use App\Models\Experience;
use App\Models\JobType;
use App\Models\Offer;
use App\Models\QuickOffer;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class QuickOfferController extends Controller {

	public function index()
	{
		$quick_offers = QuickOffer::all();

		return view('backend.quick-offers.index');
	}

	public function create()
	{
		return view('backend.quick-offers.create');
	}

	public function store(Request $request)
	{
		$validator = Validator::make($request->all(), [
			'photos' => 'required',
		])->validate();

		if (count($request->photos) > 10) {
			Session::flash('error', 'No puede subir más de 10 imágenes');

			return back();
		}

		foreach ($request->photos as $photo) {
			$quick_offer = new QuickOffer();

			$image_name = substr(str_shuffle(md5(time())), 0, 10) . '.jpg';

			Storage::disk('public')->putFileAs('quick-offers/', $photo, $image_name);

			Image::make(public_path('storage/quick-offers/' . $image_name))
				->encode('jpg', 70)
				->save();

			$quick_offer->photo = 'quick-offers/' . $image_name;
			$quick_offer->save();
		}

		Session::flash('success', 'Oferta rápida creada exitosamente');

		return redirect()->route('backend.quick_offers.index');
	}

	public function show(QuickOffer $quick_offer)
	{
		return view('backend.quick-offers.show', compact('quick_offer'));
	}

	public function delete(QuickOffer $quick_offer)
	{
		try {
			$quick_offer->delete();

			Session::flash('success', 'Oferta rápida eliminada exitosamente');

		} catch (QueryException $e) {
			Session::flash('error', 'No se pudo eliminar el registro');
		}

		return redirect()->route('backend.quick_offers.index');
	}


}
