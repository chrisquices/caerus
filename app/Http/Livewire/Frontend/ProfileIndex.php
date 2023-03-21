<?php

namespace App\Http\Livewire\Frontend;

use App\Models\CandidateLanguage;
use App\Models\CandidateSkill;
use App\Models\City;
use App\Models\Experience;
use App\Models\Language;
use App\Models\Profession;
use App\Models\Skill;
use Livewire\Component;

class ProfileIndex extends Component {

	public $user;
	public $candidate;
	public $cities;
	public $professions;
	public $experiences;
	public $skills;
	public $languages;
	public $candidate_skills;
	public $candidate_languages;

	public $skill_selected;
	public $language_selected;

	protected $listeners = ['skillSelected' => 'storeCandidateSkill', 'languageSelected' => 'storeCandidateLanguage'];

	public function mount()
	{
		$this->user = auth()->user();
		$this->candidate = $this->user->candidate;
		$this->cities = City::all();
		$this->professions = Profession::all();
		$this->experiences = Experience::all();
		$this->skills = Skill::all();
		$this->languages = Language::all();
		$this->candidate_skills = CandidateSkill::where('candidate_id', $this->candidate->id)->get();
		$this->candidate_languages = CandidateLanguage::where('candidate_id', $this->candidate->id)->get();
	}

	public function render()
	{
		$this->dispatchBrowserEvent('contentChanged');

		return view('frontend.livewire.profile-index');
	}

	public function storeCandidateSkill()
	{
		$skill = Skill::find($this->skill_selected);

		$candidate_skill_exists = CandidateSkill::query()
			->where('candidate_id', $this->candidate->id)
			->where('skill_id', $skill->id)
			->first();

		$candidate_skills_total = CandidateSkill::where('candidate_id', $this->candidate->id)->count();

		if ($candidate_skill_exists) {
			$this->dispatchBrowserEvent('skillExists');
		}

		if ($candidate_skills_total >= 10) {
			$this->dispatchBrowserEvent('skillLimitReached');
		}

		if (!$candidate_skill_exists && $candidate_skills_total < 10) {
			$new_candidate_skill = new CandidateSkill();
			$new_candidate_skill->candidate_id = $this->candidate->id;
			$new_candidate_skill->skill_id = $this->skill_selected;
			$new_candidate_skill->save();

			$this->candidate_skills = CandidateSkill::where('candidate_id', $this->candidate->id)->get();
		}

		$this->skill_selected = '';
	}

	public function deleteCandidateSkill($candidate_skill_id)
	{
		CandidateSkill::destroy($candidate_skill_id);

		$this->candidate_skills = CandidateSkill::where('candidate_id', $this->candidate->id)->get();
	}

	public function storeCandidateLanguage()
	{
		$candidate_language_exists = CandidateLanguage::query()
			->where('candidate_id', $this->candidate->id)
			->where('language_id', $this->language_selected)
			->first();

		$candidate_languages_total = CandidateLanguage::where('candidate_id', $this->candidate->id)->count();

		if ($candidate_language_exists) {
			$this->dispatchBrowserEvent('languageExists');
		}

		if ($candidate_languages_total >= 10) {
			$this->dispatchBrowserEvent('skillLimitReached');
		}

		if (!$candidate_language_exists && $candidate_languages_total < 10) {
			$new_candidate_language = new CandidateLanguage();
			$new_candidate_language->candidate_id = $this->candidate->id;
			$new_candidate_language->language_id = $this->language_selected;
			$new_candidate_language->save();

			$this->candidate_languages = CandidateLanguage::where('candidate_id', $this->candidate->id)->get();
		}

		$this->language_selected = '';
	}

	public function deleteCandidateLanguage($candidate_language_id)
	{
		CandidateLanguage::destroy($candidate_language_id);

		$this->candidate_languages = CandidateLanguage::where('candidate_id', $this->candidate->id)->get();
	}

}
