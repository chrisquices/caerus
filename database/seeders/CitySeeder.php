<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\City;
use App\Models\Company;
use App\Models\Department;
use App\Models\Offer;
use App\Models\OfferCategory;
use App\Models\Status;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\CodeCoverage\Report\PHP;

class CitySeeder extends Seeder {

	/**
	 * Seed the application's database.
	 *
	 * @return void
	 */
	public function run()
	{
		$cities = [
			[
				"department" => "ASUNCIÓN",
				"city"       => "ASUNCIÓN",
			],
			[
				"department" => "CONCEPCIÓN",
				"city"       => "CONCEPCIÓN",
			],
			[
				"department" => "CONCEPCIÓN",
				"city"       => "BELÉN",
			],
			[
				"department" => "CONCEPCIÓN",
				"city"       => "HORQUETA",
			],
			[
				"department" => "CONCEPCIÓN",
				"city"       => "LORETO",
			],
			[
				"department" => "CONCEPCIÓN",
				"city"       => "SAN CARLOS DEL APA",
			],
			[
				"department" => "CONCEPCIÓN",
				"city"       => "SAN LÁZARO",
			],
			[
				"department" => "CONCEPCIÓN",
				"city"       => "YBY YAÚ",
			],
			[
				"department" => "CONCEPCIÓN",
				"city"       => "AZOTE'Y",
			],
			[
				"department" => "CONCEPCIÓN",
				"city"       => "SARGENTO JOSÉ FÉLIX LÓPEZ",
			],
			[
				"department" => "CONCEPCIÓN",
				"city"       => "SAN ALFREDO",
			],
			[
				"department" => "CONCEPCIÓN",
				"city"       => "PASO BARRETO",
			],
			[
				"department" => "SAN PEDRO",
				"city"       => "SAN PEDRO DEL YCUAMANDYYÚ",
			],
			[
				"department" => "SAN PEDRO",
				"city"       => "ANTEQUERA",
			],
			[
				"department" => "SAN PEDRO",
				"city"       => "CHORÉ",
			],
			[
				"department" => "SAN PEDRO",
				"city"       => "GENERAL ELIZARDO AQUINO",
			],
			[
				"department" => "SAN PEDRO",
				"city"       => "ITACURUBÍ DEL ROSARIO",
			],
			[
				"department" => "SAN PEDRO",
				"city"       => "LIMA",
			],
			[
				"department" => "SAN PEDRO",
				"city"       => "NUEVA GERMANIA",
			],
			[
				"department" => "SAN PEDRO",
				"city"       => "SAN ESTANISLAO",
			],
			[
				"department" => "SAN PEDRO",
				"city"       => "SAN PABLO",
			],
			[
				"department" => "SAN PEDRO",
				"city"       => "TACUATÍ",
			],
			[
				"department" => "SAN PEDRO",
				"city"       => "UNIÓN",
			],
			[
				"department" => "SAN PEDRO",
				"city"       => "25 DE DICIEMBRE",
			],
			[
				"department" => "SAN PEDRO",
				"city"       => "VILLA DEL ROSARIO",
			],
			[
				"department" => "SAN PEDRO",
				"city"       => "GENERAL FRANCISCO ISIDORO RESQUÍN",
			],
			[
				"department" => "SAN PEDRO",
				"city"       => "YATAITY DEL NORTE",
			],
			[
				"department" => "SAN PEDRO",
				"city"       => "GUAJAYVI",
			],
			[
				"department" => "SAN PEDRO",
				"city"       => "CAPIIBARY",
			],
			[
				"department" => "SAN PEDRO",
				"city"       => "SANTA ROSA DEL AGUARAY",
			],
			[
				"department" => "SAN PEDRO",
				"city"       => "YRYBUCUA",
			],
			[
				"department" => "SAN PEDRO",
				"city"       => "LIBERACIÓN",
			],
			[
				"department" => "CORDILLERA",
				"city"       => "CAACUPÉ",
			],
			[
				"department" => "CORDILLERA",
				"city"       => "ALTOS",
			],
			[
				"department" => "CORDILLERA",
				"city"       => "ARROYOS Y ESTEROS",
			],
			[
				"department" => "CORDILLERA",
				"city"       => "ATYRÁ",
			],
			[
				"department" => "CORDILLERA",
				"city"       => "CARAGUATAY",
			],
			[
				"department" => "CORDILLERA",
				"city"       => "EMBOSCADA",
			],
			[
				"department" => "CORDILLERA",
				"city"       => "EUSEBIO AYALA",
			],
			[
				"department" => "CORDILLERA",
				"city"       => "ISLA PUCÚ",
			],
			[
				"department" => "CORDILLERA",
				"city"       => "ITACURUBÍ DE LA CORDILLERA",
			],
			[
				"department" => "CORDILLERA",
				"city"       => "JUAN DE MENA",
			],
			[
				"department" => "CORDILLERA",
				"city"       => "LOMA GRANDE",
			],
			[
				"department" => "CORDILLERA",
				"city"       => "MBOCAYATY DEL YHAGUY",
			],
			[
				"department" => "CORDILLERA",
				"city"       => "NUEVA COLOMBIA",
			],
			[
				"department" => "CORDILLERA",
				"city"       => "PIRIBEBUY",
			],
			[
				"department" => "CORDILLERA",
				"city"       => "PRIMERO DE MARZO",
			],
			[
				"department" => "CORDILLERA",
				"city"       => "SAN BERNARDINO",
			],
			[
				"department" => "CORDILLERA",
				"city"       => "SANTA ELENA",
			],
			[
				"department" => "CORDILLERA",
				"city"       => "TOBATÍ",
			],
			[
				"department" => "CORDILLERA",
				"city"       => "VALENZUELA",
			],
			[
				"department" => "CORDILLERA",
				"city"       => "SAN JOSE OBRERO",
			],
			[
				"department" => "GUAIRÁ",
				"city"       => "VILLARRICA",
			],
			[
				"department" => "GUAIRÁ",
				"city"       => "BORJA",
			],
			[
				"department" => "GUAIRÁ",
				"city"       => "CAPITÁN MAURICIO JOSÉ TROCHE",
			],
			[
				"department" => "GUAIRÁ",
				"city"       => "CORONEL MARTÍNEZ",
			],
			[
				"department" => "GUAIRÁ",
				"city"       => "FÉLIX PÉREZ CARDOZO",
			],
			[
				"department" => "GUAIRÁ",
				"city"       => "GRAL. EUGENIO A. GARAY",
			],
			[
				"department" => "GUAIRÁ",
				"city"       => "INDEPENDENCIA",
			],
			[
				"department" => "GUAIRÁ",
				"city"       => "ITAPÉ",
			],
			[
				"department" => "GUAIRÁ",
				"city"       => "ITURBE",
			],
			[
				"department" => "GUAIRÁ",
				"city"       => "JOSÉ FASSARDI",
			],
			[
				"department" => "GUAIRÁ",
				"city"       => "MBOCAYATY",
			],
			[
				"department" => "GUAIRÁ",
				"city"       => "NATALICIO TALAVERA",
			],
			[
				"department" => "GUAIRÁ",
				"city"       => "ÑUMÍ",
			],
			[
				"department" => "GUAIRÁ",
				"city"       => "SAN SALVADOR",
			],
			[
				"department" => "GUAIRÁ",
				"city"       => "YATAITY",
			],
			[
				"department" => "GUAIRÁ",
				"city"       => "DOCTOR BOTTRELL",
			],
			[
				"department" => "GUAIRÁ",
				"city"       => "PASO YOBAI",
			],
			[
				"department" => "GUAIRÁ",
				"city"       => "TEBICUARY",
			],
			[
				"department" => "CAAGUAZÚ",
				"city"       => "CORONEL OVIEDO",
			],
			[
				"department" => "CAAGUAZÚ",
				"city"       => "CAAGUAZÚ",
			],
			[
				"department" => "CAAGUAZÚ",
				"city"       => "CARAYAÓ",
			],
			[
				"department" => "CAAGUAZÚ",
				"city"       => "DR. CECILIO BÁEZ",
			],
			[
				"department" => "CAAGUAZÚ",
				"city"       => "SANTA ROSA DEL MBUTUY",
			],
			[
				"department" => "CAAGUAZÚ",
				"city"       => "DR. JUAN MANUEL FRUTOS",
			],
			[
				"department" => "CAAGUAZÚ",
				"city"       => "REPATRIACIÓN",
			],
			[
				"department" => "CAAGUAZÚ",
				"city"       => "NUEVA LONDRES",
			],
			[
				"department" => "CAAGUAZÚ",
				"city"       => "SAN JOAQUÍN",
			],
			[
				"department" => "CAAGUAZÚ",
				"city"       => "SAN JOSÉ DE LOS ARROYOS",
			],
			[
				"department" => "CAAGUAZÚ",
				"city"       => "YHÚ",
			],
			[
				"department" => "CAAGUAZÚ",
				"city"       => "DR. J. EULOGIO ESTIGARRIBIA",
			],
			[
				"department" => "CAAGUAZÚ",
				"city"       => "R.I. 3 CORRALES",
			],
			[
				"department" => "CAAGUAZÚ",
				"city"       => "RAÚL ARSENIO OVIEDO",
			],
			[
				"department" => "CAAGUAZÚ",
				"city"       => "JOSÉ DOMINGO OCAMPOS",
			],
			[
				"department" => "CAAGUAZÚ",
				"city"       => "MARISCAL FRANCISCO SOLANO LÓPEZ",
			],
			[
				"department" => "CAAGUAZÚ",
				"city"       => "LA PASTORA",
			],
			[
				"department" => "CAAGUAZÚ",
				"city"       => "3 DE FEBRERO",
			],
			[
				"department" => "CAAGUAZÚ",
				"city"       => "SIMÓN BOLIVAR",
			],
			[
				"department" => "CAAGUAZÚ",
				"city"       => "VAQUERÍA",
			],
			[
				"department" => "CAAGUAZÚ",
				"city"       => "TEMBIAPORÁ",
			],
			[
				"department" => "CAAGUAZÚ",
				"city"       => "NUEVA TOLEDO",
			],
			[
				"department" => "CAAZAPÁ",
				"city"       => "CAAZAPÁ",
			],
			[
				"department" => "CAAZAPÁ",
				"city"       => "ABAÍ",
			],
			[
				"department" => "CAAZAPÁ",
				"city"       => "BUENA VISTA",
			],
			[
				"department" => "CAAZAPÁ",
				"city"       => "DR. MOISÉS S. BERTONI",
			],
			[
				"department" => "CAAZAPÁ",
				"city"       => "GRAL. HIGINIO MORINIGO",
			],
			[
				"department" => "CAAZAPÁ",
				"city"       => "MACIEL",
			],
			[
				"department" => "CAAZAPÁ",
				"city"       => "SAN JUAN NEPOMUCENO",
			],
			[
				"department" => "CAAZAPÁ",
				"city"       => "TAVAÍ",
			],
			[
				"department" => "CAAZAPÁ",
				"city"       => "YEGROS",
			],
			[
				"department" => "CAAZAPÁ",
				"city"       => "YUTY",
			],
			[
				"department" => "CAAZAPÁ",
				"city"       => "3 DE MAYO",
			],
			[
				"department" => "ITAPÚA",
				"city"       => "ENCARNACIÓN",
			],
			[
				"department" => "ITAPÚA",
				"city"       => "BELLA VISTA",
			],
			[
				"department" => "ITAPÚA",
				"city"       => "CAMBYRETÁ",
			],
			[
				"department" => "ITAPÚA",
				"city"       => "CAPITÁN MEZA",
			],
			[
				"department" => "ITAPÚA",
				"city"       => "CAPITÁN MIRANDA",
			],
			[
				"department" => "ITAPÚA",
				"city"       => "NUEVA ALBORADA",
			],
			[
				"department" => "ITAPÚA",
				"city"       => "CARMEN DEL PARANÁ",
			],
			[
				"department" => "ITAPÚA",
				"city"       => "CORONEL BOGADO",
			],
			[
				"department" => "ITAPÚA",
				"city"       => "CARLOS ANTONIO LÓPEZ",
			],
			[
				"department" => "ITAPÚA",
				"city"       => "NATALIO",
			],
			[
				"department" => "ITAPÚA",
				"city"       => "FRAM",
			],
			[
				"department" => "ITAPÚA",
				"city"       => "GENERAL ARTIGAS",
			],
			[
				"department" => "ITAPÚA",
				"city"       => "GENERAL DELGADO",
			],
			[
				"department" => "ITAPÚA",
				"city"       => "HOHENAU",
			],
			[
				"department" => "ITAPÚA",
				"city"       => "JESÚS",
			],
			[
				"department" => "ITAPÚA",
				"city"       => "JOSÉ LEANDRO OVIEDO",
			],
			[
				"department" => "ITAPÚA",
				"city"       => "OBLIGADO",
			],
			[
				"department" => "ITAPÚA",
				"city"       => "MAYOR JULIO DIONISIO OTAÑO",
			],
			[
				"department" => "ITAPÚA",
				"city"       => "SAN COSME Y DAMIAN",
			],
			[
				"department" => "ITAPÚA",
				"city"       => "SAN PEDRO DEL PARANÁ",
			],
			[
				"department" => "ITAPÚA",
				"city"       => "SAN RAFAEL DEL PARANÁ",
			],
			[
				"department" => "ITAPÚA",
				"city"       => "TRINIDAD",
			],
			[
				"department" => "ITAPÚA",
				"city"       => "EDELIRA",
			],
			[
				"department" => "ITAPÚA",
				"city"       => "TOMÁS ROMERO PEREIRA",
			],
			[
				"department" => "ITAPÚA",
				"city"       => "ALTO VERÁ",
			],
			[
				"department" => "ITAPÚA",
				"city"       => "LA PAZ",
			],
			[
				"department" => "ITAPÚA",
				"city"       => "YATYTAY",
			],
			[
				"department" => "ITAPÚA",
				"city"       => "SAN JUAN DEL PARANÁ",
			],
			[
				"department" => "ITAPÚA",
				"city"       => "PIRAPÓ",
			],
			[
				"department" => "ITAPÚA",
				"city"       => "ITAPÚA POTY",
			],
			[
				"department" => "MISIONES",
				"city"       => "SAN JUAN BAUTISTA DE LAS MISIONES",
			],
			[
				"department" => "MISIONES",
				"city"       => "AYOLAS",
			],
			[
				"department" => "MISIONES",
				"city"       => "SAN IGNACIO",
			],
			[
				"department" => "MISIONES",
				"city"       => "SAN MIGUEL",
			],
			[
				"department" => "MISIONES",
				"city"       => "SAN PATRICIO",
			],
			[
				"department" => "MISIONES",
				"city"       => "SANTA MARÍA",
			],
			[
				"department" => "MISIONES",
				"city"       => "SANTA ROSA",
			],
			[
				"department" => "MISIONES",
				"city"       => "SANTIAGO",
			],
			[
				"department" => "MISIONES",
				"city"       => "VILLA FLORIDA",
			],
			[
				"department" => "MISIONES",
				"city"       => "YABEBYRY",
			],
			[
				"department" => "PARAGUARÍ",
				"city"       => "PARAGUARÍ",
			],
			[
				"department" => "PARAGUARÍ",
				"city"       => "ACAHAY",
			],
			[
				"department" => "PARAGUARÍ",
				"city"       => "CAAPUCÚ",
			],
			[
				"department" => "PARAGUARÍ",
				"city"       => "CABALLERO",
			],
			[
				"department" => "PARAGUARÍ",
				"city"       => "CARAPEGUÁ",
			],
			[
				"department" => "PARAGUARÍ",
				"city"       => "ESCOBAR",
			],
			[
				"department" => "PARAGUARÍ",
				"city"       => "LA COLMENA",
			],
			[
				"department" => "PARAGUARÍ",
				"city"       => "MBUYAPEY",
			],
			[
				"department" => "PARAGUARÍ",
				"city"       => "PIRAYÚ",
			],
			[
				"department" => "PARAGUARÍ",
				"city"       => "QUIINDY",
			],
			[
				"department" => "PARAGUARÍ",
				"city"       => "QUYQUYHÓ",
			],
			[
				"department" => "PARAGUARÍ",
				"city"       => "ROQUE GONZALEZ DE SANTACRUZ",
			],
			[
				"department" => "PARAGUARÍ",
				"city"       => "SAPUCÁI",
			],
			[
				"department" => "PARAGUARÍ",
				"city"       => "TEBICUARY-MÍ",
			],
			[
				"department" => "PARAGUARÍ",
				"city"       => "YAGUARÓN",
			],
			[
				"department" => "PARAGUARÍ",
				"city"       => "YBYCUÍ",
			],
			[
				"department" => "PARAGUARÍ",
				"city"       => "YBYTYMÍ",
			],
			[
				"department" => "ALTO PARANÁ",
				"city"       => "CIUDAD DEL ESTE",
			],
			[
				"department" => "ALTO PARANÁ",
				"city"       => "PRESIDENTE FRANCO",
			],
			[
				"department" => "ALTO PARANÁ",
				"city"       => "DOMINGO MARTÍNEZ DE IRALA",
			],
			[
				"department" => "ALTO PARANÁ",
				"city"       => "DR. JUAN LEÓN MALLORQUÍN",
			],
			[
				"department" => "ALTO PARANÁ",
				"city"       => "HERNANDARIAS",
			],
			[
				"department" => "ALTO PARANÁ",
				"city"       => "ITAKYRY",
			],
			[
				"department" => "ALTO PARANÁ",
				"city"       => "JUAN E. O'LEARY",
			],
			[
				"department" => "ALTO PARANÁ",
				"city"       => "ÑACUNDAY",
			],
			[
				"department" => "ALTO PARANÁ",
				"city"       => "YGUAZÚ",
			],
			[
				"department" => "ALTO PARANÁ",
				"city"       => "LOS CEDRALES",
			],
			[
				"department" => "ALTO PARANÁ",
				"city"       => "MINGA GUAZÚ",
			],
			[
				"department" => "ALTO PARANÁ",
				"city"       => "SAN CRISTOBAL",
			],
			[
				"department" => "ALTO PARANÁ",
				"city"       => "SANTA RITA",
			],
			[
				"department" => "ALTO PARANÁ",
				"city"       => "NARANJAL",
			],
			[
				"department" => "ALTO PARANÁ",
				"city"       => "SANTA ROSA DEL MONDAY",
			],
			[
				"department" => "ALTO PARANÁ",
				"city"       => "MINGA PORÁ",
			],
			[
				"department" => "ALTO PARANÁ",
				"city"       => "MBARACAYÚ",
			],
			[
				"department" => "ALTO PARANÁ",
				"city"       => "SAN ALBERTO",
			],
			[
				"department" => "ALTO PARANÁ",
				"city"       => "IRUÑA",
			],
			[
				"department" => "ALTO PARANÁ",
				"city"       => "SANTA FE DEL PARANÁ",
			],
			[
				"department" => "ALTO PARANÁ",
				"city"       => "TAVAPY",
			],
			[
				"department" => "ALTO PARANÁ",
				"city"       => "DR. RAÚL PEÑA",
			],
			[
				"department" => "CENTRAL",
				"city"       => "AREGUÁ",
			],
			[
				"department" => "CENTRAL",
				"city"       => "CAPIATÁ",
			],
			[
				"department" => "CENTRAL",
				"city"       => "FERNANDO DE LA MORA",
			],
			[
				"department" => "CENTRAL",
				"city"       => "GUARAMBARÉ",
			],
			[
				"department" => "CENTRAL",
				"city"       => "ITÁ",
			],
			[
				"department" => "CENTRAL",
				"city"       => "ITAUGUÁ",
			],
			[
				"department" => "CENTRAL",
				"city"       => "LAMBARÉ",
			],
			[
				"department" => "CENTRAL",
				"city"       => "LIMPIO",
			],
			[
				"department" => "CENTRAL",
				"city"       => "LUQUE",
			],
			[
				"department" => "CENTRAL",
				"city"       => "MARIANO ROQUE ALONSO",
			],
			[
				"department" => "CENTRAL",
				"city"       => "NUEVA ITALIA",
			],
			[
				"department" => "CENTRAL",
				"city"       => "ÑEMBY",
			],
			[
				"department" => "CENTRAL",
				"city"       => "SAN ANTONIO",
			],
			[
				"department" => "CENTRAL",
				"city"       => "SAN LORENZO",
			],
			[
				"department" => "CENTRAL",
				"city"       => "VILLA ELISA",
			],
			[
				"department" => "CENTRAL",
				"city"       => "VILLETA",
			],
			[
				"department" => "CENTRAL",
				"city"       => "YPACARAÍ",
			],
			[
				"department" => "CENTRAL",
				"city"       => "YPANÉ",
			],
			[
				"department" => "CENTRAL",
				"city"       => "J. AUGUSTO SALDIVAR",
			],
			[
				"department" => "ÑEEMBUCÚ",
				"city"       => "PILAR",
			],
			[
				"department" => "ÑEEMBUCÚ",
				"city"       => "ALBERDI",
			],
			[
				"department" => "ÑEEMBUCÚ",
				"city"       => "CERRITO",
			],
			[
				"department" => "ÑEEMBUCÚ",
				"city"       => "DESMOCHADOS",
			],
			[
				"department" => "ÑEEMBUCÚ",
				"city"       => "GRAL. JOSÉ EDUVIGIS DÍAZ",
			],
			[
				"department" => "ÑEEMBUCÚ",
				"city"       => "GUAZÚ-CUÁ",
			],
			[
				"department" => "ÑEEMBUCÚ",
				"city"       => "HUMAITÁ",
			],
			[
				"department" => "ÑEEMBUCÚ",
				"city"       => "ISLA UMBÚ",
			],
			[
				"department" => "ÑEEMBUCÚ",
				"city"       => "LAURELES",
			],
			[
				"department" => "ÑEEMBUCÚ",
				"city"       => "MAYOR JOSÉ DEJESÚS MARTÍNEZ",
			],
			[
				"department" => "ÑEEMBUCÚ",
				"city"       => "PASO DE PATRIA",
			],
			[
				"department" => "ÑEEMBUCÚ",
				"city"       => "SAN JUAN BAUTISTA DE ÑEEMBUCÚ",
			],
			[
				"department" => "ÑEEMBUCÚ",
				"city"       => "TACUARAS",
			],
			[
				"department" => "ÑEEMBUCÚ",
				"city"       => "VILLA FRANCA",
			],
			[
				"department" => "ÑEEMBUCÚ",
				"city"       => "VILLA OLIVA",
			],
			[
				"department" => "ÑEEMBUCÚ",
				"city"       => "VILLALBÍN",
			],
			[
				"department" => "AMAMBAY",
				"city"       => "PEDRO JUAN CABALLERO",
			],
			[
				"department" => "AMAMBAY",
				"city"       => "BELLA VISTA",
			],
			[
				"department" => "AMAMBAY",
				"city"       => "CAPITÁN BADO",
			],
			[
				"department" => "AMAMBAY",
				"city"       => "ZANJA PYTÃ",
			],
			[
				"department" => "AMAMBAY",
				"city"       => "KARAPAÍ",
			],
			[
				"department" => "CANINDEYÚ",
				"city"       => "SALTO DEL GUAIRÁ",
			],
			[
				"department" => "CANINDEYÚ",
				"city"       => "CORPUS CHRISTI",
			],
			[
				"department" => "CANINDEYÚ",
				"city"       => "VILLA CURUGUATY",
			],
			[
				"department" => "CANINDEYÚ",
				"city"       => "VILLA YGATIMÍ",
			],
			[
				"department" => "CANINDEYÚ",
				"city"       => "ITANARÁ",
			],
			[
				"department" => "CANINDEYÚ",
				"city"       => "YPEJHÚ",
			],
			[
				"department" => "CANINDEYÚ",
				"city"       => "FRANCISCO CABALLERO ALVAREZ",
			],
			[
				"department" => "CANINDEYÚ",
				"city"       => "KATUETÉ",
			],
			[
				"department" => "CANINDEYÚ",
				"city"       => "LA PALOMA DEL ESPÍRITU SANTO",
			],
			[
				"department" => "CANINDEYÚ",
				"city"       => "NUEVA ESPERANZA",
			],
			[
				"department" => "CANINDEYÚ",
				"city"       => "YASY CAÑY",
			],
			[
				"department" => "CANINDEYÚ",
				"city"       => "YBYRAROBANÁ",
			],
			[
				"department" => "CANINDEYÚ",
				"city"       => "YBY PYTÁ",
			],
			[
				"department" => "PRESIDENTE HAYES",
				"city"       => "BENJAMÍN ACEVAL",
			],
			[
				"department" => "PRESIDENTE HAYES",
				"city"       => "PUERTO PINASCO",
			],
			[
				"department" => "PRESIDENTE HAYES",
				"city"       => "VILLA HAYES",
			],
			[
				"department" => "PRESIDENTE HAYES",
				"city"       => "NANAWA",
			],
			[
				"department" => "PRESIDENTE HAYES",
				"city"       => "JOSÉ FALCÓN",
			],
			[
				"department" => "PRESIDENTE HAYES",
				"city"       => "TTE. 1° MANUEL IRALA FERNÁNDEZ",
			],
			[
				"department" => "PRESIDENTE HAYES",
				"city"       => "TENIENTE ESTEBAN MARTÍNEZ",
			],
			[
				"department" => "PRESIDENTE HAYES",
				"city"       => "GENERAL JOSÉ MARÍA BRUGUEZ",
			],
			[
				"department" => "BOQUERÓN",
				"city"       => "MARISCAL JOSÉ FÉLIX ESTIGARRIBIA",
			],
			[
				"department" => "BOQUERÓN",
				"city"       => "FILADELFIA",
			],
			[
				"department" => "BOQUERÓN",
				"city"       => "LOMA PLATA",
			],
			[
				"department" => "ALTO PARAGUAY",
				"city"       => "FUERTE OLIMPO",
			],
			[
				"department" => "ALTO PARAGUAY",
				"city"       => "PUERTO CASADO",
			],
			[
				"department" => "ALTO PARAGUAY",
				"city"       => "BAHÍA NEGRA",
			],
			[
				"department" => "ALTO PARAGUAY",
				"city"       => "CARMELO PERALTA",
			],
		];

		foreach ($cities as $city) {
			$department = Department::where('name', ucwords(mb_strtolower($city['department'])))->first();

			$new_city = new City();
			$new_city->department_id = $department->id;
			$new_city->name = ucwords(mb_strtolower($city['city']));
			$new_city->save();
		}

	}

}
