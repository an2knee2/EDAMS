<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Program extends Model {
    protected $fillable = ['program_name', 'school_id'];

    public function school() {
        return $this->belongsTo(School::class);
    }
}
