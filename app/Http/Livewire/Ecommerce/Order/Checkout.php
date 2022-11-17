<?php

namespace App\Http\Livewire\Ecommerce\Order;

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
    public Order $order;
    public $reservation;
    public $checkShipingAddress = false;
    public $location = [
        'city' => 0,
        'state' => 0,
        'country' => 47
    ];

    protected $rules = [
        'order.notes' => 'max:500',
        'order.shipping_phone' => 'required|integer|digits_between:6,10',
        'order.shipping_address' => 'required|min:8|max:255',
        'order.shipping_lastname' => 'required|min:3|max:64',
        'order.shipping_firstname' => 'required|min:2|max:64',

        'location.city' => 'exists:cities,id',
        'location.state' => 'exists:states,id',
        'location.country' => 'exists:countries,id',
        // 'email' => 'required|email',
        // 'dni' => 'min:6',
        // required_unless:anotherfield,value,...
    ];

    protected $validationAttributes = [
        'order.shipping_phone' => 'teléfono',
        'order.shipping_address' => 'dirección',
        'order.shipping_lastname' => 'apellido',
        'order.shipping_firstname' => 'nombre',

        'locationcity' => 'pueblo o ciudad',
        'location.state' => 'departamento',
        // 'dni' => 'Documento',
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

        $this->order->shipping_city = collect($this->location['cities'])
            ->firstWhere('id', $data['location']['city'])['name'];
        $this->order->shipping_state = collect($this->location['states'])
            ->firstWhere('id', $data['location']['state'])['name'];
        $this->order->shipping_country = collect($this->location['countries'])
            ->firstWhere('id', $data['location']['country'])['name'];

        $cart = Cart::name('shopping');

        if ($this->reservation) {
            $this->order->reserved_at = Carbon::now();
        } else {
            $this->order->paid_at = Carbon::now();
        }

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
}
