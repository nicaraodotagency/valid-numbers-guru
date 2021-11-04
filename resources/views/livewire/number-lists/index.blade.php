<div>
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    @include('livewire.number-lists.create')
        <div class="rounded-lg block w-full overflow-x-auto p-6">
            <table class="table table-bordered w-full mt-5 bg-gray-50 border border-gray-300" style="min-width: 600px">
                <thead>
                <tr class="text-center border border-gray-300 p-2">
                    <th>No.</th>
                    <th>User Id</th>
                    <th>Created At</th>
                    <th style="min-width: 200px">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($numberLists as $numberList)
                    <tr class="text-center border border-gray-300 p-2">
                        <td class="p-2">{{ $numberList->id }}</td>
                        <td class="p-2">{{ $numberList->user_id }}</td>
                        <td class="p-2">{{ $numberList->created_at }}</td>
                        <td class="p-2">
                            <x-jet-button class="bg-blue-600" wire:click="show({{ $numberList->id }})" >Show</x-jet-button>
                            <x-jet-danger-button wire:click="delete({{ $numberList->id }})" >Delete</x-jet-danger-button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
</div>
