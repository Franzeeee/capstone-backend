<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CodingProblemSubmission extends Model
{
    use HasFactory;

    protected $fillable = [
        'submission_id',
        'problem_id',
        'code',
        'score',
    ];

    // Relationship with Submission
    public function submission()
    {
        return $this->belongsTo(Submission::class);
    }

    // Relationship with CodingProblem
    public function codingProblem()
    {
        return $this->belongsTo(CodingProblem::class, 'problem_id');
    }
}
