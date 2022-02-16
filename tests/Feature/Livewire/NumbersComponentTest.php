<?php

namespace Tests\Feature\Livewire;

use App\Models\NumberList;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NumbersComponentTest extends TestCase
{
    function test_can_see_numbers()
    {
        $user = User::factory()->create();
        $numberList = NumberList::factory()->create(['user_id' => $user->id]);

        $this->actingAs($user)->get('/number-lists/'.$numberList->id.'/numbers')->assertSeeLivewire('numbers');
    }
}
