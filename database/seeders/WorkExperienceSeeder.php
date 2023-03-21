<?php

namespace Database\Seeders;

use App\Models\Candidate;
use App\Models\CandidateSkill;
use App\Models\Category;
use App\Models\City;
use App\Models\OfferCategory;
use App\Models\Profession;
use App\Models\Skill;
use App\Models\WorkExperience;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class WorkExperienceSeeder extends Seeder {

	/**
	 * Seed the application's database.
	 *
	 * @return void
	 */
	public function run()
	{
		$companies = [
			"Jast Group",
			"Fisher - Lueilwitz",
			"Steuber - Harvey",
			"Tremblay - Bechtelar",
			"Ryan - Abernathy",
			"Gleason - McLaughlin",
			"Hessel, Muller and Cummerata",
			"Blick - Huels",
			"Thiel, Schimmel and Stoltenberg",
			"O'Kon, Boehm and Goodwin",
			"Bergnaum Group",
			"Terry LLC",
			"Crist, O'Connell and Schmeler",
			"Shanahan, VonRueden and Frami",
			"Bauch and Sons",
			"Davis Inc",
			"Fritsch - Wolff",
			"Feest - O'Hara",
			"Prosacco Group",
			"Smith LLC",
			"O'Connell LLC",
			"Lindgren, Muller and Mills",
			"Donnelly, Hermiston and Russel",
			"Kris - Romaguera",
			"Purdy, Fisher and Lueilwitz",
			"Fay - Howe",
			"Kunze, Hilll and Sanford",
			"Turcotte, Ratke and Sipes",
			"Lindgren Group",
			"Lebsack, Welch and Marvin",
			"Zemlak - Bednar",
			"Witting, Lueilwitz and Krajcik",
			"Fay LLC",
			"Rice, Parker and Prohaska",
			"Kerluke and Sons",
			"Auer, Hane and Muller",
			"Block Inc",
			"Nikolaus Group",
			"Ratke - Johnston",
			"Bode - Sawayn",
			"Koch and Sons",
			"Gerlach - O'Reilly",
			"Sauer, Nitzsche and Grant",
			"Jast - Kunze",
			"Grady - Runte",
			"Bahringer, Cruickshank and Metz",
			"Jaskolski - MacGyver",
			"Schmidt and Sons",
			"Brakus, Jaskolski and Pacocha",
			"Simonis, Johns and Kirlin",
			"Weimann - Mohr",
			"Stracke Inc",
			"O'Reilly - Davis",
			"Durgan Group",
			"Wuckert and Sons",
			"Bosco, Hayes and Rippin",
			"Ratke, Schuster and Langosh",
			"Marvin and Sons",
			"Braun - Armstrong",
			"MacGyver Inc",
			"Runolfsson, Fay and Funk",
			"Paucek, Terry and Bayer",
			"Collins LLC",
			"Stracke - Schimmel",
			"Donnelly - Leffler",
			"Hudson, Gusikowski and Zboncak",
			"Batz Inc",
			"Bauch Group",
			"Wisoky - Hudson",
			"Erdman and Sons",
			"Bergstrom - Bosco",
			"Hayes and Sons",
			"Heller - Ward",
			"Beatty and Sons",
			"Will - Orn",
			"Rempel, Haley and Torphy",
			"Bogan - Donnelly",
			"Goodwin - Zulauf",
			"Keeling - Stamm",
			"Marvin, Maggio and Kozey",
			"Hirthe, Parker and Nikolaus",
			"Boyle - Grimes",
			"Watsica Group",
			"Larson Group",
			"Bauch Inc",
			"Crooks and Sons",
			"Wolf, Cremin and Dach",
			"Abbott - Yost",
			"Russel, Beatty and DuBuque",
			"Marvin, Cremin and Quitzon",
			"Jerde Group",
			"Kerluke, Dietrich and Carter",
			"Hoeger - Altenwerth",
			"Cormier - Waters",
			"Howell, Kerluke and Schowalter",
			"Sanford Group",
			"Wolf - Pouros",
			"Kreiger - Stanton",
			"Jerde, Bahringer and Armstrong",
			"Marvin and Sons",
			"Arevalo Hermanos",
			"Mateo S.A.",
			"Collado S.L.",
			"Ocampo, Benavídez and Zamora",
			"Márquez - Adame",
			"Huerta, Cortéz and Gallardo",
			"Gil e Hijos",
			"Duarte, Mora and Zayas",
			"Ordóñez - Ramírez",
			"Santana, Abeyta and Verduzco",
			"Brito S.L.",
			"Sierra S.A.",
			"Corral - Oquendo",
			"Zamudio - Castro",
			"Nava, Vargas and Bonilla",
			"Roldán e Hijos",
			"Rincón S.A.",
			"Zaragoza, Cuellar and Reyna",
			"Altamirano - Berríos",
			"Rivas - Barrera",
			"Heredia, Molina and Sandoval",
			"Orozco - Villaseñor",
			"Beltrán - Tapia",
			"Villegas Hermanos",
			"Robledo, Delrío and Heredia",
			"Barragán Hermanos",
			"Álvarez S.A.",
			"Nazario, Vázquez and Tamez",
			"Moreno Hermanos",
			"Rincón - Ocasio",
			"Barajas - Madrid",
			"Prado, Abeyta and Cornejo",
			"Limón S.A.",
			"Salgado e Hijos",
			"Zamora, Corral and Velázquez",
			"Saucedo, Negrón and Miramontes",
			"Estrada - Vega",
			"Abeyta, Velázquez and Montenegro",
			"Gaytán Hermanos",
			"Vallejo, Lara and Osorio",
			"Velásquez S.L.",
			"Aguilar - Garica",
			"Carrero - Jáquez",
			"Flórez Hermanos",
			"Alcaraz, Vega and Sepúlveda",
			"Aponte - Ordóñez",
			"Delgadillo, Negrón and Posada",
			"Arias - Magaña",
			"Guerrero Hermanos",
			"Cintrón - Tapia",
			"Fonseca S.L.",
			"Marín, Anaya and Yáñez",
			"Muro, Galván and Barrera",
			"Solorzano S.A.",
			"Cano, Martínez and Fernández",
			"Santana - Alemán",
			"Montañez - Juárez",
			"Preciado - Madrid",
			"Grijalva, Cantú and Caldera",
			"Ulibarri, Concepción and Téllez",
			"Ríos Hermanos",
			"Solorio - Alarcón",
			"Cazares, Bustos and Morales",
			"Sanabria S.A.",
			"Maya Hermanos",
			"Alcalá - Godoy",
			"Mejía - Briones",
			"Alvarado e Hijos",
			"Muñoz, Munguía and Arias",
			"Baeza S.L.",
			"Gurule - Ordóñez",
			"Atencio, Velázquez and Calvillo",
			"Irizarry - Vélez",
			"Moya S.L.",
			"Saldivar Hermanos",
			"Guerrero e Hijos",
			"Muñoz - Villagómez",
			"Zamora, Serrato and Valdez",
			"Villarreal, Estévez and Montero",
			"Cruz - Collado",
			"Tórrez, Chapa and Botello",
			"Sosa - Lebrón",
			"Moreno - Medrano",
			"Olvera - Mascareñas",
			"Gutiérrez, Barrios and Cintrón",
			"Haro, Díaz and Solorio",
			"Romo S.L.",
			"Garza, Garrido and Gil",
			"Valladares, Mata and Romero",
			"Anaya - Segura",
			"Covarrubias - Nieves",
			"Ocampo, Lara and Sarabia",
			"Rosales S.A.",
			"Salcedo - Villaseñor",
			"Delrío, Sanabria and González",
			"Carrillo - Ruelas",
			"Matos, García and Guzmán",
			"Rojas e Hijos",
			"Cepeda - Brito",
			"Cedillo - Zamora",
		];

		$candidates = Candidate::all();

		foreach ($candidates as $candidate) {

			$city = City::all()->random(1)->first();
			$from = Carbon::now()->subYears(rand(5, 10));

			$work_experience = new WorkExperience();
			$work_experience->candidate_id = $candidate->id;
			$work_experience->company = fake()->randomElement($companies);
			$work_experience->occupation = Profession::all()->random(1)->first()->name;
			$work_experience->location = $city->department->name . ', ' . $city->name;
			$work_experience->from = $from;
			$work_experience->to = Carbon::parse($from)->addYears(rand(2, 6));
			$work_experience->description = fake()->text(200);
			$work_experience->save();

		}

	}

}
