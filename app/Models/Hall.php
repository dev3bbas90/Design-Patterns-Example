<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Hall extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable=['theater_id','code','rows_no','cols_no'];
    public function theater()
    {
        return $this->belongsTo(Theater::class);
    }
    public function rows()
    {
        return $this->hasMany(Row::class);
    }
    public function seats()
    {
        return $this->hasManyThrough(Seat::class,Row::class);
    }
    public function time_frames()
    {
        return $this->hasMany(HallTimeFrame::class);
    }
    public function programs()
    {
        return $this->belongsToMany(Program::class,'events','hall_id','program_id');
    }
    public function events()
    {
        return $this->hasMany(Event::class);
    }
    public function attributes()
    {
        return $this->hasMany(hallAttribute::class);
    }
}
