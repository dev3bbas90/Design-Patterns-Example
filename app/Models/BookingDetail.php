<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use SimpleSoftwareIO\QrCode\Facades\QrCode;
class BookingDetail extends Model
{
    use HasFactory;
    protected $fillable=[
        'seat_id',
        'event_id',
        'booking_id',
        'code',
        'price',
        'token',
    ];
    public function seat()
    {
        return $this->belongsTo(Seat::class);
    }
    public function event()
    {
        return $this->belongsTo(Event::class);
    }
    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }
    public function getQRCodeAttribute()
    {
        return QrCode::size(100)->generate($this->token) ;
    }
}
