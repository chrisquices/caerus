<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Category;
use App\Models\Department;
use App\Models\Experience;
use App\Models\JobType;
use App\Models\Observation;
use App\Models\Status;
use App\Models\StatusHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class ApplicationController extends Controller {

	public function index()
	{
		return view('backend.applications.index');
	}

	public function show(Application $application)
	{
		$statuses = Status::where('company_id', session('global_company_id'))->get();
		$categories = Category::all();
		$departments = Department::all();
		$experiences = Experience::all();
		$job_types = JobType::all();

		return view('backend.applications.show', compact('application', 'statuses', 'categories', 'departments', 'experiences', 'job_types'));
	}

	public function storeStatusHistory(Request $request, Application $application)
	{
		$validator = Validator::make($request->all(), [
			'status_id' => 'required',
		])->validate();

		$application->status_id = $request->status_id;
		$application->save();

		$status_history = new StatusHistory();
		$status_history->application_id = $application->id;
		$status_history->status_id = $request->status_id;
		$status_history->message = $request->message;
		$status_history->save();

		Session::flash('success', 'Estado cambiado exitosamente');

		return redirect()->route('backend.applications.show', ['application' => $application->id]);
	}

	public function storeObservation(Request $request, Application $application)
	{
		$validator = Validator::make($request->all(), [
			'message' => 'required',
		])->validate();

		$observation = new Observation();
		$observation->application_id = $application->id;
		$observation->message = $request->message;
		$observation->save();

		Session::flash('success', 'Observación creada exitosamente');

		return redirect()->route('backend.applications.show', ['application' => $application->id]);
	}

}
