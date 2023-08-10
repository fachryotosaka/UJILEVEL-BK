<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_id',
        'title',
        'description',
        'status',
        'time',
        'date',
        'place',
        'result',
        'career_type',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'archives', 'consultation_id', 'id')
            ->withPivot('student_id', 'teacher_id');
    }


    public function consultationService()
    {
        return $this->belongsTo(ConsultationService::class, 'service_id', 'id');
    }
}
