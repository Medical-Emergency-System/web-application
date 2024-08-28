@extends('Layout.Main')
@section('content')


 

<section>
  
  <div class="container">
     <div class="row">
        <div class="col-lg-4">
        <h3 style="color:red;display:inline;"><strong >Step 5: </strong></h3> 
       <div style="display:inline"> <span style="color:black">Remove any clothing and jewellery from
affected area unless stuck to the burn</span></div>
        <br><br>
        <h3 style="color:red;display:inline;"><strong >Step 6: </strong></h3> 
        <span style="color:black">Cover burnt area with a light non-stick
dressing or clean, dry non-ﬂuffy materia</span>
        <br>
        

        <div style="margin-left:16%;margin-top:5%;display:inline;">
        
         <input style="margin-left:20%;margin-top:5%;"type="radio" id="huey" name="drone" value="huey" checked>
              <label for="huey">Yes</label>
           </div>
           <div style="margin-left:20%;margin-top:5%;display:inline;">
           <input type="radio" id="dewey" name="drone" value="dewey">
           <label for="dewey">No</label>
        </div>

           
          
          <!-- <form method="" action="" style="margin-left:25%;"> -->
							
          <p style="color:black;font-size:140%;"></p>
      
          <div class="text-center">
<div class="div_instractions">
                   <div class="instructions">
                   <a href="/answers">
                      <input class="btn btn-main btn-round-full" name="pervious" type="submit" value="Pervious" style="background-color:rgba(59, 58, 58, 0.99);margin-left:-20%;"></input>
                   </a>
                   </div>

<a >
<input class="btn btn-main btn-round-full" name="next" type="submit" value="Next" style="background-color:rgba(218, 0, 0, 0.99);width:40%;"></input>
</a>
</div>
</div>
        
          <!-- </form>  -->
        </div>
          
				
						{{-- route('StatusController.update',['id'=>$instruction->id])--}}
							
			


      
    </div>

   
  </div>


 
</section>
    
@endsection