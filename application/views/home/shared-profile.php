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
		<?php foreach($shared_profile as $Shared_by_details){?>
			<div class="col-md-12 shrared_profile shrared_profile<?php echo $Shared_by_details['shared_profile_uuid'];?>">
				<div class="row">
					<div class="col-md-1">
					<img src="<?php echo base_url();?>uploads/profile/<?php echo $Shared_by_details['pro_image'] ;?>">
					</div>
					<div class="col-md-7 padlft">
					<h4>This Profile is Shared by You</h4>
					<p><?php echo $Shared_by_details['profile_name'] ;?></p>
					<p>Age: <?php echo $Shared_by_details['age'] ;?> | <?php echo $Shared_by_details['country_name'] ;?> |<?php echo $Shared_by_details['country_name'] ;?></p>
					<p>on 17 June 2021<br /></p>
					</div>
					<div class="col-md-4">
					<a href="#" onclick = "unlinkSharedProfile('<?php echo $Shared_by_details['shared_profile_uuid'];?>')" >Unshare to Remove this tag</a>
					
					</div>
					<div class="col-md-12">
					<a href="<?php echo base_url();?>Profile/viewProfile/<?php echo $Shared_by_details['shared_profile_profile'] ;?>"  >View Profile</a>
					
					</div>
					
				</div>  
			</div>
		<?php } ?>
			
          

        </div>

    </div>


  </div>
</div>
</section>





<div class="bggray"></div>




<script>
	
 
</script>