var isLoading = false;
function reply_click(id)
    {
        alert(isLoading);
        if (!isLoading) {
            // $("#restaurants-container").empty();
            isLoading = true;

        $("#"+id).submit(function(event) {
        event.preventDefault();
       var result = true;
       if(id=='basicsForm') 
       {
            $(".basicsInput").css("border","1px solid #d6d6d6");
            $(".select2").css("border","1px solid #d6d6d6");      
                $('.basicsInput').each(function(){
                    var textValues = $(this).val();
                    // alert(textValues);
                    var textnames = $(this).attr("name");
                    if(textValues=='')
                    {
                    $("#"+textnames).css("border","1px solid red");
                    
                    result = false;
                    }
                    
                })
            
                if($("#modeId").val()=='')
                {
                $(".select2").css("border","1px solid red");
                result = false;
            
                }  
    } 
    else
    {

        
        $(".updateInput").css("border","1px solid #d6d6d6");
            $(".select2").css("border","1px solid #d6d6d6");      
                $('.updateInput').each(function(){
                    var textValues = $(this).val();
                    // alert(textValues);
                    var textnames = $(this).attr("name");
                    if(textValues=='')
                    {
                    $("#"+textnames).css("border","1px solid red");
                    
                    result = false;
                    }
                    
                })
            
                if($("#upmodeId").val()=='')
                {
                $(".select2").css("border","1px solid red");
                result = false;
            
                }  
    }  
        
       
    if(result==true) {
          
    
        if(id=='updateForm') 
        {
            var geturl ='updatebatches';
         }
         else
         {
            var geturl = 'savebatches';
          
         }

         var imgurl ='../images/loader.gif';
            
    
       $.ajax({
                    url: geturl,
                    method: "POST",
                    data: $('#'+id).serialize(),
                    beforeSend: function() {
                    $("#messageModal").modal("show");
                    $("#messageBody").html("<img src='"+imgurl+"' class='loaderImg'>");
                    },
                    success: function(data) {
                     
                        if(id=='basicsForm') 
                        {
                            if (data=='batchName') {
                            
                                $("#messageBody").html("<p style='color:red;font-size:14px;text-align:center'>Batch Name already exist</p>");
                                isLoading = true;
                            }
                            else
                            {
                                $("#messageBody").html("<p style='color:green;font-size:14px;text-align:center'>Informations are successfully Saved</p>");
                                $('#'+id)[0].reset();
                                $('select').select2().select2('val','');
                                $("#nav-manage-batches-tab").addClass("active");
                                $("#nav-manage-batches-tab").addClass("show");
                                $("#nav-manage-batches").addClass("active");
                                $("#nav-manage-batches").addClass("show");
                                $("#nav-create-batches").removeClass("active");
                                $("#nav-create-batches").removeClass("show");
                                $("#nav-create-batches-tab").removeClass("show");
                                $("#nav-create-batches-tab").removeClass("active");
                                var table = $('#mangeTable').DataTable();
                                 table.ajax.reload();
                                 isLoading = false;
                                
                            }
                        }

                      else
                      {
                        
                        $("#messageBody").html("<p style='color:green;font-size:14px;text-align:center'>Informations are successfully Saved</p>");
                        $('#'+id)[0].reset();
                        $('select').select2().select2('val','');
                        $("#nav-manage-batches-tab").addClass("active");
                        $("#nav-manage-batches-tab").addClass("show");
                        $("#nav-manage-batches").addClass("active");
                        $("#nav-manage-batches").addClass("show");
                        $("#nav-update-batches").removeClass("active");
                        $("#nav-update-batches").removeClass("show");
                        $("#nav-update-batches-tab").removeClass("show");
                        $("#nav-update-batches-tab").removeClass("active");
                        $("#nav-update-batches-tab").css("display","none");
                        var table = $('#mangeTable').DataTable();
                        table.ajax.reload();
                        isLoading = false;
                        
                    }
                    alert(isLoading);
                    
                    
                    
                      
                      
                      
                    }
                  });
                  
      }
     
    
      });
    }

    //   return false;
    }
$(document).ready(function(){
      
    
    
    
    
      $('#mangeTable').DataTable({
              'processing': true,
              'serverSide': true,
              "bInfo": true,
              // "bPaginate": false,
               "bLengthChange": true,
            //    "destroy": true,
                // "stateSave": true,
              'serverMethod': 'post',
              'ajax': {
                "url" : "getallBatches",
              },
              
              'columns': [      
                { data: 'batchName' },           
                { data: 'modeName' },
                { data: 'batchYear' },
                { data: 'batchOrder' },
                
               
                { data: function ( row, type, set ) {
                    // alert(row.branchStatus);
                        if ( row.batchActive == '1' ) {
                            var status ='Active';
                        }
                        else 
                        {
                            var status ='Inactive';
                        }
    
    
                        return status;
    
                        
                }  },

                { data: function ( row, type, set ) {
                    // alert(row.branchStatus);
                        if ( row.batchActive == '1' ) {
                            var checked = 'checked=checked';
                        }
                        else 
                        {
                            var checked = '';
                        }
    
    
                        return '&nbsp;<a href="#"  onclick="editData('+row.actions+',\'batches\')"><i class="fa fa-edit small"></i></a>'+
                                    '&nbsp;<a href="#/'+row.actions+'"><i class="fa fa-trash small"></i></a>'+
                                    '<label class="switch"><input '+checked+' type="checkbox" onclick="changeStatus('+row.actions+','+row.batchActive+')"><span class="slider round"></span></label>';
    
                        
                }  }
                 
              ]
            });
    
    });

function loadsavedData(id)
{
    isLoading = false;
  $.ajax({
    url: "loadsavedData",
    method: "POST",
    data: {primeId:id},
    // dataType: "json",
    beforeSend: function() {
    $("#messageModal").modal("show");
    $("#messageBody").html("<img src='../images/loader.gif' class='loaderImg'>");
    },
    success: function(data) {

        $("#updateFormdiv").html(data);
        
        setTimeout(function() {$('#messageModal').modal('hide');}, 1000);

         
    }
});
}     