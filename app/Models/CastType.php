<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class CastType extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable=['title'];
    public function casts()
    {
        return $this->hasMany(Cast::class);
    }
}
