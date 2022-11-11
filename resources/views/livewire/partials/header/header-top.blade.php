<div class="container">
    <div class="row">
        <div class="col-lg-4 d-flex align-items-center">
            <a class="text-light" href="tel:+573002817522">+57 300-281-7522</a>
        </div>

        <div class="col-lg-8 flex-lg-right">
            <ul class="header-top-list">
                {{-- <li class="dropdown-trigger language-dropdown">
                    <a href=""><em class="icons-left fas fa-heart"></em> wishlist (0)</a>
                </li> --}}

                @auth
                    <li class="dropdown-trigger language-dropdown">
                        <a href="{{ route('my-account.index') }}">
                            <em class="icons-left fas fa-user"></em> My Account
                        </a> <em class="fas fa-chevron-down dropdown-arrow"></em>

                        <ul class="dropdown-box">
                            <li><a href="{{ route('my-account.index') }}">My Account</a></li>
                            <li><a href="">Order History</a></li>
                            <li><a href="">Transactions</a></li>
                            <li>
                                <a wire:click="logout" href="#">
                                    <em class="fas fa-sign-out-alt"></em> Logout
                                </a>
                            </li>
                        </ul>
                    </li>
                @endauth

                {{-- <li>
                    <a href=""><em class="icons-left fas fa-phone"></em> Contact</a>
                </li> --}}

                @if (\Jackiedo\Cart\Facades\Cart::name('shopping')->countItems() > 0)
                    <li>
                        <a href=""><em class="icons-left fas fa-share"></em> Checkout</a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</div>
