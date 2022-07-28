<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Row extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable=['hall_id','code','seats_no'];
    public function hall()
    {
        return $this->belongsTo(Hall::class);
    }
    public function seats()
    {
        return $this->hasMany(Seat::class);
    }
}
