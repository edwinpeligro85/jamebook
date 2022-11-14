<div class="modal-dialog modal-dialog-centered">
    <form wire:submit.prevent="onSubmit" class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">{{ $address->exists ? 'Edit' : 'Create new' }} address</h5>

            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <div class="modal-body">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="firstname-{{ $address->id }}">Name</label>
                            <input type="text" class="form-control" id="firstname-{{ $address->id }}"
                                wire:model="address.firstname" min="3" max="45" required>
                        </div>
                    </div>

                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="lastname-{{ $address->id }}">Last name</label>
                            <input type="text" class="form-control" id="lastname-{{ $address->id }}"
                                wire:model="address.lastname" min="3" max="45" required>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group">
                            <label for="country-{{ $address->id }}">Country</label>
                            <select class="form-control" id="country-{{ $address->id }}" wire:model="country"
                                wire:change="countryChange" disabled="disabled" required>
                                @foreach ($countries as $country)
                                    <option value="{{ $country->id }}" class="text-uppercase">{{ $country->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="state-{{ $address->id }}">Department / State</label>
                            <select class="form-control" id="state-{{ $address->id }}" wire:model="state"
                                wire:change="stateChange" required>
                                @forelse($states as $state)
                                    @if ($loop->first)
                                        <option value="0">Select a state</option>
                                    @endif
                                    <option value="{{ $state->id }}">{{ $state->name }}</option>
                                @empty
                                    <option value="">Should be select a country</option>
                                @endforelse
                            </select>
                        </div>
                    </div>

                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="city-{{ $address->id }}">Town / City</label>
                            <select class="form-control" id="city-{{ $address->id }}" wire:model="city" required>
                                @forelse($cities as $city)
                                    @if ($loop->first)
                                        <option value="0">Select a city</option>
                                    @endif
                                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                                @empty
                                    <option value="">Should be select a state</option>
                                @endforelse
                            </select>
                            <small wire:loading.delay wire:target="state" style="display: none;">
                                Loading cities...
                            </small>
                        </div>
                    </div>

                    <div class="col-12 col-lg-8">
                        <div class="form-group">
                            <label for="address-{{ $address->id }}">Address</label>
                            <input type="text" class="form-control" id="address-{{ $address->id }}"
                                wire:model="address.address" required>
                        </div>
                    </div>

                    <div class="col-12 col-lg-4">
                        <div class="form-group">
                            <label for="phone-{{ $address->id }}">Phone</label>
                            <input type="text" class="form-control" id="phone-{{ $address->id }}"
                                wire:model="address.phone" required>
                        </div>
                    </div>

                    <div class="col-12 pt-3">
                        @include('partials.alerts.succes-or-errors')
                    </div>
                </div>
            </div>
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn--primary">Save changes</button>
        </div>
    </form>
</div>
