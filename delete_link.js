$(document).ready(function(){ 
  function loadResultDataLink(){
    $.get('wiev.php',{'folder_id':$('#id_folder').val() != '' ? $('#id_folder').val() : 0}, function(data){
            $('.contents_result').html(data);
        });
  }
  $('.delete_link').on('click', function () {
    $.ajax({
        type: "POST",
        url: "func.php",
        data: {
              id_link:$(this).data('idlink'),
              type:'delete_link',
              },
        dataType: "text",
        success: function(resultData){
            data = JSON.parse(resultData);
            loadResultDataLink();
        }
  });
});
  
  
  });