<?php $lo_pro_uuid = $this->session->userdata('uuid');	?>

<section class="matchprofile">
  <div class="container">
    <div class="row">
      <div class="col-md-2 npadng">
        <div class="left_matchbar">
          <h4>Account Details</h4>
          <ul>
             <li><a href="<?php echo base_url()?>profile/myprofile">Profile</a></li>
            <li><a href="<?php echo base_url()?>profile/automatch">Auto Match</a></li>
            <li><a href="<?php echo base_url()?>profile/searchprofile">Search Partner</a></li>
            <li><a href="<?php echo base_url()?>profile/sharedprofile">Shared  Profile</a></li>
           <li><a href="<?php echo base_url()?>profile/intrestsend">Interests Send</a></li>
            <li><a href="<?php echo base_url()?>profile/intrestreceived">Interests Received</a></li>
            <li><a href="<?php echo base_url()?>profile/upgradepackage"> Upgrade Account</a></li>
          </ul>
        </div>
      </div>
      <input type="hidden" name = "uuid_profile" id = "uuid_profile"  value="<?php echo $uuid;?>">
      <div class="col-md-10">
        <div class="row profile_box">
		<?php if(isset($Shared_by_details[0]['age'])){?>
			<div class="col-md-12 shrared_profile">
				<div class="row">
					<div class="col-md-1">
					<img src="<?php echo base_url();?>uploads/profile/<?php echo $Shared_by_details[0]['pro_image'] ;?>">
					</div>
					<div class="col-md-7 padlft">
					<h4>This Profile is Shared by</h4>
					<p><?php echo $Shared_by_details[0]['profile_name'] ;?></p>
					<p>Age: <?php echo $Shared_by_details[0]['age'] ;?> | <?php echo $Shared_by_details[0]['country_name'] ;?> |<?php echo $Shared_by_details[0]['country_name'] ;?></p>
					<p>on 17 June 2021</p>
					</div>
					<div class="col-md-4">
					<!--<a href="#">Unshare to Remove this tag</a>-->
					</div>
				</div>  
			</div>
		<?php } ?>
          <div class="col-md-4">
             <div id= "profile_main_image" class="container_img">
              <img id="expandedImg" src="<?php echo base_url()?>uploads/profile/<?php print_r( $images[0]->pro_image);?>" style="width:100%">
             </div>
            <div class="fourimg">
                <?php $size = sizeof($images) ; for($i =0 ;$i<$size ;$i++ )  { ?>
                    <div class="column">
                   <img src="<?php echo base_url()?>uploads/profile/<?php print_r( $images[$i]->pro_image);?>" style="width:100%" onclick="myFunction(this);">
                 </div>
                <?php }?>
              
             </div>
          </div>
          
          <div class="col-md-8">
            <h3 id ="view_profile_name" ></h3>
            <p id ="view_profile_job" >Sr. Accountant</p>
            <p id ="view_profile_education" >MCom, ACCA</p>
            <p id ="view_age_mothertongue" >Age: 25 | Mother Tongue: Hindi</p>
            <p id ="view_present_location" >Current Location: Kanpur, India</p>
            <p id ="view_caste_religion">Religion: Christian | Caste: Catholic</p>

            <h4>Personal Information</h4>
            <p id ="view_profile_marital" >Profile Created For:  Sister<span>Marital Status: Never Married</span></p>
            <p id ="view_age_mothertongue1" >Age: 25 <span>Mother Tongue: Hindi</span></p>
            <p id ="view_known" ></p>
            <p id ="view_height" ></p>
            <p id ="view_weight" ></p>
            <p id ="view_physical" ></p>

            <h4>Contact Information <span>To Unlock For Accepted Profiles, Please Upgrade Your Account</span></h4>
            <p id ="email">Email Id: ************ HIDDEN INFORMATION *******************</p>
            <p id ="mobile">Mobile Number: ********* HIDDEN INFORMATION ***********</p>
            <p>Whatsapp Number: ************ HIDDEN INFORMATION **********</p>
            <p>Address: ************ HIDDEN INFORMATION *******************</p>
            <p>Address 2: ************ HIDDEN INFORMATION *******************</p>
            <p>City: Kanpur</p>
            <p>Country: India</p>
           <a href = "<?php echo base_url()?>Profile/Upgradepackage"> <img id="upgrade_icon" src="<?php echo base_url()?>images/icon-account-upgrade.png"></a>
          </div>

          <div class="col-md-12">
            <h4>Religious Information</h4>
            <table>
              <tbody>
                <tr>
                  <td id ="td_Religion" >Religion: Christian</td>
                  <td  id="td_Religious_values" >Religious Values: Strict</td>
                </tr>
                <tr>
                  <td id ="td_caste" >Caste: Catholic</td>
                  <td id="td_water_baptism">Water Baptism: No</td>
                </tr>
                <tr>
                  <td id="td_subcaste">Subcaste: Roman Catholic</td>
                  <td id="td_ornaments">Ornaments: Yes</td>
                </tr>
                <tr>
                  <td id="td_division">Division: Nadar</td>
                  <td></td>
                </tr>
              </tbody>
            </table>

            <h4>Location Information</h4>
            <table>
              <tbody>
                <tr>
                  <td id="td_country">Country: India</td>
                  <td id ="td_present_location">Present Location: Kanpur</td>
                </tr>
                <tr>
                  <td id ="td_state">State: Uttar Pradesh</td>
                  <td id ="td_permenant_location">Permanent Location: Kanpur</td>
                </tr>
                <tr>
                  <td id="td_city" >City: Kanpur</td>
                  <td id= "td_Ancestoral_origin">Ancestoral Origin: Mumbai</td>
                </tr>
                <tr>
                  <td id ="td_citizenship">Citizenship: India</td>
                  <td id ="td_place_of_birth">Place of Birth: Kanpur</td>
                </tr>
              </tbody>
            </table>

            <h4>Family Information</h4>
            <table>
              <tbody>
                <tr>
                  <td id="td_family_type">Family Type: Moderate</td>
                  <td id ="td_mother_name">Mother’s Name: Reena Fernandez</td>
                </tr>
                <tr>
                  <td id ="td_family_status" >Family Status: Upper Middle Class</td>
                  <td id ="td_mothers_job">Mother’s Job: House Wife</td>
                </tr>
                <tr>
                  <td id ="td_father">Father’s Name: Fernandez</td>
                  <td id ="td_no_brothers">No of Brothers: 1</td>
                </tr>
                <tr>
                  <td id ="td_fathers_job">Father’s Job: Business</td>
                  <td id ="td_no_sisters">No. of Sisters: 1</td>
                </tr>
              </tbody>
            </table>

           <h4>Bio Information</h4>
            <p id = "tb_bio" ></p>
			
            <h4>Other Information</h4>
            <table>
              <tbody>
                <tr>
                  <td id ="td_drinking_habits">Drinking Habits: Social</td>
                  <td id ="td_food_habits">Food Habits: Non-Vegetarian</td>
                </tr>
                <tr>
                  <td id ="td_smoking_habits">Smoking Habits: No</td>
                  <td></td>
                </tr>
              </tbody>
            </table>

            <h4>Partner Preferences</h4>
            <table>
              <tbody>
                <tr>
                  <td id ="td_partner_religion">Religion: Christian</td>
                  <td id ="td_partner_education">Education: Masters Degree or Above</td>
                  <td id ="td_partner_anual_income">Annual Income: 600000 & Above</td>
                </tr>
                <tr>
                  <td id="td_partner_caste">Caste: Catholic</td>
                  <td id ="td_partner_state">State: Uttar Pradesh</td>
                  <td id="td_partner_occupation">Occupation: Managerial Positions</td>
                </tr>
                <tr>
                  <td id ="td_partner_subcaste">Subcaste: Roman Catholic</td>
                  <td id ="td_partner_city">City: Kanpur</td>
                  <td id ="td_partner_martial">Marital Status: Never Married</td>
                </tr>
                <tr>
                  <td id ="td_partner_division">Division: Nadar</td>
                  <td id ="td_partner_citizenship">Citizenship: India</td>
                  <td id ="td_partner_physical">Physical Status: Normal</td>
                </tr>
                <tr>
                  <td></td>
                  <td id ="td_partner_citizenships">Citizenship: India</td>
                  <td></td>
                </tr>
              </tbody>
            </table>

           <!-- <a href="#" class="expressint">Express Intrest</a> <a href="#" class="expressint bggreen">Accept</a> <a href="#" class="expressint">Reject</a> <a href="#" class="expressint bggrey">Keep Pending</a>
         --> </div>

        </div>

    </div>


  </div>
