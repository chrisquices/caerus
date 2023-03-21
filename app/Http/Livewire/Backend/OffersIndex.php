<?php

namespace App\Http\Livewire\Backend;

use App\Models\Offer;
use Livewire\Component;
use Livewire\WithPagination;

class OffersIndex extends Component {

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
		$offers_query = Offer::query();

		if ($this->search_term) {
			$offers_query->where('title', 'like', '%' . $this->search_term . '%');
			$offers_query->where('title', 'like', '%' . $this->search_term . '%');
		}

		$offers = $offers_query->where('company_id', session('global_company_id'))->paginate($this->show);

		$this->dispatchBrowserEvent('reloadDataTable');

		return view('backend.livewire.offers-index', [
			'offers' => $offers,
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
