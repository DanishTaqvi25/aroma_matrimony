

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
      <input type="hidden" name = "uuid_profile_loged" id = "uuid_profile_loged"  value="<?php echo $profile_uuid;?>">
      <div class="col-md-10">
        <div class="row profile_box">
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
            <p id ="view_profile_job" ></p>
            <p id ="view_profile_education" ></p>
            <p id ="view_age_mothertongue" ></p>
            <p id ="view_present_location" ></p>
            <p id ="view_caste_religion"></p>

            <h4>Personal Information</h4>
            <p id ="view_profile_marital" ><span></span></p>
            <p id ="view_age_mothertongue1" ><span></span></p>
            <p id ="view_known" ></p>
            <p id ="view_height" ></p>
            <p id ="view_weight" ></p>
            <p id ="view_physical" ></p>
			<?php if($is_free > 0  ){?>
				<h4>Contact Information <span>To Unlock For Accepted Profiles, Please Upgrade Your Account</span></h4>
				<p id ="">Email Id: ************ HIDDEN INFORMATION *******************</p>
				<p id ="">Mobile Number: ********* HIDDEN INFORMATION ***********</p>
				<p>Whatsapp Number: ************ HIDDEN INFORMATION **********</p>
				<p>Address: ************ HIDDEN INFORMATION *******************</p>
				<p>Address 2: ************ HIDDEN INFORMATION *******************</p>
			<?php }else {?>
				<h4><span></span></h4>
				<p id ="email_id"> </p>
				<p id ="mobile_no"></p>
				<p id ="Whatsapp" ></p>
				<p id ="Address"></p>
				<p id ="Address2"></p>
			<?php }?>
            <p></p>
            <p></p>
           <a href = "<?php echo base_url()?>Profile/Upgradepackage"> <img id="upgrade_icon" src="<?php echo base_url()?>images/icon-account-upgrade.png"></a>
          </div>

          <div id="addbutton" class="col-md-12">
            <h4>Religious Information</h4>
            <table>
              <tbody>
                <tr>
                  <td id ="td_Religion" ></td>
                  <td  id="td_Religious_values" ></td>
                </tr>
                <tr>
                  <td id ="td_caste" ></td>
                  <td id="td_water_baptism"></td>
                </tr>
                <tr>
                  <td id="td_subcaste"></td>
                  <td id="td_ornaments"></td>
                </tr>
                <tr>
                  <td id="td_division"></td>
                  <td></td>
                </tr>
              </tbody>
            </table>

            <h4>Current Location Information</h4>
            <table>
              <tbody>
                <tr>
                  <td id="td_country"></td>
                  <td id ="td_present_location"></td>
                </tr>
                <tr>
                  <td id ="td_state"></td>
                  <td id ="td_permenant_location"></td>
                </tr>
                <tr>
                  <td id="td_city" ></td>
                  <td id= "td_Ancestoral_origin"></td>
                </tr>
                <tr>
                  <td id ="td_citizenship"></td>
                  <td id ="td_place_of_birth"></td>
                </tr>
              </tbody>
            </table>

            <h4>Family Information</h4>
            <table>
              <tbody>
                <tr>
                  <td id="td_family_type"></td>
                  <td id ="td_mother_name"></td>
                </tr>
                <tr>
                  <td id ="td_family_status" ></td>
                  <td id ="td_mothers_job"></td>
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
		<?php $cnt_to = sizeof($to_intrest);  if($profile_uuid != '' ){?>
		
			<?php $cnt_to = sizeof($to_intrest);  $cnt_from = sizeof($from_intrest); if( (float) $cnt_from < 1 ){?>
				<?php if( (float) $cnt_to < 1 ) {?>
					<a href="#" status = "created" class="expressint expressint_update">Express Intrest</a>
				<?php }?>
			<?php }else if( (float) $cnt_to < 1 ) { 
					if($from_intrest[0]->client_request_status == 'pending' ){
						echo '<a href="#!" readonly  class="expressint bggrey">Pending</a>';
					}
					if($from_intrest[0]->client_request_status == 'rejected' ){
						echo '<a href="#!" readonly  class="expressint">Rejected</a>';
					}
					
					if($from_intrest[0]->client_request_status == 'accepted' ){
						echo '<a href="#!" readonly  class="expressint bggreen">Accepted</a>';
					}
					
					if($from_intrest[0]->client_request_status == 'created' ){
						echo '<a href="#!" readonly  class="expressint bggrey">Pending</a>';
					}
				
			?>
					
			<?php } ?>
			
			
			<?php if( (float) $cnt_to < 1 ){?>
			
			<?php }else if( (float) $cnt_from < 1 ){ 
					if($to_intrest[0]->client_request_status == 'pending' ){
						echo '<a href="#"  status = "accepted" class="expressint expressint_update bggreen">Accept</a><a href="#" status = "rejected" class="expressint expressint_update ">Reject</a><a status = "pending" href="#" class="expressint expressint_update bggrey">Keep Pending</a>';
					}
					if($to_intrest[0]->client_request_status == 'rejected' ){
						echo '<a href="#!" readonly  class="expressint">Rejected</a>';
					}
					
					if($to_intrest[0]->client_request_status == 'accepted' ){
						echo '<a href="#!" readonly  class="expressint bggreen">Accepted</a>';
					}
					
					if($to_intrest[0]->client_request_status == 'created' ){
						echo '<a href="#"  status = "accepted" class="expressint expressint_update bggreen">Accept</a><a href="#" status = "rejected" class="expressint expressint_update ">Reject</a><a status = "pending" href="#" class="expressint expressint_update bggrey">Keep Pending</a>';
					}
				
			?>
					
			<?php } ?>
			
			
			<?php } ?>
			
			
			
			
			
			
          </div>

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
  $(document).on("click",".expressint_update",function() {
		var client_request_status = $(this).attr('status');
	//	var client_request_from = '23c6fe86-98c6-49eb-861b-c269738b0ca0';
		//var client_request_to = 'da5cccdf-2ecd-44b9-ad30-51055c0a4af5';
		var client_request_from = $('#uuid_profile_loged').val();
		var client_request_to = $('#uuid_profile').val();
		if(client_request_status !== 'created'){
			var client_request_from = $('#uuid_profile').val();
			var client_request_to = $('#uuid_profile_loged').val();
		}
		var client_request_uuid = '';
		$.ajax({
        type: "POST",
		data:{client_request_status:client_request_status,client_request_from:client_request_from,client_request_to:client_request_to,client_request_uuid:client_request_uuid},
        url: "<?php echo base_url(); ?>Profile/update_status",
        success: function(result) {
			result = JSON.parse(result);
			if(parseFloat(result.status) > 0 ){
				var res = result.results;
				$.each(res, function(i, itemsingle) {
					var request_to =  itemsingle.client_request_to;
					var uuid_profile_loged = $('#uuid_profile_loged').val();
					if(request_to === uuid_profile_loged ){
						$('.expressint_update').remove();
						if(itemsingle.client_request_status === 'pending' || itemsingle.client_request_status === 'created' ){
							var text =  '<a href="#" status="accepted" class="expressint expressint_update bggreen">Accept</a><a href="#" status="rejected" class="expressint expressint_update ">Reject</a><a status="pending" href="#" class="expressint expressint_update bggrey">Keep Pending</a>';
							$('#addbutton').append(text);
						}else if(itemsingle.client_request_status === 'accepted'){
							var text = '<a href="#!" readonly  class="expressint bggreen">Accepted</a>';
							$('#addbutton').append(text);
						}else if(itemsingle.client_request_status === 'rejected'){
							var text = '<a href="#!" readonly  class="expressint">Rejected</a>';
							$('#addbutton').append(text);
						}
					}else{
						$('.expressint_update').remove();
						var text = '<a href="#!" readonly  class="expressint bggrey">Pending</a>';
						$('#addbutton').append(text);
					}
				});
			}
          
        }
    });
  });
  $(document).ready(function() {
	
    var uuid = $('#uuid_profile').val();
    $.ajax({
        type: "POST",
        url: "<?php echo base_url(); ?>Profile/profile_details/"+uuid,
        success: function(result) {
            $.each(JSON.parse(result), function(i, itemsingle) {
			
				$('#email_id').html('Email Id: '+itemsingle.email);
				$('#mobile_no').html('Mobile Number: '+itemsingle.mobile);
				$('#Whatsapp').html('Whatsapp Number: '+itemsingle.whatsapp);
				$('#Address').html('Address :'+itemsingle.address_1);
				$('#Address2').html('Address 2 :'+itemsingle.address_2);
                $('#view_profile_name').html(''+itemsingle.profile_name+' <a id = "share_profile" uuid = "'+uuid+'"  href="#" data-toggle="modal" data-target="#shareprofile" data-dismiss="modal" class="share_profile"><span><i class="fa fa-share"></i>Share This Profile</span></a>');
				$('#view_profile_job').html(itemsingle.occupation_name);
				$('#view_profile_education').html(itemsingle.high_education_name);
				$('#view_age_mothertongue').html('Age: '+itemsingle.age+' | Mother Tongue: '+itemsingle.mothertongue);
				$('#view_present_location').html('Current Location: '+itemsingle.present_country_name+', '+itemsingle.present_state_name+'');
				$('#view_caste_religion').html('Religion: '+itemsingle.religion_name+' | Caste: '+itemsingle.caste_name+'');
				$('#view_profile_marital').html('Profile Created For:  '+itemsingle.profile_for+'<span> Marital Status:   '+itemsingle.marital);
				$('#view_age_mothertongue1').html('Age:  '+itemsingle.age+' <span>Mother Tongue: '+itemsingle.mothertongue+'</span>');
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
				$('#view_known').html('Known Language:'+itemsingle.known_language);
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
				
			//	$('#td_partner_anual_income').html('Annual Income :');
				//$('#td_partner_caste').html('Caste:');
				//$('#td_partner_citizenship').html('Citizenship :');
				//$('#td_partner_citizenships').html('');
				//$('#td_partner_city').html('City: ');
				//$('#td_partner_division').html('Division:');
				//$('#td_partner_education').html('Education: ');
				//$('#td_partner_martial').html('Marital Status: ');
			//	$('#td_partner_occupation').html('Occupation:');
			//	$('#td_partner_physical').html('Physical Status:');
			//	$('#td_partner_religion').html('Religion:');
				//$('#td_partner_state').html('State:');
			//	$('#td_partner_subcaste').html('Subcaste: ');
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

