<?php

namespace App\Models;
use App\Traits\HasSlug;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\SoftDeletes;
class Program extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable =['title','product_house','director','actors' ,'program_category_id' ,'image','description'];
    public function theaters()
    {
        return $this->belongsToMany(Theater::class,'events','program_id','theater_id')->distinct();
    }
    public function halls()
    {
        return $this->belongsToMany(Hall::class,'events','program_id','hall_id');
    }
    public function category()
    {
        return $this->belongsTo(ProgramCategory::class,'program_category_id');
    }
    public function casts()
    {
        return $this->belongsToMany(Cast::class,'program_casts');
    }
    public function getPathAttribute()
    {
        return asset('uploads').'/'.$this->image;
    }
    public function getSlugAttribute()
    {
        return str_replace(' ','-',$this->title);
    }
    public function events()
    {
        return $this->hasMany(Event::class);
    }
}
