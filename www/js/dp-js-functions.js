$(document).ready(function() {  
  
  // skryvani flash zprav
  $( 'div.flash' ).click(function() {
    $(this).slideToggle(200, 'linear');
  });

  // registrace preklikavani radio buttonku
  $( 'div.reg-radio' ).click(function() {
    $(this).find('input[type=radio]').prop('checked', true);
  });

});