<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class School extends Model {
    protected $fillable = ['school_name'];

    public function programs() {
        return $this->hasMany(Program::class);
    }
}