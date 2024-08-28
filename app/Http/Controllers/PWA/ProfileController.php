<?php

namespace App\Http\Controllers\PWA;

use Illuminate\Http\Request;

use App\Models\Patient;


class ProfileController extends Controller
{

    public function getProfileInfo($patient_id)
    {
        $patientProfile = Patient :: where('id', $patient_id)->first();
        return $this->sendResponse($patientProfile,'Data retrieved successfully');
        
    }


    public function updateProfileInfo(Request $request,$patient_id)
    {
        $input = $request->all();
        $patientProfile = Patient :: where('id',$patient_id)->first();
        $patientProfile->update($input);
        return $this->sendResponse($patientProfile,'Data updated successfully');
        
    }
}