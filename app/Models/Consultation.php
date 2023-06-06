<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'time',
        'date',
        'place',
        'result',
    ];


    public function users()
    {
        return $this->belongsToMany(User::class, 'archives', 'consultation_id', 'id')
            ->withPivot('student_id', 'teacher_id');
    }
}
