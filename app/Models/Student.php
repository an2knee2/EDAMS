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
        return $this->hasMany(Assessment::class);
    }
}