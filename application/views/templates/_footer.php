<section class="success_stories">
  <div class="container">
  
    <div class="row cls_success_stories">
       <div class="col-md-12">
        <h3>Success Stories</h3>
        <h4>We have found our partners on Aroma Matrimony</h4>
      </div>
	  
	  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
      
    </div>
  </div>
</section>
<footer>
  <div class="container">
    <div class="row">

    <div class="col-md-4">
      <div class="footer_inner">
        <img src="<?= base_url(); ?>images/logo.png">
        <p>Aroma Matrimony is providing matrimonial services for Christian Brides & Grooms for last one decades in india. Register with us for FREE to find a partner from your own community, Take advantage of our user friendly search features to find a bride or groom who matches your preferences, Join us and begin your happy journey today</p>
      <p>GSTIN: 26ABWFA4203C1ZP</p>
      </div>
    </div>

    <div class="col-md-4">
      <div class="footer_inner middle">
        <h4>Quick Links</h4>
        <ul>
          <li><a href="#" data-toggle="modal" data-target="#login">Login</a></li>
          <li><a data-toggle="modal" data-target="#reg" href="#">Register</a></li>
          <li><a href="<?= base_url(); ?>pages/about">About Us</a></li>
          <li><a href="<?= base_url(); ?>pages/contact">Contact Us</a></li>
          <li><a href="<?= base_url(); ?>pages/terms">Terms & Conditions</a></li>
          <li><a href="<?= base_url(); ?>pages/refunds">Refund Policy</a></li>
        </ul>
      </div>
    </div>

    <div class="col-md-4">
      <div class="footer_inner middle">
        <h4>Social Media</h4>
        <p><img src="<?php echo base_url();?>images/wp.png"> +91- 87-59-59-2020</p>
        <p><img src="<?php echo base_url();?>images/mail.png"> aromamatrimony2020@gmail.com</p>
        <a href="https://play.google.com/store/apps/details?id=com.igen.aroma" target="_blank"><img style="max-width: 150px;" src="<?php echo base_url();?>images/playstore.png"></a>
      </div>
    </div>
   </div>
  </div>
  <style>
      .button1 {
  display: block;
  background-color:red;
}
.button2 {
  display: block;
  background-color:green;
}
#music1 {
    background-color: red;
    color: white;
    display: block;
    height: 40px;
    line-height: 40px;
    text-decoration: none;
    width: 100%;
    text-align: center;
}
#music2 {
    background-color: green;
    color: white;
    display: block;
    height: 40px;
    line-height: 40px;
    text-decoration: none;
    width: 100%;
    text-align: center;
}
@media screen and (min-width: 480px) {
  .btbar {
      display:none;
  }
  
}
@media screen and (max-width: 480px) {
  .btbar {
       position: fixed;
  left: 0;
  bottom: 0;
  width: 100%;
  background-color:#eeeeee;
  z-index:1000;
  }
  
}

  </style>
  <div class="row btbar">
      <div style="width:50%;">
         <a id="music1"  href="#" data-toggle="modal" data-target="#reg" data-dismiss="modal" class="reg">Register</a>
      </div>
      <div style="width:50%;">
          <a id="music2" href = "#" data-toggle="modal" data-dismiss="modal" data-target="#login">Login</a>
      </div>
  </div>
</footer>

<section class="copyright">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <p>(©) Aroma Matrimony | Site Developed by Igen Software Solutions</p>
      </div>
      <div class="col-md-6">
        <ul>
          <li><a href="<?= base_url(); ?>pages/terms">Terms & Conditions</a></li>
          <li class="phide">|</li>
          <li><a href="<?= base_url(); ?>pages/terms">Privacy Policy</a></li>
        </ul>
      </div>
    </div>
  </div>
