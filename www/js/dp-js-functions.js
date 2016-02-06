// akce dokumentu po nacteni stranky
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

  // hezci vyber hlavniho fota 
  $('table#photos_setmainphoto').on('click','tr.required', function() { 
    // projdi vsechny tr a schovej oznaceni
    $.each($('table#photos_setmainphoto tr.required'), function() {
      $(this).removeClass('active'); // tak ho deaktivuj
      $(this).find('img').css('display', 'none'); // a schovej obrazek, ktery znacil, ze byl tr aktivni (zelena fajfka)
      $(this).find('input[type="checkbox"]').prop('checked', false); // odoznac ho v checkboxu
    });
    // nove oznac prave kliknuty tr
    $(this).find('img').css('display', 'inline-block'); // oznac miniaturu fajfkou, aby user videl, ze je aktivni
    $(this).find('input[type="checkbox"]').prop('checked', true); // oznac ho v checkboxu    
  }); 

  // hezci mazani fotek
  $('table#photos_delete').on('click','tr.required', function() { // po kliknuti zjisti
    if($(this).hasClass('active')) { // zda-li bylo dane tr aktivni
      $(this).removeClass('active'); // tak ho deaktivuj
      $(this).find('img').css('display', 'none'); // a schovej obrazek, ktery znacil, ze byl tr aktivni (zelena fajfka)
      $(this).find('input[type="checkbox"]').prop('checked', false); // odoznac ho v checkboxu
    } else { // zda-li bylo dane tr neaktivni             
      $(this).addClass('active'); // tak ho aktivuj
      $(this).find('img').css('display', 'inline-block'); // oznac ho fajfkou, aby user videl, ze je aktivni
      $(this).find('input[type="checkbox"]').prop('checked', true); // oznac ho v checkboxu
    }
  }); 

});