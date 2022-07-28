<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Seat extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable=['row_id','category_id','code','availability'];
    public function row()
    {
        return $this->belongsTo(Row::class);
    }
    public function hall()
    {
        return $this->hasOneThrough(Hall::class,row::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
