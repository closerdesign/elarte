if ( typeof(mainUrl) != 'undefined' ) {
	var stateObj = { foo: mainUrl };
	window.history.pushState(stateObj, "Api", mainUrl);
}