<?php

namespace App\Orchid\Layouts\Order;

use App\Models\Order;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class OrderListLayout extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'orders';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): iterable
    {
        return [
            TD::make('reference', 'Referencia')
                ->render(function (Order $order) {
                return $order->reference;
                }),

            TD::make('name', 'Cliente')
                ->render(fn (Order $order) => $order->fullName ),

            TD::make('status', 'Estado')
                ->render(fn (Order $order) => $order->status ),

            TD::make('order_total', 'Total')
                ->render(function (Order $order) {
                return $order->order_total;
                }),

            TD::make('Acciones')
                ->align(TD::ALIGN_CENTER)
                ->width('100px')
                ->render(function (Order $order) {
                    return DropDown::make()
                        ->icon('options-vertical')
                        ->list([
                            Link::make('Ver detalle')
                                ->route('platform.orders.detail', $order->id)
                                ->icon('eye')
                        ]);
                }),
        ];
    }
}
