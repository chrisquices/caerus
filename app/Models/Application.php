<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model {

	use HasFactory;

	public function offer()
	{
		return $this->belongsTo(Offer::class);
	}

	public function candidate()
	{
		return $this->belongsTo(Candidate::class);
	}

	public function status()
	{
		return $this->belongsTo(Status::class);
	}

	public function observations()
	{
		return $this->hasMany(Observation::class);
	}

	public function statusHistories()
	{
		return $this->hasMany(StatusHistory::class);
	}

	public function getIdFormattedAttribute()
	{
		return str_pad($this->id, 5, '0', STR_PAD_LEFT);
	}

	public function getExpectedSalaryFormattedAttribute()
	{
		if ($this->expected_salary) {
			return number_format($this->expected_salary, 0, '.', '.');
		}

		return null;
	}

	public function getMessageTrimmedAttribute()
	{
		$string = $this->message;

		if (strlen($string) > 100) {
			$string = substr($string, 0, 100) . '...';
		}

		return $string;
	}

	public function getAppliedAtFormattedAttribute()
	{
		return Carbon::parse($this->applied_at)->format('d-m-Y');
	}

}
