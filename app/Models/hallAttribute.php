<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hallAttribute extends Model
{
    use HasFactory;
    protected $fillable=['hall_id','type','category_id','selection_type','selection_value','selection_attribute','from','to','single'];
    public function hall()
    {
        return $this->belongsTo(Hall::class);
    }
}
