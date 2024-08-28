<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;

use App\Models\EmergencyStatus;
use App\Models\EmergencyStatusInstruction;


class EmergencyStatusController extends BaseController
{

    public function getEmergencyStatus()
    {
        $emergencyStatus = EmergencyStatus :: get();
        return $this->sendResponse($emergencyStatus,'Data retrieved successfully');
    }

    public function getEmergencyStatusInstructions($emergency_status_id)
    {
        $emergencyStatusInstructions= EmergencyStatusInstruction :: where('emergency_status_id',$emergency_status_id)->get();
        return $this->sendResponse($emergencyStatusInstructions,'Data retrieved successfully');
    }

    public function getInstructionChilds(Request $request)
    {

        $emergencyStatusInstructions= EmergencyStatusInstruction :: where('emergency_status_id',$request->emergency_status_id)->get()->pluck('parent_id')->toArray();

        if(in_array($request->id, $emergencyStatusInstructions)){
            $step = EmergencyStatusInstruction :: select('text')->where('id',$request->id)->first();
            $childs = EmergencyStatusInstruction :: select('id','text')->where('parent_id',$request->id)->get();
            $data = [
                 'step' =>$step,
                 'childs' => $childs,
                
        ];
            return $this->sendResponse($data,'Data retrieved successfully');
        }

        else {
            $childs = [];
            return $this->sendResponse($childs,'No data available');
        }
    }

}