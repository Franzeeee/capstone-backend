<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    public function courseClass()
    {
        return $this->belongsTo(CourseClass::class);
    }

    public function submissions()
    {
        return $this->hasMany(Submission::class);
    }
}
