<?php

namespace App\Containers\EducationalBackground\Tests\Unit;

use App\Containers\EducationalBackground\Tests\TestCase;
use Illuminate\Support\Facades\Schema;

/**
 * Class EducationalBackgroundTest.
 *
 * @group educational-background
 * @group unit
 */
class EducationalBackgroundTest extends TestCase
{
    public function test_educational_backgrounds_table_has_expected_columns(): void
    {
        $columns = [
            'id',
            'user_id',
            'field_of_study',
            'degree',
            'graduation_place',
            'grade_point_average',
        ];
        foreach ($columns as $column) {
            $this->assertTrue(Schema::hasColumn('educational_backgrounds', $column));
        }
    }
}
