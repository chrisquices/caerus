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

class CompanySeeder extends Seeder {

	/**
	 * Seed the application's database.
	 *
	 * @return void
	 */
	public function run()
	{
		$companies = [
			[
				'city_id'     => 1,
				'category_id' => 1,
				'name'        => 'Open Technologies',
				'description' => 'Opentech - Empresa de Software · Open Technologies S.A. - Opentech - Empresa de Software.',
				'email'       => 'opentechnologies@caerus.com',
				'telephone'   => '(021) 328 5542',
				'address'     => 'Tte. 1ro. Roque Cabrera Haedo, Asunción 1403',
				'website'     => 'https://www.opentech.com.py',
				'photo'       => 'companies/opentechnologies-photo.jpg',
				'banner'      => 'companies/opentechnologies-banner.jpg',
				'is_active'   => 1,
				'created_at'  => now(),
				'updated_at'  => now(),
			],
			[
				'city_id'     => 2,
				'category_id' => 9,
				'name'        => 'Banco Itaú',
				'description' => 'Bienvenido a Itaú Paraguay. Somos el mejor lugar del país para trabajar y el mayor banco privado de América Latina en activos ;-)',
				'email'       => 'bancoitau@caerus.com',
				'telephone'   => '(021) 617 1000',
				'address'     => 'Shopping del Sol, Asunción',
				'website'     => 'https://www.itau.com.py',
				'photo'       => 'companies/bancoitau-photo.jpg',
				'banner'      => 'companies/bancoitau-banner.jpg',
				'is_active'   => 1,
				'created_at'  => now(),
				'updated_at'  => now(),
			],
			[
				'city_id'     => 3,
				'category_id' => 4,
				'name'        => 'Coca Cola',
				'description' => 'Estamos aquí para refrescar el mundo y marcar la diferencia. Obtenga más información sobre The Coca-Cola Company, nuestras marcas y cómo nos esforzamos por hacer negocios de la manera correcta.',
				'email'       => 'cocacola@caerus.com',
				'telephone'   => '(021) 618 7070',
				'address'     => 'Shopping del Sol, Asunción',
				'website'     => 'https://www.itau.com.py',
				'photo'       => 'companies/cocacola-photo.jpg',
				'banner'      => 'companies/cocacola-banner.jpg',
				'is_active'   => 1,
				'created_at'  => now(),
				'updated_at'  => now(),
			],
			[
				'city_id'     => 3,
				'category_id' => 9,
				'name'        => 'Banco Basa',
				'description' => 'Banco Basa tiene como visión, ser el Banco paraguayo líder orientado a la rentabilidad y a la calidad del servicio al cliente. Su misión es brindar soluciones generando valor para sus clientes, accionistas, colaboradores y la sociedad.',
				'email'       => 'bancobasa@caerus.com',
				'telephone'   => '(021) 617 1000',
				'address'     => 'Aviadores del Chaco e/San Martín - Asunción',
				'website'     => 'https://www.itau.com.py',
				'photo'       => 'companies/bancobasa-photo.jpg',
				'banner'      => 'companies/bancobasa-banner.jpg',
				'is_active'   => 1,
				'created_at'  => now(),
				'updated_at'  => now(),
			],
			[
				'city_id'     => 3,
				'category_id' => 10,
				'name'        => 'Twitch',
				'description' => 'Twitch es un servicio interactivo de transmisión en vivo para contenido que abarca juegos, entretenimiento, deportes, música y más. Hay algo para todos en Twitch.',
				'email'       => 'twitch@caerus.com',
				'telephone'   => '(021) 617 1000',
				'address'     => 'Shopping del Sol, Asunción',
				'website'     => 'https://twitch.tv',
				'photo'       => 'companies/twitch-photo.jpg',
				'banner'      => 'companies/twitch-banner.jpg',
				'is_active'   => 1,
				'created_at'  => now(),
				'updated_at'  => now(),
			],
			[
				'city_id'     => 1,
				'category_id' => 1,
				'name'        => 'Google LLC',
				'description' => 'Google LLC is an American multinational technology company focusing on search engine technology, online advertising, cloud computing, computer software, quantum computing, e-commerce, artificial intelligence,[9] and consumer electronics.',
				'email'       => 'google@caerus.com',
				'telephone'   => '(021) 617 1000',
				'address'     => '1600 Amphitheatre Parkway, Mountain View, California',
				'website'     => 'https://google.com',
				'photo'       => 'companies/google-photo.jpg',
				'banner'      => 'companies/google-banner.jpg',
				'is_active'   => 1,
				'created_at'  => now(),
				'updated_at'  => now(),
			],
			[
				'city_id'     => 1,
				'category_id' => 1,
				'name'        => 'Instagram',
				'description' => 'Instagram is a free photo and video sharing app available on iPhone and Android. People can upload photos or videos to our service and share them with their followers or with a select group of friends.',
				'email'       => 'instagram@caerus.com',
				'telephone'   => '(021) 617 1000',
				'address'     => '1 Hacker Way, Menlo Park, CA 94025',
				'website'     => 'https://instagram.com',
				'photo'       => 'companies/instagram-photo.jpg',
				'banner'      => 'companies/instagram-banner.jpg',
				'is_active'   => 1,
				'created_at'  => now(),
				'updated_at'  => now(),
			],
			[
				'city_id'     => 1,
				'category_id' => 1,
				'name'        => 'Twitter',
				'description' => 'Twitter is a free social networking site where users broadcast short posts known as tweets. These tweets can contain text, videos, photos or links.',
				'email'       => 'twitter@caerus.com',
				'telephone'   => '(021) 617 1000',
				'address'     => '1 Hacker Way, Menlo Park, CA 94025',
				'website'     => 'https://twitter.com',
				'photo'       => 'companies/twitter-photo.jpg',
				'banner'      => 'companies/twitter-banner.jpg',
				'is_active'   => 1,
				'created_at'  => now(),
				'updated_at'  => now(),
			],
		];

		foreach ($companies as $company) {
			$new_company = new Company();
			$new_company->city_id = $company['city_id'];
			$new_company->category_id = $company['category_id'];
			$new_company->name = $company['name'];
			$new_company->description = $company['description'];
			$new_company->email = $company['email'];
			$new_company->telephone = $company['telephone'];
			$new_company->address = $company['address'];
			$new_company->website = $company['website'];
			$new_company->photo = $company['photo'];
			$new_company->banner = $company['banner'];
			$new_company->is_active = $company['is_active'];
			$new_company->save();
		}

	}

}
