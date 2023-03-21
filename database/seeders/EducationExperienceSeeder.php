<?php

namespace Database\Seeders;

use App\Models\Candidate;
use App\Models\CandidateSkill;
use App\Models\Category;
use App\Models\City;
use App\Models\EducationExperience;
use App\Models\OfferCategory;
use App\Models\Profession;
use App\Models\Skill;
use App\Models\WorkExperience;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class EducationExperienceSeeder extends Seeder {

	/**
	 * Seed the application's database.
	 *
	 * @return void
	 */
	public function run()
	{
		$institutions = [
			"Instituto Longoria, Angulo and Benítez",
			"Instituto Iglesias S.A.",
			"Instituto Cadena e Hijos",
			"Instituto Munguía - Delapaz",
			"Instituto Navarro, Villa and Betancourt",
			"Instituto Barreto, Coronado and Saucedo",
			"Instituto Delao e Hijos",
			"Instituto Esquivel - Sierra",
			"Instituto Carrión Hermanos",
			"Instituto Zamora S.A.",
			"Instituto Sauceda - Quintanilla",
			"Instituto Ávila, Cedillo and Manzanares",
			"Instituto Casarez e Hijos",
			"Instituto Monroy, Hidalgo and Ojeda",
			"Instituto Vigil, Cavazos and Soto",
			"Instituto Pantoja, Altamirano and Romero",
			"Instituto Sevilla, Vélez and Cornejo",
			"Instituto Nájera, Argüello and Bernal",
			"Instituto Palacios, Solorzano and Lara",
			"Instituto Guajardo - Barrios",
			"Instituto Munguía, Gaona and Carvajal",
			"Instituto Tovar, Cavazos and Muro",
			"Instituto Lira - Espinosa",
			"Instituto Abreu, Contreras and Nieto",
			"Instituto Lugo Hermanos",
			"Instituto Delvalle, Munguía and Urbina",
			"Instituto Lira - Arteaga",
			"Instituto Abreu - Chavarría",
			"Instituto Camacho, Carrasco and Marín",
			"Instituto Tafoya, Morales and Estévez",
			"Instituto Corona Hermanos",
			"Instituto Cerda - Montemayor",
			"Instituto Montalvo - Borrego",
			"Instituto Arevalo S.A.",
			"Instituto Roque S.A.",
			"Instituto Rangel - Archuleta",
			"Instituto Campos, Palacios and Padilla",
			"Instituto Briseño, Camarillo and Solano",
			"Instituto Chacón S.L.",
			"Instituto Marín e Hijos",
			"Instituto Romero - Villanueva",
			"Instituto Ceballos Hermanos",
			"Instituto Quintanilla - Ramos",
			"Instituto Loera - Alcántar",
			"Instituto de Jesús Hermanos",
			"Instituto Rosado e Hijos",
			"Instituto de Anda, Carmona and Regalado",
			"Instituto Yáñez, Bustamante and Suárez",
			"Instituto Venegas, Meraz and Lovato",
			"Instituto Galarza - Alcaraz",
		];

		$titles = [
			"Licenciado en Arquitectura (B.Arch.)",
			"Licenciatura en Artes (BA)",
			"Licenciatura en Negocios (BB)",
			"Licenciado en Administración de Empresas (BBA)",
			"Licenciatura en Ciencias en Negocios (BSB)",
			"Licenciatura en Derecho Canónico (BCL)",
			"Licenciatura en Ciencias de la Computación (BCS)",
			"Licenciatura en Ciencias de la Computación (BSCS)",
			"Licenciatura en Justicia Criminal (BCJ)",
			"Licenciatura en Ciencias en Justicia Criminal (BSCJ)",
			"Licenciatura en Divinidad (BD)",
			"Licenciatura en Educación (B.Ed.)",
			"Licenciatura en Ciencias de la Educación (BSEd.)",
			"Licenciatura en Ingeniería Inalámbrica (BWE)",
			"Licenciatura en Ingeniería (BE/B.Eng.)",
			"Licenciatura en Ciencias en Ingeniería (BSE/BSEN.)",
			"Licenciatura en Ciencias en Ingeniería Aeroespacial (BSAE)",
			"Licenciatura en Ciencias en Ingeniería Agrícola (BSAE)",
			"Licenciatura en Ciencias en Sistemas Biológicos (BSBS)",
			"Licenciatura en Ciencias en Biosistemas e Ingeniería Agrícola (BSBAE)",
			"Licenciatura en Ciencias en Ingeniería Biológica (BSBE)",
			"Grado en Ingeniería Biomédica (BBmE)",
			"Licenciatura en Ciencias en Ingeniería Biomédica (BSBE/BSBME)",
			"Licenciatura en Ciencias en Ingeniería Química (BSCh.E.)",
			"Licenciatura en Ciencias en Ingeniería Química y Biomolecular (BSCh.BE)",
			"Licenciatura en Ciencias en Ingeniería Química y de Materiales (BSCME)",
			"Licenciatura en Ingeniería Civil (BCE)",
			"Licenciatura en Ciencias en Ingeniería Civil (BSCE)",
			"Licenciatura en Ciencias en Ingeniería Civil e Infraestructura (BS-CIE)",
			"Licenciatura en Ingeniería Informática (B.Comp.E.)",
			"Licenciatura en Ciencias en Ingeniería Informática (BSCE/BSCmp.E.)",
			"Licenciatura en Ciencias de la Computación e Ingeniería (BSCSE)",
			"Licenciatura en Ciencias en Ingeniería Eléctrica e Informática (BSECE)",
			"Licenciatura en Ingeniería Eléctrica (BEE)",
			"Licenciatura en Ciencias en Ingeniería Eléctrica (BSEE)",
			"Licenciatura en Ciencias en Gestión de Ingeniería (BSEMgt.)",
			"Licenciatura en Ciencias en Ingeniería Ambiental (BSEn.E./BSEnv.E.)",
			"Licenciatura en Ingeniería de Fibras (BFE)",
			"Licenciatura en Ciencias en Ingeniería Industrial (BSIE)",
			"Licenciatura en Ciencias en Ingeniería de Manufactura (BSMfg.E.)",
			"Licenciatura en Ciencias en Ingeniería de Sistemas de Manufactura (BSMSE)",
			"Licenciatura en Ciencias en Ciencia e Ingeniería de Materiales (BSMSE)",
			"Licenciatura en Ciencias en Ingeniería de Materiales (BSMA.E.)",
			"Licenciatura en Ingeniería Mecánica (BME)",
			"Licenciatura en Ciencias en Ingeniería Mecánica (BSME)",
			"Licenciatura en Ciencias en Ingeniería Metalúrgica (BSMt.E.)",
			"Licenciatura en Ciencias en Ingeniería de Minas (BSMI.E.)",
			"Licenciatura en Ciencias en Sistemas (BS-SYST.)",
			"Licenciatura en Ingeniería de Software (BSWE)",
			"Licenciatura en Ciencias en Ingeniería de Software (BSSE)",
			"Licenciatura en Ingeniería de Sistemas (BSE)",
			"Licenciatura en Ciencias en Ingeniería de Sistemas (BSSE)",
			"Licenciatura en Tecnología de la Ingeniería (BET)",
			"Licenciatura en Ciencias en Tecnología de la Ingeniería (BSET)",
			"Licenciatura en Ciencias en Tecnología de Ingeniería Civil (BSCET/BSCiv.ET)",
			"Licenciatura en Ciencias en Tecnología de Ingeniería Informática (BSCET)",
			"Licenciatura en Ciencias en Tecnología de Ingeniería de la Construcción (BSCon.ET)",
			"Licenciatura en Ciencias en Tecnología de Diseño de Redacción (BSDDT)",
			"Licenciatura en Ciencias en Tecnología Eléctrica/Electrónica (BSET)",
			"Licenciatura en Ciencias en Tecnología de Ingeniería Eléctrica (BSEET)",
			"Licenciatura en Ciencias en Tecnología de Ingeniería Electromecánica (BSEMET)",
			"Licenciatura en Ciencias en Tecnología de Ingeniería Mecánica (BSMET)",
			"Licenciatura en Bellas Artes (BFA)",
			"Licenciatura en Silvicultura (BF)",
			"Licenciatura en Ciencias en Investigación Forestal (BSFor.Res.)",
			"Licenciatura en Letras Hebreas (BHL)",
			"Licenciatura en Periodismo (BJ)",
			"Licenciatura en Derecho (LL.B.)",
			"Licenciatura en Estudios Liberales (BLS)",
			"Licenciatura en Literatura (B.Lit.)",
			"Licenciatura en Ciencias Marinas (BMS)",
			"Licenciatura en Música (BM)",
			"Licenciatura en Enfermería (BN)",
			"Licenciatura en Ciencias en Enfermería (BSN)",
			"Licenciado en Farmacia (B.Pharm.)",
			"Licenciatura en Filosofía (B.Phil.)",
			"Licenciatura en Educación Religiosa (BRE)",
			"Licenciatura en Ciencias (BS)",
			"Licenciatura en Ciencias en Química (BSCh.)",
			"Licenciatura en Tecnología (BT/B.Tech.)",
		];

		$candidates = Candidate::all();

		foreach ($candidates as $candidate) {

			$city = City::all()->random(1)->first();
			$from = Carbon::now()->subYears(rand(5, 10));

			$work_experience = new EducationExperience();
			$work_experience->candidate_id = $candidate->id;
			$work_experience->institution = fake()->randomElement($institutions);
			$work_experience->title = fake()->randomElement($titles);
			$work_experience->location = $city->department->name . ', ' . $city->name;
			$work_experience->from = $from;
			$work_experience->to = Carbon::parse($from)->addYears(rand(2, 6));
			$work_experience->save();

		}

	}

}
