<?php

namespace App\Http\Livewire;

use App\Imports\NumbersImport;
use App\Models\NumberList;
use Livewire\Component;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;

class NumberLists extends Component
{
    use WithFileUploads;

    public $numberLists, $number_list_id, $user_id, $file;
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
            'user_id' => 'required',
            'file' => 'required|file|mimes:csv,txt'
        ]);

        $numberList = NumberList::create($validated);
        $numberList
            ->addMedia($this->file->getRealPath())
            ->toMediaCollection();

        Excel::import(new NumbersImport($numberList->id), $numberList->getFirstMedia()->getPath(), null, \Maatwebsite\Excel\Excel::CSV);

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
