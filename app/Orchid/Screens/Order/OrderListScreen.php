<?php

namespace App\Orchid\Screens\Order;

use App\Models\Order;
use App\Orchid\Layouts\Order\OrderListLayout;
use Orchid\Screen\Screen;

class OrderListScreen extends Screen
{
    /**
     * Query data.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'orders' => Order::paginate()
        ];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Lista de Pedidos';
    }

    /**
     * Button commands.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [];
    }

    /**
     * Views.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [
            OrderListLayout::class
        ];
    }
}
