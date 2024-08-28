@extends('Layout.Main')
@section('content')
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 style="color:red">{{$emergencyStatusDetails->name}}</h3>
            </div>
            <div class="col-lg-8" style="margin-left:5%;">
                <h4 style="color:gray">Descriptions:</h4>
                <p style="color:black">{{$emergencyStatusDetails->description}}</p>
                <h4 style="color:gray">Signs & Symptoms:</h4>
                <div style="color:black">
                    {!!$emergencyStatusDetails->symptoms!!}
                </div>
                <h4 style="color:gray">Caused By:</h4>
                <div style="color:black">
                    {!!$emergencyStatusDetails->reasons!!}
                </div>
                <br>
                <div style="  margin:auto;width: 50%;margin-left: auto;margin-right: auto;padding-bottom:10%;">
                    <a href="{{ route('getEmergencyStatusInstructions',['emergency_status_id'=>$emergencyStatusDetails->id])}}" class=" btn btn-main-2 btn-round-full"
                        style="background-color:rgba(218, 0, 0, 0.99);">instructions</a>
                </div>
                <div>
                </div>
            </div>
</section>

@endsection
