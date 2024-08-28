@extends('Layout.Main')
@section('content')
<section class="contact-form-wrap section" style="margin-top:-80px;">
    <div class="container">

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <h2 style="color:rgba(75, 57, 57, 1);margin:auto;font-size:25px;">Your Profile</h2><br>
                <form id="contact-form" class="contact__form " method="post" action="mail.php">
                    @csrf
                    <!-- form message -->

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <input name="name" id="name" type="text" class="form-control"
                                    placeholder="Your First Name">
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <input name="name" id="name" type="text" class="form-control"
                                    placeholder="Your Last Name">
                            </div>
                        </div>

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
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <input name="address" id="address" type="text" class="form-control"
                                    placeholder="Your Address">
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <input name="birthday" id="birthday" type="date" class="form-control"
                                    placeholder="Your Date Of Birth">
                            </div>
                        </div>


                        <div class="col-lg-6">
                            <div class="form-group">
                                <!-- <label class="labels_register" for="jobs">Job</label> -->

                                <select class="form-control" name="work" id="work">
                                    <option value="Job1">Eng</option>
                                    <option value="Job2">accountant</option>
                                    <option value="Job3">Lawyer</option>
                                </select>
                                <!-- <input name="password" id="password" type="password" class="form-control" placeholder="Your Password "> -->
                            </div>
                        </div>


                        <div class="col-lg-6">
                            <div class="form-group">
                                <input name="length" id="length" type="number" class="form-control"
                                    placeholder="Your High">
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <input name="weight" id="weight" type="number" class="form-control"
                                    placeholder="Your Weight">
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <input name="phone_number" id="phone_number" type="number" class="form-control"
                                    placeholder="Your Phone Number">
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <input name="national_number" id="national_number" type="number" class="form-control"
                                    placeholder="Your National Number">
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <!-- <label class="labels_register" for="jobs">Job</label> -->

                                <select class="form-control" name="blood_type" id="blood_type" value="blood_type">
                                    <option value="">Your Blood Type</option>
                                    <option value="O+">O+</option>
                                    <option value="A+">A+</option>
                                    <option value="B+">B+</option>
                                    <option value="AB+">AB+</option>
                                    <option value="O-">O-</option>
                                    <option value="A-">A-</option>
                                    <option value="B-">B-</option>
                                    <option value="AB-">AB-</option>
                                </select>
                                <!-- <input name="password" id="password" type="password" class="form-control" placeholder="Your Password "> -->
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <!-- <label class="labels_register" for="jobs">Job</label> -->

                                <select class="form-control" name="gender" id="gender">
                                    <option value="">Gender</option>
                                    <option value="male">male</option>
                                    <option value="female">female</option>

                                </select>
                                <!-- <input name="password" id="password" type="password" class="form-control" placeholder="Your Password "> -->
                            </div>



                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="labels_register" for="smoked">Smoker:</label><br>
                                    <input class="labels_register" type="radio" id="smoked" name="smoked" value="Yes">
                                    <label for="Yes">Yes</label><br>
                                    <input class="labels_register" type="radio" id="smoked" name="smoked" value="No">
                                    <label for="No">No</label><br>
                                    <!-- <input name="national_number" id="national_number" type="number" class="form-control" placeholder="Your National Number"> -->
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="labels_register" for="alcoholic">Alcoholic:</label><br>
                                    <input class="labels_register" type="radio" id="alcoholic" name="alcoholic"
                                        value="Yes">
                                    <label for="Yes">Yes</label><br>
                                    <input class="labels_register" type="radio" id="alcoholic" name="alcoholic"
                                        value="No">
                                    <label for="No">No</label><br>
                                    <!-- <input name="national_number" id="national_number" type="number" class="form-control" placeholder="Your National Number"> -->
                                </div>
                            </div>

                            <div class="text-center">
                                <input class="btn btn-main btn-round-full" name="submit" type="submit" value="Submit"
                                    style="background-color:rgba(218, 0, 0, 0.99);"></input>
                                <input class="btn btn-main btn-round-full" name="cancel" type="submit" value="Cancel"
                                    style="background-color:rgba(59, 58, 58, 0.99);"></input>
                            </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection