<?php

namespace App\Containers\WorkExperience\Tests\Unit;

use App\Containers\WorkExperience\Tests\TestCase;
use Illuminate\Support\Facades\Schema;

/**
 * Class WordExperienceTest.
 *
 * @group work-experience
 * @group unit
 */
class WordExperienceTest extends TestCase
{
    public function test_work_experiences_table_has_expected_columns(): void
    {
        $columns = [
            'id',
            'work_place_name',
            'type_of_work',
            'work_duration_year',
            'work_duration_month',
            'insurance_duration_year',
            'insurance_duration_month',
            'activity_termination_reason',
            'employer_name',
            'employer_number',
        ];
        foreach ($columns as $column) {
            $this->assertTrue(Schema::hasColumn('work_experiences', $column));
        }
    }
}