</section>

   
          
          <script>
               var is_submited = 0 ;
				var my_otp = '';
				var is_confirmed = 0;
                 function getallmother(){
                  var txt_mother = '<option value="">Select Mother Tongue</option>';
                  $.ajax({
                    url: "<?php echo base_url(); ?>Homecontrol/getallmother",
                    async:false,
                    success: function(result) {
                      //console.log(result);
                      $.each(JSON.parse(result), function(i, itemsingle) {
                        txt_mother = txt_mother + '<option value="'+itemsingle.mother_uuid+'">'+itemsingle.mother_name+'</option>';
                      });
                      $('#mother').html(txt_mother);
                    }

                  });
                }

				//function getall_p_religion(){
                //  var txt_religion = '<option value="">Select Religion</option>';
                //  $.ajax({
                  //  url: "<?php echo base_url(); ?>Homecontrol/getall_p_religion",
                  //  async:false,
                  //  success: function(result) {
                    //  console.log(result);
                   //   $.each(JSON.parse(result), function(i, itemsingle) {
                     //   txt_religion = txt_religion + '<option value="'+itemsingle.religion_uuid+'">'+itemsingle.religion_name+'</option>';
                   //   });
                      //$('#religion').html(txt_religion);
                    //  $('#p_religion').html(txt_religion);
                   // }

                 // });
               // }



                 function getallreligion(){
                  var txt_religion = '<option value="">Select Religion</option>';
                  $.ajax({
                    url: "<?php echo base_url(); ?>Homecontrol/getallreligion",
                    async:false,
                    success: function(result) {
                     // console.log(result);
                      $.each(JSON.parse(result), function(i, itemsingle) {
                        txt_religion = txt_religion + '<option value="'+itemsingle.religion_uuid+'">'+itemsingle.religion_name+'</option>';
                      });
          						$('#religion').html(txt_religion);
          						$('#p_religion').html(txt_religion);
          						$('#search_religion').html(txt_religion);
                    }

                  });
                }


                $(document).on("change","#religion",function() {
                     var txt_caste = '<option value="">Select Category</option>';
                     var religion  = $('#religion').val();
					 $.ajax({
                      url: "<?php echo base_url(); ?>Homecontrol/getallreligion_cast/"+religion,
                      async:false,
                      success: function(result) {
                      //  console.log(result);
                        $.each(JSON.parse(result), function(i, itemsingle) {
                          txt_caste = txt_caste + '<option value="'+itemsingle.caste_uuid+'">'+itemsingle.caste_name+'</option>';
                        });
                        $('#sub_caste_parent').html(txt_caste);
                       // $('#p_sub_caste_parent').html(txt_caste);
                      }

                    });
                });


                $(document).on("change","#sub_caste_parent",function() {
                     var txt_subcaste = '<option value="">Select Sub Category</option>';
                     var caste  = $('#sub_caste_parent').val();
                    $.ajax({
                      url: "<?php echo base_url(); ?>Homecontrol/getallreligion_sub/"+caste,
                      async:false,
                      success: function(result) {
                      //  console.log(result);
                        $.each(JSON.parse(result), function(i, itemsingle) {
                          txt_subcaste = txt_subcaste + '<option value="'+itemsingle.sub_caste_uuid+'">'+itemsingle.sub_caste_name+'</option>';
                        });
                        $('#subcaste').html(txt_subcaste);
                        //$('#p_subcaste').html(txt_subcaste);
                      }

                    });
                });


                function getalldivision(){
                  var txt_division = '<option value="">Select Division</option>';
                  $.ajax({
                    url: "<?php echo base_url(); ?>Homecontrol/getalldivision",
                    async:false,
                    success: function(result) {
                    //  console.log(result);
                      $.each(JSON.parse(result), function(i, itemsingle) {
                        txt_division = txt_division + '<option value="'+itemsingle.division_uuid+'">'+itemsingle.division_name+'</option>';
                      });
                      $('#division').html(txt_division);
                      $('#p_division').html(txt_division);
                      $('#search_division').html(txt_division);
                    }

                  });
                }


                function getallcountry(){
                  var txt_country = '<option value="">Select country</option>';
                  $.ajax({
                    url: "<?php echo base_url(); ?>Homecontrol/getallcountry",
                    async:false,
                    success: function(result) {
                    //  console.log(result);
                      $.each(JSON.parse(result), function(i, itemsingle) {
                        txt_country = txt_country + '<option value="'+itemsingle.country_uuid+'">'+itemsingle.country_name+'</option>';
                      });
                      $('#country').html(txt_country);
                      $('#t_country').html(txt_country);
          					  $('#p_country').html(txt_country);
          					  $('#search_country').html(txt_country);
                    }

                  });
                }
                function isEmail(email) {
  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  return regex.test(email);
}
                $(document).on("change","#email",function() {
                  $('#email').attr('style','');
                    $('#span_email').html('');
                    var email = $(this).val();
                    if(email !== ''){
                      if(isEmail(email)){
							$.ajax({
								url: "<?php echo base_url(); ?>Homecontrol/checkmail",
								async:false,
								type:"POST",
								data:{email:email},
								success: function(result) {
									
									if(parseFloat(result) > 0 ){
										$('#email').val('');
										$('#email').attr('style','border-color:red');
										$('#span_email').html('email already exist');
									}
								}

							});

                      }else{
                        $('#email').val('');
                        $('#email').attr('style','border-color:red');
                        $('#span_email').html('please enter valid emailId');
                      }

                    }
                });

                $(document).on("change","#country",function() {
                     var txt_state = '<option value="">Select State</option>';
                     var country  = $('#country').val();
                    $.ajax({
                      url: "<?php echo base_url(); ?>Homecontrol/getallstate/"+country,
                      async:false,
                      success: function(result) {
                       // console.log(result);
                        $.each(JSON.parse(result), function(i, itemsingle) {
                          txt_state = txt_state + '<option value="'+itemsingle.state_uuid+'">'+itemsingle.state_name+'</option>';
                        });
                        $('#state').html(txt_state);
                       // $('#p_state').html(txt_state);
                      }

                    });
                });


                $(document).on("change","#state",function() {
                     var txt_district = '<option value="">Select District</option>';
                     var state  = $('#state').val();
                    $.ajax({
                      url: "<?php echo base_url(); ?>Homecontrol/getalldistrict/"+state,
                      async:false,
                      success: function(result) {
                       // console.log(result);
                        $.each(JSON.parse(result), function(i, itemsingle) {
                          txt_district = txt_district + '<option value="'+itemsingle.district_uuid+'">'+itemsingle.district_name+'</option>';
                        });
                        $('#district').html(txt_district);
                       // $('#p_district').html(txt_district);
                      }
					  
                    });
                });


                 function getallcitizenship(){
                  var txt_citizenship = '<option value="">Select Citizenship</option>';
                  $.ajax({
                    url: "<?php echo base_url(); ?>Homecontrol/getallcitizenship",
                    async:false,
                    success: function(result) {
                    //  console.log(result);
                      $.each(JSON.parse(result), function(i, itemsingle) {
                        txt_citizenship = txt_citizenship + '<option value="'+itemsingle.citizenship_uuid+'">'+itemsingle.citizenship_name+'</option>';
                      });
                      $('#citizenship').html(txt_citizenship);
                      $('#p_citizenship').html(txt_citizenship);
                      $('#search_citizenship').html(txt_citizenship);
                    }

                  });
                }


                 function getallcity(){
                  var txt_city = '<option value="">Select City</option>';
                  $.ajax({
                    url: "<?php echo base_url(); ?>Homecontrol/getallcity",
                    async:false,
                    success: function(result) {
                     // console.log(result);
                      $.each(JSON.parse(result), function(i, itemsingle) {
                        txt_city = txt_city + '<option value="'+itemsingle.city_uuid+'">'+itemsingle.city_name+'</option>';
                      });
                     // $('#city').html(txt_city);
                     // $('#t_city').html(txt_city);
                      //$('#p_city').html(txt_city);
                     // $('#search_city').html(txt_city);
                    }

                  });
                }


                 $(document).on("change","#search_religion",function() {
                     var txt_caste = '<option value="">Select Category</option>';
                     var religion  = $('#search_religion').val();
                    $.ajax({
                      url: "<?php echo base_url(); ?>Homecontrol/getall_p_religion_cast/"+religion,
                      async:false,
                      success: function(result) {
                   //     console.log(result);
                        $.each(JSON.parse(result), function(i, itemsingle) {
                          txt_caste = txt_caste + '<option value="'+itemsingle.caste_uuid+'">'+itemsingle.caste_name+'</option>';
                        });
                        $('#search_sub_caste').html('');
                        $('#search_caste').html(txt_caste);
                      }

                    });
                });

                $(document).on("change","#p_religion",function() {
                     var txt_caste = '<option value="">Select Category</option>';
                     var religion  = $('#p_religion').val();
                    $.ajax({
                      url: "<?php echo base_url(); ?>Homecontrol/getall_p_religion_cast/"+religion,
                      async:false,
                      success: function(result) {
                     //   console.log(result);
                        $.each(JSON.parse(result), function(i, itemsingle) {
                          txt_caste = txt_caste + '<option value="'+itemsingle.caste_uuid+'">'+itemsingle.caste_name+'</option>';
                        });
                       // $('#sub_caste_parent').html(txt_caste);
                        $('#p_sub_caste_parent').html(txt_caste);
                      }

                    });
                });

				 $(document).on("change","#search_caste",function() {
                     var txt_subcaste = '<option value="">Select Sub Category</option>';
                     var caste  = $('#search_caste').val();
                    $.ajax({
                      url: "<?php echo base_url(); ?>Homecontrol/getall_p_religion_sub/"+caste,
                      async:false,
                      success: function(result) {
//console.log(result);
                        $.each(JSON.parse(result), function(i, itemsingle) {
                          txt_subcaste = txt_subcaste + '<option value="'+itemsingle.sub_caste_uuid+'">'+itemsingle.sub_caste_name+'</option>';
                        });
                        $('#search_sub_caste').html(txt_subcaste);
                      }

                    });
                });
				
				
                $(document).on("change","#p_sub_caste_parent",function() {
                     var txt_subcaste = '<option value="">Select Sub Category</option>';
                     var caste  = $('#p_sub_caste_parent').val();
                    $.ajax({
                      url: "<?php echo base_url(); ?>Homecontrol/getall_p_religion_sub/"+caste,
                      async:false,
                      success: function(result) {
                     //   console.log(result);
                        $.each(JSON.parse(result), function(i, itemsingle) {
                          txt_subcaste = txt_subcaste + '<option value="'+itemsingle.sub_caste_uuid+'">'+itemsingle.sub_caste_name+'</option>';
                        });
                        //$('#subcaste').html(txt_subcaste);
                        $('#p_subcaste').html(txt_subcaste);
                      }

                    });
                });

             
				 $(document).on("change","#search_country",function() {
                     var txt_state = '<option value="">Select State</option>';
                     var country  = $('#search_country').val();
                    $.ajax({
                      url: "<?php echo base_url(); ?>Homecontrol/getall_p_state/"+country,
                      async:false,
                      success: function(result) {
                     //   console.log(result);
                        $.each(JSON.parse(result), function(i, itemsingle) {
                          txt_state = txt_state + '<option value="'+itemsingle.state_uuid+'">'+itemsingle.state_name+'</option>';
                        });
                       $('#search_district').html('');
                        $('#search_state').html(txt_state);
                      }

                    });
                });
				
				
                $(document).on("change","#p_country",function() {
                     var txt_state = '<option value="">Select State</option>';
                     var country  = $('#p_country').val();
                    $.ajax({
                      url: "<?php echo base_url(); ?>Homecontrol/getall_p_state/"+country,
                      async:false,
                      success: function(result) {
                      //  console.log(result);
                        $.each(JSON.parse(result), function(i, itemsingle) {
                          txt_state = txt_state + '<option value="'+itemsingle.state_uuid+'">'+itemsingle.state_name+'</option>';
                        });
                        $('#p_state').html(txt_state);
                      }

                    });
                });
				
				 $(document).on("change","#t_country",function() {
                     var txt_state = '<option value="">Select State</option>';
                     var country  = $('#t_country').val();
                    $.ajax({
                      url: "<?php echo base_url(); ?>Homecontrol/getall_p_state/"+country,
                      async:false,
                      success: function(result) {
                       // console.log(result);
                        $.each(JSON.parse(result), function(i, itemsingle) {
                          txt_state = txt_state + '<option value="'+itemsingle.state_uuid+'">'+itemsingle.state_name+'</option>';
                        });
                        $('#t_state').html(txt_state);
                      }

                    });
                });



                $(document).on("change","#p_state",function() {
                     var txt_district = '<option value="">Select District</option>';
                     var state  = $('#p_state').val();
                    $.ajax({
                      url: "<?php echo base_url(); ?>Homecontrol/getall_p_district/"+state,
                      async:false,
                      success: function(result) {
                      //  console.log(result);
                        $.each(JSON.parse(result), function(i, itemsingle) {
                          txt_district = txt_district + '<option value="'+itemsingle.district_uuid+'">'+itemsingle.district_name+'</option>';
                        });
                        $('#p_district').html(txt_district);
						            $('#search_district').html('');
                      }

                    });
                });
				 $(document).on("change","#t_state",function() {
                     var txt_district = '<option value="">Select District</option>';
                     var state  = $('#t_state').val();
                    $.ajax({
                      url: "<?php echo base_url(); ?>Homecontrol/getall_p_district/"+state,
                      async:false,
                      success: function(result) {
                      //  console.log(result);
                        $.each(JSON.parse(result), function(i, itemsingle) {
                          txt_district = txt_district + '<option value="'+itemsingle.district_uuid+'">'+itemsingle.district_name+'</option>';
                        });
                        $('#t_district').html(txt_district);
                      }

                    });
                });
				
				$(document).on("change","#search_state",function() {
                     var txt_district = '<option value="">Select District</option>';
                     var state  = $('#search_state').val();
                    $.ajax({
                      url: "<?php echo base_url(); ?>Homecontrol/getall_p_district/"+state,
                      async:false,
                      success: function(result) {
                       // console.log(result);
                        $.each(JSON.parse(result), function(i, itemsingle) {
                          txt_district = txt_district + '<option value="'+itemsingle.district_uuid+'">'+itemsingle.district_name+'</option>';
                        });
                        $('#search_district').html(txt_district);
                      }

                    });
                });
				
				function getallhigheducation(){
					var txt_education = '<option value="">Select Highest Education</option>';
					$.ajax({
						url: "<?php echo base_url(); ?>Homecontrol/getallhigheducation",
						async:false,
						success: function(result) {
							$.each(JSON.parse(result), function(i, itemsingle) {
								txt_education = txt_education + '<option value="'+itemsingle.high_education_uuid+'">'+itemsingle.high_education_name+'</option>';
							});
							$('#p_highest_education').html(txt_education);
							$('#highest_education').html(txt_education);
							$('#search_education').html(txt_education);
						}

					});
				}
                function getalloccupation(){
                  var txt_occupation = '<option value="">Select Occupation</option>';
                  $.ajax({
                    url: "<?php echo base_url(); ?>Homecontrol/getalloccupation",
                    async:false,
                    success: function(result) {
                   //   console.log(result);
                      $.each(JSON.parse(result), function(i, itemsingle) {
                        txt_occupation = txt_occupation + '<option value="'+itemsingle.occupation_uuid+'">'+itemsingle.occupation_name+'</option>';
                      });
                      $('#p_occupation').html(txt_occupation);
					  $('#occupation').html(txt_occupation);
						          $('#search_occupation').html(txt_occupation);
                    }

                  });
                }
				
				function unlinkSharedProfile(uuid){
					$.ajax({
                    url: "<?php echo base_url(); ?>Profile/unlinkSharedProfile",
					type:"POST",
					data:{uuid:uuid},
                    async:false,
                    success: function(result) {
                      $('.shrared_profile'+uuid).remove();
                    }

                  });
				}

                function getall_t_state(){
                  var txt_state = '<option value="">Select state</option>';
                  $.ajax({
                    url: "<?php echo base_url(); ?>Homecontrol/getall_t_state",
                    async:false,
                    success: function(result) {
                   //   console.log(result);
                      $.each(JSON.parse(result), function(i, itemsingle) {
                        txt_state = txt_state + '<option value="'+itemsingle.state_uuid+'">'+itemsingle.state_name+'</option>';
                      });
                     // $('#country').html(txt_country);
                      $('#t_state').html(txt_state);
                    }

                  });
                }


                 function getall_t_district(){
                  var txt_district = '<option value="">Select District</option>';
                  $.ajax({
                    url: "<?php echo base_url(); ?>Homecontrol/getall_t_district",
                    async:false,
                    success: function(result) {
                    //  console.log(result);
                      $.each(JSON.parse(result), function(i, itemsingle) {
                        txt_district = txt_district + '<option value="'+itemsingle.district_uuid+'">'+itemsingle.district_name+'</option>';
                      });
                     // $('#country').html(txt_country);
                      $('#t_district').html(txt_district);
                    }

                  });
                }


                 
                                function changebtn(btn,btntext){
                                    $(btn).html(btntext);
                                }
                                // this is for common 
                                function ajax_upload(form, url, e, callback) {
                                    if (e != '') {
                                        e.preventDefault();
                                    }

                                   $.ajax({
                                        url: url,
                                        type: "post",
                                        data: new FormData(form),
                                        processData: false,
                                        contentType: false,
                                        cache: false,
                                        async: false,
                                        success: function(data) {
                                            if (typeof callback == "function")
                                                callback(data);
                                        }
                                    });
                                    

                                }

                                function ajax(form, url, e, callback) {
                                    if (e != '') {
                                        e.preventDefault();
                                    }

                                    $.ajax({
                                        url: url,
                                        type: "post",
                                        success: function(data) {
                                            if (typeof callback == "function")
                                                callback(data);
                                        }
                                    });
                                  
                                }

                                //function assign(id, value) {
                               //     $("#" + id).val(value);
                               // }


                                /* function datatableload(id, url) {
                                    $(id).dataTable().fnDestroy();
                                    $(id).DataTable({
                                        "serverSide": true,
                                        "ajax": {
                                            "url": url,
                                            "data": function(data) {
                                                console.log(data);
                                            }
                                        }
                                    });
                                }
                                */
                                function success(msg) {
                                    var notify = $.notify('<strong>' + msg + '</strong>', {
                                        allow_dismiss: true
                                    });
                                }

                                function error(msg) {
                                    var notify = $.notify('<strong>' + msg + '</strong>', {
                                        allow_dismiss: true,
                                        type: 'danger'
                                    });
                                }
        

        $('body').on('click', '.toggle-password-eye', function (e) {
    let password = $('#password');

    if (password.attr('type') === 'password') {
        password.attr('type', 'text');
        $(this).addClass('fa-eye').removeClass('fa-eye-slash');
    } else {
        password.attr('type', 'password');
        $(this).addClass('fa-eye-slash').removeClass('fa-eye');
    }
})
                  
				$(document).on("change","#password",function() {
					var inputtxt = $(this).val();
					if(inputtxt === ''){
							inputtxt = '11';
						}
						
						var passw=  /^[A-Za-z]\w{40}$/;
						if(inputtxt.match(passw)) 
						{ 
						}
						else
						{ 
							//$('#password').val('');
							//$('#password_check').attr('style','color:red');
						}
					
				});
				function CheckPassword(inputtxt) 
				{ 
						if(inputtxt === ''){
							inputtxt = '11';
						}
						
						var passw=  /^[A-Za-z]\w{40}$/;
						if(inputtxt.match(passw)) 
						{ 
							return true;
						}
						else
						{ 
							return false;
					}
				}
                $(document).ready(function() {
					$('#reset_media').click(function(){
						$('#span_cascade_one').html('');
					});
					
					$('.btn_cascade_three').click(function(){
						var new_password = $('#new_password').val();
						var is_continue = CheckPassword(new_password);
						if(is_continue ){
							var reset_profile = $('#reset_profile').val();
							$.ajax({
								url: "<?php echo base_url(); ?>Profile/resetpassword",
								type:"POST",
								data:{new_password:new_password,reset_profile:reset_profile},
								async:false,
								success: function(result) {
									$('#reset_cascade_three').modal('hide');
									$('#pSuccess').html('Password reset success ');
									$('#ModalSuccess').modal('show');
									setTimeout(function() {
										$('#ModalSuccess').modal('hide');
			
									}, 3000);
									result = JSON.parse(result);
									if(result.status === 1 ){
										
									}else{
										
										
									}
								}

							});

							
						}else{
							$('#span_cascade_three').html('Please enter a Valid Password <br />');
						}
					});
					
					
					$('.btn_cascade_two').click(function(){
						var reset_otp = $('#reset_otp').val();
						if(reset_otp !== '' ){
							var reset_profile = $('#reset_profile').val();
							$.ajax({
								url: "<?php echo base_url(); ?>Profile/verify_reset_otp",
								type:"POST",
								data:{reset_otp:reset_otp,reset_profile:reset_profile},
								async:false,
								success: function(result) {
									result = JSON.parse(result);
									if(result.status === 1 ){
										$('#reset_cascade_two').modal('hide');
										$('#reset_cascade_three').modal('show');
									}else{
										$('#span_cascade_two').html('Incorrect otp<br />');
										
									}
								}

							});

							
						}else{
							$('#span_cascade_two').html('Please enter your Otp<br />');
						}
					});
					
					
					$('.btn_cascade_one').click(function(){
						var reset_media = $('#reset_media').val();
						if(reset_media !== '' ){
							$.ajax({
								url: "<?php echo base_url(); ?>Profile/send_reset_otp",
								type:"POST",
								data:{reset_media:reset_media},
								async:false,
								success: function(result) {
									result = JSON.parse(result);
									if(result.status === 1 ){
										$('#reset_profile').val(result.profile_uuid);
										$('#reset_cascade_one').modal('hide');
										$('#reset_cascade_two').modal('show');
										}else{
										$('#span_cascade_one').html('<br />'+result.message);
										
									}
								}

							});

							
						}else{
							$('#span_cascade_one').html('Please enter your email or password<br />');
						}
					});
					$('#dob').change(function(){
						var dob  = $(this).val();
						var parts = dob.split("/");
						dob = new Date(parts[1] + "/" + parts[0] + "/" + parts[2]);
						var today = new Date();
						var age = Math.floor((today-dob) / (365.25 * 24 * 60 * 60 * 1000));
						$('#age').val(age);
					});
				$( ".dob" ).datepicker({
					changeMonth: true,
					changeYear: true,
					dateFormat: 'dd/mm/yy',
					yearRange: '1900:+0',
				});

					$('#btnregister').click(function(){
						var home_profile_for = $('#home_profile_for').val();
						var home_profile_name =  $('#home_profile_name').val();
						var home_mobile = $('#home_mobile').val();
						$('#profile_for').val(home_profile_for);
						 $('#profile_name').val(home_profile_name);
						 $('#mobile').val(home_mobile);
					});
					var success_stories_text = '<div class="col-md-12"> <h3>Success Stories</h3> <h4>We have found our partners on Aroma Matrimony</h4> </div>';
					var s_url = '<?php echo base_url(); ?>';
					//s_url = s_url.replace("site", "admin");
					s_url = s_url + 'admin/';
					$.ajax({
						url: "<?php echo base_url(); ?>Homecontrol/success_stories",
						async:false,
						success: function(result) {
							var s_cnt = 0 ;
							var success_stories_txt = '';
							var is_active = 'active';
							$.each(JSON.parse(result), function(i, itemsingle) {
								if(s_cnt === 0 ){
									success_stories_txt = success_stories_txt + '<div class="carousel-item '+is_active+'"><div class ="row ">';
								}
								is_active = '';
								
								success_stories_txt = success_stories_txt + '<div class="col-md-3"><img class ="d-block w-100" height ="200px;"   src="'+s_url+'uploads/success/'+itemsingle.couple_image+'"><p>'+itemsingle.couple_name+'</p></div>';
								
								if(s_cnt === 3 ){
									s_cnt = 0
									success_stories_txt = success_stories_txt + '</div></div>';
								}else{
									s_cnt = s_cnt + 1;
								}
								
								
								
								//success_stories_text = success_stories_text + '<div class="col-md-3"><a href="#"><img src="'+s_url+'uploads/success/'+itemsingle.couple_image+'"> <p>'+itemsingle.couple_name+'</p></a> </div>';
							});
							if(s_cnt > 0){
								$.each(JSON.parse(result), function(i, itemsingle) {
									success_stories_txt = success_stories_txt + '<div class="col-md-3"><img class ="d-block w-100" height ="200px;" width ="200px;"  src="'+s_url+'uploads/success/'+itemsingle.couple_image+'"><p>'+itemsingle.couple_name+'</p></div>';
									if(s_cnt === 3 ){
										success_stories_txt = success_stories_txt + '</div></div>';
										return false;
									}else{
										s_cnt = s_cnt + 1;
									}
								});
							}
							$('.carousel-inner').html(success_stories_txt);
							//$('.cls_success_stories').html(success_stories_text);
							
							
							
						}

					});
					
                  getallmother();
                  getallreligion();
                  getalldivision();
                  getallcountry();
                  getallcity();
                  getallcitizenship();
				          getallhigheducation();
                  //getall_p_religion();
                  //getall_p_country();
                  getalloccupation();
                 // getall_t_state();
                 // getall_t_district();


                 $("#regForm").submit(function(e) {
					ajax_upload(this, '<?php echo base_url(); ?>Homecontrol/save_profile', e, 
                    function after_save(data) {
                          if (data.status === 1) {
							success("Saved")
                            //clearpackage();
                             //loadpackage();
                             //changebtn('#btn_profile','Create');
							} else {
                                 error(data.error)
                            }
                       });
               });





                });

              </script>

