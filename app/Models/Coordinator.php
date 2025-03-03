<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coordinator extends Model
{
    protected $fillable = [
        'id_number', 'first_name', 'middle_name', 'last_name', 'ext_name', 'sex', 'school_id', 'contact_number', 'email', 'password', 'status'
    ];

    public function school()
    {
        return $this->belongsTo(School::class, 'school_id');
    }
}
