<?php

namespace App\Http\Livewire\Backend;

use App\Models\Application;
use App\Models\Offer;
use Livewire\Component;
use Livewire\WithPagination;

class ApplicationsIndex extends Component {

	use WithPagination;

	public $show;
	public $view_type;
	public $search_term;

	public function mount()
	{
		$this->show = session('global_show') ?? '12';
		$this->view_type = session('global_view_type') ?? 'grid'; // grid or list
	}

	public function render()
	{
		$offer_ids = Offer::where('company_id', session('global_company_id'))->pluck('id');

		$applications_query = Application::query();

		if ($this->search_term) {
			$applications_query->whereHas('offer', function ($query) {
				$query->where('title', 'like', '%' . $this->search_term . '%');
			});
		}

		$applications = $applications_query->whereIn('offer_id', $offer_ids)->paginate($this->show);

		$this->dispatchBrowserEvent('reloadDataTable');

		return view('backend.livewire.applications-index', [
			'applications' => $applications,
		]);
	}

	public function updatingSearch()
	{
		$this->resetPage();
	}

	public function changeShow($show)
	{
		session()->put('global_show', $show);
		$this->show = $show;
		$this->resetPage();
	}

	public function changeViewType($view_type)
	{
		session()->put('global_view_type', $view_type);
		$this->view_type = $view_type;
	}

}
