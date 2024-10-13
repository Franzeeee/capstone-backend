<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassCodes extends Model
{
    use HasFactory;

    protected $fillable = ['class_id', 'code'];

    public function courseClass()
    {
        return $this->belongsTo(CourseClass::class, 'class_id');
    }
}
