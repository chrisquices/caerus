<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable {

	use HasApiTokens, HasFactory, Notifiable;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array<int, string>
	 */
	protected $fillable = [
		'type',
		'name',
		'last_name',
		'email',
		'password',
		'photo',
		'is_active',
	];

	public $appends = ['full_name'];
	/**
	 * The attributes that should be hidden for serialization.
	 *
	 * @var array<int, string>
	 */
	protected $hidden = [
		'password',
		'remember_token',
	];

	/**
	 * The attributes that should be cast.
	 *
	 * @var array<string, string>
	 */
	protected $casts = [
		'email_verified_at' => 'datetime',
	];

	public function company()
	{
		return $this->belongsTo(Company::class);
	}

	public function candidate()
	{
		return $this->belongsTo(Candidate::class);
	}

	public function getIdFormattedAttribute()
	{
		return str_pad($this->id, 5, '0', STR_PAD_LEFT);
	}

	public function getFullNameAttribute()
	{
		return $this->name . ' ' . $this->last_name;
	}

	public function getPhotoUrlAttribute()
	{
		if ($this->photo) {
			return config('app.url') . Storage::url($this->photo);
		}

		return asset('backend/assets/imgs/avatar/ava_1.png');
	}

}
