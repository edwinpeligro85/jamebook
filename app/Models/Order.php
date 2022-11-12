<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;

class Order extends Model
{
    use HasFactory, AsSource;

    protected $guarded = [''];

    protected $fillable = [
        'shipping_phone',
        'shipping_firstname',
        'shipping_lastname',
        'shipping_address',
        'shipping_city',
        'shipping_state',
        'shipping_country',

        'tax_total',
        'sub_total',
        'order_total',
        'delivery_total',
        'discount_total',
        'shipping_method',
    ];

    protected $dates = [
        'paid_at',
        'canceld_at',
        'reserved_at',
        'delivered_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function lines()
    {
        return $this->hasMany(OrderLine::class);
    }

    public function scopePaid($query)
    {
        return $query->whereNotNull('paid_at');
    }

    public function getDisplayIdAttribute()
    {
        return '#ORD-' . str_pad($this->id, 4, 0, STR_PAD_LEFT);
    }

    public function getInvoiceReferenceAttribute()
    {
        if ($this->reference) {
            return '#INV-' . str_pad($this->reference, 4, 0, STR_PAD_LEFT);
        }
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
                return 'Cancelado (' . $this->canceld_at . ')';
            case isset($this->delivered_at):
                return 'Entregado (' . $this->delivered_at . ')';
            case isset($this->paid_at):
                return 'Pagado (' . $this->paid_at . ')';
            case isset($this->reserved_at):
                return 'Reservado (' . $this->reserved_at . ')';
            default:
                return 'Pendiente';
        }
    }

    public function getFullNameAttribute()
    {
        return ucwords($this->shipping_firstname . " " . $this->shipping_lastname);
    }

    public function getFullShippingAddressAttribute()
    {
        return ucwords($this->shipping_address . ", " . $this->shipping_city . " - " . $this->shipping_state . ", " . $this->shipping_country);
    }
}
