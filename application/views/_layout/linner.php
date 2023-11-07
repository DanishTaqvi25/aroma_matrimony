<div class="linner">
    <div class="row">
        <span class="namtit"><?php echo $customer->customerName; ?></span>
    </div>
    <hr style="height:3px;border:none;background-color:#ededed;">
    <div class="row mnavit mnavitwithsub">
        Account Settings
    </div>
    <div class="row mnavsub">
        <a class="regbtn" style="color:#000;" href="<?php echo base_url(); ?>profile/myprofile">Personal Information</a>
    </div>
    <div class="row mnavsub">
        <a class="regbtn" style="color:#000;" href="<?php echo base_url(); ?>profile/manageaddress">Manage Address</a>
    </div>
    <div class="row mnavsub">
        <a class="regbtn" style="color:#000;" href="<?php echo base_url(); ?>profile/changepassword">Change Password</a>
    </div>
    <hr>
    <div class="row mnavit">
        <a class="regbtn" style="color:#000;" href="<?php echo base_url(); ?>profile/myorders">My Orders</a>
    </div>
    <div class="row mnavit">
        <a class="regbtn" style="color:#000;" href="#" onclick="logout()">Logout</a>
    </div>
</div>