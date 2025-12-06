<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = ['subject','professor','schedule'];

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }
}
