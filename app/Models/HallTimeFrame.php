<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class HallTimeFrame extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable=['from','to','hall_id'];

    public function hall()
    {
        return $this->belongsTo(Hall::class);
    }
    public function events()
    {
        return $this->hasMany(Event::class);
    }
    public function isEditable()
    {
        return $this->events()->count()? false:true;
    }
    public function getFromAttribute()
    {
        $carbon=  new Carbon($this->attributes['from']);
        return $carbon->format('h:i a');
    }
    public function getToAttribute()
    {
        $carbon=  new Carbon($this->attributes['to']);
        return $carbon->format('h:i a');
    }

}
