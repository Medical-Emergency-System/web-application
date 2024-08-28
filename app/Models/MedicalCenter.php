<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;
class MedicalCenter extends Model
{
    use HasFactory;

    public function Ambulance(){

        return $this->hasMany(Ambulance::class);
    }

    public function patients(){

        return $this->belongsToMany(Patient::class, 'orders','medical_center_id','patient_id');
    }

    public function location(){

        return $this->belongsTo(Location::class);
    }

    public function user(){

        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function scopeMedicalCenterList($query)
    {
        if (Auth::user()->role_id == 4) {
            return $query->where('user_id', Auth::user()->id);
        }
    }
}
