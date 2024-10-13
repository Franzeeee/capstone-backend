<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class CourseClass extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'teacher_id',
        'section',
        'schedule',
        'room',
        'subject',
        'start_date',
        'end_date',
    ];

    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }

    public function students()
    {
        return $this->belongsToMany(User::class, 'class_student', 'course_class_id', 'student_id');
    }

    public function lesson()
    {
        return $this->hasMany(Lesson::class);
    }

    public function classCode()
    {
        return $this->hasOne(ClassCodes::class, 'class_id');
    }

    public function activities()
    {
        return $this->hasMany(Activity::class);
    }

    public function announcements()
    {
        return $this->hasMany(Announcement::class);
    }
}
