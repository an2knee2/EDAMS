<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assessment extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id', 'fullname', 'school_id', 'program_id', 'score', 'status',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
