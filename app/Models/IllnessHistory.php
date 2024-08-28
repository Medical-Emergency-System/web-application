<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IllnessHistory extends Model
{
    use HasFactory;

    public function profiles(){
        
        return $this->morphMany(PatientProfile::class, 'profileable');
    }
}