<script>
	
	function logout(){
		 $.ajax({
				url: "<?php echo base_url(); ?>Homecontrol/logout",
                async: false,
                success: function(Onj) {
                    var result = JSON.parse(Onj);
					 window.location.reload();
                },
                error: function(data) {

                }
            });
	}
$(document).on("click",".clsreload",function() {
	 window.location.reload();
});
$(document).on("click",".share_profile",function() {
	var share_uuid = $(this).attr('uuid');
	$.ajax({
		url: "<?php echo base_url(); ?>Profile/share_profile",
		type:"POST",
		data:{share_uuid:share_uuid},
        async:false,
        success: function(result) {
			if(result !== '' ){
				$('#copyTarget').val('<?php echo base_url(); ?>'+'Profile/ViewSharedProfile/'+result);
			}
		}

	});
});


$(document).on("keydown","#otp",function() {
		$('#spnotp').html('');
});
$(document).on("click",".btnotp",function() {
	var mobile = $('#mobile').val();
	var email = $('#email').val();
	$.ajax({
		url: "<?php echo base_url(); ?>Homecontrol/sendsms",
		type:"POST",
		data:{mobile:mobile,email:email},
        async:false,
        success: function(result) {
			result = JSON.parse(result);
			if(result.status === 1){
				$('#pSuccess').html('otp send to your mobile and email ');
				$('#reg').modal('hide');
				$('#ModalSuccess').modal('show');
				setTimeout(function() {
					$('#ModalSuccess').modal('hide');
				//$('#reg').modal('show');
				$('.regbtn').trigger('click');
				$('.modal').css('overflow-y', 'auto');
				$('#otp').focus();
				}, 3000);
				my_otp = result;
				//var result = JSON.parse(result);
				//console.log(result.otp);
				//$.each(JSON.parse(result), function(i, itemsingle) {
				
				//});
				$('.btnotp').attr('disabled',true);
				$('.btnotp').text('Resend OTP');
				$('.btnotp').css('color','white');
				setTimeout(function() {
					$('.btnotp').removeAttr('disabled');
					$('.btnotp').css('color','black');
				}, 16000);
			}else{
				$('#mobile').val('');
				$('#span_number').html(result.message);
			}
		}

	});

});

