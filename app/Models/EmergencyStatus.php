<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmergencyStatus extends Model
{
    use HasFactory;
    protected $fillable  = ['name','symptoms','reasons','description'];
}
