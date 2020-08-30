<?php

namespace App\Containers\DesiredJob\Tests\Unit;

use App\Containers\DesiredJob\Tests\TestCase;
use Illuminate\Support\Facades\Schema;

/**
 * Class DesiredJobTest.
 *
 * @group desired-job
 * @group unit
 */
class DesiredJobTest extends TestCase
{
    public function test_desired_jobs_table_has_expected_columns(): void
    {
        $columns = [
            'id',
            'user_id',
            'activity_domain_id',
            'activity_domain_job_id',
            'ready_date',
            'created_at',
            'updated_at'
        ];
        foreach ($columns as $column) {
            $this->assertTrue(Schema::hasColumn('desired_jobs', $column));
        }
    }
}
