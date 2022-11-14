<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="row">
                <!-- My Account Tab Menu Start -->
                <div class="col-lg-3 col-12">
                    <div class="myaccount-tab-menu nav" role="tablist">
                        <a wire:click="changeTab('dashboard')" data-toggle="tab" href="#dashboard"
                            @class(['active' => $tab == 'dashboard'])>
                            <em class="fas fa-tachometer-alt"></em> Dashboard
                        </a>
                        <a href="#orders" @class(['active' => $tab == 'orders']) wire:click="changeTab('orders')"
                            data-toggle="tab">
                            <em class="fa fa-cart-arrow-down"></em> Orders
                        </a>
                        <a href="#address-edit" data-toggle="tab" @class(['active' => $tab == 'address-edit'])
                            wire:click="changeTab('address-edit')">
                            <em class="fa fa-map-marker"></em> address
                        </a>
                        <a href="#account-info" data-toggle="tab" @class(['active' => $tab == 'account-info'])
                            wire:click="changeTab('account-info')">
                            <em class="fa fa-user"></em> Account Details
                        </a>
                        <a wire:click="$emit('logout')" href="#"><em class="fas fa-sign-out-alt"></em> Logout</a>
                    </div>
                </div>
                <!-- My Account Tab Menu End -->

                <!-- My Account Tab Content Start -->
                <div class="col-lg-9 col-12 mt--30 mt-lg--0">
                    <div class="tab-content" id="myaccountContent">
                        <!-- Single Tab Content Start -->
                        <livewire:ecommerce.my-account.dashboard :active="$tab == 'dashboard'" />
                        <!-- Single Tab Content End -->

                        <!-- Single Tab Content Start -->
                        <livewire:ecommerce.my-account.orders :active="$tab == 'orders'" />
                        <!-- Single Tab Content End -->

                        <!-- Single Tab Content Start -->
                        <livewire:ecommerce.my-account.address-edit :active="$tab == 'address-edit'" />
                        <!-- Single Tab Content End -->

                        <!-- Single Tab Content Start -->
                        <livewire:ecommerce.my-account.account-info :active="$tab == 'account-info'" />
                        <!-- Single Tab Content End -->
                    </div>
                </div>
                <!-- My Account Tab Content End -->
            </div>
        </div>
    </div>
</div>
