<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityFile extends Model
{
    use HasFactory;

    protected $fillable = [
        'activity_id',
        'file_path',
        'file_name',
        'file_type',
    ];

    public function activity()
    {
        return $this->belongsTo(Activity::class);
    }
}
