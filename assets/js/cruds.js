function getTable(filename){
    //array explode for data first static
    $('#dtable').DataTable({
        "responsive": true,
        "processing": true,
        "serverSide": true,
        'serverMethod': 'post',       
        "ajax": filename,
      'columns': [
         {"data": "id",
    render: function (data, type, row, meta) {
        return meta.row + meta.settings._iDisplayStart + 1;
    }},{ data: 'name' },
         { data: 'contact_no' },
         { data: 'edit' },
         { data: 'delete' }
      ]
    });
}
function getJson(filename,selector){
    $.getJSON(filename,function(data){
        $("#"+selector).empty();
            $.each(data,function(key,val) {
                $("#"+selector).append("<option value='" + val.id+ "'>" + val.name + "</option>");
             });
    });
}
function saveData(frm,url){
    var code=1;
    $.ajax({
          type: 'POST',
          url: url,
          data: frm,
          success: function(resp) {
            var status=JSON.parse(resp);
            if(status.code==1){
                var code=1;
                    $.dreamAlert({
                              'type'      :   'success',
                              'message'   :   'Operation completed!',
                              'position'  :   'right',
                              'summary'   :   'Data Submitted'
                      });
          
                      $('#myModal').modal('hide');
              }
          },
          error: function() {
            var code=2;
            $.dreamAlert({
                              'type'      :   'error',
                              'message'   :   'Data Not Saved',
                              'position'  :   'right',
                              'summary'   :   'Data Submitted'
                      });
          }
        });
        $("#saveType").val("1");
   }
function saveMultipartData(frm,url){
    var code=1;
    $.ajax({
          type: 'POST',
          url: url,
          data: frm,
          processData: false,
          contentType: false,
          success: function(resp) {
            var status=JSON.parse(resp);
            if(status.code==1){
                code=1;
                    $.dreamAlert({
                              'type'      :   'success',
                              'message'   :   'Operation completed!',
                              'position'  :   'right',
                              'summary'   :   'Data Submitted'
                      });
          
                      $('#myModal').modal('hide');
              }
          },
          error: function() {
            code=2;
            $.dreamAlert({
                              'type'      :   'error',
                              'message'   :   'Data Not Saved',
                              'position'  :   'right',
                              'summary'   :   'Data Submitted'
                      });
          }
        });
        $("#saveType").val("1");
   } 

function deleteData(did,url){
    var code=1;
    $.ajax({
                type: 'POST',
                url: url,
                data: {id:did},
                success: function(resp) {
                  var status=JSON.parse(resp);
                  if(status.code==1){
                      code=1;
                    $.dreamAlert({
                              'type'      :   'success',
                              'message'   :   'Data deleted Successfully!',
                              'position'  :   'right',
                              'summary'   :   'Data Submitted'
                      });
              
                //  refreshData();
                  }
                }, 
                error: function() {
                    code=2;
                  $.dreamAlert({
                              'type'      :   'success',
                              'message'   :   'Data not deleted !',
                              'position'  :   'right',
                              'summary'   :   'Data Submitted'
                      });
                }
        });
        return code;
    }

function showDate(selector){
    $('#'+selector).datetimepicker({timepicker:false,formatDate:'d/m/Y'});
}    
function showTime(selector){
    $('#'+selector).datetimepicker({  datepicker:false,
        format:'H:i'});
}   