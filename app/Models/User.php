<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Models\Classroom;
use App\Http\Traits\ProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, ProfilePhoto;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
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

    public function classroom()
    {
        return $this->belongsTo(Classroom::class);
    }

    public function consultations()
    {
        return $this->belongsToMany(Consultation::class, 'archives', 'student_id', 'id')
            ->withPivot('consultation_id','teacher_id');
    }

    public function teacherConsultations()
    {
        return $this->belongsToMany(Consultation::class, 'archives', 'teacher_id', 'id')
            ->withPivot('consultation_id','student_id');
    }

    public function vulnerabilities()
    {
        return $this->belongsToMany(Vulnerability::class, 'student_vulnerability', 'student_id', 'vulnerability_id');
    }
}
