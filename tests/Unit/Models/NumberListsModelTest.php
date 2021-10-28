<?php

namespace Tests\Unit\Models;

use App\Models\NumberList;
use App\Models\User;
use Tests\TestCase;

class NumberListsModelTest extends TestCase
{
    /**
     * Test if NumberList model belongs to User model
     *
     * @return void
     */
    public function test_belongs_to_user()
    {
        $numberList = NumberList::factory()->create();

        $this->assertInstanceOf(User::class, $numberList->user);
    }
}
