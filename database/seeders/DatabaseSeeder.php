<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\CandidateLanguage;
use App\Models\City;
use App\Models\Skill;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder {

	/**
	 * Seed the application's database.
	 *
	 * @return void
	 */
	public function run()
	{
		$this->call(UserSeeder::class);
		$this->call(DepartmentSeeder::class);
		$this->call(CitySeeder::class);
		$this->call(CategorySeeder::class);
		$this->call(ExperienceSeeder::class);
		$this->call(JobTypeSeeder::class);
		$this->call(ProfessionSeeder::class);
		$this->call(LanguageSeeder::class);
		$this->call(SkillSeeder::class);
		$this->call(CompanySeeder::class);
		$this->call(StatusSeeder::class);
		$this->call(OfferSeeder::class);
		$this->call(OfferCategorySeeder::class);
		$this->call(QuickOfferSeeder::class);
		$this->call(CandidateSeeder::class);
		$this->call(CandidateSkillSeeder::class);
		$this->call(CandidateLanguageSeeder::class);
		$this->call(WorkExperienceSeeder::class);
		$this->call(EducationExperienceSeeder::class);
		$this->call(ApplicationSeeder::class);
	}

}
