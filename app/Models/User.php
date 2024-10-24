<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'role'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function courseClasses()
    {
        return $this->hasMany(CourseClass::class, 'teacher_id');
    }

    public function classes()
    {
        return $this->belongsToMany(CourseClass::class, 'class_student', 'student_id', 'course_class_id');
    }

    public function progress()
    {
        return $this->hasMany(StudentProgress::class, 'student_id');
    }
    public function submissions()
    {
        return $this->hasMany(Submission::class);
    }
    public function activities()
    {
        return $this->hasMany(Activity::class);
    }
}
