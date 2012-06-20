/*
 Copyright (c) 2003-2011, CKSource - Frederico Knabben. All rights reserved.
 For licensing, see LICENSE.html or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function(config) {
	// Define changes to default configuration here. For example:
	config.language = 'de';
	// config.uiColor = '#AADC6E';
	//config.htmlEncodeOutput = true;
	//config.startupMode = 'source';config.entities = false;
	// Add WIRIS to the plugin list

	config.extraPlugins += (config.extraPlugins.length == 0 ? '' : ',') + 'ckeditor_wiris';
	config.toolbar = 'MyToolbar';
	config.toolbar_MyToolbar =
	[
	{ name: 'document', items : [  'Source','NewPage','Preview' ] },
	{ name: 'clipboard', items : [ 'Cut','Copy','Paste','PasteText','PasteFromWord','-','Undo','Redo' ] },
	{ name: 'editing', items : [ 'Find','Replace','-','SelectAll','-','Scayt' ] },
	{ name: 'insert', items : [ 'Image','Flash','Table','HorizontalRule','Smiley','SpecialChar','ckeditor_wiris_formulaEditor', 'ckeditor_wiris_CAS'] },
	'/',
	{ name: 'styles', items : [ 'Styles','Format' ] },
	{ name: 'basicstyles', items : [ 'Bold','Italic','Strike','-','RemoveFormat' ] },
	{ name: 'paragraph', items : [ 'NumberedList','BulletedList','-','Outdent','Indent','-','Blockquote' ] },
	{ name: 'links', items : [ 'Link'] },

	{ name: 'tools', items : [ 'Maximize'] }
	];

};
