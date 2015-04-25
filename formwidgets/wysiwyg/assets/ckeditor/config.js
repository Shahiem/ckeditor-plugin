/**
 * @license Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.html or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	CKEDITOR.config.toolbar_Basic = [
		['Bold','Italic','Underline','Strike','-','Undo','Redo','-','Cut','Copy','Paste','Find','Replace','-','Outdent','Indent','-','Print'],
   		['NumberedList','BulletedList','-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
   		['Styles','Format','Font','FontSize'],
   		['MediaManager','Table','-','Link','Flash','Youtube','Smiley','TextColor','BGColor']
	];

	config.toolbar_Full = [
	    { name: 'document',    groups: [ 'mode', 'document', 'doctools' ], items: [ 'Source', 'Save', 'NewPage', 'DocProps', 'Preview', 'Print', 'Templates', 'document' ] },
	    { name: 'clipboard',   groups: [ 'clipboard', 'undo' ], items: [ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', 'Undo', 'Redo' ] },
	    { name: 'editing',     groups: [ 'find', 'selection', 'spellchecker' ], items: [ 'Find', 'Replace', 'SelectAll', 'Scayt' ] },
	    { name: 'insert', items: [ 'CreatePlaceholder', 'MediaManager', 'Flash', 'Table', 'HorizontalRule', 'Smiley', 'SpecialChar', 'PageBreak', 'Iframe', 'InsertPre' ] },
	    { name: 'forms', items: [ 'Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'ImageButton', 'HiddenField' ] },
	    '/',
	    { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ], items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', 'RemoveFormat' ] },
	    { name: 'paragraph',   groups: [ 'list', 'indent', 'blocks', 'align' ], items: [ 'NumberedList', 'BulletedList', 'Outdent', 'Indent', 'Blockquote', 'CreateDiv', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', 'BidiLtr', 'BidiRtl' ] },
	    { name: 'links', items: [ 'Link', 'Unlink', 'Anchor' ] },
	    '/',
	    { name: 'styles', items: [ 'Styles', 'Format', 'Font', 'FontSize' ] },
	    { name: 'colors', items: [ 'TextColor', 'BGColor' ] },
	    { name: 'tools', items: [ 'UIColor', 'Maximize', 'ShowBlocks' ] },
	    { name: 'about', items: [ 'About' ] }
	  ];


	CKEDITOR.config.extraPlugins = 'youtube,mediamanager';
};
