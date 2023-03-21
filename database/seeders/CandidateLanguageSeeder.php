<?php

namespace Database\Seeders;

use App\Models\Candidate;
use App\Models\CandidateLanguage;
use App\Models\Language;
use Illuminate\Database\Seeder;

class CandidateLanguageSeeder extends Seeder {

	/**
	 * Seed the application's database.
	 *
	 * @return void
	 */
	public function run()
	{
		$candidates = Candidate::all();

		foreach ($candidates as $candidate) {

			for ($i = 0; $i < 2; $i++) {
				$random_language = Language::all()->random(1)->first();

				$random_language_exists = CandidateLanguage::query()
					->where('candidate_id', $candidate->id)
					->where('language_id', $random_language->id)
					->first();

				if (!$random_language_exists) {
					$candidate_skill = new CandidateLanguage();
					$candidate_skill->candidate_id = $candidate->id;
					$candidate_skill->language_id = $random_language->id;
					$candidate_skill->save();
				}
			}

		}

	}

}
