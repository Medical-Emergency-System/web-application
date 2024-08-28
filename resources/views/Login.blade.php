@extends('Layout.Main')
@section('content')

<section class="contact-form-wrap section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section-title text-center">
                    <h2 class="text-md mb-2">Login</h2>
                    <div class="divider mx-auto my-4"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <form action="{{route('login')}}" method="POST">
                    @csrf  
                    <!-- form message -->


                    <div class="row">


                        <div class="col-lg-6">
                            <div class="form-group">
                                <input name="email" id="email" type="email" class="form-control"
                                    placeholder="Your Email Address">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <input name="password" id="password" type="password" class="form-control"
                                    placeholder="Your Password ">
                            </div>


                            <div class="form-group col 6">
                                <input class="btn btn-main btn-round-full" name="submit" type="submit" value="Submit"
                                    style="background-color:rgba(218, 0, 0, 0.99);"></input>
                            </div>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection