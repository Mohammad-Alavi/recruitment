<?php

namespace App\Containers\Address\Tests\Unit;

use App\Containers\Address\Tests\TestCase;
use Illuminate\Support\Facades\Schema;

/**
 * Class AddressTest.
 *
 * @group skill
 * @group unit
 */
class AddressTest extends TestCase
{
    public function test_addresses_table_has_expected_columns(): void
    {
        $columns = [
            'id',
            'user_id',
            'address',
            'province_id',
            'city_id',
            'created_at',
            'updated_at'
        ];
        foreach ($columns as $column) {
            $this->assertTrue(Schema::hasColumn('addresses', $column));
        }
    }
}
