<?php

namespace App\Http\Livewire;

use Kdion4891\LaravelLivewireTables\Column;
use Spatie\Permission\Models\Role;

class RolesTable extends BaseTable
{
    public $modal_title = 'Create Role';
    public $form = 'admin.role.role';
    public $role = [];

    public function create()
    {
        $this->show_modal = true;
        $this->model_update = false;
        $this->role =[];
    }

    public function edit($id)
    {
        $role = Role::findOrFail($id);

        $this->role = $role->toArray();
        $this->show_modal = true;
        $this->model_update = true;
    }

    public function save()
    {
        $validated = $this->validate([
                        'role.role_name'=>'required|max:200',
                        'role.name'=>'required|unique:roles,name,'.($this->role['id']??null)
        ],[],['role.role_name'=>'name','role.name'=>'slug']);
        $this->show_modal = false;
        
        $role = Role::firstOrNew(['id'=>$this->role['id']??null]);
        $role->name = $validated['role']['name'];
        $role->role_name = $validated['role']['role_name'];
        $role->guard_name = 'admin';
        $role->save();
        if($this->model_update)
            session()->flash('success', 'Role updated successfully!');
        else
            session()->flash('success', 'Role added successfully!');

        return redirect()->route('admin.role.index');
    }

    public function destroy($id)
    {
        $role = Role::findOrFail($id);

        $role->delete();
        session()->flash('success', 'Role deleted successfully!');
        return redirect()->route('admin.role.index');
    }

    /**
     * @return Builder
     */
    public function query()
    {
        return Role::withCount('permissions');
    }

    /**
     * @return array
     */
    public function columns() : array
    {
        return [
            Column::make('Role Name','role_name')
                ->searchable()
                ->sortable(),
            Column::make('Slug','name')
                ->searchable()
                ->sortable(),
            Column::make('Actions')->view('table.action'),
        ];
    }
}
