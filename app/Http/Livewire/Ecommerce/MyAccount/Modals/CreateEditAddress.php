<?php

namespace App\Http\Livewire\Ecommerce\MyAccount\Modals;

use App\Models\Address;
use App\Models\City;
use App\Models\Country;
use App\Models\State;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CreateEditAddress extends Component
{
    public Address $address;
    public $cities;
    public $states;
    public $countries;
    public $city = 0;
    public $state;
    public $country = 47;

    protected $rules = [
        'address.firstname' => 'required|min:2|max:64',
        'address.lastname' => 'required|min:2|max:64',
        'address.address' => 'required|min:8|max:255',
        'address.phone' => 'required|integer|digits_between:6,10',
        'country' => 'exists:countries,id',
        'state' => 'exists:states,id',
        'city' => 'exists:cities,id',
    ];

    protected $validationAttributes = [
        'address.firstname' => 'nombre',
        'address.lastname' => 'apellido',
        'address.address' => 'dirección',
        'state' => 'departamento',
        'city' => 'pueblo o Ciudad',
    ];

    public function mount(Address $address)
    {
        $this->cities = collect();
        $this->states = collect();
        $this->countries = Country::all();

        if ($address->exists) {
            /** @var State $state */
            $state = State::with('cities')->whereName($address->state)->first();

            $this->country = $state?->country->id;
            $this->cities = $state?->cities;
            $this->city = $this->cities?->where('name', $address->city)->first()?->id;
        }

        $this->address = $address;
        $this->countryChange();
    }

    public function render()
    {
        return view('livewire.ecommerce.my-account.modals.create-edit-address');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function countryChange()
    {
        $this->states = State::whereCountryId($this->country)->get();
    }

    public function stateChange()
    {
        $this->cities = City::whereStateId($this->state)->get();
        $this->city = $this->cities->first()->id;
    }

    public function onSubmit()
    {
        $data = $this->validate();

        $this->address->city = $this->cities->find($data['city'])->name;
        $this->address->state = $this->states->find($data['state'])->name;
        $this->address->country = $this->countries->find($data['country'])->name;

        if (!$this->address->exists) {
            /** @var User $user */
            $user = Auth::user();
            $user->addresses()->create($this->address->toArray());
        } else {
            $this->address->save();
        }

        return redirect()->route('my-account.index', ['tab' => 'address-edit']);
    }
}
