<div class="container">
    <div class="row align-items-center">
        <div class="col-lg-3">
            <a href="{{ route('home') }}" class="site-brand">
                <img src="{{ asset('images/logo.png') }}" alt="Site brand" />
            </a>
        </div>
        <div class="col-lg-5">
            <div class="header-search-block">
                <input type="text" placeholder="Search entire store here" />
                <button>Search</button>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="main-navigation flex-lg-right">
                <div class="cart-widget">
                    <div class="login-block">
                        <a href="{{ route('auth.login-register') }}" class="font-weight-bold">Login</a>
                        <br />
                        <span>or</span><a href="{{ route('auth.login-register') }}">Register</a>
                    </div>
                    <div class="cart-block">
                        <div class="cart-total">
                            <span class="text-number"> {{ $total_items }} </span>
                            <span class="text-item"> Shopping Cart </span>
                            <span class="price">
                                $@currency($total)
                                <i class="fas fa-chevron-down"></i>
                            </span>
                        </div>
                        <div class="cart-dropdown-block">
                            <div class="single-cart-block">
                                @forelse ($items as $hash => $item)
                                    <div class="cart-product">
                                        <a href="product-details.html" class="image">
                                            <img src="{{ $item->getModel()->picture_url }}" alt="" />
                                        </a>
                                        <div class="content">
                                            <h3 class="title">
                                                <a href="product-details.html">{{ $item->getTitle() }}</a>
                                            </h3>
                                            <p class="price">
                                                <span class="qty">{{ $item->getQuantity() }} ×</span>
                                                $@currency($item->getPrice())
                                            </p>
                                            <button
                                                wire:click="removeItemFromCart('{{ $hash }}', {{ $item->getId() }})"
                                                class="cross-btn">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </div>
                                    </div>
                                @empty
                                    <p class="p-3">There's not items in the cart.</p>
                                @endforelse
                            </div>

                            <div class="single-cart-block">
                                <div class="btn-block">
                                    <a href="cart.html" class="btn">View Cart <i
                                            class="fas fa-chevron-right"></i></a>
                                    <a href="checkout.html" class="btn btn--primary">Check Out <i
                                            class="fas fa-chevron-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
