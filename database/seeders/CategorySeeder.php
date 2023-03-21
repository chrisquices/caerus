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
				'photo' => 'categories/informatica.svg',
			],
			[
				'name'  => 'Atención al Cliente',
				'photo' => 'categories/atencion.svg',
			],
			[
				'name'  => 'Marketing',
				'photo' => 'categories/marketing.svg',
			],
			[
				'name'  => 'Bebidas',
				'photo' => 'categories/administracion.svg',
			],
			[
				'name'  => 'Administración',
				'photo' => 'categories/administracion.svg',
			],
			[
				'name'  => 'Seguridad',
				'photo' => 'categories/seguridad.svg',
			],
			[
				'name'  => 'Electricidad',
				'photo' => 'categories/electricidad.svg',
			],
			[
				'name'  => 'Ventas',
				'photo' => 'categories/ventas.svg',
			],
			[
				'name'  => 'Finanzas',
				'photo' => 'categories/finanzas.svg',
			],
			[
				'name'  => 'Entretenimiento',
				'photo' => 'categories/informatica.svg',
			],
		];

		foreach ($categories as $category) {
			$new_category = new Category();
			$new_category->name = $category['name'];
			$new_category->photo = $category['photo'];
			$new_category->save();
		}

	}

}
