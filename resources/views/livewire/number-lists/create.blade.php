<form>
    <div class="form-group">
        <label for="exampleFormControlInput1">User Id:</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter User Id" wire:model="user_id">
        @error('user_id') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <button wire:click.prevent="store()" class="btn btn-success">Save</button>
</form>
