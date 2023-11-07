<!DOCTYPE html>
<html lang="en">
<head> 
  <title>Aroma Matrimony</title>
	<meta charset="utf-8">
	
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="<?php echo base_url();?>css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
</head>
<body>
<!--<div class="row" style="background-color:red; color:white; padding:15px;">Site Under Alpha Testing... Minor Errors Expected! Working Towards Perfection...</div>-->
<?php
header('Access-Control-Allow-Origin: https://www.aromamatrimony.com');
$profile_name = $this->session->userdata('name');	
?>
<style>
	.btnotp {
		background-color: #cecece;
		color: #000;
		border: none;
		padding: 5px 30px;
		font-size: 14px;
		cursor: pointer;
}
.btn_cascade{
	
	margin-top:10px;
	margin-bottom:10px;
}

.modal {
  overflow-y:auto;
}
</style>
  <div class="modal fade" id="ModalSuccess" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close btnclosemodal" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <p id = "pSuccess" >Some text in the modal.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default btnclosemodal" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
<header id="header">
  <div class="container">
     <nav class="navbar navbar-expand-md navbar-light">
				<input type = "hidden" name = "reset_profile" id ="reset_profile"  value=""> 

                <a class="navbar-brand" href="<?= base_url(); ?>"><img src="<?php echo base_url();?>images/logo.png"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
					<?php if(isset($profile_name) ){?>
						<div class="loginregister">
						<p><?php echo $profile_name;?> <a href = "#" class="regbtn" onclick ="logout()">Logout</a><!-- or <a data-toggle="modal" data-target="#reg" class="regbtn" href="#">Register</a>--></p>
						</div>
					<?php } else{ ?>
						<div class="loginregister">
						<p>Already a Member? <a class="loginbtn" href = "#" data-toggle="modal" data-target="#login">Login</a> or <a data-toggle="modal" data-target="#reg" class="regbtn" href="#">Register</a></p>
						</div>
					<?php } ?>
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            <a class="nav-link" href="<?php echo base_url();?>">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url();?>profile/searchprofile">Search</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url();?>profile/upgradepackage">Premium Member</a>
                        </li>
                    </ul>
                </div>
            </nav>
  </div>
</header>
<!-- Share Profile Box Start-->
<style>
	#copyTarget{
		box-sizing: border-box;
		border: 2px solid #ccc;
		border-radius: 4px;
		font-size: 16px;
		background-color: white;
		background-position: 10px 12px; 
		background-repeat: no-repeat;
		padding: 12px 20px 12px 4px;
		transition: width 0.4s ease-in-out;
}
	#copyButton{
		background-color:green;
		color:white;
	}
</style>
<div class="modal fade" id="shareprofile" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
         <div class="row modal-body">
				<input style = "width:85%" type="text" id="copyTarget" value="Text to Copy"> <button style = "width:14%" id="copyButton">Copy</button><br><br>
         </div>
    </div>
  </div>
</div>
<!-- End -->

<!-- Login Box Start-->
<div class="modal fade" id="login" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
         <div class="row modal-body">
           <div class="col-md-4">
             <div class="discover">
               <img style="width:100%;" src="<?php echo base_url();?>images/aromalogin.jpg">
             </div>
           </div>
           <div class="col-md-8">
             <div class="modal_form">
               <form>
                 <label style="margin-top:20px; font-size:12px;">Email</label>
                 <input data-validation = "required"  type="login_email" id="login_email" style ="height:40px; margin-top:5px;" name="login_email" placeholder="Email">
                 <label style="margin-top:20px; font-size:12px;">Password</label>
                 <input data-validation = "required" type="login_password" id="login_password" style ="height:40px; margin-top:5px;"  name="login_password" placeholder="Password"><br />
				 <span style ="color:red" id ="span_login"></span><br />
                <button class="login_b" type="button">Login</button><br /> <a style ="color:#666; font-size:12px;" href="#" data-dismiss="modal" data-toggle="modal" data-target="#reset_cascade_one">Forgot Password ?</a><br />

                 <p style ="color:#666; font-size:12px;">Not a Member Yet? <a style ="color:#666; font-size:12px;" href="#" data-toggle="modal" data-target="#reg" data-dismiss="modal" class="reg">Register Now</a></p>
                 
               </form>
             </div>
           </div>
         </div>
    </div>
  </div>
