<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Company;
use App\Models\JobType;
use App\Models\Offer;
use App\Models\OfferCategory;
use App\Models\Profession;
use App\Models\Status;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\CodeCoverage\Report\PHP;

class ProfessionSeeder extends Seeder {

	/**
	 * Seed the application's database.
	 *
	 * @return void
	 */
	public function run()
	{
		$professions = [
			'Carpintero', 'Cerrajero', 'Cocinero',
			'Panadero', 'Locutor', 'Barbero',
			'Vendedor', 'Cajero', 'Vigilante',
			'Guardia de Seguridad', 'Peluquero',
			'Abogado', 'Psicólogo', 'Matemático',
			'Arquitecto', 'Periodista', 'Enfermero',
			'Electricista', 'Secretaria', 'Traductor Inglés a Español',
			'Administrador', 'Gerente de Ventas', 'Community Manager',
			'Contador', 'Desarrollador de Sistemas', 'Programador',
			'Project Manager', 'Jefe de Desarrollo', 'Diseñador Gráfico',
			'Ingeniero en Informática', 'Ingeniero Comercial', 'Analista de Sistemas',
		];

		foreach ($professions as $profession) {
			$new_profession = new Profession();
			$new_profession->name = $profession;
			$new_profession->save();
		}

	}

}
