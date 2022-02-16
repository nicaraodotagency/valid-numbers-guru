<form class="p-6">
    <div class="form-group mt-1 mb-1 " >
        <input class="block w-full cursor-pointer bg-gray-50 border border-gray-300 text-gray-900 focus:outline-none focus:border-transparent text-sm rounded-lg" aria-describedby="user_avatar_help" id="user_avatar" type="file" wire:model="file">
        @error('file') <span class="error">{{ $message }}</span> @enderror
    </div>
    <x-jet-button class="bg-blue-600" wire:click.prevent="store()">Save</x-jet-button>
</form>
