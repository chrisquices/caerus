<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Candidate extends Model {

	use HasFactory;

	public function user()
	{
		return $this->hasOne(User::class);
	}

	public function profession()
	{
		return $this->belongsTo(Profession::class);
	}

	public function experience()
	{
		return $this->belongsTo(Experience::class);
	}

	public function city()
	{
		return $this->belongsTo(City::class);
	}

	public function applications()
	{
		return $this->hasMany(Application::class);
	}

	public function candidateSkills()
	{
		return $this->hasMany(CandidateSkill::class);
	}

	public function candidateLanguages()
	{
		return $this->hasMany(CandidateLanguage::class);
	}

	public function educationExperiences()
	{
		return $this->hasMany(EducationExperience::class)->orderByDesc('from');
	}

	public function workExperiences()
	{
		return $this->hasMany(WorkExperience::class)->orderByDesc('from');
	}

	public function getIdFormattedAttribute()
	{
		return str_pad($this->id, 5, '0', STR_PAD_LEFT);
	}

	public function getAgeAttribute()
	{
		return Carbon::parse($this->birth_date)->age;
	}

	public function getAboutMeTrimmedAttribute()
	{
		$string = $this->about_me;

		if (strlen($string) > 100) {
			$string = substr($string, 0, 100) . '...';
		}

		return $string;
	}

	public function getAboutMeTrimmedExtendedAttribute()
	{
		$string = $this->about_me;

		if (strlen($string) > 300) {
			$string = substr($string, 0, 300) . '...';
		}

		return $string;
	}

	public function getExpectedSalaryFormattedAttribute()
	{
		if ($this->expected_salary) {
			return number_format($this->expected_salary, 0, '.', '.');
		}

		return null;
	}

	public function getBannerUrlAttribute()
	{
		if ($this->banner) {
			return config('app.url') . Storage::url($this->banner);
		}

		return null;
	}

	public function getResumeUrlAttribute()
	{
		if ($this->resume) {
			return config('app.url') . Storage::url($this->resume);
		}

		return null;
	}

}
