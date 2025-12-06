<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $fillable = ['day','start_time','end_time','course_id','location'];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
