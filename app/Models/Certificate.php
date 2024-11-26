<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    use HasFactory;

    protected $fillable = [
        'issue_date',
        'issued_to',
        'teacher_name',
        'class_name',
        'class_id',
    ];

    public function class()
    {
        return $this->belongsTo(CourseClass::class);
    }
}
