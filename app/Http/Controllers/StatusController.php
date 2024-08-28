<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmergencyStatus;
use App\Models\EmergencyStatusInstruction;

class StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $statuses = ['Electric Shock', 'Eye injuries' ,'Febrile Convulsions','Fractures','Head injury','Heart Attack',
        'Insect Bites & Stings','Marine Stings','Non-Tropical Jellyfish Stings','Poisoning','Red-Back Spider Bite',
         'seizures and Epilepsy', 'Asthma Attack','Blue Ringed Octupos & Cone Shell Bites','Burns & Scalds',
         'Cold-Induced Condition','Diabets Induced Emergency','Choking Infant','Chocking Adult_Child','Dislocation'
         ];

         $em_statues= EmergencyStatus::get();
        
       
        return view('index',compact('statuses'));
    }


    public function profile(){
        return view('Profile');
    }


    // public function status_details($id){
    //     $status = EmergencyStatus::findOrFail($id);
    //     return view('Status',compact('status'));
    // }

    public function status_details(){
        // $status = EmergencyStatus::findOrFail($id);
        $status ="Electric Shock";
        return view('Status',compact('status'));
    }



    // public function get_instructions($id){
    //     /*
    //     get status instruction from status id and display them and return them to instructions view
    //     */
    //     $status = EmergencyStatus::findOrFail($id);
    //     $instruction = EmergencyStatusInstruction::where('emergency_status_id',$id)->first();
    //     // 'parent_id',
    //     // 'emergency_status_id',
    //     // 'text',
    //     // 'answer',
    //     // 'question'
    //     return view('Instructions',compact('instruction','status'));
    // }

    public function get_instructions(){
        /*
        get status instruction from status id and display them and return them to instructions view
        */
       
        // 'parent_id',
        // 'emergency_status_id',
        // 'text',
        // 'answer',
        // 'question'
        $status = "Electric Shock";
        // $first_text="Check for danger to yourself and bystanders";
        return view('Instructions');
    }

    public function register(){
        return view('Register');

    }
    public function register_patient(){
        return view('Register_Patient');
    }

    public function login(){
        return view('Login');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $illnesses = ['Electric Shock', 'Eye injuries' ,'Febrile Convulsions','Fractures','Head injury','Heart Attack',
                      'Insect Bites & Stings','Marine Stings','Non-Tropical Jellyfish Stings','Poisoning','Red-Back Spider Bite',
                       'seizures and Epilepsy', 'Asthma Attack','Blue Ringed Octupos & Cone Shell Bites','Burns & Scalds',
                       'Cold-Induced Condition','Diabets Induced Emergency','Choking Infant','Chocking Adult_Child','Dislocation'
                       ];

        for($i=0; $i<20; $i++)
        {
            $data = EmergencyStatus::create([
                'name' => $illnesses[$i],
                'symptoms' =>  'sadasdasdasd',
                'reasons' => 'argervwfdadd'
            ]);
            // $data = new Emergency_Status;
           
            // $data->name= '$illnesses[$i]';
            // $data->symptoms = "null";
            // $data->reasons="null";
            // $data->created_at =timestamp;
            // $data->updated_at =timestamp;
            // $data->save();



            // $data->illness = $illnesses[20];
            // $data->heart_rate = (rand(600, 1000) / 10);
            // $data->spo2 = (rand(960, 1000)/10);
            // $data->age = rand(18, 70);
            // $data->gender = $gender[rand(0,4)];
            // $data->height = rand(150,200);
            // $data->weight = rand(50, 150);
            // // if($i>250)
            // //     $data->smoker = rand(0,1);
            // // else
            // //     $data->smoker = 1;
            // $data->smoker = rand(0,1);
            // $data->alcoholic = rand(0,1);
            // $data->pre_ill = $pre_ills[rand(0,7)];
            // $data->transfered = 0;
            // $data->save();

        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        return view('Instructions2');
        
    }

    public function update1(Request $request)
    {
        return view('Instructions3');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function emergencyNumbers(){
        return view('EmergencyNumbers');
    }

    public function contact(){
        return view('Contact');
    }
    public function about(){
        return view('About');
    }
}