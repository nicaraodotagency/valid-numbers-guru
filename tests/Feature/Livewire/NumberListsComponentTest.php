<?php

namespace Tests\Feature\Livewire;

use App\Http\Livewire\NumberLists;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class NumberListsComponentTest extends TestCase
{
    function test_can_see_number_lists()
    {
        $this->actingAs(User::factory()->create())->get('/dashboard')->assertSeeLivewire('number-lists');
    }
}
