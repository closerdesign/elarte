(function(){
	CKEDITOR.replaceAll( 'contenido' );

	$('body').on('click', '.Obras-headerArrow', function(event) {
		event.preventDefault();
		
		$(this).toggleClass('u-arrowDown');
		$(this).toggleClass('u-arrowUp');

		$(this).parent().next().slideToggle('fast');
	});
})();