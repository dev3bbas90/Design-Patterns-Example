<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Cast extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable=['name','description','image','cast_type_id'];
    public function casttype()
    {
        return $this->belongsTo(CastType::class,'cast_type_id');
    }
    public function programs()
    {
        return $this->belongsToMany(Program::class,'program_casts');
    }
    public function getPathAttribute()
    {
        return asset('uploads').'/'.$this->image;
    }
}
