$(document).ready(function(){ 

    var to = false;
    $('#plugins4_q').keyup(function () {
      if(to) { clearTimeout(to); }
      to = setTimeout(function () {
        var v = $('#plugins4_q').val();
        $('#tree-container').jstree(true).search(v);
      }, 250);
    });
  
    function loadTree(){
        //"wholerow",
      $('#tree-container').jstree({
      'plugins': ["search" ],
          'core' : {
              'data' : {
                  "url" : "response.php",
                  "dataType" : "json" // needed only if you do not supply JSON headers
              }
          }
      }).bind("loaded.jstree", function (event, data) {
        // you get two params - event & data - check the core docs for a detailed description
        $(this).jstree("open_all");
    })  
    }
    loadTree();
  
    function loadResultDataLink(){
      $.get('wiev.php',{'folder_id':$('#id_folder').val() != '' ? $('#id_folder').val() : 0}, function(data){
              $('.contents_result').html(data);
          });
    }
  
  
      $('#tree-container').on('changed.jstree', function (e, data) {
        var i, j, r = [];
        for(i = 0, j = data.selected.length; i < j; i++) {
          r.push(data.instance.get_node(data.selected[i]).id);
        }
        $('#id_folder').val(r.join(', '));
        loadResultDataLink();
      }).jstree();
  
  
    // $('.add').on('click', function () {
    //   $('#exampleModal').modal('show');
    // });
  
  $('.add_link').on('click', function () {
    if($('#value').val() != ''){
        $.ajax({
            type: "POST",
            url: "func.php",
            data: {
                  name: $('#value').val(),
                  id_folder:$('#id_folder').val() != '' ? $('#id_folder').val() : 0,
                  type:'link',
                  },
            dataType: "text",
            success: function(resultData){
                data = JSON.parse(resultData);
                // console.log(resultData);
                // alert(data.msg);
                $('#value').val('');
                loadResultDataLink();
            }
      });
  
    }
  });
  
  
  $('.add_folder').on('click', function () {
    if($('#value').val() != ''){
      $.ajax({
            tysspe: "POST",
            url: "func.php",
            data: {
                  name: $('#value').val(),
                  id_folder:$('#id_folder').val() != '' ? $('#id_folder').val() : 0,
                  type:'folder',
                  },
            dataType: "text",
            success: function(resultData){
                data = JSON.parse(resultData);
                // console.log(resultData);
                // alert(data.msg);
            }
      });
      window.location.reload();
      // $('#tree-container').jstree('refresh');
    }
  });
  
  
  $('.delete_folder').on('click', function () {
    if($('#id_folder').val() != ''){
        var id = 
        $.ajax({
            type: "POST",
            url: "func.php",
            data: {
                  id_folder:$('#id_folder').val(),
                  type:'delete_folder',
                  },
            dataType: "text",
            success: function(resultData){
                data = JSON.parse(resultData);
                // console.log(resultData);
                alert(data.msg);
            }
      });
      window.location.reload();
    }
  });
  
  });