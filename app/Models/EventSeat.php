<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class EventSeat extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable=['event_id','seat_id','is_reserved','is_blocked'];
    public function seat()
    {
        return $this->belongsTo(Seat::class);
    }
    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
