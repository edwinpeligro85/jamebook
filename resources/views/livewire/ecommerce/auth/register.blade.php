<form wire:submit.prevent="submit">
    <div class="login-form">
        <h4 class="login-title">New Customer</h4>
        <p>
            <span class="font-weight-bold">I am a new customer</span>
        </p>
        <div class="row">
            <div class="col-md-12 col-12 mb--15">
                <label for="name">Full Name</label>
                <input wire:model="name" class="mb-0 form-control" type="text" id="name"
                    placeholder="Enter your full name" />
            </div>
            <div class="col-12 mb--20">
                <label for="email">Email</label>
                <input wire:model="email" class="mb-0 form-control" type="email" id="email"
                    placeholder="Enter Your Email Address Here.." />
                @error('email')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="col-lg-6 mb--20">
                <label for="password">Password</label>
                <input wire:model="password" class="mb-0 form-control" type="password" id="password"
                    placeholder="Enter your password" />
                @error('password')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="col-lg-6 mb--20">
                <label for="repeat-password">Repeat Password</label>
                <input wire:model="password_confirmation" class="mb-0 form-control" type="password" id="repeat-password"
                    placeholder="Repeat your password" />
                @error('password_confirmation')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="col-md-12">
                <button type="submit" class="btn btn-outlined">Register</button>
            </div>
            <div class="col-12 pt-3">
                @include('partials.alerts.succes-or-errors')
            </div>
        </div>
    </div>
</form>
