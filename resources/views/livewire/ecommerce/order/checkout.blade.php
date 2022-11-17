<div class="container">
    <div class="row">
        <div class="col-12">
            @guest
                <div class="checkout-form">
                    <div class="row row-40">
                        <div class="col-lg-7">
                            <h1 class="quick-title">Checkout</h1>

                            <livewire:ecommerce.auth.login :inCheckout="true" />
                        </div>
                    </div>
                </div>
            @endguest

            @auth
                <!-- Checkout Forms -->
                <form wire:submit.prevent="submit" class="checkout-form">
                    <div class="row row-40">
                        <div class="col-lg-7 mb--20">
                            <h4 class="checkout-title">Shipping Address</h4>

                            @if ($user->addresses->count() > 0)
                                <!-- Billing Address -->
                                <div id="billing-form" class="mb-40">
                                    <div class="row">
                                        <div wire:ignore class="col-12 col-12 mb--20">
                                            <div class="form-group">
                                                <label>Select an exists address*</label>
                                                <select @disabled($checkShipingAddress) wire:model="address"
                                                    class="form-control">
                                                    @foreach ($user->addresses as $address)
                                                        <option value="">Select an address</option>
                                                        <option value="{{ $address->id }}">{{ $address->full_address }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-12 mb--20">
                                            <div class="block-border check-bx-wrapper">
                                                <div class="check-box">
                                                    <input wire:model="checkShipingAddress" type="checkbox"
                                                        id="shiping_address" data-shipping />
                                                    <label for="shiping_address">Select to Different Address</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            <!-- Shipping Address -->
                            <div id="shipping-form" @class(['mb--40', 'd-none' => !$checkShipingAddress])>
                                <div class="row">
                                    <div class="col-md-6 col-12 mb--20">
                                        <label>First Name*</label>
                                        <input type="text" wire:model="order.shipping_firstname"
                                            placeholder="First Name" />
                                    </div>
                                    <div class="col-md-6 col-12 mb--20">
                                        <label>Last Name*</label>
                                        <input type="text" wire:model="order.shipping_lastname"
                                            placeholder="Last Name" />
                                    </div>
                                    <div class="col-md-6 col-12 mb--20">
                                        <label>Phone no*</label>
                                        <input type="tel" wire:model="order.shipping_phone"
                                            placeholder="Phone number" />
                                    </div>
                                    <div class="col-12 mb--20">
                                        <label>Address*</label>
                                        <input type="text" wire:model="order.shipping_address"
                                            placeholder="Address line 1" />
                                    </div>
                                    <div class="col-md-6 col-12 mb--20">

                                        <div class="form-group">
                                            <label for="country">Country*</label>
                                            <select class="form-control" wire:model="location.country" id="country"
                                                disabled>
                                                @foreach ($location['countries'] as $country)
                                                    <option value="{{ $country['id'] }}">{{ $country['name'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12 mb--20">
                                        <label for="state">State*</label>
                                        <select class="form-control" wire:model="location.state" id="state">
                                            @foreach ($location['states'] as $state)
                                                <option value="">Select a state</option>
                                                <option value="{{ $state['id'] }}">{{ $state['name'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6 col-12 mb--20">
                                        <label for="city">Town/City**</label>
                                        <select class="form-control" wire:model="location.city" id="city">
                                            @foreach ($location['cities'] as $city)
                                                <option value="">Select a city</option>
                                                <option value="{{ $city['id'] }}">{{ $city['name'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="order-note-block mt--30">
                                <label for="order-note">Order notes</label>
                                <textarea wire:model="order.notes" id="order-note" cols="30" rows="10" class="order-note"
                                    placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                            </div>

                            <div class="pt-3">
                                @include('partials.alerts.succes-or-errors')
                            </div>
                        </div>

                        <div class="col-lg-5">
                            <div class="row">
                                <!-- Cart Total -->
                                <div class="col-12">
                                    <livewire:ecommerce.order.checkout-cart-total />
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            @endauth
        </div>
    </div>
</div>