$(document).on("change","#mobile",function() {
	var mobile = $('#mobile').val();
	var email = $('#email').val();
	$.ajax({
		url: "<?php echo base_url(); ?>Homecontrol/sendsms",
		type:"POST",
		data:{mobile:mobile,email:email},
        async:false,
        success: function(result) {
			is_confirmed = 0;
			result = JSON.parse(result);
			if(result.status === 1){
				$('#pSuccess').html('otp send to your mobile and email ');
				$('#reg').modal('hide');
				$('#ModalSuccess').modal('show');
				$('#reg').modal('hide');
				$('.modal').css('overflow-y', 'auto');
				setTimeout(function() {
					$('#ModalSuccess').modal('hide');
								$('.regbtn').trigger('click');

					$('#otp').focus();

				}, 2000);
				my_otp = result;
				//var result = JSON.parse(result);
				//console.log(result.otp);
				//$.each(JSON.parse(result), function(i, itemsingle) {
				
				//});
				$('.btnotp').attr('disabled',true);
				$('.btnotp').css('color','white');
				$('.btnotp').text('Resend OTP');
				setTimeout(function() {
					$('.btnotp').removeAttr('disabled');
					$('.btnotp').css('color','black');
				}, 16000);
			}else{
				if(result.type === "mob" || result.type === "both" ){
					$('#mobile').val('');
					$('#span_number').html(result.message);
				}
				if(result.type === "email" || result.type === "both" ){
					$('#email').val('');
					$('#span_email').html(result.message);
				}
				
			}
       }

	});

});
$(document).on("change","#login_email,#login_password",function() {
	$('#login_email').removeClass('invalid');
	$('#login_password').removeClass('invalid');
	$('#span_login').html('');
	
});
$(document).on("click",".login_b",function() {
	var login_email = $('#login_email').val();
	var login_password =  $('#login_password').val();
	if(login_email !== '' &&  login_password !==''){
		$.ajax({
                type: 'POST',
                url: '<?php echo base_url(); ?>Homecontrol/login',
                data: {login_email:login_email,login_password:login_password}, // send it here
                success: function(Onj) {
				Onj = JSON.parse(Onj);
				//console.log(Onj.status);
                    if (Onj.status === 0) {
						$('#span_login').html('Incorrect username or password');
                    } else {
						 window.location.replace("<?php echo base_url(); ?>profile/searchprofile");

                    }

                },
                error: function(data) {}
            });
	}else{
		if(login_email === '' ){
			$('#login_email').addClass('invalid');
			$('#span_login').html('Incorrect username or password');
		}
		if(login_password === '' ){
			$('#login_password').addClass('invalid');
			$('#span_login').html('Incorrect username or password');
		}
	}

});

