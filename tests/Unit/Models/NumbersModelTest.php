<?php

namespace Tests\Unit\Models;

use App\Models\NumberList;
use App\Models\Number;
use Tests\TestCase;

class NumbersModelTest extends TestCase
{
    /**
     * Test if Number model belongs to NumberList model
     *
     * @return void
     */
    public function test_belongs_to_number_list()
    {
        $number = Number::factory()->create();

        $this->assertInstanceOf(NumberList::class, $number->number_list);
    }
}
