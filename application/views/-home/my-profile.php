
      <input type="hidden" name = "uuid_profile" id = "uuid_profile"  value="<?php echo $uuid;?>">
<style>
		.password{
			border-radius: 25px;
			width:300px;
			height:50px;
			padding:30px;
		}
		.update_password{
			background-color:green;
			padding-left:0px;
			width:300px;
			border-radius: 5px;
		}
		.clserror{
			color:red;
		}
</style>
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
      <div class="col-md-10">
        <div class="row profile_box">
		<?php foreach($shared_by as $Shared_by_details){?>
			<div class="col-md-12 shrared_profile shrared_profile<?php echo $Shared_by_details['shared_profile_uuid'];?>">
				<div class="row">
					<div class="col-md-1">
					<img src="<?php echo base_url();?>uploads/profile/<?php echo $Shared_by_details['pro_image'] ;?>">
					</div>
					<div class="col-md-7 padlft">
					<h4>Your Profile is Shared by</h4>
					<p><?php echo $Shared_by_details['profile_name'] ;?></p>
					<p>Age: <?php echo $Shared_by_details['age'] ;?> | <?php echo $Shared_by_details['country_name'] ;?> |<?php echo $Shared_by_details['country_name'] ;?></p>
					<p>on 17 June 2021</p>
					</div>
					<div class="col-md-4">
					<a href="#" onclick = "unlinkSharedProfile('<?php echo $Shared_by_details['shared_profile_uuid'];?>')" >Unshare to Remove this tag</a>
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
			
			<h4>Contact Information <span></span></h4>
			<p id ="email_id">Email Id: </p>
			<p id ="mobile_no">Mobile Number: </p>
			<p id ="Whatsapp" >Whatsapp Number: </p>
			<p id ="Address">Address: </p>
			<p id ="Address2">Address 2: </p>
            <p id = "td_pcity">City: Kanpur</p>
            <p>Country: India</p>
           <a href = "<?php echo base_url()?>Profile/Upgradepackage"> <img id="upgrade_icon" src="<?php echo base_url()?>images/icon-account-upgrade.png"></a>
          </div>

          <div id="addbutton" class="col-md-12">
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

			
          </div>
          <div class="col-md-12">
              <h4>Change My Password</h4>
               <form>
                   <div class="col-md-6">
                        <label style="mrgin-top:20px; font-size:12px;">Password [5 Characters] </label><br />
                 <input class = "password" data-validation = "required" type="password" id="password" style ="height:40px; margin-top:5px; border-radius:solid #666 5px;"  name="confirm_password" placeholder="Password"><br />
                       
                   </div>
                   
                <div class="col-md-6">
                    <label style="margin-top:20px; font-size:12px;">Confirm Password</label><br />
                 <input class = "password" data-validation = "required" type="password" id="confirm_password" style ="height:40px; margin-top:5px; border-radius:solid #666 5px;"  name="confirm_password" placeholder="Password"><br />
                    
                </div>
                 <div class="col-md-6">
                     <span style ="color:red" class = "clserror" id ="span_login"></span><br />
               <button type ="button" name = "update_password" id ="update_password"  class = "update_password">UPDATE</button>
                 </div>
				 

                 
               </form>
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
                <p >Current Location: Kanpur, India</p>
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
	$(document).on("keydown",".clserror",function() {
		$('.clserror').attr('style','display:none');
	});
	$(document).on("click","#update_password",function() {
		var is_continue = 1;
		var password = $('#password').val();
		var confirm_password = $('#confirm_password').val();
		if(password !== '' && confirm_password !== ''){
			if(password.length === 5){
				if(password !== confirm_password){
					$('.clserror').removeAttr('style');
					$('.clserror').html('Password Does not match');
					is_continue = 0;
				}
			}else{
				$('.clserror').removeAttr('style');
				$('.clserror').html('Password Must contain 5  characters');
				is_continue = 0;
			}
		}else{
			$('.clserror').removeAttr('style');
			$('.clserror').html('Please enter your password');
			is_continue = 0;
		}
		if(is_continue > 0 ){
			     $.ajax({
                      url: "<?php echo base_url(); ?>Profile/update_password/",
					  type:"POST",
					  data:{password:password},
                      async:false,
                      success: function(result) {
								$('#pSuccess').html('Password Updated  Successfully');
								$('#ModalSuccess').modal('show');
									setTimeout(function() {
									$('#ModalSuccess').modal('hide');
									$('#password').val('');
									$('#confirm_password').val('');
								}, 2000);
						
                      }

                    });
		}
		
	});
	$(document).on("click","#edit_profile",function() {
					var uuid = $(this).attr('uuid');
                     $.ajax({
                      url: "<?php echo base_url(); ?>Profile/getmember/"+uuid,
                      async:false,
                      success: function(result) {
							$.each(JSON.parse(result), function(i, itemsingle) {
								$('#known_language').val(itemsingle.known_language);
								$('#income').val(itemsingle.income);
								$('#denomination').val(itemsingle.denomination);
								$('#dob').val(itemsingle.in_date);
								$('#p_denomination').val(itemsingle.p_denomination);
								$('#occupation').val(itemsingle.occupation);
								$('#highest_education').val(itemsingle.highest_education);
								$('#profile_id').val(itemsingle.profile_uuid);
								$('#profile_for').val(itemsingle.profile_for);
								$('#profile_name').val(itemsingle.profile_name);
								$('#age').val(itemsingle.age);
								$('#height').val(itemsingle.height);
								$('#weight').val(itemsingle.weight);
								$('#physical').val(itemsingle.physical);
								$('#mother').val(itemsingle.mother);
								$('#marital').val(itemsingle.marital);
								$('#gender').val(itemsingle.gender);
								$('#email').val(itemsingle.email);
								$('#mobile').val(itemsingle.mobile);
								$('#otp').val(itemsingle.otp);
								if(itemsingle.otp === ''){
									$('#otp').val('123456');
								}
								$('#whatsapp').val(itemsingle.whatsapp);
								$('#address_1').val(itemsingle.address_1);
								$('#address_2').val(itemsingle.address_2);
								$('#t_country').val(itemsingle.country);
								$('#t_country').trigger('change');
								$('#t_state').val(itemsingle.state);
								$('#t_state').trigger('change');
								$('#t_city').val(itemsingle.city);
								$('#t_district').val(itemsingle.district);
								$('#present_place').val(itemsingle.present_place);
								$('#permanent_place').val(itemsingle.permanent_place);
								
								$('#ancestral_origin').val(itemsingle.ancestral_origin);
								$('#place_birth').val(itemsingle.place_birth);
								$('#family_type').val(itemsingle.family_type);
								$('#father_name').val(itemsingle.father_name);
								$('#father_job').val(itemsingle.father_job);
								$('#mother_name').val(itemsingle.mother_name);
								$('#mother_job').val(itemsingle.mother_job);
								$('#no_of_brothers').val(itemsingle.no_of_brothers);
								$('#no_of_sisters').val(itemsingle.no_of_sisters);
								$('#about').val(itemsingle.about);
								//$('#pro_image').val(itemsingle.pro_image);
								$('#p_highest_education').val(itemsingle.p_highest_education);
								$('#p_employed_in').val(itemsingle.p_employed_in);
								$('#highest_education').val(itemsingle.highest_education);
								
								$('#employed_in').val(itemsingle.employed_in);
								$('#religion').val(itemsingle.religion);
								$('#religion').trigger('change');
								$('#sub_caste_parent').val(itemsingle.caste);
							//	load_sub_caste_parent(itemsingle.religion,itemsingle.caste);
								//load_sub_caste(itemsingle.caste,itemsingle.sub_caste);
								$('#sub_caste_parent').trigger('change');
								$('#subcaste').val(itemsingle.sub_caste);
								$('#division').val(itemsingle.division);
								$('#religious_values').val(itemsingle.religious_values);
								$('#baptism').val(itemsingle.baptism);
								
								$('#ornaments').val(itemsingle.ornaments);
								$('#country').val(itemsingle.present_country);
								$('#country').trigger('change');
								$('#state').val(itemsingle.present_state);
								//load_state(itemsingle.present_country,itemsingle.present_state);
								$('#state').trigger('change');
								//load_district(itemsingle.present_state,itemsingle.present_district);

						$('#city').val(itemsingle.present_city);
								$('#citizenship').val(itemsingle.citizenship);
								$('#family_status').val(itemsingle.family_status);
								$('#drinking_habit').val(itemsingle.drinking_habit);
								
								$('#smoking_habit').val(itemsingle.smoking_habit);
								$('#food_habit').val(itemsingle.food_habit);
								$('#p_religion').val(itemsingle.p_religion);
								$('#p_religion').trigger('change');
								$('#p_sub_caste_parent').val(itemsingle.p_caste);
								$('#p_sub_caste_parent').trigger('change');
								$('#p_subcaste').val(itemsingle.p_subcaste);
								$('#p_division').val(itemsingle.p_division);
								$('#p_education').val(itemsingle.p_education);
								$('#p_country').val(itemsingle.p_country);
								$('#p_country').trigger('change');
								 $('#p_state').val(itemsingle.p_state);
								$('#p_state').trigger('change');
								$('#p_district').val(itemsingle.p_district);
								$('#district').val(itemsingle.present_district);

                $('#p_city').val(itemsingle.p_city);
								$('#p_citizenship').val(itemsingle.p_citizenship);
								
								
								$('#p_income').val(itemsingle.p_income);
								$('#p_occupation').val(itemsingle.p_occupation);
								$('#p_marital').val(itemsingle.p_marital);
								$('#p_physical').val(itemsingle.p_physical);
							 });
                      }

                    });
					
					
					
					$.ajax({
                      url: "<?php echo base_url(); ?>Profile/get_profile_image/"+uuid,
                      async:false,
                      success: function(result) {
							var url = '<?php echo base_url(); ?>';
							url = url.replace("admin", "site");
							var output = $(".preview-images-zone");
							$(".preview-images-zone").html('');
							$.each(JSON.parse(result), function(i, itemsingle) {
								image_url = url + 'uploads/profile/'+ itemsingle.pro_image;
								var pro_image_ismain = itemsingle.pro_image_ismain;
								var txt_main = '';
								if(parseFloat(pro_image_ismain) > 0  ){
									txt_main = 'checked ';
								}
								var html =  '<div class="preview-image preview-show-' + num + '">' +
								'<div class="image-cancel" data-no="' + num + '">x</div>' +
								'<div class="image-zone"><input type="hidden" name ="profile_image'+num+'" value = "'+itemsingle.pro_image+'" ><input type ="hidden" name ="cnt_profile_image[]" value = "'+num+'"  ><input type ="hidden" class = "profile_images" name ="profile_images[]"  value ="'+image_url+'" ><img id="pro-img-' + num + '" src="'+image_url+'"></div>' +
								'<div class="tools-edit-image"><a href="javascript:void(0)" data-no="' + num + '" class="btn btn-light btn-edit-image"><input data-validation = "required" type="radio" value = "'+num+'"  '+txt_main+' name="cover">Make this cover photo</a></div>' +
								'</div>';

								output.append(html);
								num = num + 1;
							 });
                      }

                    });
	});
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
				$('.otpverification').attr('style','display:none');
				$('#email_id').html('Email Id: '+itemsingle.email);
				$('#mobile_no').html('Mobile Number: '+itemsingle.mobile);
				$('#Whatsapp').html('Whatsapp Number: '+itemsingle.whatsapp);
				$('#Address').html('Address :'+itemsingle.address_1);
				$('#Address2').html('Address 2 :'+itemsingle.address_2);
                $('#view_profile_name').html(''+itemsingle.profile_name+' <a id = "edit_profile" uuid = "'+uuid+'"  href="#" data-toggle="modal" data-target="#reg" data-dismiss="modal" class="reg"><span><i class="fa fa-user"></i>Edit My Profile</span></a>');
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
				$('#td_city').html('City :'+itemsingle.present_city);
				$('#td_pcity').html('City :'+itemsingle.city);
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
				
				$('#td_partner_anual_income').html('Annual Income :');
				$('#td_partner_caste').html('Caste:');
				$('#td_partner_citizenship').html('Citizenship :');
				$('#td_partner_citizenships').html('');
				$('#td_partner_city').html('City: '+itemsingle.p_city);
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
				$('#td_partner_city').html('City: '+itemsingle.p_city);
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