$(document).ready(function() {
  $(window).scroll(function(){
      if ($(this).scrollTop() > 50) {
         $('#header').addClass('darkHeader');
      } else {
         $('#header').removeClass('darkHeader');
      }
  });
});
</script>
<script>
var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
  // This function will display the specified tab of the form...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  //... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtn").innerHTML = "Submit";
  } else {
    document.getElementById("nextBtn").innerHTML = "Next";
  }
  //... and run a function that will display the correct step indicator:
  fixStepIndicator(n)
}

function nextPrev(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  if(currentTab === 2 && n === 1){
    var profile_id = $('#profile_id').val();
		if(profile_id !== "" && profile_id!=='0' && profile_id !== 0 ){
			is_confirmed = 1  ;
			
		}
		if(is_confirmed > 0 ){
			
		}else{
			var otp = $('#otp').val();
			var mobile = $('#mobile').val();
			$.ajax({
				url: "<?php echo base_url(); ?>Homecontrol/verifyOtp",
				type:"POST",
				data:{mobile:mobile,otp:otp},
				async:false,
				success: function(result) {
					is_confirmed = result;
			
				}

			});
			if(parseFloat(is_confirmed) < 1 ){
				$('#spnotp').html('The OTP entered is incorrect.');
				$('#otp').val('');
			}
			
			
		}
		var image_cnt = 0 ;
		var is_cover_image = 0 ;
		  $(".profile_images").each(function(){
			image_cnt = image_cnt + 1;
		  });
		 
		if($("input:radio[name='cover']").is(":checked")) {
			is_cover_image = 1;
		}

      var dataString = $("#regForm").serializeArray();
	  if(image_cnt > 0 && is_cover_image > 0 && parseFloat(is_confirmed) > 0  ){
	  $('#pro_image').remove();
	  if (n == 1 && !validateForm()) return false;
		if(is_submited < 1 ){
			$('#nextBtn').attr('disabled',true);
			$.ajax({
				url: '<?php echo base_url(); ?>Homecontrol/save_profile',
				type: 'POST',
				async:false,
				data: dataString,
				success: function (data) {
					var res = JSON.parse(data);
					if(res.status === 1){
							is_submited = 1;
							var profile_id = $('#profile_id').val();
							$('#reg').modal('hide');
							if(profile_id!== '' && profile_id !== 0  && profile_id !== '0'){
								$('#pSuccess').html('Updated Profile Successfully');
								$('#ModalSuccess').modal('show');
								$('.btnclosemodal').addClass('clsreload');
									setTimeout(function() {
									$('#ModalSuccess').modal('hide');
									// window.location.reload();
								}, 2000);
							}else{
								$('#pSuccess').html('Password has been send to your mobile and email');
								$('#ModalSuccess').modal('show');
								$('.btnclosemodal').addClass('clsreload');
									setTimeout(function() {
									//$('#ModalSuccess').modal('hide');
									// window.location.reload();
								}, 2000);
							}
                      
					}
                                        
				}

			});
		}
	  }else{
		if(image_cnt <  1){
			$('.filenot').html('please select alteast one image');
		}else if(parseFloat(is_confirmed) < 1 ){

    }else{
			$('.filenot').html('please Choose a Cover image (hover your mouse over image to set cover image)');
		}
	  }

  }else{
	if(currentTab === 0 && n === 1 ){
     var income = $('#income').val();
     if(income === ''  || income === undefined || income === null){
      $('#income').attr('style','border-color:red');
       return false;
     }
	}
    if (n == 1 && !validateForm()) return false;
    // Hide the current tab:
    x[currentTab].style.display = "none";
    // Increase or decrease the current tab by 1:
   currentTab = currentTab + n;
    // if you have reached the end of the form...
   if (currentTab >= x.length) {
      // ... the form gets submitted:
      document.getElementById("regForm").submit();
     return false;
    }
   // Otherwise, display the correct tab:
    showTab(currentTab);
  }
}

