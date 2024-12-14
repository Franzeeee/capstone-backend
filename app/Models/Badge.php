<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Badge extends Model
{
    use HasFactory;

    protected $fillable = [
        'activity_id',
        'student_id',
        'title',
        'description',
        'badge_type',
    ];

    public function activity()
    {
        return $this->belongsTo(Activity::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
