<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class QuickOffer extends Model {

	use HasFactory;

	public function getIdFormattedAttribute()
	{
		return str_pad($this->id, 5, '0', STR_PAD_LEFT);
	}

	public function getPhotoUrlAttribute()
	{
		if ($this->photo) {
			return config('app.url') . Storage::url($this->photo);
		}

		return asset('assets/backend/imgs/avatar/ava_1.png');
	}

	public function getCreatedAtFormattedAttribute()
	{
		return Carbon::parse($this->created_at)->format('d-m-Y');
	}

}
