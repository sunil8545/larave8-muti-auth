<x-jet-authentication-card>
    <x-slot name="logo">
        <x-jet-authentication-card-logo />
    </x-slot>

    @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ session('status') }}
        </div>
    @endif

    <form wire:submit.prevent="submit">

        <div>
            <x-jet-label value="Email" />
            <x-jet-input class="block mt-1 w-full" type="email" wire:model.defer="email" required autofocus />
            <x-jet-input-error for="email" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-jet-label value="Password" />
            <x-jet-input class="block mt-1 w-full" type="password" wire:model.defer="password" required autocomplete="current-password" />
            <x-jet-input-error for="password" class="mt-2" />
        </div>

        <div class="block mt-4">
            <label class="flex items-center">
                <input type="checkbox" class="form-checkbox" wire:model.defer="remember">
                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-between mt-4">
            @if (Route::has('admin.password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('admin.password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-jet-button class="ml-4">
                {{ __('Login') }}
            </x-jet-button>
        </div>
    </form>
</x-jet-authentication-card>