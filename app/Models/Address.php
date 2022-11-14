<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'firstname',
        'lastname',
        'address',
        'city',
        'state',
        'phone',
        'email',
        'country',
        'delivery_instructions',
    ];

    protected $dates = [
        'last_used_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getFullNameAttribute()
    {
        return ucwords("{$this->firstname} {$this->lastname}");
    }

    public function getFullAddressAttribute()
    {
        return ucwords("{$this->address}, {$this->city} - {$this->state}, {$this->country}");
    }

    public function getPhoneCodeAttribute()
    {
        return Country::whereName($this->country)->first()?->phonecode ?? 0;
    }
}
