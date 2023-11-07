function changeStatus(id,status)
 {
   // var branchId  = id;
   // var branchId  = id;
   $.ajax({
                  url: "changeStatus",
                  method: "POST",
                  data: {primeId:id,status:status},
                  beforeSend: function() {
                  $("#messageModal").modal("show");
                  $("#messageBody").html("<img src='../images/loader.gif' class='loaderImg'>");
                  },
                  success: function(data) {
                    
                    if(data=='1') 
                    {
                       
                        $("#messageBody").html("<p style='color:green;font-size:14px;text-align:center'>Status changed successfully</p>");
                        $('#messageModal').modal('hide');

                        var table = $('#mangeTable').DataTable();
                        table.ajax.reload();
                        // $('#mangeTable').ajax.reload();

                    }
                  }
            });
 }

 function editData(id,controller)
 {
    //  alert(controller);
    // alert( $("#basicsForm input").attr("id") );

    $("form.updateForm :input").each(function(){
      var input = $(this).attr("id"); // This is the jquery object of the input, do what you will
      alert(input);
     })


    $("#nav-update-"+controller+"-tab").css("display","inline-block");
    $("#nav-manage-"+controller+"-tab").removeClass("active");
    $("#nav-manage-"+controller+"-tab").removeClass("show");
    $("#nav-manage-"+controller+"").removeClass("active");
    $("#nav-manage-"+controller+"").removeClass("show");

    $("#nav-update-"+controller+"").addClass("active");
    $("#nav-update-"+controller+"").addClass("show");
    $("#nav-update-"+controller+"-tab").addClass("show");
    $("#nav-update-"+controller+"-tab").addClass("active");

    loadsavedData(id);
     
       
 }
