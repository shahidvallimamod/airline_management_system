<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function boughtTickets()
    {
        return $this->hasMany(Ticket::class);
    }

    public function airline()
    {
        return $this->belongsTo(Airline::class);
    }

    public function fromAirport()
    {
        return $this->belongsTo(Airport::class,'from_airport');
    }

    public function toAirport()
    {
        return $this->belongsTo(Airport::class,'to_airport');
    }
}