</div>
<!-- End -->


<!-- Login Box Start-->
<div class="modal fade" id="reset_cascade_one" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
         <div class="row modal-body">
           <div class="col-md-4">
             <div class="discover">
               <img style="width:100%;" src="<?php echo base_url();?>images/aromalogin.jpg">
             </div>
           </div>
           <div class="col-md-8">
             <div class="modal_form">
               <form>
                 <label style="margin-top:20px; font-size:12px;">Enter Your Email or Mobile Number</label>
                 <input data-validation = "required"  type="login_email" id="reset_media" style ="height:40px; margin-top:5px;" name="reset_media" placeholder="Username/Email">
				
				<span id = "span_cascade_one" style = "color:red" ></span>
                <button class="btn_cascade_one btn_cascade" type="button">Reset Password</button>
				
                 <p style ="color:#666; font-size:12px;">Not a Member Yet? <a style ="color:#666; font-size:12px;" href="#" data-toggle="modal" data-target="#reg" data-dismiss="modal" class="reg">Register Now</a></p>
                 
               </form>
             </div>
           </div>
         </div>
    </div>
  </div>
</div>
<!-- End -->

<!-- Login Box Start-->
<div class="modal fade" id="reset_cascade_two" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
         <div class="row modal-body">
           <div class="col-md-4">
             <div class="discover">
               <img style="width:100%;" src="<?php echo base_url();?>images/aromalogin.jpg">
             </div>
           </div>
           <div class="col-md-8">
             <div class="modal_form">
               <form>
                 <label style="margin-top:20px; font-size:12px;">Enter Otp</label>
                 <input data-validation = "required"  type="login_email" id="reset_otp" style ="height:40px; margin-top:5px;" name="reset_otp" placeholder="Otp">
				<span id = "span_cascade_two" style = "color:red" ></span>
                <button class="btn_cascade_two btn_cascade" type="button">Verify Otp</button>
				
                 <p style ="color:#666; font-size:12px;">Not a Member Yet? <a style ="color:#666; font-size:12px;" href="#" data-toggle="modal" data-target="#reg" data-dismiss="modal" class="reg">Register Now</a></p>
                 
               </form>
             </div>
           </div>
         </div>
    </div>
  </div>
</div>
<!-- End -->

<!-- Login Box Start-->
<div class="modal fade" id="reset_cascade_three" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
         <div class="row modal-body">
           <div class="col-md-4">
             <div class="discover">
               <img style="width:100%;" src="<?php echo base_url();?>images/aromalogin.jpg">
             </div>
           </div>
           <div class="col-md-8">
             <div class="modal_form">
               <form>
                 <label style="margin-top:20px; font-size:12px;">Create new Password</label>
                 <input data-validation = "required"  type="password" id="new_password" style ="height:40px; margin-top:5px;" name="new_password" placeholder="Password">
					<!--<br />[5  which contain only characters, numeric digits, underscore and first character must be a letter]-->
			<span id = "span_cascade_three" style = "color:red" ></span>
                <button class="btn_cascade_three btn_cascade" type="button">Reset Password</button>
				
                 <p style ="color:#666; font-size:12px;">Not a Member Yet? <a style ="color:#666; font-size:12px;" href="#" data-toggle="modal" data-target="#reg" data-dismiss="modal" class="reg">Register Now</a></p>
                 
               </form>
             </div>
           </div>
         </div>
    </div>
  </div>
</div>
<!-- End -->


