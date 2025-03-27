<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Student extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'id_number',
        'first_name',
        'middle_name',
        'last_name',
        'ext_name',
        'sex',
        'school_id',
        'program_id',
        'contact_number',
        'email',
        'password',
        'status',
    ];

    public function assessments()
    {
        return $this->hasMany(StudentAssessment::class);
    }

    public function school()
    {
        return $this->belongsTo(School::class, 'school_id');
    }

    public function program()
    {
        return $this->belongsTo(Program::class, 'program_id');
    }

    public static function getAllSchoolsAndPrograms()
    {
        $schools = School::all();
        $programs = Program::all();
        return compact('schools', 'programs');
    }
}