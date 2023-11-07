var isLoading = false;
function reply_click(id)
    {
        // alert(id);
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
            
                if($("#managerId").val()=='')
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
                    var textnames = $(this).attr("id");
                    if(textValues=='')
                    {
                    $("#"+textnames).css("border","1px solid red");
                    
                    result = false;
                    }
                    
                })
            
                if($("#upmanagerId").val()=='')
                {
                $(".select2").css("border","1px solid red");
                result = false;
            
                }  
    }  
        
       
        // alert(result);
    if(result==true) {
          
    
        if(id=='updateForm') 
        {
            var geturl ='updatemode';
         }
         else
         {
            var geturl = 'savemode';
          
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
                            if (data=='modeName') {
                            
                                $("#messageBody").html("<p style='color:red;font-size:14px;text-align:center'>mode Name already exist</p>");
            
                            }
                            else
                            {
                                $("#messageBody").html("<p style='color:green;font-size:14px;text-align:center'>Informations are successfully Saved</p>");
                                $('#'+id)[0].reset();
                                $('select').select2().select2('val','');
                                $("#nav-manage-modes-tab").addClass("active");
                                $("#nav-manage-modes-tab").addClass("show");
                                $("#nav-manage-modes").addClass("active");
                                $("#nav-manage-modes").addClass("show");
                                $("#nav-create-modes").removeClass("active");
                                $("#nav-create-modes").removeClass("show");
                                $("#nav-create-modes-tab").removeClass("show");
                                $("#nav-create-modes-tab").removeClass("active");
                                var table = $('#mangeTable').DataTable();
                                 table.ajax.reload();
                                
                            }
                        }

                      else
                      {
                        
                        $("#messageBody").html("<p style='color:green;font-size:14px;text-align:center'>Informations are successfully Saved</p>");
                        $('#'+id)[0].reset();
                        $('select').select2().select2('val','');
                        $("#nav-manage-modes-tab").addClass("active");
                        $("#nav-manage-modes-tab").addClass("show");
                        $("#nav-manage-modes").addClass("active");
                        $("#nav-manage-modes").addClass("show");
                        $("#nav-update-modes").removeClass("active");
                        $("#nav-update-modes").removeClass("show");
                        $("#nav-update-modes-tab").removeClass("show");
                        $("#nav-update-modes-tab").removeClass("active");
                        $("#nav-update-modes-tab").css("display","none");
                        var table = $('#mangeTable').DataTable();
                        table.ajax.reload();
                    }
                    
                    
                    isLoading = true;
                      
                      
                      
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
              'serverMethod': 'post',
              'ajax': {
                "url" : "getallModes",
              },
              
              'columns': [      
                { data: 'modeName' },           
                { data: 'modeAdmin' },
                { data: 'modeOrder' },
               
                { data: function ( row, type, set ) {
                    // alert(row.branchStatus);
                        if ( row.modeActive == '1' ) {
                            var checked = 'checked=checked';
                        }
                        else 
                        {
                            var checked = '';
                        }
    
    
                        return '&nbsp;<a href="#"  onclick="editData('+row.actions+',\'modes\')"><i class="fa fa-edit small"></i></a>'+
                                    '&nbsp;<a href="#/'+row.actions+'"><i class="fa fa-trash small"></i></a>'+
                                    '<label class="switch"><input '+checked+' type="checkbox" onclick="changeStatus('+row.actions+','+row.modeActive+')"><span class="slider round"></span></label>';
    
                        
                }  }
                 
              ]
            });
    
    });

function loadsavedData(id)
{
  $.ajax({
    url: "loadsavedData",
    method: "POST",
    data: {primeId:id},
    dataType: "json",
    beforeSend: function() {
    $("#messageModal").modal("show");
    $("#messageBody").html("<img src='../images/loader.gif' class='loaderImg'>");
    },
    success: function(data) {
        // alert(data.managerId);
        $("#upmodeName").val(data.modeName);
        $("#upmodeOrder").val(data.modeOrder);
        $("#upmodeId").val(data.modeId);
        $("#upmanagerId").val(data.managerId);
        $('select').select2().select2('val',data.managerId);
        setTimeout(function() {$('#messageModal').modal('hide');}, 1000);

         
    }
});
}     