<x-jet-dialog-modal wire:model="show_modal">
    <x-slot name="title">
        {{ __($modal_title) }}
    </x-slot>
    <x-slot name="content">
        @include($this->form)
    </x-slot>

    <x-slot name="footer">
        <x-jet-secondary-button wire:click="toggleModel" wire:loading.attr="disabled">
            {{ __('Cancel') }}
        </x-jet-secondary-button>
        <x-jet-button class="ml-2" wire:click="save" wire:loading.attr="disabled">
                {{ $model_update==true?__('Update'):__('Add') }}
        </x-jet-button>
       
        
    </x-slot>
</x-jet-dialog-modal>