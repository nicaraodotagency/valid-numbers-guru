<?php

namespace App\Http\Livewire;

use App\Models\NumberList;
use Livewire\Component;

class NumberLists extends Component
{
    public $numberLists, $number_list_id, $user_id;
    public $updateMode = false;

    public function render()
    {
        $this->numberLists = NumberList::all();
        return view('livewire.number-lists.index');
    }

    private function resetInputFields(){
        $this->user_id = '';
    }

    public function store()
    {
        $validated = $this->validate([
            'user_id' => 'required'
        ]);

        NumberList::create($validated);

        session()->flash('message', 'List Created Successfully.');

        $this->resetInputFields();
    }

    public function edit($id)
    {
        $numberList = NumberList::findOrFail($id);
        $this->number_list_id = $id;
        $this->user_id = $numberList->user_id;

        $this->updateMode = true;
    }

    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();
    }

    public function update()
    {
        $validated = $this->validate([
            'user_id' => 'required'
        ]);

        $numberList = NumberList::find($this->number_list_id);
        $numberList->update([
            'user_id' => $this->user_id
        ]);

        $this->updateMode = false;

        session()->flash('message', 'List Updated Successfully.');
        $this->resetInputFields();
    }

    public function delete($id)
    {
        NumberList::find($id)->delete();
        session()->flash('message', 'List Deleted Successfully.');
    }
}
