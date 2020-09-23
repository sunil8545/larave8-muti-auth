<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            @livewire('admin.profile.update-profile-information-form')

            <x-jet-section-border />

            <div class="mt-10 sm:mt-0">
                @livewire('admin.profile.update-password-form')
            </div>

            @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
                <x-jet-section-border />

                <div class="mt-10 sm:mt-0">
                    @livewire('admin.profile.two-factor-authentication-form')
                </div>
            @endif

            {{-- <x-jet-section-border />

            <div class="mt-10 sm:mt-0">
                @livewire('admin.profile.logout-other-browser-sessions-form')
            </div> 

            <x-jet-section-border />

            <div class="mt-10 sm:mt-0">
                @livewire('admin.profile.delete-user-form')
            </div> --}}
        </div>
    </div>
</x-app-layout>
