<?php

namespace App\Orchid\Screens\Order;

use App\Models\Order;
use App\Models\OrderLine;
use App\Orchid\Layouts\Order\OrderDetailLayout;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Fields\Group;
use Orchid\Screen\Screen;
use Orchid\Screen\Sight;
use Orchid\Screen\TD;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;
use Orchid\Support\Color;

class OrderDetailScreen extends Screen
{
    public $order;
    /**
     * Query data.
     *
     * @return array
     */
    public function query(Order $order): iterable
    {
        return [
            'order' => $order
        ];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Detalle orden';
    }

    /**
     * Button commands.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Button::make('Pedido Entregado')
                ->method('delivery', [
                    'order' => $this->order
                ])
                ->icon('check')
                ->type(Color::DEFAULT())
                ->canSee($this->order->paid_at && !$this->order->delivered_at),

            Link::make('Atrás')
                ->type(Color::DEFAULT())
                ->icon('action-undo')
                ->route('platform.orders'),
        ];
    }

    /**
     * Views.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [
            Layout::legend('order', [
                Sight::make('fullName', 'Nombre'),
                Sight::make('fullShippingAddress', 'Dirección'),
                Sight::make('shipping_phone', 'Teléfono'),
                Sight::make('statusWithDate', 'Estado')->render(function ($order) {
                    $point = isset($order->paid_at) || isset($order->delivered_at)
                        ? '<i class="text-success">●</i> '
                        : '<i class="text-warning">●</i> ';
                    return $point . $order->statusWithDate;
                }),
                Sight::make('reference', 'Referencia'),
                Sight::make('payment_method', 'Método de Pago'),
                Sight::make('sub_total', 'Subtotal')
                    ->render(fn ($order) => "$ " . number_format($order->sub_total, 0)),
                Sight::make('delivery_total', 'Total Domicilio')
                    ->render(fn ($order) => "$ " . number_format($order->delivery_total, 0)),
                Sight::make('discount_total', 'Total Descuento')
                    ->render(fn ($order) => "$ " . number_format($order->discount_total, 0)),
                Sight::make('tax_total', 'Total Impuesto')
                    ->render(fn ($order) => "$ " . number_format($order->tax_total, 0)),
                Sight::make('order_total', 'Total Factura')
                    ->render(fn ($order) => "$ " . number_format($order->order_total, 0)),
                Sight::make('notes', 'Notas')
            ]),
            Layout::table('order.lines', [
                TD::make('book', 'Libro')
                    ->render(fn (OrderLine $order) => $order->isbn . " - " . $order->title),

                TD::make('quantity', 'Unidades')
                    ->render(fn (OrderLine $order) => $order->quantity),

                TD::make('unit_price', 'Valor Unidad')
                    ->render(fn (OrderLine $order) => "$ " . number_format($order->unit_price, 0)),

                TD::make('discount_total', 'Valor Descuento')
                    ->render(fn (OrderLine $order) => "$ " . number_format($order->discount_total, 0)),

                TD::make('line_total', 'Valor Total')
                    ->render(fn (OrderLine $order) => "$ " . number_format($order->line_total, 0)),
            ])->title("Items")

        ];
    }

    public function delivery(Order $order)
    {
        $order->update(['delivered_at' => now()]);

        Toast::success('Pedido marcado como entregado');

        return redirect()->route('platform.orders');
    }
}
