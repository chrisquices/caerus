<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\City;
use App\Models\Company;
use App\Models\Department;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;

class CompanyController extends Controller {

	public function index()
	{
		$companies = Company::all();

		return view('backend.companies.index', compact('companies'));
	}

	public function create()
	{
		$categories = Category::all();
		$departments = Department::all();

		return view('backend.companies.create', compact('categories', 'departments'));
	}

	public function store(Request $request)
	{
		$validator = Validator::make($request->all(), [
			'city_id'     => 'required',
			'category_id' => 'required',
			'name'        => 'required',
			'description' => 'required',
			'email'       => 'required|email|unique:companies',
			'telephone'   => 'required',
			'address'     => 'required',
			'website'     => 'required',
		])->validate();

		$company = new Company();
		$company->city_id = $request->city_id;
		$company->category_id = $request->category_id;
		$company->name = $request->name;
		$company->description = $request->description;
		$company->email = $request->email;
		$company->telephone = $request->telephone;
		$company->address = $request->address;
		$company->website = $request->website;
		$company->is_active = 1;
		$company->save();

		if ($request->photo) {
			$validator = Validator::make($request->all(), [
				'photo' => 'mimes:jpg,png,jpeg',
			])->validate();

			$image_name = substr(str_shuffle(md5(time())), 0, 10) . '.jpg';

			Storage::disk('public')->putFileAs('companies/', $request->file('photo'), $image_name);

			Image::make(public_path('storage/companies/' . $image_name))
				->resize(1000, 1000)
				->encode('jpg', 70)
				->save();

			$company->photo = 'companies/' . $image_name;
			$company->save();
		}

		if ($request->banner) {
			$validator = Validator::make($request->all(), [
				'banner' => 'mimes:jpg,png,jpeg',
			])->validate();

			$image_name = substr(str_shuffle(md5(time())), 0, 10) . '.jpg';

			Storage::disk('public')->putFileAs('companies/', $request->file('banner'), $image_name);

			Image::make(public_path('storage/companies/' . $image_name))
				->resize(1300, 700)
				->encode('jpg', 70)
				->save();

			$company->banner = 'companies/' . $image_name;
			$company->save();
		}

		Session::flash('success', 'Usuario creado exitosamente');

		return redirect()->route('backend.companies.show', ['company' => $company->id]);
	}

	public function show(Company $company)
	{
		$categories = Category::all();
		$departments = Department::all();

		return view('backend.companies.show', compact('company', 'categories', 'departments'));
	}

	public function edit(Company $company)
	{
		$categories = Category::all();
		$departments = Department::all();

		return view('backend.companies.edit', compact('company', 'categories', 'departments'));
	}

	public function update(Request $request, Company $company)
	{
		$validator = Validator::make($request->all(), [
			'city_id'     => 'required',
			'category_id' => 'required',
			'name'        => 'required',
			'description' => 'required',
			'email'       => 'required|email|' . Rule::unique('companies')->ignore($company->id),
			'telephone'   => 'required',
			'address'     => 'required',
			'website'     => 'required',
		])->validate();

		$company->city_id = $request->city_id;
		$company->category_id = $request->category_id;
		$company->name = $request->name;
		$company->description = $request->description;
		$company->email = $request->email;
		$company->telephone = $request->telephone;
		$company->address = $request->address;
		$company->website = $request->website;
		$company->is_active = 1;
		$company->save();

		if ($request->photo) {
			$validator = Validator::make($request->all(), [
				'photo' => 'mimes:jpg,png,jpeg',
			])->validate();

			$image_name = substr(str_shuffle(md5(time())), 0, 10) . '.jpg';

			Storage::disk('public')->putFileAs('companies/', $request->file('photo'), $image_name);

			Image::make(public_path('storage/companies/' . $image_name))
				->resize(1000, 1000)
				->encode('jpg', 70)
				->save();

			$company->photo = 'companies/' . $image_name;
			$company->save();
		}

		if ($request->banner) {
			$validator = Validator::make($request->all(), [
				'banner' => 'mimes:jpg,png,jpeg',
			])->validate();

			$image_name = substr(str_shuffle(md5(time())), 0, 10) . '.jpg';

			Storage::disk('public')->putFileAs('companies/', $request->file('banner'), $image_name);

			Image::make(public_path('storage/companies/' . $image_name))
				->resize(1300, 700)
				->encode('jpg', 70)
				->save();

			$company->banner = 'companies/' . $image_name;
			$company->save();
		}

		Session::flash('success', 'Usuario actualizado exitosamente');

		return redirect()->route('backend.companies.show', ['company' => $company->id]);
	}

	public function delete(Company $company)
	{
		try {
			$company->delete();

			Session::flash('success', 'Usuario eliminado exitosamente');

		} catch (QueryException $e) {
			Session::flash('error', 'No se pudo eliminar el registro');
		}

		return redirect()->route('backend.companies.index');
	}


}
