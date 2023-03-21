<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Category;
use App\Models\City;
use App\Models\Company;
use App\Models\Experience;
use App\Models\JobType;
use App\Models\Offer;
use App\Models\OfferCategory;
use Livewire\Component;
use Livewire\WithPagination;

class OffersIndex extends Component {

	use WithPagination;

	public $categories;
	public $job_types;
	public $experiences;
	public $companies;
	public $cities;

	public $initial_payload;
	public $category_selected;
	public $job_type_selected;
	public $experience_selected;
	public $company_selected;
	public $city_selected;

	public $show;
	public $view_type;
	public $search_term;

	public $listeners = ['unloadPayload' => 'unloadPayload'];

	public function unloadPayload()
	{
		$this->initial_payload = false;
	}

	public function mount()
	{
		$this->categories = Category::all();
		$this->job_types = JobType::all();
		$this->experiences = Experience::all();
		$this->companies = Company::all();
		$this->cities = City::all();

		$this->show = session('global_show') ?? '12';
		$this->view_type = session('global_view_type') ?? 'grid'; // grid or list

		$this->dispatchBrowserEvent('setCategoryId');

		if (request()->get('category_id')) {
			$this->initial_payload = true;
			$this->category_selected = request()->get('category_id');
		}

		if (request()->get('city_id')) {
			$this->initial_payload = true;
			$this->city_selected = request()->get('city_id');
		}

		if (request()->get('search_term')) {
			$this->initial_payload = true;
			$this->search_term = request()->get('search_term');
		}

	}

	public function render()
	{
		$offers_query = Offer::query();

		if ($this->search_term) {
			$offers_query->where('title', 'like', '%' . $this->search_term . '%');
		}

		if ($this->category_selected) {
			$offer_ids = OfferCategory::where('category_id', $this->category_selected)->pluck('offer_id');

			$offers_query->whereIn('id', $offer_ids);
		}

		if ($this->job_type_selected) {
			$offers_query->where('job_type_id', $this->job_type_selected);
		}

		if ($this->experience_selected) {
			$offers_query->where('experience_id', $this->experience_selected);
		}

		if ($this->company_selected) {
			$offers_query->where('company_id', $this->company_selected);
		}

		if ($this->city_selected) {
			$offers_query->where('city_id', $this->city_selected);
		}

		$offers = $offers_query->paginate($this->show);

		$this->dispatchBrowserEvent('contentChanged');

		return view('frontend.livewire.offers-index', [
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

	public function resetFilters()
	{
		$this->category_selected = '';
		$this->job_type_selected = '';
		$this->experience_selected = '';
		$this->company_selected = '';
		$this->city_selected = '';
	}

}
