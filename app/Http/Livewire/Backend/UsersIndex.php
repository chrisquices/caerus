<?php

namespace App\Http\Livewire\Backend;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UsersIndex extends Component {

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
		$users_query = User::query();

		if (session('global_company_id')) {
			$users_query->where('company_id', session('global_company_id'));
		}

		if ($this->search_term) {
			$users_query->where('name', 'like', '%' . $this->search_term . '%');
			$users_query->where('name', 'like', '%' . $this->search_term . '%');
		}

		$users = $users_query->paginate($this->show);

		$this->dispatchBrowserEvent('reloadDataTable');

		return view('backend.livewire.users-index', [
			'users' => $users,
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
