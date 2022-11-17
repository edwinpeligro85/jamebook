<div @class(['tab-pane fade', 'show active' => $active]) id="orders" role="tabpanel">
    <div class="myaccount-content">
        <h3>Orders</h3>
        <div class="myaccount-table table-responsive text-center">
            @if ($orders->count() > 0)
                <table class="table table-bordered">
                    <thead class="thead-light">
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Total</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <td>{{ $order->display_id }}</td>
                                <td>{{ $order->full_name }}</td>
                                <td>{{ $order->date?->format('M j, Y') }}</td>
                                <td>{{ $order->status }}</td>
                                <td>$@currency($order->total_price)</td>
                                <td class="d-flex flex-column">
                                    <a href="{{ route('order.complete', $order->id) }}" class="btn">View</a>

                                    @if ($order->status == 'Reservado' || $order->status == 'Pagado')
                                        <button type="button" wire:click="cancel({{ $order->id }})"
                                            class="btn btn-danger">Cancelar</button>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div>
                    <p>They don't have orders yet.</p>

                    <a href="{{ route('shop.index') }}" class="btn btn-outline-success">Go shopping</a>
                </div>
            @endif
        </div>
    </div>
</div>
