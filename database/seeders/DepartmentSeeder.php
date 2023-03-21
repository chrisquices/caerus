<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder {

	/**
	 * Seed the application's database.
	 *
	 * @return void
	 */
	public function run()
	{
		$departments = [
			"ASUNCIÓN", "CONCEPCIÓN", "SAN PEDRO", "CORDILLERA", "GUAIRÁ", "CAAGUAZÚ", "CAAZAPÁ", "ITAPÚA", "MISIONES",
			"PARAGUARÍ", "ALTO PARANÁ", "CENTRAL", "ÑEEMBUCÚ", "AMAMBAY", "CANINDEYÚ", "PRESIDENTE HAYES", "BOQUERÓN", "ALTO PARAGUAY",
		];

		foreach ($departments as $department) {
			$new_department = new Department();
			$new_department->name = ucwords(mb_strtolower($department));
			$new_department->save();
		}

	}

}
