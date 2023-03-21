<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Observation extends Model {

	use HasFactory;

	public function getCreatedAtFormattedAttribute()
	{
		return Carbon::parse($this->created_at)->format('d-m-Y H:i:s');
	}

}
