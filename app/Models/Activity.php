<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_class_id',
        'user_id',
        'title',
        'description',
        'default',
        'lessonId',
        'final_assessment',
        'manual_checking',
        'time_limit',
        'point',
        'dueReminder',
        'start_date',
        'end_date',
    ];

    public function courseClass()
    {
        return $this->belongsTo(CourseClass::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function submissions()
    {
        return $this->hasMany(Submission::class);
    }

    public function codingProblems()
    {
        return $this->hasMany(CodingProblem::class);
    }
    public function activityFiles()
    {
        return $this->hasMany(ActivityFile::class);
    }
    public function badges()
    {
        return $this->hasMany(Badge::class, 'activity_id');
    }
}
