<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubmissionFeedback extends Model
{
    use HasFactory;

    protected $fillable = [
        'submission_id',
        'feedback',
    ];

    public function submission()
    {
        return $this->belongsTo(Submission::class);
    }
}
