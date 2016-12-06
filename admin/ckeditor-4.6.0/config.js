/**
 * @license Copyright (c) 2003-2016, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */
function getBaseUrl(){
	var baseUrl = window.location.origin+'/';
	var pathArray = window.location.pathname.split( '/' );
	var len = pathArray.length;
	if(len > 2){
		for(var i = 0; i < len - 2; i++){
			if(pathArray[i] != '')
				baseUrl += pathArray[i] + '/';
		}
	}
	return baseUrl;
}

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
	config.baseHref = getBaseUrl();
};
