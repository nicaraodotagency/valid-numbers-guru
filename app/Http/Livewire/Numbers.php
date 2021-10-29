<?php

namespace App\Http\Livewire;

use App\Models\Number;
use Livewire\Component;

class Numbers extends Component
{
    public $numbers, $number_list_id;

    public function render()
    {
        $this->numbers = Number::where('number_list_id', $this->number_list_id)->get();
        return view('livewire.numbers.index');
    }
}
