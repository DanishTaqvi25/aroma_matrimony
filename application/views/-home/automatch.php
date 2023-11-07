<?php
		$profile_uuid = $this->session->userdata('uuid');	
		if(isset($profile_uuid) ){
			
		}else{
			$profile_uuid = '';
		}
?>
<style>
	.intrestpopup{
		background: green;
		color: #fff;
		font-size: 10px !important;
		padding: 2px 10px;
		border-radius: 4px;
	}
	.clsaccepted {
		background: green;
		color: #fff;
		font-size: 10px !important;
		padding: 2px 10px;
		border-radius: 4px;
	}
	.clsrejected {
		background: #ff0000;
		color: #fff;
		font-size: 10px !important;
		padding: 2px 10px;
		border-radius: 4px;
	}
	
	.clspending {
		background: grey;
		color: #fff;
		font-size: 10px !important;
		padding: 2px 10px;
		border-radius: 4px;
	}
</style>
<section class="matchprofile">
     <input type="hidden" name = "uuid_profile_loged" id = "uuid_profile_loged"  value="<?php echo $profile_uuid;?>">
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

		 <button style="display:none" type ="button" id ="search_button" >Search</button>
        <div class="row right_match row_serach_profile">
          <div class="col-md-12">
            <h4>Search Results</h4>
          </div>

          <div class="col-md-4">
            <div class="row inner_matchprofile">
              
            </div>
          </div>

          
        </div>
      </div>
    </div>
  </div>
