<?php

namespace App\Http\Livewire\Backend;

use App\Models\Application;
use App\Models\Offer;
use Livewire\Component;
use Livewire\WithPagination;

class OffersApplicationsIndex extends Component {

	use WithPagination;

	public $offer;

	public $show;
	public $view_type;
	public $search_term;

	public function mount($offer)
	{
		$this->offer = Offer::find($offer);
		$this->show = session('global_show') ?? '12';
		$this->view_type = session('global_view_type') ?? 'grid'; // grid or list
	}

	public function render()
	{
		$applications_query = Application::query();

		if ($this->search_term) {
			$applications_query->where('name', 'like', '%' . $this->search_term . '%');
			$applications_query->where('name', 'like', '%' . $this->search_term . '%');
		}

		$applications = $applications_query->paginate($this->show);

		$this->dispatchBrowserEvent('reloadDataTable');

		return view('backend.livewire.offers-applications-index', [
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
