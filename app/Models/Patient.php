<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
    protected $fillable = ['full_name','address','birthday','work','length','weight','phone_number','national_number','blood_type','gender','bmi','smoked','alcoholic']; 


    public function job(){

        return $this->belongsTo(Job::class);
    }

    public function vital_indicators(){

        return $this->hasMany(VitalIndicators::class);
    }

    public function patient_profile(){

        return $this->hasMany(VitalIndicators::class);
    }

    public function emergency_status_instructions(){

        return $this->belongsToMany(EmergencyStatusInstruction::class, 'records', 'patient_id', 'emergency_status_instruction_id');
    }

    public function medical_centers(){
        
        return $this->belongsToMany(MedicalCenter::class, 'orders', 'patient_id', 'medical_center_id');
    }

    public function user(){

        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