function validateForm() {
  // This function deals with validation of the form fields
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");
  // A loop that checks every input field in the current tab:
  for (i = 0; i < y.length; i++) {
    // If a field is empty...
    if (y[i].value == "") {
		if(y[i].name !== 'ancestral_origin' && y[i].name !== 'known_language'  ){
			// add an "invalid" class to the field:
			y[i].className += " invalid";
			// and set the current valid status to false
			valid = false;
		}
    }
  }
  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid; // return the valid status
}

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class on the current step:
  x[n].className += " active";
}
</script>

<script>
	document.getElementById("copyButton").addEventListener("click", function() {
		copyToClipboardMsg(document.getElementById("copyTarget"), "msg");
	});
	function copyToClipboardMsg(elem, msgElem) {
	  var succeed = copyToClipboard(elem);
    var msg;
    if (!succeed) {
        msg = "Copy not supported or blocked.  Press Ctrl+c to copy."
    } else {
        msg = "Text copied to the clipboard."
    }
    
    
}


function copyToClipboard(elem) {
	  // create hidden text element, if it doesn't already exist
    var targetId = "_hiddenCopyText_";
    var isInput = elem.tagName === "INPUT" || elem.tagName === "TEXTAREA";
    var origSelectionStart, origSelectionEnd;
    if (isInput) {
        // can just use the original source element for the selection and copy
        target = elem;
        origSelectionStart = elem.selectionStart;
        origSelectionEnd = elem.selectionEnd;
    } else {
        // must use a temporary form element for the selection and copy
        target = document.getElementById(targetId);
        if (!target) {
            var target = document.createElement("textarea");
            target.style.position = "absolute";
            target.style.left = "-9999px";
            target.style.top = "0";
            target.id = targetId;
            document.body.appendChild(target);
        }
        target.textContent = elem.textContent;
    }
    // select the content
    var currentFocus = document.activeElement;
    target.focus();
    target.setSelectionRange(0, target.value.length);
    
    // copy the selection
    var succeed;
    try {
    	  succeed = document.execCommand("copy");
    } catch(e) {
        succeed = false;
    }
    // restore original focus
    if (currentFocus && typeof currentFocus.focus === "function") {
        currentFocus.focus();
    }
    
    if (isInput) {
        // restore prior selection
        elem.setSelectionRange(origSelectionStart, origSelectionEnd);
    } else {
        // clear temporary content
        target.textContent = "";
    }
    return succeed;
}


  $(document).ready(function() {
    $('#income').change(function(){
      $('#income').attr('style','');
    });
    document.getElementById('pro_image').addEventListener('change', readImage, false);
    
    $( ".preview-images-zone" ).sortable();
    
    $(document).on('click', '.image-cancel', function() {
        let no = $(this).data('no');
        $(".preview-image.preview-show-"+no).remove();
    });
});