<div class="modal fade" id="reg" role="dialog">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
         <div class="row modal-body">
           <div class="col-md-12">
             <div class="discover">
               <h1>Build Your Profile</h1>
             </div>
           </div>
           <div class="col-md-12">
               <div class="modal_form">
              <form method="post" name = "profile_form" id ="profile_form" enctype='multipart/form-data' class="form-horizontal">
             <input type ="hidden" name ="profile_form_status" value= "0"/>
             <input type = "file" name ="p_image" id ="p_image" style ="display:none"/>
           </form>
               <form id="regForm" action="google.com">
                  <!-- One "tab" for each step in the form: -->
                   <div class="tab">
                     <h3>Personal Information</h3>
        
                     <div class="form-group">
                       <label>Profile Created For</label>
                        <input type ="hidden" name ="profile_id" id="profile_id" value ="0" >
                       <select name="profile_for" id="profile_for" class="form-control">
                         <option value= "Myself" >Myself</option>
                         <option value = "Son">Son</option>
                         <option value = "Daughter">Daughter</option>
                         <option value = "Brother">Brother</option>
                         <option value = "Sister">Sister</option>
                         <option value = "Relative">Relative</option>
                         <option value = "Friend">Friend</option>
                       </select>
                     </div>
                     <div class="form-group">
                       <label>Name</label>
                       
                      <input type="text" data-validation = "required" name="profile_name" id ="profile_name">
                     </div>
					  <div class="form-group">
                       <label>Date of Birth</label>
                       <input data-validation = "required" class = "dob"  type="text" name="dob" id ="dob">
                     </div>
                     <div class="form-group">
                       <label>Age</label>
                       <input data-validation = "required"  type="number" name="age" id ="age">
                     </div>
                     <div class="form-group">
                       <label>Height <span style="font-size:12px">(in Cm)</span></label>
                       <input  type="number" name="height" id ="height">
                     </div>
                     <div class="form-group">
                       <label>Weight <span style="font-size:12px">(in Kg)</span></label>
                       <input data-validation = "required"  type="number" name="weight" id ="weight">
                     </div>
                     <div class="form-group">
                       <label>Physical Status</label>
                       <select name="physical" id="physical" class="form-control">
                         <option value= "Normal">Normal</option>
                         <option value = "Physically Challenged">Physically Challenged</option>
                       </select>
                     </div>
                     <div class="form-group">
          
                        <label for="">Mother Tongue</label>
                        <select name="mother" id="mother" class="form-control">
                            <option value="">Select </option>
                            
                        </select>
                        
                



                     </div>
					 <div class="form-group">
                       <label>Known Language</label>
                       <input type="text" name="known_language" id="known_language">
                     </div>

                     <div class="form-group">
                       <label>Marital Status</label>
                       <select name="marital" id="marital" class="form-control">
                         <option value = "Unmarried" >Unmarried</option>
                         <option value = "Widow">Widow</option>
                         <option value ="Widower" >Widower</option>
						  <option value = "Divorce" >Divorce</option>
                         <option value = "Separated">Separated</option>
							 
                       </select>
                     </div>
                     <div class="form-group">
                       <label>Gender</label>
                       <select name="gender" id="gender" class="form-control">
                         <option value= "Male" >Male</option>
                         <option value= "Female">Female</option>
                         
                       </select>
                     </div>
					 
					  <div class="form-group">
                       <label>Employed In</label>
                       <select name="employed_in" id="employed_in" class="form-control">
                           <option value ="">Select</option>
                         <option value ="defence" >Defence</option>
                         <option value ="govt sector" >Govt Sector </option>
                         <option value ="public sector" >Public Sector</option>
                         <option value ="private sector" >Private Sector</option>
                         <option value ="business" >Business</option>
                         <option value ="self employed" >Self employed</option>
						  <option value ="social media" >Social media </option>
                         <option value ="political" >Political</option>
                         <option value ="mission" >Mission</option>
                         <option value ="sports" >Sports</option>
                         <option value ="arts" >Arts</option>
                         <option value ="not working" >Not working</option>
                         <option value ="other" >Other</option>
                       </select>
                     </div>
					 <div class="form-group">
                       <label>Highest Education</label>
                       <select name="highest_education" id="highest_education" class="form-control">
                         <option value ="">Select</option>
                        
                       </select>
                     </div>
					  <div class="form-group">
                       <label>Occupation</label>
                       <select type="text" name="occupation" id ="occupation">
					   </select>
                     </div>
					 
					 <div class="form-group">
                       <label>Monthly  Income</label>
                       <select name="income" id="income" class="form-control">
                        <option  >Select Income</option>
                        <option value = "No Income" >No Income</option>
                        <option value = "1000-5000" >1000-5000</option>
                         <option value = "5000-10000" >5000-10000</option>
                         <option value = "10000-15000" >10000-15000</option>
                         <option value = "15000-25000" >15000-25000</option>
                         <option value = "25000-35000" >25000-35000</option>
                         <option value = "35000-45000" >35000-45000</option>
                         <option value = "45000-55000" >45000-55000</option>
                         <option value = "55000-65000" >55000-65000</option>
                         <option value = "65000-75000" >65000-75000</option>
                         <option value = "75000-85000" >75000-85000</option>
                         <option value = "85000-95000" >85000-95000</option>
                         <option value = "95000-1,05,000" >95000-1,05,000</option>
                         <option value = "1,05,000-and above" >1,05,000-and above</option>
                       </select>
                     </div>

                     <h3>Contact Information</h3>
                    
                     <div class="form-group">
                       <label>Address 1</label>
                       <input type="text" name="address_1" id ="address_1">
                     </div>
                     <div class="form-group">
                       <label>Address 2</label>
                       <input type="text" name="address_2" id ="address_2">
                     </div>

                    <div class="form-group">
                       <label>City</label>
                       
                       <input type = "text"  name="t_city" id="t_city" class="form-control" />
                        
                     </div>
					<div class="form-group">
                       <label>Country</label>
                      
                       <select name="t_country" id="t_country" class="form-control">
                         <option value="">Select Country</option>
                       </select>
                     </div>
					 <div class="form-group">
                       <label>State</label>
                    
                       <select name="t_state" id="t_state" class="form-control">
                         <option value="">Select State</option>
                       </select>
                     </div>
                     <div class="form-group">
                       <label>District</label>
                       
                       <select name="t_district" id="t_district" class="form-control">
                         <option value="">Select District</option>
                       </select>
                     </div>
                     
                     
					  
                     
                     <div class="form-group">
                       <label>WhatsApp Number</label>
                       <input type="number" name="whatsapp" id ="whatsapp">
                     </div>
					 
                     
					<h3>Current Location</h3>
                     <div class="form-group">
                       <label>Country (Present)</label>
                       <select name="country" id="country" class="form-control">
                         <option value="">Select country</option>
                       </select>
                     </div>
                     <div class="form-group">
                       <label>State</label>
                       <select name="state" id="state" class="form-control">
                         <option value="">Select state</option>
                       </select>
                     </div>
                     <div class="form-group">
                       <label>District</label>
                       <select name="district" id="district" class="form-control">
                         <option value="">Select district</option>
                       </select>
                     </div>

                     <div class="form-group">
                       <label>City</label>
                       <input  type = "text"  name="city" id="city" class="form-control"/>
                        
                     </div>

                     <div class="form-group">
                       <label>Citizenship</label>
                       <select name="citizenship" id="citizenship" class="form-control">
                         <option value="">Select Citizenship</option>
                       </select>
                     </div>
                     <div class="form-group">
                       <label>Present Place</label>
                       <input type="text" name="present_place" id="present_place">
                     </div>
                     <div class="form-group">
                       <label>Permanent Place</label>
                       <input type="text" name="permanent_place" id="permanent_place">
                     </div>
                     <div class="form-group">
                       <label>Ancestral Origin</label>
                       <input type="text" name="ancestral_origin" value= "" id="ancestral_origin" class="form-control">
                     </div>
                     <div class="form-group">
                       <label>Place of Birth</label>
                       <input type="text" name="place_birth" id="place_birth">
                     </div>
					 

                   </div>
                   <div class="tab">
                    <h3>Religious Information</h3>
                     <div class="form-group">
                       <label>Religion</label>
                       <select name="religion" id="religion" class="form-control">
                          <option value="">Select </option>
                       </select>
                     </div>
                     <div class="form-group">
                       <label>Category</label>
                      <select name="sub_caste_parent" id="sub_caste_parent" class="form-control">
                         <option value="">Select Category</option>
                       </select>
                     </div>
                     <div class="form-group">
                       <label>Sub Category</label>
                       <select name="subcaste" id="subcaste" class="form-control">
                         <option value="">Select Sub Category</option>
                       </select>
                     </div>
                     <div class="form-group">
                       <label>Division</label>
                       <select name="division" id="division" class="form-control">
                         <option value="">Select Division</option>
                       </select>
                     </div>
                     <div class="form-group">
                       <label>Spiritual Values</label>
                       <select name="religious_values" id="religious_values" class="form-control">
							<option value = "Regular">Regular</option>
							<option  value = "Active">Active</option>
							<option  value = "Some times">Some times</option>
							<option value = "Average Christian">Average Christian</option>
							<option  value = "Strong Believer in Faith">Strong Believer in Faith</option>
                       </select>
                     </div>
                     <div class="form-group">
                       <label>Water Baptism</label>
                       <select name="baptism" id="baptism" class="form-control">
                       <option value = "Child Baptism" >Child Baptism</option>
                         <option value = "Water Baptism">Water Baptism</option>
                         <option value = "Not Baptism">Not Baptism</option>
                       </select>
                     </div>
                     <div class="form-group">
                       <label>Ornaments</label>
                       <select name="ornaments" id="ornaments" class="form-control">
                         <option value= "No" >No</option>
                         <option value= "Yes">Yes</option>
                         <option value= "Liberal">Liberal</option>
                       </select>
                     </div>
					 <div class="form-group">
                       <label>Denomination [Ex : IPC, AG, Etc]</label>
                       <input type ="text" isrequired = "no" name="denomination" id="denomination" class="form-control"/>
                      
                     </div>

					 
                     <h3>Family Details</h3>
                     <div class="form-group">
                       <label>Family Status</label>
                       <select name="family_status" id="family_status" class="form-control">
                         <option value= "Middle Class" >Middle Class</option>
                         <option value= "Upper Middle Class" >Upper Middle Class</option>
                         <option  value= "Rich" >Rich</option>
                         <option value= "Affluent" >Affluent</option>
                       </select>
                     </div>
                     <div class="form-group">
                       <label>Family Type</label>
                       <input type="text" name="family_type" id="family_type">
                     </div>
                     <div class="form-group">
                       <label>Father’s Name</label>
                       <input type="text" name="father_name" id="father_name">
                     </div>
                     <div class="form-group">
                       <label>Fathers’ Job</label>
                       <input type="text" name="father_job" id="father_job">
                     </div>
                     <div class="form-group">
                       <label>Mothers’ Name</label>
                       <input type="text" name="mother_name" id="mother_name">
                     </div>
                     <div class="form-group">
                       <label>Mothers’ Job</label>
                       <input type="text" name="mother_job" id="mother_job">
                     </div>
                     <div class="form-group">
                       <label>No. of Brothers</label>
                       <input data-validation = "required"  type="number" name="no_of_brothers" id ="no_of_brothers">
                     </div>
                     <div class="form-group">
                       <label>No. of Sisters</label>
                       <input data-validation = "required"  type="number" name="no_of_sisters" id ="no_of_sisters">
                     </div>

                     <h3>Other Information</h3>
                     <div class="form-group">
                       <label>Drinking Habits</label>
                       <select name="drinking_habit" id="drinking_habit" class="form-control">
                         <option value = "Never" >Never Drinks</option>
                         <option value = "Social" >Social Drinker</option>
                         <option value = "Heavy" >Heavy Drinker</option>
                       </select>
                     </div>
                     <div class="form-group">
                       <label>Smoking Habits</label>
                       <select name="smoking_habit" id="smoking_habit" class="form-control">
						<option value = "Never" >Non-Smoker</option>
                         <option value = "Social">Social Smoker</option>
                         <option value = "Heavy">Heavy Smoker</option>
                       </select>
                     </div>
                     <div class="form-group">
                       <label>Food Habits</label>
                       <select name="food_habit" id="food_habit" class="form-control">
						<option value= "Vegetarian">Vegetarian</option>
                         <option value = "Non-Vegetarian" >Non-Vegetarian</option>
                         <option value =  "Eggiterian" >Eggiterian</option>
                         <option value= "Vegan">Vegan</option>
                       </select>
                     </div>
                     <h3>About</h3>
                     <textarea name="about" id="about"></textarea>
                     
                   </div>
                   <div class="tab">
                    
                     <h3>Partner Prefrences</h3>
                     <div class="form-group">
                       <label>Religion</label>
                       <select name="p_religion" id="p_religion" class="form-control">
                         <option value="">Select Religion</option>
                       </select>
                     </div>
                     <div class="form-group">
                       <label>Category</label>
                       <select name="p_sub_caste_parent" id="p_sub_caste_parent" class="form-control">
                         <option value="">Select Caste</option>
                       </select>
                     </div>
                     <div class="form-group">
                       <label>Sub Category</label>
                       <select name="p_subcaste" id="p_subcaste" class="form-control">
                         <option value="">Select Sub Caste</option>
                       </select>
                     </div>
					 <div class="form-group">
                       <label>Denomination [Ex : IPC, AG, Etc]</label>
                       <input type ="text"  name="p_denomination" id="p_denomination" class="form-control"/>
                      
                     </div>
                     <div class="form-group">
                       <label>Division</label>
                       <select name="p_division" id="p_division" class="form-control">
                         <option value="">Select Division</option>
                       </select>
                     </div>
                     
                     <div class="form-group">
                       <label>Current Country</label>
                       <select name="p_country" id="p_country" class="form-control">
                         <option value="">Select Country</option>
                       </select>
                     </div>
                     <div class="form-group">
                       <label>Current State</label>
                       <select name="p_state" id="p_state" class="form-control">
                         <option value="">Select State</option>
                       </select>
                     </div>
                     <div class="form-group">
                       <label>Current District</label>
                       <select name="p_district" id="p_district" class="form-control">
                         <option value="">Select District</option>
                       </select>
                     </div>

                     <div class="form-group">
                       <label>Current City</label>
                       <input type = "text" name="p_city" id="p_city" class="form-control">
                         
                     </div>

                     <div class="form-group">
                       <label>Citizenship</label>
                       <select name="p_citizenship" id="p_citizenship" class="form-control">
                         <option value="">Select Citizenship</option>
                       </select>
                     </div>
                     <div class="form-group">
                       <label>Monthly Income</label>
                       <select name="p_income" id="p_income" class="form-control">
                       <option value = "No Income" >No Income</option>
                        <option value = "1000-5000" >1000-5000</option>
                         <option value = "5000-10000" >5000-10000</option>
                         <option value = "10000-15000" >10000-15000</option>
                         <option value = "15000-25000" >15000-25000</option>
                         <option value = "25000-35000" >25000-35000</option>
                         <option value = "35000-45000" >35000-45000</option>
                         <option value = "45000-55000" >45000-55000</option>
                         <option value = "55000-65000" >55000-65000</option>
                         <option value = "65000-75000" >65000-75000</option>
                         <option value = "75000-85000" >75000-85000</option>
                         <option value = "85000-95000" >85000-95000</option>
                         <option value = "95000-1,05,000" >95000-1,05,000</option>
                         <option value = "1,05,000-and above" >1,05,000-and above</option>
                       </select>
                     </div>
                     <div class="form-group">
                       <label>Occupation</label>
                       <select name="p_occupation" id="p_occupation" class="form-control">
                         <option value="">Select Occupation</option>
                       </select>
                     </div>
                     <div class="form-group">
                       <label>Marital Status</label>
                       <select name="p_marital" id="p_marital" class="form-control">
						<option value = "" >Select</option>
						<option value = "Unmarried" >Unmarried</option>
                         <option value = "Widow">Widow</option>
                         <option value ="Widower" >Widower</option>
						  <option value = "Divorce" >Divorce</option>
                         <option value = "Separated">Separated</option>
                       </select>
                     </div>
                     <div class="form-group">
                       <label>Physical Status</label>
                       <select name="p_physical" id="p_physical" class="form-control">
						<option value = "" >Select</option>
                        <option value= "Normal">Normal</option>
                         <option value = "Physically Challenged">Physically Challenged</option>
                       </select>
                     </div>
					 <div class="form-group">
                       <label>Employed In</label>
                       <select name="p_employed_in" id="p_employed_in" class="form-control">
                          <option value ="">Select</option>
                         <option value ="defence" >Defence</option>
                         <option value ="govt sector" >Govt Sector </option>
                         <option value ="public sector" >Public Sector</option>
                         <option value ="private sector" >Private Sector</option>
                         <option value ="business" >Business</option>
                         <option value ="self employed" >Self employed</option>
						  <option value ="social media" >Social media </option>
                         <option value ="political" >Political</option>
                         <option value ="mission" >Mission</option>
                         <option value ="sports" >Sports</option>
                         <option value ="arts" >Arts</option>
                         <option value ="not working" >Not working</option>
                         <option value ="other" >Other</option>
                       </select>
                     </div>
					 <div class="form-group">
                       <label>Highest Education</label>
                       <select name="p_highest_education" id="p_highest_education" class="form-control">
                         <option value ="">Select</option>
                        
                       </select>
                     </div>
					 <h3>Upload Images</h3>
                     <div class="form-group fwidth">
                       <label>Browse Images</label>
                       <fieldset class="form-group fwidth">
                           <a href="javascript:void(0)" onclick="$('#pro_image').click()">Upload Image</a>
                           <input type="file" id="pro_image" name="pro_image" style="display: none;" class="form-control" multiple>
							<span class = "filenot" style = "color:red"></span>
					 </fieldset>
                       <div class="preview-images-zone">
                           
                       </div>
                     </div>
                     <h3>Account Verification</h3>
					 <div class="form-group">
                       <label>Email Id</label>
                       <input type="email" name="email" id ="email">
					   <span id = "span_email" style = "color:red" ></span>
                     </div>
                     <div class="form-group">
                       <label>Mobile Number</label>
                       <input type="number" name="mobile" id ="mobile">
					   <span id = "span_number" style = "color:red" ></span>
                     </div>
					
                     <div class="form-group otpverification">
                       <label>OTP Verification</label>
                       <input type="text" name="otp" id ="otp">
					   <span style ="font-size:12px;" id ="spnotp" ></span>
                     </div>
					  <div class="form-group otpverification">
					  <label>&nbsp;</label>
						<button type="button" name="" id="" class = "btnotp" onclick="">Send Otp</button>
					 </div>
					 <div class="form-group">
                       <label>Password </label>
                       
                       <input  style = "width:80%" type="password" name="password" id ="password">&nbsp<i class="toggle-password-eye fa fa-eye"></i>
					   <!--<span style= "display:none;" id = "password_check"> [5  which contain only characters, numeric digits, underscore and first character must be a letter]</span>-->
					   <span id = "password" style = "color:red" ></span>
                     </div>
                   </div>

                   <div class="pnbtn">
                     <div style="float:right;">
                       <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                       <button type="button" name="save" id="nextBtn" onclick="nextPrev(1)">Next</button><br />
                     </div> 
                     <div style="col-12 float:right;">
                       
                       <span class = "filenot float:right;" style = "color:red"></span>
                      </div>
                   </div>

                  

                   <div class="pnstep" style="text-align:center;margin-top:20px;">
                     <span class="step"></span>
                     <span class="step"></span>
                     <span class="step"></span>
                   </div>
                 </form>
             </div>
           </div>
         </div>
    </div>
  </div>
</div>
