<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusHistory extends Model {

	use HasFactory;

	public function status()
	{
		return $this->belongsTo(Status::class);
	}

	public function application()
	{
		return $this->belongsTo(Application::class);
	}

	public function getCreatedAtFormattedAttribute()
	{
		return Carbon::parse($this->created_at)->format('d-m-Y H:i:s');
	}

}
