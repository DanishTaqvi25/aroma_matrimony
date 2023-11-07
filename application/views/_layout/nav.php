<?php
$profile_name = $this->session->userdata('name');
?>

<header id="header">
  <div class="container">
    <nav class="navbar navbar-expand-md navbar-light">
      <a class="navbar-brand" href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>assets/images/logo.png"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">

        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href="<?php echo base_url(); ?>">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url(); ?>products">Products</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url(); ?>offers">Offers</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url(); ?>aboutus">About Us</a>
          </li>
          <li class="nav-item mr_rgt">
            <a class="nav-link" href="<?php echo base_url(); ?>contactus">Contact Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="search"><img src="<?php echo base_url(); ?>assets/images/search.png"></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url(); ?>cart"><img src="<?php echo base_url(); ?>assets/images/cart.png"><span class="cart_items" id="cntcart"></span></a>
          </li>
          
          <?php if (!isset($profile_name)) { ?>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url(); ?>login"><img src="<?php echo base_url(); ?>assets/images/account.png"></a>
            </li>
          <?php } else { ?>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url(); ?>profile/myprofile"><img src="<?php echo base_url(); ?>assets/images/account.png"></a>
            </li>
          <?php } ?>
        </ul>
        <div class="search_bar">
          <i class="fa fa-search"></i> <input type="text" name="Search" id="searchall" placeholder="Search Products">
          <i id="toparw" class="fa fa-sort-up"></i>
        </div>
      </div>
    </nav>
  </div>
</header>


<div class="modal fade in" id="modaladdCart" tabindex="-1" role="dialog" aria-labelledby="onpageloadLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg addtocartpopcont" role="document">
    <div class="modal-content">
      <div class="container atcpop">
        <div class="row">
          <div class="col-md-4">
            <img id="imagesc" src="https://demos.igensoftware.com/lazza/admin/uploads/product/Pineapple-Plain-Bulk-Pack.jpg" style="width: 100%;">
          </div>
          <div class="col-md-8">
            <div class="row pname">Pineapple Plain Bulk Pack - ₹ 580</div>
            <div class="row">
              <div class="input-group" style="width:50%">
                <span class="input-group-btn">
                  <button class="btn btn-white btn-minuse atcbtnbg" type="button">-</button>
                </span>
                <input type="hidden" id="stockvalue" />
                <input type="hidden" name="add_cart_item" id="add_cart_item" class="add_cart_item" value="0" />

                <input type="text" class="form-control no-padding add-color text-center height-25" id="add_cart_qty" maxlength="3" value="0">
                <span class="input-group-btn">
                  <button class="btn btn-red btn-pluss atcbtnbg" type="button">+</button>
                </span>
              </div>

            </div>
            <style>
              .addtocartbtn {
                background: #000;
                color: #fff;
                border: none;
                margin-top: 15px !important;
                font-size: 12px;
                text-transform: uppercase;
                padding: 5px 10px;
                border-radius: 4px;
                display: block;
              }

              .addtocartpopcont {
                max-width: 500px;
              }

              .atcpop {
                padding-top: 25px;
                padding-bottom: 25px;
              }

              .atcbtnbg {
                background-color: #efefef;
              }
            </style>
            <div class="row" style="text-align:left;">
              <button class="addtocartbtn proced_addtocart">Add to Cart
            </div>
            <span id="outofstock"></span>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
  $(document).ready(function() {
    $('.btn-pluss').click(function() {
      var val = $("#add_cart_qty").val()
      val = parseInt(val) + 1;
      $("#add_cart_qty").val(val)
    })
    $('.btn-minuse').click(function() {
      var val = $("#add_cart_qty").val()
      val = parseInt(val) - 1;
      if (val <= 1) {
        $("#add_cart_qty").val(1)
      } else {
        $("#add_cart_qty").val(val)
      }

    })
  })
</script>