<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Partner extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable=['alt','image'];
    public function getPathAttribute()
    {
        return asset('uploads').'/'.$this->image;
    }
}