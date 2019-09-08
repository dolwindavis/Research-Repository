$(() => {
  $('#edit-preferences').click(function(){
   $('#edit-preferences-modal').addClass('is-active');
  });
  $('.modal-card-head button.delete, .modal-save, .modal-cancel').click(function(){
    $('#edit-preferences-modal').removeClass('is-active');
  });
});


$('tr').hover(

  function(){ $(this).toggleClass('is-selected') },

);

$(document).ready(function() {

  $('tr').click(function() {
      var href = $(this).find("a").attr("href");
      if(href) {
          window.location = href;
      }
  });

});

$('li').hover(

  function(){ $(this).toggleClass('is-active') },

);


function addHyphen (element) {
    	let ele = document.getElementById(element.id);
        ele = ele.value.split('-').join('');    // Remove dash (-) if mistakenly entered.

        let finalVal = ele.match(/.{1,4}/g).join('-');
        document.getElementById(element.id).value = finalVal;
}


$(document).ready(function() {
  $("#bookselector").change(function(){
    
    if($(this).val()=="Chapter")
    {    
        $("div#chaptertitle").show();
      // $("#second").val($("#second option:first").val());
    }
    else
    {
        $("div#chaptertitle").hide();
    }
  });
  
});

$("#researchselector").change(function(){

      var id = $(this).val();

      // $('#agency').find('option').not(':first').remove();
      $('#agency').find('option').remove();


    $.ajax({
      url: '/getagency/'+id,
      type: 'get',
      dataType: 'json',
      success: function(response){

        var len = 0;
        if(response != null){
          len = response.length;
        }

        if(len > 0){
          // Read data and create <option >
          for(var i=0; i<len; i++){

            var id = response[i].id;
            var name = response[i].name;

            // console.log(name)
          
            var option = "<option value='"+id+"'>"+name+"</option>"; 

            $("#agency").append(option); 
          }
        }

      }
   });
    

  // if($(this).val()=="external")
  // {    
  //       var agency = '<option value="UGC"> UGC </option> <option value="DST" > DST </option> <option value="VGST" > VGST </option>';
      
  //       document.getElementById("agency").innerHTML =agency;
  //     // $("div#internal").show();
  //     // $("div#external").hide();
  //   // $("#second").val($("#second option:first").val());
  // }
  //  else
  //  {
  //            var agency = '<option value="KJC"> KJC </option>';
  //           document.getElementById("agency").innerHTML =agency;

  //  }
});
