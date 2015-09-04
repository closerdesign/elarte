(function(){
	// CKEDITOR.replaceAll( 'contenido' , function (textarea, config) {
	CKEDITOR.replaceAll('contenido', function (textarea, config) {
		if ( textarea.className == "contenido" ) {
			config.uiColor = '#c1c1c1';
			config.filebrowserUploadUrl = currentUrl + 'obras/upload';
			return true;
		}
		return true;
	});

	$('body').on('click', '.Obras-headerArrow', function(event) {
		event.preventDefault();
		
		$(this).toggleClass('u-arrowDown');
		$(this).toggleClass('u-arrowUp');

		$(this).parent().next().slideToggle('fast');
	});

	$(".obrasForm").validate({
		rules: {
			status: {
				required: true
			}
		}
	});

	$('.DatePicker').fdatepicker({
		
		language: 'es'
	});
})();