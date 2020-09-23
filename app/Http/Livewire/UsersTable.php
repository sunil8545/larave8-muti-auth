<?php

namespace App\Http\Livewire;

use App\Models\Admin;
use Kdion4891\LaravelLivewireTables\Column;
use Spatie\Permission\Models\Role;

class UsersTable extends BaseTable
{
    public $modal_title = 'Create User';
    public $form = 'admin.user.user';
    public $user = [];
    public $roles = [];
    public $auth;


    public function create()
    {
        $this->show_modal = true;
        $this->model_update = false;
        $this->user =[];
    }

    public function edit($id)
    {
        $user = Admin::findOrFail($id);

        $this->user = $user->toArray();
        $this->show_modal = true;
        $this->model_update = true;
    }

    public function save()
    {
        if($this->model_update){
            $validated = $this->validate([
                'user.name'=>'required|max:200',
                'user.email'=>'required|unique:admins,email,'.($this->user['id']??null),
                'user.password'=>'nullable|min:8',
                'user.role'=>'required',                
            ],[],['user.name'=>'name','user.email'=>'email','user.role'=>'role','user.password'=>'password']);            
            session()->flash('success', 'User updated successfully!');
        }
        else{
            $validated = $this->validate([
                'user.name'=>'required|max:200',
                'user.email'=>'required|unique:admins,email,'.($this->user['id']??null),
                'user.password'=>'required|min:8',
                'user.role'=>'required',
            ],[],['user.name'=>'name','user.email'=>'email','user.role'=>'role','user.password'=>'password']);
            session()->flash('success', 'User added successfully!');
        }
        $admin = Admin::firstOrNew(['id'=>$this->user['id']??null]);
        $admin->name = $validated['user']['name'];
        $admin->email = $validated['user']['email'];
        if(isset($validated['user']['password'])&&$validated['user']['password'])
            $admin->password = \Hash::make($validated['user']['password']);
        $admin->save();
        $admin->syncRoles($validated['user']['role']);
        $this->show_modal = false;
        return redirect()->route('admin.user.index');
    }

    public function destroy($id)
    {
        $admin = Admin::findOrFail($id);

        $admin->delete();

        session()->flash('success', 'User deleted successfully!');
        return redirect()->route('admin.user.index');
    }

    public function mount()
    {
        $this->auth = auth()->user();
        $this->roles = Role::where('guard_name','admin')->get();
    }

    /**
     * @return Builder
     */
    public function query()
    {
        return Admin::with('roles')->where('id','<>',$this->auth->id);
    }

    /**
     * @return array
     */
    public function columns() : array
    {
        return [
            Column::make('Name')
                ->searchable()
                ->sortable(),
            Column::make('Email')
                ->searchable()
                ->sortable(),
            Column::make('Role','role'),
            Column::make('Actions')->view('table.action'),
        ];
    }
}
