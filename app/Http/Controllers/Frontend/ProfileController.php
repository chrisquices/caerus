<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Experience;
use App\Models\Profession;
use App\Models\Skill;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller {

	public function index()
	{
		$user = auth()->user();
		$candidate = $user->candidate;
		$cities = City::all();
		$professions = Profession::all();
		$experiences = Experience::all();
		$skills = Skill::all();

		return view('frontend.profile.index', compact('user', 'candidate', 'cities', 'professions', 'experiences', 'skills'));
	}

	public function update(Request $request)
	{
		$user = auth()->user();
		$candidate = $user->candidate;

		$validator = Validator::make($request->all(), [
			'city_id'       => 'required',
			'profession_id' => 'required',
			'experience_id' => 'required',
			'about_me'      => 'required',
			'name'          => 'required',
			'last_name'     => 'required',
			'email'         => 'required|email|' . Rule::unique('users')->ignore($user->id),
			'telephone'     => 'required',
			'address'       => 'required',
			'photo'         => 'mimes:jpg,jpeg,png',
			'banner'        => 'mimes:jpg,jpeg,png',
		])->validate();

		$user->name = $request->name;
		$user->last_name = $request->last_name;
		$user->email = $request->email;
		$user->is_active = 1;
		$user->save();

		$candidate->city_id = $request->city_id;
		$candidate->profession_id = $request->profession_id;
		$candidate->experience_id = $request->experience_id;
		$candidate->about_me = $request->about_me;
		$candidate->telephone = $request->telephone;
		$candidate->address = $request->address;
		$candidate->expected_salary = $request->expected_salary;
		$candidate->is_verified = 1;
		$candidate->save();

		if ($request->photo) {
			$image_name = substr(str_shuffle(md5(time())), 0, 10) . '.jpg';

			Storage::disk('public')->putFileAs('users/', $request->file('photo'), $image_name);

			Image::make(public_path('storage/users/' . $image_name))
				->resize(1000, 1000)
				->encode('jpg', 70)
				->save();

			$user->photo = 'users/' . $image_name;
			$user->save();
		}

		if ($request->banner) {
			$image_name = substr(str_shuffle(md5(time())), 0, 10) . '.jpg';

			Storage::disk('public')->putFileAs('candidates/', $request->file('banner'), $image_name);

			Image::make(public_path('storage/candidates/' . $image_name))
				->resize(1300, 700)
				->encode('jpg', 70)
				->save();

			$candidate->banner = 'candidates/' . $image_name;
			$candidate->save();
		}

		Session::flash('success', 'Su perfil ha sido actualizado exitosamente');

		return back();
	}

	public function updatePassword(Request $request)
	{
		$validator = Validator::make($request->all(), [
			'password' => 'required|confirmed',
		])->validate();

		$user = auth()->user();
		$user->password = Hash::make($request->password);
		$user->save();

		Session::flash('success', 'Su contraseña fue actualizada exitosamente');

		return back();
	}

	public function updateResume(Request $request)
	{
		$validator = Validator::make($request->all(), [
			'resume' => 'required|mimes:pdf|max:10000',
		])->validate();

		$file_name = substr(str_shuffle(md5(time())), 0, 10) . '.pdf';

		Storage::disk('public')->putFileAs('resumes/', $request->file('resume'), $file_name);

		$candidate = auth()->user()->candidate;
		$candidate->resume = 'resumes/' . $file_name;
		$candidate->save();

		Session::flash('success', 'Su CV fue actualizada exitosamente');

		return back();
	}

}
