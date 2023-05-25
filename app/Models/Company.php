<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Company extends Model {

	use HasFactory;

	public function users()
	{
		return $this->hasMany(User::class);
	}

	public function offers()
	{
		return $this->hasMany(Offer::class);
	}

	public function city()
	{
		return $this->belongsTo(City::class);
	}

	public function category()
	{
		return $this->belongsTo(Category::class);
	}

	public function getIdFormattedAttribute()
	{
		return str_pad($this->id, 5, '0', STR_PAD_LEFT);
	}

	public function getDescriptionTrimmedAttribute()
	{
		$string = $this->description;

		if (strlen($string) > 100) {
			$string = substr($string, 0, 100) . '...';
		}

		return $string;
	}

	public function getPhotoUrlAttribute()
	{
		if ($this->photo) {
			return config('app.url') . Storage::url($this->photo);
		}

		return asset('assets/backend/imgs/avatar/ava_1.png');
	}

	public function getBannerUrlAttribute()
	{
		if ($this->banner) {
			return config('app.url') . Storage::url($this->banner);
		}

		return asset('assets/backend/imgs/avatar/ava_1.png');
	}

}
