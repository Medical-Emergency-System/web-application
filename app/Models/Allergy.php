<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Allergy extends Model
{
    use HasFactory;

    public function patient_profiles(){
        
        return $this->morphMany(App\Models\PatientProfile, 'profileable');
    }
}
