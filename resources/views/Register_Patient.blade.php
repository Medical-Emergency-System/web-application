@extends('Layout.Main')
@section('content')


<section class="contact-form-wrap section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section-title text-center">
                    <h2 class="text-md mb-2">Register Patient</h2>
                    <div class="divider mx-auto my-4"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <form id="contact-form" class="contact__form " method="post" action="mail.php">
                @csrf
                 <!-- form message -->
                   

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <input name="address" id="address" type="text" class="form-control" placeholder="Your Address" >
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <input name="birthday" id="birthday" type="date" class="form-control" placeholder="Your Date Of Birth">
                            </div>
                        </div>


                        <div class="col-lg-6">
                            <div class="form-group">
                            <!-- <label class="labels_register" for="jobs">Job</label> -->

                              <select class="form-control" name="work" id="work">
                                 <option value="Job1">Job1</option>
                                 <option value="Job2">Job2</option>
                                 <option value="Job3">Job3</option>
                                 <option value="Job4">Job4</option>
                               </select>
                                <!-- <input name="password" id="password" type="password" class="form-control" placeholder="Your Password "> -->
                            </div>
                        </div>


                        <div class="col-lg-6">
                            <div class="form-group">
                                <input name="length" id="length" type="number" class="form-control" placeholder="Your High">
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <input name="weight" id="weight" type="number" class="form-control" placeholder="Your Weight">
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <input name="phone_number" id="phone_number" type="number" class="form-control" placeholder="Your Phone Number">
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <input name="national_number" id="national_number" type="number" class="form-control" placeholder="Your National Number">
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

                              <select class="form-control" name="gender" id="gender" >
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
                            <label  for="No">No</label><br>
                                <!-- <input name="national_number" id="national_number" type="number" class="form-control" placeholder="Your National Number"> -->
                            </div>
                        </div>   
                        
                        <div class="col-lg-6">
                            <div class="form-group">
                            <label class="labels_register" for="alcoholic">Alcoholic:</label><br>
                            <input class="labels_register" type="radio" id="alcoholic" name="alcoholic" value="Yes">
                            <label for="Yes">Yes</label><br>
                            <input class="labels_register" type="radio" id="alcoholic" name="alcoholic" value="No">
                            <label for="No">No</label><br>
                                <!-- <input name="national_number" id="national_number" type="number" class="form-control" placeholder="Your National Number"> -->
                            </div>
                        </div> 
                        
                        
                        <div class="col-lg-6">
                            <div class="form-group">
                            <label class="labels_register" for="allergies">Allergies:</label><br>
                            <input class="labels_register" type="checkbox" id="Pencilline" name="Pencilline" value="Pencilline">
                            <label for="vehicle1"> Pencilline</label><br>
                           
                            </div>
                        </div>


                        <div class="col-lg-6">
                            <div class="form-group">
                            <label class="labels_register" for="Family_histories">Family Histories:</label><br>
                            <input class="labels_register" type="checkbox" id="Diabetes" name="Diabetes" value="Diabetes">
                            <label for="vehicle1"> Diabetes</label><br>
                            
                            </div>
                        </div>
                         

                        <div class="col-lg-6">
                            <div class="form-group">
                            <label class="labels_register" for="illness_histories">Illness Histories:</label><br>
                            <input class="labels_register" type="checkbox" id="Pressure" name="Pressure" value="Pressure">
                            <label for="vehicle1"> Pressure</label><br>
                            
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                            <label class="labels_register" for="surgery_histories">Surgery Histories:</label><br>
                            <input class="labels_register" type="checkbox" id="Pressure" name="Pressure" value="Pressure">
                            <label for="vehicle1"> Pressure</label><br>
                            
                            </div>
                        </div>
                         
                       



                        

                    <div class="text-center">
                    


                        <input class="btn btn-main btn-round-full" name="submit" type="submit" value="Submit" style="background-color:rgba(218, 0, 0, 0.99);"></input>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
    
@endsection