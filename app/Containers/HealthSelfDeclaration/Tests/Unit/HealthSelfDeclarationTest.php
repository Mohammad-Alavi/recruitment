<?php

namespace App\Containers\Skill\Tests\Unit;

use App\Containers\Skill\Tests\TestCase;
use Illuminate\Support\Facades\Schema;

/**
 * Class HealthSelfDeclaration.
 *
 * @group health-self-declaration
 * @group unit
 */
class HealthSelfDeclarationTest extends TestCase
{
    public function test_health_self_declarations_table_has_expected_columns(): void
    {
        $columns = [
            'id',
            'user_id',
            'blood_type',
            'health_options',
            'created_at',
            'updated_at'
        ];
        foreach ($columns as $column) {
            $this->assertTrue(Schema::hasColumn('health_self_declarations', $column));
        }
    }
}
