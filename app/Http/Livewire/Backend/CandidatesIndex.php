<?php

namespace App\Http\Livewire\Backend;

use App\Models\Candidate;
use Livewire\Component;
use Livewire\WithPagination;

class CandidatesIndex extends Component {

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
		$candidates_query = Candidate::query()->with('user');

		if ($this->search_term) {
			$candidates_query->whereHas('user', function ($query) {
				$query->where('name', 'like', '%' . $this->search_term . '%');
			});
		}

		$candidates = $candidates_query->paginate($this->show);

		$this->dispatchBrowserEvent('reloadDataTable');

		return view('backend.livewire.candidates-index', [
			'candidates' => $candidates,
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
