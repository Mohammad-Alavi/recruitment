<?php

namespace App\Containers\Skill\Tests\Unit;

use App\Containers\Skill\Tests\TestCase;
use Illuminate\Support\Facades\Schema;

/**
 * Class SkillTest.
 *
 * @group skill
 * @group unit
 */
class SkillTest extends TestCase
{
	public function test_skills_table_has_expected_columns(): void
    {
		$columns = [
			'id',
			'name',
			'skill_level',
			'from_date',
			'to_date',
			'created_at',
			'updated_at'
		];
		foreach ($columns as $column) {
			$this->assertTrue(Schema::hasColumn('skills', $column));
		}
	}
}
