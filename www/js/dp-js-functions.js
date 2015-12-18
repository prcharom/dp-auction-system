$( document ).ready(function() {  

  // inicializace nette ajaxu
  $.nette.init();
  
	// skryvani flash zprav
	$( document ).on('click', 'div.flash', function() {
	    $(this).hide(200, 'linear');
	});

  // skryvani error zprav
  $( document ).on('click', 'ul.errors', function() {
    $(this).hide(200, 'linear');
  });

  // registrace preklikavani radio buttonku
  $( document ).on('click', 'div.reg-radio', function() {
    $(this).find('input[type=radio]').prop('checked', true);
  });

});