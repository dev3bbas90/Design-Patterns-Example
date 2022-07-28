<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class ProgramCast extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable=['cast_id','program_id'];
    public function cast()
    {
        return $this->belongsTo(Cast::class);
    }
    public function program()
    {
        return $this->belongsTo(Program::class);
    }
}
