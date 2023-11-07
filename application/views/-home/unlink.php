

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
            
         <div class="col-md-12">
             <img src="<?= base_url(); ?>images/unlinked.jpg" class="img-responsive" style="width:100%;">
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
                <p>Last Login: 17 July 2021</p>
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

  
 
</script>