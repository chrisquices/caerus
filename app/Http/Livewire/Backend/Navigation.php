<?php

namespace App\Http\Livewire\Backend;

use App\Models\Application;
use App\Models\Offer;
use App\Models\Status;
use Livewire\Component;

class Navigation extends Component {

	public $pending_applications;

	public function render()
	{
		if (session('global_company_id')) {
			$pending_status = Status::query()
				->where('company_id', session('global_company_id'))
				->where('is_start', 1)
				->first();

			$offer_ids = Offer::where('company_id', session('global_company_id'))->pluck('id');

			$this->pending_applications = Application::query()
				->whereIn('offer_id', $offer_ids)
				->where('status_id', $pending_status->id)
				->count();
		}

		return view('backend.livewire.navigation');
	}

}