</section>
<script>
		$(document).on("click",".intrestpopup",function() {
				var client_request_status = $(this).attr('status');
			//	var client_request_from = '23c6fe86-98c6-49eb-861b-c269738b0ca0';
				//var client_request_to = 'da5cccdf-2ecd-44b9-ad30-51055c0a4af5';
				var client_request_to = $('#uuid_profile_loged').val();
				var client_request_from = $(this).attr('uuid');
				var client_request_uuid = '';
				var closest = $(this).parent().closest('div[id]');
				$.ajax({
					type: "POST",
					data:{client_request_status:client_request_status,client_request_from:client_request_from,client_request_to:client_request_to,client_request_uuid:client_request_uuid},
					url: "<?php echo base_url(); ?>Profile/update_status",
					success: function(result) {
					result = JSON.parse(result);
						if(parseFloat(result.status) > 0 ){
							var res = result.results;
							$.each(res, function(i, itemsingle) {
								$(closest).find('.intrestpopup').remove();
								if(itemsingle.client_request_status === 'accepted'){
									var text = '<a href="#" uuid="da5cccdf-2ecd-44b9-ad30-51055c0a4af5" style="bg-color:green !important" class="clsaccepted">accepted</a>';
								}else if(itemsingle.client_request_status === 'rejected'){
									var text = '<a href="#" uuid="da5cccdf-2ecd-44b9-ad30-51055c0a4af5" style="bg-color:green !important" class="clsrejected">rejected</a>';
								}
								$(closest).find('.div_profile').append(text);
						});
						}
						
				}
			});
		});
	$(document).on("click",".expresspopup",function() {
				var client_request_status = 'created';
			//	var client_request_from = '23c6fe86-98c6-49eb-861b-c269738b0ca0';
				//var client_request_to = 'da5cccdf-2ecd-44b9-ad30-51055c0a4af5';
				var client_request_from = $('#uuid_profile_loged').val();
				var client_request_to = $(this).attr('uuid');
				var client_request_uuid = '';
				var closest = $(this).parent().closest('div[id]');
				//var product_deal = $(closest).find('ul.size-filter-qty').find('li.active').data('productdeal');
				$.ajax({
					type: "POST",
					data:{client_request_status:client_request_status,client_request_from:client_request_from,client_request_to:client_request_to,client_request_uuid:client_request_uuid},
					url: "<?php echo base_url(); ?>Profile/update_status",
					success: function(result) {
					result = JSON.parse(result);
						if(parseFloat(result.status) > 0 ){
							var res = result.results;
							$.each(res, function(i, itemsingle) {
								$(closest).find('.expresspopup').remove();
								var text = '<a href="#" uuid="'+client_request_to+'" style="bg-color:green !important" class="clspending">pending</a>';
								$(closest).find('.div_profile').append(text);
						});
						}
				}
			});
			});
		

	  $(document).ready(function() {
			   $('#search_button').trigger('click');
	  });
	  $(document).on("click","#search_button",function() {
		  var row_serach_profile =  '<div class="col-md-12"><h4>Matches Based on Your Partner Preferences</h4><h5>Broaden Your Partner Preferences for More Results</h5></div>';
		  var search_martial_status   ='<?php echo $profile->p_marital;?>';
		  var search_caste = '<?php echo $profile->p_caste;?>';
		  var search_citizenship =  '<?php echo $profile->p_citizenship;?>';
		  var search_city ='<?php echo $profile->p_city;?>';
		  var search_country = '<?php echo $profile->p_country;?>';
		  var search_division = '<?php echo $profile->p_division;?>';
		  var search_income = '<?php echo $profile->p_income;?>';
		  var search_education = '<?php echo $profile->p_highest_education;?>';
		  var search_occupation = '<?php echo $profile->p_occupation;?>';
		  var search_physical_status = '<?php echo $profile->p_physical;?>';
		  var search_religion = '<?php echo $profile->p_religion;?>';
		  var search_state = '<?php echo $profile->p_state;?>';
		  var search_sub_caste ='<?php echo $profile->p_subcaste;?>';
		  
		   var search_district = '<?php echo $profile->p_district;?>';
		  var search_denomination = '<?php echo $profile->p_denomination;?>';
		  var search_employed_in ='<?php echo $profile->p_employed_in;?>';
		 // alert('search_martial_status'+search_martial_status);
		  //alert('search_caste'+search_caste);
		 // alert('search_citizenship'+search_citizenship);
		 // alert('search_city'+search_city);
		 // alert('search_country'+search_country);
		 // alert('search_division'+search_division);
		 // alert('search_education'+search_education);
		 // alert('search_occupation'+search_occupation);
		 // alert('search_physical_status'+search_physical_status);
		 // alert('search_religion'+search_religion);
		 // alert('search_state'+search_state);
		 // alert('search_sub_caste'+search_sub_caste);
		  $.ajax({
             url: "<?php echo base_url(); ?>Profile/SearchProduct",
			 type:"POST",
			 data:{search_sub_caste:search_sub_caste,search_state:search_state,search_religion:search_religion,search_physical_status:search_physical_status,search_occupation:search_occupation,search_income:search_income,search_education:search_education,search_division:search_division,search_martial_status:search_martial_status,search_caste:search_caste,search_citizenship:search_citizenship,search_city:search_city,search_country:search_country},
             async:false,
             success: function(result) {
				$.each(JSON.parse(result), function(i, itemsingle) {
					var clsbtn = '';
					if(itemsingle.client_request_status === 'pending'){
						clsbtn = 'clspending';
					}
					if(itemsingle.client_request_status === 'accepted'){
						clsbtn = 'clsaccepted';
					}
					if(itemsingle.client_request_status === 'rejected'){
						clsbtn = 'clsrejected';
					}
					row_serach_profile = row_serach_profile + '<div id= "div_profile" class="col-md-4"><div class="row inner_matchprofile"><div class="col-md-4"> <a href = "<?php echo base_url(); ?>Profile/ViewProfile/'+itemsingle.profile_uuid+'"><img src="<?php echo base_url();?>uploads/profile/'+itemsingle.pro_image+'"></a> </div>';
					row_serach_profile = row_serach_profile + ' <div class="col-md-8 div_profile"> <h3>'+itemsingle.profile_name+'</h3> <p>'+itemsingle.occupation_name+'</p><p>'+itemsingle.high_education_name+'</p>';
					row_serach_profile = row_serach_profile + ' <p>Age: '+itemsingle.age+' | Mother Tongue: '+itemsingle.mother_name+'</p><p>Current Location: '+itemsingle.country_name+', '+itemsingle.state_name+'</p><p>Religion: '+itemsingle.religion_name+' | Caste: '+itemsingle.caste_name+'</p>  ';
					if(parseFloat(itemsingle.reqstatus) < 1  ){ 
						<?php $profile_uuid = $this->session->userdata('uuid');	 if(isset($profile_uuid) ){?>
							row_serach_profile = row_serach_profile  +'<a href="#" uuid = "'+itemsingle.profile_uuid+'" class="expresspopup" data-toggle="modal" data-target="#expressmatch">Express Interest</a>';
						<?php } ?>
					}else{
						<?php $profile_uuid = $this->session->userdata('uuid');	 if(isset($profile_uuid) ){?>
							if(itemsingle.p_uuid === itemsingle.client_request_from){
								row_serach_profile = row_serach_profile  +'<a href="#" uuid = "'+itemsingle.profile_uuid+'" style = "bg-color:green !important" class="'+clsbtn+'" >'+itemsingle.client_request_status+'</a>';
							 }else if(itemsingle.p_uuid === itemsingle.client_request_to){
								if(itemsingle.client_request_status === 'pending'){
									row_serach_profile = row_serach_profile  + '<a href="#" uuid = "'+itemsingle.profile_uuid+'"  status="accepted"  class="intrestpopup">Accept</a>';
								}else{
									row_serach_profile = row_serach_profile  +'<a href="#" uuid = "'+itemsingle.profile_uuid+'" style = "bg-color:green !important" class="'+clsbtn+'" >'+itemsingle.client_request_status+'</a>';
								}
							 }
						<?php } ?>
					}
					row_serach_profile = row_serach_profile + ' </div> </div>  </div>';
			   });
			   $('.row_serach_profile').html(row_serach_profile);
             }

         });
	  });
		  
</script>
