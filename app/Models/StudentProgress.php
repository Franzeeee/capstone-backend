<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentProgress extends Model
{
    use HasFactory;

    protected $fillable = ['student_id', 'course_class_id', 'last_completed_lesson', 'last_completed_quiz'];


    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    public function courseClass()
    {
        return $this->belongsTo(CourseClass::class);
    }
}
