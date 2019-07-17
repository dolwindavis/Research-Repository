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


$("#bookselector").change(function(){
  console.log($(this).val())
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