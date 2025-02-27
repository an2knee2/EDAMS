<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
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

    public function school()
    {
        return $this->belongsTo(School::class);
    }
}
