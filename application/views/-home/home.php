
    


<section class="banner">
  <div class="container" style="display:none;">
    <div class="row">
      <div class="col-md-1">
        
      </div>
      <div class="col-md-10">
        <div class="bannerform">
          <h3>No. 1 Matrimony Service for Christians | Register Free</h3>
          <h4>Meet your Christian soulmate here!</h4>
          <form>
            <div class="form-group">
              <label>Matrimony Profile for</label>
              <select name="home_profile_for" style ="width:100%;height:30px;border:1px solid #d7d7d7;    font-size: 13px;"  id="home_profile_for" class="">
                         <option>Myself</option>
                         <option>Daughter</option>
                         <option>Son</option>
                         <option>Brother</option>
                         <option>Sister</option>
                         <option>Friend</option>
             </select>
            </div>
            <div class="form-group">
              <label>Enter Name</label>
              <input type="text" name="home_profile_name" id ="home_profile_name">
            </div>
            <div class="form-group">
              <label>Country Code</label>
              <input type="text" name="countrycode" placeholder="+91">
            </div>
            <div class="form-group">
              <label>Phone Number</label>
              <input type="tel" name="home_mobile" id ="home_mobile" >
            </div>
         <a id = "btnregister" href="#" data-toggle="modal" data-target="#reg" data-dismiss="modal" class="reg"><button type="button">Register Now</button></a>   
          </form>
        </div>
      </div>
      <div class="col-md-1">
        
      </div>
    </div>
  </div>
</section>

<section class="trust_icons">
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <div class="inner_ti">
          <img src="images/trust-icon.png">
          <h3>Trust</h3>
          <p>Built on 20 Years of Trust</p>
        </div>
      </div>
	  
      <div class="col-md-4">
        <div class="inner_ti">
          <img src="images/leading_img.png">
          <h3>Leading</h3>
          <p>Matrimony Site for Christians</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="inner_ti">
          <img src="images/genuine.png">
          <h3>Genuine</h3>
          <p>100% Genuine Verified Profiles</p>
        </div>
      </div>
    </div>
  </div>
</section>


<section class="active_profile">
  <div class="container">
    <div class="row ">
      <div class="col-md-12">
        <h3>Active Profiles</h3>
        <p>Latest Active Profiles on Aroma Matrimonial</p>
      </div>

      <div class="col-md-12 clsactive_profile">
        
      </div>
    </div>
  </div>
</section>

<script>
	
	 $(document).ready(function() {
				var clsactive_profile = ' ';
				$.ajax({
						url: "<?php echo base_url(); ?>Homecontrol/active_profile",
						async:false,
						success: function(result) {
							$.each(JSON.parse(result), function(i, itemsingle) {
								clsactive_profile = clsactive_profile + '<div class="inner_profile"> <img style="height:200px;" src="<?php echo base_url(); ?>uploads/profile/'+itemsingle.pro_image+'"></div>';
							});
							$('.clsactive_profile').html(clsactive_profile);
						}

					});
					
	<?php if(isset($banner['banner_image'])){ ?>
					var s_url = '<?php echo base_url(); ?>';
					//s_url = s_url.replace("site", "admin");
					s_url = s_url + 'admin/';
					var image = s_url+'/uploads/banner/'+'<?php echo $banner["banner_image"];?>';
					$(".banner").css("background-image", "url('"+image+"')");
		//$('.banner').css('background-image',s_url+'/uploads/banner/'+'<?php echo $banner["banner_image"];?>');
	<?php }else{?>
					
	<?php }?>
	 });
</script>

