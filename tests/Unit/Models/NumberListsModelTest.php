<?php

namespace Tests\Unit\Models;

use App\Models\NumberList;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
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

    /**
     * Test if NumberList model has many Number model
     *
     * @return void
     */
    public function test_has_many_repositories()
    {
        $numberList = new numberList();

        $this->assertInstanceOf(Collection::class, $numberList->numbers);
    }
}
