<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model {

	use HasFactory;

	public function company()
	{
		return $this->belongsTo(Company::class);
	}

	public function city()
	{
		return $this->belongsTo(City::class);
	}

	public function experience()
	{
		return $this->belongsTo(Experience::class);
	}

	public function jobType()
	{
		return $this->belongsTo(JobType::class);
	}

	public function applications()
	{
		return $this->hasMany(Application::class);
	}

	public function offerCategories()
	{
		return $this->hasMany(OfferCategory::class);
	}

	public function getIdFormattedAttribute()
	{
		return str_pad($this->id, 5, '0', STR_PAD_LEFT);
	}

	public function getSalaryFormattedAttribute()
	{
		return number_format($this->salary, 0, '.', '.');
	}

	public function getDescriptionTrimmedAttribute()
	{
		$string = $this->description;

		if (strlen($string) > 100) {
			$string = substr($string, 0, 100) . '...';
		}

		return $string;
	}

	public function getDescriptionTrimmedExtendedAttribute()
	{
		$string = $this->description;

		if (strlen($string) > 500) {
			$string = substr($string, 0, 500) . '...';
		}

		return $string;
	}


	public function getPostedAtFormattedAttribute()
	{
		return Carbon::parse($this->posted_at)->format('d-m-Y');
	}

	public function getPostedAtTimeAgoAttribute()
	{
		Carbon::setLocale('es');

		return Carbon::parse($this->posted_at)->diffForHumans();
	}

}
