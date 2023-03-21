<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CandidateSkill extends Model {

	use HasFactory;

	public function candidate()
	{
		return $this->belongsTo(Candidate::class);
	}

	public function skill()
	{
		return $this->belongsTo(Skill::class);
	}

}
