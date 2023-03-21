<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Company;
use App\Models\JobType;
use App\Models\Offer;
use App\Models\OfferCategory;
use App\Models\Status;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\CodeCoverage\Report\PHP;

class JobTypeSeeder extends Seeder {

	/**
	 * Seed the application's database.
	 *
	 * @return void
	 */
	public function run()
	{
		$job_types = ['Tiempo Completo', 'Tiempo Completo', 'Medio Tiempo', 'Temporal', 'Contrato', 'Pasantía',];

		foreach ($job_types as $job_type) {
			$new_job_type = new JobType();
			$new_job_type->name = $job_type;
			$new_job_type->save();
		}

	}

}
