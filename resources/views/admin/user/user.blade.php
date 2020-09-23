
<div class="row">
    <div class="col-sm-6 mb-4">
        <x-jet-label value="Name" />
        <x-jet-input class="block mt-1 w-full" type="text" wire:model.defer="user.name" placeholder="Enter Name" required autofocus />
        <x-jet-input-error for="user.name" class="mt-2" />
    </div>
    <div class="col-sm-6 mb-4">
        <x-jet-label value="Email" />
        <x-jet-input class="block mt-1 w-full" type="email" wire:model.defer="user.email" placeholder="Enter Email" required />
        <x-jet-input-error for="user.email" class="mt-2" />
    </div>
    <div class="col-sm-6 mb-4">
        <x-jet-label value="Role" />
        <select class="form-input rounded-md shadow-sm block mt-1 w-full" wire:model.defer="user.role">
            <option value="">Select Role</option>
            @foreach ($roles as $role)
                <option value="{{ $role->name }}" >{{ $role->role_name }}</option>
            @endforeach
        </select>
        <x-jet-input-error for="user.role" class="mt-2" />
    </div>
    <div class="col-sm-6 mb-4">
        <x-jet-label value="Password" />
        <x-jet-input class="block mt-1 w-full" type="password" wire:model.defer="user.password" placeholder="Enter Password" required/>
        <x-jet-input-error for="user.password" class="mt-2" />
    </div>
</div>
