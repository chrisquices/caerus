<?php

namespace App\Http\Livewire\Backend;

use App\Models\Company;
use Livewire\Component;
use Livewire\WithPagination;

class CompaniesIndex extends Component {

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
		$companies_query = Company::query();

		if ($this->search_term) {
			$companies_query->where('name', 'like', '%' . $this->search_term . '%');
			$companies_query->where('name', 'like', '%' . $this->search_term . '%');
		}

		$companies = $companies_query->paginate($this->show);

		$this->dispatchBrowserEvent('reloadDataTable');

		return view('backend.livewire.companies-index', [
			'companies' => $companies,
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
