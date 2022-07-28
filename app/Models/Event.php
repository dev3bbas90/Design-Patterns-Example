<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Event extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable=['hall_time_frame_id','date','theater_id','hall_id','program_id','weekday_price','weekend_price'];
    public function time_frame()
    {
        return $this->belongsTo(HallTimeFrame::class,'hall_time_frame_id');
    }
    public function theater()
    {
        return $this->belongsTo(Theater::class);
    }
    public function hall()
    {
        return $this->belongsTo(Hall::class);
    }
    public function program()
    {
        return $this->belongsTo(Program::class);
    }
    public function seats()
    {
        return $this->hasMany(BookingDetail::class);
        // return $this->belongsToMany(Seat::class,'event_seats','event_id','seat_id')->withPivot(['is_reserved','is_blocked']);
    }
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
    public function isEditable()
    {
        return $this->bookings()->count()? false:true;
    }
}
