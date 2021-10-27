<div>

    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    @if($updateMode)
        @include('livewire.number-lists.update')
    @else
        @include('livewire.number-lists.create')
    @endif

    <table class="table table-bordered mt-5">
        <thead>
        <tr>
            <th>No.</th>
            <th>User Id</th>
            <th>Created At</th>
            <th width="150px">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($numberLists as $numberList)
            <tr>
                <td>{{ $numberList->id }}</td>
                <td>{{ $numberList->user_id }}</td>
                <td>
                    <button wire:click="edit({{ $numberList->id }})" class="btn btn-primary btn-sm">Edit</button>
                    <button wire:click="delete({{ $numberList->id }})" class="btn btn-danger btn-sm">Delete</button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
