<form wire:submit.prevent="submit">
    <div class="login-form">
        <h4 class="login-title">Returning Customer</h4>
        <p>
            <span class="font-weight-bold">I am a returning customer</span>
        </p>
        <div class="row">
            <div class="col-md-12 col-12 mb--15">
                <label for="login-email">Enter your email address here...</label>
                <input wire:model="email" class="mb-0 form-control" type="email" id="login-email"
                    placeholder="Enter you email address here..." />
                @error('email')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="col-12 mb--20">
                <label for="login-password">Password</label>
                <input wire:model="password"class="mb-0 form-control" type="password" id="login-password"
                    placeholder="Enter your password" />
                @error('password')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="col-md-12">
                <button type="submit" class="btn btn-outlined">Login</button>
            </div>
            <div class="col-12 pt-3">
                @include('partials.alerts.succes-or-errors')
            </div>
        </div>
    </div>
</form>
