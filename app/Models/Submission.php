<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
    use HasFactory;

    protected $fillable = [
        'activity_id',
        'student_id',
        'score',
        'time_taken',
        'status',
    ];

    public function activity()
    {
        return $this->belongsTo(Activity::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function codingProblemSubmissions()
    {
        return $this->hasMany(CodingProblemSubmission::class);
    }
    public function submissionFiles()
    {
        return $this->hasMany(SubmissionFile::class);
    }

    public function feedback()
    {
        return $this->hasOne(SubmissionFeedback::class);
    }
}
