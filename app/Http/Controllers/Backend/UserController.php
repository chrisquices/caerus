<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;

class UserController extends Controller {

	public function index()
	{
		return view('backend.users.index');
	}

	public function create()
	{
		return view('backend.users.create');
	}

	public function store(Request $request)
	{
		$validator = Validator::make($request->all(), [
			'type'      => 'required',
			'name'      => 'required',
			'last_name' => 'required',
			'email'     => 'required|email|unique:users',
			'password'  => 'required|confirmed',
		])->validate();

		$user = new User();
		$user->company_id = session('global_company_id');
		$user->type = $request->type;
		$user->name = $request->name;
		$user->last_name = $request->last_name;
		$user->email = $request->email;
		$user->password = Hash::make($request->password);
		$user->is_active = 1;
		$user->save();

		if ($request->photo) {
			$validator = Validator::make($request->all(), [
				'photo' => 'mimes:jpg,png,jpeg',
			])->validate();

			$image_name = substr(str_shuffle(md5(time())), 0, 10) . '.jpg';

			Storage::disk('public')->putFileAs('users/', $request->file('photo'), $image_name);

			Image::make(public_path('storage/users/' . $image_name))
				->resize(1000, 1000)
				->encode('jpg', 70)
				->save();

			$user->photo = 'users/' . $image_name;
			$user->save();
		}

		Session::flash('success', 'Usuario creado exitosamente');

		return redirect()->route('backend.users.show', ['user' => $user->id]);
	}

	public function show(User $user)
	{
		return view('backend.users.show', compact('user'));
	}

	public function edit(User $user)
	{
		return view('backend.users.edit', compact('user'));
	}

	public function update(Request $request, User $user)
	{
		$validator = Validator::make($request->all(), [
			'type'      => 'required',
			'name'      => 'required',
			'last_name' => 'required',
			'email'     => 'required|email|' . Rule::unique('users')->ignore($user->id),
			'is_active' => 'required',
		])->validate();

		$user->company_id = session('global_company_id');
		$user->type = $request->type;
		$user->name = $request->name;
		$user->last_name = $request->last_name;
		$user->email = $request->email;
		$user->is_active = $request->is_active;
		$user->save();

		if ($request->password || $request->password_confirmation) {
			if ($request->password == $request->password_confirmation) {
				$validator = Validator::make($request->all(), [
					'password' => 'confirmed',
				])->validate();

				$user->password = Hash::make($request->password);
				$user->save();
			}
		}

		if ($request->photo) {
			$validator = Validator::make($request->all(), [
				'photo' => 'mimes:jpg,png,jpeg',
			])->validate();

			$image_name = substr(str_shuffle(md5(time())), 0, 10) . '.jpg';

			Storage::disk('public')->putFileAs('users/', $request->file('photo'), $image_name);

			Image::make(public_path('storage/users/' . $image_name))
				->resize(1000, 1000)
				->encode('jpg', 70)
				->save();

			$user->photo = 'users/' . $image_name;
			$user->save();
		}

		Session::flash('success', 'Usuario actualizado exitosamente');

		return redirect()->route('backend.users.show', ['user' => $user->id]);
	}

	public function delete(User $user)
	{
		try {
			$user->delete();

			Session::flash('success', 'Usuario eliminado exitosamente');

		} catch (QueryException $e) {
			Session::flash('error', 'No se pudo eliminar el registro');
		}

		return redirect()->route('backend.users.index');
	}

}
