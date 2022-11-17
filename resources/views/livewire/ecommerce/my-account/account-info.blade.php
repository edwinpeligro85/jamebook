<div @class(['tab-pane fade', 'show active' => $active]) id="account-info" role="tabpanel">
    <div class="myaccount-content">
        <h3>Account Details</h3>
        <div class="account-details-form">
            <form wire:submit.prevent="submit">
                <div class="row">
                    <div class="col-12 mb--30">
                        <input id="username" placeholder="Username" type="text" wire:model="user.username" />
                        @error('user.username')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-12 col-md-6 mb--30">
                        <input id="name" placeholder="Name" type="text" wire:model="user.name" />
                        @error('user.name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-12 col-md-6 mb--30">
                        <input id="lastname" placeholder="Last Name" type="text" wire:model="user.lastname" />
                        @error('user.lastname')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-12 col-md-6 mb--30">
                        <input id="dni" placeholder="Dni" type="text" wire:model="user.dni" />
                        @error('user.dni')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-12 col-md-6 mb--30">
                        <input id="birthdate" placeholder="Birth Date" type="date" wire:model="user.birthdate" />
                        @error('user.birthdate')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-12 mb--30">
                        <input id="email" placeholder="Email Address" type="email" wire:model="user.email" />
                        @error('user.email')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-12 mb--30">
                        <h4>Password change</h4>
                    </div>

                    <div class="col-12 mb--30">
                        <input id="current_password" placeholder="Current Password" type="password"
                            wire:model="current_password" />
                        @error('current_password')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-lg-6 col-12 mb--30">
                        <input id="new_password" placeholder="New Password" type="password" wire:model="new_password" />
                        @error('new_password')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-lg-6 col-12 mb--30">
                        <input id="new_password_confirmation" placeholder="Confirm Password" type="password"
                            wire:model="new_password_confirmation" />
                        @error('new_password_confirmation')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn--primary">
                            Save Changes
                        </button>
                    </div>
                    <div class="col-12 pt-3">
                        @include('partials.alerts.succes-or-errors')
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