</div>
</section>


<div class="modal fade" id="expressmatch" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Express Interest</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row inner_matchprofile">
              <div class="col-md-3">
                <img src="<?php echo base_url()?>images/lady.png">
              </div>
              <div class="col-md-9">
                <h3>Roselyn Fernandez</h3>
                <p>Sr. Accountant</p>
                <p>MCom, ACCA</p>
                <p>Age: 25 | Mother Tongue: Hindi</p>
                <p>Current Location: Kanpur, India</p>
                <p>Religion: Christian | Caste: Catholic</p>
                <a href="#" class="expresspopup">Share this Profile</a>
                <a href="#" class="expresspopup" data-toggle="modal" data-target="#expressmatch">Express Interest</a>
              </div>
            </div>
      </div>
    </div>
  </div>
</div>


<div class="bggray"></div>




<script>

  $(document).ready(function() {
    var uuid = $('#uuid_profile').val();
    $.ajax({
        type: "POST",
        url: "<?php echo base_url(); ?>Profile/profile_details/"+uuid,
        success: function(result) {
            $.each(JSON.parse(result), function(i, itemsingle) {
                $('#view_profile_name').html(''+itemsingle.profile_name+' <span><i class="fa fa-user"></i>Edit My Profile</span>');
                $('#view_profile_name').html(''+itemsingle.profile_name+' <span></span>');
				$('#view_profile_job').html(itemsingle.occupation_name);
				$('#view_profile_education').html(itemsingle.high_education_name);
				$('#view_age_mothertongue').html('Age: '+itemsingle.age+' | Mother Tongue: '+itemsingle.mothertongue);
				$('#view_present_location').html('Current Location: '+itemsingle.present_country_name+', '+itemsingle.present_state_name+'');
				$('#view_caste_religion').html('Religion: '+itemsingle.religion_name+' | Caste: '+itemsingle.caste_name+'');
				$('#view_profile_marital').html('Profile Created For:  '+itemsingle.profile_for+'<span> Marital Status:   '+itemsingle.marital);
				$('#view_age_mothertongue1').html('Age:  '+itemsingle.age+' <span>Mother Tongue: '+itemsingle.mothertongue+'</span>');
				$('#view_known').html('Known Language:'+itemsingle.known_language);
				$('#view_height').html('Height : '+itemsingle.height);
				$('#view_weight').html('Weight : '+itemsingle.weight);
				$('#view_physical').html('Physical Status : '+itemsingle.physical);
				$('#td_Religion').html('Religion: ' + itemsingle.religion_name);
				$('#td_Religious_values').html('Spiritual Values:' + itemsingle.religious_values);
				$('#td_caste').html('Caste:'+itemsingle.caste_name);
				$('#td_water_baptism').html('Water Baptism: '+itemsingle.baptism);
				$('#td_subcaste').html('Sub Caste :'+itemsingle.sub_caste_name);
				$('#td_ornaments').html('Ornaments : '+itemsingle.ornaments);
				$('#td_division').html('Division : '+itemsingle.division_name);
				$('#td_country').html('Country :' + itemsingle.present_country_name);
				$('#td_state').html('State :'+itemsingle.present_state_name);
				$('#td_city').html('City :');
				$('#td_citizenship').html('Citizenship :');
				$('#td_present_location').html('Present Location:'+itemsingle.present_place);
				
				$('#td_permenant_location').html('Permanent Location:'+itemsingle.permanent_place);
				$('#td_Ancestoral_origin').html('Ancestoral Origin:'+itemsingle.ancestral_origin);
				$('#td_place_of_birth').html('Place of Birth:'+itemsingle.place_birth);
				$('#td_family_type').html('Family Type : '+itemsingle.family_type);
				$('#td_family_status').html('Family Status :'+itemsingle.family_status);
				$('#td_father').html('Father’s Name :'+itemsingle.father_name);
				$('#td_mother_name').html('Mother’s Name :'+itemsingle.mother_name);
				$('#td_mothers_job').html('Mother’s Job :'+itemsingle.mother_job);
				$('#td_fathers_job').html('Father’s Job:'+itemsingle.father_job);
				$('#td_no_brothers').html('No of Brothers:'+itemsingle.no_of_brothers);
				$('#td_no_sisters').html('No. of Sisters :'+itemsingle.no_of_sisters);
				$('#td_drinking_habits').html('Drinking Habits:'+itemsingle.drinking_habit);
				$('#td_smoking_habits').html('Smoking Habits:'+itemsingle.smoking_habit);
				$('#td_food_habits').html('	Food Habits:'+itemsingle.food_habit);
				
				$('#td_partner_anual_income').html('Annual Income :');
				$('#td_partner_caste').html('Caste:');
				$('#td_partner_citizenship').html('Citizenship :');
				$('#td_partner_citizenships').html('');
				$('#td_partner_city').html('City: ');
				$('#td_partner_division').html('Division:');
				$('#td_partner_education').html('Education: ');
				$('#td_partner_martial').html('Marital Status: ');
				$('#td_partner_occupation').html('Occupation:');
				$('#td_partner_physical').html('Physical Status:');
				$('#td_partner_religion').html('Religion:');
				$('#td_partner_state').html('State:');
				$('#td_partner_subcaste').html('Subcaste: ');
            });
        }
    });
	
	$.ajax({
        type: "POST",
        url: "<?php echo base_url(); ?>Profile/profile_partner_details/"+uuid,
        success: function(result) {
            $.each(JSON.parse(result), function(i, itemsingle) {
				$('#td_partner_anual_income').html('Annual Income :'+itemsingle.p_income);
				$('#td_partner_caste').html('Caste:'+itemsingle.caste_name);
				$('#td_partner_citizenship').html('Citizenship :'+itemsingle.citizenship_name);
				$('#td_partner_citizenships').html('');
				$('#td_partner_city').html('City: '+itemsingle.district_name);
				$('#td_partner_division').html('Division:'+itemsingle.division_name);
				$('#td_partner_education').html('Education: Nil');
				$('#td_partner_martial').html('Marital Status: '+itemsingle.p_marital);
				$('#td_partner_occupation').html('Occupation:'+itemsingle.occupation_name);
				$('#td_partner_physical').html('Physical Status:'+itemsingle.p_physical);
				$('#td_partner_religion').html('Religion:'+itemsingle.religion_name);
				$('#td_partner_state').html('State:'+itemsingle.state_name);
				$('#td_partner_subcaste').html('Subcaste: '+itemsingle.sub_caste_name);
            });
        }
    });
});

 
</script>