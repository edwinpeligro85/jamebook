<div class="checkout-cart-total">
    <h2 class="checkout-title">YOUR ORDER</h2>
    <h4>Product <span>Total</span></h4>
    <ul>
        @foreach ($items as $item)
            <li>
                <span class="left">
                    {{ $item->getTitle() }} X {{ $item->getQuantity() }}
                </span>
                <span class="right">$@currency($item->getPrice())</span>
            </li>
        @endforeach
    </ul>
    <p>Sub Total <span>$@currency($subtotal)</span></p>
    {{-- <p>Shipping Fee <span>$00.00</span></p> --}}
    <h4>Grand Total <span>$@currency($total)</span></h4>
    <div class="method-notice mt--25">
        <article>
            <h3 class="d-none sr-only">blog-article</h3>
            The reservation allows you to set aside the
            cart for 2 days (48 hours), once this time
            is up, the order is cancelled, you can reserve
            by activating the following option.
        </article>
    </div>
    <div class="term-block">
        <input type="checkbox" id="reservation" wire:model="reservation" />
        <label for="reservation">I want to make a reservation</label>
    </div>

    @if (count($items) > 0)
        <button type="submit" wire:loading.attr="disabled" wire:target="reservation" class="place-order w-100">
            Place order
        </button>
    @else
        <p>To place the order, you must have products in the cart.</p>
    @endif
</div>
