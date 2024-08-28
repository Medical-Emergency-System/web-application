<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientProfile extends Model
{
    use HasFactory;


    public function profileable(){

        return $this->morphTo();
    }

    public function patient(){

        return $this->belongsTo(Patient::class);
    }

}
