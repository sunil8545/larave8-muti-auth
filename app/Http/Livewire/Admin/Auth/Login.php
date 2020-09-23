<?php

namespace App\Http\Livewire\Admin\Auth;

use Livewire\Component;

class Login extends Component
{
    public $email;
    public $password;
    public $remember=false;

    public function submit()
    {
        $this->validate([
            'email' => 'required|email|exists:admins,email',
            'password' => 'required',
        ],[
            'email.exists'=>"We can't find a user with that email address."
        ]);

        if (auth()->guard('admin')->attempt(['email'=>$this->email,'password'=>$this->password],$this->remember)) {
            return redirect()->intended('admin/dashboard');
        }
        $this->addError('password', 'Invalid password');
        return back();
    }

    public function render()
    {
        return view('livewire.admin.auth.login');
    }
}
