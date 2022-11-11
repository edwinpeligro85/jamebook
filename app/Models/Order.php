<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;

class Order extends Model
{
    use HasFactory,AsSource;

    protected $guarded = [''];

    public function orderLines()
    {
        return $this->hasMany(OrderLine::class);
    }

    public function scopePaid($query)
    {
        return $query->whereNotNull('paid_at');
    }

    public function getStatusAttribute()
    {
        switch (true) {
            case isset($this->canceld_at):
                return 'Cancelado';
            case isset($this->delivered_at):
                return 'Entregado';
            case isset($this->paid_at):
                return 'Pagado';
            case isset($this->reserved_at):
                return 'Reservado';
            default:
                return 'Pendiente';
        }
    }

    public function getStatusWithDateAttribute()
    {
        switch (true) {
            case isset($this->canceld_at):
                return 'Cancelado ('.$this->canceld_at.')';
            case isset($this->delivered_at):
                return 'Entregado ('.$this->delivered_at.')';
            case isset($this->paid_at):
                return 'Pagado ('.$this->paid_at.')';
            case isset($this->reserved_at):
                return 'Reservado ('.$this->reserved_at.')';
            default:
                return 'Pendiente';
        }
    }

    public function getFullNameAttribute()
    {
        return ucwords($this->shipping_firstname." ".$this->shipping_lastname);
    }

    public function getFullShippingAddressAttribute()
    {
        return ucwords($this->shipping_address.", ".$this->shipping_city." - ". $this->shipping_state.", ". $this->shipping_country);
    }
}
