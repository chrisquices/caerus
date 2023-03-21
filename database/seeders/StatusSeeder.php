<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Company;
use App\Models\Offer;
use App\Models\OfferCategory;
use App\Models\Status;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\CodeCoverage\Report\PHP;

class StatusSeeder extends Seeder {

	/**
	 * Seed the application's database.
	 *
	 * @return void
	 */
	public function run()
	{
		$statuses = ['Pendiente', 'En Revisión', 'No Apto', 'Rechazado', 'Contratado'];
		$colors = ['primary', 'info', 'secondary', 'danger', 'success'];

		$companies = Company::all();

		foreach ($companies as $company) {
			foreach ($statuses as $key => $status) {
				$new_status = new Status();
				$new_status->company_id = $company->id;
				$new_status->name = $status;
				$new_status->color = $colors[$key];
				$new_status->is_start = ($status == 'Pendiente') ? 1 : 0;
				$new_status->save();
			}
		}

	}

}
