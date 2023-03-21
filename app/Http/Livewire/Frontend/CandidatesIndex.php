<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Candidate;
use App\Models\CandidateLanguage;
use App\Models\CandidateSkill;
use App\Models\City;
use App\Models\Experience;
use App\Models\Language;
use App\Models\Profession;
use App\Models\Skill;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class CandidatesIndex extends Component {

	use WithPagination;

	public $professions;
	public $experiences;
	public $cities;
	public $skills;
	public $languages;

	public $profession_selected;
	public $experience_selected;
	public $city_selected;
	public $skill_selected;
	public $language_selected;

	public $show;
	public $view_type;
	public $search_term;

	public function mount()
	{
		$this->professions = Profession::all();
		$this->experiences = Experience::all();
		$this->cities = City::all();
		$this->skills = Skill::all();
		$this->languages = Language::all();

		$this->show = session('global_show') ?? '12';
		$this->view_type = session('global_view_type') ?? 'grid'; // grid or list
	}

	public function render()
	{
		$candidates_query = Candidate::query();

		if ($this->search_term) {
			$candidate_ids = User::query()
				->where('type', 'Candidate')
				->where('name', 'like', '%' . $this->search_term . '%')
				->pluck('candidate_id');

			$candidates_query->whereIn('id', $candidate_ids);
		}

		if ($this->profession_selected) {
			$candidates_query->where('profession_id', $this->profession_selected);
		}

		if ($this->experience_selected) {
			$candidates_query->where('experience_id', $this->experience_selected);
		}

		if ($this->city_selected) {
			$candidates_query->where('city_id', $this->city_selected);
		}

		if ($this->skill_selected) {
			$candidate_ids = CandidateSkill::where('skill_id', $this->skill_selected)->pluck('candidate_id');

			$candidates_query->whereIn('id', $candidate_ids);
		}

		if ($this->language_selected) {
			$candidate_ids = CandidateLanguage::where('language_id', $this->language_selected)->pluck('candidate_id');

			$candidates_query->whereIn('id', $candidate_ids);
		}

		$candidates = $candidates_query->where('is_active', 1)->paginate($this->show);

		$this->dispatchBrowserEvent('contentChanged');

		return view('frontend.livewire.candidates-index', [
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

	public function resetFilters()
	{
		$this->profession_selected = '';
		$this->experience_selected = '';
		$this->city_selected = '';
		$this->skill_selected = '';
		$this->language_selected = '';
	}

}
