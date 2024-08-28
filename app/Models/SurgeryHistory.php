<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SurgeryHistory extends Model
{
    use HasFactory;

    public function patient_profiles(){
        
        return $this->morphMany(PatientProfile::class, 'profileable');
    }
}
