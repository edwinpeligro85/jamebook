<?php

namespace App\Console\Commands;

use App\Models\Order;
use Illuminate\Console\Command;

class cancelBookReservations extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'book:cancel-reservation';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Cancela las reservaciones cuya fecha de reserva sea superior a la actual por 48 horas';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $currentDate = now();
        $orders = Order::whereNull('paid_at')
                            ->whereNull('canceld_at')
                            ->whereDate('reserved_at','<=',now()->subDays(2))
                            ->get();
        if ($orders->count()) {
            $orders->each( function($order) use($currentDate) {
                $this->info("Orden #".$order->id." Cancelada!");
                $order->orderLines->each(function($orderLine) use($currentDate) {
                    $orderLine->book->stock += $orderLine->quantity;
                    $orderLine->book->save();
                    $this->line($currentDate." Libro #".$orderLine->book->id." aumenta en stock ".$orderLine->quantity." unidad(es)");
                });
                $order->update(['canceld_at'=>$currentDate]);
            });
        }else{
            $this->line($currentDate." <bg=blue> INFO </> No hay reservaciones para cancelar");
        }
    }
}
