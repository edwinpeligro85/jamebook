<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderLine extends Model
{
    use HasFactory;

    protected $fillable = [
        'book_id',
        'isbn',
        'title',
        'quantity',
        'unit_price',
        'line_total',
    ];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function getTotalPriceAttribute()
    {
        return $this->line_total / 100;
    }
}
