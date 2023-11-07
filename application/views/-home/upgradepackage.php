<?php
$text_remain = '';
$current = '';
$is_upgrade =0;
$is_free_upgrade = 0;
if((float)$current_package[0]->cnt < 1 ){
	$is_upgrade = 1;
	$is_free_upgrade = 1;
}else{
	$no_date = $current_package[0]->no_date;
	if((float)$no_date == 0 ){
		$no_date = 1;
	}else if((float) $no_date < 0 ){
		$no_date = 0;
	}
	$text_remain = 'You have left ' . ($current_package[0]->client_package_viewable_profile - $current_package[0]->client_package_viewed_profile) . ' Profiles and '. ($no_date) .' Days';
	$current = $current_package[0]->client_package;
	$is_upgrade = $current_package[0]->is_upgrade;
	$is_free_upgrade = $current_package[0]->is_upgrade;
	if((float) $current_package[0]->is_upgrade < 1 && (float) $current_package[0]->client_package_is_default > 0  ){
		$is_upgrade = 1;
		$is_free_upgrade = 0;
	}
}
?>
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
        <div class="row right_match">
          <div class="col-md-12">
            <h4>Upgrade Your Package</h4>
			
          </div>
		  <?php if($text_remain !=''){?>
			<div class="col-md-12">
				<h4><?php echo $text_remain;?></h4>
			</div>
			<?php } ?>
       </div>

       <div class="row packages">
		
		<?php $i= 0; $package_bg = 'silveryellow'; foreach($package as $item){ $bg = $item->package_bgcolor; if($current == $item->package_uuid){ $bg = 'current_pack';}else if($package_bg== 'silveryellow'){$package_bg = 'silvergrey';}else if($package_bg== 'silvergrey'){$package_bg = 'silveryellow';}?>
			<div class="col-md-3">
				<div class="inner_packages" style="background-color:<?php echo $bg;?>">
					<h4><?php echo $item->package_name;?></h4><br />
					<img style="max-width:150px;" src="<?= base_url(); ?>admin/uploads/package/<?php echo $item->package_image;?>"><br />
					<p>Validity:<?php echo $item->package_no_of_days;?> Days <br /><?php echo $item->package_no_of_profile;?> Profiles</p>
	
					<h3>₹ <?php echo $item->package_amount;?><br /><span style="font-size:10px;">Inclusive of GST</span></h3>
					
					<?php if((float) $item->package_is_default > 0  ){ ?>
					
						<a uuid = "<?php echo $item->package_uuid?>"  href="#" class="expressint <?php if((float) $is_free_upgrade > 0 ){echo 'subscribe';}else {echo 'disabled';} ?>">Subscribe</a>
					
					<?php }else{?>
					
						<a uuid = "<?php echo $item->package_uuid?>"  href="#" class="expressint <?php if((float) $is_upgrade > 0 ){echo 'subscribe';} else {echo 'disabled';}?>">Subscribe</a>
					
					<?php }?>
				</div>
			</div>
		<?php }?>
         

         
  </div>
</div>
</div>
</section>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>

<script>
	$('.disabled').click(function (event) {
							$('#pSuccess').html('"You already have an active Package."');
							$('#ModalSuccess').modal('show');
							setTimeout(function() {
								$('#ModalSuccess').modal('hide');
						}, 2000);
	});
	$(document).on("click",".subscribe",function() {
		<?php $profile_uuid = $this->session->userdata('uuid');	 if(isset($profile_uuid) ){?>
			var profile_uuid = '<?php echo $profile_uuid; ?>';
			var upgrade_status = 1;
			$.ajax({
				url: "<?php echo base_url(); ?>Profile/check_upgrade_package",
                async:false,
                success: function(result) {
					result = JSON.parse(result);
					if(parseFloat(result.status) > 0  ){
						$.each(result.package, function(i, itemsingle) {
							if(parseFloat(itemsingle.cnt)> 0  ){
								if(parseFloat(itemsingle.is_upgrade) < 1 &&  parseFloat(itemsingle.client_package_is_default) < 1 ){
									upgrade_status = 0;
								}
							}
						});
					}
                }

            });
			if(parseFloat(upgrade_status) > 0 ){
				var amount = 0;
				var is_continue = 1;
				var uuid = $(this).attr('uuid');
				var package_uuid = uuid;
				$.ajax({
					url: "<?php echo base_url(); ?>Profile/get_package_byId/"+uuid,
					async:false,
					success: function(result) {
						result = JSON.parse(result);
						if(result.length < 1 ){
							is_continue = 0;
						}else{
							$.each(result, function(i, itemsingle) {
								amount = itemsingle.package_amount;
								package_uuid = itemsingle.package_uuid;
							});
						}
					}

				});
				if(parseFloat(is_continue) > 0  ){
							var SITEURL = '<?php echo base_url(); ?>';
							var totalAmount = parseFloat(amount);
							if( parseFloat(amount) > 0 ){
								var options = {
									"key": "rzp_live_L7mjdhWGpXbtsS",
									"amount": (totalAmount * 100), // 2000 paise = INR 20
									"name": "Aroma Matrimony",
									"description": "Payment",
									"image": "https://aromamatrimony.com/images/logo.png",
									"handler": function(response) {
									$.ajax({
										url: SITEURL + 'Profile/update_package',
										type: 'post',
										data: {
											profile_uuid: profile_uuid,
											package_uuid:package_uuid,
											amount:amount				
									},
									success: function(Onj) {
                            
										window.location.reload();


									}
									});
								},
								"theme": {
									"color": "#528FF0"
								}
							};
						var rzp1 = new Razorpay(options);
						rzp1.open();
					}else{
						$.ajax({
								url: SITEURL + 'Profile/update_package',
								type: 'post',
								data: {
									profile_uuid: profile_uuid,
									package_uuid:package_uuid,
									amount:amount				
							},
							success: function(Onj) {
                            
								window.location.reload();


							}
						});
					}
					
				}
			}
		<?php } ?>
	
	});
	
</script>