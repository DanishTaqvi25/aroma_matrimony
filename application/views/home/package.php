</div>

<div class="col-md-10 fullwidt" id="full_w">
    <div class="row">
        <div class="tab-content" id="nav-tabContent">

            <div class="tab-pane fade show active" id="nav-create-package" role="tabpanel" aria-labelledby="nav-create-package-tab">
                <div class="row">
                    <div class="col-md-4">
                        <div class="left-tab">
                            <h4><i class="fa fa-edit"></i> Create Package</h4>
                        </div>
                    </div>

                    <div class="col-md-8">
                        <div class="right-tab">
                            <a href="#" class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-th-list"></i> Classic</a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(602px, 26px, 0px);">
                                <a class="dropdown-item" href="#">one</a>
                                <a class="dropdown-item" href="#">two</a>
                                <a class="dropdown-item" href="#">three</a>
                            </div>

                            <a href="#" class="btn btn-secondary dropdown-toggle brb" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Add Tasks <i class="fa fa-caret-down"></i></a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(602px, 26px, 0px);">
                                <a class="dropdown-item" href="#">one</a>
                                <a class="dropdown-item" href="#">two</a>
                                <a class="dropdown-item" href="#">three</a>
                            </div>

                            <a href="#"><i class="fa fa-filter"></i></a>

                            <a href="#" class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-ellipsis-h"></i></a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(602px, 26px, 0px);">
                                <a class="dropdown-item" href="#">one</a>
                                <a class="dropdown-item" href="#">two</a>
                                <a class="dropdown-item" href="#">three</a>
                            </div>
                        </div>
                    </div>
                    <hr>
                </div>
                  
                <div class="row" >
                <div class="col-md-12" >
                    <form id="form_package" class="fr_form modes" >
                      <div class="form-group w-33" >
                        <label>Package Name</label>
                        <input type ="hidden" name ="package_id" id="package_id" value ="0"/>
                      <input type="text" data-validation = "required" name="package_name" id ="package_name">
                      </div>
                        
                        <div class="form-group w-33" >
                        <label>Duration In Days </label>
                    <input data-validation = "required"  type="number" name="package_no_of_days"
                     id ="package_no_of_days">
                      </div>
                     
                     
              
                         <div class="form-group w-33" >
                        <label>Orders</label>
                        <input data-validation = "required"  type="number" name="package_order" id ="package_order">
                      </div>






                  </div>
      
                      <div class="row" style="margin-left:20px; margin-top: 25px;">
                                <div class="form-group fw">
                                    <button type="submit"  id="btn_package"  class="bggreenbtn">Submit</button>
                                </div>
                            </div>
                  
                    </form>
                 </div>
               </div>

  <div class="tab-pane fade" id="nav-manage-package" role="tabpanel" aria-labelledby="nav-manage-package-tab">


                <div class="row">
                    <div class="col-md-4">
                        <div class="left-tab">
                            <h4><i class="fa fa-edit"></i> Manage Package</h4>
                        </div>
                    </div>

                    <div class="col-md-8">
                        <div class="right-tab">
                            <a href="#" class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-th-list"></i> Classic</a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(602px, 26px, 0px);">
                                <a class="dropdown-item" href="#">one</a>
                                <a class="dropdown-item" href="#">two</a>
                                <a class="dropdown-item" href="#">three</a>
                            </div>

                            <a href="#" class="btn btn-secondary dropdown-toggle brb" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Add Tasks <i class="fa fa-caret-down"></i></a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(602px, 26px, 0px);">
                                <a class="dropdown-item" href="#">one</a>
                                <a class="dropdown-item" href="#">two</a>
                                <a class="dropdown-item" href="#">three</a>
                            </div>

                            <a href="#"><i class="fa fa-filter"></i></a>

                            <a href="#" class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-ellipsis-h"></i></a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(602px, 26px, 0px);">
                                <a class="dropdown-item" href="#">one</a>
                                <a class="dropdown-item" href="#">two</a>
                                <a class="dropdown-item" href="#">three</a>
                            </div>
                        </div>
                    </div>
                    <hr>
                </div>
          



                <div class="row">
                    <div class="col-md-12">
                         <div class="create_c">
                            <table id="tablePackage" class="display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Sl No</th>
                                       
                                        <th>Package name</th>
                                  
                                       
                                       

                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                          <td>1</td>
                                        <td>Package1 </td>
                                    
                                         <td><a href="<?php echo base_url('')?>"><i class="fa fa-pencil-square-o"></i></a>&nbsp&nbsp<a href=""><i class="fa fa-trash"></i></a>
                                       </td>
                                       
                                       
                      
                                      </tr>
                                    
                                

                                </tbody>
                                <tfoot>
                                    <tr>
                                      <th>Sl No</th>
                                       
                                        <th>Package name</th>
                               
                                       
                                       

                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                            
                            <script>
                                $.validate({
                                    modules: 'security'
                                });
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

                                function assign(id, value) {
                                    $("#" + id).val(value);
                                }

                                function datatableload(id, url) {
                                    $(id).dataTable().fnDestroy();
                                    $(id).DataTable({
                                        "serverSide": true,
                                        "ajax": {
                                            "url": url,
                                            "data": function(data) {
                                            }
                                        }
                                    });
                                }

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

                                function delete_package(element){
                                     ajax(this, '<?php echo base_url(); ?>Package/delete_package/' + $(element).attr("uuid"), '', function after_save(data) {
                                        if (data.status === 1) {
                                            success("Deleted sucessfully")
                                            clearpackage();
                                             loadpackage();
                                        } else {
                                            error(data.error)
                                        }
                                    });
                               }


                              function getallpackage(){
                                  var txt_package = '<option value="">Select Package</option>';
                                  $.ajax({
                                      url: "<?php echo base_url(); ?>Package/getallpackage",
                                      async:false,
                                      success: function(result) {
                                          $.each(JSON.parse(result), function(i, itemsingle) {
                                          txt_package = txt_package + '<option value="'+itemsingle.
                                           package_uuid+'">'+itemsingle.package_name+'</option>';
                                          });
                                          $('.package').html(txt_package);
                                      }

                                  });
                               }



                                $(document).ready(function() {
                                  datatableload('#tablePackage', "<?php echo base_url(); ?>Package/list_package")
                                  getallpackage();

                                  $("#form_package").submit(function(e) {
                                      ajax_upload(this, '<?php echo base_url(); ?>Package/save_package', e, 
                                        function after_save(data) {
                                        if (data.status === 1) {
                                            success("Saved")
                                            clearpackage();
                                            loadpackage();
                                            changebtn('#btn_package','Create');
                                        } else {
                                              error(data.error)
                                            }
                                        });
                                    });



                                });


                                function edit_package(element){

                                  assign("package_id", $(element).attr("uuid"))
                                  var package_name = $(element).attr('package_name');
                                  var package_no_of_days = $(element).attr('package_no_of_days');
                                  var package_order = $(element).attr('package_order');
                                  assign("package_name", $(element).attr("package_name"))
                                  assign("package_no_of_days", $(element).attr("package_no_of_days"))
                                  assign("package_order", $(element).attr("package_order"))
                                  changebtn('#btn_package','Update');
                                }
                                function clearpackage(){
                                  assign("package_id", 0);
                                  assign("package_name", '');
                                  assign("package_no_of_days", '');
                                  assign("package_order", '');
                                }
                                function loadpackage() {
                                  datatableload('#tablePackage', "<?php echo base_url(); ?>Package/list_package")
                                }





                            </script>
                        </div>
                    </div>
                </div>
            </div>



             














  </div>
                   
      </div>
                </div>
            </div>



          


        </div>
    </div>
</div>
</section>