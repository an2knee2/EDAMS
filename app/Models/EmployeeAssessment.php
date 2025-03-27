<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeAssessment extends Model
{
    use HasFactory;

    protected $table = 'employee_assessments'; // Ensure this matches the table name in the database

    protected $fillable = [
        'employee_id', 'fullname', 'score', 'status',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
