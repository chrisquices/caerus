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

class CategorySeeder extends Seeder {

	/**
	 * Seed the application's database.
	 *
	 * @return void
	 */
	public function run()
	{
		$categories = [
			[
				'name'  => 'Tecnología',
			],
			[
				'name'  => 'Atención al Cliente',
			],
			[
				'name'  => 'Marketing',
			],
			[
				'name'  => 'Bebidas',
			],
			[
				'name'  => 'Administración',
			],
			[
				'name'  => 'Seguridad',
			],
			[
				'name'  => 'Electricidad',
			],
			[
				'name'  => 'Ventas',
			],
			[
				'name'  => 'Finanzas',
			],
			[
				'name'  => 'Entretenimiento',
			],
		];

		foreach ($categories as $category) {
			$new_category = new Category();
			$new_category->name = $category['name'];
			$new_category->save();
		}

	}

}
