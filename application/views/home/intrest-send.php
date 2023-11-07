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
            <h4>Interest Send</h4>
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
				$.ajax({
					type: "POST",
					data:{client_request_status:client_request_status,client_request_from:client_request_from,client_request_to:client_request_to,client_request_uuid:client_request_uuid},
					url: "<?php echo base_url(); ?>Profile/update_status",
					success: function(result) {
					$.each(JSON.parse(result), function(i, itemsingle) {
					
					});
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
				$.ajax({
					type: "POST",
					data:{client_request_status:client_request_status,client_request_from:client_request_from,client_request_to:client_request_to,client_request_uuid:client_request_uuid},
					url: "<?php echo base_url(); ?>Profile/update_status",
					success: function(result) {
					$.each(JSON.parse(result), function(i, itemsingle) {
					
					});
				}
			});
		});
		
	 $.ajax({
             url: "<?php echo base_url(); ?>Profile/ProfileIntrest/send",
			 type:"POST",
			 data:{},
             async:false,
             success: function(result) {
				var row_serach_profile = '<div class="col-md-12"><h4>Interest Send</h4> </div>';
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
					row_serach_profile = row_serach_profile + '<div class="col-md-4"><div class="row inner_matchprofile"><div class="col-md-4"> <a href = "<?php echo base_url(); ?>Profile/ViewProfile/'+itemsingle.profile_uuid+'"><img src="<?php echo base_url();?>uploads/profile/'+itemsingle.pro_image+'"></a> </div>';
					row_serach_profile = row_serach_profile + ' <div class="col-md-8"> <h3>'+itemsingle.profile_name+'</h3><p>'+itemsingle.occupation+'</p><p>'+itemsingle.high_education_name+'</p>';
					row_serach_profile = row_serach_profile + ' <p>Age: '+itemsingle.age+' | Mother Tongue: '+itemsingle.mother_name+'</p><p>Current Location: '+itemsingle.country_name+', '+itemsingle.state_name+'</p><p>Religion: '+itemsingle.religion_name+' | Caste: '+itemsingle.caste_name+'</p> ';
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
		  
</script>
