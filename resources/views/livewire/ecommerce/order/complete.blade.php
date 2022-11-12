<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="order-complete-message text-center">
                <h1>Thank you !</h1>
                <p>Your order has been received.</p>
            </div>
            <ul class="order-details-list">
                <li>Order Number: <strong>{{ $order->display_id }}</strong></li>
                <li>Date: <strong>{{ $order->date?->format('F j, Y') }}</strong></li>
                <li>Total: <strong>$@currency($order->total_price)</strong></li>
                <li>Order Status: <strong>{{ $order->status }}</strong></li>
            </ul>
            <p>Pay with cash on delivery.</p>

            <h3 class="order-table-title">Order Details</h3>
            <div class="table-responsive">
                <table class="table order-details-table">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order->lines as $line)
                            <tr>
                                <td>
                                    <a href="{{ $line->book->route }}" target="_blank">{{ $line->title }}</a>
                                    <strong>× {{ $line->quantity }}</strong>
                                </td>
                                <td><span>$@currency($line->total_price)</span></td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Subtotal:</th>
                            <td><span>$@currency($order->sub_total_price)</span></td>
                        </tr>
                        <tr>
                            <th>Payment Method:</th>
                            <td>Cash on Delivery</td>
                        </tr>
                        <tr>
                            <th>Total:</th>
                            <td><span>$@currency($order->total_price)</span></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
