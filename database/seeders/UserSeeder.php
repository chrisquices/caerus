<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder {

	/**
	 * Seed the application's database.
	 *
	 * @return void
	 */
	public function run()
	{
		$types = ['Company', 'Candidate', 'Candidate', 'Candidate', 'Candidate'];

		$user = new User();
		$user->type = 'Administrator';
		$user->name = 'Admin';
		$user->last_name = 'Caerus';
		$user->email = 'admin@caerus.com';
		$user->password = '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'; // password;
		$user->photo = 'users/user-avatar-00020.png';
		$user->is_active = 1;
		$user->save();

		$user = new User();
		$user->company_id = '4';
		$user->type = 'Company';
		$user->name = 'Banco Basa';
		$user->last_name = 'Gerente';
		$user->email = 'bancobasa@caerus.com';
		$user->password = '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'; // password;
		$user->photo = 'users/bancobasa.jpg';
		$user->is_active = 1;
		$user->save();

		$user = new User();
		$user->type = 'Candidate';
		$user->name = 'Ludwig';
		$user->last_name = 'Ahgren';
		$user->email = 'democandidate@caerus.com';
		$user->password = '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'; // password;
		$user->photo = 'users/user-avatar-00020.png';
		$user->is_active = 1;
		$user->save();

		for ($i = 0; $i < 300; $i++) {
			$user_type = fake()->randomElement($types);
			$rand = str_pad(rand(1, 31), 5, '0', STR_PAD_LEFT);

			$user = new User();
			$user->type = $user_type;
			$user->company_id = ($user_type == 'Company') ? fake()->randomElement([1, 2, 3, 4, 5, 6, 7, 8]) : null;
			$user->name = fake()->lastName();
			$user->last_name = fake()->lastName();
			$user->email = fake()->unique()->safeEmail();
			$user->password = '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'; // password;
			$user->photo = 'users/user-avatar-' . $rand . '.png';
			$user->is_active = 1;
			$user->save();
		}

	}

}
