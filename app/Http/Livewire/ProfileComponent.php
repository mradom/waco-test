<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Profile;
use Illuminate\Support\Facades\Auth;


class ProfileComponent extends Component
{
    public $direccion, $nacimiento, $ciudad;

    protected $rules = [
        'direccion'     => 'required|min:6',
        'nacimiento'    => 'date_format:Y-m-d',
        'ciudad'        => 'string',
    ];

    public function mount()
    {
        $profile = Profile::firstOrNew(
            ['user_id' => Auth::id() ]
        );
        $this->direccion = $profile->address;
        $this->nacimiento = $profile->birthdate;
        $this->ciudad = $profile->city;
    }

    public function render()
    {
        return view('livewire.profile-component',
            [
                'direccion'     => $this->direccion,
                'nacimiento'    => $this->nacimiento,
                'ciudad'        => $this->ciudad,
            ]);
    }

    public function save()
    {
        $this->validate();
        $profile = Profile::firstOrNew(
            ['user_id' => Auth::id() ]
        );
        $profile->address = $this->direccion ?? null;
        $profile->birthdate = $this->nacimiento ?? null;
        $profile->city = $this->ciudad ?? null;
        $profile->save();

    }
}
