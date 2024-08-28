@extends('Layout.Main')
@section('content')


   
<section >
  <div ></div>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
    <h3 style="color:red">{{$status}}</h3>
      </div>
      <div class="col-lg-8" style="margin-left:5%;">

      <h4 style="color:gray">Descriptions:</h4>
      <p style="color:black">An electric shock occurs when a person comes into contact with an electrical energy source.
                            Electrical energy ﬂows through portion of the body causing a shock. Exposure to electrical energy may result in a lifethreatening situation as there may
                            be damage to internal organs.</p>
          <h4 style="color:gray">Signs & Symptoms:</h4>
          <ul style="color:black">
              <li > Burns, particularly entry and
                                      exit burns where the electricity
                                      entered and left the body which
                                      may be deep</li>

                                      <li style="color:black">Unconsciousness</li>
                                      <li style="color:black"> Not breathing normally</li>
                                      <li style="color:black"> A weak, erratic pulse or
                                       no pulse at all</li>
                                       <li style="color:black">Cardiac arrest</li>



          </ul>
              <h4 style="color:gray">Caused By:</h4>
              <ul style="color:black">
              <li > Electricity (either high voltage
                     or prolonged current) passing through the body</li>




          </ul>
          <br>
          <div style="  margin:auto;width: 50%;margin-left: auto;margin-right: auto;padding-bottom:10%;">
          <a href="{{ route('StatusController.get_instructions')}}" class=" btn btn-main-2 btn-round-full"style="background-color:rgba(218, 0, 0, 0.99);">instructions</a>
           </div>
{{--<!-- {{ route('StatusController.get_instructions')}} -->--}}
            <div>
    </div>
  </div>
</section>
        
@endsection