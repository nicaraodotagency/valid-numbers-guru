<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ config('app.name') }}
        </h2>
    </x-slot>

    <div class="py-12 overflow-y-scroll " style="height: calc(100vh - 211px) ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                @livewire('number-lists')
            </div>
        </div>
    </div>

    <footer class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 text-center font-semibold text-xl text-gray-800 leading-tight">
            Made by <a href="https://nicarao.agency/">Nicarao Agency</a>
        </div>
    </footer>
</x-app-layout>