var num = 1;
function readImage() {
      var html = '';
    if (window.File && window.FileList && window.FileReader) {
        var files = event.target.files; //FileList object
        var output = $(".preview-images-zone");
            var picReader = new FileReader();
        for (let i = 0; i < files.length; i++) {
            var file = files[i];
            if (!file.type.match('image')) continue;
      var form = document.getElementById('profile_form')
            var fd = new FormData(form);
      fd.append('profile_image', file);
      $.ajax({
                type: "POST",
				async:false,
                url: "<?php echo base_url() ?>Homecontrol/UploadProfile",
                data: fd,
                processData: false,
                contentType: false,
                cache: false,
        beforeSend: function(xhr) {},
                success: function(result) {
          result = JSON.parse(result);
		   
          if(result.status === 1){
            picReader.addEventListener('load', function (event) {
              var picFile = event.target;
              html =  '<div class="preview-image preview-show-' + num + '">' +
                '<div class="image-cancel" data-no="' + num + '">x</div>' +
                '<div class="image-zone"><input type="hidden" name ="profile_image'+num+'" value = "'+result.file_name+'" ><input type ="hidden" name ="cnt_profile_image[]" value = "'+num+'"  ><input type ="hidden" class = "profile_images" name ="profile_images[]"  value ="' + picFile.result + '" ><img id="pro-img-' + num + '" src="<?php echo base_url() ?>uploads/profile/' + result.file_name + '"></div>' +
                '<div class="tools-edit-image" style ="display:block !important;"><a href="javascript:void(0)" data-no="' + num + '" class="btn btn-light btn-edit-image"><input data-validation = "required" type="radio" value = "'+num+'" name="cover">Make this cover photo</a></div>' +
                '</div>';
              output.append(html);
              num = num + 1;
            });

            picReader.readAsDataURL(file);
          
            
          }
                }
            });
      
            
        }
		
        $("#pro-image").val('');
    } else {
        console.log('Browser not support');
    }
}
</script>
<script>
function myFunction(imgs) {

  var expandImg = document.getElementById("expandedImg");
  var imgText = document.getElementById("imgtext");
  expandImg.src = imgs.src;
  imgText.innerHTML = imgs.alt;
  expandImg.parentElement.style.display = "block";
}
</script>


</body>
</html>