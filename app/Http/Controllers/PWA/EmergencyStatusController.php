<?php

namespace App\Http\Controllers\PWA;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\EmergencyStatus;
use App\Models\EmergencyStatusInstruction;


class EmergencyStatusController extends Controller
{

    public function getEmergencyStatus()
    {
        $emergencyStatus = EmergencyStatus :: get();
        return view('index',['emergencyStatus'=>$emergencyStatus]);
    }


    public function getEmergencyStatusDetails(Request $request,$statusDetails)
    {
        $emergencyStatusDetails = EmergencyStatus :: where('id',$statusDetails)->first();
        return view('statusDetails',['emergencyStatusDetails'=>$emergencyStatusDetails]);
    }
    public function getEmergencyStatusInstructions($emergency_status_id)
    {
        $emergencyStatusInstructions= EmergencyStatusInstruction :: where('emergency_status_id',$emergency_status_id)->get();
        // dd($emergencyStatusInstructions);
        return view('instructions',['emergencyStatusInstructions'=>$emergencyStatusInstructions]);
    }

    public function getInstructionChilds(Request $request)
    {

        $emergencyStatusInstructions= EmergencyStatusInstruction :: where('emergency_status_id',$request->emergency_status_id)->get()->pluck('parent_id')->toArray();

        if(in_array($request->id, $emergencyStatusInstructions)){
            $step = EmergencyStatusInstruction :: select('text')->where('id',$request->id)->first();
            $childs = EmergencyStatusInstruction :: where('parent_id',$request->id)->get();
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
