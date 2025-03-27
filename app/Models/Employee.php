<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Employee extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'id_number',
        'first_name',
        'middle_name',
        'last_name',
        'ext_name',
        'sex',
        'contact_number',
        'email',
        'password',
        'status',
    ];

    public function assessments()
    {
        return $this->hasMany(EmployeeAssessment::class);
    }
    
}
