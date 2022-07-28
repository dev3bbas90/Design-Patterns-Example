<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\SoftDeletes;
class Theater extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable=['name','location','description','image','address'];
    public function halls()
    {
        return $this->hasMany(Hall::class);
    }
    public function events()
    {
       return $this->hasMany(Event::class);
    }
    public function validEvents()
    {
       return $this->hasMany(Event::class)->where('date','>=',date('Y-m-d'));
    }
    public function getPathAttribute()
    {
        return asset('uploads').'/'.$this->image;
    }
    public function getSlugAttribute()
    {
        return str_replace(' ','-',$this->name);
    }
    public function programs()
    {
        return $this->belongsToMany(Program::class,'events','theater_id','program_id')->distinct();
    }
    public function validPrograms()
    {
        return $this->belongsToMany(Program::class,'events','theater_id','program_id')->where('date','>=',date('Y-m-d'))->distinct();
    }
    public function time_frames()
    {
        return $this->hasManyThrough(HallTimeFrame::class,Hall::class);
    }
}
