<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CheatingRecord extends Model
{
    use HasFactory;

    protected $fillable = [
        'submission_id',
        'exit_fullscreen',
        'change_tab',
    ];

    public function submission()
    {
        return $this->belongsTo(Submission::class);
    }
}
