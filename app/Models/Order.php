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

        'notes',
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

    public function getTotalPriceAttribute()
    {
        return $this->order_total / 100;
    }

    public function getSubTotalPriceAttribute()
    {
        return $this->sub_total / 100;
    }

    public function getStatusAttribute()
    {
        return match (true) {
            isset($this->canceld_at) => 'Cancelado',
            isset($this->delivered_at) => 'Entregado',
            isset($this->paid_at) => 'Pagado',
            isset($this->reserved_at) => 'Reservado',
            default => 'Pendiente',
        };
    }

    public function getStatusWithDateAttribute()
    {
        return $this->status . ' (' . $this->date . ')';
    }

    public function getDateAttribute()
    {
        return match (true) {
            isset($this->canceld_at) => $this->canceld_at,
            isset($this->delivered_at) => $this->delivered_at,
            isset($this->paid_at) => $this->paid_at,
            isset($this->reserved_at) => $this->reserved_at,
            default => $this->created_at,
        };
    }

    public function getFullNameAttribute()
    {
        return ucwords("{$this->shipping_firstname} {$this->shipping_lastname}");
    }

    public function getFullShippingAddressAttribute()
    {
        return ucwords("{$this->shipping_address},
         {$this->shipping_city} - {$this->shipping_state}, {$this->shipping_country}");
    }
}
