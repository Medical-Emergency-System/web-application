<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ambulance extends Model
{
    use HasFactory;

    public function medical_center(){

        return $this->belongsTo(MedicalCenter::class);
    }

    public function scopeByOwner($query)
    {
        if (auth()->user()->role_id == 4) {
            $medicalCenter = auth()->user()->medical_center->id;
            return $query->where('medical_center_id', $medicalCenter);
        } 
    }
}
