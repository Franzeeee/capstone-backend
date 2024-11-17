<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivateLogicLesson extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'class_id',
        'status',
        'created_at',
        'updated_at',
    ];

    public function courseClass()
    {
        return $this->belongsTo(CourseClass::class);
    }
}
