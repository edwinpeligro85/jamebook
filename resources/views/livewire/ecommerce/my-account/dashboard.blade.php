<div @class(['tab-pane fade', 'show active' => $active]) id="dashboard" role="tabpanel">
    <div class="myaccount-content">
        <h3>Dashboard</h3>

        <div class="welcome mb-20">
            <p>
                Hello, <strong>{{ $username }}</strong> (If Not
                <strong>{{ $username }} !</strong><a wire:click="$emit('logout')" href="#" class="logout">
                    Logout</a>)
            </p>
        </div>

        <p class="mb-0">
            From your account dashboard. you can easily check
            &amp; view your recent orders, manage your <a
                href="{{ route('my-account.index', ['tab' => 'address-edit']) }}">shipping addresses</a> and <a
                href="{{ route('my-account.index', ['tab' => 'account-info']) }}">edit your
                password and
                account details</a>.
        </p>
    </div>
</div>
