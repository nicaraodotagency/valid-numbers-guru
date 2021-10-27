<form>
    <input type="hidden" wire:model="number_list_id">
    <div class="form-group">
        <label for="exampleFormControlInput1">User Id:</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter User Id" wire:model="user_id">
        @error('user_id') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <button wire:click.prevent="update()" class="btn btn-dark">Update</button>
    <button wire:click.prevent="cancel()" class="btn btn-danger">Cancel</button>
</form>
