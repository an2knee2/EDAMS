<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentAssessment extends Model
{
    use HasFactory;

    protected $table = 'student_assessments'; // Ensure this matches the table name in the database

    protected $fillable = [
        'student_id', 'fullname', 'school_id', 'program_id', 'score', 'status',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
