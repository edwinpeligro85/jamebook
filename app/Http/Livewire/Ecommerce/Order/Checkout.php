<?php

namespace App\Http\Livewire\Ecommerce\Order;

use App\Models\Address;
use App\Models\City;
use App\Models\Country;
use App\Models\Order;
use App\Models\State;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Jackiedo\Cart\Facades\Cart;
use Livewire\Component;

class Checkout extends Component
{
    protected $listeners = ['setReservation'];

    public $user;
    public $address;
    public Order $order;
    public $reservation;
    public $checkShipingAddress = false;
    public $location = [
        'city' => null,
        'state' => null,
        'country' => 47
    ];

    protected $rules = [
        'address' => 'nullable|exists:addresses,id',
        'order.notes' => 'max:500',
        'order.shipping_phone' => 'nullable|required_without:address|integer|digits_between:6,10',
        'order.shipping_address' => 'nullable|required_without:address|min:8|max:255',
        'order.shipping_lastname' => 'nullable|required_without:address|min:3|max:64',
        'order.shipping_firstname' => 'nullable|required_without:address|min:2|max:64',

        'location.city' => 'nullable|required_without:address|exists:cities,id',
        'location.state' => 'nullable|required_without:address|exists:states,id',
        'location.country' => 'nullable|required_without:address|exists:countries,id',
    ];

    protected $validationAttributes = [
        'order.shipping_phone' => 'teléfono',
        'order.shipping_address' => 'dirección',
        'order.shipping_lastname' => 'apellido',
        'order.shipping_firstname' => 'nombre',

        'location.city' => 'pueblo o ciudad',
        'location.state' => 'departamento',
        'address' => 'dirección',
    ];

    public function mount()
    {
        $this->user = Auth::user();
        $this->order = new Order();
        $this->location['cities'] = collect();
        $this->location['states'] = collect();
        $this->location['countries'] = Country::all();

        if ($this->user->addresses->count() <= 0) {
            $this->checkShipingAddress = true;
        }

        $this->updatedLocationCountry(47);
    }

    public function render()
    {
        return view('livewire.ecommerce.order.checkout');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function updatedLocationCountry($value)
    {
        $this->location['states'] = State::whereCountryId($value)->get();
    }

    public function updatedLocationState($value)
    {
        $this->location['cities'] = City::whereStateId($value)->get();
        $this->location['city'] = $this->location['cities']->first()?->id;
    }

    public function setReservation($value)
    {
        $this->reservation = $value;
    }

    public function submit()
    {
        $data = $this->validate();

        $cart = Cart::name('shopping');

        if ($this->reservation) {
            $this->order->reserved_at = Carbon::now();
        } else {
            $this->order->paid_at = Carbon::now();
        }

        $this->mapAddress($data['location']);
        $lines = $this->mapOrderLines($cart->getItems());

        $this->order->user()->associate($this->user);
        $this->order->sub_total = $lines->sum('line_total') ?? 0;
        $this->order->order_total = $lines->sum('line_total') ?? 0;
        $this->order->payment_method = 'Cash on Delivery';
        $this->order->shipping_method = 'Express';
        $this->order->save();
        $this->order->lines()->createMany($lines);

        $cart->destroy();

        return redirect()->route('order.complete', $this->order->id);
    }

    protected function mapOrderLines($items)
    {
        $lines = [];

        foreach ($items as $item) {
            $book = $item->getModel();
            $details = $item->getDetails();

            array_push($lines, [
                'book_id' => $details->id,
                'isbn' => $book->isbn,
                'title' => $details->title,
                'quantity' => $details->quantity,
                'unit_price' => $details->price * 100,
                'line_total' => $details->total_price * 100,
            ]);
        }

        return collect($lines);
    }

    protected function mapAddress($data)
    {
        if ($this->address) {
            $address = Address::find($this->address);
            $this->order->shipping_city = $address->city;
            $this->order->shipping_state = $address->state;
            $this->order->shipping_phone = $address->phone;
            $this->order->shipping_country = $address->country;
            $this->order->shipping_address = $address->address;
            $this->order->shipping_lastname = $address->lastname;
            $this->order->shipping_firstname = $address->firstname;
        } else {
            $this->order->shipping_city = collect($this->location['cities'])
                ->firstWhere('id', $data['city'])['name'];
            $this->order->shipping_state = collect($this->location['states'])
                ->firstWhere('id', $data['state'])['name'];
            $this->order->shipping_country = collect($this->location['countries'])
                ->firstWhere('id', $data['country'])['name'];
        }
    }
}
