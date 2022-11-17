<div @class(['tab-pane fade', 'show active' => $active]) id="address-edit" role="tabpanel">
    <div class="myaccount-content">
        <div class="d-flex justify-content-between">
            <h3 class="m-0">Shipping Address</h3>
            <button type="button" wire:click="$emit('showModal', 'ecommerce.my-account.modals.create-edit-address')"
                class="btn btn--primary"><em class="fa fa-plus mr-1"></em>Create New Address</button>
        </div>

        <hr style="border-bottom: 1px dashed #cecece;">

        <div class="container">
            <div class="row">
                @forelse ($addresses as $address)
                    <div class="col-12 col-md-6 col-lg-4">
                        <address>
                            <p><strong>{{ $address->full_name }}</strong></p>
                            <p>{{ $address->full_address }}</p>
                            <p>Mobile: ({{ $address->phone_code }}) {{ $address->phone }}</p>
                        </address>

                        <button
                            wire:click="$emit('showModal',
                                'ecommerce.my-account.modals.create-edit-address',
                                '{{ $address->id }}')"
                            type="button" class="btn btn--primary">
                            <em class="fa fa-edit mr-1"></em>Edit Address
                        </button>
                    </div>
                @empty
                    <div class="col-12">
                        <button type="button"
                            wire:click="$emit('showModal', 'ecommerce.my-account.modals.create-edit-address')"
                            class="btn btn--primary"><em class="fa fa-plus mr-1"></em>Create New Address</button>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</div>
