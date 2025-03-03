<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Counselor extends Model
{
    protected $fillable = [
        'id_number', 'first_name', 'middle_name', 'last_name', 'ext_name', 'sex', 'contact_number', 'email', 'password', 'status'
    ];

    protected $hidden = [
        'password',
    ];
}
