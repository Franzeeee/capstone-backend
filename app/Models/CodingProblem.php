<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CodingProblem extends Model
{
    use HasFactory;

    protected $fillable = [
        'activity_id',
        'title',
        'description',
        'sample_input',
        'expected_output',
        'difficulty'
    ];

    public function activity()
    {
        return $this->belongsTo(Activity::class);
    }

    public function codingProblemSubmissions()
    {
        return $this->hasMany(CodingProblemSubmission::class, 'problem_id');
    }
}
