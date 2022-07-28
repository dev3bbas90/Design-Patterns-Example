<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class ProgramCategory extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable=['title','description'];
    public function programs()
    {
        return $this->hasMany(Program::class);
    }
    public function latest_programs()
    {
        return $this->programs()->latest()->take(4);
    }

    public function is_deletable(){

        return $this->programs()->count()? false:true;
    }


}
