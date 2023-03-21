<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Company;
use App\Models\JobType;
use App\Models\Offer;
use App\Models\OfferCategory;
use App\Models\Skill;
use App\Models\Status;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\CodeCoverage\Report\PHP;

class SkillSeeder extends Seeder {

	/**
	 * Seed the application's database.
	 *
	 * @return void
	 */
	public function run()
	{
		$skills = [
			"PHP", "Laravel", "Microsoft Word", "HTML", "CSS", "CSS tools", "Photoshop", "JavaScript", "Java", "JavaFX", "NodeJS",
			"Go", "Python", "NumPy", "Scrum", "Coaching", "Machine Learning", "UI/UX Design", "React", "Search Engine Optimization",
			"Project Coordination", "Stakeholder Engagement", "Microsoft Excel", "Microsoft Outlook", "Microsoft Word",
			"Commercial Awareness", "Robot Framework", "Scaled Agile Framework", "Test-driven development", "Conflict resolution",
			"Negotiation", "HR Policies", "Spring framework", "Git", "Docker", "Redis", "Jira", "PostgreSQL", "Facilitation",
			"Building Trust", "Professional Networking", "Identifying External Influences", "Managing Talent",
			"Creating Company Culture", "Effective Listening", "Being Approachable & Accessible", "Change Management", "Persuasion",
			"Negotiating", "Problem-Solving", "Training", "Consulting",
		];

		foreach ($skills as $skill) {
			$new_skill = new Skill();
			$new_skill->name = $skill;
			$new_skill->save();
		}

	}

}
