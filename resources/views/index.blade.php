@extends('Layout.Main')
@section('content')

<section>
  <div class="container">
    <div div class="row">
      <div class="col-md-12">
        <h3 style="color:red">LIFE THREATENING</h3>
      </div>
      <a href="#" style=" margin-top:1%;margin-bottom:10%;background-color:red;"
        class="btn btn-main-2 btn-round-full">Call Ambulance</a>
    </div>
  </div>
</section>

<section class="section service-2" style="margin-top:-10%;">
  <div class="container">
    <div class="row">
      @foreach($emergencyStatus as $emergency)
      <div class="col-lg-4 col-md-6 col-sm-6">
        <a href="{{ route('statusDetails',['statusID'=>$emergency->id])}}">
          <div class="service-block">
            <div class="content">
              <img src="{{ asset('images/icons/'.$emergency->name.'.png')}}" class="img-icon">
              <h4 class="mt-4 mb-2 title-color">{{$emergency->name}}</h4>
            </div>
          </div>
        </a>
      </div>
      @endforeach




    </div>
  </div>
</section>




@endsection
