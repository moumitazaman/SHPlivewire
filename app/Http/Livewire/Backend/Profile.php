<?php

namespace App\Http\Livewire\Backend;

use Livewire\WithFileUploads;
use Livewire\Component;

class Profile extends Component
{
    use WithFileUploads;

    public $name;
    public $email;
    public $phone;
    public $password;
    public $image;
    public $address;

    public function mount(){
        $this->name = auth()->user()->name;
        $this->email = auth()->user()->email;
        $this->phone = auth()->user()->phone;
        $this->password = null;
        $this->image = null;
        $this->address = auth()->user()->address;
    }

    public function save()
    {
        $user = auth()->user();
        $this->validate([
            'name' => 'required|string|min:3',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'phone' => 'required|string|unique:users,phone,'.$user->id,
            'password' => 'nullable|string|min:6',
            'image' => 'nullable|image|max:2000',
            'address' => 'required|string',
        ]);
        $user->name = $this->name;
        $user->email = $this->email;
        $user->phone = $this->phone;
        if($this->password)
        $user->password = bcrypt($this->password);
        if($this->image)
        $user->image = 'storage/'.$this->image->store('images', 'public');
        $user->address = $this->address;
        $user->save();
        $this->image = null;
        session()->flash('message', 'Successfully done');
    }
    public function render()
    {
        return view('livewire.backend.profile')->layout('layouts.backend.app');
    }
}
