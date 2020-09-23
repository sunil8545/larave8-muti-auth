<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto py-10 sm:px-10 lg:px-10">
        @include('message')
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
            @livewire('users-table')
        </div>
    </div>
</x-app-layout>
