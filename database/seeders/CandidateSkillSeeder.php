<?php

namespace Database\Seeders;

use App\Models\Candidate;
use App\Models\CandidateSkill;
use App\Models\Category;
use App\Models\OfferCategory;
use App\Models\Skill;
use Illuminate\Database\Seeder;

class CandidateSkillSeeder extends Seeder {

	/**
	 * Seed the application's database.
	 *
	 * @return void
	 */
	public function run()
	{
		$candidates = Candidate::all();

		foreach ($candidates as $candidate) {

			for ($i = 0; $i < 6; $i++) {
				$random_skill = Skill::all()->random(1)->first();

				$random_skill_exists = CandidateSkill::query()
					->where('candidate_id', $candidate->id)
					->where('skill_id', $random_skill->id)
					->first();

				if (!$random_skill_exists) {
					$candidate_skill = new CandidateSkill();
					$candidate_skill->candidate_id = $candidate->id;
					$candidate_skill->skill_id = $random_skill->id;
					$candidate_skill->save();
				}
			}

		}

	}

}
