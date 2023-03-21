<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Category extends Model {

	use HasFactory;

	public function offerCategories()
	{
		return $this->hasMany(OfferCategory::class);
	}

	public function getPhotoUrlAttribute()
	{
		if ($this->photo) {
			return config('app.url') . Storage::url($this->photo);
		}

		return asset('backend/assets/imgs/avatar/ava_1.png');
	}

}
