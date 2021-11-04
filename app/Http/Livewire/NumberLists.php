<?php

namespace App\Http\Livewire;

use App\Imports\NumbersImport;
use App\Models\NumberList;
use App\Repositories\GuruFormatValidatorApiRepository;
use Illuminate\Support\Facades\Auth;
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
        $this->numberLists = NumberList::where('user_id',Auth::user()->id)->get();
        return view('livewire.number-lists.index');
    }

    public function store()
    {
        $validated = $this->validate([
            'file' => 'required|file|mimes:csv,txt'
        ]);

        $validated['user_id'] = Auth::user()->id;

        $numberList = NumberList::create($validated);
        $numberList
            ->addMedia($this->file->getRealPath())
            ->toMediaCollection();

        Excel::import(new NumbersImport($numberList->id), $numberList->getFirstMedia()->getPath(), null, \Maatwebsite\Excel\Excel::CSV);

        $guruFormatValidatorApiRepository = new GuruFormatValidatorApiRepository();
        $guruFormatValidatorApiResponse = $guruFormatValidatorApiRepository->postList(Auth::user(), $numberList->numbers->pluck('number')->toArray());

        $numberList->format_validator_list_id = $guruFormatValidatorApiResponse["body"]["data"]["list_id"];
        $numberList->save();

        session()->flash('message', 'List Created Successfully.');
    }

    public function show($list_id)
    {
        return redirect()->to('/number-lists/'.$list_id.'/numbers');
    }

    public function delete($id)
    {
        NumberList::find($id)->delete();
        session()->flash('message', 'List Deleted Successfully.');
    }
}
