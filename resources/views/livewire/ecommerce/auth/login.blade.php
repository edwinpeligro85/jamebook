<form wire:submit.prevent="submit">
    <div class="login-form">
        @if ($inCheckout)
            <p class="text-dark">
                To continue with the purchase, please log in to the
                site, if you do not have an account, register by clicking
                <a href="{{ route('auth.login-register') }}">here.</a>
            </p>
        @else
            <h4 class="login-title">Returning Customer</h4>
            <p>
                <span class="font-weight-bold">I am a returning customer</span>
            </p>
        @endif

        <div class="row">
            <div @class(['col-12 mb--15', 'col-lg-6' => $inCheckout])>
                <label for="login-email">Enter your email address here...</label>
                <input wire:model="email" class="mb-0 form-control" type="email" id="login-email"
                    placeholder="Enter you email address here..." />
                @error('email')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div @class(['col-12 mb--20', 'col-lg-6' => $inCheckout])>
                <label for="login-password">Password</label>
                <input wire:model="password"class="mb-0 form-control" type="password" id="login-password"
                    placeholder="Enter your password" />
                @error('password')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="col-md-12">
                <button type="submit" class="btn btn-outlined">Login</button>

                @if ($inCheckout)
                    <div class="form-group">
                        <p>
                            <a href="javascript:" class="pass-lost mt-3">Lost your password?</a>
                        </p>
                    </div>
                @endif
            </div>

            <div class="col-12 pt-3">
                @include('partials.alerts.succes-or-errors')
            </div>
        </div>
    </div>
</form>
