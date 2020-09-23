
<div class="row">
    <div class="col-sm-6 mb-4">
        <x-jet-label value="Name" />
        <x-jet-input class="block mt-1 w-full" type="text" wire:model.defer="role.role_name" placeholder="Enter Name" required autofocus />
        <x-jet-input-error for="role.role_name" class="mt-2" />
    </div>
    <div class="col-sm-6 mb-4">
        <x-jet-label value="Slug" />
        <x-jet-input class="block mt-1 w-full" type="name" wire:model.defer="role.name" placeholder="Role Slug" />
        <x-jet-input-error for="role.name" class="mt-2" />
    </div>
</div>