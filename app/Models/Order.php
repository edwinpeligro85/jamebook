<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function scopePaid($query)
    {
        return $query->whereNotNull('paid_at');
    }

    public function getStatusAttribute()
    {
        switch (true) {
            case isset($this->canceld_at):
                return 'Cancelado';
            case isset($this->paid_at):
                return 'Pagado';
            case isset($this->delivered_at):
                return 'Entregado';
            case isset($this->reserved_at):
                return 'Reservado';
            default:
                return 'Pendiente';
        }
    }
}
