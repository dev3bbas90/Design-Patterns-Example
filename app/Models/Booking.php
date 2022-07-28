<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use SimpleSoftwareIO\QrCode\Facades\QrCode;


use Illuminate\Database\Eloquent\SoftDeletes;
class Booking extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable=[
        'event_id',
        'name',
        'phone',
        'email',
        'token'
    ];
    public function event()
    {
        return $this->belongsTo(Event::class);
    }
    public function details()
    {
        return $this->hasMany(BookingDetail::class);
    }
    public function getTotalPriceAttribute()
    {
        return $this->details()->sum('price');
    }
    public function getQRCodeAttribute()
    {
        return QrCode::size(100)->generate($this->token) ;
    }
}
